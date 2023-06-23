<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FarmerGroup extends Model
{
    use HasFactory;
    protected $with = ['district'];
    protected $withCount = ['members'];

    protected $fillable = [
        'group_name',
        'district_id',
        'lead_farmer_contact',
    ];

    //Get district Group belongs to
    public function district()
    {
        return $this->belongsTo(District::class,'district_id');
    }

    //Get number of members in a group
    public function members()
    {
        return $this->hasMany(FarmerGroupMembers::class,'farmer_group_id');
    }



}
