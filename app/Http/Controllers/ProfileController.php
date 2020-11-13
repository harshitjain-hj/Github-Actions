<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Contacts;
use App\Models\UserInfo;

class ProfileController extends Controller
{
    function store(Request $req){
        // Validation Rules
        $rules = [
            "user_id" => 'required|exists:users,id',
            "user_type" => 'required',
            "looking_for" => 'required',
            "interested_in" => 'required',
            "can_relocate" => 'required',
            "country_code" => 'required',
            "phone_no" => 'required|regex:/[0-9]{10}/',
            "stream" => 'required',
            "college" => 'required',
            "semester" => 'required',
            "graduation" => 'required',
            "can_relocate_to_city" => 'required',
            "interested_roles" => 'required',
            "skills" => 'required',
        ];
        $validator = Validator::make($req->input(), $rules);
        
        if ($validator->passes()){

            $contact = new Contacts([
                "user_id" => $req->user_id,
                "country_code" => $req->country_code,
                "phone_no" => $req->phone_no
            ]);
            $contact->save();

            $info = new UserInfo([
                "user_id" => $req->user_id,
                "user_type" => $req->user_type,
                "looking_for" => $req->looking_for,
                "interested_in" => $req->interested_in,
                "can_relocate" => $req->can_relocate,
                "can_relocate_to_city" => $req->can_relocate_to_city,
                "stream" => $req->stream,
                "college" => $req->college,
                "semester" => $req->semester,
                "graduation" => $req->graduation,
                "interested_roles" => $req->interested_roles,
                "skills" => $req->skills 
            ]);

            $info->save();

            $response['message'] = "Profile Updated successfully!";
            return Response()->json($response, 200);
        }else{
            $keys = array_keys($validator->getMessageBag()->toArray());
            $response['errors'] = $validator->getMessageBag()->toArray();
            $response['errors_keys'] = $keys;
            return Response()->json($response, 400);
        }
    }   

}
