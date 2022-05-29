<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cat;
use App\Models\VetVisit;
use App\Models\Weighing;
use Illuminate\Database\Eloquent\Builder;


class MedicalController extends Controller
{
    public static function showWeigingsByCatId($catId)
    {
        $matchCase = ['cat_id'=> $catId];
        return Weighing::where($matchCase)->get();
    }

    public static function showVetVisitsByCatId($catId)
    {
        $matchCase = ['cat_id'=> $catId];
        return VetVisit::where($matchCase)->get();
    }
}
