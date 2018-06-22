<div class="modal" tabindex="-2" id="mdl_add_trk" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
                <div class="modal-header modal-hd">
                        <img src={{ URL::to( '/') }}/public/assets/images/trk.png alt="Truck" style="margin-right:16px;margin-bottom:2px;margin-top:-2px">
                <h5 id="addtrktitle" class="modal-title">Add New Truck</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div id="trk_area_add" class="modal-body modal-bd">
                <div id="msgdivadd"></div>
                <form id="addtrk">
                    <input type="hidden" id="token" value="{!! csrf_token() !!}">
                    <input type="hidden" id="creator" value="{{Auth::user()->name}}">
                    <input type="hidden" id="id">
                    <div class="form-group myformgroup">
                        <div class="form-row" style="">
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>Reg. Num</span>
                                    </div>
                                    <input  type="text" required class='form-control form-control-sm' id='regnum' style='background-color: #fff;'>
                                </div>
                            </div>
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>Owner</span>
                                    </div>
                                    <select type="text" required class="form-control" id="owner">
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
                                    <input class='form-control form-control-sm' id='purch_date' style='background-color: #fff;'>
                                </div>
                            </div>
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>Sold Date</span>
                                    </div>
                                    <input class='form-control form-control-sm' id='sold_date' style='background-color: #fff;'>
                                </div>
                            </div>
                        </div>
                        <div class="form-row" style="">
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>Status</span>
                                    </div>
                                    <select class="form-control" id="status">
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
                                    <input type="text" required class='form-control form-control-sm' id='make' style='background-color: #fff;'>
                                </div>
                            </div>
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>Wheels</span>
                                    </div>
                                    <input class='form-control form-control-sm' type="text" pattern="[1-2][0-9]" id='wheels' style='background-color: #fff;'>
                                </div>
                            </div>
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>Engine Num</span>
                                    </div>
                                    <input class='form-control form-control-sm' id='engine_num' style='background-color: #fff;'>
                                </div>
                            </div>
                        </div>
                        <div class="form-row" style="">
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>Chassis Num</span>
                                    </div>
                                    <input class='form-control form-control-sm' id='ch_num' style='background-color: #fff;'>
                                </div>
                            </div>
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>GWT</span>
                                    </div>
                                    <input class='form-control form-control-sm' id='GWT' style='background-color: #fff;'>
                                </div>
                            </div>
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>NWT</span>
                                    </div>
                                    <input class='form-control form-control-sm' id='NWT' style='background-color: #fff;'>
                                </div>
                            </div>
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>5Yr-Permit</span>
                                    </div>
                                    <input class='form-control form-control-sm' id='fyrpermit' style='background-color: #fff;'>
                                </div>
                            </div>
                        </div>
                        <div class="form-row" style="">
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>5Yr-Pmt. Exp.</span>
                                    </div>
                                    <input class='form-control form-control-sm' id='fyrpermitexp' style='background-color: #fff;'>
                                </div>
                            </div>
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>NP Number</span>
                                    </div>
                                    <input class='form-control form-control-sm' id='npnum' style='background-color: #fff;'>
                                </div>
                            </div>
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>NP Exp</span>
                                    </div>
                                    <input class='form-control form-control-sm' id='npexp' style='background-color: #fff;'>
                                </div>
                            </div>
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>Fitness Exp.</span>
                                    </div>
                                    <input class='form-control form-control-sm' id='fitexp' style='background-color: #fff;'>
                                </div>
                            </div>
                        </div>
                        <div class="form-row" style="">
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>PUC Exp.</span>
                                    </div>
                                    <input class='form-control form-control-sm' id='pucexp' style='background-color: #fff;'>
                                </div>
                            </div>
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>Ins. Policy #</span>
                                    </div>
                                    <input class='form-control form-control-sm' id='inspolnum' style='background-color: #fff;'>
                                </div>
                            </div>
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>Ins. Co</span>
                                    </div>
                                    <input class='form-control form-control-sm' id='inspolpro' style='background-color: #fff;'>
                                </div>
                            </div>
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>Ins. Exp. Date</span>
                                    </div>
                                    <input class='form-control form-control-sm' id='insexp' style='background-color: #fff;'>
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
                                    <input class='form-control form-control-sm' id='tanknum' style='background-color: #fff;'>
                                </div>
                            </div>
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>Tank Desc.</span>
                                    </div>
                                    <input class='form-control form-control-sm' id='tank_desc' style='background-color: #fff;'>
                                </div>
                            </div>
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>Tank Built Date</span>
                                    </div>
                                    <input class='form-control form-control-sm' id='tankconsdate' style='background-color: #fff;'>
                                </div>
                            </div>
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>Tank Type</span>
                                    </div>
                                    <input class='form-control form-control-sm' id='tanktype' style='background-color: #fff;'>
                                </div>
                            </div>
                        </div>
                        <div class="form-row" style="">

                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>Tank MOC</span>
                                    </div>
                                    <input class='form-control form-control-sm' id='tankmoc' style='background-color: #fff;'>
                                </div>
                            </div>
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>Water Cap.</span>
                                    </div>
                                    <input class='form-control form-control-sm' id='watercap' style='background-color: #fff;'>
                                </div>
                            </div>
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>Licence Cap.</span>
                                    </div>
                                    <input class='form-control form-control-sm' id='liccap' style='background-color: #fff;'>
                                </div>
                            </div>
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>Rule 18 Exp.</span>
                                    </div>
                                    <input class='form-control form-control-sm' id='rule18exp' style='background-color: #fff;'>
                                </div>
                            </div>
                        </div>
                        <div class="form-row" style="">

                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>Rule 19 Exp.</span>
                                    </div>
                                    <input class='form-control form-control-sm' id='rule19exp' style='background-color: #fff;'>
                                </div>
                            </div>
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>Rule 44 Exp.</span>
                                    </div>
                                    <input class='form-control form-control-sm' id='rule44exp' style='background-color: #fff;'>
                                </div>
                            </div>
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>Calib. Exp.</span>
                                    </div>
                                    <input class='form-control form-control-sm' id='tankcalexp' style='background-color: #fff;'>
                                </div>
                            </div>
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>Air Test Date</span>
                                    </div>
                                    <input class='form-control form-control-sm' id='airtestdt' style='background-color: #fff;'>
                                </div>
                            </div>
                        </div>
                        <div class="form-row" style="">
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>Rule 43 Desc.</span>
                                    </div>
                                    <input class='form-control form-control-sm' id='rule43desc' style='background-color: #fff;'>
                                </div>
                            </div>
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>Shell Thkness</span>
                                    </div>
                                    <input class='form-control form-control-sm' id='shellthk' style='background-color: #fff;'>
                                </div>
                            </div>
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>Disk Thkness</span>
                                    </div>
                                    <input class='form-control form-control-sm' id='diskthk' style='background-color: #fff;'>
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
                                <textarea class='form-control form-control-sm' id='notes' style='background-color: #fff;'>
                                    </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="form-row " style="margin-bottom:opx; ">
                            <div class="col ">
                            </div>
                            <div class="col text-center ">
                                <button style="width:70px;font-size:13px;margin-top:7px;" onclick=save_trk(); type="submit" class="btn btn-sm btn-info ">Save</button>
                            </div>
                            <div class="col text-center ">
                                <button onclick="hide_modal('mdl_add_trk');" style="width:70px;font-size:13px;margin-top:7px;" class="btn btn-sm btn-danger">Cancel</button>
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