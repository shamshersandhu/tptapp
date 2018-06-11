<?php

namespace App\Http\Controllers;

use App\trip;
use App\contact;
use App\truck;
use Illuminate\Database\QueryException;
use Illuminate\Database\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class tripController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $origins =  \DB::table('contacts')->where('type',"%")->get();
        $locations =  \DB::table('contacts')->where('type',"LOCATION")->get();
        $drivers =  \DB::table('contacts')->where('type',"DRIVER")->get();
        $trucks =  \DB::table('trucks')->where('status',"ACTIVE")->get();
        $owners = contact::select('id','name')->get();
        View::share('owners', $owners);
        View::share('trucks', $trucks);
        View::share('drivers', $drivers);
        View::share('locations', $locations);
        View::share('origins', $origins);




    }

    public function index()
    {
        $view_qry="create or replace view trip_details as
        SELECT
              a.*,t.regnum regnum,
              lo.name origin_name,ld.name dest_name,d1.name driver1_name,d2.name driver2_name
        FROM
              trips a 
              left outer join trucks t on  a.truck = t.id
              left outer join contacts lo on a.origin = lo.id
              left outer join contacts ld on a.dest = ld.id 
              left outer join contacts d1 on a.driver1 = d1.id 
              left outer join contacts d2 on a.driver2 = d2.id";  
        $trips =  \DB::table('trip_details')->where('id','>',"0")->get();
        //$trips = trip::all();
        return view('pages.trips.index')->with('trips', $trips);
    }

    public function show(Request $request)
    {
        //echo "here ". $id;
        $id = $request->id;
        $trips = trip::whereid($id)->first();
        $orgname= contact::whereid($trips->origin)->first();
        $desname= contact::whereid($trips->dest)->first();
        $drname1= contact::whereid($trips->driver1)->first();
        $drname2= contact::whereid($trips->driver2)->first();
        $trkdet= truck::whereid($trips->truck)->first();


        $resp = "<table><tr><td><small>LR#ID</smallo></td><td>:</td><td>$trips->id</td></tr>";
        $resp .= "<tr><td><small>Truck</small></td><td>:</td><td>$trkdet->regnum</td></tr>";
        $resp .= "<tr><td><small>From</small></td><td>:</td><td>$orgname->add11</td></tr>";
        $resp .= "<tr><td><small></small></td><td>:</td><td>$orgname->add12</td></tr>";
        $resp .= "<tr><td><small>To</small></td><td>:</td><td>$desname->add21</td></tr>";
        $resp .= "<tr><td><small></small></td><td>:</td><td>$desname->add22</td></tr>";
        $resp .= "<tr><td><small>Driver</small></td><td>:</td><td>$drname1->name"; 
        $resp .= isset($drname2->name) ? " / " . $drname2->name : '' . "</td></tr>";
        $resp .= "<tr><td><small>Way Bill</small></td><td>:</td><td>$trips->invoice</td></tr>";
        $resp .= "<tr><td><small>Product</small></td><td>:</td><td>$trips->product</td></tr>";

        $resp .= "<tr><td><small>Distance</small></td><td>:</td><td>$trips->distance</td></tr>";
        $resp .= "<tr><td><small>Qty Loaded</small></td><td>:</td><td>$trips->qtyload</td></tr>";
        $resp .= "<tr><td><small>Qty Delivered</small></td><td>:</td><td>$trips->qtydel</td></tr>";
        $resp .= "<tr><td><small>Pick Date</small></td><td>:</td><td>$trips->pickdate&nbsp;$trips->picktime</td></tr>";
        $resp .= "<tr><td><small>Del Date</small></td><td>:</td><td>$trips->deldate&nbsp;$trips->deltime</td></tr>";
        $resp .= "<tr><td><small>Notes</small></td><td>:</td><td>$trips->notes</td></tr></table>";

        return $resp;
        //print_r($trips);
    }

    public function store(Request $request)
    {
        /* $request->validate([
        'truck' => 'required',
        'driver2' => 'required',
        ]); */
        $trip = new trip;
        $trip->truck = $request->input('truck');
        $trip->origin = $request->input('origin');
        $trip->dest = $request->input('dest');
        $trip->distance = $request->input('distance');
        $trip->driver1 = $request->input('driver1');
        $trip->driver2 = $request->input('driver2');
        $trip->invoice = $request->input('invoice');
        $trip->product = $request->input('product');
        $trip->qtyload = $request->input('qtyload');
        $trip->qtydel = $request->input('qtydel');
        $trip->pickdate = $request->input('pickdate');
        $trip->picktime = $request->input('picktime');
        $trip->deldate = $request->input('deldate');
        $trip->deltime = $request->input('deltime');
        $trip->notes = $request->input('notes');
        try {
            $ret = $trip->save();
            $msg = "Record Added Successfully";
        } catch (QueryException $ex) {
            $ecode = $ex->errorInfo[1];
            if ($ecode == 1062) {
                $msg = "ERROR: " . $trip->truck . " already exists in the database.";
            } else {
                $msg = "ERROR: " . $ex->getMessage();
            }
        }
        return ($msg);

    }

    public function edittrp($id)
    {
        //echo "here ". $id;
        $trip = trip::whereid($id)->first();
        return response()->json($trip);
        //print_r($trips);
    }


    public function edit(Request $request)
    {
        $trip = new trip();
        $trip->truck = $request->input('truck');
        $trip->origin = $request->input('origin');
        $trip->dest = $request->input('dest');
        $trip->distance = $request->input('distance');
        $trip->driver1 = $request->input('driver1');
        $trip->driver2 = $request->input('driver2');
        $trip->invoice = $request->input('invoice');
        $trip->product = $request->input('product');
        $trip->qtyload = $request->input('qtyload');
        $trip->qtydel = $request->input('qtydel');
        $trip->pickdate = $request->input('pickdate');
        $trip->picktime = $request->input('picktime');
        $trip->deldate = $request->input('deldate');
        $trip->deltime = $request->input('deltime');
        $trip->notes = $request->input('notes');
        try {
            $trip->exists = true;
            $trip->id=$request->input('id');
            $ret = $trip->save();
            $msg = "Record Modified Successfully";
        } catch (QueryException $ex) {
            $ecode = $ex->errorInfo[1];
            if ($ecode == 1062) {
                $msg = "ERROR: " . $trip->truck . " already exists in the database.";
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
        $trip = new trip();
        try {            
            $id=$request->input('id');
            $res=trip::where('id',$id)->delete();
            $msg = "Record Deleted Successfully";
        } catch (QueryException $ex) {
            $ecode = $ex->errorInfo[1];
            if ($ecode == 1451) {
                $msg = "ERROR: This trip has references in other records.\nCannot Delete Record.";
            } else {
                $msg = "ERROR: " . $ex->getMessage();
            }
        }
        return ($msg);
    }
}
