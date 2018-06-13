<?php

namespace App\Http\Controllers;

use App\contact;
use App\truck;
use Illuminate\Database\DB;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class truckController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $owners = contact::select('id', 'name')->get();
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
        $trucks = \DB::table('trucks_view')->where('id', $id)->get();
        $ownr = contact::select('id', 'name')->where('id',$trucks[0]->owner)->get();
        $trucks['ownname']=$ownr[0]->name;
        return $trucks;
    }

    public function printtrk($id)
    {
        //echo "here ". $id;
        $trucks = \DB::table('trucks_view2')->where('id', $id)->get();
        return view('pages.trucks.print_truck_div')->with('trucks', $trucks);
    }

    public function store(Request $request)
    {
        //select concat("$truck->", a.column_name, " = $request->input('" , a.column_name, "');") from COLUMNS a where a.TABLE_SCHEMA='tptdb' and a.TABLE_NAME='trucks'
        $truck = new truck;
        $truck->regnum = $request->input('regnum');
        $truck->owner = $request->input('owner');
        $truck->purch_date = $request->input('purch_date');
        $truck->sold_date = $request->input('sold_date');
        $truck->status = $request->input('status');
        $truck->make = $request->input('make');
        $truck->wheels = $request->input('wheels');
        $truck->engine_num = $request->input('engine_num');
        $truck->ch_num = $request->input('ch_num');
        $truck->GWT = $request->input('GWT');
        $truck->NWT = $request->input('NWT');
        $truck->fyrpermit = $request->input('fyrpermit');
        $truck->fyrpermitexp = $request->input('fyrpermitexp');
        $truck->npnum = $request->input('npnum');
        $truck->npexp = $request->input('npexp');
        $truck->fitexp = $request->input('fitexp');
        $truck->pucexp = $request->input('pucexp');
        $truck->tank_desc = $request->input('tank_desc');
        $truck->tanknum = $request->input('tanknum');
        $truck->tankconsdate = $request->input('tankconsdate');
        $truck->tanktype = $request->input('tanktype');
        $truck->tankmoc = $request->input('tankmoc');
        $truck->watercap = $request->input('watercap');
        $truck->liccap = $request->input('liccap');
        $truck->rule18exp = $request->input('rule18exp');
        $truck->rule19exp = $request->input('rule19exp');
        $truck->rule44exp = $request->input('rule44exp');
        $truck->tankcalexp = $request->input('tankcalexp');
        $truck->airtestdt = $request->input('airtestdt');
        $truck->rule43desc = $request->input('rule43desc');
        $truck->shellthk = $request->input('shellthk');
        $truck->diskthk = $request->input('diskthk');
        $truck->inspolnum = $request->input('inspolnum');
        $truck->inspolpro = $request->input('inspolpro');
        $truck->insexp = $request->input('insexp');
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
        $truck->id = $request->input('id');
        $truck->regnum = $request->input('regnum');
        $truck->owner = $request->input('owner');
        $truck->purch_date = $request->input('purch_date');
        $truck->sold_date = $request->input('sold_date');
        $truck->status = $request->input('status');
        $truck->make = $request->input('make');
        $truck->wheels = $request->input('wheels');
        $truck->engine_num = $request->input('engine_num');
        $truck->ch_num = $request->input('ch_num');
        $truck->GWT = $request->input('GWT');
        $truck->NWT = $request->input('NWT');
        $truck->fyrpermit = $request->input('fyrpermit');
        $truck->fyrpermitexp = $request->input('fyrpermitexp');
        $truck->npnum = $request->input('npnum');
        $truck->npexp = $request->input('npexp');
        $truck->fitexp = $request->input('fitexp');
        $truck->pucexp = $request->input('pucexp');
        $truck->tank_desc = $request->input('tank_desc');
        $truck->tanknum = $request->input('tanknum');
        $truck->tankconsdate = $request->input('tankconsdate');
        $truck->tanktype = $request->input('tanktype');
        $truck->tankmoc = $request->input('tankmoc');
        $truck->watercap = $request->input('watercap');
        $truck->liccap = $request->input('liccap');
        $truck->rule18exp = $request->input('rule18exp');
        $truck->rule19exp = $request->input('rule19exp');
        $truck->rule44exp = $request->input('rule44exp');
        $truck->tankcalexp = $request->input('tankcalexp');
        $truck->airtestdt = $request->input('airtestdt');
        $truck->rule43desc = $request->input('rule43desc');
        $truck->shellthk = $request->input('shellthk');
        $truck->diskthk = $request->input('diskthk');
        $truck->inspolnum = $request->input('inspolnum');
        $truck->inspolpro = $request->input('inspolpro');
        $truck->insexp = $request->input('insexp');
        $truck->notes = $request->input('notes');
        try {
            $truck->exists = true;
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
            $id = $request->input('id');
            $res = truck::where('id', $id)->delete();
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
