<?php
namespace CodeCloud\ShopifyFramework\Entity;

class SingleProduct extends EntityModel
{
    /**
     * @var string
     */
    protected $table = 'single_product';

    /**
     * @var array
     */
    protected $fillable = ['display_name', 'slug', 'description', 'amount'];
}