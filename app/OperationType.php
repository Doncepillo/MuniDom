<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OperationType extends Model
{
    public function operations(){
        
            return $this->hasMany(Operation::class);
    
        }
}
