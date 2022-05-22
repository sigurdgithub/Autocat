<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FosterFamily extends Model
{

    public function pets() {
        return $this->hasMany(FosterPet::class, 'fosterFamily');
    }

    public function roommates() {
        return $this->hasMany(FosterRoommate::class, 'fosterFamily');
    }

    public function notifications() {
        return $this->hasMany(Notification::class, 'fosterFamily');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstName', 'lastName', 'dateOfBirth', 'street', 'number', 'city', 'zipCode', 'phone', 'email', 'password', 'availableSpots', 'picture'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    protected $table = 'fosterFamilies';



}
