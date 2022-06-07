<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Roommates extends Model
{
    public function fosterFamily() {
        return $this->belongsTo(FosterFamily::class, 'fosterFamily_id');
    }
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fosterFamily_id', 'relation', 'dateOfBirth'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    protected $table = 'roommates';


}