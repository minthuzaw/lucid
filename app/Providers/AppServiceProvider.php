<?php

namespace App\Providers;

use App\Helpers\Enum;
use App\Helpers\QueryBuilderHelper;
use App\Services\ApplicationService\Providers\ApplicationServiceServiceProvider;
use App\Services\Book\Providers\BookServiceProvider;
use App\Services\Products\Providers\ProductsServiceProvider;
use Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;
use Laravel\Telescope\Telescope;
use Laravel\Telescope\TelescopeServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->registerLucidApplicationProviders();
        $this->configurePassport();
        $this->configureDevelopmentPackages();

        Factory::guessFactoryNamesUsing(function ($modelName) {
            return 'Database\\Factories\\'.class_basename($modelName).'Factory';
        });
    }

    public function boot()
    {
        $this->registerBlueprintMacros();
        $this->registerCollectionMacros();
        $this->registerQueryBuilderMacros();
    }

    private function registerLucidApplicationProviders()
    {
        if (config('core.toggle_app_services')) {
            $this->app->register(ApplicationServiceServiceProvider::class);
            $this->app->register(ProductsServiceProvider::class);
            $this->app->register(BookServiceProvider::class);
        } else {
            collect(config('core.lucid_application_providers'))
                ->filter(fn ($provider) => $provider['active'])
                ->map(fn ($provider) => $provider['provider'])
                ->each(fn ($provider) => $this->app->register($provider));
        }
    }

    private function configureDevelopmentPackages()
    {
        if (! $this->app->environment(['production'])) {
            Telescope::night();
            $this->app->register(TelescopeServiceProvider::class);
            $this->app->register(IdeHelperServiceProvider::class);
        }
    }

    private function configurePassport()
    {
        //Passport::tokensExpireIn(now()->addDays(15));
        //Passport::refreshTokensExpireIn(now()->addDays(30));
        // TODO control the ttl from application settings later
        Passport::personalAccessTokensExpireIn(now()->addMonths());
    }

    private function registerBlueprintMacros()
    {
        Blueprint::macro('snowflakeId', fn ($column = 'id') => $this->unsignedBigInteger($column));
        Blueprint::macro('snowflakeIdAndPrimary', fn ($column = 'id') => $this->snowflakeId($column)->primary());

        Blueprint::macro('auditColumns', function () {
            $this->snowflakeId('created_by')->nullable();
            $this->snowflakeId('updated_by')->nullable();
            $this->snowflakeId('deleted_by')->nullable();
            $this->timestamps();
            $this->softDeletes();

            return $this;
        });
    }

    private function registerCollectionMacros()
    {
        Collection::macro('enum', fn () => Enum::make($this[0]));
        Collection::macro('enumToCollection', fn () => Enum::make($this[0])->collection());
    }

    private function registerQueryBuilderMacros()
    {
        Builder::macro('purifySortingQuery', function (array|null $order, array $sortableFields) {
            return QueryBuilderHelper::purifySortingQuery($this, $order, $sortableFields);
        });

        Builder::macro('search', function (array $searchableFields, $keyword) {
            return QueryBuilderHelper::search($this, $searchableFields, $keyword);
        });

        Builder::macro('purifyPaginationQuery', function ($perPage, $page) {
            return QueryBuilderHelper::purifyPaginationQuery($this, $perPage, $page);
        });
    }
}
