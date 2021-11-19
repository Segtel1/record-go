<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Enterprise;
use App\Models\User;


class EnterpriseController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth');
    }



    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
      * Get enterprise details 
    **/
    public function show()
    {
        //

        $user = auth()->user()->id;
       
        $enterpriseId = DB::table('enterprise_user')->where('user_id', $user)->first()->enterprise_id;

        $enterprise = Enterprise::where('id',$enterpriseId)->first();

        return response()->json($enterprise);
        
    }



    /**
     * Update enterprise function
     */
    public function update(Request $request, $id)
    {
        //
        $enterprise = Enterprise::where('id',$id)->first();

        $enterprise->enterprise_name = $request->enterpriseName;
        $enterprise->enterprise_type = $request->enterpriseType;
        $enterprise->business_entity_type = $request->businessEntityType;
        $enterprise->no_of_employees = $request->noOfEmployees;
        $enterprise->address = $request->address;
        $enterprise->website_url = $request->websiteUrl;

        $enterprise->save();

        $user = User::where('id', auth()->user()->id)->first();

        $user->name = $request->enterpriseName;
        $user->email = $request->email;
        $user->phone_no = $request->phoneNo;

        $user->save();

        return response()->json(['message' => 'Enterprise Updated Successfully', 'enterprise' => $enterprise]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
