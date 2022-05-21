<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FosterFamily;
use App\Models\Cat;
use Illuminate\Database\Eloquent\Builder;


class FosterFamilyController extends Controller
{
    public static function getFosterFamilies()
    {
        $fosterFamilies = FosterFamily::all();
        return $fosterFamilies;
    }
    public static function getFosterFamiliesByCatId($catId)
    {
        $fosterFamilyId = Cat::find($catId)->fosterFamily_id;
        $fosterFamily = FosterFamily::find($fosterFamilyId);

        return $fosterFamily;
    }
    public function getFosterFamilyById($id) {
        return FosterFamily::findOrFail($id);
    }

}
