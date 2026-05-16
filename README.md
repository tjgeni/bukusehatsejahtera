<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

In addition, [Laracasts](https://laracasts.com) contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

You can also watch bite-sized lessons with real-world projects on [Laravel Learn](https://laravel.com/learn), where you will be guided through building a Laravel application from scratch while learning PHP fundamentals.

## Agentic Development

Laravel's predictable structure and conventions make it ideal for AI coding agents like Claude Code, Cursor, and GitHub Copilot. Install [Laravel Boost](https://laravel.com/docs/ai) to supercharge your AI workflow:

```bash
composer require laravel/boost --dev

php artisan boost:install
```

Boost provides your agent 15+ tools and skills that help agents build Laravel applications while following best practices.

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

# Tentang
Ini merupakan aplikasi toko buku sederhana yang bernama Buku Sehat Sejahtera. para bookish dapat melihat-lihat deretan buku, kemudian bisa melakukan pembelian buku juga.. tidak hanya itu jika ada kendala dalam hal apapun kamu dapat menghubungi admin toko Buku Sehat Sejahtera, admin siap untuk membalas pesan kalian. Yuk belanja buku dengan mudah!

# Struktur Project
1. folder app: berisikan Controller, Models, Providers hingga Middleware. yang berfungsi untuk menyimpan proses bisnis, definisi struktur model dan konigurasi aplikasi melalui provider.
2. folder config: berisikan file-file konfigurasi dari laravel yang bisa kita sesuaikan dengan kebutuhan.
3. folder database: semua hal yang berhubungan dengan database seperti migrasi, seeder hingga factories disimpan di folder ini.
4. folder public: berisikan asset-asset public seperti file gambar atau file lainnya yang bisa diakses oleh browser.
5. folder resources: tempat menyimpan semua file yang berhubungan dengan frontend atau cliend side, seperti views (blade), css, dan js.
6. folder routes: tempat menyimpan semua routing dari aplikasi.
7. folder storage: tempat menyimpan semua file hasil upload dari user, selain itu ada logs dari laravel yang juga disimpan di sini.
8. folder tests: tempat menyimpan file-file untuk kebutuhan pengujian aplikasi.
9. folder vendor: berisikan semua library-library yang diinstall melalui perintah composer install.
10. file file lainnya seperti .env, .gitignore, package.json merupakan file yang dibutuhkan untuk menyimpan list library, menyimpan konfigurasi aplikasi.

## Cara menjalankan project Buku Sehat Sejahtera
1. Clone project ini menggunakan link berikut: https://{personal_token_github}@github.com/tjgeni/bukusehatsejahtera.git
2. Pastikan kamu sudah menginstall XAMPP, minimal PHP versi 8.3++, Composer, serta laravel di local system masing-masing.
3. Setelah project terunduh, siapkan file .env dan isi di bagian DB_CONNECTION dengan koneksi db local kamu, dalam hal ini kita menggunakan MySQL.
4. Lalu jalankan perintah `php artisan migrate --seed` di terminal, beberapa file seeder dijalankan secara terpisah menggunakan perintah `php artisan db seed --class='NamaSeederFile'`
5. Lalu, jalankan perintah `composer install` untuk menginstall library yang sudah ada, dan `npm install` + `npm run dev` untuk menginstall asset frontend.
6. Tetelah semuanya selesai, kamu dapat menjalankan project ini menggunakan perintah `php artisaan serve` atau `composer run dev`
7. Voila, project Buku Sehat Sejahtera running di localhost:8000 🎊🎊