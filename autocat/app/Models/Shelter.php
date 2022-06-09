<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shelter extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function shelter_id()
    {
        return $this->hasMany(User::class, 'shelter');
    }
    protected $fillable = [
        'shelterName', 'shelterPhone', 'hkNumber', 'shelterFirstName', 'shelterLastName', 'shelterDateOfBirth', 'shelterStreet', 'shelterNumber', 'shelterCity', 'shelterZipCode', 'phoneNumber', 'website', 'picture'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    protected $table = 'shelters';
}
