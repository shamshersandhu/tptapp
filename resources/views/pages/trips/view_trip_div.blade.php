<div class="modal" tabindex="-1" id="mdl_view_trp" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div style="background-color:{{$MODAL_BG1}};" class="modal-header">
                    <img src={{ URL::to('/') }}/public/assets/images/trkmov.png  alt="Truck" style="margin-right:16px;margin-bottom:-3px;margin-top:-7px">

                <h5 id="viewtrptitle" class="modal-title"></h5>
                <input readonly id='thistrp' type='hidden'>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div style="background-color:{{$MODAL_BG2}}" id="trp_area" class="modal-body">
                <input type="hidden" id="vtoken" value="{{ csrf_token() }}">
                <input type="hidden" id="vcreator" value='{{ Auth::user()->name }}'>
                <input type="hidden" id="vid">
                <div class="form-group myformgroup2">
                    <div class="form-row" style="">
                        <div class="col">
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Truck</span>
                                </div>
                                <input class="form-control form-control-sm" id="vtruck">
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Driver1</span>
                                </div>
                                <input readonly class="form-control form-control-sm" id="vdriver1">

                            </div>
                        </div>
                        <div class="col">
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Driver2</span>
                                </div>
                                <input readonly class="form-control form-control-sm" id="vdriver2">

                            </div>
                        </div>

                    </div>
                    <div class="form-row" style="">
                        <div class="col">
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Origin</span>
                                </div>
                                <input readonly class="form-control form-control-sm" id="vorigin">

                            </div>
                        </div>
                        <div class="col">
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Arrival-Date Org</span>
                                </div>
                                <input readonly class="form-control form-control-sm" id="vorgarrdt" style="background-color: #fff;" readonly>
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Load Date</span>
                                </div>
                                <input readonly class="form-control form-control-sm" id="vloaddate" style="background-color: #fff;" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-row" style="">
                        <div class="col">
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Destination</span>
                                </div>
                                <input readonly class="form-control form-control-sm" id="vdest">

                            </div>
                        </div>
                        <div class="col">
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Arrival-Date Dst</span>
                                </div>
                                <input readonly class="form-control form-control-sm" id="varrdate" style="background-color: #fff;" readonly>
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Delivery Date</span>
                                </div>
                                <input readonly class="form-control form-control-sm" id="vdeldate" style="background-color: #fff;" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-row" style="">
                        <div class="col">
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Distance</span>
                                </div>
                                <input readonly class="form-control form-control-sm" id="vdistance" style="background-color: #fff;">
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">PO Number</span>
                                </div>
                                <input readonly class="form-control form-control-sm" id="vponum" style="background-color: #fff;">
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Invoice Number</span>
                                </div>
                                <input readonly class="form-control form-control-sm" id="vinvoice" style="background-color: #fff;">
                            </div>
                        </div>
                    </div>
                    <div class="form-row" style="">
                        <div class="col">
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Product</span>
                                </div>
                                <input readonly class="form-control form-control-sm" id="vproduct" style="background-color: #fff;">
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Loaded Qty</span>
                                </div>
                                <input readonly class="form-control form-control-sm" id="vqtyload" style="background-color: #fff;">
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Delivered Qty</span>
                                </div>
                                <input readonly class="form-control form-control-sm" id="vqtydel" style="background-color: #fff;">
                            </div>
                        </div>
                    </div>
                    <div class="form-row" style="">
                        <div class="col">
                        </div>
                        <div class="col">
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">GST Party</span>
                                </div>
                                <input readonly id="vgstparty">

                            </div>
                        </div>
                        <div class="col">
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Shortage</span>
                                </div>
                                <input readonly class="form-control form-control-sm" id="vshortage" style="background-color: #fff;">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group myformgroup2">
                    <div class="form-row" style="margin-bottom:0px;">
                        <div class="col">
                            <label class="mylabel" for="notes">Notes</label>
                            <textarea readonly class="form-control form-control-sm" id="vnotes" maxlength="254" rows="3"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div style="background-color:{{$MODAL_BG1}}" class="modal-footer">
                <div class="row">
                    <div class="col">
                        <button onclick="modal_hide('mdl_view_trp');" type="button" class="btn btn-success btn-sm" data-dismiss="modal">Close</button>
                    </div>
                    <div class="col">
                        <button onclick="print_lr();" class="btn btn-primary btn-sm">Print L R</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>