
function con_type_change(tp) {
    var divelem="#edrvrow";
    var elem="etype";
    if (tp=="add") {
        divelem="#adrvrow";
        elem="type";
    }
    var val = document.getElementById(elem).value;
    if (val=="DRIVER") {
   //   $(divelem).css("display", "block");
      $(divelem).show();
    } else {
 //       $(divelem).css("display", "none");
        $(divelem).hide();
    }
}

function show_con(id) {
    $('#mdl_view_con').modal({
        backdrop: 'static',
        keyboard: false
    });
        $.ajax({
            url: '/contacts/show/' + id,
            method: 'GET',
            datatype: 'text',
            // data: {
            //     "_token": "{!! csrf_token() !!}",
            //     id: id,
            //},
            success: function (response) {
            var contact=response;
           
            document.getElementById('thiscon').value= contact.id;
            document.getElementById("viewcontitle").innerHTML = "View Contact ID: " + contact.id;
            document.getElementById("vconname").innerHTML = contact.name;
            document.getElementById("vcdesc").innerHTML = contact.cdesc;
            document.getElementById("vtype").innerHTML = contact.type;
            document.getElementById("vadd11").innerHTML = (contact.add11 ? contact.add11 : "") + "<br>" +
                                    (contact.city1 ? contact.city1 : "") + " " +
                                    (contact.state1 ? contact.state1 : "") + " " +
                                    (contact.pin1 ? contact.pin1 : "") ; 
            document.getElementById("vadd22").innerHTML = (contact.add22 ? contact.add22 : "") + "<br>" +
                                    (contact.city2 ? contact.city2 : "") + " " +
                                    (contact.state2 ? contact.state2 : "") + " " +
                                    (contact.pin1 ? contact.pin1 : "") ; 
            document.getElementById("vphone1").innerHTML = contact.phone1 + "<br>" + (contact.phone2 ? contact.phone2 : "");
            document.getElementById("vemail").innerHTML = contact.email;
            document.getElementById("vdl_num").innerHTML = contact.dl_num;
            document.getElementById("vdl_state").innerHTML = contact.dl_state;
            document.getElementById("vdl_exp").innerHTML = toggledate(contact.dl_exp);
            document.getElementById("vnotes").innerHTML = contact.notes;
            if (contact.type!="DRIVER") {
                $("#dlrow").hide();
            } else {
               $("#dlrow").show();
            }
            $("#mdl_view_con").modal('show');
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
    initdate("","dl_exp");
    con_type_change("add");

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
            document.getElementById("ecdesc").value = contact.cdesc;
            document.getElementById("etype").value = contact.type;
            document.getElementById("eadd11").value = contact.add11;
            document.getElementById("ecity1").value = contact.city1;
            document.getElementById("estate1").value = contact.state1;
            document.getElementById("epin1").value = contact.pin1;
            document.getElementById("eadd22").value = contact.add22;
            document.getElementById("ecity2").value = contact.city2;
            document.getElementById("estate2").value = contact.state2;
            document.getElementById("epin2").value = contact.pin2;
            document.getElementById("ephone1").value = contact.phone1;
            document.getElementById("ephone2").value = contact.phone2;
            document.getElementById("eemail").value = contact.email;
            document.getElementById("edl_num").value = contact.dl_num;
            document.getElementById("edl_state").value = contact.dl_state;
            document.getElementById("edl_exp").value = toggledate(contact.dl_exp);
            initdate(contact.dl_exp,"edl_exp");
            document.getElementById("enotes").value = contact.notes
            document.getElementById("editcontitle").innerHTML = "Edit Contact: " + contact.id;

            //alert(contact.name);
            // $('#con_area').html=response;
            con_type_change("edit");
        }
    });
}

function save_con() {
    event.preventDefault();
    jid = $("#id").val();
    jname = $("#name").val();
    jcdesc = $("#cdesc").val();
    jadd11 = $("#add11").val();
    jcity1 = $("#city1").val();
    jstate1 = $("#state1").val();
    jpin1 = $("#pin1").val();
    jadd22 = $("#add22").val();
    jcity2 = $("#city2").val();
    jstate2 = $("#state2").val();
    jpin2 = $("#pin2").val();
    jphone1 = $("#phone1").val();
    jphone2 = $("#phone2").val();
    jtype = $("#type").val();
    jemail = $("#email").val();
    jdl_num = $("#dl_num").val();
    jdl_state = $("#dl_state").val();
    jdl_exp = $("#dl_exp").val();
    jdl_exp = toggledate($("#dl_exp").val());
    jnotes = $("#notes").val();
    jtoken = $('#token').val();
    if (jname == "") {
        myalert("Message", "Name must be entered", 'red');
        return false;
    }
    if (jphone1 == "") {
        myalert("Message", "Phone 1 must be entered", 'red');
        return false;
    }
    //alert(jdata.name);
    $.ajax({
        data: {
            "_token": jtoken,
            "name": jname,
            "cdesc": jcdesc,
            "add11": jadd11,
            "city1": jcity1,
            "state1": jstate1,
            "pin1": jpin1,
            "add22": jadd22,
            "city2": jcity2,
            "state2": jstate2,
            "pin2": jpin2,
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
    jcdesc = $("#ecdesc").val();
    jadd11 = $("#eadd11").val();
    jcity1 = $("#ecity1").val();
    jstate1 = $("#estate1").val();
    jpin1 = $("#epin1").val();
    jadd22 = $("#eadd22").val();
    jcity2 = $("#ecity2").val();
    jstate2 = $("#estate2").val();
    jpin2 = $("#epin2").val();
    jphone1 = $("#ephone1").val();
    jphone2 = $("#ephone2").val();
    jtype = $("#etype").val();
    jemail = $("#eemail").val();
    jdl_num = $("#edl_num").val();
    jdl_state = $("#edl_state").val();
    jdl_exp = toggledate($("#edl_exp").val());
    jnotes = $("#enotes").val();
    jtoken = $('#etoken').val();
    //alert(jdata.name);
    if (jname == "") {
        myalert("Message", "Name must be entered", "red");
        return false;
    }
    if (jphone1 == "") {
        myalert("Message", "Phone 1 must be entered", "red");
        return false;
    }

    $.ajax({
        data: {
            "_token": jtoken,
            "id": jid,
            "name": jname,
            "cdesc": jcdesc,
            "add11": jadd11,
            "city1": jcity1,
            "state1": jstate1,
            "pin1": jpin1,
            "add22": jadd22,
            "city2": jcity2,
            "state2": jstate2,
            "pin2": jpin2,
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
            sleep(3000).then(function ()   {
                $("#mdl_edit_con").modal('hide');
                location.reload();
            });                
            
        }
    });
}