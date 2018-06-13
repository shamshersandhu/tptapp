<div class="modal" tabindex="-2" id="mdl_edit_con" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div style="background-color:#C4BBF5;" class="modal-header">
                <img src={{ URL::to( '/') }}/public/assets/images/con.png alt="Contact" style="height: 41px;width: auto;margin-right: 16px;margin-bottom: -7px;margin-top: -6px;">
                <h5 id="editcontitle" class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div style="background-color:#D8D1F7;padding:6px;" id="con_area_edit" class="modal-body">
                <div id="msgdivedit"></div>
                <input type="hidden" id="eid">
                <input type="hidden" id="etoken" value="{!! csrf_token() !!}">
                <input type="hidden" id="ecreator" value="{{Auth::user()->name}}">
                <form id="edit_contact_form">
                    <div class="form-group myformgroup2">
                        <div class="form-row" style="margin-bottom: 8px;">
                            <div class="col">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Name</span>
                                    </div>
                                    <input class="form-control" required id="ename" maxlength="60" placeholder="Person or Company Name">
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Email</span>
                                    </div>
                                    <input type="email" class="form-control" id="eemail" maxlength="60" placeholder="EMail Address">
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Contact Type</span>
                                    </div>
                                    <select onchange="con_type_change('edit');" class="form-control" id="etype">
                                            <option value="STAFF" selected>Staff or Employee</option>
                                            <option  value="DRIVER">Driver</option>
                                            <option value="CLIENT">Client or Company</option>
                                            <option value="LOCATION">Location</option>
                                            <option value="SERVICE_PROVIDER">Service Provider</option>
                                            <option value="MISC">Misc</option>
                                         </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-row" style="margin-bottom: 8px;">
                            <div class="col">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Description</span>
                                    </div>
                                    <input class="form-control" id="ecdesc" maxlength="60" placeholder="Desc or Designation">
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Phone 1</span>
                                    </div>
                                    <input class="form-control" id="ephone1" maxlength="20" placeholder="Main Phone">
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Phone 2</span>
                                    </div>
                                    <input class="form-control" id="ephone2" maxlength="20" placeholder="Alt Phone">
                                </div>
                            </div>
                        </div>
                        <div class="form-row" style="margin-bottom: 8px;" id="edrvrow">
                            <div class="col">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Driver Licence #</span>
                                    </div>
                                    <input class="form-control" id="edl_num" maxlength="20" placeholder="DL #">
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">State</span>
                                    </div>
                                    <input class="form-control" id="edl_state" maxlength="20" placeholder="DL State">
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">DL Expirey</span>
                                    </div>
                                    <input class="form-control" id="edl_exp" style="background-color:#fff" readonly type="text">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-4">
                                <label class="mylabel" for="eadd11">Main Address</label>
                                <input class="form-control form-control-sm" id="eadd11" maxlength="60" placeholder="Alternate Address">
                            </div>
                            <div class="col-3">
                                <label class="mylabel" for="ecity1">City</label>
                                <input class="form-control form-control-sm" id="ecity1" maxlength="40" placeholder="City">
                            </div>
                            <div class="col-3">
                                <label class="mylabel" for="estate1">State</label>
                                <select class="form-control form-control-sm" id="estate1">
                                                                                <option value="">Select State</option>
                                                                                        @foreach($states as $state)
                                                                                        <option value="{{$state->state}}">{{$state->state}}</option>
                                                                                    @endforeach            
                                                                            </select>
                            </div>
                            <div class="col-2">
                                <label class="mylabel" for="epin1">PIN</label>
                                <input class="form-control form-control-sm" id="epin1" type="text" pattern="[1-9][0-9][0-9][0-9][0-9][0-9]" placeholder="PIN">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-4">
                                <label class="mylabel" for="eadd22">Alternate Address</label>
                                <input class="form-control form-control-sm" id="eadd22" maxlength="60" placeholder="Alternate Address">
                            </div>
                            <div class="col-3">
                                <label class="mylabel" for="ecity2">City</label>
                                <input class="form-control form-control-sm" id="ecity2" maxlength="40" placeholder="City">
                            </div>
                            <div class="col-3">
                                <label class="mylabel" for="estate2">State</label>
                                <select class="form-control form-control-sm" id="estate2">
                                                                            <option value="">Select State</option>
                                                                            @foreach($states as $state)
                                                                                <option value="{{$state->state}}">{{$state->state}}</option>
                                                                            @endforeach
                                                                       </select>
                            </div>
                            <div class="col-2">
                                <label class="mylabel" for="epin2">PIN</label>
                                <input class="form-control form-control-sm" id="epin2" type="text" pattern="[1-9][0-9][0-9][0-9][0-9][0-9]" placeholder="PIN">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col">
                                    <label class="mylabel" for="enotes">Notes</label>
                                    <textarea class="form-control" id="enotes" maxlength="254" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row" style="margin-bottom:0px;">
                                <div class="col">
                                </div>
                                <div class="col text-center">
                                    <button style="width:70px;font-size:13px;" onclick=save_edit_con(); type="submit" class="btn btn-sm btn-info">Save</button>
                                </div>
                                <div class="col text-center">
                                    <button style="width:70px;font-size:13px;" type="submit" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
                                </div>
                                <div class="col">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>