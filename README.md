# Panduan Setup Lokal Project Laravel

README ini berisi panduan untuk anggota tim yang ingin menjalankan project di komputer masing-masing menggunakan XAMPP atau Laragon. Bagian deployment cloud akan ditambahkan nanti setelah stack cloud ditentukan bersama.

## Ringkasan Project

Project ini adalah aplikasi Laravel untuk kebutuhan tugas besar Komputasi Awan.

Fitur utama aplikasi:

- Login dan register.
- Dashboard.
- Manajemen guest/tamu.
- Manajemen event.
- Manajemen invitation/undangan.
- Attendance/kehadiran.
- Scan QR/manual scan.
- Manajemen user.

Stack utama:

- Laravel 12.
- PHP minimal 8.2.
- Composer.
- MySQL/MariaDB.
- Vite, Tailwind CSS, dan Alpine.js.

## Catatan Penting untuk Tim

Jangan upload folder/file berikut ke Git atau ZIP source code jika tidak diminta:

```txt
vendor/
node_modules/
.env
```

Penjelasan singkat:

- `vendor/` berisi dependency PHP dari Composer dan ukurannya bisa sangat besar.
- `node_modules/` berisi dependency frontend dari npm.
- `.env` berisi konfigurasi lokal masing-masing anggota, termasuk database dan app key.

Folder `vendor/` bisa dibuat ulang dengan:

```bash
composer install
```

Folder `node_modules/` bisa dibuat ulang dengan:

```bash
npm install
```

Gunakan `.env.example` sebagai template untuk membuat file `.env` lokal.

## Kebutuhan Software Lokal

Pilih salah satu environment lokal:

- XAMPP.
- Laragon.

Software tambahan yang dibutuhkan:

- PHP 8.2 atau lebih baru.
- Composer.
- Node.js dan npm, jika ingin menjalankan atau build asset frontend.
- Git, jika project diambil dari repository.

Cek versi dengan perintah berikut:

```bash
php -v
composer -V
node -v
npm -v
```

Jika `php`, `composer`, atau `npm` tidak dikenali di terminal, pastikan PATH sudah benar atau gunakan terminal bawaan XAMPP/Laragon.

## Setup Lokal dengan XAMPP

1. Buka XAMPP Control Panel.

2. Jalankan service berikut:

```txt
Apache
MySQL
```

3. Letakkan project di folder XAMPP, contoh:

```txt
C:\xampp\htdocs\tubes_cc
```

4. Buka terminal, lalu masuk ke folder project:

```bash
cd C:\xampp\htdocs\tubes_cc
```

5. Install dependency Laravel:

```bash
composer install
```

6. Buat file `.env` dari `.env.example`:

```bash
copy .env.example .env
```

Jika menggunakan Git Bash:

```bash
cp .env.example .env
```

7. Generate application key:

```bash
php artisan key:generate
```

8. Buka phpMyAdmin:

```txt
http://localhost/phpmyadmin
```

9. Buat database baru, contoh:

```txt
tubes_cc
```

10. Buka file `.env`, lalu sesuaikan konfigurasi database:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tubes_cc
DB_USERNAME=root
DB_PASSWORD=
```

Catatan untuk XAMPP default:

- `DB_USERNAME=root`
- `DB_PASSWORD=` dikosongkan

11. Jalankan migrasi database:

```bash
php artisan migrate
```

12. Jika project membutuhkan data awal dari seeder:

```bash
php artisan db:seed
```

Atau jika ingin reset database dan isi ulang dari awal:

```bash
php artisan migrate:fresh --seed
```

13. Jalankan aplikasi:

```bash
php artisan serve
```

14. Buka aplikasi di browser:

```txt
http://127.0.0.1:8000
```

## Setup Lokal dengan Laragon

1. Buka Laragon.

2. Jalankan service berikut:

```txt
Apache atau Nginx
MySQL
```

3. Letakkan project di folder Laragon:

```txt
C:\laragon\www\tubes_cc
```

4. Masuk ke folder project:

```bash
cd C:\laragon\www\tubes_cc
```

5. Install dependency Laravel:

```bash
composer install
```

6. Buat file `.env`:

```bash
copy .env.example .env
```

Jika menggunakan Git Bash:

```bash
cp .env.example .env
```

7. Generate application key:

```bash
php artisan key:generate
```

8. Buat database baru melalui Laragon, phpMyAdmin, atau Adminer.

Contoh nama database:

```txt
tubes_cc
```

9. Sesuaikan konfigurasi database di `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tubes_cc
DB_USERNAME=root
DB_PASSWORD=
```

Catatan:

- Laragon default biasanya memakai user `root` tanpa password.
- Jika MySQL Laragon memakai password, isi `DB_PASSWORD` sesuai password tersebut.

10. Jalankan migrasi:

```bash
php artisan migrate
```

11. Jalankan seeder jika dibutuhkan:

```bash
php artisan db:seed
```

Atau reset database dan seed ulang:

```bash
php artisan migrate:fresh --seed
```

12. Jalankan aplikasi:

```bash
php artisan serve
```

13. Buka aplikasi:

```txt
http://127.0.0.1:8000
```

Jika menggunakan fitur pretty URL Laragon, aplikasi juga bisa diakses melalui domain lokal seperti:

```txt
http://tubes_cc.test
```

Pastikan document root mengarah ke folder:

```txt
public
```

## Setup Asset Frontend

Project ini menggunakan Vite dan Tailwind CSS. Jika hanya ingin menjalankan aplikasi dan asset `public/build` sudah tersedia, langkah npm bisa dilewati.

Jika ingin mengubah file frontend di `resources`, install dependency Node:

```bash
npm install
```

Untuk mode development:

```bash
npm run dev
```

Untuk build asset production:

```bash
npm run build
```

Hasil build akan masuk ke:

```txt
public/build
```

## Perintah Database yang Sering Dipakai

Melihat status migrasi:

```bash
php artisan migrate:status
```

Menjalankan migrasi:

```bash
php artisan migrate
```

Rollback migrasi terakhir:

```bash
php artisan migrate:rollback
```

Reset semua tabel dan migrasi ulang:

```bash
php artisan migrate:fresh
```

Reset semua tabel, migrasi ulang, dan jalankan seeder:

```bash
php artisan migrate:fresh --seed
```

Menjalankan seeder saja:

```bash
php artisan db:seed
```

## Perintah Laravel yang Berguna

Membersihkan cache config, route, view, dan cache aplikasi:

```bash
php artisan optimize:clear
```

Membuat ulang autoload Composer:

```bash
composer dump-autoload
```

Membuat storage link:

```bash
php artisan storage:link
```

Menjalankan server lokal:

```bash
php artisan serve
```

## Alur Kerja Setelah Pull dari Git

Setelah mengambil update terbaru dari repository:

```bash
git pull
composer install
php artisan migrate
php artisan optimize:clear
```

Jika ada perubahan frontend atau `package.json` berubah:

```bash
npm install
npm run build
```

Jika ada perubahan seeder dan ingin reset data lokal:

```bash
php artisan migrate:fresh --seed
```

Hati-hati: perintah `migrate:fresh --seed` akan menghapus data lama di database lokal.

## Troubleshooting Lokal

Jika muncul error `No application encryption key has been specified`:

```bash
php artisan key:generate
```

Jika muncul error koneksi database:

- Pastikan MySQL berjalan di XAMPP/Laragon.
- Pastikan database sudah dibuat.
- Pastikan konfigurasi `DB_DATABASE`, `DB_USERNAME`, dan `DB_PASSWORD` di `.env` benar.
- Jalankan ulang migrasi setelah konfigurasi database benar.

Jika halaman error setelah mengubah `.env`:

```bash
php artisan optimize:clear
```

Jika class/controller/model tidak terbaca:

```bash
composer dump-autoload
```

Jika tampilan CSS/JS tidak sesuai:

```bash
npm install
npm run build
```

Jika port `8000` sudah digunakan:

```bash
php artisan serve --port=8001
```

Lalu buka:

```txt
http://127.0.0.1:8001
```

## Catatan Deployment

Panduan deployment cloud belum ditulis detail di README ini.

Nanti setelah stack cloud ditentukan, bagian deployment akan ditambahkan sesuai layanan yang dipilih, misalnya AWS, Azure, GCP, Oracle Cloud, atau provider lain. Dokumentasi deployment nantinya akan membahas Web Server, Database Server, Load Balancer, konfigurasi layanan, dan bukti aplikasi berhasil diakses online.
