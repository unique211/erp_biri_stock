$(document).ready(function() {
    var table_name = "tobaccomix_master";
    //submit form code start


    defaultdate();
    formdata();
    formdata2();
    latestdata();
    var total_bidi_sum = 1;


    function latestdata() {


        $.ajax({
            type: "POST",
            url: baseurl + "Tob_Mix/filtertoday",
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
                        var fdateval = data[i].date;
                        var fdateslt = fdateval.split('-');
                        var fdate = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];
                    }

                }
                if (fdateval == null) {
                    defaultdate();
                } else {
                    $("#date2").val(fdate);
                }

            }
        });
    }
    $(document).on("change", "#date2", function() {

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

        $('#tab1 tr .sum_unit1').val(0);
        $('#tab1 tr .sum_bag1').val(0);
        //  $("#tab1_body").html('');
        //   $("#tab1_body").html('');
        $("#tot_bag1").html('');
        $("#tot_bag2").html('');
        $("#tot_unit1").html('');
        $("#tot_unit2").html('');
        //  latestdata();

        // formdata();
        // formdata2();
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
        table_name = "batch_wise_stock";


        $.ajax({
            type: "POST",
            url: baseurl + "Tob_Mix/formdata",
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

                $(document).on("blur", ".sum_unit1", function() {
                    total_cartons();
                });
                $(document).on("blur", ".sum_bag1", function() {
                    total_cartons();
                });

                for (var i = 0; i < data.length; i++) {



                    body += '<tr>' +
                        '<td style="display:none;" id="id_' + data[i].id + '">' + data[i].id + '</td>' +
                        '<td id="lbl_' + data[i].id + '">' + data[i].batch + '</td>' +
                        '<td id="cartons_' + data[i].id + '" style=" text-align:right;" ><input type="text" class="form-control input-sm placeholdesize sum_unit1" style="width:50%;text-align:right;" id="cartons"  name="' + data[i].id + '"  placeholder="0"  > </td>' +
                        '<td id="total_' + data[i].id + '" style=" text-align:right;" ><input type="number" class="form-control input-sm placeholdesize sum_bag1" style="width:50%;text-align:right;" id="cartons"  name="' + data[i].id + '"  placeholder="0"  > </td>' +


                        '</tr>';



                }

                foot += '<tr>' +
                    '<td style="display:none;" ></td>' +
                    '<td>Total</td>' +
                    '<td ><span id="tot_unit1"style="width:30%; text-align:right;"></span></td>' +
                    '<td ><span id="tot_bag1"style="width:30%; text-align:right;"></span></td>' +


                    '</tr>';
                // html += '</tbody></table>';

                $('#tab1_body').append(body);
                $('#tab1_footer').append(foot);

            }
        });
    }

    function formdata2() {
        table_name = "raw_batch_master";
        var where = "Tobacco Mixture";
        $.ajax({
            type: "POST",
            url: baseurl + "Tob_Mix/formdata2",
            data: {
                table_name: table_name,
                where: where,
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                // console.log('data'+data);
                var data = eval(data);
                var body = '';
                var foot = '';
                sum_total_bidi = 0;

                $(document).on("blur", ".sum_unit2", function() {

                    total_cartons();

                });
                $(document).on("blur", ".sum_bag2", function() {

                    total_cartons();

                });


                for (var i = 0; i < data.length; i++) {



                    body += '<tr>' +
                        '<td style="display:none;" id="id_' + data[i].id + '">' + data[i].id + '</td>' +
                        '<td id="lbl_' + data[i].id + '">' + data[i].batch + '</td>' +
                        '<td id="cartons_' + data[i].id + '" style=" text-align:right;" ><input type="text" class="form-control input-sm placeholdesize sum_unit2" style="width:50%;text-align:right;" id="sum_unit2"  name="' + data[i].id + '"  placeholder="0"  > </td>' +
                        '<td id="total_' + data[i].id + '" style=" text-align:right;" ><input type="number" class="form-control input-sm placeholdesize sum_bag2" style="width:50%;text-align:right;" id="sum_bag2"  name="' + data[i].id + '"  placeholder="0"  > </td>' +
                        '</tr>' +
                        '<tr>' +
                        '<td  id="id_' + data[i].id + '">Short/ Excess</td>' +
                        '<td id="cartons_' + data[i].id + '" style=" text-align:right;" ><input type="text" class="form-control input-sm placeholdesize sum_unit3" style="width:50%;text-align:right;" id="cartons"  name="' + data[i].id + '"  placeholder="0" disabled > </td>' +
                        '<td id="total_' + data[i].id + '" style=" text-align:right;" ><input type="text" class="form-control input-sm placeholdesize sum_bag3" style="width:50%;text-align:right;" id="cartons"  name="' + data[i].id + '"  placeholder="0" disabled > </td>' +

                        '</tr>';


                }

                foot += '<tr>' +
                    '<td style="display:none;" ></td>' +
                    '<td>Total</td>' +
                    '<td ><span id="tot_unit2"style="width:30%; text-align:right;"></span></td>' +
                    '<td ><span id="tot_bag2"style="width:30%; text-align:right;"></span></td>' +


                    '</tr>';
                // html += '</tbody></table>';

                $('#tab2_body').append(body);
                $('#tab2_footer').append(foot);

            }
        });
    }

    function total_cartons() {

        var sum_unit1 = 0;
        var sum_bags1 = 0;
        var r1 = $('#tab1').find('tbody').find('tr');
        var r = r1.length;

        $('#tab1 tr .sum_unit1').each(function() {
            var sum_unit1_val = $(this).val();
            if (sum_unit1_val == "") {
                sum_unit1_val = 0;
            }
            sum_unit1 = parseInt(sum_unit1) + parseInt(sum_unit1_val);
            $("#tot_unit1").text(sum_unit1.toFixed(3));
            $("#tot_unit2").text(sum_unit1.toFixed(3));
        });
        $('#tab1 tr .sum_bag1').each(function() {
            var sum_bags1_val = $(this).val();
            if (sum_bags1_val == "") {
                sum_bags1_val = 0;
            }
            sum_bags1 = parseInt(sum_bags1) + parseInt(sum_bags1_val);
            $("#tot_bag1").text(sum_bags1);
            $("#tot_bag2").text(sum_bags1);
        });
        $('#tab2 tr .sum_unit2').each(function() {
            var sum_unit2_val = $(this).val();
            var tot_unit = $("#tot_unit2").html();

            if (sum_unit2_val == "") {
                sum_unit2_val = 0;
            }
            //alert(sum_unit1);
            total = parseInt(sum_unit2_val) - parseInt(tot_unit);
            $(".sum_unit3").val(total.toFixed(3));

        });
        $('#tab2 tr .sum_bag2').each(function() {
            var sum_bag2_val = $(this).val();
            var tot_bag = $("#tot_bag2").html();

            if (sum_bag2_val == "") {
                sum_bag2_val = 0;
            }
            //alert(sum_unit1);
            total = parseInt(sum_bag2_val) - parseInt(tot_bag);

            $(".sum_bag3").val(total);

        });




    }

    $(document).on("submit", "#master_form", function(e) {
        e.preventDefault();
        table_name = "tobaccomix_master";
        var date1 = $('#date').val();
        var batch = 0;
        var unit = $('#sum_unit2').val();
        var alt_bag = $('#sum_bag2').val();
        var labour_charge = $('#lab').val();
        var id = $('#save_update').val();


        var fdateslt = date1.split('/');
        var date = fdateslt[2] + '-' + fdateslt[1] + '-' + fdateslt[0];
        var row = $('#tab2').find('tbody').find('tr');
        var r = row.length;
        for (var i = 0; i < r; i++) {
            batch = $(row[0]).find('td:eq(0)').html();

        }
        $.ajax({
            type: "POST",
            url: baseurl + "Tob_Mix/adddata",

            data: {
                id: id,
                date: date,
                batch: batch,
                unit: unit,
                alt_bag: alt_bag,
                labour_charge: labour_charge,
                table_name: table_name
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                var ref_id = 0;
                var batch = 0;
                var unit = 0;
                var alt_bag = 0;

                if (id == "") {
                    ref_id = data;
                } else {
                    ref_id = id;
                }

                var r1 = $('table#tab1').find('tbody').find('tr');
                var r = r1.length;

                table_name = "tobaccomix_data";


                for (var i = 0; i < r; i++) {

                    batch = $(r1[i]).find('td:eq(0)').html();
                    unit = $(r1[i]).find("td:eq(2) input[type='number']").val();
                    alt_bag = $(r1[i]).find("td:eq(3) input[type='number']").val();


                    $.ajax({
                        type: "POST",
                        url: baseurl + "Tob_Mix/adddata1",

                        data: {
                            id: id,
                            ref_id: ref_id,
                            batch: batch,
                            unit: unit,
                            alt_bag: alt_bag,
                            table_name: table_name
                        },
                        dataType: "JSON",
                        async: false,
                        success: function() {

                        }

                    });
                }
            }




        });







        if (id != "") {
            successTost("Data Update Successfully");
        } else {
            successTost("Data Save Successfully");
        }
        $('#master_form')[0].reset();

        $("#tot_unit1").text('');
        $("#tot_unit2").text('');
        $("#tot_bag1").text('');
        $("#tot_bag2").text('');
        $('.formhideshow').hide();
        $('.tablehideshow').show();
        $(".btnhideshow").show();
        defaultdate();
        datashow();
        //latestdata();
        //formdata();
        $('.closehideshow').trigger('click');







    });
    //----------------------submit form code end------------------------------
    datashow();
    //----------------show data in the tabale code start-----------------------
    function datashow() {
        table_name = "tobaccomix_master";
        var date2 = $('#date2').val();
        var fdateslt = date2.split('/');
        var date = fdateslt[2] + '-' + fdateslt[1] + '-' + fdateslt[0];
        var where = date;
        $.ajax({
            type: "POST",
            url: baseurl + "Tob_Mix/showdata",
            data: {
                table_name: table_name,
                where: where,

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
                    '<th><font style="font-weight:bold">Batch</font></th>' +
                    '<th style="display:none;"><font style="font-weight:bold">batch id</font></th>' +
                    '<th><font style="font-weight:bold">Unit (Kg)</font></th>' +
                    '<th><font style="font-weight:bold">Alternative Unit Bags</font></th>' +
                    '<th><font style="font-weight:bold">Labour Charges</font></th>' +
                    '<th style="display:none;"><font style="font-weight:bold">ref_id</font></th>' +
                    '<th class="not-export-column"><font style="font-weight:bold">Operations</font></th>' +

                    '</tr>' +
                    '</thead>' +
                    '<tbody>';
                for (var i = 0; i < data.length; i++) {

                    var fdateval = data[i].date;
                    var fdateslt = fdateval.split('-');
                    var date = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];
                    html += '<tr>' +
                        '<td id="date_' + data[i].id + '">' + date + '</td>' +
                        '<td id="batch_' + data[i].id + '">' + data[i].batch_name + '</td>' +
                        '<td style="display:none;" id="batch_id_' + data[i].id + '">' + data[i].batch + '</td>' +
                        '<td id="unit_' + data[i].id + '">' + data[i].unit + '</td>' +
                        '<td id="alt_bag_' + data[i].id + '">' + data[i].alt_bag + '</td>' +
                        '<td id="labor_charge_' + data[i].id + '">' + data[i].labor_charge + '</td>' +
                        '<td style="display:none;" id="ref_id_' + data[i].id + '">' + data[i].id + '</td>' +
                        '<td class="not-export-column" ><button name="edit" value="edit" class="edit_data btn btn-xs btn-success" id=' + data[i].id + '><i class="fa fa-edit"></i></button>&nbsp;<button name="delete" value="Delete" class="delete_data btn btn-xs btn-danger" id=' + data[i].id + '><i class="fa fa-trash"></i></button></td>' +
                        '</tr>';

                }
                html += '</tbody></table>';

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
        table_name = "tobaccomix_master";
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
                        url: baseurl + "Tob_Mix/deletedata",
                        dataType: "JSON",
                        data: {
                            id: id1,
                            table_name: table_name,
                        },
                        success: function(data) {

                            table_name = "tobaccomix_data";
                            $.ajax({
                                type: "POST",
                                url: baseurl + "Tob_Mix/deletedata",
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
        //   $('#file_info_tbody').html('');
        var id = $(this).attr('id');
        var date1 = $('#date_' + id).html();
        var unit = $('#unit_' + id).html();
        var alt_bag = $('#alt_bag_' + id).html();
        var labour_charge = $('#labor_charge_' + id).html();


        $('#date').val(date1);
        $('#sum_unit2').val(unit).trigger('blur');
        $('#sum_bag2').val(alt_bag).trigger('blur');
        $('#lab').val(labour_charge);
        $('#save_update').val(id);


        table_name = "tobaccomix_data";
        $.ajax({
            type: "POST",
            url: baseurl + "Tob_Mix/fetch_data",
            dataType: "JSON",
            data: {
                id: id,
                table_name: table_name,
            },
            success: function(data) {

                var data = eval(data);

                var r = data.length;
                $("#tab1_body").html('');
                $("#tab1_footer").html('');


                var body = "";
                var foot = "";
                for (var i = 0; i < r; i++) {

                    body += '<tr>' +
                        '<td style="display:none;" id="id_' + data[i].id + '">' + data[i].batch + '</td>' +
                        '<td id="lbl_' + data[i].id + '">' + data[i].batch_name + '</td>' +
                        '<td id="cartons_' + data[i].id + '" style=" text-align:right;" ><input type="text" class="form-control input-sm placeholdesize sum_unit1" style="width:50%;text-align:right;" id="cartons"value="' + data[i].unit + '"  name="' + data[i].id + '"  placeholder="0"  > </td>' +
                        '<td id="total_' + data[i].id + '" style=" text-align:right;" ><input type="number" class="form-control input-sm placeholdesize sum_bag1" style="width:50%;text-align:right;" id="cartons" value="' + data[i].alt_bag + '" name="' + data[i].id + '"  placeholder="0"  > </td>' +


                        '</tr>';

                    // alert(table);

                }
                foot += '<tr>' +
                    '<td style="display:none;" ></td>' +
                    '<td>Total</td>' +
                    '<td ><span id="tot_unit1"style="width:30%; text-align:right;"></span></td>' +
                    '<td ><span id="tot_bag1"style="width:30%; text-align:right;"></span></td>' +


                    '</tr>';

                $('#tab1_body').html(body);
                $('#tab1_footer').html(foot);

                total_cartons();
                //  alert(row_id);
            }

        });
    });
});