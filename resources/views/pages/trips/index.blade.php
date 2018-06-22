@extends('layouts.app') 
@section('content')
<?php
$MODAL_BG2="#D8D1F7";
$MODAL_BG1="#C4BBF5";
?>
    @include('pages.trips.view_trip_div')
    @include('pages.trips.add_trip_div')
    @include('pages.trips.edit_trip_div')
<h1>Trips</h1>
<table id="myTable" class="table-sm table-bordered table-condensed table-hover">
    <thead>
        <tr>
            <th>LR Num</th>
            <th>Truck Reg Num</th>
            <th>Origin</th>
            <th>Destination</th>
            <th>Driver</th>
            <th>Product</th>
            <th>Load Date</th>
            <th>Invoice</th>

            <th class="no-sort text-center">
                <input title="Add New Record" type="image" onclick="add_trp()" src={{ URL::to('/') }}/public/assets/images/add.png alt="Add New">
            </th>
        </tr>
    </thead>
    <tbody>
@if(count($trips)>0)
        @foreach($trips as $trip)
        <tr style="cursor: pointer">
            <td title="View Record" onclick='show_trp("{{$trip->id}}")'>{{$trip->id}}</td>
            <td title="View Record" onclick='show_trp("{{$trip->id}}")'>{{$trip->regnum}}</td>
            <td title="View Record" onclick='show_trp("{{$trip->id}}")'>{{$trip->origin_name}}</td>
            <td title="View Record" onclick='show_trp("{{$trip->id}}")'>{{$trip->dest_name}}</td>
            <td title="View Record" onclick='show_trp("{{$trip->id}}")'>{{$trip->driver1_name}}</td>
            <td title="View Record" onclick='show_trp("{{$trip->id}}")'>{{$trip->product}}</td>
            <td title="View Record" onclick='show_trp("{{$trip->id}}")'>{{substr($trip->lr_date,0,10)}}</td>
            <td title="View Record" onclick='show_trp("{{$trip->id}}")'>{{$trip->invoice}}</td>
            <td style="width:80px;" class="text-center ">
                <input title="Edit Record" type="image" onclick="edit_trp('{{$trip->id}}')" src={{ URL::to('/') }}/public/assets/images/edit.png alt="Edit">
                <input title="Delete Record" type="image" onclick="delete_trp('{{$trip->id}}')" src={{ URL::to('/') }}/public/assets/images/delete.png alt="Delete">
           </td>
        </tr>
        @endforeach
@else 
<tr><td colspan=7>No trips found</td></tr>
@endif
    </tbody>
</table>
@endsection

@section('pagespecificscripts')
    <script src="{{ asset('js/trips.js') }}"></script>
  {{--  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD1CUHmTHvyo1csI1_jAtl2jtY7Z2smVFo"></script> --}}
@stop
