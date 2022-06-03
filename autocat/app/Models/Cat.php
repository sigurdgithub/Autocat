<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{

    public function notifications() {
        return $this->hasMany(Notification::class, 'cat');
    }

    public function fosterFamily() {
        return $this->belongsTo(FosterFamily::class, 'fosterFamily_id');
    }

    public function pictures() {
        return $this->hasMany(CatPicture::class, 'cat');
    }

    public function preferences() {
        return $this->hasOne(CatPreference::class, 'cat_id');
    }

    public function vetVisits() {
        return $this->hasMany(VetVisit::class, 'cat_id');
    }

    public function weighings() {
        return $this->hasMany(Weighing::class, 'cat_id');
    }
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['gender','name','dateOfBirth','breed','furColor', 'furLength', 'chipNumber', 'adoptionStatus', 'notifierName', 'notifierPhone',
                            'socialization', 'startWeight', 'sterilized', 'extraInfo', 'medication', 'personality', 'solo', 'withPet', 'gardenAccess', 
                            'buddyId', 'image', 'fosterFamily_id'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    protected $table = 'cats';

}
