<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property double $price
 * @property double $priceTotal
 */
class BillItem extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table = 'bill_item';

    protected $fillable = [
        'billId',
        'productId',
        'amount',
        'price',
        'discount',
        'priceTotal',
        'createdAt',
    ];

    public const CREATED_AT = 'createdAt';
    public const UPDATED_AT = 'updatedAt';

    public const FORMAT_DEFAULT = 'Y-m-d H:i:s';

    // public function bill()
    // {
    //     return $this->belongsTo(Bill::class, 'billId');
    // }

    public function product()
    {
        return $this->belongsTo(Product::class, 'productId');
    }
}
