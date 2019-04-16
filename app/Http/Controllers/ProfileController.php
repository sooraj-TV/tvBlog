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
        $profileData    = User::getProfileData(Auth::user()->id); //User::findOrFail(Auth::user()->id);
        //p($profileData); exit;
        $designations   = Designation::all();
        $skills         = SkillMatrix::all();
        $user_skills    = User::getUserSkills(Auth::user()->id);

        return view('profile')->with(compact('profileData', 'designations', 'skills', 'user_skills'));
    }

    public function updateProfileAppln(Request $request)
    {
        $input = $request->all();
        //dd($input);
        $updated = User::updateProfile($input);

        if ($updated) {
            return redirect()->back()->with('success', "Your profile has been successfully updated.");
        } else {
            return redirect()->back();
        }
    }

    //show user profile
    public function showUserProfile($id = '', Request $request)
    {
        $input = $request->all();
        $profileData    = User::getProfileData($id);
        $user_skills    = User::getUserSkills($id);
        return view('profile-public')->with(compact('profileData', 'user_skills'));
    }
}
