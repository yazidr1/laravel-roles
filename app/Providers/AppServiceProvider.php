<?php
namespace App\Providers;

use App\Models\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
 /**
 * Register any application services.
 */
 public function register(): void
 {
 //
 }
 /**
 * Bootstrap any application services.
 */
 public function boot(): void
 {
 // Mencari data dari login user yang telah terverifikasi kemudian ditampilkan di view all
view()->composer('*', function ($view) {
if (Auth::check()) {
View::share([
'userGlobal' => User::find(Auth::user()->id),
'judul' => 'E-Office',
'footer' => 'E-Office Production 2024'
]);
} else {
$view->with('userGlobal', null);
}
});
 }
}