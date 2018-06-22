<div class="modal" tabindex="-3" id="mdl_add_trp" role="dialog">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                    <div class="modal-header modal-hd">
                            <img src={{ URL::to('/') }}/public/assets/images/trkmov.png  alt="Truck" style="margin-right:16px;margin-bottom:-3px;margin-top:-7px">
                    <h5 id="addtrptitle" class="modal-title">Add New Trip</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="trp_area_add" class="modal-body modal-bd">
                    <div id="msgdivadd"></div>
                    <form id="addtrp">
                        <input type="hidden" id="token" value="{!! csrf_token() !!}">
                        <input type="hidden" id="creator" value="{{Auth::user()->name}}">
                        <input type="hidden" id="id">
                        <div class="form-group myformgroup2">
                            <div class="form-row" style="">
                                <div class="col">
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Truck</span>
                                        </div>
                                        <select aria-required=”true” type="text"  required class="form-control form-control-sm" id="truck">
                                                <option value=""></option>
                                                @foreach($trucks as $truck)
                                                    <option value="{{$truck->id}}">{{$truck->regnum}}</option>
                                                @endforeach                                                                          
                                                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Driver1</span>
                                        </div>
                                        <select required  type="text" class="form-control form-control-sm" id="driver1">
                                                                    <option value=""></option>
                                                                    @foreach($drivers as $driver)
                                                                    <option value="{{$driver->id}}">{{$driver->name}}</option>
                                                                @endforeach                                                                
                                                                </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Driver2</span>
                                        </div>
                                        <select class="form-control form-control-sm" id="driver2">
                                                                    <option value="">No Driver 2</option>
                                                                    @foreach($drivers as $driver)
                                                                    <option value="{{$driver->id}}">{{$driver->name}}</option>
                                                                @endforeach 
                                                                </select>
                                    </div>
                                </div>
    
                            </div>
                            <div class="form-row" style="">
                                <div class="col">
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Origin</span>
                                        </div>
                                        <select required  type="text" onchange="getdistance('add')" class="form-control form-control-sm" id="origin">
                                            <option Value=""></option>
                                                @foreach($locations as $origin)
                                                <option value="{{$origin->id}}">{{$origin->name}}</option>
                                            @endforeach                                                               
                                                                                </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Arrival-Date Org</span>
                                        </div>
                                        <input autocomplete="off" required type="text" class="form-control form-control-sm" id="orgarrdt" style="background-color: #fff;" >
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Load Date</span>
                                        </div>
                                        <input autocomplete="off" required  type="text"class="form-control form-control-sm" id="loaddate" style="background-color: #fff;" >
                                    </div>
                                </div>
                            </div>
                            <div class="form-row" style="">
                                <div class="col">
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Destination</span>
                                        </div>
                                        <select required type="text" onchange="getdistance('add')" class="form-control form-control-sm" id="dest">
                                                <option Value=""></option>
                                                @foreach($locations as $dest)
                                                <option value="{{$dest->id}}">{{$dest->name}}</option>
                                            @endforeach                                                           
                                                                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Arrival-Date Dst</span>
                                        </div>
                                        <input autocomplete="off" class="form-control form-control-sm" id="arrdate" style="background-color: #fff;" readonly>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Delivery Date</span>
                                        </div>
                                        <input  autocomplete="off" class="form-control form-control-sm" id="deldate" style="background-color: #fff;" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row" style="">
                                <div class="col">
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Distance</span>
                                        </div>
                                        <input class="form-control form-control-sm" id="distance" style="background-color: #fff;">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">PO Number</span>
                                        </div>
                                        <input class="form-control form-control-sm" id="ponum" style="background-color: #fff;">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Invoice Number</span>
                                        </div>
                                        <input class="form-control form-control-sm" id="invoice" style="background-color: #fff;">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row" style="">
                                <div class="col">
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Product</span>
                                        </div>
                                        <input required  type="text" class="form-control form-control-sm" id="product" style="background-color: #fff;">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Loaded Qty</span>
                                        </div>
                                        <input required onChange="chkqty('add');" class="form-control form-control-sm" type="number" id="qtyload" style="background-color: #fff;">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                                                        <select id="unit">
                                                                                                <option value="KGs" selected>KGs</option>
                                                                                                <option value="LTs" selected>LTs</option>
                                                                                                <option value="MTs">MTs</option>
                                                                                            </select>
                                                                                </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Delivered Qty</span>
                                        </div>
                                        <input onChange="chkqty('add');" class="form-control form-control-sm" type="number" id="qtydel" style="background-color: #fff;">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row" style="">
                                <div class="col">
                                </div>
                                <div class="col">
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">GST Party</span>
                                        </div>
                                        <select id="gstparty">
                                                                            <option value="Consignor">Consignor</option>
                                                                            <option value="Consignee" selected>Consignee</option>
                                                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Shortage</span>
                                        </div>
                                        <input readonly class="form-control form-control-sm" type="number" id="shortage" style="background-color: #fff;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group myformgroup2">
                            <div class="form-row" style="margin-bottom:0px;">
                                <div class="col">
                                    <label class="mylabel" for="notes">Notes</label>
                                    <textarea class="form-control form-control-sm" id="notes" maxlength="254" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="form-row " style="margin-bottom:opx; ">
                                <div class="col ">
                                </div>
                                <div class="col text-center ">
                                    <button style="width:70px;font-size:13px;margin-top:7px;" onclick=save_trp(); type="submit" class="btn btn-sm btn-info ">Save</button>
                                </div>
                                <div class="col text-center ">
                                    <button style="width:70px;font-size:13px;margin-top:7px;" onclick="event.preventDefault();$('#mdl_add_trp').modal('hide');"  class="btn btn-sm btn-danger" >Cancel</button>
                                </div>
                                <div class="col ">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>