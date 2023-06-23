<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;
    protected $withCount = ['groups','farmers','subcounties'];

    protected $fillable = [
        'district_name',
        'region',
    ];

    public function subcounties()
    {
        return $this->hasMany(SubCounty::class,'district_id');
    }

    //Count number of Farmers in a District
    public function groups()
    {
        return $this->hasMany(FarmerGroup::class,'district_id');
    }

    //Count number of Farmers in a District
    public function farmers()
    {
        return $this->hasManyThrough(FarmerGroupMembers::class,FarmerGroup::class,'district_id','farmer_group_id','id','id');
    }


}
