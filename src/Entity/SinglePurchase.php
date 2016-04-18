<?php
namespace CodeCloud\ShopifyFramework\Entity;

class SinglePurchase extends EntityModel
{
    /**
     * @var string
     */
    protected $table = 'single_purchase';

    /**
     * @var array
     */
    protected $fillable = ['user_id', 'single_product_id', 'status', 'last_charged_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function charges()
    {
        return $this->hasMany(SingleCharge::class);
    }
}