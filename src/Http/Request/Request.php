<?php
namespace CodeCloud\ShopifyFramework\Http\Request;

abstract class Request extends \Illuminate\Http\Request
{
    public function authorize()
    {
        return true;
    }

    abstract public function rules();
}