<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FosterRoommate extends Model
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
        'fosterFamily_Id', 'relation', 'age'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    protected $table = 'roommates';


}