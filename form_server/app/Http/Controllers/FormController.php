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
        $userdata->password = $req->userpassword;
        $dbresult = $userdata->save();
        if($dbresult) {
            return ["dbResult"=>"saved successfully"];
        } else {
            return ["dbResult"=>"failed to save"];
        }
    }

    function dbsearch (Request $submittedData) {
        $submittedEmail = $submittedData->useremail;
        $submittedPassword = $submittedData->userpassword;
        $dbemail = Userdata::where('email', $submittedEmail)->get();
        $dbpassword = Userdata::where('password', $submittedPassword)->get();
        error_log($dbemail);
        error_log($dbpassword);
        error_log($submittedData->useremail);
        error_log($submittedData->userpassword);
        //error_log($records->isNotEmpty());
        if ($dbemail->isEmpty() || $dbpassword->isEmpty()) {
            error_log("invalid email and/or password");
            return [false];
        } else {
            return [true];
        }
        
    }
}
