<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FosterPreference extends Model
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
        'fosterFamily_id', 'preference'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];


}