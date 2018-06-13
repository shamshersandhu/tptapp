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

        $states = \DB::table('states')->get();
        View::share('states', $states);
    }


    public function index()
    {
        $contacts = contact::all();
        return view('pages.contacts.index')->with('contacts', $contacts)->with("type","Contact");
    }


    public function show(Request $request)
    {
        $id = $request->id;
        $contact = contact::whereid($id)->first();
        return $contact;
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
        $con->name= $request->input('name');
        $con->cdesc= $request->input('cdesc');
        $con->add11= $request->input('add11');
        $con->city1= $request->input('city1');
        $con->state1= $request->input('state1');
        $con->pin1= $request->input('pin1');
        $con->add22= $request->input('add22');
        $con->city2= $request->input('city2');
        $con->state2= $request->input('state2');
        $con->pin2= $request->input('pin2');
        $con->type= $request->input('type');
        $con->dl_num= $request->input('dl_num');
        $con->dl_state= $request->input('dl_state');
        $con->dl_exp= $request->input('dl_exp');
        $con->phone1= $request->input('phone1');
        $con->phone2= $request->input('phone2');
        $con->email= $request->input('email');
        $con->notes= $request->input('notes');
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
        $con->id= $request->input('id');
        $con->name= $request->input('name');
        $con->cdesc= $request->input('cdesc');
        $con->add11= $request->input('add11');
        $con->city1= $request->input('city1');
        $con->state1= $request->input('state1');
        $con->pin1= $request->input('pin1');
        $con->add22= $request->input('add22');
        $con->city2= $request->input('city2');
        $con->state2= $request->input('state2');
        $con->pin2= $request->input('pin2');
        $con->type= $request->input('type');
        $con->dl_num= $request->input('dl_num');
        $con->dl_state= $request->input('dl_state');
        $con->dl_exp= $request->input('dl_exp');
        $con->phone1= $request->input('phone1');
        $con->phone2= $request->input('phone2');
        $con->email= $request->input('email');
        $con->notes= $request->input('notes');
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
