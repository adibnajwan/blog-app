# Backend Blog - Laravel

Aplikasi backend untuk manajemen blog yang dibuat dengan Laravel. Proyek ini memiliki halaman admin untuk mengelola blog dan API untuk diakses oleh frontend.

---

## Fitur

* **Halaman Admin:** Area login khusus untuk manajemen konten.
* **Kelola post (CRUD):** Admin bisa menambah, melihat, mengubah, dan menghapus blog.
* **Editor Teks TinyMCE:** Editor visual untuk menulis isi blog.
* **API Publik:** Endpoint JSON untuk menampilkan blog di aplikasi lain (React, Vue, dll).

---

## Teknologi

* **Backend:** Laravel 10
* **Tampilan Admin:** Blade & Tailwind CSS
* **Database:** MySQL
* **Autentikasi:** Laravel Breeze

---

## Cara Menjalankan Proyek

### Syarat
* PHP >= 8.1
* Composer
* Node.js & NPM
* Database (MySQL/sejenisnya)

### Langkah-langkah

1.  **Clone repo ini:**
    ```bash
    git clone https://github.com/adibnajwan/blog-app.git
    cd blog-app
    ```

2.  **Install dependensi:**
    ```bash
    composer install
    npm install
    ```

3.  **Setup file `.env`:**
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4.  **Atur koneksi database di file `.env`:**
    ```env
    DB_DATABASE=nama_db_kamu
    DB_USERNAME=user_db_kamu
    DB_PASSWORD=pass_db_kamu
    ```

5.  **Jalankan migrasi:**
    ```bash
    php artisan migrate
    ```

6.  **Compile aset (biarkan berjalan di satu terminal):**
    ```bash
    npm run dev
    ```

7.  **Jalankan server (di terminal lain):**
    ```bash
    php artisan serve
    ```
    Aplikasi sekarang jalan di `http://127.0.0.1:8000`. Buka `/register` untuk buat akun admin.

---

## Info API

API bisa diakses publik tanpa token.

**Endpoint:**
* `GET /api/posts` - Mengambil semua post.
* `GET /api/posts/{slug}` - Mengambil satu post berdasarkan slug.

**Koleksi Postman:**

Untuk tes API, bisa pakai koleksi Postman ini:

Link: `https://ungu.in/postman-api`
