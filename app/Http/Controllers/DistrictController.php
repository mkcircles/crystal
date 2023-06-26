<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\FarmerGroup;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $districts = District::paginate();
        return view('admin.districts',compact('districts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($area)
    {
        $dis = District::where('district_name',$area)->first(); 
        if(!$dis){
            return redirect()->route('districts');
        }

        //Get groups that belong to this district
        $groups = FarmerGroup::where('district_id',$dis->id)->paginate();
        //$district->loadCount(['groups','farmers','subcounties'])->with('subcounties')->get();
        return view('admin.district',compact('dis','groups'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(District $district)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, District $district)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(District $district)
    {
        //
    }

    /**
     *
     */
}
