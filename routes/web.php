<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [PostController::class, 'index'])->name("home");


// resource nous permet de ne pas créer des routes individuellement (create, edit, delete....)
// Route::resource('posts', PostController::class)->middlware(['auth']);
Route::resource('posts', PostController::class);

// Route du fichier all-posts.blade.php se trouvant dans pages
Route::get('/all-posts', [PostController::class, 'allPosts'])->name('posts.all');

// Route du fichier all-users.blade.php se trouvant dans pages
Route::get('/all-users', [UserController::class, 'allUsers'])->name('users.all');

// route type post avec slug /comment qui traite le formulaire avec la methode store
Route::post('/comment',[CommentController::class, 'store'])->name('comment.store');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
