<div class="modal fast" tabindex="-2" id="mdl_add_trk" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div style="background-color:{{$MODAL_BG1}};padding:6px 12px 4px 12px;" class="modal-header">
                <h5 class="modal-title">Add New Truck</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div style="background-color:{{$MODAL_BG2}};padding:6px 12px 4px 12px;" id="trk_area_add" class="modal-body">
                <div id="msgdiv"></div>
                <form id="addtrk">
                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col">
                                <label class="mylabel" for="regnum">Reg. Num.</label>
                                <input class="form-control" required='required' id="regnum" maxlength="12" placeholder="Reg Num">
                            </div>
                            <div class="col">
                                <label class="mylabel" for="owner">Owner</label>
                                <select class="form-control" id="owner">
                                    @foreach($owners as $owner)
                                        <option value="{{$owner->id}}">{{$owner->name}}</option>
                                   @endforeach 
                                  
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                                <div class="col">
                                        <label class="mylabel" for="purch_date">Purch. Date</label>
                                        <input class="form-control" id="purch_date" type="date">
                                    </div>
                            <div class="col">
                                <label class="mylabel" for="sold_date">Sold Date</label>
                                <input class="form-control" id="sold_date" type="date">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label class="mylabel" for="status">Truck Status</label>
                                <select class="form-control" id="status">
                                    <option value="ACTIVE" selected>Atcive</option>
                                    <option value="SOLD">Sold</option>
                                    <option value="INACTIVE">Inactive</option>
                                    <option value="MISC">Misc/Unknown</option>
                                </select>
                            </div>
                            <div class="col">
                                    <label class="mylabel" for="make">Make &amp; Model</label>
                                    <input class="form-control" id="make" maxlength="50" placeholder="Make and Model">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label class="mylabel" for="wheels">Wheels</label>
                                <input class="form-control" id="wheels" type="number" value="10" placeholder="Wheels">
                            </div>
                            <div class="col">
                                <label class="mylabel" for="GWT">GWT</label>
                                <input class="form-control" id="GWT" type="number" placeholder="Maximum Loaded Weight">
                            </div>
                            <div class="col">
                                    <label class="mylabel" for="NWT">NWT</label>
                                    <input class="form-control" id="NWT" type="number" placeholder="Net Carrying Capacity">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label class="mylabel" for="tank_desc">Tank Type</label>
                                <input class="form-control" id="tank_desc" maxlength="60" placeholder="Tank Type">
                            </div>
                            <div class="col">
                                <label class="mylabel" for="engine_num">Engine Num.</label>
                                <input class="form-control" id="engine_num" maxlength="20" placeholder="Engine Num.">
                            </div>
                            <div class="col">
                                <label class="mylabel" for="ch_num">Chassis Num.</label>
                                <input class="form-control" id="ch_num" maxlength="20" placeholder="Chassis Num.">
                            </div>
                        </div>
                        <div class="form-row">
                                <div class="col">
                                    <label class="mylabel" for="inspolnum">Insurance Pol Num</label>
                                    <input class="form-control" id="inspolnum" maxlength="20" placeholder="Insurance Pol Num">
                                </div>
                                <div class="col">
                                    <label class="mylabel" for="inspolpro">Insurance Provider</label>
                                    <input class="form-control" id="inspolpro" maxlength="40" placeholder="Insurance Provider">
                                </div>
                            </div>
                        <div class="form-group">
                            <label class="mylabel" for="notes">Notes</label>
                            <textarea class="form-control" id="notes" maxlength="254" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col text-center">
                                    <button onclick=save_trk(); type="submit" class="btn btn-sm btn-info">Save</button>
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