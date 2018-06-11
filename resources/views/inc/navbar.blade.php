<nav class="navbar navbar-expand-md navbar-dark" style="background-color: #444;">
  <a class="navbar-brand" style="margin-top:0px;margin-bottom:0px;border:none;padding-top:0px;padding-bottom:0px" href="/">
    <img src={{ URL::to('/') }}/public/assets/images/cw_logo_lg.jpg 
          style="margin-top:-7px;margin-bottom:-7px;border:none; padding-top:0px;padding-bottom:0px;width:170px;height:55px;" alt="CountryWide">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainnav" aria-controls="mainnav"
    aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="mainnav">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Trucks
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="/trucks">Trucks</a>
          <a class="dropdown-item" href="#">Location Update</a>
          <a class="dropdown-item" href="#">Repair &amp; Maintenence</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Locations
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdown02">
          <a class="dropdown-item" href="/contacts/locations/Client">Companies</a>
          <a class="dropdown-item" href="/contacts/locations/Location">Locations</a>
          <a class="dropdown-item" href="/contacts">Contacts</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Drivers
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdown03">
          <a class="dropdown-item" href="/contacts/locations/Driver">Drivers</a>
          <a class="dropdown-item" href="#">Accidents</a>
          <a class="dropdown-item" href="#">Other Incidents</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Trips
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdown04">
          <a class="dropdown-item" href="/trips">Trips</a>
          <a class="dropdown-item" href="#">Products</a>
          <a class="dropdown-item" href="#">Trip Report</a>
        </div>
      </li>
      <li>
        <div class="pull-right">
          <a style='text-align:center;color:aquamarine;position:fixed;right:25px;top:9px;width:70px;line-height:80%' href='logout'>
              <small>
              @php if (Auth::guest()) { $usernow=""; } else { ($usernow=Auth::user()->name);echo "$usernow LogOut"; } 
              @endphp
            </small>
          </a>
        </div>
      </li>
    </ul>
  </div>
</nav>