$(document).ready(function() {
    var table_name = "con_bill_item";




    $(".closehideshow").click(function() {
        $('#master_form')[0].reset();
        $('#save_update').val("");

        $(".btnhideshow").show();
        $(".tablehideshow").show();
        $(".formhideshow").hide();
        //window.location.reload();

    });




    //----------------------submit form code start------------------------------
    $(document).on("submit", "#master_form", function(e) {
        e.preventDefault();


        var qty = $('#qty').val();
        var rate = $('#rate').val();
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
                url: baseurl + "Contractor_bill/adddata",

                data: {
                    id: id,
                    rate: rate,
                    qty: qty,
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
                        $('.rate1').hide();
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
    //----------------show data in the tabale code start-----------------------
    function datashow() {

        $.ajax({
            type: "POST",
            url: baseurl + "Contractor_bill/showdata",
            data: {
                table_name: table_name,

            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                // console.log('data'+data);
                var data = eval(data);
                var sr = 0;

                var html = '';
                html += '<table id="myTable" class="table table-striped">' +
                    '<thead>' +
                    '<tr>' +
                    '<th><font style="font-weight:bold">Id</font></th>' +
                    '<th><font style="font-weight:bold">Bill Item</font></th>' +
                    '<th><font style="font-weight:bold">Rate Per 1000</font></th>' +

                    '<th><font style="font-weight:bold">Operations </font></th>' +

                    '</tr>' +
                    '</thead>' +
                    '<tbody>';
                for (var i = 0; i < data.length; i++) {

                    var rate = "-";
                    sr = parseFloat(sr) + 1;
                    if (sr == 4) {
                        rate = data[i].rate;
                    }

                    html += '<tr>' +
                        '<td id="id_' + data[i].id + '">' + sr + '</td>' +

                        '<td id="qty_' + data[i].id + '">' + data[i].name + '</td>' +

                        '<td id="rate_' + data[i].id + '">' + rate + '</td>' +
                        //  '<td class="not-export-column" ><button name="edit" value="edit" class="edit_data btn btn-xs btn-success" id=' + data[i].id + '><i class="fa fa-edit"></i></button></td>' +
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
                            //orientation: 'landscape',
                            title: 'DB Stock-Cintractor-Bill',
                            exportOptions: {
                                columns: [0, 1, 2, 3]
                            },
                        },
                        {
                            extend: 'excelHtml5',
                            title: 'DB Stock-Cintractor-Bill',
                            exportOptions: {
                                columns: [0, 1, 2, 3]
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
                        url: baseurl + "Weekly_adjustment/deletedata",
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

        var getid = $('#id_' + id).html();
        var entry = $('#entry_' + id).html();
        var to = $('#to_' + id).html();
        var qty = $('#qty_' + id).html();

        if (getid == 4) {
            $('.rate1').show();
        } else {
            $('.rate1').hide();
        }


        $('#edate').val(entry);
        $('#tdate').val(to);
        $('#qty').val(qty);

        $('#save_update').val(id);


    });
});