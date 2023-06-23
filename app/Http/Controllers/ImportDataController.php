<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\FarmerGroup;
use App\Models\FarmerGroupMembers;
use App\Models\SubCounty;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

class ImportDataController extends Controller
{
  function importData()
  {
    //Access data from json file
    $data = [];

    foreach ($data as $d){
    $district = $d[0];
    $name = $d[1];
    $group = $d[2];
    //Generate uuid for member
    $farmer_uuid = Str::uuid();

    //dd($district.' '.$name.' Group:'.$group);
    //Check if district is registered
    $location = District::where('district_name',$district)->firstOrCreate(['district_name'=>$district]);
    $district_id = $location->id;
    //Check if group name is registered in the same district
    $g = FarmerGroup::where('group_name',$group)->where('district_id',$district_id)->firstOrCreate(['group_name'=>$group,'district_id'=>$district_id]);
    $group_id = $g->id;
    //Check if member is registered in the same group
    $member = FarmerGroupMembers::where('member_name',$name)
      ->where('farmer_group_id',$group_id)
      ->firstOrCreate(['farmer_uuid'=>$farmer_uuid,'member_name'=>$name,'farmer_group_id'=>$group_id]);
    }
  }

    function importDetailedData()
    {
        $dataRecord = [];

        foreach ($dataRecord as $data){
            $region = $data[0];
            $district = $data[1];
            $subcounty = $data[2];
            $producer_organization = $data[3];
            $member_name = $data[4];
            $hh_household_head = $data[5];
            $lead_farmer_contact = $data[6]; //Group Contact
            //$registration_date = $data[7];
            $hh_district = $data[8];
            $hh_subcounty = $data[9];
            $hh_parish = $data[10];
            $hh_village = $data[11];
            $hh_registration_date = $data[12];
            $hh_type = $data[13];
            //$unique_id = $data[14];
            $sex = $data[15];
            $age = $data[16];
            //$joining_date = $data[17];

            //Clean up lead farmer contact
            $lead_farmer_contact = str_replace(' ','',$lead_farmer_contact);
            $lead_farmer_contact = str_replace('-','',$lead_farmer_contact);
            $lead_farmer_contact = str_replace('+256','0',$lead_farmer_contact);

            //check if district is registered and update or create
            $location = District::where('district_name',$district)->firstOrCreate(['district_name'=>$district,'region'=>$region]);
            if($location->region != $region){
                $location->region = $region;
                $location->save();
            }
            //check if subcounty is registered or create
            $subcounty = SubCounty::where('sub_county_name',$subcounty)
                ->where('district_id',$location->id)
                ->firstOrCreate(['sub_county_name'=>$subcounty,'district_id'=>$location->id]);

            //check if group is registered or create
            $group = FarmerGroup::where('group_name',$producer_organization)
                ->where('sub_county_id',$subcounty->id)
                ->firstOrCreate(['group_name'=>$producer_organization,'district_id'=>$location->id,'sub_county_id'=>$subcounty->id]);
            if($group->sub_county_id != $subcounty->id){
                $group->sub_county_id = $subcounty->id;
                $group->lead_farmer_contact = $lead_farmer_contact;
                $group->save();
            }

            //check if member is registered or create
            $member = FarmerGroupMembers::where('member_name',$member_name)
                ->where('farmer_group_id',$group->id)
                ->firstOrCreate([
                    'farmer_uuid' => time(),
                    'member_name'=>$member_name,
                    'farmer_group_id'=>$group->id,
                    'hh_household_head'=>$hh_household_head,
                    'hh_district'=>$hh_district,
                    'hh_subcounty'=>$hh_subcounty,
                    'hh_parish'=>$hh_parish,
                    'hh_village'=>$hh_village,
                    'hh_registration_date'=>$hh_registration_date,
                    'hh_type'=>$hh_type,
                    'gender'=>$sex,
                    'age'=>$age,
                    ]);
        }

    }
}
