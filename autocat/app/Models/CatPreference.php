<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatPreference extends Model
{
    public function cat() {
        return $this->morphTo();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cat_id', 'preference'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];


}