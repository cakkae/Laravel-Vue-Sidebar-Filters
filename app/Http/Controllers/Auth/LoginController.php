<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use Validator;

// use App\Providers\RouteServiceProvider;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;

// class LoginController extends Controller
// {

//     use AuthenticatesUsers;

//     protected $redirectTo = RouteServiceProvider::HOME;

//     public function __construct()
//     {
//         $this->middleware('guest')->except('logout');
//     }
// }

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function show_login_form()
    {
        return view('auth.login');
    }
    public function process_login(Request $request)
    {
        $rules = array(
            'email' => 'required|email',
            'password' => 'required'
        );
        $messages = array(
                        'email.required' => 'Email je obavezan.',
                        'email.email' => 'Morate unijeti validnu e-mail adresu',
                        'password.required' => 'Morate unijeti lozinku'
                    );

        $validator = Validator::make( $request->all(), $rules, $messages );

        if ( $validator->fails() )
        {
            return response()->json(['success' => false, 'message' => $validator->errors()->first()]);
        }

        $credentials = $request->except(['_token']);

        $user = User::where('email',$request->email)->first();

        if (auth()->attempt($credentials)) {
            return response()->json(['success' => true, 'message' => 'Uspješna prijava...']);
        }else{
            return response()->json(['success' => false, 'message' => 'Pogrešan email i/ili lozinka']);
        }
    }
    public function show_signup_form()
    {
        return view('auth.register');
    }
    public function process_signup(Request $request)
    {
        $rules = array(
            'name' => 'required',
            'lastname' => 'required',
            'password' => 'required',
            'email' => 'required|email',
            'company' => 'required',
            'phone' => 'required',
            'zip' => 'required',
            'city' => 'required',
            'country' => 'required'
        );
        $messages = array(
                        'name.required' => 'Morate unijeti ime',
                        'lastname.required' => 'Morate unijeti prezime',
                        'password.required' => 'Morate unijeti lozinku',
                        'email.required' => 'Email je obavezan.',
                        'email.email' => 'Morate unijeti validnu e-mail adresu',
                        'company.required' => 'Morate unijeti naziv kompanije',
                        'phone.required' => 'Morate unijeti telefon',
                        'zip.required' => 'Morate unijeti poštanski broj',
                        'city.required' => 'Morate unijeti grad',
                        'country.required' => 'Morate unijeti državu',
                    );

        $validator = Validator::make( $request->all(), $rules, $messages );

        if ( $validator->fails() )
        {
            return response()->json(['success' => false, 'message' => $validator->errors()->first()]);
        }

        try
        {
            $user = User::create([
                'name' => trim($request->input('name')),
                'email' => strtolower($request->input('email')),
                'password' => Hash::make($request->input('password')),
                'lastname' => trim($request->input('lastname')),
                'country' => trim($request->input('country')),
                'company' => trim($request->input('company')),
                'zip' => trim($request->input('zip')),
                'phone' => trim($request->input('phone')),
                'city' => trim($request->input('city')),
            ]);
            Auth::login($user);
            return response()->json(['success' => true, 'message' => 'Uspjesno ste se registrovali...']);
        }
        catch(Exception $e)
        {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
        return redirect()->route('login');
    }
    public function logout()
    {
        \Auth::logout();

        return redirect()->route('login');
    }
}
