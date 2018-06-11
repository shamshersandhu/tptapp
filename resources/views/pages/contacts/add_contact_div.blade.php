<div class="modal" tabindex="-2" id="mdl_add_con" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div style="background-color:{{$MODAL_BG1}};padding:6px 12px 4px 12px;" class="modal-header">
                <h5 class="modal-title">Add New {{ $type }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
                 </button>
            </div>
            <div style="background-color:{{$MODAL_BG2}};padding:6px 12px 4px 12px;" id="con_area_add" class="modal-body">
                <div id="msgdiv"></div>
                    <div class="form-group">
                        <div class="form-row">
                            <label class="mylabel" for="name">Name</label>
                            <input class="form-control" required id="name" maxlength="60" placeholder="Person or Company Name">
                        </div>
                        <div class="form-row">

                            <label class="mylabel" for="add11">Address 1</label>
                            <input class="form-control" id="add11" maxlength="60" placeholder="Main Address Line 1">
                        </div>
                        <div class="form-row">
                            <input class="form-control" id="add12" maxlength="60" placeholder="Main Address Line 2">
                        </div>
                        <div class="form-row">
                            <label class="mylabel" for="add21">Address 2</label>
                            <input class="form-control" id="add21" maxlength="60" placeholder="Alternate Address Line 1">
                        </div>
                        <div class="form-row">
                            <input class="form-control" id="add22" maxlength="60" placeholder="Alternate Address Line 2">
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label class="mylabel" for="phone1">Phone 1</label>
                                <input class="form-control" id="phone1" maxlength="20" placeholder="Main Phone">
                            </div>
                            <div class="col">
                                <label class="mylabel" for="phone2">Phone 2</label>
                                <input class="form-control" id="phone2" maxlength="20" placeholder="Alternate Phone">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label class="mylabel" for="email">EMail</label>
                                <input type="email" class="form-control" id="email" maxlength="60" placeholder="EMail Address">
                            </div>
                            <div class="col">
                                <label class="mylabel" for="type">Contact Type</label>
                                <select class="form-control" id="type">
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
                                <label class="mylabel" for="dl_num">Dr. Lic.#</label>
                                <input class="form-control" id="dl_num" maxlength="20" placeholder="DL #">
                            </div>
                            <div class="col">
                                <label class="mylabel" for="dl_state">State</label>
                                <input class="form-control" id="dl_state" maxlength="20" placeholder="DL State">
                            </div>
                            <div class="col">
                                <label class="mylabel" for="dl_exp">Exp Date</label>
                                <input class="form-control" id="dl_exp" type="date" lang="en">
                            </div>
                        </div>
                        <div class="form-row">
                            <label class="mylabel" for="notes">Notes</label>
                            <textarea class="form-control" id="notes" maxlength="254" rows="3"></textarea>
                        </div><p></p>
                        <div class="form-row">
                            <div class="col text-center">
                                <button onclick=save_con(); type="submit" class="btn btn-sm btn-info">Save</button>
                            </div>
                            <div class="col text-center">
                                <button type="submit" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>


