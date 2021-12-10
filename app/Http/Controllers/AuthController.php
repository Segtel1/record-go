<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Enterprise;

class AuthController extends Controller
{
    //

    public function __construct()
    {
      $this->middleware('auth')->except(['register', 'login']);
    }

    public function register(Request $request)
    {

        $request->validate([
            'name' => 'required|string',
            'phone_no' => 'required|string|unique:users',
            'password' => 'required|string|min:8',
            'enterprise_typeId' => 'required|integer',
            'business_entity_type' => 'required|string', 
            'no_of_employees' => 'required|integer',
            'address' => 'required|string'
           
        ]);

        $user = User::create([
            'name' => $request->name,
            'phone_no' => $request->phone_no,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'admin'
        ]);

        /*** 
         * Create enterprise with request details
         ***/

        if($user) {
           $enterprise = Enterprise::create([
               'enterprise_name' => $request->name,
                'enterprise_type_id' => $request->enterprise_typeId,
                'business_entity_type' => $request->business_entity_type,
                'no_of_employees' => $request->no_of_employees,
                'address' => $request->address,
                'website_url' => $request->website_url
           ]);
        }
        
        /*** 
         * Attach enterprise to user 
         * 
         ***/

        $userId = User::find($user->id);
        $userId->enterprises()->attach($enterprise->id);

        $token = auth()->login($user);
        return $this->respondWithToken($token);
    }

    /*** 
     * Login function 
     * 
     ***/

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);
        $credentials = $this->credentials($request);

        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Invalid Credentials'], 401);
        }
        return $this->respondWithToken($token);

    }

    /*** 
     * Validate if input is email or phone number 
     * 
     ***/
    protected function credentials(Request $request): array
    {
        if(is_numeric($request->get('email')) && strlen($request->get('email'))==11){
            return ['phone_no'=>$request->get('email'),'password'=>$request->get('password')];
        }
        return $request->only('email', 'password');
    }

    /*** 
     * Respond with access token and user data
     ***/
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => response()->json(auth()->user())
        ]);
    }

    public function logout()
    {
        auth()->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }
}
