<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\HomeController;

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

Route::get('/',[WelcomeController::class, 'index'])->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//show posts
Route::get('/posts/{postId}/show/',[PostController::class, 'show'])->name('posts.show');

//store Comment
Route::post('/comments/{post_id}',[CommentController::class, 'storeComment'])->name('comments.storeComment');

Route::get('/comments/{post_id}',[CommentController::class, 'showComment'])->name('comments.showComment');


//Route Groups->improves security and limits access. 
Route::group(['middlware'=>'auth'], function(){

    //store Post
    Route::post('/posts/store',[PostController::class, 'store'])->name('posts.store');


    //get all posts
    Route::get('/posts/all', [HomeController::class,'allPost'])->name('posts.all');


    //edit post
    Route::get('/posts/{postId}/edit',[PostController::class,'edit'])->name('posts.edit');

    //store updated post
    Route::post('/posts/{postId}/update', [PostController::class, 'update'])->name('posts.update');

    //delete post
    Route::get('/posts/{postId}/delete', [PostController::class, 'delete'])->name('posts.delete');
});




//Admin Routes
 
//only the admin can use this route ---> middleware('admin')
 
Route::group(['middleware'=>['admin','auth']], function(){
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->middleware('admin')->name('admin.dashboard');


});
