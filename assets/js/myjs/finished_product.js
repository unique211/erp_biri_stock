$(document).ready(function() {
    var table_name = "finished_product";
    //submit form code start
    defaultdate();
    formdata();
    latestdata();
    var total_bidi_sum = 1;

    function latestdata() {


        $.ajax({
            type: "POST",
            url: baseurl + "Finished_product/filtertoday",
            data: {

                //  where: where,
                table_name: table_name,
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                var data = eval(data);

                for (var i = 0; i < data.length; i++) {
                    if (data[i].date != null) {
                        //var fdateval = data[i].date;
                        var fdateslt = data[i].date.split('-');
                        var fdate = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];
                    }

                }
                if (fdateslt == null) {
                    defaultdate();
                } else {
                    $("#date2").val(fdate);
                    $("#date3").val(fdate);
                }

            }
        });
    }
    $(document).on("change", "#date2", function() {

        datashow();
    });
    $(document).on("change", "#date3", function() {
        datashow();
    });
    $('#filter').on('click', function() {
        datashow();
    });
    $(".closehideshow").click(function() {
        $('#master_form')[0].reset();
        $('#save_update').val("");

        $(".btnhideshow").show();
        $(".tablehideshow").show();
        $(".formhideshow").hide();
        defaultdate();
        $('#btnsave').text('Save');
        $('#product_body').html('');
        $('#product_footer').html('');
        $('#product tr .sum_cartons').val(0);
        //  latestdata();

        formdata();
    });


    function defaultdate() {
        $('.doj').datepicker({
            'todayHighlight': true,
        });
        var date = new Date();
        date = date.toString('dd/MM/yyyy');

        $("#date").val(date);
        $("#date2").val(date);
    }

    function formdata() {
        table_name = "packingbatch";

        $.ajax({
            type: "POST",
            url: baseurl + "Finished_product/formdata",
            data: {
                table_name: table_name,

            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                // console.log('data'+data);
                var data = eval(data);
                var body = '';
                var foot = '';
                sum_total_bidi = 0;

                $(document).on("blur", ".sum_cartons", function() {
                    var cartons2 = $(this).val();
                    var id = $(this).attr('name');
                    var bidi = $('#actotal_' + id).html();
                    var tot_bidi = parseFloat(cartons2) * parseFloat(bidi);
                    $('#total_' + id).html(tot_bidi.toFixed(3));
                    total_cartons();
                    // mul_cartons();
                });


                for (var i = 0; i < data.length; i++) {

                    asalbidi = data[i].asalbidi;
                    chantbidi = data[i].chantbidi;
                    //  opnningcart = $(row[i]).find("td:eq(2) input[type='number']").val();

                    total_bidi_sum = parseFloat(asalbidi) + parseFloat(chantbidi);
                    //  total_bidi = parseFloat(total_bidi_sum) * parseFloat(opnningcart);

                    sum_total_bidi = parseFloat(sum_total_bidi) + parseFloat(total_bidi_sum);



                    body += '<tr>' +
                        '<td style="display:none;" id="id_' + data[i].id + '">' + data[i].id + '</td>' +
                        '<td id="lbl_' + data[i].id + '">' + data[i].lablenm + '</td>' +
                        '<td id="cartons_' + data[i].id + '" ><input type="number" class="form-control input-sm placeholdesize sum_cartons" style="width:30%;text-align:right;" id="cartons"  name="' + data[i].id + '"  placeholder="0"  > </td>' +
                        '<td id="total_' + data[i].id + '" class="totalbidi" align="right">' + 0 + '</td>' +
                        '<td style="display:none" class="totalbidi1" id="actotal_' + data[i].id + '" align="right">' + total_bidi_sum.toFixed(3) + '</td>' +
                        '</tr>';
                }
                foot += '<tr>' +
                    '<td style="display:none;" ></td>' +
                    '<td>Total</td>' +
                    '<td ><span id="tot_cart"style="width:30%; text-align:right;"></span></td>' +
                    '<td id="total_bidi" align="right">' +
                    '</td>' +
                    '</tr>';
                $('#product_body').append(body);
                $('#product_footer').append(foot);
            }
        });
    }

    function total_cartons() {
        var sum_cartons = 0;
        var sum_totalbidi = 0;
        var r1 = $('#product').find('tbody').find('tr');
        var r = r1.length;
        $('#product tr .sum_cartons').each(function() {
            var cartons = $(this).val();
            if (cartons == "") {
                cartons = 0;
            }
            sum_cartons = parseInt(sum_cartons) + parseInt(cartons);
        });
        $('#product tr .totalbidi').each(function() {
            var cartons = $(this).html();
            if (cartons == "") {
                cartons = 0;
            }
            sum_totalbidi = parseFloat(sum_totalbidi) + parseFloat(cartons);
        });
        $("#tot_cart").text(sum_cartons.toFixed(3));
        $("#total_bidi").text(sum_totalbidi.toFixed(3));


        // alert(sum_cartons);
    }

    function mul_cartons() {

        var r1 = $('#product').find('tbody').find('tr');
        var r = r1.length;

        $('#product tr .totalbidi').each(function() {
            var cartons2 = $(this).val();

            var id = $(this).attr('name');

            var bidi = $('#total_' + id).html();

            if (cartons2 == "") {
                cartons2 = 1;
            }

            tot_bidi = parseInt(cartons2) * parseInt(bidi);
            // alert(tot_bidi.toFixed(3));
        });

        $('#total_' + id).html(tot_bidi.toFixed(3));

    }

    $(document).on("submit", "#master_form", function(e) {
        e.preventDefault();
        table_name = "finished_product";

        var date1 = $('#date').val();
        var label_id;
        var cartons;
        var total_bidi;
        var id = $('#save_update').val();
        var ref_id = 0;


        var fdateslt = date1.split('/');
        var date = fdateslt[2] + '-' + fdateslt[1] + '-' + fdateslt[0];
        $.ajax({
            type: "POST",
            url: baseurl + "Finished_product/getmaxid",

            data: {

                table_name: table_name
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                ref_id = data;
                $('#btnprint').val(ref_id);
            }
        });


        var row = $('#product').find('tbody').find('tr');
        var r = row.length;
        for (var i = 0; i < r; i++) {
            label_id = $(row[i]).find('td:eq(0)').html();
            cartons = $(row[i]).find("td:eq(2) input[type='number']").val();
            total_bidi = $(row[i]).find('td:eq(3)').html();

            $.ajax({
                type: "POST",
                url: baseurl + "Finished_product/adddata",

                data: {
                    id: id,
                    date: date,
                    total_bidi: total_bidi,
                    ref_id: ref_id,
                    cartons: cartons,
                    label_id: label_id,
                    table_name: table_name
                },
                dataType: "JSON",
                async: false,
                success: function() {



                }

            });


        }


        if (id != "") {
            successTost("Data Update Successfully");
        } else {
            successTost("Data Save Successfully");
        }
        $('#master_form')[0].reset();
        $('#product tr .sum_cartons').val(0);
        $("#tot_cart").text('');
        $('.formhideshow').hide();
        $('.tablehideshow').show();
        $(".btnhideshow").show();
        defaultdate();

        //latestdata();
        //formdata();
        $('.closehideshow').trigger('click');
        datashow();






    });
    //----------------------submit form code end------------------------------
    datashow();
    //----------------show data in the tabale code start-----------------------
    function datashow() {
        table_name = "finished_product";
        var date2 = $('#date2').val();
        var date3 = $('#date3').val();
        var fdateslt = date2.split('/');
        var date = fdateslt[2] + '-' + fdateslt[1] + '-' + fdateslt[0];
        var fdateslt = date3.split('/');
        var date1 = fdateslt[2] + '-' + fdateslt[1] + '-' + fdateslt[0];
        var where = date;
        var where1 = date1;
        $.ajax({
            type: "POST",
            url: baseurl + "Finished_product/showdata",
            data: {
                table_name: table_name,
                where: where,
                where1: where1
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                // console.log('data'+data);
                var data = eval(data);


                var html = '';
                html += '<table id="myTable" class="table table-striped">' +
                    '<thead>' +
                    '<tr>' +
                    '<th><font style="font-weight:bold">Date</font></th>' +
                    '<th><font style="font-weight:bold">Batch Name</font></th>' +
                    '<th><font style="font-weight:bold">No. of Cartons</font></th>' +
                    '<th><font style="font-weight:bold">Total Bidi</font></th>' +
                    '<th style="display:none;"><font style="font-weight:bold">ref_id</font></th>' +
                    '<th class="not-export-column"><font style="font-weight:bold">Operations</font></th>' +

                    '</tr>' +
                    '</thead>' +
                    '<tbody>';
                var sum_cartons = 0;
                var sum_total_bidi = 0;
                for (var i = 0; i < data.length; i++) {
                    var bidi = data[i].bidi;
                    var cbidi = data[i].cbidi;
                    var tot = parseFloat(bidi) + parseFloat(cbidi);
                    // alert(tot);
                    sum_cartons = parseFloat(sum_cartons) + parseFloat(data[i].cartons);
                    sum_total_bidi = parseFloat(sum_total_bidi) + parseFloat(data[i].total_bidi);
                    var fdateval = data[i].date;
                    var fdateslt = fdateval.split('-');
                    var date = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];
                    html += '<tr>' +
                        '<td id="date_' + data[i].ref_id + '">' + date + '</td>' +
                        '<td id="batch_' + data[i].ref_id + '">' + data[i].lablenm + '</td>' +
                        '<td id="cartons_' + data[i].ref_id + '">' + data[i].cartons + '</td>' +
                        '<td id="total_bidi_' + data[i].ref_id + '">' + data[i].total_bidi + '</td>' +
                        '<td style="display:none;" id="ref_id_' + data[i].id + '">' + tot.toFixed(3) + '</td>' +
                        '<td class="not-export-column" ><button name="edit" value="edit" class="edit_data btn btn-xs btn-success" id=' + data[i].ref_id + '><i class="fa fa-edit"></i></button>&nbsp;<button name="delete" value="Delete" class="delete_data btn btn-xs btn-danger" id=' + data[i].ref_id + '><i class="fa fa-trash"></i></button></td>' +
                        '</tr>';

                }
                html += '</tbody>' +
                    '<tfoot>' +
                    '<tr>' +
                    '<td class="boldness">Total</td>' +
                    '<td class="boldness"></td>' +
                    '<td class="boldness">' + sum_cartons + '</td>' +
                    '<td class="boldness">' + sum_total_bidi.toFixed(3) + '</td>' +
                    '<td class="boldness"></td>' +
                    '</tr>' +
                    '</tfoot>' +
                    '</table>';

                $('#show_master').html(html);
                $('#myTable').DataTable({
                    dom: 'Bfrtip',
                    buttons: [{
                            extend: 'pdfHtml5',
                            title: 'DB Stock-Finished Product',
                            //orientation: 'landscape',
                            pageSize: 'A4',
                            exportOptions: {
                                columns: [0, 1, 2, 3]
                            },
                        },
                        {
                            title: 'DB Stock-Finished Product',
                            extend: 'excelHtml5',
                            exportOptions: {
                                columns: [0, 1, 2, 3]
                            }
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
        //var id1 = $('#ref_id_' + id).html();


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
                        url: baseurl + "Finished_product/deletedata",
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


        var date = $('#date_' + id).html();

        $('#date').val(date);
        var body = '';
        $.ajax({
            type: "POST",
            url: baseurl + "Finished_product/editdata",
            dataType: "JSON",
            data: {
                id: id,
                table_name: table_name,
            },
            success: function(data) {
                var data = eval(data);
                console.log(data);
                // alert(data.length);
                for (var i = 0; i < data.length; i++) {
                    var bidi = data[i].bidi;
                    var cbidi = data[i].cbidi;
                    var tot = parseFloat(bidi) + parseFloat(cbidi);


                    /*    body += '<tr>' +
                            '<td style="display:none;" id="id_' + data[i].id + '">' + data[i].label_id + '</td>' +
                            '<td id="lbl_' + id + '">' + data[i].lablenm + '</td>' +
                            '<td id="cartons_' + id + '" ><input type="number" class="form-control input-sm placeholdesize sum_cartons" id="cartons" value=' + data[i].cartons + ' name="cartons"  placeholder="Cartons"  > </td>' +
                            '<td id="total_' + id + '" align="right">' + data[i].total_bidi + '</td>' +

                            '</tr>';*/
                    body += '<tr>' +
                        '<td style="display:none;" id="id_' + data[i].id + '">' + data[i].label_id + '</td>' +
                        '<td id="lbl_' + data[i].id + '">' + data[i].lablenm + '</td>' +
                        '<td id="cartons_' + data[i].id + '" ><input type="number" class="form-control input-sm placeholdesize sum_cartons" style="width:30%;text-align:right;" value=' + data[i].cartons + ' id="cartons"  name="' + data[i].id + '"  placeholder="0"  > </td>' +
                        '<td id="total_' + data[i].id + '" class="totalbidi" align="right">' + data[i].total_bidi + '</td>' +
                        '<td style="display:none"id="actotal_' + data[i].id + '" align="right">' + tot.toFixed(3) + '</td>' +

                        '</tr>';
                }

                $('#product_body').html(body);
                total_cartons();
            }
        });






        $('#save_update').val(id);


    });
});