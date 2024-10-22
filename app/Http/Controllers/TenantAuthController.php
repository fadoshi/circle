<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TenantAuthController extends Controller
{
    public function login(){
        return view('tenants.auth.login');
    }

    public function loginStore(Request $request)
    {
        //dd($request->all());
        $credentials = $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);
        $credentials['tenant_id'] = tenant('id');

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->route('tenant.dashboard'); 
        }

        return back()->withErrors(['emai'=>'Credentials do not match']);
    }

    public function register()
    {
        return view('tenants.auth.register');
    }

    public function registerStore(Request $request)
    {
        //dd($request->all());
        $tenant_id = tenant('id');
        $validated = $request->validate([
            //'tenant_name' => 'required|string|max:255',
            //'slug' => 'required|string|max:255|unique:tenants,slug',
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255',
                Rule::unique('users')->where(function($query) use($tenant_id, $request){
                    return $query->where('tenant_id', $tenant_id)->where('email', $request->email);
                }),
            ],
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create the tenant
        /* $tenant = Tenant::create([
            'name'=>$validated['tenant_name'],
            'slug' => $validated['slug'],
            'data' => ['name'],
        ]); */

        // Create the tenant admin user
        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            //'tenant_id' => $tenant->id,
        ]);

        // Log the admin in and redirect to tenant dashboard
        //auth()->guard()->login($user);
        return redirect()->route('tenant.login');
    }

    public function logout(Request $request)
    {
        //dd($request->all);
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect()->route('tenant.dashboard');
    }

    public function index()
    {
        return view('tenants.index');
    }




}
