<div class="modal" tabindex="-2" id="mdl_edit_trk" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header modal-hd">
                <img src={{ URL::to('/') }}/public/assets/images/trk.png  alt="Truck" style="margin-right:16px;margin-bottom:2px;margin-top:-2px">
                <h5 id="edittrktitle" class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div id="trk_area_edit" class="modal-body modal-bd">
                <div id="msgdivedit"></div>
                <form id="edittrk">
                    <input type="hidden" id="etoken" value="{!! csrf_token() !!}">
                    <input type="hidden" id="ecreator" value="{{Auth::user()->name}}">
                    <input type="hidden" id="eid">
                    <div class="form-group myformgroup">
                        <div class="form-row" style="">
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>Reg. Num</span>
                                    </div>
                                    <input type="text" required class='form-control form-control-sm' id='eregnum' style='background-color: #fff;'>
                                </div>
                            </div>
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>Owner</span>
                                    </div>
                                    <select type="text" required class="form-control" id="eowner">
                                            <option value="">Select Owner</option>
                                            @foreach($owners as $owner)
                                                <option value="{{$owner->id}}">{{$owner->name}}</option>
                                           @endforeach 
                                          
                                        </select> </div>
                            </div>
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>Purch Date</span>
                                    </div>
                                    <input class='form-control form-control-sm' id='epurch_date' style='background-color: #fff;'>
                                </div>
                            </div>
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>Sold Date</span>
                                    </div>
                                    <input class='form-control form-control-sm' id='esold_date' style='background-color: #fff;'>
                                </div>
                            </div>
                        </div>
                        <div class="form-row" style="">
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>Status</span>
                                    </div>
                                    <select class="form-control" id="estatus">
                                        <option value="Active" selected>Active</option>
                                        <option value="Inactive">Inactive</option>
                                        <option value="Sold">Sold</option>
                                        <option value="Out of Service">Out of Service</option>
                                     </select>                                
                                </div>
                            </div>
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>Make/Model</span>
                                    </div>
                                    <input type="text" required class='form-control form-control-sm' id='emake' style='background-color: #fff;'>
                                </div>
                            </div>
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>Wheels</span>
                                    </div>
                                    <input class='form-control form-control-sm' type="text" pattern="[1-2][0-9]" id='ewheels' style='background-color: #fff;'>
                                </div>
                            </div>
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>Engine Num</span>
                                    </div>
                                    <input class='form-control form-control-sm' id='eengine_num' style='background-color: #fff;'>
                                </div>
                            </div>
                        </div>
                        <div class="form-row" style="">
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>Chassis Num</span>
                                    </div>
                                    <input class='form-control form-control-sm' id='ech_num' style='background-color: #fff;'>
                                </div>
                            </div>
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>GWT</span>
                                    </div>
                                    <input class='form-control form-control-sm' id='eGWT' style='background-color: #fff;'>
                                </div>
                            </div>
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>NWT</span>
                                    </div>
                                    <input class='form-control form-control-sm' id='eNWT' style='background-color: #fff;'>
                                </div>
                            </div>
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>5Yr-Permit</span>
                                    </div>
                                    <input class='form-control form-control-sm' id='efyrpermit' style='background-color: #fff;'>
                                </div>
                            </div>
                        </div>
                        <div class="form-row" style="">
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>5Yr-Pmt. Exp.</span>
                                    </div>
                                    <input class='form-control form-control-sm' id='efyrpermitexp' style='background-color: #fff;'>
                                </div>
                            </div>
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>NP Number</span>
                                    </div>
                                    <input class='form-control form-control-sm' id='enpnum' style='background-color: #fff;'>
                                </div>
                            </div>
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>NP Exp</span>
                                    </div>
                                    <input class='form-control form-control-sm' id='enpexp' style='background-color: #fff;'>
                                </div>
                            </div>
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>Fitness Exp.</span>
                                    </div>
                                    <input class='form-control form-control-sm' id='efitexp' style='background-color: #fff;'>
                                </div>
                            </div>
                        </div>
                        <div class="form-row" style="">
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>PUC Exp.</span>
                                    </div>
                                    <input class='form-control form-control-sm' id='epucexp' style='background-color: #fff;'>
                                </div>
                            </div>
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>Ins. Policy #</span>
                                    </div>
                                    <input class='form-control form-control-sm' id='einspolnum' style='background-color: #fff;'>
                                </div>
                            </div>
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>Ins. Co</span>
                                    </div>
                                    <input class='form-control form-control-sm' id='einspolpro' style='background-color: #fff;'>
                                </div>
                            </div>
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>Ins. Exp. Date</span>
                                    </div>
                                    <input class='form-control form-control-sm' id='einsexp' style='background-color: #fff;'>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group myformgroup">
                        <div class="form-row" style="">
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>Tank Number</span>
                                    </div>
                                    <input class='form-control form-control-sm' id='etanknum' style='background-color: #fff;'>
                                </div>
                            </div>
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>Tank Desc.</span>
                                    </div>
                                    <input class='form-control form-control-sm' id='etank_desc' style='background-color: #fff;'>
                                </div>
                            </div>
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>Tank Built Date</span>
                                    </div>
                                    <input class='form-control form-control-sm' id='etankconsdate' style='background-color: #fff;'>
                                </div>
                            </div>
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>Tank Type</span>
                                    </div>
                                    <input class='form-control form-control-sm' id='etanktype' style='background-color: #fff;'>
                                </div>
                            </div>
                        </div>
                        <div class="form-row" style="">

                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>Tank MOC</span>
                                    </div>
                                    <input class='form-control form-control-sm' id='etankmoc' style='background-color: #fff;'>
                                </div>
                            </div>
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>Water Cap.</span>
                                    </div>
                                    <input class='form-control form-control-sm' id='ewatercap' style='background-color: #fff;'>
                                </div>
                            </div>
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>Licence Cap.</span>
                                    </div>
                                    <input class='form-control form-control-sm' id='eliccap' style='background-color: #fff;'>
                                </div>
                            </div>
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>Rule 18 Exp.</span>
                                    </div>
                                    <input class='form-control form-control-sm' id='erule18exp' style='background-color: #fff;'>
                                </div>
                            </div>
                        </div>
                        <div class="form-row" style="">

                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>Rule 19 Exp.</span>
                                    </div>
                                    <input class='form-control form-control-sm' id='erule19exp' style='background-color: #fff;'>
                                </div>
                            </div>
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>Rule 44 Exp.</span>
                                    </div>
                                    <input class='form-control form-control-sm' id='erule44exp' style='background-color: #fff;'>
                                </div>
                            </div>
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>Calib. Exp.</span>
                                    </div>
                                    <input class='form-control form-control-sm' id='etankcalexp' style='background-color: #fff;'>
                                </div>
                            </div>
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>Air Test Date</span>
                                    </div>
                                    <input class='form-control form-control-sm' id='eairtestdt' style='background-color: #fff;'>
                                </div>
                            </div>
                        </div>
                        <div class="form-row" style="">
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>Rule 43 Desc.</span>
                                    </div>
                                    <input class='form-control form-control-sm' id='erule43desc' style='background-color: #fff;'>
                                </div>
                            </div>
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>Shell Thkness</span>
                                    </div>
                                    <input class='form-control form-control-sm' id='eshellthk' style='background-color: #fff;'>
                                </div>
                            </div>
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>Disk Thkness</span>
                                    </div>
                                    <input class='form-control form-control-sm' id='ediskthk' style='background-color: #fff;'>
                                </div>
                            </div>
                            <div class='col'>
                            </div>
                        </div>
                    </div>
                    <div class="form-group myformgroup2">

                        <div class="form-row" style="">
                            <div class='col'>
                                <label for="enotes" class="mylabel">Notes</label>
                                <textarea class='form-control form-control-sm' id='enotes' style='background-color: #fff;'>
                                    </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="form-row " style="margin-bottom:opx; ">
                            <div class="col ">
                            </div>
                            <div class="col text-center ">
                                <button style="width:70px;font-size:13px;margin-top:7px;" onclick=save_edit_trk(); type="submit" class="btn btn-sm btn-info ">Save</button>
                            </div>
                            <div class="col text-center ">
                                    <button onclick="hide_modal('mdl_edit_trk');" style="width:70px;font-size:13px;margin-top:7px;" class="btn btn-sm btn-danger">Cancel</button>
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