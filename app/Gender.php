<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    public function workers(){
        
            return $this->hasMany(Worker::class);
    
        }
}
