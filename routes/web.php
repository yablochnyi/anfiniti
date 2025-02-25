<?php

use App\Livewire\About;
use App\Livewire\Contact;
use App\Livewire\Index;
use App\Livewire\Portfolio;
use App\Livewire\PortfolioPage;
use App\Livewire\Services;
use App\Livewire\Service;
use Illuminate\Support\Facades\Route;

Route::get('/', Index::class)->name('index');
Route::get('/about', About::class)->name('about');
Route::get('/contact', Contact::class)->name('contact');
Route::get('/services', Services::class)->name('services');
Route::get('/service/{slug}', Service::class)->name('service');
Route::get('/portfolio', PortfolioPage::class)->name('portfolio');
Route::get('/portfolio/{slug}', Portfolio::class)->name('portfolio.show');
