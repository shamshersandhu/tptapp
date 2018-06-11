
function show_trp(id) {
    //alert(id);
    $('#mdl_view_trp').modal({backdrop: 'static', keyboard: false});
    $("#mdl_view_trp").modal('show');
    $.ajax({
        url: '/trips/show',
        method: 'GET',
        dataType: 'text',
        data: {
            "_token": "{!! csrf_token() !!}",
            id: id,
        },
        success: function (response) {
            //alert(response);
            document.getElementById("trp_area").innerHTML = response;
        }
    });
}

function delete_trp(id) {
    $.confirm({
            title: "Message",
            content: "Are you sure you want to delete LR Number " + id + " ?",
            type: 'red',
            buttons: {
                confirm: {
                    text: "Yes",
                    btnClass: 'btn-red',
                    action: function () {
                        jtoken = $('#token').val();
                        $.ajax({
                            data: {
                                "_token": jtoken,
                                "id": id
                            },
                            dataType: 'text',
                            headers: {'X-CSRF-TOKEN': $('meta[truck="csrf-token"]').attr('content')},
                            type: "POST",
                            url: "/trips/destroy",
                            success: function (data) {
                                if (data.substr(0, 5) == "ERROR") {
                                    myalert("Error", data, 'red');
                                    return false;
                                }
                                myalert("Message", data, 'green');
                                sleep(2000).then(function ()   {
                                    location.reload(); 
                                });
                            }
                        });
                    }
                },
                cancel: {
                    text: "No",
                    btnClass: 'btn-green',
                    action: function () { }
                },
            },
        });
}

function add_trp() {
    $('#mdl_add_trp').modal({backdrop: 'static', keyboard: false});
    $("#mdl_add_trp").modal('show');
}

function edit_trp(id) {
    event.preventDefault();
    $.ajax({
        url: '/trips/edittrp/' + id,
        method: 'GET',
        datatype: 'text',
       // data: {
       //     "_token": "{!! csrf_token() !!}",
       //     id: id,
        //},
        success: function (response) {
            //alert(response.origin);
            var trip = response;
            document.getElementById("edittriptitle").innerHTML = "Edit LR Number " + trip.id;
            document.getElementById("eid").value = trip.id;
            document.getElementById("etruck").value = trip.truck;
            document.getElementById("eorigin").value = trip.origin;
            document.getElementById("edest").value = trip.dest;
            document.getElementById("edistance").value = trip.distance;
            document.getElementById("edriver1").value = trip.driver1;
            document.getElementById("edriver2").value = trip.driver2;
            document.getElementById("einvoice").value = trip.invoice;
            document.getElementById("eproduct").value = trip.product;
            document.getElementById("eqtyload").value = trip.qtyload;
            document.getElementById("eqtydel").value = trip.qtydel;
            document.getElementById("epickdate").value = trip.pickdate;
            document.getElementById("epicktime").value = trip.picktime;
            document.getElementById("edeldate").value = trip.deldate;
            document.getElementById("edeltime").value = trip.deltime;
            document.getElementById("enotes").value = trip.notes;
            $('#mdl_edit_trp').modal({backdrop: 'static', keyboard: false});
            $("#mdl_edit_trp").modal('show');
            // $('#con_area').html=response;
        }
    
    });
}

function save_trp() {
    //alert($("#truck").val());
    event.preventDefault();
    jtruck = $("#truck").val();
    jdriver1 = $("#driver1").val();
    jproduct = $("#product").val();
    jorigin = $("#origin").val();
    jinvoice = $("#invoice").val();
    jdest = $("#dest").val();
    jdistance = $("#distance").val();
    jdriver2 = $("#driver2").val();
    jqtyload = $("#qtyload").val();
    jqtydel = $("#qtydel").val();
    jpickdate = $("#pickdate").val();
    jpicktime = $("#picktime").val();
    jdeldate = $("#deldate").val()
    jdeltime = $("#deltime").val()
    jnotes = $("#notes").val();
    jtoken = $('#token').val();
    var chklist= {Truck:jtruck,Origin:jorigin,Driver1:jdriver1,invoice:jinvoice,Product:jproduct}
    if (! checkstr(chklist)) {
        return false;
    }
    //alert(jdata.truck);
    $.ajax({
        data: {
            "_token": jtoken,
            "truck": jtruck,
            "origin": jorigin,
            "dest": jdest,
            "distance": jdistance,
            "driver1": jdriver1,
            "driver2": jdriver2,
            "invoice": jinvoice,
            "product": jproduct,
            "qtyload": jqtyload,
            "qtydel": jqtydel,
            "pickdate": jpickdate,
            "picktime": jpicktime,
            "deldate":jdeldate,
            "deltime":jdeltime,
            "notes": jnotes
        },
        dataType: 'text',
        headers: {
            'X-CSRF-TOKEN': $('meta[truck="csrf-token"]').attr('content')
        },
        type: "POST",
        url: "/trips/store",
        success: function (data) {
            if (data.substr(0, 5) == "ERROR") {
                myalert("Error", data, 'red');
                //console.log(data);
                return false;
            }            
            console.log(data);
            myalert("Message", data, 'green');
            sleep(4000).then(function ()   {
                $("#mdl_edit_trp").modal('hide');
            });                
            location.reload();
        }
    });
}




function save_edit_trp() {
    event.preventDefault();
    //alert($("#eid").val());
    jid = $("#eid").val();
    jtruck = $("#etruck").val();
    jdriver1 = $("#edriver1").val();
    jorigin = $("#eorigin").val();
    jproduct = $("#eproduct").val();
    jinvoice = $("#einvoice").val();
    var chklist= {Truck:jtruck,Origin:jorigin,Driver1:jdriver1,invoice:jinvoice,Product:jproduct}
    if (! checkstr(chklist)) {
        return false;
    }
    jdest = $("#edest").val();
    jdistance = $("#edistance").val();
    jdriver2 = $("#edriver2").val();
    jqtyload = $("#eqtyload").val();
    jqtydel = $("#eqtydel").val();
    jpickdate = $("#epickdate").val();
    jpicktime = $("#epicktime").val();
    jdeldate = $("#edeldate").val()
    jdeltime = $("#edeltime").val()
    jnotes = $("#enotes").val();
    jtoken = $('#etoken').val();
    //alert(jdata.truck);
    $.ajax({
        data: {
            "_token": jtoken,
            "id": jid,
            "truck": jtruck,
            "origin": jorigin,
            "dest": jdest,
            "distance": jdistance,
            "driver1": jdriver1,
            "driver2": jdriver2,
            "invoice": jinvoice,
            "product": jproduct,
            "qtyload": jqtyload,
            "qtydel": jqtydel,
            "pickdate": jpickdate,
            "picktime": jpicktime,
            "deldate":jdeldate,
            "deltime":jdeltime,
            "notes": jnotes
        },
        dataType: 'text',
        headers: {
            'X-CSRF-TOKEN': $('meta[truck="csrf-token"]').attr('content')
        },
        type: "POST",
        url: "/trips/edit",
        success: function (data) {
            if (data.substr(0, 5) == "ERROR") {
                //show_msg("msgdivedit", data, 'ERR');
                myalert("Alert", data, "red");
                return false;
            }
            //show_msg("msgdivedit", data, 'MSG');
            myalert("Message", data, "green");
            sleep(4000).then(function ()   {
                $("#mdl_edit_trp").modal('hide');
            });                
            location.reload();

        }
    });
}