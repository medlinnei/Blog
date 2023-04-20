<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(['verify' => true]);

Route::group(['namespace' => 'Main'], function () {
   Route::get("/", [\App\Http\Controllers\Main\IndexController::class, "__invoke"])->name('main.index');
});
Route::group(['namespace' => 'Post', 'prefix' => 'posts'], function () {
    Route::get("/", [\App\Http\Controllers\Post\IndexController::class, "__invoke"])->name('post.index');
    Route::get("/{post}", [\App\Http\Controllers\Post\ShowController::class, "__invoke"])->name('post.show');

    Route::group(['namespace' => 'Comment', 'prefix' => '{post}/comments'], function (){
        Route::post("/", [\App\Http\Controllers\Post\Comment\StoreController::class, "__invoke"])
            ->name('post.comment.store');
    });

    Route::group(['namespace' => 'Like', 'prefix' => '{post}/likes'], function (){
        Route::post("/", [\App\Http\Controllers\Post\Like\StoreController::class, "__invoke"])
            ->name('post.like.store');
    });


});

Route::group(['namespace' => 'Personal' , 'prefix' => 'personal', 'middleware' => ['auth', 'verified']], function () {
    Route::group(['namespace' => 'Main'], function () {
        Route::get("/", [\App\Http\Controllers\Personal\Main\IndexController::class, "__invoke"])
            ->name('personal.main.index');
    });
    Route::group(['namespace' => 'Liked', 'prefix' => 'liked'], function () {
        Route::get('/', [\App\Http\Controllers\Personal\Liked\IndexController::class, "__invoke"])
            ->name('personal.liked.index');
        Route::delete("/{post}", [\App\Http\Controllers\Personal\Liked\DeleteController::class, "__invoke"])
            ->name('personal.liked.delete');
    });

    Route::group(['namespace' => 'Comments', 'prefix' => 'comments'], function () {
        Route::get('/', [\App\Http\Controllers\Personal\Comments\IndexController::class, "__invoke"])
            ->name('personal.comments.index');
        Route::get('/{comment}/edit', [\App\Http\Controllers\Personal\Comments\EditController::class, "__invoke"])
            ->name('personal.comments.edit');
        Route::patch('/{comment}', [\App\Http\Controllers\Personal\Comments\UpdateController::class, "__invoke"])
            ->name('personal.comments.update');
        Route::delete('/{comment}', [\App\Http\Controllers\Personal\Comments\DeleteController::class, "__invoke"])
            ->name('personal.comments.delete');

    });
});

Route::group(['namespace' => 'Admin' , 'prefix' => 'admin', 'middleware' => ['auth', 'admin', 'verified']], function (){
    Route::group(['namespace' => 'Main'], function () {
        Route::get("/", [\App\Http\Controllers\Admin\Main\IndexController::class, "__invoke"])
            ->name('admin.main.index');
    });

    Route::group(['namespace' => 'Post', 'prefix' => 'post'], function(){
        Route::get("/", [\App\Http\Controllers\Admin\Post\IndexController::class, "__invoke"])
            ->name('admin.post.index');
        Route::get("/create", [\App\Http\Controllers\Admin\Post\CreateController::class, "__invoke"])
            ->name('admin.post.create');
        Route::post("/", [\App\Http\Controllers\Admin\Post\StoreController::class, "__invoke"])
            ->name('admin.post.store');
        Route::get("/{post}", [\App\Http\Controllers\Admin\Post\ShowController::class, "__invoke"])
            ->name('admin.post.show');
        Route::get("/{post}/edit", [\App\Http\Controllers\Admin\Post\EditController::class, "__invoke"])
            ->name('admin.post.edit');
        Route::patch("/{post}", [\App\Http\Controllers\Admin\Post\UpdateController::class, "__invoke"])
            ->name('admin.post.update');
        Route::delete("/{post}", [\App\Http\Controllers\Admin\Post\DeleteController::class, "__invoke"])
            ->name('admin.post.delete');
    });

    Route::group(['namespace' => 'Comment', 'prefix' => 'category'], function(){
        Route::get("/", [\App\Http\Controllers\Admin\Category\IndexController::class, "__invoke"])
            ->name('admin.category.index');
        Route::get("/create", [\App\Http\Controllers\Admin\Category\CreateController::class, "__invoke"])
            ->name('admin.category.create');
        Route::post("/", [\App\Http\Controllers\Admin\Category\StoreController::class, "__invoke"])
            ->name('admin.category.store');
        Route::get("/{category}", [\App\Http\Controllers\Admin\Category\ShowController::class, "__invoke"])
            ->name('admin.category.show');
        Route::get("/{category}/edit", [\App\Http\Controllers\Admin\Category\EditController::class, "__invoke"])
            ->name('admin.category.edit');
        Route::patch("/{category}", [\App\Http\Controllers\Admin\Category\UpdateController::class, "__invoke"])
            ->name('admin.category.update');
        Route::delete("/{category}", [\App\Http\Controllers\Admin\Category\DeleteController::class, "__invoke"])
            ->name('admin.category.delete');
    });

    Route::group(['namespace' => 'Tag', 'prefix' => 'tags'], function(){
        Route::get("/", [\App\Http\Controllers\Admin\Tag\IndexController::class, "__invoke"])
            ->name('admin.tag.index');
        Route::get("/create", [\App\Http\Controllers\Admin\Tag\CreateController::class, "__invoke"])
            ->name('admin.tag.create');
        Route::post("/", [\App\Http\Controllers\Admin\Tag\StoreController::class, "__invoke"])
            ->name('admin.tag.store');
        Route::get("/{tag}", [\App\Http\Controllers\Admin\Tag\ShowController::class, "__invoke"])
            ->name('admin.tag.show');
        Route::get("/{tag}/edit", [\App\Http\Controllers\Admin\Tag\EditController::class, "__invoke"])
            ->name('admin.tag.edit');
        Route::patch("/{tag}", [\App\Http\Controllers\Admin\Tag\UpdateController::class, "__invoke"])
            ->name('admin.tag.update');
        Route::delete("/{tag}", [\App\Http\Controllers\Admin\Tag\DeleteController::class, "__invoke"])
            ->name('admin.tag.delete');
    });

    Route::group(['namespace' => 'User', 'prefix' => 'user'], function(){
        Route::get("/", [\App\Http\Controllers\Admin\User\IndexController::class, "__invoke"])
            ->name('admin.user.index');
        Route::get("/create", [\App\Http\Controllers\Admin\User\CreateController::class, "__invoke"])
            ->name('admin.user.create');
        Route::post("/", [\App\Http\Controllers\Admin\User\StoreController::class, "__invoke"])
            ->name('admin.user.store');
        Route::get("/{user}", [\App\Http\Controllers\Admin\User\ShowController::class, "__invoke"])
            ->name('admin.user.show');
        Route::get("/{user}/edit", [\App\Http\Controllers\Admin\User\EditController::class, "__invoke"])
            ->name('admin.user.edit');
        Route::patch("/{user}", [\App\Http\Controllers\Admin\User\UpdateController::class, "__invoke"])
            ->name('admin.user.update');
        Route::delete("/{user}", [\App\Http\Controllers\Admin\User\DeleteController::class, "__invoke"])
            ->name('admin.user.delete');
    });
});
