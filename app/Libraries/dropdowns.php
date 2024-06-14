<?php

use App\Models\{VehicleCompany,Customer,Agent,Consignee, Office, Shed};

/**
 * Get listing of a resource.
 *
 * @return \Illuminate\Http\Response
 */
function vehicleCompanies()
{
    return VehicleCompany::whereStatus(1)->pluck('title','id');
}

/**
 * Get listing of a resource.
 *
 * @return \Illuminate\Http\Response
 */
function customers()
{
    return Customer::pluck('name','id');
}

/**
 * Get listing of a resource.
 *
 * @return \Illuminate\Http\Response
 */
function agents()
{
    return Agent::pluck('name','id');
}

/**
 * Get listing of a resource.
 *
 * @return \Illuminate\Http\Response
 */
function consignees()
{
    return Consignee::pluck('name','id');
}

/**
 * Get listing of a resource.
 *
 * @return \Illuminate\Http\Response
 */
function sheds()
{
    return Shed::pluck('title','id');
}

/**
 * Get listing of a resource.
 *
 * @return \Illuminate\Http\Response
 */
function offices()
{
    return Office::pluck('title','id');
}
