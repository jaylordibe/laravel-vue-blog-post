<?php

namespace App\Providers;

use App\Repositories\CommentRepository;
use App\Repositories\Implementation\CommentRepositoryImplementation;
use App\Services\CommentService;
use App\Services\Implementation\CommentServiceImplementation;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        // Add your services here
        $this->app->bind(CommentService::class, CommentServiceImplementation::class);

        // Add your repositories here
        $this->app->bind(CommentRepository::class, CommentRepositoryImplementation::class);

        // Disable wrapping of the outer-most resource array
        JsonResource::withoutWrapping();
    }
}
