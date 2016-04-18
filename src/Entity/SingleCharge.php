<?php
namespace CodeCloud\ShopifyFramework\Entity;

class SingleCharge extends EntityModel
{
    /**
     * @var string
     */
    protected $table = 'single_charge';

    /**
     * @var array
     */
    protected $fillable = ['user_id', 'single_purchase_id', 'amount', 'shopify_charge_reference'];
}