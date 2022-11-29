<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed|string $name
 * @property float|mixed $x
 * @property float|mixed $y
 */
class Stop extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function routes(): \Illuminate\Database\Eloquent\Relations\BelongsToMany {
        return $this->belongsToMany(Route::class);
    }

    // пройди через все роуты этого стопа и проверь вторую позицию и дальше на соответствие второй остановке

    public function findStop($name){
        $stop = new Stop;
        foreach($stop->all() as $el){
            if(strcmp($el->name, $name ) === 0){
                return $el;
            }
        }
        return false;
    }

}
