
function show_trk(id) {
    //alert(id);
    $("#mdl_view_trk").modal('show');
    $.ajax({
        url: 'trucks/show',
        method: 'GET',
        dataType: 'text',
        data: {
            "_token": "{!! csrf_token() !!}",
            id: id,
        },
        success: function (response) {
            //alert(response);
            document.getElementById("trk_area").innerHTML = response;
        }
    });
}

function delete_trk(id) {
    $("#mdl_view_trk").modal('hide');
    alert(id);
    $.confirm({
            title: "Message",
            content: "Are you sure ?",
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
                            headers: {'X-CSRF-TOKEN': $('meta[regnum="csrf-token"]').attr('content')},
                            type: "POST",
                            url: "trucks/destroy",
                            success: function (data) {
                                if (data.substr(0, 5) == "ERROR") {
                                    myalert("Error", data, 'red');
                                    return false;
                                }
                                myalert("Message", data, 'green');
                                sleep(3000).then(() => {  
                                    location.reload(); 
                                });
                            }
                        });
                    }
                },
                cancel: {
                    text: "No",
                    btnClass: 'btn-green',
                },
            },
        });
}

function add_trk() {
    $("#mdl_add_trk").modal('show');
}

function edit_trk(id) {
    $("#mdl_view_trk").modal('hide');
    alert("here");
    $("#mdl_edit_trk").modal('show');
    $.ajax({
        url: 'trucks/edittrk/' + id,
        method: 'GET',
        datatype: 'text',
       // data: {
       //     "_token": "{!! csrf_token() !!}",
       //     id: id,
        //},
        success: function (response) {
           // alert(response.regnum);
            var truck = response;
            document.getElementById("eid").value = truck.id;
            document.getElementById("eregnum").value = truck.regnum;
            document.getElementById("eowner").value = truck.owner;
            document.getElementById("epurch_date").value = truck.purch_date;
            document.getElementById("esold_date").value = truck.sold_date;
            document.getElementById("estatus").value = truck.status;
            document.getElementById("emake").value = truck.make;
            document.getElementById("ewheels").value = truck.wheels;
            document.getElementById("eGWT").value = truck.GWT;
            document.getElementById("eNWT").value = truck.NWT;
            document.getElementById("etank_desc").value = truck.tank_desc;
            document.getElementById("eengine_num").value = truck.engine_num;
            document.getElementById("ech_num").value = truck.ch_num;
            document.getElementById("einspolnum").value = truck.inspolnum;
            document.getElementById("einspolpro").value = truck.inspolpro;
            document.getElementById("enotes").value = truck.notes;
            //alert(truck.regnum);
            // $('#con_area').html=response;
        }
    
    });
}

function save_trk() {
    //alert($("#regnum").val());
    jregnum = $("#regnum").val();
    jmake = $("#make").val();
    if (jregnum == "") {
        myalert("Message", "Reg. Number must be entered", 'red');
        return false;
    }
    if (jmake == "") {
        myalert("Message", "Make and Model must be entered", 'red');
        return false;
    }
    jowner = $("#owner").val();
    jpurch_date = $("#purch_date").val();
    jsold_date = $("#sold_date").val();
    jstatus = $("#status").val();
    jwheels = $("#wheels").val();
    jGWT = $("#GWT").val();
    jNWT = $("#NWT").val();
    jtank_desc = $("#tank_desc").val();
    jengine_num = $("#engine_num").val();
    jch_num = $("#ch_num").val();
    jinspolnum = $("#inspolnum").val()
    jinspolpro = $("#inspolpro").val()
    jnotes = $("#notes").val();
    jtoken = $('#token').val();
    //alert(jdata.regnum);
    $.ajax({
        data: {
            "_token": jtoken,
            "regnum": jregnum,
            "owner": jowner,
            "purch_date": jpurch_date,
            "sold_date": jsold_date,
            "status": jstatus,
            "make": jmake,
            "wheels": jwheels,
            "GWT": jGWT,
            "NWT": jNWT,
            "tank_desc": jtank_desc,
            "engine_num": jengine_num,
            "ch_num": jch_num,
            "inspolnum":jinspolnum,
            "inspolpro":jinspolpro,
            "notes": jnotes
        },
        dataType: 'text',
        headers: {
            'X-CSRF-TOKEN': $('meta[regnum="csrf-token"]').attr('content')
        },
        type: "POST",
        url: "trucks/store",
        success: function (data) {
            if (data.substr(0, 5) == "ERROR") {
                myalert("Error", data, 'red');
                return false;
            }            
            myalert("Message", data, 'green');
            sleep(2000).then(() => {
                $("#mdl_edit_trk").modal('hide');
                location.reload();
            });
        }
    });
}

function save_edit_trk() {
    //alert($("#eid").val());
    jid = $("#eid").val();
    jregnum = $("#eregnum").val();
    jmake = $("#emake").val();
    if (jregnum == "") {
        myalert("Message", "regnum must be entered", "red");
        return false;
    }
    if (jmake == "") {
        myalert("Message", "Phone 1 must be entered", "red");
        return false;
    }
    jowner = $("#eowner").val();
    jpurch_date = $("#epurch_date").val();
    jsold_date = $("#esold_date").val();
    jstatus = $("#estatus").val();
    jwheels = $("#ewheels").val();
    jGWT = $("#eGWT").val();
    jNWT = $("#eNWT").val();
    jtank_desc = $("#etank_desc").val();
    jengine_num = $("#eengine_num").val();
    jch_num = $("#ech_num").val();
    jinspolnum = $("#einspolnum").val()
    jinspolpro = $("#einspolpro").val()
    jnotes = $("#enotes").val();
    jtoken = $('#etoken').val();
    //alert(jdata.regnum);
    $.ajax({
        data: {
            "_token": jtoken,
            "id": jid,
            "regnum": jregnum,
            "owner": jowner,
            "purch_date": jpurch_date,
            "sold_date": jsold_date,
            "status": jstatus,
            "make": jmake,
            "wheels": jwheels,
            "GWT": jGWT,
            "NWT": jNWT,
            "tank_desc": jtank_desc,
            "engine_num": jengine_num,
            "ch_num": jch_num,
            "inspolnum":jinspolnum,
            "inspolpro":jinspolpro,
            "notes": jnotes
        },
        dataType: 'text',
        headers: {
            'X-CSRF-TOKEN': $('meta[regnum="csrf-token"]').attr('content')
        },
        type: "POST",
        url: "trucks/edit",
        success: function (data) {
            if (data.substr(0, 5) == "ERROR") {
                //show_msg("msgdivedit", data, 'ERR');
                myalert("Alert", data, "red");
                return false;
            }
            //show_msg("msgdivedit", data, 'MSG');
            myalert("Message", data, "green");
            sleep(2000).then(() => {
                $("#mdl_edit_trk").modal('hide');
                location.reload();
            });
        }
    });
}