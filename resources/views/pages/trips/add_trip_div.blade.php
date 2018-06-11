<div class="modal" tabindex="-2" id="mdl_add_trp" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div style="background-color:{{$MODAL_BG1}};padding:6px 12px 4px 12px;" class="modal-header">
                <h5 class="modal-title">Add New Trip</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div style="background-color:{{$MODAL_BG2}};padding:6px 12px 4px 12px;" id="trp_area_add" class="modal-body">
                <div id="msgdiv"></div>
                <form id="addtrp">
                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col">
                                <label class="mylabel" for="truck">Reg. Num.</label>
                                <select class="form-control" id="truck">
                                    <option value=""></option>
                                    @foreach($trucks as $truck)
                                        <option value={{$truck->id}}>{{$truck->regnum}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label class="mylabel" for="origin">Origin</label>
                                <select class="form-control" id="origin">
                                    <option value=""></option>
                                    @foreach($locations as $origin)
                                        <option value={{$origin->id}}>{{$origin->name}}</option>
                                   @endforeach 
                                </select>
                            </div>
                            <div class="col">
                                <label class="mylabel" for="dest">Destination</label>
                                <select class="form-control" id="dest">
                                    <option value=""></option>
                                    @foreach($locations as $dest)
                                        <option value={{$dest->id}}>{{$dest->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label class="mylabel" for="distance">Distance</label>
                                <input class="form-control" id="distance" type="number" value="0" placeholder="Dist. in KMs">
                            </div>
                            <div class="col">
                                <label class="mylabel" for="driver1">Driver 1</label>
                                <select class="form-control" id="driver1">
                                    <option value=""></option>
                                    @foreach($drivers as $driver)
                                        <option value="{{$driver->id}}">{{$driver->name}}</option>
                                    @endforeach 
                                </select>
                            </div>
                            <div class="col">
                                <label class="mylabel" for="driver2">Driver 2</label>
                                <select class="form-control" id="driver2">
                                    <option value=""></option>
                                    @foreach($drivers as $driver)
                                        <option value="{{$driver->id}}">{{$driver->name}}</option>
                                    @endforeach 
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label class="mylabel" for="invoice">Invoice Num.</label>
                                <input class="form-control" id="nvoice" maxlength="40" placeholder="Invoice Number">
                            </div>
                            <div class="col">
                                <label class="mylabel" for="product">Product Details</label>
                                <input class="form-control" id="product" maxlength="60" placeholder="Product Details">
                            </div>
                            <div class="col">
                                <label class="mylabel" for="qtyload">Qty Loaded</label>
                                <input class="form-control" id="qtyload" type="number" placeholder="Load Qty">
                            </div>
                            <div class="col">
                                <label class="mylabel" for="qtydel">Qty Delivered</label>
                                <input class="form-control" id="qtydel" type="number" placeholder="Del Qty">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label class="mylabel" for="pickdate">Pickup DateTime</label>
                                <input class="form-control" id="pickdate" type="date">
                            </div>
                            <div class="col">
                                <label class="mylabel" for="picktime">-</label>
                                <input class="form-control" id="picktime" type="time">
                            </div>
                            <div class="col">
                                <label class="mylabel" for="deldate">Delivery DateTime</label>
                                <input class="form-control" id="deldate" type="date">
                            </div>
                            <div class="col">
                                <label class="mylabel" for="deltime">-</label>
                                <input class="form-control" id="deltime" type="time">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="mylabel" for="notes">Notes</label>
                            <textarea class="form-control" id="notes" maxlength="254" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col text-center">
                                    <button onclick=save_trp(); type="submit" class="btn btn-sm btn-info">Save</button>
                                </div>
                                <div class="col text-center">
                                    <button type="submit" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>