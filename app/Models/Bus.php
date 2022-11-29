<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method find($id)
 * @property mixed $name
 * @property mixed $capacity
 */
class Bus extends Model
{
    use HasFactory;
    public $timestamps = false;
}
