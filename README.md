# Laravel 8 | Blog Example

## **Post Crud Operations with Jetstream**
- Laravel Install
- Livewire Install
    - Profile Photo
- User Table
- Post Table
    - slug
    - image
- Master Blade
- Dashboard
    - All Post
- User Post CRUD 
    - Validation
- CRUD
    - Create
    - Read
    - Update 
    - Delete 

### Project Install
- ```laravel new projectName```

### Installing Jetstream
**You may use Composer to install Jetstream into your new Laravel project.**
- ```composer require laravel/jetstream```

### Install Jetstream With Livewire
- ```php artisan jetstream:install livewire```

### Finalizing The Installation
**After installing Jetstream, you should install and build your NPM dependencies and migrate your database:**
1.```npm install```
2.```npm run dev```
3.```php artisan migrate``` or ```php artisan migrate:fresh```

### Jetstream Profile Photos Active
**config/jetstream.php => ```'features' =>[ Features::profilePhotos(),]``` => No comments**
```php artisan storage:link```

### Bootstrap Templates
- **[Bootstrapt Album Example](https://getbootstrap.com/docs/4.6/examples/album/).**

## Post | Model and Migration 
- ```php artisam make:model Post -m```
- ```php artisan make:controller PageController```
- ```php artisan make:controller PostController --resource```

### CKEDITOR LARAVEL USE
- **[Ckeditor laravel use](https://artisansweb.net/how-to-use-ckeditor-5-in-laravel/)**
