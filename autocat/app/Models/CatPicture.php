<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CatPicture extends Model
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
        'cat_id', 'uri'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    protected $table = 'CatPicture';

}