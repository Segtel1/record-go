<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;

class FinancialActivitiesController extends Controller
{
    //
    public function __construct()
    {
      $this->middleware('auth');
    }


    //function to save daily purchase records
    public function create_purchase (Request $request) {
    
        $request->validate([
            'purchase' => 'required|array'
        ]);


        foreach($request->input("purchase") as $purchase){
                
                $pur = Purchase::create([
                    'item_id' => $purchase['item_id'],
                    'project_id' => $purchase['project_id'],
                    'amount' => $purchase['amount'],
                    'payment_source' => $purchase['payment_source'],
                    'date' => $purchase['date'],
                    'user_id'=> auth()->user()->id
                ]);
        }
            
            return response()->json(['message' => 'Entries Saved Successfully']);

    }

}
