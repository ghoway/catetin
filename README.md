# 📒 CATETIN

**CATETIN** adalah aplikasi berbasis web yang dibangun menggunakan Laravel + Filament Admin Panel untuk membantu Anda dalam memantau dan mencatat pemasukan maupun pengeluaran secara efisien. Cocok digunakan secara personal maupun untuk kebutuhan keuangan bisnis kecil.

---

## ✨ Fitur Utama

- ✅ Manajemen kategori pemasukan & pengeluaran
- 📊 Dashboard dengan statistik dan grafik
- 💸 Input transaksi keuangan dengan gambar & catatan
- 📅 Filter transaksi berdasarkan tanggal
- 🔐 Otentikasi pengguna (Login)

---

## 🛠️ Teknologi

- [Laravel 12^](https://laravel.com/)
- [Filament Admin Panel](https://filamentphp.com/)
---

## ⚙️ Cara Instalasi

Ikuti langkah-langkah di bawah ini untuk menjalankan CATETIN :

### 1. Clone Repository

```bash
git clone https://github.com/ghoway/catetin.git
cd catetin
````

### 2. Install Dependency

```bash
composer install
npm install && npm run build
````

### 3. Konfigurasi Environment

```bash
cp .env.example .env
php artisan key:generate
````
Lalu, sesuaikan isi file .env terutama bagian:

```bash
DB_DATABASE=catetin
DB_USERNAME=root
DB_PASSWORD=your_password
````

### 4. Migrasi Database
```bash
php artisan migrate
```
```bash
php artisan tinker
```
```bash
>>> \App\Models\User::create([
    'name' => 'Admin',
    'email' => 'admin@example.com',
    'password' => bcrypt('password'),
]);
```

### 5. Jalankan Server
```bash
php artisan serve
```
