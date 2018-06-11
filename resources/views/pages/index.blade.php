@extends('layouts.app') 
@section('content')
<div class="jumbotron text-center">
    <h5 style="color:#666">Welcome to CountryWide Chem Logistic&apos;s Internal Website</h5><br><br>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault"
        aria-expanded="false" aria-label="Toggle navigation">
    <p><a class="btn btn-primary btn-lg" href="/login" role="button">Login</a>
    @if (isset(Auth::user()->name) and (Auth::user()->name=="Sam Sandhu"))
        <a class="btn btn-success btn-lg" href="/register" role="button">Register</a>
    @endif
    </p>
    <br><br> 
    <div style="color:#666">
        <p style="line-height:30%;">Notice</p>
        <p style="line-height:10%;"><small>This Website is for Authorised Personnel only.</small></p>
        <p style="line-height:10%;"><small>Any unauthorised usage will be reported and prosecuted as per law.</small></p>
    </div>
</div>
@endsection