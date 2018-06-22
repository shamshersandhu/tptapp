function chkqty(type) {
    var f1="#qtyload";
    var f2="#qtydel";
    var f3="#shortage"    
    if (type=="edit") {
        f1="#eqtyload";
        f2="#eqtydel";
        f3="#eshortage" 
    }
    load = $(f1).val();
    del = $(f2).val();
   // alert(load + " " + del);
    if (del=="") {
        $(f3).val("");
        return false;
    } 
    //alert(load + " " + del);

    if (parseInt(del) > parseInt(load)) {
        myalert("Message", "Delivered Quantity cannot be more than Loaded Quantity", "red");
        $(f3).val("");
        return false;
    }
    //alert(load + " " + del);
    $(f3).val($(f1).val()-$(f2).val());
    return;
}

function print_lr() {    
    event.preventDefault();
   // $('#mdl_view_trp').modal('hide');
    id=document.getElementById('thistrp').value;
    url="/trips/printtrp/" + id;
    var win = window.open(url, '_blank');
    win.focus();
    return false;
}

function show_trp(id) {
    $('#mdl_view_trp').modal({
        backdrop: 'static',
        keyboard: false
    });
    $.ajax({
        url: '/trips/show/' + id,
        method: 'GET',
        datatype: 'text',
        // data: {
        //     "_token": "{!! csrf_token() !!}",
        //     id: id,
        //},
        success: function (response) {
            var trip = response[0];
            //alert("Trip is " + trip.ownname);
            document.getElementById('thistrp').value = trip.id;
            document.getElementById("viewtrptitle").innerHTML = "View Trip Number: " + trip.id;
            document.getElementById("vid").value = trip.id;
            document.getElementById("vtruck").value = trip.regnum;
            document.getElementById("vorigin").value = trip.origin_name;
            document.getElementById("vdest").value = trip.dest_name;
            document.getElementById("vdistance").value = trip.distance;
            document.getElementById("vdriver1").value = trip.driver1_name;
            document.getElementById("vdriver2").value = trip.driver2_name;
            document.getElementById("vinvoice").value = trip.invoice;
            document.getElementById("vponum").value = trip.ponum;
            document.getElementById("vproduct").value = trip.product;            
            document.getElementById("vqtyload").value = trip.qtyload.toString() + " " + trip.unit;
            document.getElementById("vqtydel").value = (trip.qtydel ? trip.qtydel.toString() + " " + (trip.qtydel ? trip.unit : "") : "");
            document.getElementById("vorgarrdt").value = toggledatetime(trip.orgarrdt);
            document.getElementById("vloaddate").value = toggledatetime(trip.loaddate);
            document.getElementById("varrdate").value = toggledatetime(trip.arrdate);
            document.getElementById("vdeldate").value = toggledatetime(trip.deldate);
            document.getElementById("vgstparty").value = trip.gstparty;
            document.getElementById("vnotes").value = trip.notes;
            document.getElementById("vcreator").value = trip.creator;
            shortg=(parseInt(trip.qtydel)>0 ? parseInt(trip.qtyload)-parseInt(trip.qtydel)  : "");
            $("#vshortage").val(shortg);
            $("#mdl_view_trp").modal('show');
        }
    });

}

function delete_trp(id) {
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
                            'X-CSRF-TOKEN': $('meta[id="csrf-token"]').attr('content')
                        },
                        type: "POST",
                        url: "/trips/destroy",
                        success: function (data) {
                            if (data.substr(0, 5) == "ERROR") {
                                myalert("Error", data, 'red');
                                return false;
                            }
                            myalert("Message", data, 'green');
                            //   sleep(2000).then(()=>{  
                            //       location.reload(); 
                            //   });
                            "use strict";

                            sleep(3000).then(function () {
                                location.reload();
                            });
                        }
                    });
                }
            },
            cancel: {
                text: "No",
                btnClass: 'btn-green',
                action: function () {}
            },
        },
    });
}

function add_trp() {
    $('#mdl_add_trp').modal({
        backdrop: 'static',
        keyboard: false
    });
    initdatetime("", "loaddate");
    initdatetime("", "deldate");
    initdatetime("", "arrdate");
    initdatetime("", "orgarrdt");

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
            //alert(response);
            //SELECT concat('document.getElementById("e',COLUMN_NAME,'").value = trip.',COLUMN_NAME,';') FROM `COLUMNS` WHERE table_schema='tptdb' and table_name='trips'

            var trip = response;
            document.getElementById("edittrptitle").innerHTML = "Edit Trip Number: " + trip.id;
            document.getElementById("eid").value = trip.id;
            document.getElementById("eid").value = trip.id;
            document.getElementById("etruck").value = trip.truck;
            document.getElementById("eorigin").value = trip.origin;
            document.getElementById("edest").value = trip.dest;
            document.getElementById("edistance").value = trip.distance;
            document.getElementById("edriver1").value = trip.driver1;
            document.getElementById("edriver2").value = trip.driver2;
            document.getElementById("einvoice").value = trip.invoice;
            document.getElementById("eponum").value = trip.ponum;
            document.getElementById("eproduct").value = trip.product;
            document.getElementById("eqtyload").value = trip.qtyload;
            document.getElementById("eqtydel").value = trip.qtydel;
            document.getElementById("eunit").value = trip.unit;
            document.getElementById("eorgarrdt").value = trip.orgarrdt;
            document.getElementById("eloaddate").value = trip.loaddate;
            document.getElementById("earrdate").value = trip.arrdate;
            document.getElementById("edeldate").value = trip.deldate;
            document.getElementById("egstparty").value = trip.gstparty;
            document.getElementById("enotes").value = trip.notes;
            document.getElementById("ecreator").value = trip.creator;
            document.getElementById("ecreator").value = trip.creator;
            initdatetime(trip.loaddate, "eloaddate");
            initdatetime(trip.deldate, "edeldate");
            initdatetime(trip.arrdate, "earrdate");
            initdatetime(trip.orgarrdt, "eorgarrdt");
            $('#mdl_edit_trp').modal({
                backdrop: 'static',
                keyboard: false
            });
            shortg=(parseInt(trip.qtydel)>0 ? parseInt(trip.qtyload)-parseInt(trip.qtydel)  : "");
            $("#eshortage").val(shortg);
            $("#mdl_edit_trp").modal('show');
            // $('#con_area').html=response;
        }

    });
}

function getdistance(type)  {
    var f1="#origin";
    var f2="#dest";    
    var f3="#distance";    

   // alert(f1+" "+f2);

    if (type==="edit") {
 //alert("edit" + f1+" "+f2);

        f1="#eorigin";
        f2="#edest";
        f3="#edistance";    

    }
    org = $(f1).val();
    dest = $(f2).val();

    if (org=="" || dest=="") {
        return;
    }
    if (org==dest) {
        myalert("Error","Origin and Destination cannot be same." + org + " " + dest, 'red');
        return;
    }

    jtoken = $('#token').val();
    $.ajax({
      //  data: {
            //SELECT concat('"',column_name,'"',' : j',column_name,',') FROM `COLUMNS` WHERE table_schema='tptdb' and table_name='trips'
      //      "_token": jtoken,
       //     "org" : org,
       //     "dest" : dest,
       // },
        dataType: 'text',
        headers: {
            'X-CSRF-TOKEN': jtoken
        },
        type: "GET",
        url: "/trips/getdistance/" + org + "/" + dest,
        success: function (data) {
            if (data.substr(0, 5) == "ERROR") {
                myalert("Error", data, 'red');
                return false;
            }
            myalert("Message", 'Distacne='+data+'KMs', 'green');
            $(f3).val(data);

        }
    });

  }

function save_trp() {
    event.preventDefault();
    //alert($("#regnum").val());
    //SELECT concat('j',column_name,' = $("#',column_name,'").val();') FROM `COLUMNS` WHERE table_schema='tptdb' and table_name='trips'
    jtoken = $('#etoken').val();
    jid = $('#eid').val();
    jtruck = $("#truck").val();
    jorigin = $("#origin").val();
    jdest = $("#dest").val();
    jdistance = $("#distance").val();
    jdriver1 = $("#driver1").val();
    jdriver2 = $("#driver2").val();
    jinvoice = $("#invoice").val();
    jponum = $("#ponum").val();
    jproduct = $("#product").val();
    jqtyload = $("#qtyload").val();
    jqtydel = $("#qtydel").val();
    junit = $("#unit").val();
    jgstparty = $("#gstparty").val();
    jnotes = $("#notes").val();
    jcreator = $("#creator").val();
    jloaddate = toggledatetime($("#loaddate").val());
    jorgarrdt = toggledatetime($("#orgarrdt").val());
    jarrdate = toggledatetime($("#arrdate").val());
    jdeldate = toggledatetime($("#deldate").val());
    //alert(jloaddate);
    //getDistance(jorigin,jdest);
    if (jtruck == "") {
        myalert("Message", "Truck must be entered", "red");
        return false;
    }
    if (jdriver1 == "") {
        myalert("Message", "Driver 1 must be entered", "red");
        return false;
    }
    if (jorigin == "") {
        myalert("Message", "Origin must be entered", "red");
        return false;
    } 

    if (jorgarrdt.length<10) {
        myalert("Message", "Arrival Date must be entered", "red");
        return false;
    }  
    if (jloaddate.length<10) {
        myalert("Message", "Load Date must be entered", "red");
        return false;
    }    
    if (jdest == "") {
        myalert("Message", "Destination must be entered", "red");
        return false;
    } 
    if (jproduct=="") {
        myalert("Message", "Product must be entered", "red");
        return false;
    }
    if (jqtyload=="") {
        myalert("Message", "Loaded Quantity must be entered", "red");
        return false;
    }
     if (parseInt(jqtydel) > parseInt(jqtyload)) {
        myalert("Message", "Delivered Quantity cannot be more than Loaded Quantity", "red");
        return false;
    }


    $.ajax({
        data: {
            //SELECT concat('"',column_name,'"',' : j',column_name,',') FROM `COLUMNS` WHERE table_schema='tptdb' and table_name='trips'
            "_token": jtoken,
            "truck" : jtruck,
            "origin" : jorigin,
            "dest" : jdest,
            "distance" : jdistance,
            "driver1" : jdriver1,
            "driver2" : jdriver2,
            "invoice" : jinvoice,
            "ponum" : jponum,
            "product" : jproduct,
            "qtyload" : jqtyload,
            "qtydel" : jqtydel,
            "unit" : junit,
            "orgarrdt" : jorgarrdt,
            "loaddate" : jloaddate,
            "arrdate" : jarrdate,
            "deldate" : jdeldate,
            "gstparty" : jgstparty,
            "notes" : jnotes,
            "creator" : jcreator
        },
        dataType: 'text',
        headers: {
            'X-CSRF-TOKEN': $('meta[id="csrf-token"]').attr('content')
        },
        type: "POST",
        url: "/trips/store",
        success: function (data) {
            if (data.substr(0, 5) == "ERROR") {
                myalert("Error", data, 'red');
                return false;
            }
            myalert("Message", data, 'green');
            sleep(4000).then(function () {
                $("#mdl_edit_trp").modal('hide');
                location.reload();
            });
        }
    });
}

function save_edit_trp() {
    //SELECT concat('j',column_name,' = $("#e',column_name,'").val();') FROM `COLUMNS` WHERE table_schema='tptdb' and table_name='trips'
    event.preventDefault();
    jtoken = $('#etoken').val();
    jid = $("#eid").val();
    jtruck = $("#etruck").val();
    jorigin = $("#eorigin").val();
    jdest = $("#edest").val();
    jdistance = $("#edistance").val();
    jdriver1 = $("#edriver1").val();
    jdriver2 = $("#edriver2").val();
    jinvoice = $("#einvoice").val();
    jponum = $("#eponum").val();
    jproduct = $("#eproduct").val();
    jqtyload = $("#eqtyload").val();
    jqtydel = $("#eqtydel").val();
    junit = $("#eunit").val();
    jorgarrdt = toggledatetime($("#eorgarrdt").val());
    jloaddate = toggledatetime($("#eloaddate").val());
    jarrdate = toggledatetime($("#earrdate").val());
    jdeldate = toggledatetime($("#edeldate").val());
    jgstparty = $("#egstparty").val();
    jnotes = $("#enotes").val();
    jcreator = $("#ecreator").val();
    //alert('jloaddate=' + jloaddate.length);
    //alert(jtoken + "<br>" + $('meta[id="csrf-token"]').attr('content'));
    if (jtruck == "") {
        myalert("Message", "Truck must be entered", "red");
        return false;
    }
    if (jdriver1 == "") {
        myalert("Message", "Driver 1 must be entered", "red");
        return false;
    }
    if (jorigin == "") {
        myalert("Message", "Origin must be entered", "red");
        return false;
    } 

    if (jorgarrdt.length<10) {
        myalert("Message", "Arrival Date must be entered", "red");
        return false;
    }  
    if (jloaddate.length<10) {
        myalert("Message", "Load Date must be entered", "red");
        return false;
    }    
    if (jdest == "") {
        myalert("Message", "Destination must be entered", "red");
        return false;
    } 
    if (jproduct=="") {
        myalert("Message", "Product must be entered", "red");
        return false;
    }
    if (jqtyload=="") {
        myalert("Message", "Loaded Quantity must be entered", "red");
        return false;
    }
     if (parseInt(jqtydel) > parseInt(jqtyload)) {
        myalert("Message", "Delivered Quantity cannot be more than Loaded Quantity", "red");
        return false;
    }


       //SELECT concat('"',column_name,'": j',column_name,',') FROM `COLUMNS` WHERE table_schema='tptdb' and table_name='trips'
    $.ajax({
        data: {
            "_token": jtoken,
            "id": jid,
            "truck" : jtruck,
            "origin" : jorigin,
            "dest" : jdest,
            "distance" : jdistance,
            "driver1" : jdriver1,
            "driver2" : jdriver2,
            "invoice" : jinvoice,
            "ponum" : jponum,
            "product" : jproduct,
            "qtyload" : jqtyload,
            "qtydel" : jqtydel,
            "unit" : junit,
            "orgarrdt" : jorgarrdt,
            "loaddate" : jloaddate,
            "arrdate" : jarrdate,
            "deldate" : jdeldate,
            "gstparty" : jgstparty,
            "notes" : jnotes,
            "creator" : jcreator
        },
        dataType: 'text',
        headers: {
            'X-CSRF-TOKEN': jtoken       },
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
            sleep(3000).then(function () {
                $("#mdl_edit_trp").modal('hide');
                location.reload();
            });

        }
    });
}

function makepdf() {
    id = document.getElementById('thistrp').value;
    $.ajax({
        url: '/trips/show/' + id,
        method: 'GET',
        datatype: 'text',
        success: function (response) {
            var pdf = new jsPDF('l', 'pt', 'letter'),
                source = $('#trp_area')[0],
                specialElementHandlers = {
                    '#bypassme': function (element, renderer) {
                        return true
                    }
                }
            margins = {
                top: 80,
                bottom: 60,
                left: 40,
                width: 600
            };
            pdf.setFontSize(8);
            pdf.setFont("courier");
            // pdf.setFontType("bold");
            // pdf.text(250,50, "Trip Card", 'center');
            pdf.fromHTML(
                source // HTML string or DOM elem ref.
                , margins.left // x coord
                , margins.top // y coord
                , {
                    'width': margins.width // max width of content on PDF
                        ,
                    'elementHandlers': specialElementHandlers
                },
                function (dispose) {

                    pdf.save('Test.pdf');
                },
                margins
            )
        }
    });

}