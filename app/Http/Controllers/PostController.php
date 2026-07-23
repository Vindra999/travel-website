<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::with('user')
            ->when($request->category, function ($query) use ($request) {
                $query->where('category', $request->category);
            })
            ->latest()
            ->paginate(12);

        return view('posts.index', compact('posts'));
    }

    public function show(string $id)
    {
        $post = Post::with('user')->findOrFail($id);
        return view('posts.show', compact('post'));
    }

    // 1. Menampilkan halaman tabel Kelola Berita (Dashboard Admin)
    public function adminIndex()
    {
        $posts = Post::latest()->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    // 2. Menampilkan formulir tambah berita
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Simpan gambar langsung ke public/uploads/posts/
     * Solusi untuk shared hosting (InfinityFree) yang tidak mendukung symlink.
     */
    private function storeImage(Request $request): ?string
    {
        if (!$request->hasFile('image')) {
            return null;
        }

        $uploadDir = public_path('uploads/posts');

        // Buat folder jika belum ada
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0775, true);
        }

        $file     = $request->file('image');
        $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
        $file->move($uploadDir, $filename);

        // Kembalikan path relatif yang disimpan ke DB
        return 'uploads/posts/' . $filename;
    }

    /**
     * Hapus file gambar dari public/ jika ada.
     * Mendukung format path lama (image/xxx.jpg via Storage) maupun baru (uploads/posts/xxx.jpg).
     */
    private function deleteImage(?string $imagePath): void
    {
        if (!$imagePath) {
            return;
        }

        // Gambar lama yang disimpan via Storage::disk('public') → storage/app/public/image/
        if (str_starts_with($imagePath, 'image/')) {
            Storage::disk('public')->delete($imagePath);
            return;
        }

        // Gambar baru yang disimpan langsung di public/uploads/posts/
        $fullPath = public_path($imagePath);
        if (file_exists($fullPath)) {
            unlink($fullPath);
        }
    }

    // 3. Menyimpan berita baru
    public function store(Request $request)
    {
        $request->validate([
            'title'    => 'required|string|max:255',
            'content'  => 'required|string',
            'category' => 'required|string|max:100',
            'image'    => 'nullable|image|max:2048',
        ]);

        $data            = $request->only('title', 'content', 'category');
        $data['user_id'] = Auth::id();

        $imagePath = $this->storeImage($request);
        if ($imagePath) {
            $data['image'] = $imagePath;
        }

        Post::create($data);

        return redirect('/admin/berita')->with('success', 'Berita berhasil ditambahkan.');
    }

    // 4. Menampilkan formulir edit berita
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.posts.edit', compact('post'));
    }

    // 5. Menyimpan perubahan data berita
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'    => 'required|string|max:255',
            'content'  => 'required|string',
            'category' => 'required|string|max:100',
            'image'    => 'nullable|image|max:2048',
        ]);

        $post = Post::findOrFail($id);
        $data = $request->only('title', 'content', 'category');

        if ($request->hasFile('image')) {
            // Hapus gambar lama lalu simpan gambar baru
            $this->deleteImage($post->image);
            $data['image'] = $this->storeImage($request);
        }

        $post->update($data);

        return redirect('/admin/berita')->with('success', 'Berita berhasil diperbarui!');
    }

    // 6. Menghapus data berita
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $this->deleteImage($post->image);
        $post->delete();

        return redirect()->back()->with('success', 'Berita berhasil dihapus.');
    }
}