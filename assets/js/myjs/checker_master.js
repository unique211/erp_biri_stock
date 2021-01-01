$(document).ready(function() {
    var table_name = "checker_master";


    //submit form code start
    $(document).on("submit", "#master_form", function(e) {
        e.preventDefault();

        var name = $('#name').val();
        var mobile = $('#mobile').val();
        var address = $('#address').val();
        var short_code = $('#short_code').val();
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
                url: baseurl + "Checker_master/adddata",

                data: {
                    id: id,
                    name: name,
                    mobile: mobile,
                    address: address,
                    short_code: short_code,
                    table_name: table_name
                },
                dataType: "JSON",
                async: false,
                success: function(data) {

                    console.log(data);
                    if (data == true) {
                        if (id != "") {
                            successTost("Data Update Successfully");
                        } else {
                            successTost("Data Save Successfully");
                        }
                        $('#master_form')[0].reset();
                        $('.formhideshow').hide();
                        $('.tablehideshow').show();
                        $(".btnhideshow").show();
                        datashow();
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
    //----------------------submit form code end------------------------------
    datashow();
    $(document).on("blur", ".index", function(e) {
        e.preventDefault();
        var id1 = $(this).attr('name');
        var where = $('#index_' + id1).val();
        var url = baseurl + "Checker_master/updateindex";
        // alert(id1+" & "+where);
        if (where != "") {
            $.ajax({
                type: "POST",
                url: url,
                data: {
                    table_name: 'checker_master',
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
    //----------------show data in the tabale code start-----------------------
    function datashow() {

        $.ajax({
            type: "POST",
            url: baseurl + "Checker_master/showdata",
            data: {
                table_name: table_name,

            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                // console.log('data'+data);
                var data = eval(data);
                $('#batch_table').html('');

                var html = '';
                html += '<table id="myTable" class="table table-striped">' +
                    '<thead>' +
                    '<tr>' +
                    '<th><font style="font-weight:bold">Id</font></th>' +
                    '<th><font style="font-weight:bold">Checker Name</font></th>' +
                    '<th><font style="font-weight:bold">Mobile Number</font></th>' +
                    '<th><font style="font-weight:bold">Address</font></th>' +
                    '<th><font style="font-weight:bold">Short Code</font></th>' +
                    '<th><font style="font-weight:bold">Index</font></th>' +
                    '<th class="not-export-column"><font style="font-weight:bold">Operations</font></th>' +

                    '</tr>' +
                    '</thead>' +
                    '<tbody>';
                for (var i = 0; i < data.length; i++) {
                    html += '<tr>' +
                        '<td id="id_' + data[i].id + '">' + data[i].id + '</td>' +
                        '<td id="name_' + data[i].id + '">' + data[i].name + '</td>' +
                        '<td id="mobile_' + data[i].id + '">' + data[i].mobile + '</td>' +
                        '<td id="address_' + data[i].id + '">' + data[i].address + '</td>' +
                        '<td id="short_code_' + data[i].id + '">' + data[i].short_code + '</td>' +
                        '<td><input type="text" class="form-control index" id="index_' + data[i].id + '" style="width:55px;" value="' + data[i].index_value + '" name="' + data[i].id + '"/></td>' +
                        // '<td class="not-export-column" ><button name="edit" value="edit" class="edit_data btn btn-xs btn-success" id=' + data[i].id + '><i class="fa fa-edit"></i></button>&nbsp;<button name="delete" value="Delete" class="delete_data btn btn-xs btn-danger" id=' + data[i].id + '><i class="fa fa-trash"></i></button></td>' +
                        '<td class="not-export-column" >';
                    if (editrt == 1) {
                        html += '<button name="edit" value="edit" class="edit_data btn btn-xs btn-success" id=' + data[i].id + '><i class="fa fa-edit"></i></button>';
                    }
                    if (delrt == 1) {
                        html += '&nbsp;<button name="delete" value="Delete" class="delete_data btn btn-xs btn-danger" id=' + data[i].id + '><i class="fa fa-trash"></i></button>';
                    }
                    html += '</td>' +
                        '</tr>';

                }
                html += '</tbody></table>';

                $('#show_master').html(html);
                $('#myTable').DataTable({
                    dom: 'Bfrtip',
                    buttons: [{
                            extend: 'pdfHtml5',
                            pageSize: 'A4',
                            // orientation: 'landscape',
                            title: 'DB Stock-Checker Master',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4]
                            },
                        },
                        {
                            extend: 'excelHtml5',
                            title: 'DB Stock-Checker Master',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4]
                            },
                        }
                    ]
                });

            }

        });

    }
    //------------------show data in the tabale code end-----------------------------------------------

    //-----------------------delete data code start-----------------------------------


    $(document).on('click', '.delete_data', function() {

        var id1 = $(this).attr('id');

        // $('#save_update').val(id1);

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
                        url: baseurl + "Checker_master/deletedata",
                        dataType: "JSON",
                        data: {
                            id: id1,
                            table_name: table_name,
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
                    return false;

                });

        }


    });
    //-----------------------delete data code end-----------------------------------
    //-----------------------edit data code start-----------------------------------
    $(document).on("click", ".edit_data", function() {

        $('.formhideshow').show();
        $('.tablehideshow').show();
        $(".btnhideshow").hide();

        $('#btnsave').text('Update');

        var id = $(this).attr('id');


        var name = $('#name_' + id).html();
        var mobile = $('#mobile_' + id).html();
        var address = $('#address_' + id).html();
        var short_code = $('#short_code_' + id).html();

        $('#name').val(name);
        $('#mobile').val(mobile);
        $('#address').val(address);
        $('#short_code').val(short_code);

        $('#save_update').val(id);


    });
});