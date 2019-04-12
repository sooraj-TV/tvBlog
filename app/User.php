<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Get user skills
    public static function getUserSkills($userID = ''){
        if(!empty($userID)){
            $data = DB::table('users_skills as us')
                    ->join('skill_matrices as sm', 'sm.id', '=', 'us.skill_id')
                    ->where('us.user_id', '=', $userID)
                    ->get();
            return $data;
        }
        else{
            return '';
        }
    }
    //update user profile
    public static function updateProfile($input = array()){
        if(!empty($input)){
            DB::table('users')
            ->where('id', Auth::user()->id)
            ->update([
                'name' => $input['name'],
                'designation_id' => $input['designation_id'],
                'title'     => $input['title'],
                'email_personal' => $input['email_personal'],
                'skype_id_personal' => $input['skype_id_personal'],
                'skype_id_official' => $input['skype_id_official'],
                'phone_number' => $input['phone_number'],
                'profile_summary' => $input['profile_summary']
            ]);

            DB::table('users_skills')->where('user_id', Auth::user()->id)->delete();
            foreach($input['skill_ids'] as $skill_id){
                //echo $skill_id.'<br>';
                DB::table('users_skills')->insert([
                    'user_id' => Auth::user()->id,
                    'skill_id' => $skill_id
                ]);
            }

            return true;

        }
        else{
            return false;
        }

    }

    public static function getProfileData($userID = ''){
        if(empty($userID)){
            $userID = Auth::id();
        }
        if(!empty($userID)){
            $profiles = DB::table('users as u')
                    ->leftJoin('designations as d', 'd.id', '=', 'u.designation_id')
                    ->where('u.id', '=', $userID)
                    ->select("*", DB::raw('(CASE WHEN u.designation_id = 0 THEN "Not Mentioned" ELSE d.designation END) as user_designation'))
                    ->first();
            return $profiles;
        }
        else{
            return '';
        }
    }


    public static function getAllProfiles(){
        //dd(Auth::user()->id);
        $profiles = DB::table('users as u')
                    ->leftJoin('designations as d', 'd.id', '=', 'u.designation_id')
                    ->where('u.id', '!=', Auth::id())
                    ->select('u.name', 'u.id as user_id', DB::raw('(CASE WHEN u.designation_id = 0 THEN "Not Mentioned" ELSE d.designation END) as user_designation'))
                    ->get();
        return $profiles;
    }
}
