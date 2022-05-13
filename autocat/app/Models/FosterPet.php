<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FosterPet extends Model
{

    public function fosterFamily() {
        return $this->morphTo();
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fosterFamilyId', 'species', 'age'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];


}