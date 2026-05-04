<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\NewEnquiryController;
use Illuminate\Support\Facades\Route;

Route::get('/', [NewEnquiryController::class, 'create'])->name('enquiry.create');
Route::post('/enquiries', [NewEnquiryController::class, 'store'])->name('enquiry.store');

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('/admin/enquiries/{enquiry}', [AdminController::class, 'show'])->name('admin.show');
Route::post('/admin/enquiries/{enquiry}/status', [AdminController::class, 'updateStatus'])->name('admin.updateStatus');
