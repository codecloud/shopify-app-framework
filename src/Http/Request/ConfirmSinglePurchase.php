<?php
namespace CodeCloud\ShopifyFramework\Http\Request;

class ConfirmSinglePurchase extends Request
{
    public function rules()
    {
        return [
            'charge_id' => 'required|numeric',
        ];
    }
}