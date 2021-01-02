$(document).ready(function() {
    /*---------insert data into area_master start-----------------*/
    $(document).on("submit", "#master_form", function(e) {
        e.preventDefault();
        var company_name = $('#company_name').val();
        var state = $('#state').val();
        var state_code = $('#scode').val();
        var address = $('#address').val();
        var email = $('#email').val();
        var phone = $('#phone').val();
        var gst = $('#gst').val();
        var pan = $('#pan').val();
        var bank_name = $('#bank_name').val();
        var branch_name = $('#branch_name').val();
        var ac_no = $('#ac_no').val();
        var ifsc = $('#ifsc').val();
        var id = $('#save_update').val();
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
                url: baseurl + "company/save_master",
                dataType: "JSON",
                async: false,
                data: {
                    id: id,
                    company_name: company_name,
                    state: state,
                    state_code: state_code,
                    address: address,
                    email: email,
                    phone: phone,
                    gst: gst,
                    pan: pan,
                    bank_name: bank_name,
                    branch_name: branch_name,
                    ac_no: ac_no,
                    ifsc: ifsc,
                },
                success: function(data) {
                    console.log(data);
                    if (data == true) {
                        if (id != "") {
                            successTost("Data Update Successfully");
                        } else {
                            successTost("Data Save Successfully");
                        }
                        form_clear(); //call function clear role_master form
                        show_master(); //call function show role_master table
                        $('.closehideshow').trigger('click');
                    } else {
                        errorTost("Data Cannot Save");
                    }
                }
            });
        } else {
            swal("You Not Have This Permission!", "success");
        }
    });
    /*---------insert data into area_master end-----------------*/
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

    /*---------get data into area_master start-----------------*/


    show_master(); //call function show area_master table


    //	function show area_master table
    function show_master() {
        $.ajax({
            type: 'POST',
            url: baseurl + "company/get_master",
            async: false,
            dataType: 'json',
            success: function(data) {
                var master_name = '';
                var html = '';
                html += '<table id="myTable" style="width:100%;table-layout:fixed;"  class="table table-striped">' +
                    '<thead>' +
                    '<tr>' +
                    '<th width="5%" >Sr </th>' +
                    '<th width="8%" >Company Name</th>' +
                    '<th width="3%" >State Name</th>' +
                    '<th width="3%" >State Code</th>' +
                    '<th width="7%" >Address</th>' +
                    '<th width="8%" >Email id</th>' +
                    '<th width="7%" >Phone No.</th>' +
                    '<th width="10%" >GST No.</th>' +
                    '<th width="7%" >PAN No.</th>' +
                    '<th width="5%" >Bank Name</th>' +
                    '<th width="5%" >Branch Name</th>' +
                    '<th width="7%" >A/C No.</th>' +
                    '<th width="5%"  >Ifsc Code</th>' +
                    '<th width="5%"  >Action</th>' +
                    '</tr>' +
                    '</thead>' +
                    '<tbody>';

                for (i = 0; i < data.length; i++) {
                    var sr = i + 1;
                    html += '<tr>' +
                        '<td >' + sr + '</td>' +
                        '<td id="company_name_' + data[i].id + '">' + data[i].company_name + '</td>' +
                        '<td id="state_' + data[i].id + '">' + data[i].state + '</td>' +
                        '<td id="scode_' + data[i].id + '">' + data[i].state_code + '</td>' +
                        '<td id="address_' + data[i].id + '">' + data[i].address + '</td>' +
                        '<td id="email_' + data[i].id + '">' + data[i].email + '</td>' +
                        '<td id="phone_' + data[i].id + '">' + data[i].phone + '</td>' +
                        '<td id="gst_' + data[i].id + '">' + data[i].gst + '</td>' +
                        '<td id="pan_' + data[i].id + '">' + data[i].pan + '</td>' +
                        '<td id="bank_' + data[i].id + '">' + data[i].bank + '</td>' +
                        '<td id="branch_' + data[i].id + '">' + data[i].branch + '</td>' +
                        '<td id="ac_no_' + data[i].id + '">' + data[i].ac_no + '</td>' +
                        '<td id="ifsc_' + data[i].id + '">' + data[i].ifsc + '</td>';
                    if (editrt == 1) {
                        html += '<td ><button  class="edit_data btn btn-xs btn-sm btn-primary" value="' + data[i].status + '"  id="' + data[i].id + '"  ><i class="fa fa-edit"></i></button>';
                    } else {
                        html += '<td ></td>';
                    }
                    '</tr>';
                }

                html += '</tbody></table>';
                $('#show_master').html(html);
                if (export_p == 1) {
                    $('#myTable').DataTable({
                        dom: 'Bfrtip',
                        buttons: [{
                                extend: 'pdfHtml5',
                                pageSize: 'A4',
                                orientation: 'landscape',
                                title: 'DB Stock-Company Management',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
                                },
                            },
                            {
                                extend: 'excelHtml5',
                                title: 'DB Stock-Company Management',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
                                },
                            }
                        ]
                    });
                } else {
                    $('#myTable').DataTable({});
                }
            }

        });
    }

    /*---------get data into area_master end-----------------*/

    $(document).on('click', '.closehideshow', function() {
        form_clear();
    });

    function form_clear() {
        $('#company_name').val('');
        $('#state').val('');
        $('#scode').val('');
        $('#address').val('');
        $('#email').val('');
        $('#phone').val('');
        $('#gst').val('');
        $('#pan').val('');
        $('#bank_name').val('');
        $('#branch_name').val('');
        $('#ac_no').val('');
        $('#ifsc').val('');
        $('#save_update').val('');
    }


    /*---------get  role_master  start-----------------*/

    $(document).on('click', '.edit_data', function() {
        var id1 = $(this).attr('id');
        var company_name = $('#company_name_' + id1).html();
        var state = $('#state_' + id1).html();
        var scode = $('#scode_' + id1).html();
        var address = $('#address_' + id1).html();
        var email = $('#email_' + id1).html();
        var phone = $('#phone_' + id1).html();
        var gst = $('#gst_' + id1).html();
        var pan = $('#pan_' + id1).html();
        var bank = $('#bank_' + id1).html();
        var branch = $('#branch_' + id1).html();
        var ac_no = $('#ac_no_' + id1).html();
        var ifsc = $('#ifsc_' + id1).html();
        //		var st = $('#status_'+id1).html();

        $('#company_name').val(company_name);
        $('#state').val(state);
        $('#scode').val(scode);
        $('#address').val(address);
        $('#email').val(email);
        $('#phone').val(phone);
        $('#gst').val(gst);
        $('#pan').val(pan);
        $('#bank_name').val(bank);
        $('#branch_name').val(branch);
        $('#ac_no').val(ac_no);
        $('#ifsc').val(ifsc);


        $('#save_update').val(id1);
        $('.btnhideshow').trigger('click');

    });

    /*---------get  area_master  end-----------------*/
    /*---------delete  area_master  start-----------------*/

    $(document).on('click', '.delete_data', function() {
        var id1 = $("#save_update").val();
        if (id1 != "") {
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
                        url: baseurl + "company/delete_master",
                        dataType: "JSON",
                        data: { id: id1 },
                        success: function(data) {
                            if (data == true) {
                                swal("Deleted !!", "Hey, your Data has been deleted !!", "success");
                                $('.closehideshow').trigger('click');

                                show_master(); //call function show all product					

                            } else {
                                errorTost("Data Delete Failed");
                            }

                        }
                    });
                    return false;

                });

        }

    });

    /*---------delete  area_master  end-----------------*/


});