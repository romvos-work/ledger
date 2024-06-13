<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $shopId
 * @property int $state
 * @property int $total
 * @property int $createdAt
 */
class Bill extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table = 'bill';

    protected $fillable = [
        'shopId',
        'state',
        'total',
        'createdAt',
        'updatedAt',
    ];
    public const CREATED_AT = 'createdAt';
    public const UPDATED_AT = 'updatedAt';

    public const FORMAT_DEFAULT = 'Y-m-d H:i:s';

    public const STATE_CREATED = 0;
    public const STATE_OPEN = 10;
    public const STATE_CLOSED = 20;

    protected $appends = [
        'createdAt',
        'updatedAt',
    ];

    public function getCreatedAtAttribute()
    {
        return $this->attributes['createdAt'];
    }

    public function getUpdatedAtAttribute()
    {
        return $this->attributes['updatedAt'];
    }

    public function updateItemsPrice()
    {
        $this->total = 0;
        /** @var BillItem $item */
        foreach ($this->items as $item) {
            $this->total += $item->priceTotal;
        }

        $this->updatedAt = date(self::FORMAT_DEFAULT);
        $this->save();
    }

    public function shop()
    {
        return $this->hasOne(
            Shop::class,
            'id',
            'shopId'
        );
    }

    public function items()
    {
        return $this->hasMany(
            BillItem::class,
            'billId',
            'id'
        );
    }

}
