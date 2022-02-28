<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Model\Property;
use DB;

class HomeController extends BaseController
{
    public function index(){
        return view('home', [
            'propertiesdata' => $this->propertiesList()
         ]);
       
    }

    public function propertiesList(){
        return DB::table('properties AS propertie')
        ->leftJoin('properties_features AS ac', 'ac.property_id', '=', 'propertie.id')
        ->leftJoin('locations AS location', 'location.id', '=', 'propertie.location_id')
        ->select('propertie.id AS id', 'propertie.name AS title', 'propertie.description', 'ac.bathrooms',
            'ac.bedrooms', 'location.name as locName',
            'ac.price', 'ac.built_area'
        )
        ->get()->random(10);
    }

    public function properties(Request $request){
        if($request->garaje == 'on'){
            $garaje = 1;
        }else{
            $garaje = 0;
        }
        if($request->garden == 'on'){
            $garden = 1;
        }else{
            $garden = 0;
        }

        if($request->private_pool == 'on'){
            $private_pool = 1;
        }else{
            $private_pool = 0;
        }

        if($request->community_pool == 'on'){
            $community_pool = 1;
        }else{
            $community_pool = 0;
        }
        
        $data = DB::table('properties AS propertie')
        ->leftJoin('properties_features AS ac', 'ac.property_id', '=', 'propertie.id')
        ->leftJoin('locations AS location', 'location.id', '=', 'propertie.location_id')
        ->leftJoin('agents AS agent', 'agent.id', '=', 'propertie.agent_id')
        ->leftJoin('properties_types AS type', 'type.id', '=', 'propertie.properties_type_id')
        ->select('propertie.id AS id', 'propertie.name AS title', 'propertie.description', 'ac.bathrooms',
            'ac.bedrooms', 'location.name as locName', 'agent.name as agentname' , 'type.type as ptype',
            'ac.price', 'ac.built_area'
        )
        ->where([['ac.community_pool','=',$community_pool],['ac.private_pool','=',$private_pool],['ac.garden','=',$garden],['ac.garaje','=',$garaje],['ac.bedrooms','=',$request->rooms],['ac.bathrooms','=',$request->bathrooms],['type.id','=',$request->property_type]])
        ->orderBy('ac.price', 'desc')
        ->orderBy('locName')
        ->paginate(20);
        return view('properties', [
            'propertiesdata' => $data
         ]);
       
    }

    
}
