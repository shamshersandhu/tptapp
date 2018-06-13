$(document).ready(function () {
    //$('#myTable').DataTable();
    $('#myTable').dataTable({
        "order": [],
        "columnDefs": [{
            "targets": 'no-sort',
            "orderable": false,
        }]
    });
   // $.datepicker.setDefaults({
        //showOn: "both",
       // buttonImage: "/public/assets/images/calendar.gif",
       // buttonImageOnly: true,
       // buttonText: "Pick Date",
     //   changeMonth: true,
    //    changeYear: true,
    //    dateFormat: "dd-mm-yy"
    //  });

    //position: relative;
    //margin-left: 120px;
    //margin-top: -46px;
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
    var msg = "";
    var ret = true;
    for (item in chklist) {
        if ((chklist[item]).length === 0) {
            msg += "" + item + " must be entered.</br>"
            ret = false;
        }
    }
    if (!ret) {
        myalert("Message", msg, "red");
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

function tableToJson(table) {
    var data = [];
    // first row needs to be headers
    var headers = [];
    for (var i=0; i<table.rows[0].cells.length; i++) {
        headers[i] = table.rows[0].cells[i].innerHTML.toLowerCase().replace(/ /gi,'');
    }
    // go through cells
    for (var i=0; i<table.rows.length; i++) {
        var tableRow = table.rows[i];
        var rowData = {};
        for (var j=0; j<tableRow.cells.length; j++) {
            rowData[ headers[j] ] = tableRow.cells[j].innerHTML;
        }
        data.push(rowData);
    }       
    return data;
}

function initdate(value,name)
{
    //alert(name+ ' ' + value);
    var ddate=toggledate(value);
    document.getElementById(name).value = ddate;
    $('#' + name).datetimepicker({
       format: 'd-m-Y'
       ,autoclose:true,
       timepicker:false,
     }).on("show", function() {
        $("#" + name).val(ddate).datetimepicker('update');
      });
     //document.getElementById(name).value = retdate;
    return;
}

function cleardate(elem) {

}

function initdatetime(value,name)
{
    //alert(name)
    var ddate=toggledatetime(value);
    document.getElementById(name).value = ddate;
    $('#' + name).datetimepicker({  
        format:'d-m-Y H:i',
    }).on("show", function() {
        $("#" + name).val(ddate).datetimepicker('update');
      }).keyup(function(e) {
        if(e.keyCode == 8 || e.keyCode == 46) {
            $("#" + name).val("");
        }
    });
}

function toggledate(val) {
   // alert(val);
    if (!val) {
        return "";
    }
    ddate = val.split('-');
    var mdate = ddate.reverse().join('-');
    //alert("in->" + val + "   out->" + mdate);
    return mdate;
}

function toggledatetime(val) {
   // alert(val);
    if (!val) {
        return "";
    }
    var dp=val.substr(0,10);
    var tp=val.substr(11,5);
   // alert("Date: " + dp + "    Time: " + tp);
    ddate = dp.split('-');
    var mdate = ddate.reverse().join('-') + " " + tp;
   // alert("in->" + val + "   out->" + mdate);
    return mdate;
}

function printdiv(elem,title)
{
    var mywindow = window.open('', 'PRINT');
    mywindow.document.write("<!DOCTYPE html><head><title>" + title + "</title></head>");
    mywindow.document.write('<style type="text/css">');
    mywindow.document.write('table th, table td, table tr {padding:2px;line-height: 30px;');
    mywindow.document.write('font-family:monospace;font-size:12px;border:1px solid #ddd;}');
    mywindow.document.write('</style>');
    mywindow.document.write('<link href="{{ asset("/public/css/print.css") }}" rel="stylesheet">');
    mywindow.document.write('</head><body >');
    mywindow.document.write('<p><img style="display: block;margin-left: auto;max-width:20%; max-height:20%"');
    mywindow.document.write('alt="Logo" src="public/assets/images/cw_logo_lg.jpg" ;>');
    mywindow.document.write('</p>');
    mywindow.document.write(document.getElementById(elem).innerHTML);
    mywindow.document.write('</body></html>');

    mywindow.document.close(); // necessary for IE >= 10
    mywindow.focus(); // necessary for IE >= 10*/

    mywindow.print();
    mywindow.close();

    return true;
}
