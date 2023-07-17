
# Citizen Complaints

Citizen Complaints adalah situs web tempat Anda dapat melaporkan masalah yang Anda miliki dengan sesuatu atau seseorang, Ini seperti tempat yang aman di mana Anda dapat berbicara dan didengarkan. Citizen Complaints membantu memastikan orang yang memiliki masalah agar segera diselesaikan oleh pihak yang berwenang.


## Tech Stack

**Client:** Laravel Blade

**Server:** Laravel

## Fitur

- Otentikasi Pengguna: Warga dapat melakukan registrasi dan login untuk mengakses fitur-fitur aplikasi.
- Penambahan Pengaduan: Pengguna dapat menambahkan pengaduan melalui formulir yang disediakan.
- Pengiriman Pesan ke Admin: Admin menerima pesan pemberitahuan saat pengaduan ditambahkan.
- Pelacakan Status Pengaduan: Pengguna dapat melihat status pengaduan yang telah mereka ajukan.
- Manajemen Pengaduan: Admin dapat melihat dan mengelola pengaduan yang masuk.
- Tindak Lanjut Pengaduan: Admin dapat menindaklanjuti pengaduan yang diajukan oleh pengguna.
- Pemberitahuan Pembaruan: Pengguna menerima pemberitahuan saat ada pembaruan status atau tanggapan terhadap pengaduan mereka.
- Penyelesaian Pengaduan: Admin dapat menyelesaikan pengaduan dan mengubah statusnya menjadi "ditutup".



![Logo](https://live.staticflickr.com/65535/53051589442_62d2c8e4b2_z.jpg)


## Screenshots

Register Page
![App Screenshot](https://live.staticflickr.com/65535/53052364419_ef4e436767_c.jpg)
Log In Page
![App Screenshot](https://live.staticflickr.com/65535/53052657713_8de673fabd_c.jpg)
Add Complaints Page
![App Screenshot](https://live.staticflickr.com/65535/53051589597_35866f3630_c.jpg)
Your Complaints Page
![App Screenshot](https://live.staticflickr.com/65535/53051589427_f0a1a5c3c9_c.jpg)
Admin View
![App Screenshot](https://live.staticflickr.com/65535/53052657763_c12abd3152_c.jpg)

## Installation

Install Citizen Complaints with composer

```bash
  composer install
  cp .env.example .env
  php artisan key:generate
  php artisan migrate
  php artisan serve
```
    
## Authors

- [@akbarsiddic](https://www.github.com/akbarsiddic)
