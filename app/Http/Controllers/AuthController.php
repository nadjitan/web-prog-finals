<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Mail\ResetPassword;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(['guest']);
    // }

    public function login()
    {
        return view('auth.login');
    }

    public function signup()
    {
        return view('auth.signup');
    }

    public function resetPassword()
    {
        return view('auth.reset');
    }

    public function requestResetPassword(Request $request)
    {
        //You can add validation login here
        $user = User::where('email', $request->email)->first();
        //Check if the user exists
        if ( $user == null) {
            return back()->withErrors(['email' => trans('User does not exist')]);
        }

        //Create Password Reset Token
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => Str::random(60),
            'created_at' => Carbon::now()
        ]);
        //Get the token just created above
        $tokenData = DB::table('password_resets')->where('email', $request->email)->first();

        if ($this->sendResetEmail($request->email, $tokenData->token)) {
            return back()->with('success', 'A reset link has been sent to your email address.');
        } else {
            return back()->withErrors(['error' => 'Email not sent. Please try again.']);
        }
    }

    private function sendResetEmail($email, $token)
    {
        //Generate, the password reset link. The token generated is embedded in the link
        $link = url('reset_password/?token=' . $token . '&email=' . urlencode($email));

        try {
            Mail::to($email)->send(new ResetPassword($link));
            return true;
        } catch (\Exception $e) {
            //Delete the token
            DB::table('password_resets')->where('email', $email)
            ->delete();
            return false;
        }
    }

    public function passwordResetPage()
    {
        return view('auth.reset_password');
    }

    public function passwordReset(Request $request)
    {
        $rules = [
            'email' => 'required|email|exists:users,email',
            'password' => 'required|confirmed',
            'token' => 'required' 
        ];
    
        $customMessages = [
            'required' => 'The :attribute field is required.',
            'confirmed' => 'Password does not match.'
        ];
    
        $this->validate($request, $rules, $customMessages);

        $password = $request->password;
        // Validate the token
        $tokenData = DB::table('password_resets')
        ->where('token', $request->token)->first();
        // Redirect the user back to the password reset request form if the token is invalid
        if (!$tokenData) return view('auth.reset');

        $user = User::where('email', $tokenData->email)->first();
        // Redirect the user back if the email is invalid
        if (!$user) return redirect()->back()->withErrors(['email' => 'Email not found']);
        //Hash and update the new password
        $user->password = Hash::make($password);
        $user->update(); //or $user->save();

        //login the user immediately they change password successfully
        Auth::login($user);

        //Delete the token
        DB::table('password_resets')->where('email', $user->email)
        ->delete();

        return view('home');

    }

    public function storeLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email', 
            'password' => 'required' 
        ]);

        if (!Auth::attempt($request->only('email', 'password'), $request->remember)){
            return back()->with('status', 'Invalid login details');
        }

        return redirect()->route('home');
    }

    public function storeSignup(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|max:255|unique:users,username|regex:/^\S*$/u',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|confirmed' 
        ]);

        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        
        Auth::attempt($request->only('email', 'password'));

        return redirect()->route('home');
    }

    public function profile()
    {
        $user = User::find(Auth::user()->id); 
        $flight_tickets = $user->flights()->with(['user'])->paginate(0);

        if ( !empty($user->user_details))
        {
            return view('profile', [
                'username' => $user->username,
                'email' => $user->email,
                'name' => $user->user_details['name'],
                'gender' => $user->user_details['gender'],
                'age' => $user->user_details['age'],
                'date_of_birth' => $user->user_details['date_of_birth'],
                'birthplace' => $user->user_details['birthplace'],
                'tickets' => $flight_tickets
            ]);
        }   
        else 
        {
            return view('profile', [
                'username' => Auth::user()->username,
                'email' => Auth::user()->email,
                'tickets' => $flight_tickets
            ]);
        }
    }
    
    public function storeProfile(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $flight_tickets = $user->flights()->with(['user'])->paginate(0);
        
        $rules = [
            'name' => 'required',
            'gender' => 'required',
            'age' => 'required',
            'date_of_birth' => 'required',
            'birthplace' => 'required',
        ];

        $customMessages = [
            'required' => 'The :attribute field is required.'
        ];

        $this->validate($request, $rules, $customMessages);

        $user = User::find(Auth::user()->id);
        $user->user_details = [
            'name' => $request->name,
            'gender' => $request->gender,
            'age' => (int)$request->age,
            'date_of_birth' => $request->date_of_birth,
            'birthplace' => $request->birthplace,
        ];

        $user->save();

        return view('profile', [
            'username' => $user->username,
            'email' => $user->email,
            'name' => $user->user_details['name'],
            'gender' => $user->user_details['gender'],
            'age' => $user->user_details['age'],
            'date_of_birth' => $user->user_details['date_of_birth'],
            'birthplace' => $user->user_details['birthplace'],
            'tickets' => $flight_tickets
        ]);
    }

    public function logout() {
        Auth::logout();

        return redirect()->route('home');
    }
}
