# Panduan Setup Lokal dan Deployment Cloud

Project ini adalah aplikasi Laravel untuk kebutuhan tugas besar Komputasi Awan. README ini dibuat sebagai panduan kerja tim: cara menjalankan aplikasi di lokal, cara melakukan migrasi database, dan gambaran deployment ke cloud dengan komponen Web Server, Database Server, dan Load Balancer.

## Ringkasan Project

Fitur utama aplikasi:

- Autentikasi login dan register.
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

Jangan upload folder berikut ke Git atau ke ZIP pengumpulan source code jika tidak diminta:

```txt
vendor/
node_modules/
.env
```

Folder `vendor` bisa sangat besar karena berisi dependency Laravel. Folder ini dapat dibuat ulang dengan:

```bash
composer install
```

File `.env` berisi konfigurasi lokal masing-masing anggota, jadi cukup gunakan `.env.example` sebagai template.

## Kebutuhan Software Lokal

Pilih salah satu cara:

- XAMPP: Apache, MySQL, PHP.
- Laragon: Apache/Nginx, MySQL, PHP.

Tambahan yang tetap dibutuhkan:

- PHP 8.2 atau lebih baru.
- Composer.
- Node.js dan npm jika ingin rebuild asset frontend.
- Git jika project diambil dari repository.

Untuk mengecek versi:

```bash
php -v
composer -V
node -v
npm -v
```

## Cara Menjalankan di Lokal dengan XAMPP

1. Buka XAMPP Control Panel.
2. Jalankan service Apache dan MySQL.
3. Letakkan project di folder yang mudah diakses, contoh:

```txt
C:\xampp\htdocs\tubes_cc
```

4. Masuk ke folder project lewat terminal:

```bash
cd C:\xampp\htdocs\tubes_cc
```

5. Install dependency PHP:

```bash
composer install
```

6. Buat file `.env` dari template:

```bash
copy .env.example .env
```

Jika memakai Git Bash atau terminal Linux/macOS:

```bash
cp .env.example .env
```

7. Generate application key:

```bash
php artisan key:generate
```

8. Buat database baru lewat phpMyAdmin:

```txt
http://localhost/phpmyadmin
```

Contoh nama database:

```txt
tubes_cc
```

9. Ubah konfigurasi database di file `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tubes_cc
DB_USERNAME=root
DB_PASSWORD=
```

10. Jalankan migrasi database:

```bash
php artisan migrate
```

11. Jika ingin mengisi data awal dari seeder:

```bash
php artisan db:seed
```

Atau reset database dan isi ulang:

```bash
php artisan migrate:fresh --seed
```

12. Jalankan aplikasi:

```bash
php artisan serve
```

13. Buka aplikasi di browser:

```txt
http://127.0.0.1:8000
```

## Cara Menjalankan di Lokal dengan Laragon

1. Buka Laragon.
2. Jalankan service Apache/Nginx dan MySQL.
3. Simpan project di folder:

```txt
C:\laragon\www\tubes_cc
```

4. Masuk ke folder project:

```bash
cd C:\laragon\www\tubes_cc
```

5. Install dependency:

```bash
composer install
```

6. Buat file `.env`:

```bash
copy .env.example .env
```

7. Generate application key:

```bash
php artisan key:generate
```

8. Buat database melalui Laragon, phpMyAdmin, atau Adminer.
9. Sesuaikan file `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tubes_cc
DB_USERNAME=root
DB_PASSWORD=
```

10. Jalankan migrasi:

```bash
php artisan migrate
```

11. Jalankan seeder jika dibutuhkan:

```bash
php artisan db:seed
```

12. Jalankan aplikasi:

```bash
php artisan serve
```

13. Buka:

```txt
http://127.0.0.1:8000
```

Jika Laragon menggunakan pretty URL, aplikasi juga bisa diakses dengan domain lokal seperti:

```txt
http://tubes_cc.test
```

Pastikan document root mengarah ke folder `public`.

## Build Asset Frontend

Jika tampilan CSS/JS tidak berubah setelah edit file di `resources`, install dependency Node:

```bash
npm install
```

Untuk development:

```bash
npm run dev
```

Untuk build production:

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

Menjalankan migrasi baru:

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

## Troubleshooting Lokal

Jika muncul error `No application encryption key has been specified`:

```bash
php artisan key:generate
```

Jika muncul error koneksi database:

- Pastikan MySQL berjalan.
- Pastikan database sudah dibuat.
- Pastikan `DB_DATABASE`, `DB_USERNAME`, dan `DB_PASSWORD` di `.env` benar.

Jika route, config, atau tampilan seperti tidak update:

```bash
php artisan optimize:clear
```

Jika storage upload/public file tidak bisa diakses:

```bash
php artisan storage:link
```

Jika dependency PHP error:

```bash
composer install
composer dump-autoload
```

Jika asset frontend error:

```bash
npm install
npm run build
```

## Requirement Tugas Besar Cloud

Setiap kelompok diwajibkan melakukan deployment aplikasi ke layanan cloud.

Aplikasi yang digunakan boleh aplikasi lama yang pernah dibuat sebelumnya.

Infrastruktur cloud minimal harus memuat:

1. Web Server.
2. Database Server.
3. Load Balancer.

Output yang diharapkan:

- Aplikasi dapat diakses secara online melalui layanan cloud.

Platform cloud yang boleh digunakan:

- Microsoft Azure.
- Amazon Web Services (AWS).
- Google Cloud Platform (GCP).
- Oracle Cloud.
- Layanan cloud lain yang mendukung kebutuhan server.

Dokumentasi yang wajib dibuat:

- Arsitektur cloud yang digunakan.
- Konfigurasi layanan.
- Proses deployment.
- Bukti aplikasi berhasil diakses secara online.

Saat presentasi/demo, kelompok perlu menjelaskan:

- Arsitektur cloud yang digunakan.
- Cara deployment aplikasi.
- Pembagian layanan server.
- Implementasi load balancer.
- Hasil akhir aplikasi yang berjalan di cloud.

## Arsitektur Cloud yang Disarankan

Arsitektur minimal:

```txt
User / Browser
      |
      v
Load Balancer
      |
      v
Web Server
      |
      v
Database Server
```

Arsitektur yang lebih baik untuk demo load balancer:

```txt
User / Browser
      |
      v
Load Balancer
      |
      +------------------+
      |                  |
      v                  v
Web Server 1        Web Server 2
      |                  |
      +--------+---------+
               |
               v
        Database Server
```

Penjelasan komponen:

- Load Balancer menerima request dari user dan meneruskannya ke web server.
- Web Server menjalankan aplikasi Laravel.
- Database Server menyimpan data aplikasi.

Untuk kebutuhan tubes, Load Balancer dengan satu Web Server biasanya masih bisa dipakai untuk menunjukkan komponen arsitektur. Namun, dua Web Server akan lebih meyakinkan karena benar-benar menunjukkan pembagian traffic.

## Contoh Pembagian Layanan Cloud

Contoh umum di AWS:

- Load Balancer: AWS Elastic Load Balancer.
- Web Server: EC2 instance Ubuntu.
- Database Server: Amazon RDS MySQL atau EC2 terpisah dengan MySQL.

Contoh umum di Azure:

- Load Balancer: Azure Load Balancer atau Application Gateway.
- Web Server: Azure Virtual Machine Ubuntu.
- Database Server: Azure Database for MySQL atau VM terpisah dengan MySQL.

Contoh umum di GCP:

- Load Balancer: Cloud Load Balancing.
- Web Server: Compute Engine VM.
- Database Server: Cloud SQL MySQL atau VM terpisah dengan MySQL.

Contoh umum di Oracle Cloud:

- Load Balancer: Oracle Cloud Load Balancer.
- Web Server: Compute Instance Ubuntu.
- Database Server: MySQL Database Service atau Compute Instance terpisah.

## Langkah Deployment Cloud

Bagian ini menggunakan pendekatan umum yang bisa diterapkan di AWS, Azure, GCP, Oracle Cloud, atau cloud lain.

### 1. Siapkan Database Server

1. Buat database server MySQL/MariaDB.
2. Buat database baru, contoh:

```txt
tubes_cc
```

3. Buat user database khusus aplikasi.
4. Izinkan koneksi dari Web Server ke Database Server.
5. Catat informasi berikut:

```txt
DB_HOST
DB_PORT
DB_DATABASE
DB_USERNAME
DB_PASSWORD
```

Catatan keamanan:

- Jangan membuka database ke semua IP jika tidak perlu.
- Lebih baik database hanya bisa diakses dari Web Server.

### 2. Siapkan Web Server

1. Buat VM/instance Ubuntu.
2. Install package dasar:

```bash
sudo apt update
sudo apt install nginx mysql-client unzip git curl -y
```

3. Install PHP dan extension yang dibutuhkan Laravel:

```bash
sudo apt install php php-cli php-fpm php-mysql php-mbstring php-xml php-curl php-zip php-bcmath -y
```

4. Install Composer:

```bash
curl -sS https://getcomposer.org/installer -o composer-setup.php
sudo php composer-setup.php --install-dir=/usr/local/bin --filename=composer
composer -V
```

5. Ambil source code project:

```bash
cd /var/www
sudo git clone <URL_REPOSITORY> tubes_cc
cd tubes_cc
```

Jika tidak menggunakan Git, upload ZIP project lalu extract ke:

```txt
/var/www/tubes_cc
```

Jangan upload folder `vendor` jika ingin ukuran upload lebih kecil. Setelah source ada di server, jalankan `composer install`.

### 3. Install Dependency di Server

Masuk ke folder project:

```bash
cd /var/www/tubes_cc
```

Install dependency production:

```bash
composer install --no-dev --optimize-autoloader
```

Jika server juga digunakan untuk build asset:

```bash
npm install
npm run build
```

Jika asset sudah ada di `public/build`, langkah npm bisa dilewati.

### 4. Konfigurasi File .env Production

Buat file `.env`:

```bash
cp .env.example .env
```

Edit `.env`:

```bash
nano .env
```

Contoh konfigurasi production:

```env
APP_NAME="Tubes Cloud"
APP_ENV=production
APP_KEY=
APP_DEBUG=false
APP_URL=http://IP_ATAU_DOMAIN_LOAD_BALANCER

DB_CONNECTION=mysql
DB_HOST=IP_ATAU_HOST_DATABASE_SERVER
DB_PORT=3306
DB_DATABASE=tubes_cc
DB_USERNAME=user_database
DB_PASSWORD=password_database

SESSION_DRIVER=database
CACHE_STORE=database
QUEUE_CONNECTION=database
```

Generate key:

```bash
php artisan key:generate
```

### 5. Jalankan Migrasi di Server

Jalankan:

```bash
php artisan migrate
```

Jika butuh data awal:

```bash
php artisan db:seed
```

Untuk reset total saat masih demo/testing:

```bash
php artisan migrate:fresh --seed
```

Hati-hati: `migrate:fresh --seed` akan menghapus isi tabel lama.

### 6. Set Permission Laravel

Laravel perlu permission write ke folder `storage` dan `bootstrap/cache`:

```bash
sudo chown -R www-data:www-data /var/www/tubes_cc
sudo chmod -R 775 /var/www/tubes_cc/storage
sudo chmod -R 775 /var/www/tubes_cc/bootstrap/cache
```

Buat storage link:

```bash
php artisan storage:link
```

### 7. Konfigurasi Nginx

Buat file konfigurasi:

```bash
sudo nano /etc/nginx/sites-available/tubes_cc
```

Contoh konfigurasi:

```nginx
server {
    listen 80;
    server_name _;
    root /var/www/tubes_cc/public;

    index index.php index.html;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/run/php/php-fpm.sock;
    }

    location ~ /\.ht {
        deny all;
    }
}
```

Catatan:

- Pada beberapa server, socket PHP bisa berbeda, misalnya `/run/php/php8.2-fpm.sock` atau `/run/php/php8.3-fpm.sock`.
- Cek socket PHP dengan:

```bash
ls /run/php
```

Aktifkan konfigurasi:

```bash
sudo ln -s /etc/nginx/sites-available/tubes_cc /etc/nginx/sites-enabled/
sudo nginx -t
sudo systemctl restart nginx
```

### 8. Optimasi Laravel untuk Production

Jalankan:

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

Jika ada perubahan `.env`, bersihkan cache dulu:

```bash
php artisan optimize:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### 9. Siapkan Load Balancer

1. Buat Load Balancer di platform cloud.
2. Tambahkan Web Server sebagai backend/target.
3. Arahkan listener HTTP port 80 ke backend Web Server port 80.
4. Buat health check ke path:

```txt
/
```

atau:

```txt
/login
```

5. Pastikan security group/firewall:

- Load Balancer menerima traffic dari internet pada port 80/443.
- Web Server menerima traffic hanya dari Load Balancer pada port 80/443.
- Database Server menerima traffic hanya dari Web Server pada port 3306.

6. Setelah Load Balancer aktif, akses aplikasi lewat DNS/IP Load Balancer.

### 10. Jika Menggunakan Dua Web Server

Jika menggunakan Web Server 1 dan Web Server 2:

1. Deploy source code yang sama ke kedua server.
2. Isi `.env` dengan konfigurasi yang sama, terutama:

```env
APP_KEY=nilai_yang_sama_di_semua_web_server
DB_HOST=database_server_yang_sama
```

3. Keduanya harus mengarah ke Database Server yang sama.
4. Jalankan migrasi cukup dari salah satu Web Server.
5. Daftarkan kedua Web Server ke Load Balancer.

Catatan penting:

- `APP_KEY` harus sama di semua Web Server agar session dan enkripsi Laravel konsisten.
- Jika ada file upload, storage perlu strategi tambahan seperti shared storage atau object storage. Untuk demo sederhana, fitur upload bisa dibatasi atau hanya gunakan satu Web Server.

## Checklist Deployment

Gunakan checklist ini sebelum presentasi:

- Aplikasi bisa diakses dari internet melalui URL Load Balancer.
- Login/register bisa digunakan.
- Database tersambung.
- Migrasi sudah dijalankan.
- Data utama tampil.
- Form tambah/edit/hapus data berjalan.
- Load Balancer punya backend Web Server yang sehat.
- Security group/firewall sudah sesuai.
- `APP_ENV=production`.
- `APP_DEBUG=false`.
- Web root mengarah ke folder `public`.
- Screenshot bukti akses online sudah disimpan.

## Dokumentasi yang Perlu Dikumpulkan

Minimal dokumentasi tubes sebaiknya memuat:

1. Deskripsi aplikasi.
2. Diagram arsitektur cloud.
3. Daftar layanan cloud yang digunakan.
4. Spesifikasi server:

```txt
Load Balancer:
Web Server:
Database Server:
OS:
PHP version:
Database version:
```

5. Konfigurasi jaringan:

```txt
Port 80/443 untuk akses web
Port 3306 untuk koneksi database internal
```

6. Langkah deployment.
7. Konfigurasi `.env` tanpa menampilkan password asli.
8. Screenshot:

- Halaman aplikasi berhasil dibuka lewat URL cloud.
- Dashboard cloud yang menampilkan Load Balancer.
- Backend/target Web Server pada Load Balancer.
- Database Server.
- Hasil health check.

9. Pembagian tugas anggota kelompok.
10. Kendala dan solusi.

## Alur Kerja Tim

Workflow yang disarankan:

1. Satu orang bertugas mengelola repository/source code.
2. Satu orang bertugas menyiapkan Web Server.
3. Satu orang bertugas menyiapkan Database Server.
4. Satu orang bertugas menyiapkan Load Balancer dan dokumentasi arsitektur.
5. Setelah deployment selesai, semua anggota melakukan testing aplikasi online.

Saat ada perubahan kode:

```bash
git pull
composer install
npm install
npm run build
php artisan migrate
php artisan optimize:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

Jika hanya perubahan backend tanpa dependency baru:

```bash
git pull
php artisan migrate
php artisan optimize:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

## Catatan Akhir

Untuk kebutuhan tugas besar, target utama bukan hanya aplikasinya berjalan, tetapi juga mampu menjelaskan bagaimana aplikasi tersebut ditempatkan di cloud.

Pastikan saat demo bisa menjelaskan alur berikut:

```txt
User membuka URL cloud
-> request masuk ke Load Balancer
-> diteruskan ke Web Server
-> aplikasi Laravel memproses request
-> data dibaca/ditulis ke Database Server
-> response dikirim kembali ke user
```
