<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VetVisit extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cat_Id', 'date', 'reason', 'comments'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];


}