# Indeks Proyek Menyeluruh

**Diperbarui:** 2025-01-27  
**Branch:** main  
**Jenis Proyek:** Laravel Web Application  

## 📊 Statistik Proyek

- **Total File PHP:** 123 file (18,033 baris kode)
- **Total File Frontend:** 42 file (13,240 baris kode)
  - Blade Templates: 36 file
  - JavaScript: 3 file
  - CSS: 3 file
- **Total File Migrasi Database:** 27 file
- **Total Model Eloquent:** 11 model

## 🏗️ Struktur Direktori Utama

```
/workspace/
├── app/                    # Logika aplikasi utama
│   ├── Console/           # Artisan commands
│   ├── Events/            # Event classes
│   ├── Http/              # Controllers & Middleware
│   │   ├── Controllers/   # HTTP Controllers
│   │   └── Middleware/    # HTTP Middleware
│   ├── Jobs/              # Queue jobs
│   ├── Models/            # Eloquent models
│   └── Providers/         # Service providers
├── bootstrap/             # Bootstrap files
├── config/                # Configuration files
├── database/              # Database related files
│   ├── factories/         # Model factories
│   ├── migrations/        # Database migrations
│   └── seeders/           # Database seeders
├── public/                # Public assets
├── resources/             # Views, assets, lang files
│   ├── css/               # CSS files
│   ├── js/                # JavaScript files
│   └── views/             # Blade templates
├── routes/                # Route definitions
├── storage/               # Storage directory
└── tests/                 # Test files
```

## 🎯 Komponen Aplikasi

### Models (11 Model)
1. **Admin.php** - Model admin/pengelola
2. **Banner.php** - Model banner promosi
3. **Category.php** - Model kategori game
4. **Chat.php** - Model percakapan
5. **Game.php** - Model permainan
6. **Message.php** - Model pesan chat
7. **PaymentMethod.php** - Model metode pembayaran
8. **Promo.php** - Model promosi
9. **Provider.php** - Model penyedia game
10. **Setting.php** - Model pengaturan aplikasi
11. **User.php** - Model pengguna

### Controllers (5 Controller Utama)
1. **AuthController.php** - Autentikasi pengguna
2. **HomeController.php** - Halaman utama
3. **LiveChatController.php** - Sistem chat langsung
4. **PromoController.php** - Manajemen promosi
5. **Admin/** - Controllers khusus admin

### Routes (3 File Route)
1. **web.php** - Route web utama
2. **admin.php** - Route khusus admin
3. **console.php** - Route console/artisan

### Database Migrations (27 Migrasi)
- **Tabel Utama:** users, admins, chats, messages, banners, settings
- **Tabel Game:** providers, categories, games
- **Tabel Promosi:** promos, payment_methods
- **Tabel Sistem:** cache, jobs
- **Modifikasi:** Berbagai update dan perbaikan struktur

## 🎨 Frontend Components

### View Directories
- **admin/** - Interface admin
- **components/** - Komponen reusable
- **home/** - Halaman beranda
- **layouts/** - Layout template
- **live-chat/** - Interface chat
- **promo/** - Halaman promosi

### Assets
- **CSS Files:** 3 file styling
- **JavaScript Files:** 3 file interaktivitas
- **Blade Templates:** 36 template view

## 🔧 Konfigurasi & Dependencies

### PHP Dependencies (composer.json)
- **Laravel Framework:** ^12.0 (locked: v12.21.0)
- **PHP Version:** ^8.2
- **Skeleton:** laravel/laravel

### Frontend Dependencies (package.json)
- **Build Tool:** Vite
- **Asset Compilation:** Laravel Mix/Vite setup

## 🗄️ Database Schema

### Tabel Pengguna & Autentikasi
- `users` - Data pengguna dengan balance
- `admins` - Data administrator dengan status online

### Tabel Chat & Komunikasi
- `chats` - Percakapan antara user dan admin
- `messages` - Pesan dalam percakapan
- Support guest chat dan multi-sender

### Tabel Game & Provider
- `providers` - Penyedia permainan
- `categories` - Kategori game
- `games` - Data permainan

### Tabel Promosi & Pembayaran
- `promos` - Data promosi dengan title
- `payment_methods` - Metode pembayaran dengan status online
- `banners` - Banner promosi

### Tabel Sistem
- `settings` - Pengaturan aplikasi dengan gif_banner
- `cache` - Cache sistem
- `jobs` - Queue jobs

## 🚀 Fitur Utama Aplikasi

1. **Sistem Autentikasi** - Login/register user dan admin
2. **Live Chat** - Chat real-time antara user dan admin
3. **Game Management** - Manajemen provider, kategori, dan game
4. **Promo System** - Sistem promosi dan banner
5. **Payment Integration** - Integrasi metode pembayaran
6. **User Balance** - Sistem saldo pengguna
7. **Admin Panel** - Interface administrasi lengkap
8. **Guest Chat** - Support chat untuk pengunjung

## 📋 File Konfigurasi Penting

- **composer.json** - Dependencies PHP
- **package.json** - Dependencies JavaScript
- **vite.config.js** - Konfigurasi build tool
- **phpunit.xml** - Konfigurasi testing
- **artisan** - Command line interface
- **laravel.sql** - Database dump (762 baris)

## 🔍 Testing & Quality

- **PHPUnit Configuration** - Setup untuk unit testing
- **Test Directory** - Direktori tests untuk automated testing
- **Linting Configuration** - .editorconfig untuk konsistensi kode

## 📝 Catatan Pengembangan

- Proyek menggunakan Laravel 12.x (versi terbaru)
- Struktur mengikuti best practices Laravel
- Support untuk real-time chat menggunakan sistem polling/websocket
- Database schema sudah mature dengan 27+ migrasi
- Frontend menggunakan Blade templating dengan minimal JavaScript
- Sistem modular dengan separation of concerns yang baik

---

**Indeks ini dibuat secara otomatis pada branch `main` tanpa membuat branch baru sesuai permintaan.**