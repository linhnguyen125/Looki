<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Ward;
use Illuminate\Http\Request;

class LoadAddressController extends Controller
{
    function updateDistrict(Request $request)
    {
        $districts = District::where('province_id', '=', $request->provinceId)->get();
        foreach ($districts as $district) {
            echo '<option value = "' . $district->id . '">' . $district->name . '</option>';
        }
    }

    function updateWard(Request $request)
    {
        $wards = Ward::where('district_id', '=', $request->districtId)->get();
        foreach ($wards as $ward) {
            echo '<option value = "' . $ward->id . '">' . $ward->name . '</option>';
        }
    }
}
