function print_trk() {
    id=document.getElementById('vid').value;
    url="/trucks/printtrk/" + id;
    var win = window.open(url, '_blank');
    win.focus();
}

function show_trk(id) {
    $('#mdl_view_trk').modal({
        backdrop: 'static',
        keyboard: false
    });
        $.ajax({
            url: '/trucks/show/' + id,
            method: 'GET',
            datatype: 'text',
            // data: {
            //     "_token": "{!! csrf_token() !!}",
            //     id: id,
            //},
            success: function (response) {
           //     alert(response[0].ownname);
            var truck=response[0];
           // alert(truck.id);
            //alert("Truck is " + truck.ownname);
           // document.getElementById('thistrk').value= truck.id;
           //document.getElementById('thistrk').value= truck.id;
           document.getElementById("viewtrktitle").innerHTML = "View Truck Number: " + truck.id;
           document.getElementById("vid").value = truck.id;
           document.getElementById("vregnum").value = truck.regnum;
           document.getElementById("vownname").value = response[0].ownname;
           document.getElementById("vpurch_date").value = toggledate(truck.purch_date);
           document.getElementById("vsold_date").value = toggledate(truck.sold_date);
           document.getElementById("vstatus").value = truck.status;
           document.getElementById("vmake").value = truck.make;
           document.getElementById("vwheels").value = truck.wheels;
           document.getElementById("vengine_num").value = truck.engine_num;
           document.getElementById("vch_num").value = truck.ch_num;
           document.getElementById("vGWT").value = truck.GWT;
           document.getElementById("vNWT").value = truck.NWT;
           document.getElementById("vfyrpermit").value = truck.fyrpermit;
           document.getElementById("vfyrpermitexp").value = toggledate(truck.fyrpermitexp);
           document.getElementById("vnpnum").value = truck.npnum;
           document.getElementById("vnpexp").value = toggledate(truck.npexp);
           document.getElementById("vfitexp").value = toggledate(truck.fitexp);
           document.getElementById("vpucexp").value = toggledate(truck.pucexp);
           document.getElementById("vtank_desc").value = truck.tank_desc;
           document.getElementById("vtanknum").value = truck.tanknum;
           document.getElementById("vtankconsdate").value = truck.tankconsdate;
           document.getElementById("vtanktype").value = truck.tanktype;
           document.getElementById("vtankmoc").value = truck.tankmoc;
           document.getElementById("vwatercap").value = truck.watercap;
           document.getElementById("vliccap").value = truck.liccap;
           document.getElementById("vrule18exp").value = toggledate(truck.rule18exp);
           document.getElementById("vrule19exp").value = toggledate(truck.rule19exp);
           document.getElementById("vrule44exp").value = toggledate(truck.rule44exp);
           document.getElementById("vtankcalexp").value = toggledate(truck.tankcalexp);
           document.getElementById("vairtestdt").value = toggledate(truck.airtestdt);
           document.getElementById("vrule43desc").value = truck.rule43desc;
           document.getElementById("vshellthk").value = truck.shellthk;
           document.getElementById("vdiskthk").value = truck.diskthk;
           document.getElementById("vinspolnum").value = truck.inspolnum;
           document.getElementById("vinspolpro").value = truck.inspolpro;
           document.getElementById("vinsexp").value = toggledate(truck.insexp);
           document.getElementById("vnotes").value = truck.notes;
            $("#mdl_view_trk").modal('show');
        }
    });

}

function delete_trk(id) {
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
                        url: "/trucks/destroy",
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

function add_trk() {
    $('#mdl_add_trk').modal({
        backdrop: 'static',
        keyboard: false
    });
    initdate("","purch_date");
    initdate("","sold_date");
    initdate("","fyrpermitexp");
    initdate("","npexp");
    initdate("","fitexp");
    initdate("","pucexp");
    initdate("","tankconsdate");
    initdate("","rule18exp");
    initdate("","rule19exp");
    initdate("","rule44exp");
    initdate("","tankcalexp");
    initdate("","airtestdt");
    initdate("","insexp");

    $("#mdl_add_trk").modal('show');
}

function edit_trk(id) {
    event.preventDefault();
    $.ajax({
        url: '/trucks/edittrk/' + id,
        method: 'GET',
        datatype: 'text',
        // data: {
        //     "_token": "{!! csrf_token() !!}",
        //     id: id,
        //},
        success: function (response) {
            //SELECT concat('document.getElementById("e',COLUMN_NAME,'").value = truck.',COLUMN_NAME,';') FROM `COLUMNS` WHERE table_schema='tptdb' and table_name='trucks'

            var truck = response;
            document.getElementById("edittrktitle").innerHTML = "Edit Truck Number: " + truck.id;
            document.getElementById("eid").value = truck.id;
            document.getElementById("eregnum").value = truck.regnum;
            document.getElementById("eowner").value = truck.owner;
            initdate(truck.purch_date,"epurch_date");
            //document.getElementById("epurch_date").value = dispdate(truck.purch_date);
            initdate(truck.sold_date,"esold_date");
            //document.getElementById("esold_date").value = truck.sold_date;
            document.getElementById("estatus").value = truck.status;
            document.getElementById("emake").value = truck.make;
            document.getElementById("ewheels").value = truck.wheels;
            document.getElementById("eengine_num").value = truck.engine_num;
            document.getElementById("ech_num").value = truck.ch_num;
            document.getElementById("eGWT").value = truck.GWT;
            document.getElementById("eNWT").value = truck.NWT;
            document.getElementById("efyrpermit").value = truck.fyrpermit;
            initdate(truck.fyrpermitexp,"efyrpermitexp");
            document.getElementById("enpnum").value = truck.npnum;
            initdate(truck.npexp,"enpexp");
            initdate(truck.fitexp,"efitexp");
            initdate(truck.pucexp,"epucexp");
            document.getElementById("etank_desc").value = truck.tank_desc;
            document.getElementById("etanknum").value = truck.tanknum;
            initdate(truck.tankconsdate,"etankconsdate");
            document.getElementById("etanktype").value = truck.tanktype;
            document.getElementById("etankmoc").value = truck.tankmoc;
            document.getElementById("ewatercap").value = truck.watercap;
            document.getElementById("eliccap").value = truck.liccap;
            initdate(truck.rule18exp,"erule18exp");
            initdate(truck.rule19exp,"erule19exp");
            initdate(truck.rule44exp,"erule44exp");
            initdate(truck.tankcalexp,"etankcalexp");
            initdate(truck.airtestdt,"eairtestdt");
            document.getElementById("erule43desc").value = truck.rule43desc;
            document.getElementById("eshellthk").value = truck.shellthk;
            document.getElementById("ediskthk").value = truck.diskthk;
            document.getElementById("einspolnum").value = truck.inspolnum;
            document.getElementById("einspolpro").value = truck.inspolpro;
            initdate(truck.insexp,"einsexp");
            document.getElementById("enotes").value = truck.notes;

            $('#mdl_edit_trk').modal({
                backdrop: 'static',
                keyboard: false
            });
            $("#mdl_edit_trk").modal('show');
            // $('#con_area').html=response;
        }

    });
}

function save_trk() {
    event.preventDefault();
    //alert($("#regnum").val());
    //SELECT concat('j',column_name,' = $("#',column_name,'").val();') FROM `COLUMNS` WHERE table_schema='tptdb' and table_name='trucks'
    jtoken = $('#token').val();
    jregnum = $("#regnum").val();
    jowner = $("#owner").val();
    jpurch_date = toggledate($("#purch_date").val());
    jsold_date = toggledate($("#sold_date").val());
    jstatus = $("#status").val();
    jmake = $("#make").val();
    jwheels = $("#wheels").val();
    jengine_num = $("#engine_num").val();
    jch_num = $("#ch_num").val();
    jGWT = $("#GWT").val();
    jNWT = $("#NWT").val();
    jfyrpermit = $("#fyrpermit").val();
    jfyrpermitexp = toggledate($("#fyrpermitexp").val());
    jnpnum = $("#npnum").val();
    jnpexp = toggledate($("#npexp").val());
    jfitexp = toggledate($("#fitexp").val());
    jpucexp = toggledate($("#pucexp").val());
    jtank_desc = $("#tank_desc").val();
    jtanknum = $("#tanknum").val();
    jtankconsdate = toggledate($("#tankconsdate").val());
    jtanktype = $("#tanktype").val();
    jtankmoc = $("#tankmoc").val();
    jwatercap = $("#watercap").val();
    jliccap = $("#liccap").val();
    jrule18exp = toggledate($("#rule18exp").val());
    jrule19exp = toggledate($("#rule19exp").val());
    jrule44exp = toggledate($("#rule44exp").val());
    jtankcalexp = toggledate($("#tankcalexp").val());
    jairtestdt = toggledate($("#airtestdt").val());
    jrule43desc = $("#rule43desc").val();
    jshellthk = $("#shellthk").val();
    jdiskthk = $("#diskthk").val();
    jinspolnum = $("#inspolnum").val();
    jinspolpro = $("#inspolpro").val();
    jinsexp = toggledate($("#insexp").val());
    jnotes = $("#notes").val();


    if (jregnum == "") {
        myalert("Message", "Reg. Number must be entered", 'red');
        return false;
    }
    if (jmake == "") {
        myalert("Message", "Make and Model must be entered", 'red');
        return false;
    }

    //alert(jdata.regnum);
    //SELECT concat('"',column_name,'": j',column_name,',') FROM `COLUMNS` WHERE table_schema='tptdb' and table_name='trucks'
    $.ajax({
        data: {
            //SELECT concat(column_name,' = j',column_name,',') FROM `COLUMNS` WHERE table_schema='tptdb' and table_name='trucks'
            "_token": jtoken,
            "regnum": jregnum,
            "owner": jowner,
            "purch_date": jpurch_date,
            "sold_date": jsold_date,
            "status": jstatus,
            "make": jmake,
            "wheels": jwheels,
            "engine_num": jengine_num,
            "ch_num": jch_num,
            "GWT": jGWT,
            "NWT": jNWT,
            "fyrpermit": jfyrpermit,
            "fyrpermitexp": jfyrpermitexp,
            "npnum": jnpnum,
            "npexp": jnpexp,
            "fitexp": jfitexp,
            "pucexp": jpucexp,
            "tank_desc": jtank_desc,
            "tanknum": jtanknum,
            "tankconsdate": jtankconsdate,
            "tanktype": jtanktype,
            "tankmoc": jtankmoc,
            "watercap": jwatercap,
            "liccap": jliccap,
            "rule18exp": jrule18exp,
            "rule19exp": jrule19exp,
            "rule44exp": jrule44exp,
            "tankcalexp": jtankcalexp,
            "airtestdt": jairtestdt,
            "rule43desc": jrule43desc,
            "shellthk": jshellthk,
            "diskthk": jdiskthk,
            "inspolnum": jinspolnum,
            "inspolpro": jinspolpro,
            "insexp": jinsexp,
            "notes": jnotes
        },
        dataType: 'text',
        headers: {
            'X-CSRF-TOKEN': $('meta[id="csrf-token"]').attr('content')
        },
        type: "POST",
        url: "/trucks/store",
        success: function (data) {
            if (data.substr(0, 5) == "ERROR") {
                myalert("Error", data, 'red');
                return false;
            }
            myalert("Message", data, 'green');
           sleep(4000).then(function () {
                $("#mdl_edit_trk").modal('hide');            
                location.reload();
            });
        }
    });
}

function save_edit_trk() {
    //SELECT concat('j',column_name,' = $("#e',column_name,'").val();') FROM `COLUMNS` WHERE table_schema='tptdb' and table_name='trucks'
    event.preventDefault();
    jtoken = $('#etoken').val();
    jid = $("#eid").val();
    jregnum = $("#eregnum").val();
    jowner = $("#eowner").val();
    jpurch_date = toggledate($("#epurch_date").val());
    jsold_date = toggledate($("#esold_date").val());
    jstatus = $("#estatus").val();
    jmake = $("#emake").val();
    jwheels = $("#ewheels").val();
    jengine_num = $("#eengine_num").val();
    jch_num = $("#ech_num").val();
    jGWT = $("#eGWT").val();
    jNWT = $("#eNWT").val();
    jfyrpermit = $("#efyrpermit").val();
    jfyrpermitexp = toggledate($("#efyrpermitexp").val());
    jnpnum = $("#enpnum").val();
    jnpexp = toggledate($("#enpexp").val());
    jfitexp = toggledate($("#efitexp").val());
    jpucexp = toggledate($("#epucexp").val());
    jtank_desc = $("#etank_desc").val();
    jtanknum = $("#etanknum").val();
    jtankconsdate = toggledate($("#etankconsdate").val());
    jtanktype = $("#etanktype").val();
    jtankmoc = $("#etankmoc").val();
    jwatercap = $("#ewatercap").val();
    jliccap = $("#eliccap").val();
    jrule18exp = toggledate($("#erule18exp").val());
    jrule19exp = toggledate($("#erule19exp").val());
    jrule44exp = toggledate($("#erule44exp").val());
    jtankcalexp = toggledate($("#etankcalexp").val());
    jairtestdt = toggledate($("#eairtestdt").val());
    jrule43desc = $("#erule43desc").val();
    jshellthk = $("#eshellthk").val();
    jdiskthk = $("#ediskthk").val();
    jinspolnum = $("#einspolnum").val();
    jinspolpro = $("#einspolpro").val();
    jinsexp = toggledate($("#einsexp").val());
    jnotes = $("#enotes").val();

    if (jregnum == "") {
        myalert("Message", "regnum must be entered", "red");
        return false;
    }
    if (jmake == "") {
        myalert("Message", "Phone 1 must be entered", "red");
        return false;
    }
    //alert(jdata.regnum);
    //SELECT concat('"',column_name,'": j',column_name,',') FROM `COLUMNS` WHERE table_schema='tptdb' and table_name='trucks'
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
            "engine_num": jengine_num,
            "ch_num": jch_num,
            "GWT": jGWT,
            "NWT": jNWT,
            "fyrpermit": jfyrpermit,
            "fyrpermitexp": jfyrpermitexp,
            "npnum": jnpnum,
            "npexp": jnpexp,
            "fitexp": jfitexp,
            "pucexp": jpucexp,
            "tank_desc": jtank_desc,
            "tanknum": jtanknum,
            "tankconsdate": jtankconsdate,
            "tanktype": jtanktype,
            "tankmoc": jtankmoc,
            "watercap": jwatercap,
            "liccap": jliccap,
            "rule18exp": jrule18exp,
            "rule19exp": jrule19exp,
            "rule44exp": jrule44exp,
            "tankcalexp": jtankcalexp,
            "airtestdt": jairtestdt,
            "rule43desc": jrule43desc,
            "shellthk": jshellthk,
            "diskthk": jdiskthk,
            "inspolnum": jinspolnum,
            "inspolpro": jinspolpro,
            "insexp": jinsexp,
            "notes": jnotes
        },
        dataType: 'text',
        headers: {
            'X-CSRF-TOKEN': $('meta[id="csrf-token"]').attr('content')
        },
        type: "POST",
        url: "/trucks/edit",
        success: function (data) {
            if (data.substr(0, 5) == "ERROR") {
                //show_msg("msgdivedit", data, 'ERR');
                myalert("Alert", data, "red");
                return false;
            }
            //show_msg("msgdivedit", data, 'MSG');
            myalert("Message", data, "green");
            sleep(3000).then(function () {
                $("#mdl_edit_trk").modal('hide');
                location.reload();
            });
 
        }
    });
}

function makepdf() {
    id = document.getElementById('thistrk').value;
    $.ajax({
        url: '/trucks/show/' + id,
        method: 'GET',
        datatype: 'text',
        success: function (response) {
            var pdf = new jsPDF('l', 'pt', 'letter')
            , source = $('#trk_area')[0]
            , specialElementHandlers = {
                '#bypassme': function(element, renderer){
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
             // pdf.text(250,50, "Truck Card", 'center');
              pdf.fromHTML(
                source // HTML string or DOM elem ref.
                , margins.left // x coord
                , margins.top // y coord
                , {
                    'width': margins.width // max width of content on PDF
                    , 'elementHandlers': specialElementHandlers
                },
                function (dispose) {

                    pdf.save('Test.pdf');
                  },
                margins
              )
        }
    });
 
}
