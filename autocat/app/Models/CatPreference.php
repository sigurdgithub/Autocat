<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatPreference extends Model
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
        'cat_id', 'bottleFeeding', 'pregnancy', 'intensiveCare', 'noIntensiveCare', 'isolation', 'kids', 'dogs', 'cats', 'lapCat', 'playfulCat', 'outdoorCat', 'calmCat', 'bedroomAccess'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    protected $table = 'catPreferences';


}