<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{

    public function notifications() {
        return $this->hasMany(Notification::class, 'cat');
    }

    public function fosterFamily() {
        return $this->belongsTo(FosterFamily::class);
    }

    public function pictures() {
        return $this->hasMany(CatPicture::class, 'cat');
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['gender','name','dateOfBirth','breed','furColor', 'furLength', 'chipNumber', 'adoptionStatus', 'notifierName', 'notifierPhone',
                            'socialization', 'startWeight', 'sterilized', 'extraInfo', 'medication', 'personality', 'solo', 'withPet', 'withBuddy',
                            'gardenAccess', 'buddyId', 'image', 'fosterFamily_id'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    protected $table = 'cats';

}
