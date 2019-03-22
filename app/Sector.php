<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    public function operation_details(){
        
            return $this->hasMany(OperationDetail::class);
    
        }
}