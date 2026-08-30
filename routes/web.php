<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;

Route::get('/site', [SiteController::class, 'acessar'])
    ->middleware('verificar.permissao');