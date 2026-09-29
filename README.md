# ShopSecure - Starter Template (Group Project AoL)
**Course:** COMP6695001 - Secure Programming  
**Phase:** 1 - Secure App Development  
**Tech Stack:** PHP 8.2 (Native PDO), MySQL 8.0, Docker  

---

## 📌 Ringkasan Proyek
Repository ini adalah **starter skeleton template** untuk tugas kelompok AoL Secure Programming.
Struktur folder, skema database, dan konfigurasi Docker sudah disiapkan agar teman-teman kelompok tinggal mengisi logika masing-masing di file yang sudah dialokasikan.

---

## 🚀 Cara Menjalankan Project (Docker)

Pastikan Docker Desktop / Docker Engine sudah berjalan di komputermu, lalu jalankan:

```bash
# 1. Jalankan container aplikasi dan database
docker compose up -d --build

# 2. Akses aplikasi web di browser:
# http://localhost:8080

# 3. Akses phpMyAdmin (opsional):
# http://localhost:8081
# Server: db | User: secprog_user | Password: secprog_pass123
```

---

## 📁 Struktur Folder & File yang Perlu Diisi

```text
aol-secure-shop/
├── docker-compose.yml          # Konfigurasi container PHP 8.2 & MySQL 8.0
├── Dockerfile                  # Setup Apache & PDO MySQL
├── database/
│   ├── schema.sql              # Struktur tabel (users, password_resets, categories, products, orders)
│   └── seed.sql                # Data awal untuk testing
├── config/
│   └── database.php            # Koneksi PDO ke database
│
├── actions/                    # <-- TEMPAT MENGISI LOGIKA BACKEND PHP
│   ├── do_login.php            # Logika login user
│   ├── do_register.php         # Logika registrasi akun baru
│   ├── do_logout.php           # Logika logout user
│   ├── do_forgot_password.php  # Logika request & reset password
│   ├── do_update_profile.php   # Logika edit biodata profil
│   └── do_update_photo.php     # Logika upload & sanitasi foto profil
│
├── views/                      # <-- HALAMAN DASHBOARD PER ROLE
│   ├── admin/index.php         # Dashboard Admin (Kelola user & kategori)
│   ├── seller/index.php        # Dashboard Seller (CRUD produk toko)
│   └── customer/index.php      # Dashboard Customer (Riwayat pesanan)
│
├── uploads/avatars/            # Direktori penyimpanan foto profil
│
├── index.php                   # Halaman utama / katalog
├── login.php                   # Form login
├── register.php                # Form registrasi
├── forgot-password.php         # Form lupa password
└── profile.php                 # Halaman profil & form upload foto
```

---

## 🛡️ Catatan Penting Keamanan (Secure Programming)
Saat mengoding fitur masing-masing, pastikan selalu menerapkan:
1. **Prepared Statements (`PDO::prepare`)** untuk semua query database (mencegah SQL Injection).
2. **Password Hashing (`password_hash` & `password_verify`)** dengan Bcrypt / Argon2id.
3. **Output Sanitization (`htmlspecialchars`)** saat menampilkan data user ke HTML (mencegah XSS).
4. **Validasi Role / Akses** agar user tidak bisa membuka halaman yang bukan haknya.
5. **Validasi File Upload** (cek ekstensi, MIME type, dan ukuran file) pada fitur ganti foto profil.
