PROYEK UAS: APLIKASI EDUKOMPUTER (LARAVEL 11)

Nurhasanah Maulani Putri
C2383207041
PTI-5B

Deskripsi:
Aplikasi manajemen konten komponen komputer yang mendukung 
sistem autentikasi (Login/Admin) dan pengelolaan artikel 
dengan fitur unggah gambar (Rich Text Editor).

-----------------------------------------------------------
LANGKAH-LANGKAH INSTALASI
-----------------------------------------------------------

1. DATABASE:
   - Buat database baru di phpMyAdmin dengan nama: blog-komputer
   - Import file database (.sql) yang disertakan dalam folder ini ke database tersebut.

2. KONFIGURASI:
   - Buka file '.env' di root folder.
   - Pastikan DB_DATABASE=blog-komputer
   - Pastikan DB_USERNAME=root (atau sesuaikan dengan database lokal Anda).

3. DEPENDENSI (Jika folder vendor tidak disertakan):
   - Buka terminal/CMD di folder proyek.
   - Jalankan perintah: composer install
   - Jalankan perintah: npm install && npm run build

4. OPTIMASI & STORAGE:
   - Jalankan perintah: php artisan key:generate
   - Jalankan perintah: php artisan storage:link
   - Pastikan folder 'public/media' sudah tersedia (untuk penyimpanan gambar artikel).

5. MENJALANKAN APLIKASI:
   - Jalankan perintah: php artisan serve
   - Akses aplikasi di browser: http://127.0.0.1:8000

-----------------------------------------------------------
AKSES LOGIN ADMIN
-----------------------------------------------------------
Email: putri4@gmail.com
Password: 12345678
-----------------------------------------------------------
FITUR UNGGULAN:
- CRUD (Create, Read, Update, Delete) Komponen Komputer.
- Integrasi CKEditor 5 (Superbuild) untuk pembuatan artikel.
- Fitur Upload & Adjust Gambar (Resize/Alignment) di dalam artikel.
- Tampilan Responsif (Mobile Friendly) menggunakan Tailwind CSS & Bootstrap.
===========================================================
