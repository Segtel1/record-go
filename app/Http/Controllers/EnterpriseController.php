<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Enterprise;
use App\Models\User;
use App\Models\Products;
use App\Models\EnterpriseType;

/**
 * @group Enterprise Management
 *
 */

class EnterpriseController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth')->except(['enterprise_types']);
    }



    /**
     * Get all products
     * @param  \Illuminate\Http\Request  $request
     * @urlParam id integer required This ID is the id of the enterprise type that the products belong to.
     * @authenticated
     */
    public function get_products($id)
    {
        //
        $products = Products::where('enterprise_type_id',$id)->get();
        

        return response()->json($products);
    }

    /**
      * Get enterprise details 
      * @authenticated
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
      * Get all enterprise types
    **/

    public function enterprise_types(){

        $types = EnterpriseType::all();

        return response()->json($types);
    }



    /**
     * Update enterprise details
    * @bodyParam enterpriseName string required 
    * @bodyParam enterpriseTypeId int required 
    * @bodyParam businessEntitytype string required
    * @bodyParam noOfEmployees int required
    * @bodyParam address string required
    * @bodyParam websiteUrl string

    * @urlParam id integer required The ID of the products.
    * @authenticated
    */
    public function update(Request $request, $id)
    {
        //
        $enterprise = Enterprise::where('id',$id)->first();

        $enterprise->enterprise_name = $request->enterpriseName;
        $enterprise->enterprise_type_id = $request->enterpriseTypeId;
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
     * Add data entry officer
        * @bodyParam name string required 
        * @bodyParam phone_no string required 
        * @bodyParam email string required
        * @authenticated
     */
    public function add_officer(Request $request) {

        $user = auth()->user()->id;
       
        $enterpriseId = DB::table('enterprise_user')->where('user_id', $user)->first()->enterprise_id;

        $count = DB::table('enterprise_user')->where('enterprise_id', $enterpriseId)->count();

        if ($count == 3) {
  
            return response()->json([['error' => 'Limit Exceeded! You cannot add more than two data entry officers to your enterprise.'], 422]);
        }

        else{

            $request->validate([
                'name' => 'required|string',
                'phone_no' => 'required|string|unique:users',
                'email' => 'required|string'
               
            ]);
    
            $user = User::create([
                'name' => $request->name,
                'phone_no' => $request->phone_no,
                'email' => $request->email,
                'password' => bcrypt('12345'),
                'role' => 'entry_officer'
            ]);
    
            /*** 
             * Attach enterprise to user 
             * 
             ***/
            if($user) {
            
                $userId = User::find($user->id);
                $userId->enterprises()->attach($enterpriseId);
            }
    
    
            return response()->json(['message' => 'Data entry officer created successfully']);
        }
       
 

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
