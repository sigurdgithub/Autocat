<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class FosterFamily extends Authenticatable
{
    use Notifiable;



    public function pets()
    {
        return $this->hasMany(FosterPet::class, 'fosterFamily');
    }

    public function roommates()
    {
        return $this->hasMany(FosterRoommate::class, 'fosterFamily');
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class, 'fosterFamily');
    }

    public function fosterFamily_id()
    {
        return $this->hasMany(User::class, 'fosterFamily');
    }

    public function preferences()
    {
        return $this->hasOne(FosterPreference::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'lastName', 'firstName', 'dateOfBirth', 'street', 'number', 'city', 'zipCode', 'phone', 'availableSpots',
    ];
    // Take values from preferences checkboxes
    /* public function setPreferencesAttribute($value)
    {
        $this->attributes['preferences'] = json_encode($value);
    }

    public function getPreferencesAttribute($value)
    {
        return $this->attributes['preferences'] = json_decode($value);
    }
 */
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    protected $table = 'fosterFamilies';
}
