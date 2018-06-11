
function show_con(id) {
    //alert(id);
    event.preventDefault();
    $('#mdl_view_con').modal({backdrop: 'static', keyboard: false});
    $("#mdl_view_con").modal('show');
    $.ajax({
        url: '/contacts/show',
        method: 'GET',
        dataType: 'text',
        data: {
            "_token": "{!! csrf_token() !!}",
            id: id,
        },
        success: function (response) {
            //alert(response);
            document.getElementById("con_area").innerHTML = response;
            // $('#con_area').html=response;
        }
    });
}

function delete_con(id) {
    event.preventDefault();
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
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            type: "POST",
                            url: "/contacts/destroy",

                            success: function (data) {
                                if (data.substr(0, 5) == "ERROR") {
                                    myalert("Error", data, 'red');
                                    return false;
                                }                                    
                                myalert("Message", data, 'green');
                                sleep(4000).then(function ()   {
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

function add_con(typ) {
    $('#mdl_add_con').modal({backdrop: 'static', keyboard: false});
    $("#mdl_add_con").modal('show');
    if (typ=="Contact") {
        typ="Staff";
    }
    document.getElementById("type").value = typ.toUpperCase();
}

function edit_con(id) {
    event.preventDefault();
    $('#mdl_edit_con').modal({backdrop: 'static', keyboard: false});
    $("#mdl_edit_con").modal('show');
    $.ajax({
        url: '/contacts/editcon/' + id,
        method: 'GET',
        dataType: 'text',
        //data: {
        //    "_token": "{!! csrf_token() !!}",
        //    id: id,
        //},
        success: function (response) {
            //alert(response);
            var contact = JSON.parse(response);
            document.getElementById("eid").value = contact.id;
            document.getElementById("ename").value = contact.name;
            document.getElementById("eadd11").value = contact.add11;
            document.getElementById("eadd12").value = contact.add12;
            document.getElementById("eadd21").value = contact.add21;
            document.getElementById("eadd22").value = contact.add22;
            document.getElementById("ephone1").value = contact.phone1;
            document.getElementById("ephone2").value = contact.phone2;
            document.getElementById("etype").value = contact.type;
            document.getElementById("eemail").value = contact.email;
            document.getElementById("edl_num").value = contact.dl_num;
            document.getElementById("edl_state").value = contact.dl_state;
            document.getElementById("edl_exp").value = contact.dl_exp;
            document.getElementById("enotes").value = contact.notes;
            //alert(contact.name);
            // $('#con_area').html=response;
        }
    });
}

function save_con() {
    event.preventDefault();
    //alert($("#name").val());
    jname = $("#name").val();
    jphone1 = $("#phone1").val();
    if (jname == "") {
        myalert("Message", "Name must be entered", 'red');
        return false;
    }
    if (jphone1 == "") {
        myalert("Message", "Phone 1 must be entered", 'red');
        return false;
    }
    jadd11 = $("#add11").val();
    jadd12 = $("#add12").val();
    jadd21 = $("#add21").val();
    jadd22 = $("#add22").val();
    jphone2 = $("#phone2").val();
    jtype = $("#type").val();
    jemail = $("#email").val();
    jdl_num = $("#dl_num").val();
    jdl_state = $("#dl_state").val();
    jdl_exp = $("#dl_exp").val();
    jnotes = $("#notes").val();
    jtoken = $('#token').val();
    //alert(jdata.name);
    $.ajax({
        data: {
            "_token": jtoken,
            "name": jname,
            "add11": jadd11,
            "add12": jadd12,
            "add21": jadd21,
            "add22": jadd22,
            "phone1": jphone1,
            "phone2": jphone2,
            "type": jtype,
            "email": jemail,
            "dl_num": jdl_num,
            "dl_state": jdl_state,
            "dl_exp": jdl_exp,
            "notes": jnotes
        },
        dataType: 'text',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "POST",
        url: "/contacts/store",
        success: function (data) {
            if (data.substr(0, 5) == "ERROR") {
                myalert("Error", data, 'red');
                return false;
            }            
            myalert("Message", data, "green");
          //  sleep(4000).then(function ()   {
                $("#mdl_edit_con").modal('hide');
          //  });                
            location.reload();

        }
    });
}

function save_edit_con() {
    event.preventDefault();
    //alert($("#name").val());
    jid = $("#eid").val();
    jname = $("#ename").val();
    jphone1 = $("#ephone1").val();
    if (jname == "") {
        myalert("Message", "Name must be entered", "red");
        return false;
    }
    if (jphone1 == "") {
        myalert("Message", "Phone 1 must be entered", "red");
        return false;
    }
    jadd11 = $("#eadd11").val();
    jadd12 = $("#eadd12").val();
    jadd21 = $("#eadd21").val();
    jadd22 = $("#eadd22").val();
    jphone2 = $("#ephone2").val();
    jtype = $("#etype").val();
    jemail = $("#eemail").val();
    jdl_num = $("#edl_num").val();
    jdl_state = $("#edl_state").val();
    jdl_exp = $("#edl_exp").val();
    jnotes = $("#enotes").val();
    jtoken = $('#etoken').val();
    //alert(jdata.name);
    $.ajax({
        data: {
            "_token": jtoken,
            "id": jid,
            "name": jname,
            "add11": jadd11,
            "add12": jadd12,
            "add21": jadd21,
            "add22": jadd22,
            "phone1": jphone1,
            "phone2": jphone2,
            "type": jtype,
            "email": jemail,
            "dl_num": jdl_num,
            "dl_state": jdl_state,
            "dl_exp": jdl_exp,
            "notes": jnotes
        },
        dataType: 'text',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "POST",
        url: "/contacts/edit",
        success: function (data) {
            if (data.substr(0, 5) == "ERROR") {
                //show_msg("msgdivedit", data, 'ERR');
                myalert("Alert", data, "red");
                return false;
            }
            //show_msg("msgdivedit", data, 'MSG');
            myalert("Message", data, "green");
            sleep(4000).then(function ()   {
                $("#mdl_edit_con").modal('hide');
            });                
            location.reload();
        }
    });
}