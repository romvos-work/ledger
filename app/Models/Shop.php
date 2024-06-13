<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table = 'shop';

    public const CREATED_AT = 'createdAt';
    public const UPDATED_AT = 'updatedAt';

    public function currency()
    {
        return $this->hasOne(
            Currency::class,
            'id',
            'currencyId'
        );
    }
}
