<?php

namespace App\Http\Controllers;

use App\Models\FarmerGroup;
use Illuminate\Http\Request;

class FarmerGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $groups = FarmerGroup::paginate();
        return view('admin.groups',compact('groups'));
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
    public function show($groupId)
    {
        $gp = FarmerGroup::find($groupId); 
        if(!$gp){
            return redirect()->route('groups');
        }

        //Get groups that belong to this district
        $farmers = $gp->members()->paginate();
        //$district->loadCount(['groups','farmers','subcounties'])->with('subcounties')->get();
        return view('admin.farmers',compact('gp','farmers'));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FarmerGroup $farmerGroup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FarmerGroup $farmerGroup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FarmerGroup $farmerGroup)
    {
        //
    }
}
