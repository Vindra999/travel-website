<div align="center">

# 🏔️ JambiAdventure

### Platform Wisata Alam & Petualangan Jambi

[![Laravel](https://img.shields.io/badge/Laravel-12.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://php.net)
[![TailwindCSS](https://img.shields.io/badge/TailwindCSS-3.x-06B6D4?style=for-the-badge&logo=tailwindcss&logoColor=white)](https://tailwindcss.com)
[![Midtrans](https://img.shields.io/badge/Payment-Midtrans-003399?style=for-the-badge)](https://midtrans.com)
[![License](https://img.shields.io/badge/License-MIT-green?style=for-the-badge)](LICENSE)

**[🌐 Kunjungi Website](https://jambiadventure.web.id)** · **[📋 Laporkan Bug](https://github.com/Vindra999/travel-website/issues)**

</div>

---

## 📸 Tampilan Website

<div align="center">

| Halaman Beranda | Halaman Berita |
|:-:|:-:|
| ![Beranda](https://i.imgur.com/placeholder1.png) | ![Berita](https://i.imgur.com/placeholder2.png) |

| Toko Outdoor | Dashboard Admin |
|:-:|:-:|
| ![Toko](https://i.imgur.com/placeholder3.png) | ![Admin](https://i.imgur.com/placeholder4.png) |

</div>

> **🌐 Live Demo:** [https://jambiadventure.web.id](https://jambiadventure.web.id)

---

## 📖 Tentang JambiAdventure

**JambiAdventure** adalah platform wisata digital yang dirancang khusus untuk mempromosikan keindahan alam dan destinasi petualangan di Provinsi Jambi. Website ini menjadi jembatan antara wisatawan dengan pengalaman alam terbaik — mulai dari informasi destinasi, berita wisata terkini, hingga pembelian perlengkapan outdoor secara online.

### Visi & Misi
- 🎯 Menjadi portal wisata petualangan Jambi yang paling lengkap dan terpercaya
- 🌿 Mempromosikan keindahan alam Jambi (Gunung Kerinci, Danau Gunung Tujuh, dll.)
- 🛒 Memudahkan wisatawan mendapatkan perlengkapan outdoor berkualitas
- 📰 Menyajikan berita dan inspirasi perjalanan yang informatif

---

## ✨ Fitur Utama

### 👤 Fitur untuk Pengunjung (Tanpa Login)
| Fitur | Deskripsi |
|---|---|
| 🏠 **Halaman Beranda** | Hero banner, berita terkini, destinasi unggulan, dan produk populer |
| 🗺️ **Destinasi Wisata** | Jelajahi destinasi wisata Jambi lengkap dengan foto dan lokasi |
| 📰 **Berita & Artikel** | Baca artikel dan inspirasi perjalanan tanpa perlu login |
| 🛒 **Toko Outdoor** | Lihat katalog produk perlengkapan outdoor beserta rating & ulasan |
| 📄 **Halaman Informasi** | Tentang Kami, Layanan, dan Kebijakan Privasi |

### 🔐 Fitur untuk Member (Setelah Login)
| Fitur | Deskripsi |
|---|---|
| 💳 **Checkout & Pembayaran** | Pembelian produk dengan integrasi payment gateway Midtrans |
| 📦 **Riwayat Transaksi** | Pantau status pesanan (pending, paid, cancelled) |
| ⭐ **Review Produk** | Berikan ulasan dan rating untuk produk yang dibeli |
| 👤 **Manajemen Profil** | Edit data diri dan akun |
| 🔄 **Resume Pembayaran** | Lanjutkan pembayaran yang tertunda |

### 🛡️ Fitur Admin
| Fitur | Deskripsi |
|---|---|
| 📍 **Kelola Destinasi** | CRUD destinasi wisata beserta foto dan koordinat peta |
| 📝 **Kelola Berita** | Buat, edit, dan hapus artikel berita dengan upload thumbnail |
| 👥 **Manajemen User** | Lihat dan kelola seluruh akun pengguna |

### 🏪 Fitur Seller
| Fitur | Deskripsi |
|---|---|
| 📦 **Kelola Produk** | CRUD produk outdoor yang dijual di toko |

---

## 🛠️ Tech Stack

### Backend
| Teknologi | Versi | Kegunaan |
|---|---|---|
| **PHP** | 8.2+ | Bahasa pemrograman utama |
| **Laravel** | 12.x | Framework backend utama |
| **Laravel Breeze** | 2.4 | Autentikasi (login, register, reset password) |
| **Spatie Permission** | 6.x | Role & Permission (Admin, Seller, User) |
| **Midtrans PHP** | 2.6 | Payment gateway untuk transaksi |

### Frontend
| Teknologi | Versi | Kegunaan |
|---|---|---|
| **Blade** | - | Template engine Laravel |
| **TailwindCSS** | 3.x | Utility-first CSS framework |
| **Alpine.js** | 3.x | Interaktivitas ringan di frontend |
| **Vite** | 7.x | Bundler asset modern |
| **Axios** | 1.x | HTTP client untuk request API |

### Database & Infrastruktur
| Teknologi | Kegunaan |
|---|---|
| **MySQL** | Database utama |
| **InfinityFree** | Shared hosting production |
| **GitHub Actions** | CI/CD — auto deploy via FTP ke hosting |

---

## 🗄️ Struktur Database

```
users               — Data pengguna & autentikasi
├── roles           — Peran: Admin, Seller, User (via Spatie)
destinations        — Data destinasi wisata
├── id, name, description, location, image, latitude, longitude
posts               — Artikel dan berita wisata
├── id, user_id, title, content, category, image
products            — Produk perlengkapan outdoor
├── id, name, description, price, image, seller_id, avg_rating
product_reviews     — Ulasan & rating produk
├── id, user_id, product_id, rating, comment
transactions        — Riwayat pembelian
├── id, user_id, order_id, product_id, quantity, total_price, status, snap_token
```

---

## 📁 Struktur Proyek

```
jambiadventure/
│
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/
│   │   │   │   └── UserController.php       # Manajemen user oleh admin
│   │   │   ├── Seller/
│   │   │   │   └── ProductController.php    # CRUD produk oleh seller
│   │   │   ├── CheckoutController.php       # Proses checkout & Midtrans
│   │   │   ├── DestinationController.php    # CRUD destinasi
│   │   │   ├── HomeController.php           # Halaman beranda
│   │   │   ├── PostController.php           # CRUD berita/artikel
│   │   │   ├── ProfileController.php        # Manajemen profil
│   │   │   ├── StoreController.php          # Katalog toko & review
│   │   │   ├── TransactionController.php    # Riwayat transaksi
│   │   │   └── PaymentNotificationController.php  # Webhook Midtrans
│   │   └── Middleware/
│   │       └── RoleMiddleware.php           # Proteksi akses berdasarkan role
│   └── Models/
│       ├── User.php
│       ├── Destination.php
│       ├── Post.php
│       ├── Product.php
│       ├── ProductReview.php
│       └── Transaction.php
│
├── resources/views/
│   ├── layouts/
│   │   └── app.blade.php                   # Layout utama (navbar, footer)
│   ├── home.blade.php                      # Halaman beranda
│   ├── admin/
│   │   ├── posts/                          # Kelola berita (admin)
│   │   ├── destinasi/                      # Kelola destinasi (admin)
│   │   └── users/                          # Kelola user (admin)
│   ├── seller/
│   │   └── products/                       # Kelola produk (seller)
│   ├── posts/                              # Halaman berita publik
│   ├── destinations/                       # Halaman destinasi publik
│   ├── products/                           # Halaman toko publik
│   ├── checkout/                           # Halaman pembayaran
│   ├── profile/                            # Dashboard & profil user
│   └── auth/                              # Login, register, dll.
│
├── routes/
│   ├── web.php                             # Definisi semua route
│   └── auth.php                            # Route autentikasi (Breeze)
│
├── database/
│   └── migrations/                         # Skema tabel database
│
├── public/
│   └── uploads/posts/                      # Upload gambar berita
│
├── .github/workflows/
│   └── deploy.yml                          # CI/CD auto-deploy via FTP
│
└── .env                                    # Konfigurasi environment
```

---

## ⚙️ Instalasi & Menjalankan Lokal

### Prasyarat
Pastikan sudah terinstall:
- **PHP** >= 8.2
- **Composer** >= 2.x
- **Node.js** >= 18.x & **NPM**
- **MySQL** (atau database lain yang kompatibel)

### Langkah Instalasi

**1. Clone repository**
```bash
git clone https://github.com/Vindra999/travel-website.git
cd travel-website
```

**2. Install dependensi PHP**
```bash
composer install
```

**3. Install dependensi Node.js**
```bash
npm install
```

**4. Salin file environment**
```bash
cp .env.example .env
```

**5. Generate application key**
```bash
php artisan key:generate
```

**6. Konfigurasi database di `.env`**
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=jambiadventure
DB_USERNAME=root
DB_PASSWORD=
```

**7. Konfigurasi Midtrans di `.env`** (untuk fitur pembayaran)
```env
MIDTRANS_SERVER_KEY=your_server_key
MIDTRANS_CLIENT_KEY=your_client_key
MIDTRANS_IS_PRODUCTION=false
```

**8. Jalankan migrasi database**
```bash
php artisan migrate
```

**9. Build asset frontend**
```bash
npm run build
```

**10. Jalankan server development**
```bash
composer run dev
# atau secara terpisah:
php artisan serve
npm run dev
```

Website akan berjalan di: **http://localhost:8000**

---

## 🚀 Deployment (Production)

Website menggunakan **GitHub Actions** untuk auto-deploy ke InfinityFree Hosting melalui FTP setiap kali ada push ke branch `main`.

### Setup GitHub Secrets
Tambahkan secrets berikut di repository GitHub:

| Secret | Keterangan |
|---|---|
| `FTP_SERVER` | Alamat server FTP hosting |
| `FTP_USERNAME` | Username FTP |
| `FTP_PASSWORD` | Password FTP |

### Catatan Khusus untuk Shared Hosting (InfinityFree)
Karena InfinityFree tidak mendukung symbolic links, gambar yang diupload disimpan langsung di folder `public/uploads/posts/` (bukan di `storage/`) agar bisa diakses via URL secara langsung.

---

## 👥 Role & Akses

| Role | Akses |
|---|---|
| **Tamu** (belum login) | Beranda, Destinasi, Berita, Toko (lihat saja) |
| **User** | Semua fitur tamu + Checkout, Riwayat Transaksi, Review Produk, Profil |
| **Seller** | Semua fitur user + Kelola Produk sendiri |
| **Admin** | Akses penuh: Kelola Destinasi, Berita, dan User |

---

## 🌐 Halaman Website

| URL | Akses | Deskripsi |
|---|---|---|
| `/` | Publik | Halaman Beranda |
| `/destinasi` | Publik | Daftar Destinasi Wisata |
| `/destinasi/{id}` | Publik | Detail Destinasi |
| `/toko` | Publik | Katalog Toko Outdoor |
| `/toko/{id}` | Publik | Detail Produk |
| `/berita` | Publik | Daftar Artikel & Berita |
| `/berita/{id}` | Publik | Detail Artikel |
| `/dashboard` | Login | Dashboard Pengguna |
| `/riwayat-transaksi` | Login | Riwayat Pembelian |
| `/profile` | Login | Kelola Profil |
| `/checkout` | Login | Proses Pembelian |
| `/admin/berita` | Admin | Kelola Berita |
| `/admin/destinasi` | Admin | Kelola Destinasi |
| `/admin/users` | Admin | Kelola Pengguna |
| `/seller/products` | Seller | Kelola Produk |

---

## 💳 Alur Pembayaran

```
User pilih produk → Tambah ke keranjang → Checkout
       ↓
Midtrans Snap (popup pembayaran)
       ↓
User bayar (Transfer/QRIS/dll.)
       ↓
Midtrans kirim webhook → /midtrans/callback
       ↓
Status transaksi diupdate: pending → paid
       ↓
User bisa lihat di Riwayat Pembelian
```

---

## 📦 Dependensi Utama

```json
{
  "require": {
    "php": "^8.2",
    "laravel/framework": "^12.0",
    "midtrans/midtrans-php": "^2.6",
    "spatie/laravel-permission": "^6.25"
  },
  "devDependencies": {
    "tailwindcss": "^3.1.0",
    "alpinejs": "^3.4.2",
    "vite": "^7.0.7",
    "laravel-breeze": "^2.4"
  }
}
```

---

## 🤝 Kontribusi

Kontribusi sangat terbuka! Silakan fork repository ini dan buat pull request.

1. Fork project ini
2. Buat branch baru: `git checkout -b fitur/nama-fitur`
3. Commit perubahan: `git commit -m 'feat: tambah fitur X'`
4. Push ke branch: `git push origin fitur/nama-fitur`
5. Buat Pull Request

---

## 📄 Lisensi

Project ini menggunakan lisensi [MIT](https://opensource.org/licenses/MIT).

---

<div align="center">

**Dibuat dengan ❤️ untuk memajukan wisata Jambi**

[🌐 jambiadventure.web.id](https://jambiadventure.web.id)

</div>