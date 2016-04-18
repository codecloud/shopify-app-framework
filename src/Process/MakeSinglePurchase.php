<?php
namespace CodeCloud\ShopifyFramework\Process;

use Codecloud\ShopifyApiClient\Endpoint\ApplicationCharge;
use CodeCloud\ShopifyFramework\Entity\SingleCharge;
use CodeCloud\ShopifyFramework\Entity\SingleProduct;
use CodeCloud\ShopifyFramework\Entity\SinglePurchase;
use CodeCloud\ShopifyFramework\Entity\User;
use CodeCloud\ShopifyFramework\Traits\CanPerformDbTransactions;

class MakeSinglePurchase
{
    use CanPerformDbTransactions;

    /**
     * @var ApplicationCharge
     */
    private $chargeEndpoint;

    /**
     * @param ApplicationCharge $chargeEndpoint
     */
    public function __construct(ApplicationCharge $chargeEndpoint)
    {
        $this->chargeEndpoint = $chargeEndpoint;
    }

    /**
     * @param SingleProduct $product
     * @param string $returnUrl
     */
    public function getChargeUrl(SingleProduct $product, $returnUrl)
    {
        $response = $this->chargeEndpoint->create($product->name, $product->amount, [
            'return_url' => $returnUrl
        ]);

        return $response->confirmation_url;
    }

    /**
     * @param int $chargeId
     * @param User $user
     * @param SingleProduct $product
     * @throws \Exception
     */
    public function activateCharge($chargeId, User $user, SingleProduct $product)
    {
        if (! $this->chargeEndpoint->activate($chargeId)) {
            throw new \Exception('The charge could not be activated');
        }

        $this->beginTransaction();

        SinglePurchase::create([
            'user_id' => $user->id,
            'single_product_id' => $product->id,
            'status' => 'ACTIVE',
            'last_charged_at' => date('Y-m-d')
        ]);

        SingleCharge::create([
            'user_id' => $user->id,
            'single_purchase_id' => $product->id,
            'amount' => $product->amount,
            'shopify_charge_reference' => $chargeId
        ]);

        $this->endTransaction();
    }
}