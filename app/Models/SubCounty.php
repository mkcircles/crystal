<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCounty extends Model
{
    use HasFactory;
    protected $withCount = ['groups','farmers'];
    protected $with = ['district'];

    protected $fillable = [
        'sub_county_name',
        'district_id',
    ];

    //SubCounty belongs to a District
    public function district()
    {
        return $this->belongsTo(District::class);
    }

    //Count number of Farmer Groups in a SubCounty
    public function groups()
    {
        return $this->hasMany(FarmerGroup::class,'sub_county_id');
    }

    //Count number of Farmers in a SubCounty
    public function farmers()
    {
        return $this->hasManyThrough(FarmerGroupMembers::class,FarmerGroup::class,'sub_county_id','farmer_group_id','id','id');
    }
}
