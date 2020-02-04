# bookStore
Simple system development exercise in PHP with Laravel, HTML, CSS, JavaScript and no database.

## 1. Requirements
- PHP >= 7.2
- Composer
- Laravel

## 2. New Configuration

### 2.1 Install PHP 7.2 or >
Download installer: https://www.php.net/downloads

### 2.2 Install Composer
#### Linux
```
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === 'c5b9b6d368201a9db6f74e2611495f369991b72d9c8cbd3ffbc63edff210eb73d46ffbfce88669ad33695ef77dc76976') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
```
#### Windows
Donwload installer: https://getcomposer.org/Composer-Setup.exe

#### 2.3 Install Laravel Framework
```
composer global require laravel/installer
```
Documentation: https://laravel.com/docs/6.x

#### 2.4 Create Laravel Project
```
laravel new bookStore
```

#### 2.5 Clone this repository
```
https://github.com/naldomalk/bookStore.git
```
After cloning, replace the files in project folder.

#### 2.6 Start local development server
```
php artisan serve
```

### 3. API Explorer
- GET / => frontEnd View
- GET /status => get api status
- GET /api/books => get book list
- GET /api/books/<isbn> => get unique book
