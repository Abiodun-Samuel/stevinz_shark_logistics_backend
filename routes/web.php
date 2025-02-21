<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json(['App' => 'Stevinz Shark Logistics']);
});
