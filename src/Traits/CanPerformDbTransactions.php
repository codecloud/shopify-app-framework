<?php
namespace CodeCloud\ShopifyFramework\Traits;

trait CanPerformDbTransactions
{
    public function beginTransaction()
    {
        return \DB::beginTransaction();
    }

    protected function endTransaction()
    {
        return \DB::commit();
    }
}