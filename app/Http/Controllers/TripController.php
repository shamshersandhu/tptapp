<?php

namespace App\Http\Controllers;

use App\contact;
use App\trip;
use App\truck;
use Illuminate\Database\DB;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use TeamPickr\DistanceMatrix\DistanceMatrix;
use TeamPickr\DistanceMatrix\Licenses\StandardLicense;
use TeamPickr\DistanceMatrix\Request\DistanceMatrixRequest;
use TeamPickr\DistanceMatrix\Response\DistanceMatrixResponse;
use TeamPickr\DistanceMatrix\Response\Element;
use TeamPickr\DistanceMatrix\TravelMode;

class tripController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $origins = \DB::table('contacts')->where('type', "%")->get();
        $locations = \DB::table('contacts')->where('type', "LOCATION")->get();
        $drivers = \DB::table('contacts')->where('type', "DRIVER")->get();
        $trucks = \DB::table('trucks_view')->where('status', "ACTIVE")->get();
        $owners = contact::select('id', 'name')->get();
        $googleapi = "AIzaSyD1CUHmTHvyo1csI1_jAtl2jtY7Z2smVFo";
        $googleurl = "https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&";
        View::share('owners', $owners);
        View::share('trucks', $trucks);
        View::share('drivers', $drivers);
        View::share('locations', $locations);
        View::share('origins', $origins);
    }

    public function getdistance($org,$dest)
    {
        $loc = \DB::table('contacts')->where('id', $org)->get();
        $add1=$loc[0]->pin1 . ',India';
        $loc = \DB::table('contacts')->where('id', $dest)->get();
        $add2=$loc[0]->pin1 . ',India';
        $apiKey = "AIzaSyD1CUHmTHvyo1csI1_jAtl2jtY7Z2smVFo";
        $url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=$add1&destinations=$add2&key=$apiKey";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        
        curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $response = curl_exec($ch);
        curl_close($ch);
        $response_a = json_decode($response, true);
        $dist = $response_a['rows'][0]['elements'][0]['distance']['value'];
        $time = $response_a['rows'][0]['elements'][0]['duration']['text'];
        return round($dist/1000);
    }

    public function index()
    {
        $view_qry = "create or replace view trip_details as
        SELECT
                      a.id id, distance, driver1, driver2, invoice, ponum, product, qtyload, qtydel, unit,
                      DATE_FORMAT(a.loaddate, '%d-%m-%y') lr_date, loaddate,orgarrdt,a.arrdate,deldate,a.notes,
                       gstparty, t.regnum regnum,
                      lo.name origin_name,lo.add11 org_add,lo.city1 org_city,lo.state1 org_state,lo.pin1 org_pin,
                      ld.name dest_name,ld.add11 dest_add,ld.city1 dest_city,ld.state1 dest_state,ld.pin1 dest_pin,
                        d1.name driver1_name,d1.dl_num dl_num,d2.name driver2_name
                FROM
                      trips a
                      left outer join trucks t on  a.truck = t.id
                      left outer join contacts lo on a.origin = lo.id
                      left outer join contacts ld on a.dest = ld.id
                      left outer join contacts d1 on a.driver1 = d1.id
                      left outer join contacts d2 on a.driver2 = d2.id";

        $trips = \DB::table('trip_details')->where('id', '>', "0")->get();
        //$trips = trip::all();
        return view('pages.trips.index')->with('trips', $trips);
    }

    public function show(Request $request)
    {
        $id = $request->id;
        $trips = \DB::table('trip_details')->where('id', $id)->get();

        return $trips;
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
        $trip->ponum = $request->input('ponum');
        $trip->product = $request->input('product');
        $trip->qtyload = $request->input('qtyload');
        $trip->qtydel = $request->input('qtydel');
        $trip->loaddate = ((is_null($request->input('loaddate')) ? null : date("Y-m-d H:i:s", strtotime($request->input('loaddate')))));
        $trip->arrdate = ((is_null($request->input('arrdate')) ? null : date("Y-m-d H:i:s", strtotime($request->input('arrdate')))));
        $trip->deldate = ((is_null($request->input('deldate')) ? null : date("Y-m-d H:i:s", strtotime($request->input('deldate')))));
        $trip->orgarrdt = ((is_null($request->input('orgarrdt')) ? null : date("Y-m-d H:i:s", strtotime($request->input('orgarrdt')))));
        $trip->unit = $request->input('unit');
        $trip->gstparty = $request->input('gstparty');
        $trip->creator = $request->input('creator');
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

    public function printtrp($id)
    {
        //echo "here ". $id;
        $trips = \DB::table('trip_details')->where('id', $id)->get();
        return view('pages.trips.print_trip_div')->with('trips', $trips);
    }

    public function edit(Request $request)
    {
        $trip = new trip();
       // $myfile = fopen("testfile.txt", "w");
       // fwrite($myfile, "here 1");
        $trip->truck = $request->input('truck');
        $trip->origin = $request->input('origin');
        $trip->dest = $request->input('dest');
        $trip->distance = $request->input('distance');
        $trip->driver1 = $request->input('driver1');
        $trip->driver2 = $request->input('driver2');
        $trip->invoice = $request->input('invoice');
        $trip->ponum = $request->input('ponum');
        $trip->product = $request->input('product');
        $trip->qtyload = $request->input('qtyload');
        $trip->qtydel = $request->input('qtydel');
        $trip->loaddate = ((is_null($request->input('loaddate')) ? null : date("Y-m-d H:i:s", strtotime($request->input('loaddate')))));
        $trip->arrdate = ((is_null($request->input('arrdate')) ? null : date("Y-m-d H:i:s", strtotime($request->input('arrdate')))));
        $trip->deldate = ((is_null($request->input('deldate')) ? null : date("Y-m-d H:i:s", strtotime($request->input('deldate')))));
        $trip->orgarrdt = ((is_null($request->input('orgarrdt')) ? null : date("Y-m-d H:i:s", strtotime($request->input('orgarrdt')))));
        $trip->unit = $request->input('unit');
        $trip->gstparty = $request->input('gstparty');
        $trip->creator = $request->input('creator');
        $trip->notes = $request->input('notes');
        try {
            $trip->exists = true;
            $trip->id = $request->input('id');
            $ret = $trip->save();
            $msg = "Record Modified Successfully";
        } catch (QueryException $ex) {
            $ecode = $ex->errorInfo[1];
            if ($ecode == 1062) {
                $msg = "ERROR: " . $trip->id . " already exists in the database.";
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
            $id = $request->input('id');
            $res = trip::where('id', $id)->delete();
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
