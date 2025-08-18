# Indeks File dan Direktori Lengkap

**Diperbarui:** 2025-01-27  
**Branch:** main  
**Total File:** 139 file (tidak termasuk vendor/, node_modules/, .git/)

## 📁 Struktur Direktori Detail

### `/app/` - Aplikasi Laravel Core (35 files)

#### `/app/Console/` - Artisan Commands (1 file)
- `Commands/UpdateOfflineUsers.php` - Command untuk update status offline user

#### `/app/Events/` - Laravel Events (1 file)  
- `MessageSent.php` - Event untuk pengiriman pesan

#### `/app/Http/Controllers/` - HTTP Controllers (16 files)
**Main Controllers:**
- `AuthController.php` - Autentikasi user
- `Controller.php` - Base controller
- `HomeController.php` - Controller halaman utama
- `LiveChatController.php` - Controller chat real-time
- `PromoController.php` - Controller promosi

**Admin Controllers (`Admin/` subdirectory - 11 files):**
- `AuthController.php` - Autentikasi admin
- `BannerController.php` - Manajemen banner
- `CategoryController.php` - Manajemen kategori game
- `ChatController.php` - Chat admin
- `DashboardController.php` - Dashboard admin
- `GameController.php` - Manajemen game
- `PaymentMethodController.php` - Metode pembayaran
- `PromoController.php` - Manajemen promosi admin
- `ProviderController.php` - Manajemen provider
- `SettingsController.php` - Pengaturan aplikasi
- `UserController.php` - Manajemen user

#### `/app/Http/Middleware/` - HTTP Middleware (3 files)
- `Authenticate.php` - Middleware autentikasi
- `RedirectIfAuthenticated.php` - Redirect jika sudah login
- `UpdateUserOnlineStatus.php` - Update status online user

#### `/app/Jobs/` - Queue Jobs (1 file)
- `SendAdminMessage.php` - Job pengiriman pesan admin

#### `/app/Models/` - Eloquent Models (11 files)
- `Admin.php` - Model admin
- `Banner.php` - Model banner
- `Category.php` - Model kategori
- `Chat.php` - Model chat
- `Game.php` - Model game
- `Message.php` - Model pesan
- `PaymentMethod.php` - Model metode pembayaran
- `Promo.php` - Model promosi
- `Provider.php` - Model provider
- `Setting.php` - Model pengaturan
- `User.php` - Model user

#### `/app/Providers/` - Service Providers (1 file)
- `AppServiceProvider.php` - Service provider utama

### `/bootstrap/` - Bootstrap Files (3 files)
- `app.php` - Bootstrap aplikasi
- `providers.php` - Provider bootstrap
- `cache/.gitignore` - Gitignore cache

### `/config/` - Configuration Files (10 files)
- `app.php` - Konfigurasi aplikasi
- `auth.php` - Konfigurasi autentikasi
- `cache.php` - Konfigurasi cache
- `database.php` - Konfigurasi database
- `filesystems.php` - Konfigurasi filesystem
- `logging.php` - Konfigurasi logging
- `mail.php` - Konfigurasi email
- `queue.php` - Konfigurasi queue
- `services.php` - Konfigurasi services
- `session.php` - Konfigurasi session

### `/database/` - Database Files (33 files)

#### `/database/factories/` - Model Factories (1 file)
- `UserFactory.php` - Factory untuk model User

#### `/database/migrations/` - Database Migrations (27 files)
**Core Laravel:**
- `0001_01_01_000000_create_users_table.php`
- `0001_01_01_000001_create_cache_table.php`
- `0001_01_01_000002_create_jobs_table.php`

**Application Specific (24 migrations):**
- Admin system (2025_08_02_*)
- Chat system (2025_08_02_*, 2025_08_03_*)
- Game system (2025_08_03_*)
- Promo system (2025_08_16_*)
- Balance system (2025_08_17_*)

#### `/database/seeders/` - Database Seeders (4 files)
- `AdminSeeder.php` - Seeder admin
- `DatabaseSeeder.php` - Main seeder
- `GameSeeder.php` - Seeder game
- `SettingSeeder.php` - Seeder pengaturan

### `/public/` - Public Assets (8 files)
#### Static Files:
- `favicon.ico` - Icon website
- `.htaccess` - Apache configuration
- `index.php` - Entry point
- `robots.txt` - Robots configuration

#### CSS Files (`css/` - 2 files):
- `admin-chat-mobile.css` - CSS chat admin mobile
- `custom.css` - CSS custom

#### Images (`images/` - 3 files):
- `jackpotplay.gif` - Animated banner
- `logoadmin.png` - Logo admin
- `logo.png` - Logo utama

### `/resources/` - Resources (39 files)

#### `/resources/css/` - CSS Source (1 file)
- `app.css` - CSS aplikasi utama

#### `/resources/js/` - JavaScript Source (2 files)
- `app.js` - JavaScript aplikasi
- `bootstrap.js` - Bootstrap JavaScript

#### `/resources/views/` - Blade Templates (36 files)

**Admin Views (`admin/` - 24 files):**
- `auth/login.blade.php` - Login admin
- `banners/` (4 files) - CRUD banner
- `categories/` (3 files) - CRUD kategori  
- `chat.blade.php` & `chat/index.blade.php` - Interface chat
- `dashboard/index.blade.php` - Dashboard admin
- `games/` (3 files) - CRUD game
- `layouts/` (2 files) - Layout admin
- `payment_methods/index.blade.php` - Metode pembayaran
- `promos/index.blade.php` - Promosi
- `providers/` (3 files) - CRUD provider
- `settings/index.blade.php` - Pengaturan
- `users/` (4 files) - CRUD user

**Public Views:**
- `components/` (2 files) - Komponen reusable
- `home/` (3 files) - Halaman utama
- `layouts/` (2 files) - Layout utama
- `live-chat/index.blade.php` - Chat publik
- `promo/index.blade.php` - Halaman promo
- `welcome.blade.php` - Landing page

### `/routes/` - Route Definitions (3 files)
- `admin.php` - Route admin (76 lines)
- `console.php` - Route console (9 lines)
- `web.php` - Route web (32 lines)

### `/storage/` - Storage Directory (9 files)
**Gitignore Files untuk Storage:**
- `app/.gitignore`
- `app/private/.gitignore`
- `app/public/.gitignore`
- `framework/cache/.gitignore`
- `framework/cache/data/.gitignore`
- `framework/.gitignore`
- `framework/sessions/.gitignore`
- `framework/testing/.gitignore`
- `framework/views/.gitignore`
- `logs/.gitignore`

### `/tests/` - Test Files (3 files)
- `Feature/ExampleTest.php` - Feature test example
- `TestCase.php` - Base test case
- `Unit/ExampleTest.php` - Unit test example

## 📄 Root Files (12 files)

### Configuration & Build:
- `artisan` - Artisan CLI tool
- `composer.json` - PHP dependencies
- `composer.lock` - PHP dependency lock
- `package.json` - Node.js dependencies
- `package-lock.json` - Node.js dependency lock
- `vite.config.js` - Vite build configuration
- `phpunit.xml` - PHPUnit test configuration

### Documentation & Settings:
- `.editorconfig` - Editor configuration
- `.env.example` - Environment example
- `.gitattributes` - Git attributes
- `.gitignore` - Git ignore rules
- `README.md` - Project readme

### Database & Index:
- `laravel.sql` - Database dump (762 lines)
- `LARAVEL_PROJECTS_INDEX.md` - Existing Laravel project index
- `INDEKS_PROYEK_MENYELURUH.md` - Comprehensive project index
- `INDEKS_TEKNIS_DETAIL.md` - Detailed technical index
- `INDEKS_FILE_DIREKTORI.md` - This file directory index

## 📊 File Distribution Summary

| Kategori | Jumlah File | Persentase |
|----------|-------------|------------|
| PHP Files | 123 | 88.5% |
| Blade Templates | 36 | 25.9% |
| Configuration | 15 | 10.8% |
| Assets (CSS/JS/Images) | 8 | 5.8% |
| Database Files | 33 | 23.7% |
| Documentation | 5 | 3.6% |

## 🔍 Catatan Penting

- **Vendor & Node Modules:** Tidak diindeks (diabaikan)
- **Git Directory:** Tidak diindeks (diabaikan)
- **Storage:** Hanya gitignore files yang diindeks
- **Total Unique Files:** 139 file aktif dalam development

---

**Indeks ini mencakup semua file yang aktif dalam pengembangan proyek, memberikan pandangan menyeluruh tentang struktur dan organisasi kode.**