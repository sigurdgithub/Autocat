<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FosterFamily extends Model
{

    public function pets() {
        return $this->morphMany(FosterPet::class, 'fosterFamily');
    }

    public function roommates() {
        return $this->morphMany(FosterRoommate::class, 'fosterFamily');
    }

    public function preferences() {
        return $this->morphMany(FosterPreference::class, 'fosterFamily');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstName', 'lastName', 'dateOfBirth', 'street', 'number', 'city', 'zipCode', 'email', 'phone', 'availableSpots', 'picture'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    protected $table = 'fosterFamilies';

}
