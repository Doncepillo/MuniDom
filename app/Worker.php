<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function nationality()
    {
        return $this->belongsTo(Nationality::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function getLocationLocalidadAttribute(){
        if ($this->location)
            return $this->location->localidad;
            return 'sin Localidad';
        }

    public function getPositionCargoAttribute(){
    if ($this->position)
        return $this->position->cargo;
        return 'sin cargo';
    }

    public function getNationalityNacionalidadAttribute(){
        if ($this->nationality)
            return $this->nationality->nacionalidad;
            return 'sin nacionalidad';
        }

        public function getStateEstadoAttribute(){
            if ($this->state)
                return $this->state->estado;
                return 'sin estado';
            }

    public function getGenderGeneroAttribute(){
        if ($this->gender)
            return $this->gender->genero;
            return 'sin genero especificado';
        }

}
