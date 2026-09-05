<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return app(StudentController::class)->index();
});

Route::resource('students', StudentController::class);
