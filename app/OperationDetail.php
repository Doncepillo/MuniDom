<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OperationDetail extends Model
{
    public function operations(){
        
            return $this->hasMany(Operation::class);
    
        }

        public function sector(){
            
                return $this->belongsTo(Sector::class);
        
            }
}
