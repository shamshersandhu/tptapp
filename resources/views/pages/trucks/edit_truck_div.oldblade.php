<div class="modal" tabindex="-2" id="mdl_edit_trk" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div style="background-color:{{$MODAL_BG1}};padding:6px 12px 4px 12px;" class="modal-header">
                <h5 class="modal-title">Edit Truck</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div style="background-color:{{$MODAL_BG2}};padding:6px 12px 4px 12px;" id="trk_area_edit" class="modal-body">
                <div id="msgdivedit"></div>
                <form id="addcon">
                    <input type="hidden" name="_token" id="etoken" value="{{ csrf_token() }}">
                    <input type="hidden" id="eid">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col">
                                <label class="mylabel" for="eregnum">Reg. Num.</label>
                                <input class="form-control" required='required' id="eregnum" maxlength="12" placeholder="Reg Num">
                            </div>
                            <div class="col">
                                <label class="mylabel" for="eowner">Owner</label>
                                <select class="form-control" id="eowner">
                                            @foreach($owners as $owner)
                                                <option value="{{$owner->id}}">{{$owner->name}}</option>
                                           @endforeach 
                                          
                                        </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label class="mylabel" for="epurch_date">Purch. Date</label>
                                <input class="form-control" id="epurch_date" type="date" maxlength="11">
                            </div>
                            <div class="col">
                                <label class="mylabel" for="esold_date">Sold Date</label>
                                <input class="form-control" id="esold_date" type="date" maxlength="20">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label class="mylabel" for="estatus">Truck Status</label>
                                <select class="form-control" id="estatus">
                                            <option value="ACTIVE" selected>Atcive</option>
                                            <option value="SOLD">Sold</option>
                                            <option value="INACTIVE">Inactive</option>
                                            <option value="MISC">Misc/Unknown</option>
                                        </select>
                            </div>
                            <div class="col">
                                <label class="mylabel" for="emake">Make &amp; Model</label>
                                <input class="form-control" id="emake" maxlength="50" placeholder="Make and Model">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label class="mylabel" for="ewheels">Wheels</label>
                                <input class="form-control" id="ewheels" type="number" value="10" maxlength="4" placeholder="Wheels">
                            </div>
                            <div class="col">
                                <label class="mylabel" for="GWT">GWT</label>
                                <input class="form-control" id="eGWT" type="number" maxlength="8" placeholder="Maximum Loaded Weight">
                            </div>
                            <div class="col">
                                <label class="mylabel" for="NWT">NWT</label>
                                <input class="form-control" id="eNWT" type="number" maxlength="8" placeholder="Net Carrying Capacity">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label class="mylabel" for="etank_desc">Tank Type</label>
                                <input class="form-control" id="etank_desc" maxlength="60" placeholder="Tank Type">
                            </div>
                            <div class="col">
                                <label class="mylabel" for="eengine_num">Engine Num.</label>
                                <input class="form-control" id="eengine_num" maxlength="20" placeholder="Engine Num.">
                            </div>
                            <div class="col">
                                <label class="mylabel" for="ech_num">Chassis Num.</label>
                                <input class="form-control" id="ech_num" maxlength="20" placeholder="Chassis Num.">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label class="mylabel" for="einspolnum">Insurance Pol Num</label>
                                <input class="form-control" id="einspolnum" maxlength="20" placeholder="Insurance Pol Num">
                            </div>
                            <div class="col">
                                <label class="mylabel" for="einspolpro">Insurance Provider</label>
                                <input class="form-control" id="einspolpro" maxlength="40" placeholder="Insurance Provider">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="mylabel" for="enotes">Notes</label>
                            <textarea class="form-control" id="enotes" maxlength="254" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col text-center">
                                    <button onclick=save_edit_trk(); type="submit" class="btn btn-sm btn-info">Save</button>
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