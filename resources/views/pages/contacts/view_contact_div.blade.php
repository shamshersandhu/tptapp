<div class="modal" tabindex="-1" id="mdl_view_con" role="dialog">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div style="background-color:#C4BBF5;" class="modal-header">
                        <img src={{ URL::to('/') }}/public/assets/images/con.png  alt="Contact" 
                        style="height: 41px;width: auto;margin-right: 16px;margin-bottom: -7px;margin-top: -6px;">
                        <h5 id="viewcontitle" class="modal-title"></h5>
                    <input id='thiscon' type='hidden'>
                    <input type="hidden" id="vtoken" value="{!! csrf_token() !!}">
                    <input type="hidden" id="vcreator" value="{{Auth::user()->name}}">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div style="background-color:#D8D1F7" id="con_area" class="modal-body">
                    <table id='conviewtab' width="100%" style="border-collapse: collapse;" class='table table-sm'>
                        <thead>
                            <tr>
                                <th style="text-align:center;font-size:15px;border:2px solid grey;" colspan=8>
                                    <span id="vconname"></span></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class='prlabel'>Desc.</td>
                                <td id='vcdesc' class=prtext></td>
                                <td class='prlabel'>Type</td>
                                <td id='vtype' class=prtext></td>
                                <td class='prlabel'>Email</td>
                                <td id='vemail' class=prtext></td>
                            </tr>
                            <tr>
                                <td class='prlabel'>Address<br>Main</td>
                                <td id='vadd11' class=prtext></td>
                                <td class='prlabel'>Address<br>Alt.</td>
                                <td id='vadd22' class=prtext></td>
                                <td class='prlabel'>Phones</td>
                                <td id='vphone1' class=prtext></td>
                            </tr>
                            <tr id="dlrow">
                                <td class='prlabel'>DL_#</td>
                                <td id='vdl_num' class=prtext></td>
                                <td class='prlabel'>DL_St.</td>
                                <td id='vdl_state' class=prtext></td>
                                <td class='prlabel'>DL_Exp</td>
                                <td id='vdl_exp' class=prtext></td>
                            </tr>
                            <tr>
                                <td class='prlabel'>Notes</td>
                                <td id='vnotes' colspan=7 class=prtext></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div style="background-color:#C4BBF5" class="modal-footer">
                    <div class="row">
                        <div class="col">
                            <button onclick="modal_hide('mdl_view_con');" type="button" class="btn btn-success btn-sm" data-dismiss="modal">Close</button>
                        </div>
                        <div class="col pull-left">
                            <button onclick="printdiv('con_area','Contact Card');" class="btn btn-primary btn-sm">Print Contact Card</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    