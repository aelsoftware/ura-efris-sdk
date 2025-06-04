<?php

namespace UraEfrisSdk\Providers;

use Illuminate\Support\ServiceProvider;
use UraEfrisSdk\Misc\SerializerFactory;
use Symfony\Component\Serializer\Serializer;

class SerializerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->singleton(Serializer::class, function ($app) {

        return SerializerFactory::create();
    });
    }
}