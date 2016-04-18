<?php
namespace CodeCloud\ShopifyFramework\Http\Controller;

use CodeCloud\ShopifyApiClient\Client;

class Controller extends \Illuminate\Routing\Controller
{
    /**
     * @return Client
     */
    protected function getApi()
    {
        return \App::make(Client::class);
    }

    /**
     * @param string $url
     * @return string
     */
    protected function url($url)
    {
        return url(\Config::get('shopify-framework.base_url') . $url);
    }
}