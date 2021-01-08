# Dashboard Package
---
Dashboard package create your dashboard with users, roles and settings with only one line.

#### Installation
```bash
composer require alqudiry/dashboard
```


#### Publish 
Before publish the dashboard, please remove these files first:
```bash
app/Models/User.php
database/factories/UserFactory.php
database/migrations/2014_10_12_000000_create_users_table.php
database/migrations/2014_10_12_100000_create_password_resets_table.php
resources/lang/ar
resources/views
package.json
webpack.mix.js
```

publish package
```bash
php artisan vendor:publish --provider="Alqudiry\Dashboard\DashboardServiceProvider"
```

### Configuration
Update your "App\Http\Kernel.php" to include webServiceAuth class:
```php
'webServiceAuth' => \App\Http\Middleware\WebServiceAuth::class,
```

Add FortifyServiceProvider to your "config\app.php":
```php
App\Providers\FortifyServiceProvider::class,
```
Update your "routes\web.php" to include this routes:
```php
Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::group(['as' => 'user.', 'prefix' => 'user'], function () {
        Route::resource('/profile', \App\Http\Controllers\User\ProfileController::class)->only('index', 'store');
    });

    Route::group(['as' => 'dashboard.', 'prefix' => 'dashboard'], function () {
        Route::group(['as' => 'system.', 'prefix' => 'system'], function () {
            Route::resource('/statistics', \App\Http\Controllers\Dashboard\System\StatisticsController::class)->only('index');
            Route::resource('/users', \App\Http\Controllers\Dashboard\System\UsersController::class)->only('index', 'edit', 'update');
            Route::resource('/roles', \App\Http\Controllers\Dashboard\System\RolesController::class)->except('show', 'destroy');
            Route::resource('/web-services', \App\Http\Controllers\Dashboard\System\WebServicesController::class)->except('show', 'destroy');
            Route::resource('/settings', \App\Http\Controllers\Dashboard\System\SettingsController::class)->only('index', 'store');
        });
    });
});
```

### Make App Running
```bash
npm install
npm run dev
```

### You Are Ready ..
