<?php

use App\Http\Controllers\Idea\IdeaCommentController;
use App\Http\Controllers\Idea\IdeaController;
use App\Http\Controllers\Idea\IdeaStatusController;
use App\Http\Controllers\Idea\IdeaVoteController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/ideas', [IdeaController::class, 'store'])->name('ideas.store');
    Route::patch('/ideas/{idea:slug}', [IdeaController::class, 'update'])->name('ideas.update');
    Route::delete('/ideas/{idea:slug}', [IdeaController::class, 'destroy'])->name('ideas.destroy');

    Route::post('/ideas/{idea:slug}', [IdeaCommentController::class, 'store'])->name('ideas.idea.comments.store');
    Route::get('/ideas/{idea:slug}/votes', [IdeaVoteController::class, 'vote'])->name('ideas.idea.votes.store');
    Route::post('/ideas/{idea:slug}/status', [IdeaStatusController::class, 'update'])->name('ideas.idea.status.update');
});

Route::get('/ideas', [IdeaController::class, 'index'])->name('ideas');
Route::get('/ideas/{idea:slug}', [IdeaController::class, 'show'])->name('ideas.show');

require __DIR__ . '/auth.php';
