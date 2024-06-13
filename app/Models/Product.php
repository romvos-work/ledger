<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table = 'product';

    public const CREATED_AT = 'createdAt';
    public const UPDATED_AT = 'updatedAt';


}
