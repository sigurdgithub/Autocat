<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    public function fosterFamily() {
        return $this->belongsTo(FosterFamily::class);
    }

    public function cat() {
        return $this->belongsTo(Cat::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cat_id', 'type','fosterFamily_id','sentByShelter', 'message'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
    
    protected $table = 'notifications';



}