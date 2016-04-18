<?php
namespace CodeCloud\ShopifyFramework\Entity;

use Illuminate\Database\Eloquent\Model;

abstract class EntityModel extends Model
{
    /**
     * @param int $id
     * @param array $columns
     * @throws EntityNotFoundException
     * @return $this
     */
    public static function get($id, array $columns = ['*'])
    {
        if (! $model = static::find($id, $columns)) {
            throw new EntityNotFoundException('Entity ' . $id . ' does not exist.');
        }

        return $model;
    }
}