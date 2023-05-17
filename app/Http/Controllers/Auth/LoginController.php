<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
        $this->middleware('guest:employee')->except('logout');
    }
    public function showAdminLoginForm()
    {
        return view('auth.login', ['url' => 'admin']);
    }

    public function adminLogin(Request $request): \Illuminate\Http\JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()){
            return response()->json([
                "status" => false,
                "errors" => $validator->errors()
            ]);
        } else {
            if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
                return response()->json([
                    "status" => true,
                    "redirect" => route('admin.index')
                ]);
            } else {
                return response()->json([
                    "status" => false,
                    "errors" => ["Invalid credentials"]
                ]);
            }
        }
    }

    public function showEmployeeLoginForm()
    {
        return view('auth.login', ['url' => 'employee']);
    }

    public function employeeLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()){
            return response()->json([
                "status" => false,
                "errors" => $validator->errors()
            ]);
        } else {
            if (Auth::guard('employee')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
                return response()->json([
                    "status" => true,
                    "redirect" => route('employee.index')
                ]);
            } else {
                return response()->json([
                    "status" => false,
                    "errors" => ["Invalid credentials"]
                ]);
            }
        }
    }
}
