<?php

    namespace App\Providers;


    use App\Livewire\Modal;
    use Illuminate\Pagination\Paginator;
    use Illuminate\Support\ServiceProvider;
    use Livewire\Livewire;

    class AppServiceProvider extends ServiceProvider
    {
        /**
         * Register any application services.
         */
        public function register(): void
        {

        }

        /**
         * Bootstrap any application services.
         */
        public function boot(): void
        {
            Paginator::useBootstrapFive();
            Paginator::useBootstrapFour();
            Livewire::component('modal', Modal::class);

        }
    }
