<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegionController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('public.home');
});

Route::get('/', [HomeController::class, 'index'])->name('home');

//Public routes

Route::get('/Author/{first_name}', [HomeController::class, 'viewAuthor'])->name('author.show');

Route::get('/News/Posts/{headline}', [HomeController::class, 'viewPosts'])->name('posts.show');
Route::any('/search', [HomeController::class, 'filteredPosts'])->name('search-post');

Route::get('/News/Southeastern', [HomeController::class, 'allSouth'])->name('AllSouthNews');
Route::get('/News/Southeastern/{headline}', [HomeController::class, 'viewSouth'])->name('southeastern.show');

Route::get('/News/National', [HomeController::class, 'allNational'])->name('AllNational');
Route::get('/News/National/{headline}', [NewsController::class, 'viewNational'])->name('national.show');

Route::get('/News/International', [HomeController::class, 'allInternational'])->name('AllInternational');
Route::get('/News/International/{headline}', [HomeController::class, 'viewInternational'])->name('international.show');

Route::get('/Categories/Politics', [HomeController::class, 'allPolitics'])->name('AllPolitics');
Route::get('/Categories/Politics/{headline}', [HomeController::class, 'viewPolitics'])->name('politics.show');

Route::get('/Categories/Business', [HomeController::class, 'allBusiness'])->name('AllBusiness');
Route::get('/Categories/Business/{headline}', [HomeController::class, 'viewBusiness'])->name('business.show');

Route::get('/Categories/Lifestyle', [HomeController::class, 'allLifestyle'])->name('AllLifestyle');
Route::get('/Categories/Lifestyle/{headline}', [HomeController::class, 'viewLifestyle'])->name('lifestyle.show');

Route::get('/Categories/Sports', [HomeController::class, 'allSports'])->name('AllSports');
Route::get('/Categories/Sports/{headline}', [HomeController::class, 'viewSports'])->name('sports.show');


Route::get('/storage-link', function(){
    $targetFolder = storage_path('app/public');
    $linkFolder = $_SERVER['DOCUMENT_ROOT'] . '/storage';
    symlink($targetFolder,$linkFolder);
});

Auth::routes();

Route::get('/admin', [AdminController::class, 'index'])->name('admin');

Route::get('/Profile', [ProfileController::class, 'index'])->name('Profile');
Route::get('/ProfilePic', [ProfileController::class, 'picIndex'])->name('ProfilePic');
Route::put('update-image',[ProfileController::class,'update_image'])->name('update-image');
Route::resource('profile', ProfileController::class);

Route::get('/Admin/Categories', [CategoryController::class, 'index'])->name('categories');
Route::resource('categories', CategoryController::class);
Route::get('list-categories', [CategoryController::class, 'anyData'])->name('list-categories');

Route::get('/Admin/Regions', [RegionController::class, 'index'])->name('regions');
Route::resource('regions', RegionController::class);
Route::get('list-regions', [RegionController::class, 'anyData'])->name('list-regions');

Route::get('/News', [NewsController::class, 'index'])->name('news');
Route::resource('news', NewsController::class);
Route::post('/News', [NewsController::class, 'store'])->name('add-news');
Route::get('list-news', [NewsController::class, 'anyData'])->name('list-news');
Route::delete('/news/{id}', [NewsController::class, 'destroy'])->name('delete-news');

