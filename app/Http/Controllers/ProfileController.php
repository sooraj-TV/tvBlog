<?php
namespace App;
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Designation;
use App\SkillMatrix;
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
        $profileData    = User::findOrFail(Auth::user()->id);
        $designations   = Designation::all();
        $designation    = Designation::find($profileData->designation_id);
        $skills         = SkillMatrix::all();
        //dd($skills);
        //echo User::designation(); exit;

        return view('profile')->with(compact('profileData', 'designation', 'designations', 'skills'));
    }

    public function updateProfileAppln(Request $request){ 
        $input = $request->all();
        dd($input);
    }
}
