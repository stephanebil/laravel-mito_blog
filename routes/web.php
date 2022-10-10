<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ListOfCategoryController;

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






// route type post avec slug /comment qui traite le formulaire avec la methode store
Route::post('/comment/{id}',[CommentController::class, 'store'])->name('comment.store');

Route::middleware(['auth'])->prefix('dashboard')->group(function () {
    // dashboard
    Route::get('/', function () {
    return view('dashboard');
    })->name('dashboard');
    
    // category
    Route::get('/list-category', [ListOfCategoryController::class, 'index'])->name('categories.home');
    Route::post('/list-category', [ListOfCategoryController::class, 'store'])->name('category.store');
    Route::get('/list-category/delete/{id}', [ListOfCategoryController::class, 'delete'])->name('category.delete');
    // route qui affiche la page formulaire pour modifier la catégorie
    Route::get('/list-category/edit/{id}', [ListOfCategoryController::class, 'edit'])->name('category.edit');
    // route qui modifie la catégorie
    Route::post('/list-category/update/{id}', [ListOfCategoryController::class, 'update'])->name('category.update');
    
    // Route du fichier all-posts.blade.php se trouvant dans pages
    Route::get('/all-posts', [PostController::class, 'allPosts'])->name('posts.all');

    // Route du fichier all-users.blade.php se trouvant dans pages
    Route::get('/all-users', [UserController::class, 'allUsers'])->name('users.all');
    
    // delete image post
    Route::get('/posts/remove-img/{id}', [PostController::class, 'removeImage'])->name('delete.img');

    
});



// faire glisser le dashboard dans authentification auth
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
