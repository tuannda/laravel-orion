<?php

use Illuminate\Support\Facades\Route;
use Orion\Facades\Orion;
use Orion\Tests\Fixtures\App\Http\Controllers\PostsController;
use Orion\Tests\Fixtures\App\Http\Controllers\PostUserController;
use Orion\Tests\Fixtures\App\Http\Controllers\PostCategoryController;
use Orion\Tests\Fixtures\App\Http\Controllers\TeamsController;

Route::group(['as' => 'api.', 'prefix' => 'api'], function () {
    Orion::resource('teams', TeamsController::class);
    Orion::resource('posts', PostsController::class)->withSoftDeletes();

    Orion::belongsToResource('posts', 'user', PostUserController::class);
    Orion::belongsToResource('posts', 'category', PostCategoryController::class);
});
