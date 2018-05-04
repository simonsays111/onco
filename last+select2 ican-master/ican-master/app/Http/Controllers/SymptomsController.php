<?php

namespace App\Http\Controllers;

use App\Symptom;
use Illuminate\Http\Request;
use UxWeb\SweetAlert\SweetAlert;

class SymptomsController extends Controller
{
    public function index()
    {
    	return view('symptoms.index')
    		->withSymptoms(Symptom::all());
    }

    public function create()
    {
    	return view('symptoms.create');
    }

    public function store(Request $request)
    {
    	$validation=$this->validate($request, [
    		'name' => 'required',
    		'importance_level' => 'required|numeric',
    	]);

    	$create = Symptom::create(
    		$request->only((new Symptom)->getFillable())
    	);

        if($validation){
            SweetAlert::success('Created successfully')->persistent("Close");
        }
        else
        {
            SweetAlert::error('There is an error! try again later');
        }
    	return redirect()->route('symptoms.index');
    }

}
