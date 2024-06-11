<?php

use App\Models\VehicleCompany;






/**
 * Get listing of a resource.
 *
 * @return \Illuminate\Http\Response
 */
function vehicleCompanies()
{
    return VehicleCompany::whereStatus(1)->pluck('title','id');
}
