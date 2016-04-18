<?php
namespace CodeCloud\ShopifyFramework\Entity;

class RecurringPurchase extends EntityModel
{
    /**
     * @var string
     */
    protected $table = 'recurring_purchase';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function charges()
    {
        return $this->hasMany(RecurringCharge::class);
    }
}