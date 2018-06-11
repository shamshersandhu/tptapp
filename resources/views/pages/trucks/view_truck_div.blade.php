<div class="modal" tabindex="-1" id="mdl_view_trk" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div style="background-color:{{$MODAL_BG1}};" class="modal-header">
                <h5 class="modal-title">Truck Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div style="background-color:{{$MODAL_BG2}}" id="trk_area" class="modal-body">
            </div>
            <div style="background-color:{{$MODAL_BG1}}" class="modal-footer">
                <button onclick="modal_hide('mdl_view_trk');" type="button" class="btn btn-info btn-sm mr-auto" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>