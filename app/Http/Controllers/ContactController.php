<?php

namespace App\Http\Controllers;

use App\contact;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Database\DB;
use Illuminate\Support\Facades\View;




class contactController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index()
    {
        $contacts = contact::all();
        return view('pages.contacts.index')->with('contacts', $contacts)->with("type","Contact");
    }

    public function show(Request $request)
    {
        $id = $request->id;
        $contacts = contact::whereid($id)->first();
        $resp = "<table><tr><td><small>ID</smallo></td><td>:</td><td>$contacts->id</td></tr>";
        $resp .= "<tr><td><small>Name</small></td><td>:</td><td>$contacts->name</td></tr>";
        $resp .= "<tr><td><small>Address 1</small></td><td>:</td><td>$contacts->add11</td></tr>";
        $resp .= "<tr><td></td><td>:</td><td>$contacts->add12</td></tr>";
        $resp .= "<tr><td><small>Address 2</small></td><td>:</td><td>$contacts->add21</td></tr>";
        $resp .= "<tr><td></td><td>:</td><td>$contacts->add22</td></tr>";
        $resp .= "<tr><td><small>Type</small></td><td>:</td><td>$contacts->type</td></tr>";
        $resp .= "<tr><td><small>DL Number</small></td><td>:</td><td>$contacts->dl_num</td></tr>";
        $resp .= "<tr><td><small>DL State</small></td><td>:</td><td>$contacts->dl_state</td></tr>";
        $resp .= "<tr><td><small>DL Exp. Date</small></td><td>:</td><td>$contacts->dl_exp</td></tr>";
        $resp .= "<tr><td><small>Phone 1</small></td><td>:</td><td>$contacts->phone1</td></tr>";
        $resp .= "<tr><td><small>Phone 2</small></td><td>:</td><td>$contacts->phone2</td></tr>";
        $resp .= "<tr><td><small>Email</small></td><td>:</td><td>$contacts->email</td></tr>";
        $resp .= "<tr><td><small>Notes</small></td><td>:</td><td>$contacts->notes</td></tr></table>";
        return $resp;
        //print_r($contacts);
    }

    public function locations($type)
    {
        try {
            $contacts =  \DB::table('contacts')->where('type',strtoupper($type))->get();
        } catch (QueryException $ex) {
            $contacts="ERROR: " . $ex->errorInfo[1] . " " . $ex->errorInfo[2];
        }        
        return view('pages.contacts.index')->with('contacts', $contacts)->with("type",$type);
    }



    public function store(Request $request)
    {
        /* $request->validate([
        'name' => 'required',
        'phone1' => 'required',
        ]); */
        $con = new contact;
        $con->name = $request->input('name');
        $con->add11 = $request->input('add11');
        $con->add12 = $request->input('add12');
        $con->add21 = $request->input('add21');
        $con->add22 = $request->input('add22');
        $con->phone1 = $request->input('phone1');
        $con->phone2 = $request->input('phone2');
        $con->type = $request->input('type');
        $con->dl_num = $request->input('dl_num');
        $con->dl_state = $request->input('dl_state');
        $con->dl_exp = $request->input('dl_exp');
        $con->email = $request->input('email');
        $con->notes = $request->input('notes');
        try {
            $ret = $con->save();
            $msg = "Record Added Successfully";
        } catch (QueryException $ex) {
            $ecode = $ex->errorInfo[1];
            if ($ecode == 1062) {
                $msg = "ERROR: " . $con->name . " already exists in the database.";
            } else {
                $msg = "ERROR: " . $ex->getMessage();
            }
        }
        return ($msg);

    }

    public function editcon($id)
    {
        //echo "here ". $id;
        $contact = contact::whereid($id)->first();
        return response()->json($contact);
        //print_r($contacts);
    }


    public function edit(Request $request)
    {
        $con = new contact();
        $con->name = $request->input('name');
        $con->add11 = $request->input('add11');
        $con->add12 = $request->input('add12');
        $con->add21 = $request->input('add21');
        $con->add22 = $request->input('add22');
        $con->phone1 = $request->input('phone1');
        $con->phone2 = $request->input('phone2');
        $con->type = $request->input('type');
        $con->dl_num = $request->input('dl_num');
        $con->dl_state = $request->input('dl_state');
        $con->dl_exp = $request->input('dl_exp');
        $con->email = $request->input('email');
        $con->notes = $request->input('notes');
        try {
            $con->exists = true;
            $con->id=$request->input('id');
            $ret = $con->save();
            $msg = "Record Modified Successfully";
        } catch (QueryException $ex) {
            $ecode = $ex->errorInfo[1];
            if ($ecode == 1062) {
                $msg = "ERROR: " . $con->name . " already exists in the database.";
            } else {
                $msg = "ERROR: " . $ex->getMessage();
            }
        }
        return ($msg);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(Request $request)
    {
        //$res=User::where('id',$id)->delete();
        $con = new contact();
        try {            
            $id=$request->input('id');
            $res=contact::where('id',$id)->delete();
            $msg = "Record Deleted Successfully";
        } catch (QueryException $ex) {
            $ecode = $ex->errorInfo[1];
            if ($ecode == 1451) {
                $msg = "ERROR: This contact has references in other records.\nCannot Delete Record.";
            } else {
                $msg = "ERROR: " . $ex->getMessage();
            }
        }
        return ($msg);
    }
}
