## 💁‍♀️ Tutorial

1. Fork/clone repository ini
2. Duplikat file .env.example menjadi .env
```
copy .env.example .env
```
3. Jalankan composer install
```
composer install
```
4. Generate app key
```
php artisan key:generate
```
5. Jalankan migration beserta seedernya
```
php artisan migrate --seed
```
6. Jalankan perintah storage symbolic link
```
php artisan storage:link
```
7. Jalankan app
```
php artisan serve
```