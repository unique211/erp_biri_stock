$(document).ready(function() {
    var table_name = "batch_master";
    //submit form code start
    $(document).on("submit", "#master_form", function(e) {
        e.preventDefault();

        var batch = $('#batch').val();
        var leaves = $('#leaves').val();
        var tobacco = $('#tobacco').val();
        var bl_sutta = $('#blsutta').val();
        var wh_sutta = $('#whsutta').val();
        var filter = $('#filter').val();
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
                url: baseurl + "Batch_creation/adddata",

                data: {
                    id: id,
                    batch: batch,
                    leaves: leaves,
                    tobacco: tobacco,
                    bl_sutta: bl_sutta,
                    wh_sutta: wh_sutta,
                    filter: filter,
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
        var url = baseurl + "Batch_creation/updateindex";
        // alert(id1+" & "+where);
        if (where != "") {
            $.ajax({
                type: "POST",
                url: url,
                data: {
                    table_name: 'batch_master',
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
            url: baseurl + "Batch_creation/showdata",
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
                    '<th><font style="font-weight:bold">Batch</font></th>' +
                    '<th><font style="font-weight:bold">Leaves</font></th>' +
                    '<th><font style="font-weight:bold">Tobacco</font></th>' +
                    '<th><font style="font-weight:bold">Bl Sutta.</font></th>' +
                    '<th><font style="font-weight:bold">Wh Sutta</font></th>' +
                    '<th><font style="font-weight:bold">Filter</font></th>' +
                    '<th><font style="font-weight:bold">Index</font></th>' +
                    '<th class="not-export-column"><font style="font-weight:bold">Operations</font></th>' +

                    '</tr>' +
                    '</thead>' +
                    '<tbody>';
                for (var i = 0; i < data.length; i++) {
                    html += '<tr>' +
                        '<td id="id_' + data[i].id + '">' + data[i].id + '</td>' +
                        '<td id="batch_' + data[i].id + '">' + data[i].batch + '</td>' +
                        '<td id="leaves_' + data[i].id + '">' + data[i].leaves + '</td>' +
                        '<td id="tobacco_' + data[i].id + '">' + data[i].tobacco + '</td>' +
                        '<td id="bl_sutta_' + data[i].id + '">' + data[i].bl_sutta + '</td>' +
                        '<td id="wh_sutta_' + data[i].id + '">' + data[i].wh_sutta + '</td>' +
                        '<td id="filter_' + data[i].id + '">' + data[i].filter + '</td>' +
                        '<td><input type="text" class="form-control index" id="index_' + data[i].id + '" style="width:55px;" value="' + data[i].index_value + '" name="' + data[i].id + '"/></td>' +
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
                if (export_p == 1) {
                    $('#myTable').DataTable({
                        dom: 'Bfrtip',
                        buttons: [{
                                extend: 'pdfHtml5',
                                title: 'DB Stock-Batch Creation',
                                //orientation: 'landscape',
                                pageSize: 'A4',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5, 6]
                                },
                            },
                            {
                                title: 'DB Stock-Batch Creation',
                                extend: 'excelHtml5',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5, 6]
                                }
                            }
                        ]
                    });
                } else {
                    $('#myTable').DataTable({});
                }
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
                        url: baseurl + "Batch_creation/deletedata",
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


        var batch = $('#batch_' + id).html();
        var leaves = $('#leaves_' + id).html();
        var tobacco = $('#tobacco_' + id).html();
        var bl_sutta = $('#bl_sutta_' + id).html();
        var wh_sutta = $('#wh_sutta_' + id).html();
        var filter = $('#filter_' + id).html();

        $('#batch').val(batch);
        $('#leaves').val(leaves);
        $('#tobacco').val(tobacco);
        $('#blsutta').val(bl_sutta);
        $('#whsutta').val(wh_sutta);
        $('#filter').val(filter);

        $('#save_update').val(id);


    });
});