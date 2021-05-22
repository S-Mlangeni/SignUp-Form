<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Userdata;

class FormController extends Controller
{
    function formData (Request $req) {
        error_log("Controller is reached!");
        //Querying the database (making entries):
        $userdata = new Userdata;
        $userdata->name = $req->username;
        $userdata->surname = $req->usersurname;
        $userdata->email = $req->useremail;
        $userdata->phone_number = $req->userphonenumber;
        $dbresult = $userdata->save();
        if($dbresult) {
            return ["dbResult"=>"saved successfully"];
        } else {
            return ["dbResult"=>"failed to save"];
        }
    }
}
