<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed|string $name
 * @property int|mixed $interval
 * @property mixed|string $days
 */
class Route extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $casts = [
        'start' => 'date:hh:mm',
        'finish' => 'date:hh:mm'
    ];

    public function stops(): \Illuminate\Database\Eloquent\Relations\BelongsToMany {
        return $this->belongsToMany(Stop::class);
    }

    public function setStartTime(string $time) {
        if($this->checkTimeFormat($time))
            $this->start = date('2020-11-10 ' . $time);
    }

    public function printStartTime() {
        return $this->start->format('H:i');
    }

    public function setFinishTime(string $time) {
        if($this->checkTimeFormat($time))
            $this->finish = date('2020-11-10 ' . $time);
    }

    public function printFinishTime() {
        return $this->finish->format('H:i');
    }

    public function checkTimeFormat(string $time){
        if (preg_match("/^[0-2]?[0-9]:[0-6][0-9](:[0-6][0-9]?)?$/", $time)) {
            return true;
        } else {
            return false;
        }
    }



    public function addTimes($time, $interval){
        $newtimestamp = strtotime('2011-11-17 '.$time.' + '.$interval.' minute');
        return date('H:i', $newtimestamp);
    }

    public function getTimesSchedule(): array {
        $array = [];
        for($i = 0; $i < 10; $i++){
            $schedule = $this->addTimes($this->printStartTime(), $this->interval);
            array_push($array, $schedule);
        }
        return $array;
    }


}
