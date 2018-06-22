<div class="modal" tabindex="-2" id="mdl_edit_trp" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
                <div class="modal-header modal-hd">
                        <img src={{ URL::to('/') }}/public/assets/images/trkmov.png  alt="Truck" style="margin-right:16px;margin-bottom:-3px;margin-top:-7px">
                <h5 id="edittrptitle" class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="trp_area_edit" class="modal-body modal-bd">
                <div id="msgdivedit"></div>
                <form id="edittrp">
                    <input type="hidden" id="etoken" value="{!! csrf_token() !!}">
                    <input type="hidden" id="ecreator" value="{{Auth::user()->name}}">
                    <input type="hidden" id="eid">
                    <div class="form-group myformgroup2">
                            <div class="form-row" style="">
                                <div class="col">
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Truck</span>
                                        </div>
                                        <select aria-required=”true” type="text"  required class="form-control form-control-sm" id="etruck">
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
                                        <select required type="text" class="form-control form-control-sm" id="edriver1">
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
                                        <select class="form-control form-control-sm" id="edriver2">
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
                                        <select required type="text" onchange="getdistance('add')" class="form-control form-control-sm" id="eorigin">
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
                                        <input autocomplete="off" required type="text" class="form-control form-control-sm" id="eorgarrdt" style="background-color: #fff;" >
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Load Date</span>
                                        </div>
                                        <input autocomplete="off" required  type="text" class="form-control form-control-sm" id="eloaddate" style="background-color: #fff;" >
                                    </div>
                                </div>
                            </div>
                            <div class="form-row" style="">
                                <div class="col">
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Destination</span>
                                        </div>
                                        <select required type="text" onchange="getdistance('add')" class="form-control form-control-sm" id="edest">
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
                                        <input autocomplete="off" class="form-control form-control-sm" id="earrdate" style="background-color: #fff;" readonly>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Delivery Date</span>
                                        </div>
                                        <input  autocomplete="off" class="form-control form-control-sm" id="edeldate" style="background-color: #fff;" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row" style="">
                                <div class="col">
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Distance</span>
                                        </div>
                                        <input class="form-control form-control-sm" id="edistance" style="background-color: #fff;">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">PO Number</span>
                                        </div>
                                        <input class="form-control form-control-sm" id="eponum" style="background-color: #fff;">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Invoice Number</span>
                                        </div>
                                        <input class="form-control form-control-sm" id="einvoice" style="background-color: #fff;">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row" style="">
                                <div class="col">
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Product</span>
                                        </div>
                                        <input required  type="text" class="form-control form-control-sm" id="eproduct" style="background-color: #fff;">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Loaded Qty</span>
                                        </div>
                                        <input required onChange="chkqty('add');" class="form-control form-control-sm" type="number" id="eqtyload" style="background-color: #fff;">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                                                        <select id="eunit">
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
                                        <input onChange="chkqty('add');" class="form-control form-control-sm" type="number" id="eqtydel" style="background-color: #fff;">
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
                                        <select id="egstparty">
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
                                        <input readonly class="form-control form-control-sm" type="number" id="eshortage" style="background-color: #fff;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group myformgroup2">
                            <div class="form-row" style="margin-bottom:0px;">
                                <div class="col">
                                    <label class="mylabel" for="notes">Notes</label>
                                    <textarea class="form-control form-control-sm" id="enotes" maxlength="254" rows="3"></textarea>
                                </div>
                            </div>
                        </div>                    <div class="form-group ">
                        <div class="form-row " style="margin-bottom:opx; ">
                            <div class="col ">
                            </div>
                            <div class="col text-center ">
                                <button style="width:70px;font-size:13px;margin-top:7px;" onclick=save_edit_trp(); type="submit" class="btn btn-sm btn-info ">Save</button>
                            </div>
                            <div class="col text-center ">
                                    <button style="width:70px;font-size:13px;margin-top:7px;" onclick="event.preventDefault();$('#mdl_edit_trp').modal('hide');"  class="btn btn-sm btn-danger" >Cancel</button>
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