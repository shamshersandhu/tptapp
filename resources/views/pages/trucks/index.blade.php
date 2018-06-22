@extends('layouts.app') 
@section('content')
<?php
$MODAL_BG2="#D8D1F7";
$MODAL_BG1="#C4BBF5";
?>
    @include('pages.trucks.view_truck_div')
    @include('pages.trucks.add_truck_div')
    @include('pages.trucks.edit_truck_div')


<h1>Trucks</h1>

<table id="myTable" class="table-sm table-bordered table-condensed table-hover">
    <thead>
        <tr>
            <th>Ser#</th>
            <th>Reg Num</th>
            <th>Owner</th>
            <th>Make/Model</th>
            <th>Wheels</th>
            <th>Status</th>
            <th class="no-sort text-center">
                <input title="Add New Record" type="image" onclick="add_trk()" src={{ URL::to('/') }}/public/assets/images/add.png alt="Add New">
            </th>
        </tr>
    </thead>
    <tbody>
@if(count($trucks)>0)
        @foreach($trucks as $truck)
        <tr style="cursor: pointer">
            @foreach($owners as $owner)
                @if ($owner->id==$truck->owner) 
                        @php
                            $own_name=$owner->name;
                        @endphp
                        @break;
                @endif
           @endforeach 
            <td title="View Record" onclick='show_trk("{{$truck->id}}")'>{{$truck->id}}</td>
            <td title="View Record" onclick='show_trk("{{$truck->id}}")'>{{$truck->regnum}}</td>
            <td title="View Record" onclick='show_trk("{{$truck->id}}")'>{{$own_name}}</td>
            <td title="View Record" onclick='show_trk("{{$truck->id}}")'>{{$truck->make}}</td>
            <td title="View Record" onclick='show_trk("{{$truck->id}}")'>{{$truck->wheels}}</td>
            <td title="View Record" onclick='show_trk("{{$truck->id}}")'>{{$truck->status}}</td>
            <td style="width:80px;" class="text-center ">
                <input title="Edit Record" type="image" onclick="edit_trk('{{$truck->id}}')" src={{ URL::to('/') }}/public/assets/images/edit.png alt="Edit">
                <input title="Delete Record" type="image" onclick="delete_trk('{{$truck->id}}')" src={{ URL::to('/') }}/public/assets/images/delete.png alt="Delete">
            </td>
        </tr>
        @endforeach
       
@else 
<tr><td colspan=7>No trucks found</td></tr>
@endif
    </tbody>
</table>
@endsection

@section('pagespecificscripts')
    <script src="{{ asset('js/trucks.js') }}"></script>
@stop
