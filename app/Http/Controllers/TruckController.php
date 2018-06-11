<?php

namespace App\Http\Controllers;

use App\truck;
use App\contact;
use Illuminate\Database\QueryException;
use Illuminate\Database\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class truckController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $owners = contact::select('id','name')->get();
        View::share('owners', $owners);

    }

    public function index()
    {
        $trucks = truck::all();
        return view('pages.trucks.index')->with('trucks', $trucks);
    }

    public function show(Request $request)
    {
        //echo "here ". $id;
        $id = $request->id;
        $trucks = truck::whereid($id)->first();
        $ownname= contact::whereid($trucks->owner)->first();
        $resp = "<table><tr><td><small>ID</smallo></td><td>:</td><td>$trucks->id</td></tr>";
        $resp .= "<tr><td><small>regnum</small></td><td>:</td><td>$trucks->regnum</td></tr>";
        $resp .= "<tr><td><small>Owner</small></td><td>:</td><td>$ownname->name</td></tr>";
        $resp .= "<tr><td><small>Purch. Date</small></td><td>:</td><td>$trucks->purch_date</td></tr>";
        $resp .= "<tr><td><small>Sol Date</small></td><td>:</td><td>$trucks->sold_date</td></tr>";
        $resp .= "<tr><td><small>Status</small></td><td>:</td><td>$trucks->status</td></tr>";
        $resp .= "<tr><td><small>GWT</small></td><td>:</td><td>$trucks->GWT</td></tr>";
        $resp .= "<tr><td><small>NWT</small></td><td>:</td><td>$trucks->NWT</td></tr>";
        $resp .= "<tr><td><small>Tank Desc.</small></td><td>:</td><td>$trucks->tank_desc</td></tr>";
        $resp .= "<tr><td><small>Make/Model</small></td><td>:</td><td>$trucks->make</td></tr>";
        $resp .= "<tr><td><small>Wheels</small></td><td>:</td><td>$trucks->wheels</td></tr>";
        $resp .= "<tr><td><small>Eng. Num.</small></td><td>:</td><td>$trucks->engine_num</td></tr>";
        $resp .= "<tr><td><small>Ch. Num</small></td><td>:</td><td>$trucks->ch_num</td></tr>";
        $resp .= "<tr><td><small>Ins. Pol Num.</small></td><td>:</td><td>$trucks->inspolnum</td></tr>";
        $resp .= "<tr><td><small>Ins. Provider</small></td><td>:</td><td>$trucks->inspolpro</td></tr>";
        $resp .= "<tr><td><small>Notes</small></td><td>:</td><td>$trucks->notes</td></tr></table>";
        return $resp;
        //print_r($trucks);
    }

    public function store(Request $request)
    {
        /* $request->validate([
        'regnum' => 'required',
        'make' => 'required',
        ]); */
        $truck = new truck;
        $truck->regnum = $request->input('regnum');
        $truck->owner = $request->input('owner');
        $truck->purch_date = $request->input('purch_date');
        $truck->sold_date = $request->input('sold_date');
        $truck->status = $request->input('status');
        $truck->make = $request->input('make');
        $truck->wheels = $request->input('wheels');
        $truck->GWT = $request->input('GWT');
        $truck->NWT = $request->input('NWT');
        $truck->tank_desc = $request->input('tank_desc');
        $truck->engine_num = $request->input('engine_num');
        $truck->ch_num = $request->input('ch_num');
        $truck->inspolnum = $request->input('inspolnum');
        $truck->inspolpro = $request->input('inspolpro');
        $truck->notes = $request->input('notes');
        try {
            $ret = $truck->save();
            $msg = "Record Added Successfully";
        } catch (QueryException $ex) {
            $ecode = $ex->errorInfo[1];
            if ($ecode == 1062) {
                $msg = "ERROR: " . $truck->regnum . " already exists in the database.";
            } else {
                $msg = "ERROR: " . $ex->getMessage();
            }
        }
        return ($msg);

    }

    public function edittrk($id)
    {
        //echo "here ". $id;
        $truck = truck::whereid($id)->first();
        return response()->json($truck);
        //print_r($trucks);
    }


    public function edit(Request $request)
    {
        $truck = new truck();
        $truck->regnum = $request->input('regnum');
        $truck->owner = $request->input('owner');
        $truck->purch_date = $request->input('purch_date');
        $truck->sold_date = $request->input('sold_date');
        $truck->status = $request->input('status');
        $truck->make = $request->input('make');
        $truck->wheels = $request->input('wheels');
        $truck->GWT = $request->input('GWT');
        $truck->NWT = $request->input('NWT');
        $truck->tank_desc = $request->input('tank_desc');
        $truck->engine_num = $request->input('engine_num');
        $truck->ch_num = $request->input('ch_num');
        $truck->inspolnum = $request->input('inspolnum');
        $truck->inspolpro = $request->input('inspolpro');
        $truck->notes = $request->input('notes');
        try {
            $truck->exists = true;
            $truck->id=$request->input('id');
            $ret = $truck->save();
            $msg = "Record Modified Successfully";
        } catch (QueryException $ex) {
            $ecode = $ex->errorInfo[1];
            if ($ecode == 1062) {
                $msg = "ERROR: " . $truck->regnum . " already exists in the database.";
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
        $truck = new truck();
        try {            
            $id=$request->input('id');
            $res=truck::where('id',$id)->delete();
            $msg = "Record Deleted Successfully";
        } catch (QueryException $ex) {
            $ecode = $ex->errorInfo[1];
            if ($ecode == 1451) {
                $msg = "ERROR: This truck has references in other records.\nCannot Delete Record.";
            } else {
                $msg = "ERROR: " . $ex->getMessage();
            }
        }
        return ($msg);
    }
}
