<div class="modal" tabindex="-2" id="mdl_edit_trp" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div style="background-color:{{$MODAL_BG1}};padding:6px 12px 4px 12px;" class="modal-header">
                <h5 id="edittriptitle" tclass="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div style="background-color:{{$MODAL_BG2}};padding:6px 12px 4px 12px;" id="trp_area_edit" class="modal-body">
                <div id="msgdivedit"></div>
                <form id="edittrp">
                    <input type="hidden" name="_token" id="etoken" value="{{ csrf_token() }}">
                    <input type="hidden" id="eid">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col">
                                <label class="mylabel" for="etruck">Reg. Num.</label>
                                <select class="form-control" id="etruck">
                                    <option value=""></option>
                                    @foreach($trucks as $truck)
                                        <option value="{{$truck->id}}">{{$truck->regnum}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label class="mylabel" for="eorigin">Origin</label>
                                <select class="form-control" id="eorigin">
                                    <option value=""></option>
                                    @foreach($locations as $origin)
                                        <option value="{{$origin->id}}">{{$origin->name}}</option>
                                    @endforeach 
                                </select>
                            </div>
                            <div class="col">
                                <label class="mylabel" for="edest">Destination</label>
                                <select class="form-control" id="edest">
                                    <option value=""></option>
                                    @foreach($locations as $dest)
                                        <option value="{{$dest->id}}">{{$dest->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label class="mylabel" for="edistance">Distance</label>
                                <input class="form-control" id="edistance" type="number" value="0" placeholder="Dist. in KMs">

                            </div>
                            <div class="col">
                                <label class="mylabel" for="edriver1">Driver 1</label>
                                <select class="form-control" id="edriver1">
                                    <option value=""></option>
                                    @foreach($drivers as $driver)
                                        <option value="{{$driver->id}}">{{$driver->name}}</option>
                                    @endforeach 
                                </select>
                            </div>
                            <div class="col">
                                <label class="mylabel" for="edriver2">Driver 2</label>
                                <select class="form-control" id="edriver2">
                                        <option value=""></option>
                                        @foreach($drivers as $driver)
                                            <option value="{{$driver->id}}">{{$driver->name}}</option>
                                        @endforeach 
                                    </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label class="mylabel" for="einvoice">Invoice Num</label>
                                <input class="form-control" id="einvoice" maxlength="40" placeholder="Invoice Num.">
                            </div>
                            <div class="col">
                                <label class="mylabel" for="eproduct">Product Details</label>
                                <input class="form-control" id="eproduct" maxlength="60" placeholder="Product Details">
                            </div>
                            <div class="col">
                                <label class="mylabel" for="eqtyload">Qty Loaded</label>
                                <input class="form-control" id="eqtyload" type="number"  placeholder="Load Qty">
                            </div>
                            <div class="col">
                                <label class="mylabel" for="eqtydel">Qty Delivered</label>
                                <input class="form-control" id="eqtydel" type="number"  placeholder="Del Qty">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label class="mylabel" for="epickdate">Pickup DateTime</label>
                                <input class="form-control" id="epickdate" type="date">
                            </div>
                            <div class="col">
                                <label class="mylabel" for="epicktime">-</label>
                                <input class="form-control" id="epicktime" type="time">
                            </div>
                            <div class="col">
                                <label class="mylabel" for="edeldate">Delivery DateTime</label>
                                <input class="form-control" id="edeldate" type="date">
                            </div>
                            <div class="col">
                                <label class="mylabel" for="edeltime">-</label>
                                <input class="form-control" id="edeltime" type="time">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="mylabel" for="enotes">Notes</label>
                            <textarea class="form-control" id="enotes" maxlength="254" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col text-center">
                                    <button onclick=save_edit_trp(); type="submit" class="btn btn-sm btn-info">Save</button>
                                </div>
                                <div class="col text-center">
                                    <button type="submit" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>