@extends('layouts.app') 
@section('content')
<?php
$MODAL_BG2="#D8D1F7";
$MODAL_BG1="#C4BBF5";
?>
    @include('pages.contacts.view_contact_div')
    @include('pages.contacts.add_contact_div')
    @include('pages.contacts.edit_contact_div')

<h1>{{ $type }}s</h1>
@if(count($contacts)>0)
<table id="myTable" class="table-sm table-bordered table-condensed table-hover">
    <thead>
        <tr>
            <th>Ser#</th>
            <th>Name</th>
            <th>Type</th>
            <th>Phone</th>
            <th>Email</th>
            <th class="no-sort text-center">
                <input title="Add New {{ $type }}" type="image" onclick='add_con("{{ $type }}");' src={{ URL::to('/') }}/public/assets/images/add.png alt="Add New">

            </th>
        </tr>
    </thead>
    <tbody>
        @if (substr($contacts,0,5)=="ERROR")
            <div class="alert alert-danger" role="alert">{{ $contacts }}</div>
            
        @else
        @foreach($contacts as $contact)
            <tr>
            <td title="View Record" onclick='show_con("{{$contact->id}}")'>{{$contact->id}}</td>
            <td title="View Record" onclick='show_con("{{$contact->id}}")'>{{$contact->name}}</td>
            <td title="View Record" onclick='show_con("{{$contact->id}}")'>{{$contact->type}}</td>
            <td title="View Record" onclick='show_con("{{$contact->id}}")'>{{$contact->phone1}}</td>
            <td title="View Record" onclick='show_con("{{$contact->id}}")'>{{$contact->email}}</td>
            <td style="width:80px;" class="text-center">
                <input title="Edit Record" type="image" onclick="edit_con('{{$contact->id}}')" src={{ URL::to('/') }}/public/assets/images/edit.png alt="Edit">
                <input title="DeleteRecord" type="image" onclick="delete_con('{{$contact->id}}')" src={{ URL::to('/') }}/public/assets/images/delete.png alt="Delete"> 
            </td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>
@else
<p>No Contacts found</p>
@endif
@endsection

@section('pagespecificscripts')
    <script src="{{ asset('js/contacts.js') }}"></script>
@stop

