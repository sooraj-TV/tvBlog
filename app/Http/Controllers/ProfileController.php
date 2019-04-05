<?php
namespace App;
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Designation;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function __invoke()
    {
        $profileData = User::findOrFail(Auth::user()->id);
        dd($profileData->designation());
        $designation = Designation::findOrFail($profileData->designation_id);
        return view('profile')->with(compact('profileData','designation'));
    }
}
