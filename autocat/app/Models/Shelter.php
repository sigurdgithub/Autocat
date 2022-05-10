<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shelter extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'shelterName', 'shelterPhone', 'email', 'hkNumber', 'firstName', 'lastName', 'dateOfBirth', 'street', 'number', 'city', 'zipCode', 'phonenumber', 'picture'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    protected $table = 'shelters';

}