<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FarmerGroupMembers extends Model
{
    use HasFactory;

    protected $fillable = [
        'farmer_uuid',
        'member_name',
        'member_phone',
        'member_email',
        'member_address',
        'member_dob',
        'farmer_group_id',
        'NIN',
        'hh_household_head',
        'hh_district',
        'hh_subcounty',
        'hh_parish',
        'hh_village',
        'hh_registration_date',
        'hh_type',
        'gender',
        'age',
    ];
}
