<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 */
class Currency extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table = 'currency';

    public const CREATED_AT = 'createdAt';
    public const UPDATED_AT = 'updatedAt';


}
