<?php


use App\Http\Controllers\CommentController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\IdeaLikeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\UserController as AdminUserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', dashboardController::class . '@index')->name('dashboard');
Route::get('/feed', FeedController::class)->name('feed')->middleware('auth');

Route::group([
    'prefix' => 'ideas/',
    'as' => 'ideas.'
], function () {
    /*

    Route::get('/{idea}', IdeaController::class . '@show')->name('show');
*/
    Route::group(['middleware' => ['auth']], function () {
        /*
        Route::post('', IdeaController::class . '@store')->name('store');
        Route::get('/{idea}/edit', IdeaController::class . '@edit')->name('edit')->middleware('auth');
        Route::put('/{idea}', IdeaController::class . '@update')->name('update')->middleware('auth');
        Route::delete('/{id}', IdeaController::class . '@destroy')->name('destroy')->middleware('auth');
        */
        Route::post('/{idea}/comment', CommentController::class . '@store')->name('comment.store')->middleware('auth');
    });
});

Route::resource('ideas',IdeaController::class)->except(['index','create','show'])->middleware(['auth']);
Route::resource('ideas',IdeaController::class)->only(['show']);

Route::resource('users',UserController::class)->only(['show']);
Route::resource('users',UserController::class)->only(['edit','update'])->middleware('auth');

Route::get('/profile', UserController::class . '@profile')->name('profile');

Route::post('/users/{user}/follow',FollowerController::class . '@follow')->name('users.follow')->middleware('auth');
Route::post('/users/{user}/unfollow',FollowerController::class . '@unfollow')->name('users.unfollow')->middleware('auth');

Route::post('/ideas/{idea}/like',IdeaLikeController::class . '@like')->name('ideas.like')->middleware('auth');
Route::post('/ideas/{idea}/unlike',IdeaLikeController::class . '@unlike')->name('ideas.unlike')->middleware('auth');

Route::get('/terms', function () {
    return view('terms');
})->name('terms');

Route::group(['middleware'=>['auth','can:admin'],'prefix'=>'/admin','as'=>'admin.'],function(){
    Route::get('/', AdminDashboard::class . '@index')->name('dashboard');
    Route::get('/users', AdminUserController::class . '@index')->name('users');
});
