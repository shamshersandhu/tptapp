<div class="modal" tabindex="-2" id="mdl_edit_con" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div style="background-color:{{$MODAL_BG1}};padding:6px 12px 4px 12px;" class="modal-header">
                <h5 class="modal-title">Edit Contact</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div style="background-color:{{$MODAL_BG2}};padding:6px 12px 4px 12px;" id="con_area_edit" class="modal-body">
                <div id="msgdivedit"></div>
                    <input type="hidden" id="eid">
                    <div class="form-group">
                        <label class="mylabel" for="ename">Name</label>
                        <input class="form-control"  required id="ename" maxlength="60" placeholder="Person or Company Name">
                        <label class="mylabel" for="eadd11">Address 1</label>
                        <input class="form-control"  id="eadd11" maxlength="60" placeholder="Main Address Line 1">
                        <input class="form-control"  id="eadd12" maxlength="60" placeholder="Main Address Line 2">
                        <label class="mylabel" for="eadd21">Address 2</label>
                        <input class="form-control" id="eadd21" maxlength="60" placeholder="Alternate Address Line 1">
                        <input class="form-control" id="eadd22" maxlength="60" placeholder="Alternate Address Line 2">
                        <div class="form-row">
                            <div class="col">
                                <label class="mylabel" for="phone1">Phone 1</label>
                                <input class="form-control" id="ephone1" maxlength="20" placeholder="Main Phone">
                            </div>
                            <div class="col">
                                <label class="mylabel" for="ephone2">Phone 2</label>
                                <input class="form-control" id="ephone2" maxlength="20" placeholder="Alternate Phone">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label class="mylabel" for="eemail">EMail</label>
                                <input type="email" class="form-control" id="eemail" maxlength="60" placeholder="EMail Address">
                            </div>
                            <div class="col">
                                <label class="mylabel" for="etype">Contact Type</label>
                                <select class="form-control" id="etype">
                                <option value="STAFF" selected>Staff or Employee</option>
                                <option value="DRIVER">Driver</option>
                                <option value="CLIENT">Client or Company</option>
                                <option value="LOCATION">Location</option>
                                <option value="SERVICE_PROVIDER">Service Provider</option>
                                <option value="MISC">Misc</option>
                    </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label class="mylabel" for="edl_num">Dr. Lic.#</label>
                                <input class="form-control" id="edl_num" maxlength="20" placeholder="DL #">
                            </div>
                            <div class="col">
                                <label class="mylabel" for="edl_state">State</label>
                                <input class="form-control" id="edl_state" maxlength="20" placeholder="DL State">
                            </div>
                            <div class="col">
                                <label class="mylabel" for="edl_exp">Exp Date</label>
                                <input class="form-control" id="edl_exp" type="date">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="mylabel" for="enotes">Notes</label>
                            <textarea class="form-control" id="enotes" maxlength="254" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col text-center">
                                    <button onclick=save_edit_con(); type="submit" class="btn btn-sm btn-info">Save</button>
                                </div>
                                <div class="col text-center">
                                    <button type="submit" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>