<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Cart\CartController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Options\OptionController;
use App\Http\Controllers\OptionValue\OptionValueController;
use App\Http\Controllers\Order\OrderController;
use App\Http\Controllers\Product\Option\ProductOptionController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Product\Price\ProductPriceController;
use App\Http\Controllers\Users\UsersController;
use App\Http\Controllers\Users\UsersEducationController;
use App\Http\Controllers\Users\UsersJobController;
use App\Http\Controllers\Users\UsersResidentController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function () {
    Route::post('/auth', 'verifyEmail');
    Route::post('/auth/confirm', 'confirmEmail');
    Route::post('/auth', 'login');
});

Route::controller(UsersController::class)->group(function () {
    Route::post('/register', 'register');
});

Route::controller(UsersResidentController::class)->group(function () {
    Route::post('/register/residents', 'createResident');
});

Route::controller(UsersEducationController::class)->group(function () {
    Route::post('/register/educations', 'createEducation');
});

Route::controller(UsersJobController::class)->group(function () {
    Route::post('/register/jobs', 'createJob');
});

Route::controller(CategoryController::class)->group(function () {
    Route::get('/category', 'findAll');
    Route::get('/category/{name}', 'findByName');
});

Route::controller(ProductController::class)->group(function () {
    Route::get('/product', 'getAll');
    Route::get('/product/{id}', 'getById');
});

Route::middleware(['auth:api', 'admin'])->group(function () {
    Route::post('/category', [CategoryController::class, 'createCategory']);
    Route::put('/category/{name}', [CategoryController::class, 'updateCategoryByName']);
    Route::delete('/category/{name}', [CategoryController::class, 'deleteCategoryByName']);
    Route::post('/product', [ProductController::class, 'create']);
    Route::put('/product/{id}', [ProductController::class, 'updateProductById']);
    Route::delete('/product/{name}', [ProductController::class, 'deleteProductByName']);
    Route::get('/option', [OptionController::class, 'getAllOptions']);
    Route::post('/option', [OptionController::class, 'createOption']);
    Route::delete('/option/{id}', [OptionController::class, 'deleteOptionById']);
    Route::get('/optionvalue', [OptionValueController::class, 'getAllOptionValues']);
    Route::post('/optionvalue', [OptionValueController::class, 'createOptionValues']);
    Route::delete('/optionvalue/{id}', [OptionValueController::class, 'deleteOptionValuesById']);
    Route::get('/productoption', [ProductOptionController::class, 'getAllProductOptions']);
    Route::post('/productoption', [ProductOptionController::class, 'createProductOption']);
    Route::delete('/productoption/{id}', [ProductOptionController::class, 'deleteProductOptionById']);
});

Route::controller(CartController::class)->group(function () {
    Route::get('/cart', 'listCart');
    Route::post('/cart', 'createCart');
    Route::delete('/cart', 'deleteCart');
});

Route::controller(OrderController::class)->group(function () {
    Route::post('/order', 'createOrder');
    Route::get('/order', 'listOrder');
});

//Route::post('/product2', [\App\Http\Controllers\Product2Controller::class, 'createProduct2']);
