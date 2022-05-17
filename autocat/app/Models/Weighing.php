<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Weighing extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'catId', 'date', 'weight', 'comments'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    protected $table = 'weighings';


}