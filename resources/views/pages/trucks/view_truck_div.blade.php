<div class="modal" tabindex="-2" id="mdl_view_trk" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div style="background-color:#C4BBF5;padding:6px;" class="modal-header">
                <img src={{ URL::to( '/') }}/public/assets/images/trk.png alt="Truck" style="margin-right:16px;margin-bottom:2px;margin-top:-2px">
                <h5 id="viewtrktitle" class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
            </div>
            <div style="background-color:#D8D1F7;padding:6px;" id="trk_area_view" class="modal-body">
                <div id="msgdivview"></div>
                <form id="viewtrk">
                    <input type="hidden" id="vtoken" value="{!! csrf_token() !!}">
                    <input type="hidden" id="vcreator" value="{{Auth::user()->name}}">
                    <input readonly type="hidden" id="vid">
                    <div class="form-group myformgroup">
                        <div class="form-row" style="">
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>Reg. Num</span>
                                    </div>
                                    <input readonly class='form-control form-control-sm' id='vregnum' style='background-color: #fff;'>
                                </div>
                            </div>
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>Owner</span>
                                    </div>
                                    <input readonly class='form-control form-control-sm' id='vownname' style='background-color: #fff;'>
                                </div>
                            </div>
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>Purch Date</span>
                                    </div>
                                    <input readonly class='form-control form-control-sm' id='vpurch_date' style='background-color: #fff;'>
                                </div>
                            </div>
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>Sold Date</span>
                                    </div>
                                    <input readonly class='form-control form-control-sm' id='vsold_date' style='background-color: #fff;'>
                                </div>
                            </div>
                        </div>
                        <div class="form-row" style="">
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>Status</span>
                                    </div>
                                    <input readonly class='form-control form-control-sm' id='vstatus' style='background-color: #fff;'>
                                </div>
                            </div>
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>Make/Model</span>
                                    </div>
                                    <input readonly class='form-control form-control-sm' id='vmake' style='background-color: #fff;'>
                                </div>
                            </div>
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>Wheels</span>
                                    </div>
                                    <input readonly class='form-control form-control-sm' type="text" pattern="[1-2][0-9]" id='vwheels' style='background-color: #fff;'>
                                </div>
                            </div>
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>Engine Num</span>
                                    </div>
                                    <input readonly class='form-control form-control-sm' id='vengine_num' style='background-color: #fff;'>
                                </div>
                            </div>
                        </div>
                        <div class="form-row" style="">
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>Chassis Num</span>
                                    </div>
                                    <input readonly class='form-control form-control-sm' id='vch_num' style='background-color: #fff;'>
                                </div>
                            </div>
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>GWT</span>
                                    </div>
                                    <input readonly class='form-control form-control-sm' id='vGWT' style='background-color: #fff;'>
                                </div>
                            </div>
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>NWT</span>
                                    </div>
                                    <input readonly class='form-control form-control-sm' id='vNWT' style='background-color: #fff;'>
                                </div>
                            </div>
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>5Yr-Permit</span>
                                    </div>
                                    <input readonly class='form-control form-control-sm' id='vfyrpermit' style='background-color: #fff;'>
                                </div>
                            </div>
                        </div>
                        <div class="form-row" style="">
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>5Yr-Pmt. Exp.</span>
                                    </div>
                                    <input readonly class='form-control form-control-sm' id='vfyrpermitexp' style='background-color: #fff;'>
                                </div>
                            </div>
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>NP Number</span>
                                    </div>
                                    <input readonly class='form-control form-control-sm' id='vnpnum' style='background-color: #fff;'>
                                </div>
                            </div>
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>NP Exp</span>
                                    </div>
                                    <input readonly class='form-control form-control-sm' id='vnpexp' style='background-color: #fff;'>
                                </div>
                            </div>
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>Fitness Exp.</span>
                                    </div>
                                    <input readonly class='form-control form-control-sm' id='vfitexp' style='background-color: #fff;'>
                                </div>
                            </div>
                        </div>
                        <div class="form-row" style="">
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>PUC Exp.</span>
                                    </div>
                                    <input readonly class='form-control form-control-sm' id='vpucexp' style='background-color: #fff;'>
                                </div>
                            </div>
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>Ins. Policy #</span>
                                    </div>
                                    <input readonly class='form-control form-control-sm' id='vinspolnum' style='background-color: #fff;'>
                                </div>
                            </div>
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>Ins. Co</span>
                                    </div>
                                    <input readonly class='form-control form-control-sm' id='vinspolpro' style='background-color: #fff;'>
                                </div>
                            </div>
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>Ins. Exp. Date</span>
                                    </div>
                                    <input readonly class='form-control form-control-sm' id='vinsexp' style='background-color: #fff;'>
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
                                    <input readonly class='form-control form-control-sm' id='vtanknum' style='background-color: #fff;'>
                                </div>
                            </div>
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>Tank Desc.</span>
                                    </div>
                                    <input readonly class='form-control form-control-sm' id='vtank_desc' style='background-color: #fff;'>
                                </div>
                            </div>
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>Tank Built Date</span>
                                    </div>
                                    <input readonly class='form-control form-control-sm' id='vtankconsdate' style='background-color: #fff;'>
                                </div>
                            </div>
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>Tank Type</span>
                                    </div>
                                    <input readonly class='form-control form-control-sm' id='vtanktype' style='background-color: #fff;'>
                                </div>
                            </div>
                        </div>
                        <div class="form-row" style="">

                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>Tank MOC</span>
                                    </div>
                                    <input readonly class='form-control form-control-sm' id='vtankmoc' style='background-color: #fff;'>
                                </div>
                            </div>
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>Water Cap.</span>
                                    </div>
                                    <input readonly class='form-control form-control-sm' id='vwatercap' style='background-color: #fff;'>
                                </div>
                            </div>
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>Licence Cap.</span>
                                    </div>
                                    <input readonly class='form-control form-control-sm' id='vliccap' style='background-color: #fff;'>
                                </div>
                            </div>
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>Rule 18 Exp.</span>
                                    </div>
                                    <input readonly class='form-control form-control-sm' id='vrule18exp' style='background-color: #fff;'>
                                </div>
                            </div>
                        </div>
                        <div class="form-row" style="">

                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>Rule 19 Exp.</span>
                                    </div>
                                    <input readonly class='form-control form-control-sm' id='vrule19exp' style='background-color: #fff;'>
                                </div>
                            </div>
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>Rule 44 Exp.</span>
                                    </div>
                                    <input readonly class='form-control form-control-sm' id='vrule44exp' style='background-color: #fff;'>
                                </div>
                            </div>
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>Calib. Exp.</span>
                                    </div>
                                    <input readonly class='form-control form-control-sm' id='vtankcalexp' style='background-color: #fff;'>
                                </div>
                            </div>
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>Air Test Date</span>
                                    </div>
                                    <input readonly class='form-control form-control-sm' id='vairtestdt' style='background-color: #fff;'>
                                </div>
                            </div>
                        </div>
                        <div class="form-row" style="">
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>Rule 43 Desc.</span>
                                    </div>
                                    <input readonly class='form-control form-control-sm' id='vrule43desc' style='background-color: #fff;'>
                                </div>
                            </div>
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>Shell Thkness</span>
                                    </div>
                                    <input readonly class='form-control form-control-sm' id='vshellthk' style='background-color: #fff;'>
                                </div>
                            </div>
                            <div class='col'>
                                <div class='input-group input-group-sm mb-2'>
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text'>Disk Thkness</span>
                                    </div>
                                    <input readonly class='form-control form-control-sm' id='vdiskthk' style='background-color: #fff;'>
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
                                <textarea readonly class='form-control form-control-sm' id='vnotes' style='background-color: #fff;'>
                                        </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="form-row " style="margin-bottom:opx; ">
                            <div class="col ">
                            </div>
                            <div class="col text-center ">
                                <button style="width:110px;font-size:13px;margin-top:7px;" onclick=print_trk(); type="submit" class="btn btn-sm btn-info ">Print Truck Card</button>
                            </div>
                            <div class="col text-center ">
                                <button style="width:110px;font-size:13px;margin-top:7px; " type="submit " class="btn btn-sm btn-danger" data-dismiss="modal ">Cancel</button>
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