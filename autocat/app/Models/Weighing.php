<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Weighing extends Model
{
    public function cat() {
        return $this->belongsTo(Cat::class, 'cat_id');
    }
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cat_id', 'date', 'weight', 'comments'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    protected $table = 'weighings';


}