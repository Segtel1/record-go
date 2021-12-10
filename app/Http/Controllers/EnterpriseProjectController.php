<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enterprise;
use App\Models\EnterpriseProject;
use App\Models\Asset;

class EnterpriseProjectController extends Controller
{
    //
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function create_project(Request $request) {
        //work on action to be performed only by the admin
        
        $request->validate([
            'productId' => 'required|integer',
            'enterpriseStatus' => 'required|string',
        ]);


        if($request->input("enterpriseStatus") == "startup") {
             
            $project = EnterpriseProject::create([
                'product_id' => $request->productId,
                'enterprise_status' => $request->enterpriseStatus,
                'initial_capital' => $request->initialCapital,
                'product_other_name' => $request->productOtherName,
            ]);

         return response()->json(['message' => 'Enterprise project created successfully']);
    
        }

        elseif($request->input("enterpriseStatus") == "existing") {
             
            $project = EnterpriseProject::create([
                'product_id' => $request->productId,
                'enterprise_status' => $request->enterpriseStatus,
                'product_other_name' => $request->productOtherName,
                'initial_capital' => 0
            ]);

            //loop through array of asset list and save in the database

            foreach($request->input("asset") as $asset){
                
                $ass = Asset::create([
                    'project_id' => $project->id,
                    'asset_name' => $asset['asset_name'],
                    'value' => $asset['value'],
                    'useful_life' => $asset['useful_life']
                ]);
            }

            //get the all the assumed value of each asset and run a loop to sum them 
            $value = Asset::where('project_id',$project->id)->select('value')->get()->toArray();

            $toSum = [];
            foreach($value as $val) {
                 
                $toSum[] = $val['value'];
            }

            $sum = array_sum($toSum);

            //update intial capital with the total of the aset value entered
            $update = EnterpriseProject::where('id', $project->id)->first();

            $update->initial_capital = $sum;
            $update->save();
            
            return response()->json(['message' => 'Enterprise project created successfully']);

        }

    }
}
