<?php
namespace CodeCloud\ShopifyFramework;

use Illuminate\Support\ServiceProvider;

class ShopifyPaymentsProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            $this->getMigrationPath() => database_path('migrations'),
            $this->getConfigPath()    => config_path('shopify-payments.php')
        ]);
    }

    public function register()
    {
        $this->mergeConfigFrom($this->getConfigPath(), 'base_url');
    }

    /**
     * @return string
     */
    private function getMigrationPath()
    {
        return realpath(__DIR__ . '/../laravel-migrations/');
    }

    /**
     * @return string
     */
    private function getConfigPath()
    {
        return realpath(__DIR__ . '/../laravel-config/shopify-payments.php');
    }
}