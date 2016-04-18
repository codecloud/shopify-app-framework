<?php
namespace CodeCloud\ShopifyFramework\Http\Controller;

use CodeCloud\ShopifyFramework\Entity\SingleProduct;
use CodeCloud\ShopifyFramework\Http\Request\ConfirmSinglePurchase;
use CodeCloud\ShopifyFramework\Http\Request\MakeSinglePurchase;

class SinglePurchaseController extends Controller
{
    public function postMake(MakeSinglePurchase $request)
    {
        $product = SingleProduct::get($request->get('product_id'));

        $process = new \CodeCloud\ShopifyFramework\Process\MakeSinglePurchase($this->getApi()->applicationCharge());

        $redirectUrl = $this->url('single-purchase/confirm');

        $confirmationUrl = $process->getChargeUrl($product, $redirectUrl);

        return response()->redirect($confirmationUrl);
    }

    public function getConfirm(ConfirmSinglePurchase $request)
    {
        $process = new \CodeCloud\ShopifyFramework\Process\MakeSinglePurchase($this->getApi()->applicationCharge());
        $process->activateCharge($request->get('charge_id'));

        return response()->redirect($this->url('user/finalise'));
        return response()->redirect(\Config::get('shopify-framework.urls.post_purchase'));
    }
}