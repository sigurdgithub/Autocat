<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cat;
use App\Models\VetVisit;
use App\Models\Weighing;
use Illuminate\Database\Eloquent\Builder;


class MedicalController extends Controller
{
    public static function showWeighingsByCatId($catId)
    {
        $matchCase = ['cat_id'=> $catId];
        return Weighing::where($matchCase)->get();
    }

    public static function showVetVisitsByCatId($catId)
    {
        $matchCase = ['cat_id'=> $catId];
        return VetVisit::where($matchCase)->get();
    }

    public function deleteWeighing($id) {
        $weighing = Weighing::find($id);
        $cat_id = $weighing->cat_id;
        $weighing->delete();
        return redirect()->route('showCatById', ['id' => $cat_id]);
    }

    public function deleteVetVisit($id) {
        $vetVisit = VetVisit::find($id);
        $cat_id = $vetVisit->cat_id;
        $vetVisit->delete();
        return redirect()->route('showCatById', ['id' => $cat_id]);
    }

    public function storeWeighing(Request $request)
    {   
        $validation = $request->validate([
            'date'=> 'required',
            'weight'=>'required',
            'comments'=>'required'
        ]);

        $weighing = Weighing::firstOrCreate(
            ['cat_id' => $request->input('cat_id'),
            'date' => $request->input('date'),
            'weight' => $request->input('weight'),
            'comments' => $request->input('comments')
            ]);
        
        return redirect()->route('showCatById', ['id' => $request->input('cat_id')]);
    }

    public function storeVetVisit(Request $request)
    {   
        $validation = $request->validate([
            'date'=> 'required',
            'reason'=>'required',
            'comments'=>'required'
        ]);

        $weighing = VetVisit::firstOrCreate(
            ['cat_id' => $request->input('cat_id'),
            'date' => $request->input('date'),
            'reason' => $request->input('reason'),
            'comments' => $request->input('comments')
            ]);
        
        return redirect()->route('showCatById', ['id' => $request->input('cat_id')]);
    }
}
