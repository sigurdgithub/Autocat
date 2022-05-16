<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{

    public function preferences() {
        return $this->morphMany(CatPreference::class, 'cat');
    }

    public function pictures() {
        return $this->morphMany(CatPicture::class, 'cat');
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['gender','name','dateOfBirth','breed','furColor', 'furLength', 'chipNumber', 'adoptionStatus', 'notifierName', 'notifierPhone',
                            'socialization', 'startWeight', 'sterilized', 'extraInfo', 'medication', 'personality', 'solo', 'withPet', 'withBuddy',
                            'gardenAccess', 'buddyId', 'image'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];


}
