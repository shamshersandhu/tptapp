$(document).ready(function () {
    //$('#myTable').DataTable();
    $('#myTable').dataTable( {
        "order": [],
        "columnDefs": [ {
          "targets"  : 'no-sort',
          "orderable": false,
        }]
    });
    // $("#modal_hide").on('click', function () {
    //    $("#mdl_view_con").modal('hide');
    //  });
    //   alert(this.val());
    //   getExistingData(0, 10);

});

function isNotEmpty(caller) {
    if (caller.val() == '') {
        caller.css('border', '1px solid red');
        return false;
    } else
        caller.css('border', '');

    return true;
}

function myconfirm(title, msg) {
    $.confirm({
        title: title,
        content: msg,
        type: 'red',
        buttons: {
            confirm: {
                text: "Yes",
                btnClass: 'btn-red',
            },
            cancel: {
                text: "No",
                btnClass: 'btn-green',
            },
        }
    });
}

function myalert(title, msg, clr) {
    $.alert({
        title: title,
        content: msg,
        type: clr,
    });
}

function checkstr(chklist) {
    var msg="";
    var ret = true;
    for (item in chklist) {
        if ((chklist[item]).length === 0) {
            msg += "" + item + " must be entered.</br>"
            ret=false;
        }
    }
    if (!ret) {
        myalert("Message",msg,"red");
    }
    return ret;
}


//function sleep(time) {
//    return new Promise((resolve) {setTimeout(resolve, time)});
//}

"use strict";

function sleep(time) {
    return new Promise(function (resolve) {
        return setTimeout(resolve, time);
});
}

function modal_hide(mdl) {
    $('#' + mdl).modal('hide');
    $('body').removeClass('modal-open');
    0
}

function show_msg(el, msg, typ) {
    if (typ == 'ERR') {
        divhtml = '<div class="alert alert-danger"><a class="close" data-dismiss="alert">x</a><span>' + msg + '</span></div>';
    } else if (typ == 'MSG') {
        divhtml = '<div class="alert alert-success"><a class="close" data-dismiss="alert">x</a><span>' + msg + '</span></div>';
    } else {
        divhtml = '<div class="alert alert-info"><a class="close" data-dismiss="alert">x</a><span>' + msg + '</span></div>';
    }
    $('#' + el).html(divhtml);
}

