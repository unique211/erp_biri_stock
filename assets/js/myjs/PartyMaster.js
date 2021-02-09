$(document).ready(function() {
    datashow();
    // $('#myModal').hide();
    //  console.log("Hii");
    //var baseurl="<?php echo base_url(); ?>";
    $('#len').hide();
    $(document).on('change', '#pf', function() {
        /// alert("hELLO");
        var pf = $('#pf').val();
        if (pf == "yes") {
            $("#lbl").html("PF Code*");
            $("#pfcode").prop('required', true);
        } else {
            $("#lbl").html("PF Code");
            $("#pfcode").prop('required', false);
        }
    });
    $(document).on('change', '#party', function() {
        var name = $('#party').val();
        if (name == 'party') {
            $('#aRow').hide();
            $('#form').hide();
            $('#pfcode').val('');
            $('#doj').val('');
            $('#security').val('');
            // $('#pf').val('');
            // $('#tds').val('');
            $('#pf option:selected').val('0');
            $('#tds option:selected').val('0');
            $('#batch').val('');
            $('#tobacco').val('');
            $('#leaves').val('');
            $('#blackYarn').val('');
            $('#whiteyarn').val('');
            $('#filter').val('');

            $('#file_infobody').html('');
            $('#len').hide();
            $('#len1').show();
        } else if (name == 'ledger') {
            $('#len').show();
            $('#len1').hide();

        } else {
            $('#aRow').show();
            $('#form').show();
            $('#len').hide();
            $('#len1').show();
        }

    });
    var closeid = '';
    $(document).on("click", '.close_data', function() {

        $('#myModal').modal('show');
        closeid = $(this).attr('id');
        $('#doj').datepicker({
            'todayHighlight': true,
            format: 'yyyy-mm-dd',
            autoclose: true,
        });
        $('#doj1').datepicker({
            'todayHighlight': true,
            format: 'yyyy-mm-dd',
            autoclose: true,
        });
        var date = new Date();
        date = date.toString('dd/MM/yyyy');
        $("#doj1").val(date);

    });
    $(document).on('click', '.active', function() {
        //  alert("Heyy");
        active = $(this).attr('id');
        var url = baseurl + "CPMaster/updatestatusSet";
        $.ajax({
            type: "POST",
            url: url,
            data: {
                table_name: 'con-party_master',
                where: active
            },
            dataType: "Json",
            async: false,
            success: function(data) {
                successTost("Status Update Successfully");
                datashow();
            },
            error: function() {
                alert("error");
            }
        });
    });
    $(document).on('click', '#btnsave', function() {
        var url = baseurl + "CPMaster/statusSet";
        var date = $('#doj1').val();
        var fdateslt = date.split('/');
        var cdate = fdateslt[2] + '-' + fdateslt[1] + '-' + fdateslt[0];
        // alert(doj1);
        $.ajax({
            type: "POST",
            url: url,
            data: {
                table_name: 'con-party_master',
                where: closeid,
                cdate: cdate
            },
            dataType: "Json",
            async: false,
            success: function(data) {
                $('#myModal').modal('hide');
                $('#doj1').val('');
                successTost("Status Update Successfully");
                datashow();
            },
            error: function() {
                alert("error");
            }
        });
    });
    $(document).on("change", '#state', function() {
        var where = $('#state').val();

        var url = baseurl + "CPMaster/getstate";
        $.ajax({
            type: "POST",
            url: url,
            data: {
                table_name: 'states',
                where: where
            },
            dataType: "Json",
            async: false,
            success: function(data) {
                var code = data[0].state_code;
                $('#scode').val(code);
            },
            error: function() {
                alert("error");
            }
        });
    });
    // $("#tobacco").keypress(function(e) {
    // //if the letter is not digit then display error and don't type anything
    // if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57 || e.which == 46)) {

    // //display error message
    // $("#errmsgT").html("Digits Only").show().fadeOut("slow");
    // return false;
    // }
    // });
    // $("#leaves").keypress(function(e) {
    // //if the letter is not digit then display error and don't type anything
    // if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57 || e.which == 46)) {

    // //display error message
    // $("#errmsgL").html("Digits Only").show().fadeOut("slow");
    // return false;
    // }
    // });
    // $("#blackYarn").keypress(function(e) {
    // //if the letter is not digit then display error and don't type anything
    // if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57 || e.which == 46)) {

    // //display error message
    // $("#errmsgBY").html("Digits Only").show().fadeOut("slow");
    // return false;
    // }
    // });
    // $("#whiteyarn").keypress(function(e) {
    // //if the letter is not digit then display error and don't type anything
    // if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57 || e.which == 46)) {

    // //display error message
    // $("#errmsgWY").html("Digits Only").show().fadeOut("slow");
    // return false;
    // }
    // });
    // $("#filter").keypress(function(e) {
    // //if the letter is not digit then display error and don't type anything
    // if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57 || e.which == 46)) {

    // //display error message
    // $("#errmsgF").html("Digits Only").show().fadeOut("slow");
    // return false;
    // }
    // });
    //Close button 
    $(".closehideshow").click(function() {
        $('#master_form')[0].reset();
        $('#save_update').val("");
        $('#saveupdate').val("");
        $(".btnhideshow").show();
        $(".tablehideshow").show();
        $(".formhideshow").hide();
        $('#file_infobody').html('');

    });
    //addding in openbalance form
    $('#add').on('click', function() {
        //console.log("HII");
        var batchvalue = 0;

        var rowid = $('#row').val();

        var row_id = parseInt(rowid) + 1;
        var save = $('#saveupdate').val();
        var batch = $('#batch').val();
        var batchName = $('#batch option:selected').text();
        var tobacco = $('#tobacco').val();
        var leaves = $('#leaves').val();
        var blackYarn = $('#blackYarn').val();
        var whiteyarn = $('#whiteyarn').val();
        var filter = $('#filter').val();
        //console.log(batch+"-"+tobacco+"-"+leaves+"-"+blackYarn+"-"+whiteyarn+"-"+filter);
        var table = "";
        var r1 = $('table#file_info').find('tbody').find('tr');
        var r = r1.length;
        for (var i = 0; i < r; i++) {
            var col = $(r1[i]).find('td:eq(0)').html();
            //alert(col);
            if (save == '') {
                if (col == batch) {
                    batchvalue = 1;
                }
            }

        }

        if (batchvalue > 0) {
            swal({
                title: "Please select another Batch!",
                type: "warning",
            });

            //  errorTost("Please select another Batch") 
        } else if (save != '' && batchName != '') {
            //  alert("data updated success fully");
            $('#saveupdate').val('');
            var atr = $('#batchName_' + row_id).text();
            $('#batchId_' + save).text(batch);
            $('#batchName_' + save).text(batchName);
            $('#tabacco_' + save).text(tobacco);
            $('#leaves_' + save).text(leaves);
            $('#blackYarn_' + save).text(blackYarn);
            $('#whiteyarn_' + save).text(whiteyarn);
            $('#filter_' + save).text(filter);
            // $('#security').val('');
            $('#batch').val('');
            $('#tobacco').val('');
            $('#leaves').val('');
            $('#blackYarn').val('');
            $('#whiteyarn').val('');
            $('#filter').val('');
            //$('#opeBalance')[0].reset();	
            //successTost("Data Update Successfully");
        } else {
            table += '<tr id="' + row_id + '"><td hidden id="batchId_' + row_id + '">' + batch +
                '</td><td id="batchName_' + row_id + '">' + batchName +
                '</td><td id="tabacco_' + row_id + '">' + tobacco +
                '</td><td id="leaves_' + row_id + '">' + leaves +
                '</td><td id="blackYarn_' + row_id + '">' + blackYarn +
                '</td><td id="whiteyarn_' + row_id + '">' + whiteyarn +
                '</td><td id="filter_' + row_id + '">' + filter +
                '</td><td hidden id="ID_' + row_id + '">' + batch +
                '</td><td><button type="button" name="edit" class="edit_data btn btn-xs btn-success" id="' + row_id + '"><i class="fa fa-edit"></i></button></td><td><button type="button" name="delete" value="Delete" class="btn delete_data btn-xs  btn-danger"><i class="fa fa-trash"></i></button></td></tr>';

            $('#file_infobody').append(table);
            $('#row').val(row_id) + 1;
            $('#saveupdate').val('');
            // $('#security').val('');
            var atr = $('#batchName_' + row_id).text();
            $('#batchname').val(atr);
            $('#batch').val('');
            $('#tobacco').val('');
            $('#leaves').val('');
            $('#blackYarn').val('');
            $('#whiteyarn').val('');
            $('#filter').val('');
            // successTost("Data Save Successfully");

        }
    });
    $(document).on("click", '.edit_data', function(e) {
        e.preventDefault();
        var id1 = $(this).attr('id');
        $("#saveupdate").val(id1);
        $('#batch').val($('#batchId_' + id1).text());
        $('#tobacco').val($('#tabacco_' + id1).text());
        $('#leaves').val($('#leaves_' + id1).text());
        $('#blackYarn').val($('#blackYarn_' + id1).text());
        $('#whiteyarn').val($('#whiteyarn_' + id1).text());
        $('#filter').val($('#filter_' + id1).text());
    });
    $(document).on('click', '.delete_data', function() {
        if (confirm("Are you sure you want to delete this?")) {
            $(this).parents("tr").remove();
        } else {
            return false;
        }
    });
    $(document).on('submit', '#master_form', function(e) {
        e.preventDefault();
        var url = baseurl + "CPMaster/adddata";
        var ledger = '';
        var id = $('#save_update').val();
        //alert(url+" "+ id);
        var party = $('#party').val();
        if (party == 'ledger') {
            ledger = $('#ledger').val();
        } else {
            ledger = $('#ledger1').val();
        }

        var name = $('#name').val().toUpperCase();;
       
        var state = $('#state').val();
        var state_code = $('#scode').val();
        var address = $('#address').val().toUpperCase();
        var postoffice = $('#postoffice').val().toUpperCase();
        var district = $('#district').val().toUpperCase();
        var pin = $('#pin').val();
        var pan = $('#pan').val().toUpperCase();
        var aadhar = $('#aadhar').val().toUpperCase();;
        var gstno = $('#gstno').val();
        var pfcode = $('#pfcode').val();
        var date = $('#doj').val();
        var security = $('#security').val();
        var pf = $('#pf').val();
        var tds = $('#tds').val();
        var bankac = $('#bankac').val().toUpperCase();
        var bankname = $('#bankname').val().toUpperCase();
        var amount = $('#amount').val();
        var ifsc = $('#ifsc').val();

        var fdateslt = date.split('/');
        var doj = fdateslt[2] + '-' + fdateslt[1] + '-' + fdateslt[0];

        var flg = 0;

        if (create_p > 0) {
            flg = 1;
        } else if (editrt > 0) {
            if (id > 0) {
                flg = 1;
            }
        }

        if (flg == 1) {

            $.ajax({
                type: "POST",
                url: url,
                data: {
                    id: id,
                    party: party,
                    ledger: ledger,
                    name: name,
                    state: state,
                    state_code: state_code,
                    address: address,
                    postoffice: postoffice,
                    district: district,
                    pin: pin,
                    pan: pan,
                    aadhar: aadhar,
                    gstno: gstno,
                    pfcode: pfcode,
                    doj: doj,
                    security: security,
                    pf: pf,
                    tds: tds,
                    bankac: bankac,
                    bankname: bankname,
                    amount: amount,
                    ifsc: ifsc,
                    table_name: 'con-party_master'
                },
                dataType: "json",
                async: false,
                success: function(data) {
                    //alert("data is"+data);
                    $('#master_form')[0].reset();
                    var id = $('#saveupdate').val();
                    id1 = $('#save_update').val();

                    //alert("ID is"+id1);
                    if (data == true) {
                        $("#ids").val(id1);
                    } else {
                        $("#ids").val(data);
                    }
                    if (party == 'contractor') {

                        var r1 = $('table#file_info').find('tbody').find('tr');
                        var r = r1.length;
                        for (var i = 0; i < r; i++) {
                            c_id = $('#ids').val();
                            bat = $(r1[i]).find('td:eq(0)').html();
                            tob = $(r1[i]).find('td:eq(2)').html();
                            lea = $(r1[i]).find('td:eq(3)').html();
                            black = $(r1[i]).find('td:eq(4)').html();
                            white = $(r1[i]).find('td:eq(5)').html();
                            fil = $(r1[i]).find('td:eq(6)').html();
                            $.ajax({
                                type: "POST",
                                url: url,
                                data: {
                                    id: id,
                                    c_id: c_id,
                                    bat: bat,
                                    tob: tob,
                                    lea: lea,
                                    black: black,
                                    white: white,
                                    fil: fil,
                                    table_name: 'contractor_master'
                                },
                                dataType: 'json',
                                async: false,
                                success: function(data) {
                                    $('#master_form')[0].reset();
                                    //  alert("Operation Successfull");
                                },
                                error: function() {
                                    // alert("error from success");
                                }
                            });
                        }
                        successTost("Data Save Successfully");
                        //   alert("Operation Successfull");
                        $('#master_form')[0].reset();
                        $(".formhideshow").hide();
                        $(".tablehideshow").show();
                        $(".btnhideshow").show();
                        $('#save_update').val("");
                        //datashow();
                    } else {
                        successTost("Data Update Successfully");
                        // alert("Operation Successfull from else");
                        $('#master_form')[0].reset();
                        $(".formhideshow").hide();
                        $(".tablehideshow").show();
                        $(".btnhideshow").show();
                        $('#save_update').val("");
                        //datashow();
                    }
                    $('#file_infobody').html('');
                    datashow();
                },
                error: function() {
                    errorTost("from error");
                }

            });
        } else {
            swal("You Not Have This Permission!", "success");
        }

    });


    function datashow() {
        //var table_name="customer_master"; 

        $.ajax({
            type: "POST",
            url: baseurl + "CPMaster/showData",
            data: {
                table_name: 'con-party_master'
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                var data = eval(data);

                var table = "";
                table += '<table id="myTable" style="width:100%;margin-left:0px;table-layout: fixed;" class="table table-striped">' +
                    '<thead>' +
                    '<tr>' +
                    '<th width="0%" style="display:none;"><font style="font-weight:bold">ID</font></th>' +
                    '<th width="7%"><font style="font-weight:bold;">Con/Party</font></th>' +
                    '<th width="0%" style="display:none;"><font style="font-weight:bold">Ledger</font></th>' +
                    '<th width="8%"><font style="font-weight:bold">Name</font></th>' +
                    '<th width="0%" style="display:none;"><font style="font-weight:bold">State</font></th>' +
                    '<th width="0%" style="display:none;"><font style="font-weight:bold">State Code</font></th>' +
                    '<th width="8%"><font style="font-weight:bold">Address </font></th>' +
                    '<th width="7%"><font style="font-weight:bold">PAN </font></th>' +
                    '<th width="10%"><font style="font-weight:bold">Aadhar</font></th>' +
                    '<th width="5%"><font style="font-weight:bold">GST No. </font></th>' +
                    '<th width="8%"><font style="font-weight:bold">PFCode</font></th>' +
                    '<th width="7%"><font style="font-weight:bold">DOJ </font></th>' +
                    '<th width="0%" style="display:none;"><font style="font-weight:bold">Bank</font></th>' +
                    '<th width="0%" style="display:none;"><font style="font-weight:bold">ifsc</font></th>' +
                    '<th width="7%"><font style="font-weight:bold">Security Deposit </font></th>' +
                    '<th width="8%"><font style="font-weight:bold">Amount(Rs.) </font></th>' +
                    '<th width="0%" style="display:none;"><font style="font-weight:bold">Tds</font></th>' +
                    '<th width="0%" style="display:none;"><font style="font-weight:bold">PF</font></th>' +
                    '<th width="0%" style="display:none;"><font style="font-weight:bold">post</font></th>' +
                    '<th width="0%" style="display:none;"><font style="font-weight:bold">dist</font></th>' +
                    '<th width="0%" style="display:none;"><font style="font-weight:bold">pin</font></th>' +
                    '<th width="0%" style="display:none;"><font style="font-weight:bold">bankname</font></th>' +
                    '<th width="7%"><font style="font-weight:bold">Index </font></th>' +
                    '<th width="8%"><font style="font-weight:bold"> Close Date </font></th>' +
                    '<th width="10%"><font style="font-weight:bold">Action </font></th>' +
                    '</tr>' +
                    '</thead>' +
                    '<tbody style="margin-left:0px;">';

                for (var i = 0; i < data.length; i++) {
                    var nameofparty = data[i].party;
                    console.log(nameofparty);
                    var status = data[i].status;
                    //alert(status);
                    var fdateval = data[i].doj;
                    var fdateslt = data[i].doj.split('-');
                    var date = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];
                    var c_date = data[i].close_date.split('-');
                    var cdate = c_date[2] + '/' + c_date[1] + '/' + c_date[0];
                    if (date == "00/00/0000") {
                        date = '';
                    }

                    // if (nameofparty == "contractor") {
                    table += '<tr>' +
                        '<td width="0%" hidden id="id_' + data[i].id + '">' + data[i].id + '</td>' +
                        '<td width="7%" id="party_' + data[i].id + '">' + data[i].party + '</td>' +
                        '<td width="0%" hidden id="ledger_' + data[i].id + '">' + data[i].ledger + '</td>' +
                        '<td width="8%" id="name_' + data[i].id + '">' + data[i].name + '</td>' +
                        '<td width="0%" style="display:none;" id="state_' + data[i].id + '">' + data[i].state + '</td>' +
                        '<td width="0%" style="display:none;" id="scode_' + data[i].id + '">' + data[i].state_code + '</td>' +
                        '<td width="8%" id="address_' + data[i].id + '">' + data[i].address + '</td>' +
                        '<td width="7%" id="pan_' + data[i].id + '">' + data[i].pan + '</td>' +
                        '<td width="10%" id="aadhar_' + data[i].id + '">' + data[i].aadhar + '</td>' +
                        '<td width="5%" id="gdtno_' + data[i].id + '">' + data[i].gstno + '</td>' +
                        '<td width="8%" id="pfcode_' + data[i].id + '">' + data[i].pfcode + '</td>' +
                        '<td width="7%" id="doj_' + data[i].id + '">' + date + '</td>' +
                        '<td width="0%" hidden id="bankac_' + data[i].id + '">' + data[i].bankac + '</td>' +
                        '<td width="0%" hidden id="ifsc_' + data[i].id + '">' + data[i].ifsc + '</td>' +
                        '<td width="7%" id="security_' + data[i].id + '">' + data[i].security + '</td>' +
                        '<td width="8%" id="amount_' + data[i].id + '">' + data[i].amount + '</td>' +
                        '<td width="0%" hidden id="tds_' + data[i].id + '">' + data[i].tds + '</td>' +
                        '<td width="0%" hidden id="pf_' + data[i].id + '">' + data[i].pf + '</td>' +
                        '<td width="0%" hidden id="postoffice_' + data[i].id + '">' + data[i].postoffice + '</td>' +
                        '<td width="0%" hidden id="district_' + data[i].id + '">' + data[i].district + '</td>' +
                        '<td width="0%" hidden id="pin_' + data[i].id + '">' + data[i].pin + '</td>' +
                        '<td width="0%" hidden id="bankname_' + data[i].id + '">' + data[i].bankname + '</td>' +
                        '<td width="7%" ><input type="text" class="form-control index" id="index_' + data[i].id + '" style="width:55px;" value="' + data[i].index_value + '" name="' + data[i].id + '"/></td>' +
                        '<td width="8%" id="date_' + data[i].id + '">' + cdate + '</td>' +
                        //'<td width="10%"><button type="button" name="edit" class="edit_data1 btn-success btn btn-xs" id="' + data[i].id + '"><i class="fa fa-edit"></i></button>  <button type="button" name="delete" value="Delete" class="btn btn-xs delete_data1 btn-danger" id="' + data[i].id + '"><i class="fa fa-trash"></i></button>';
                        '<td class="not-export-column" >';

                    if (editrt == 1) {
                        table += '<button name="edit" value="edit" class="edit_data1 btn btn-xs btn-success" id=' + data[i].id + '><i class="fa fa-edit"></i></button>';
                    }
                    if (delrt == 1) {
                        table += '&nbsp;<button name="delete" value="Delete" class="delete_data1 btn btn-xs btn-danger" id=' + data[i].id + '><i class="fa fa-trash"></i></button>';
                    }



                    if (status == 1) {
                        table += '  <button type="button"  name="delete" value="Close" class="close_data btn btn-xs btn-info" id="' + data[i].id + '"><i class="fa fa-close"></i></button>'
                    } else {
                        table += '  <button type="button"  name="delete" value="Close" class="active btn btn-xs btn-success" id="' + data[i].id + '"><i class="fa fa-check"></i></button>'
                    }
                    table += '</td>' +
                        '</tr>';
                    /*} else if (nameofparty == "party") {
                        table += '<tr>' +
                            '<td hidden id="id_' + data[i].id + '">' + data[i].id + '</td>' +
                            '<td id="party_' + data[i].id + '">' + data[i].party + '</td>' +
                            '<td id="name_' + data[i].id + '">' + data[i].name + '</td>' +
                            '<td id="address_' + data[i].id + '">' + data[i].address + '</td>' +
                            '<td id="pan_' + data[i].id + '">' + data[i].pan + '</td>' +
                            '<td id="aadhar_' + data[i].id + '">' + data[i].aadhar + '</td>' +
                            '<td id="gdtno_' + data[i].id + '">' + data[i].gstno + '</td>' +
                            '<td id="pfcode_' + data[i].id + '">-</td>' +
                            '<td id="doj_' + data[i].id + '">-</td>' +
                            '<td hidden id="bankac_' + data[i].id + '">' + data[i].bankac + '</td>' +
                            '<td hidden id="ifsc_' + data[i].id + '">' + data[i].ifsc + '</td>' +
                            '<td id="security_' + data[i].id + '">-</td>' +
                            '<td id="amount_' + data[i].id + '">' + data[i].amount + '</td>' +
                            '<td hidden id="postoffice_' + data[i].id + '">' + data[i].postoffice + '</td>' +
                            '<td hidden id="district_' + data[i].id + '">' + data[i].district + '</td>' +
                            '<td hidden id="pin_' + data[i].id + '">' + data[i].pin + '</td>' +
                            '<td hidden id="bankname_' + data[i].id + '">' + data[i].bankname + '</td>' +
                            '<td><button type="button" name="edit" class="edit_data1 btn btn-success" id="' + data[i].id + '"><i class="fa fa-edit"></i></button>  <button type="button" name="delete" value="Delete" class="btn delete_data1 btn-danger" id="' + data[i].id + '"><i class="fa fa-trash"></i></button></td>' +
                            '</tr>';
                    }*/

                }
                table += '</tbody></table>';

                $('#show_master').html(table);
                if (export_p == 1) {
                    $('#myTable').DataTable({
                        dom: 'Bfrtip',
                        "order": [[ 1, "asc" ]],
                        buttons: [{
                                extend: 'pdfHtml5',
                                title: 'DB Stock-Contractor/Party Master',
                                orientation: 'landscape',
                                pageSize: 'A4',
                                exportOptions: {
                                    columns: [1, 2, 3, 4, 5, 6, 7, 8, 11, 12]
                                },
                            },
                            {
                                title: 'DB Stock-Contractor/Party Master',
                                extend: 'excelHtml5',
                                exportOptions: {
                                    columns: [1, 2, 3, 4, 5, 6, 7, 8, 11, 12]
                                }
                            }
                        ]
                    });
                } else {
                    $('#myTable').DataTable({});
                }
            },
            error: function() {}
        });
    }
    $(document).on("blur", ".index", function(e) {
        e.preventDefault();
        var id1 = $(this).attr('name');
        var where = $('#index_' + id1).val();
        var url = baseurl + "CPMaster/updateindex";
        // alert(id1+" & "+where);
        if (where != "") {
            $.ajax({
                type: "POST",
                url: url,
                data: {
                    table_name: 'con-party_master',
                    where: where,
                    id1: id1
                },
                dataType: "Json",
                async: false,
                success: function(data) {
                    successTost("index value has bees set Successfully");
                },
                error: function() {
                    alert("error");
                }
            });
        } else {

        }
    });
    $(document).on("click", '.edit_data1', function(e) {
        e.preventDefault();
        var id1 = $(this).attr('id');
        var par = $('#party_' + id1).text();
        // alert(par);
        if (par == "party") {
            $(".formhideshow").show();
            $(".tablehideshow").show();
            $(".btnhideshow").hide();
            $('#aRow').hide();
            $('#form').hide();

            $("#save_update").val(id1);
            $('#name').val($('#name_' + id1).text());
            $('#party').val($('#party_' + id1).text()).trigger('change');
            $('#ledger1').val($('#ledger_' + id1).text());
            $('#state').val($('#state_' + id1).text());
            $('#scode').val($('#scode_' + id1).text());
            $('#pan').val($('#pan_' + id1).text());
            $('#bankac').val($('#bankac_' + id1).text());
            $('#ifsc').val($('#ifsc_' + id1).text());
            $('#pf option:selected').val('0');
            $('#tds option:selected').val('0');
            // $('#tds').val($('#tds_'+id1).text()).trigger('change');
            // $('#pf').val($('#pf_'+id1).text()).trigger('change');
            $('#amount').val($('#amount_' + id1).text());
            $('#address').val($('#address_' + id1).text());
            $('#postoffice').val($('#postoffice_' + id1).text());
            $('#district').val($('#district_' + id1).text());
            $('#pin').val($('#pin_' + id1).text());
            $('#aadhar').val($('#aadhar_' + id1).text());
            $('#gstno').val($('#gdtno_' + id1).text());
            $('#bankname').val($('#bankname_' + id1).text());
            datashow();
        } else if (par == "contractor") {
            var id = id1;
            //alert(id);
            $(".formhideshow").show();
            $(".tablehideshow").show();
            $(".btnhideshow").hide();
            $('#aRow').show();
            $('#form').show();

            $("#save_update").val(id1);
            //$("#saveupdate").val(id1);
            $('#name').val($('#name_' + id1).text());
            $('#party').val($('#party_' + id1).text()).trigger('change');
            $('#ledger1').val($('#ledger_' + id1).text());
            $('#state').val($('#state_' + id1).text());
            $('#scode').val($('#scode_' + id1).text());
            $('#pan').val($('#pan_' + id1).text());
            $('#bankac').val($('#bankac_' + id1).text());
            $('#ifsc').val($('#ifsc_' + id1).text());
            $('#security').val($('#security_' + id1).text());
            $('#tds').val($('#tds_' + id1).text()).trigger('change');
            $('#pf').val($('#pf_' + id1).text()).trigger('change');
            $('#amount').val($('#amount_' + id1).text());
            $('#address').val($('#address_' + id1).text());
            $('#postoffice').val($('#postoffice_' + id1).text());
            $('#district').val($('#district_' + id1).text());
            $('#pin').val($('#pin_' + id1).text());
            $('#aadhar').val($('#aadhar_' + id1).text());
            $('#gstno').val($('#gdtno_' + id1).text());
            $('#pfcode').val($('#pfcode_' + id1).text());
            $('#doj').val($('#doj_' + id1).text());
            $('#bankname').val($('#bankname_' + id1).text());
            $.ajax({
                type: "POST",
                url: baseurl + "CPMaster/showallBatch",
                data: {
                    id: id,
                    table_name: 'contractor_master'
                },
                dataType: "JSON",
                async: false,
                success: function(data) {
                    var data = eval(data);
                    console.log(data);
                    //alert(data[0].batch);
                    var table = "";
                    for (var i = 0; i < data.length; i++) {

                        table += '<tr>' +

                            '<td hidden id="batchId_' + data[i].id + '">' + data[i].batch + '</td>' +
                            '<td id="batchName_' + data[i].id + '">' + data[i].batchname + '</td>' +
                            '<td id="tabacco_' + data[i].id + '">' + data[i].tobacco + '</td>' +
                            '<td id="leaves_' + data[i].id + '">' + data[i].leaves + '</td>' +
                            '<td id="blackYarn_' + data[i].id + '">' + data[i].blackYarn + '</td>' +
                            '<td id="whiteyarn_' + data[i].id + '">' + data[i].whiteyarn + '</td>' +
                            '<td id="filter_' + data[i].id + '">' + data[i].filter + '</td>' +
                            '<td hidden id="colid' + data[i].id + '">' + data[i].id + '</td>' +
                            '</td><td><button type="button" name="edit" class="edit_data btn btn-xs btn-success" id="' + data[i].id + '"><i class="fa fa-edit"></i></button></td><td><button type="button" name="delete" value="Delete" class="delete_data btn btn-xs btn-danger"><i class="fa fa-trash"></i></button></td>' +
                            '</tr>';
                        //$('#batchname').val(data[i].batch);
                    }
                    $('#file_infobody').html(table);
                }
            });
            datashow();
        } else {
            var id = id1;
            //alert(id);
            $(".formhideshow").show();
            $(".tablehideshow").show();
            $(".btnhideshow").hide();
            $('#aRow').show();
            $('#form').show();

            $("#save_update").val(id1);
            //$("#saveupdate").val(id1);
            $('#name').val($('#name_' + id1).text());
            $('#party').val($('#party_' + id1).text()).trigger('change');
            $('#ledger').val($('#ledger_' + id1).text());
            $('#state').val($('#state_' + id1).text());
            $('#scode').val($('#scode_' + id1).text());
            $('#pan').val($('#pan_' + id1).text());
            $('#bankac').val($('#bankac_' + id1).text());
            $('#isfc').val($('#isfc_' + id1).text());
            $('#security').val($('#security_' + id1).text());
            $('#amount').val($('#amount_' + id1).text());
            $('#address').val($('#address_' + id1).text());
            $('#postoffice').val($('#postoffice_' + id1).text());
            $('#district').val($('#district_' + id1).text());
            $('#pin').val($('#pin_' + id1).text());
            $('#aadhar').val($('#aadhar_' + id1).text());
            $('#gstno').val($('#gdtno_' + id1).text());
            $('#pfcode').val($('#pfcode_' + id1).text());
            $('#doj').val($('#doj_' + id1).text());
            $('#bankname').val($('#bankname_' + id1).text());
            $.ajax({
                type: "POST",
                url: baseurl + "CPMaster/showallBatch",
                data: {
                    id: id,
                    table_name: 'contractor_master'
                },
                dataType: "JSON",
                async: false,
                success: function(data) {
                    var data = eval(data);

                    //alert(data[0].batch);
                    var table = "";
                    for (var i = 0; i < data.length; i++) {

                        table += '<tr>' +

                            '<td hidden id="batchId_' + data[i].id + '">' + data[i].id + '</td>' +
                            '<td id="batchName_' + data[i].id + '">' + data[i].batchname + '</td>' +
                            '<td id="tabacco_' + data[i].id + '">' + data[i].tobacco + '</td>' +
                            '<td id="leaves_' + data[i].id + '">' + data[i].leaves + '</td>' +
                            '<td id="blackYarn_' + data[i].id + '">' + data[i].blackYarn + '</td>' +
                            '<td id="whiteyarn_' + data[i].id + '">' + data[i].whiteyarn + '</td>' +
                            '<td id="filter_' + data[i].id + '">' + data[i].filter + '</td>' +
                            '<td hidden id="colid' + data[i].id + '">' + data[i].id + '</td>' +
                            '</td><td><button type="button" name="edit" class="edit_data btn btn-xs btn-success" id="' + data[i].id + '"><i class="fa fa-edit"></i></button></td><td><button type="button" name="delete" value="Delete" class="delete_data btn btn-xs btn-danger"><i class="fa fa-trash"></i></button></td>' +
                            '</tr>';
                        //$('#batchname').val(data[i].batch);
                    }
                    $('#file_infobody').html(table);
                }
            });
            datashow();
        }
    });
    $(document).on('click', '.delete_data1', function() {

        var id = $(this).attr('id');

        $('#save_update').val(id);
        if (id != "") {
            swal({
                    title: "Are you sure to delete ?",
                    text: "You will not be able to recover this Data !!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, delete it !!",
                    closeOnConfirm: false
                },
                function() {
                    $.ajax({
                        type: "POST",
                        url: baseurl + "CPMaster/deletedata",
                        dataType: "JSON",
                        data: {
                            id: id,
                            table_name: 'con-party_master',
                        },
                        success: function(data) {
                            var table_name = "contractor_master";
                            var id = $('#save_update').val();
                            //   alert("ID IS"+id);
                            if (data == true) {
                                $.ajax({
                                    type: "POST",
                                    url: baseurl + "CPMaster/deletedata",
                                    dataType: "JSON",
                                    data: {
                                        id: id,
                                        table_name: 'contractor_master'
                                    },
                                    success: function(data) {
                                        if (data == true) {
                                            swal("Deleted !!", "Hey, your Data has been deleted !!", "success");
                                            $('.closehideshow').trigger('click');
                                            $('#save_update').val("");
                                            datashow();; //call function show all data				
                                        } else {
                                            errorTost("Data Delete Failed");
                                        }
                                    }
                                });
                            } else {
                                errorTost("Data Delete Failed");
                            }
                        }
                    });
                });
        }
    });

    $(document).on('change', '#tds', function() {
        var val=$(this).val();
        if(val=="yes"){
            $("#pan").prop('required',true);

        }else{
            $("#pan").prop('required',false);

        }

    });
});
