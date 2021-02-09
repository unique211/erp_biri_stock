$(document).ready(function() {
    var table_name = "cont_adj";
    var tobacco_rate = 0;
    var leaves_rate = 0;
    var bl_yarn_rate = 0;
    var wh_yarn_rate = 0;
    var filter_rate = 0;

    defaultdate();
    latestdata();

    function latestdata() {


        $.ajax({
            type: "POST",
            url: baseurl + "Cont_adj/filtertoday",
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
                $("#date2").val(fdate);

            }
        });
    }
    $(document).on("change", "#cont_name", function() {
        //alert("change");
        //var table_name='con-party_master';
        var contractor = $('#cont_name').val();
        var date = $('#tdate').val();
        var fdateslt = date.split('/');
        var cdate = fdateslt[2] + '-' + fdateslt[1] + '-' + fdateslt[0];
        $.ajax({
            type: "POST",
            url: baseurl + "Cont_adj/showCustomer",
            data: {
                contractor: contractor,
                date: cdate
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                var data = eval(data);
                console.log(data);
                html = '';
                var index = 1;
                var Tsum = 0;
                var Lsum = 0;
                var bsum = 0;
                var wsum = 0;
                var fsum = 0;
                var nm = '';
                html = '<div class="col-lg-12"><table id="file_info1" class="table table-striped" width="100%" cellspacing="0"><thead id="thead"><tr><th width="10%">SL No</th><th width="20%">Contractor Name</th><th width="10%">Time</th><th width="10%">Batch</th><th width="10%">Tobacco</th><th width="10%">Leaves</th><th width="10%">Black Yarn</th><th width="10%">White Yarn</th><th width="10%">Filter</th></thead> <tbody id="tbody">';
                var val = 0;
                var row = 0;
                var flag = 0;
                for (var i = 1; i < data.length; i++) {
                    row = data.length;
                    //console.log(row);
                    if ((row - 1) == i) {
                        flag = 1;
                        console.log("flag is" + flag);
                    }
                    var contractoe = data[i].bname;
                    if (contractoe != null) {
                        if (nm != data[i].bname) {
                            nm = data[i].bname;
                            if (val != 0) { //
                                html += '<tr class="trs">' +
                                    '<td></td><td></td><td></td><td></td><td class="names">' + Tsum.toFixed(3) + '</td><td class="names">' + Lsum.toFixed(3) + '</td><td class="names">' + bsum.toFixed(3) + '</td><td class="names">' + wsum.toFixed(3) + '</td><td class="names">' + fsum.toFixed(3) + '</td></tr><tr></tr>';
                                index += 1;
                                val = val + 1;
                            } else {
                                html += '<tr></tr>';
                                val++;
                            }
                            Tsum = 0;
                            Lsum = 0;
                            bsum = 0;
                            wsum = 0;
                            fsum = 0;
                            Tsum = parseFloat(Tsum) + parseFloat(data[i].name.tobacco);
                            Lsum = parseFloat(Lsum) + parseFloat(data[i].name.leaves);
                            bsum = parseFloat(bsum) + parseFloat(data[i].name.black_yarn);
                            wsum = parseFloat(wsum) + parseFloat(data[i].name.white_yarn);
                            fsum = parseFloat(fsum) + parseFloat(data[i].name.filter);
                            html += '<tr>' +
                                '<td>' + index + '</td>' +
                                '<td>' + data[i].bname + '</td>' +
                                '<td>' + data[i].count + '</td>' +
                                '<td>' + data[i].name.batchName + '</td>' +
                                '<td>' + data[i].name.tobacco + '</td>' +
                                '<td>' + data[i].name.leaves + '</td>' +
                                '<td>' + data[i].name.black_yarn + '</td>' +
                                '<td>' + data[i].name.white_yarn + '</td>' +
                                '<td>' + data[i].name.filter + '</td>' +
                                '</tr>';

                        } else {
                            Tsum = parseFloat(Tsum) + parseFloat(data[i].name.tobacco);
                            Lsum = parseFloat(Lsum) + parseFloat(data[i].name.leaves);
                            bsum = parseFloat(bsum) + parseFloat(data[i].name.black_yarn);
                            wsum = parseFloat(wsum) + parseFloat(data[i].name.white_yarn);
                            fsum = parseFloat(fsum) + parseFloat(data[i].name.filter);
                            html += '<tr>' +
                                '<td>' + '</td>' +
                                '<td>' + '</td>' +
                                '<td>' + '</td>' +
                                '<td>' + data[i].name.batchName + '</td>' +
                                '<td>' + data[i].name.tobacco + '</td>' +
                                '<td>' + data[i].name.leaves + '</td>' +
                                '<td>' + data[i].name.black_yarn + '</td>' +
                                '<td>' + data[i].name.white_yarn + '</td>' +
                                '<td>' + data[i].name.filter + '</td>' +
                                '</tr>';
                        }
                    } else {}
                    if (flag == 1) {
                        console.log(flag + " is the flag ??");
                        html += '<tr class="trs">' +
                            '<td></td><td></td><td></td><td></td><td class="names">' + Tsum.toFixed(3) + '</td><td class="names">' + Lsum.toFixed(3) + '</td><td class="names">' + bsum.toFixed(3) + '</td><td class="names">' + wsum.toFixed(3) + '</td><td class="names">' + fsum.toFixed(3) + '</td></tr><tr></tr>';
                        index += 1;
                        val = val + 1;
                    }
                }
                $('#tbody').html(html);
                html += '<tfoot id="tfoot"></tfoot></table></div><br/> ';
                $('#div').html(html);
                //Total();
            }
        });
    });
    $(document).on("change", "#date2", function() {

        datashow();
    });
    $(document).on("change", "#batch", function() {

        var table_name = "rate_master";
        var id = $(this).val();

        $.ajax({
            type: "POST",
            url: baseurl + "Cont_adj/fetch_batch",
            dataType: "JSON",
            data: {
                id: id,
                table_name: table_name,

            },
            success: function(data) {
                var data = eval(data);
                for (var i = 0; i < data.length; i++) {
                    tobacco_rate = data[i].tobacco;
                    leaves_rate = data[i].leaves;
                    bl_yarn_rate = data[i].bl_sutta;
                    wh_yarn_rate = data[i].wh_sutta;
                    filter_rate = data[i].filter;

                    // mul();
                    /* $('#tobacco2').val(tobacco_rate);
                     $('#leaves2').val(leaves_rate);
                     $('#bl_yarn2').val(bl_yarn_rate);
                     $('#wh_yarn2').val(wh_yarn_rate);
                     $('#filter2').val(filter_rate);*/

                }


            }
        });


    });


    function mul() {
        var tobacco = parseFloat($('#tobacco').val());
        var leaves = parseFloat($('#leaves').val());
        var bl_yarn = parseFloat($('#bl_yarn').val());
        var wh_yarn = parseFloat($('#wh_yarn').val());
        var filter = parseFloat($('#filter').val());

        tobacco_mul = parseFloat(tobacco_rate * tobacco);
        leaves_mul = parseFloat(leaves_rate * leaves);
        bl_yarn_mul = parseFloat(bl_yarn_rate * bl_yarn);
        wh_yarn_mul = parseFloat(wh_yarn_rate * wh_yarn);
        filter_mul = parseFloat(filter_rate * filter);
        tobacco_mul = Math.round(tobacco_mul);
        $('#tobacco2').val(tobacco_mul.toFixed(3));
        leaves_mul = Math.round(leaves_mul);
        $('#leaves2').val(leaves_mul.toFixed(3));
        bl_yarn_mul = Math.round(bl_yarn_mul);
        $('#bl_yarn2').val(bl_yarn_mul.toFixed(3));
        wh_yarn_mul = Math.round(wh_yarn_mul);
        $('#wh_yarn2').val(wh_yarn_mul.toFixed(3));
        filter_mul = Math.round(filter_mul);
        $('#filter2').val(filter_mul.toFixed(3));


    }

    $("#tobacco").keyup(function() {
        mul();
    });
    $("#leaves").keyup(function() {
        mul();
    });
    $("#bl_yarn").keyup(function() {
        mul();
    });
    $("#wh_yarn").keyup(function() {
        mul();
    });
    $("#filter").keyup(function() {
        mul();
    });




    function defaultdate() {
        var table_name = "weekly_adjustment";

        $.ajax({
            type: "POST",
            url: baseurl + "Weekly_adjustment/showdata",
            data: {
                table_name: table_name,
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                var data = eval(data);
                for (var i = 0; i < data.length; i++) {

                    var fdateval = data[i].to_date;
                    var fdateslt = fdateval.split('-');
                    var tdate = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];



                }
               
                $('#tdate').val(tdate);
            }
        });

    }

    $(".btnhideshow").click(function() {
        $('#btnsave').text('Save');

        $(".formhideshow").show();
        // $(".tablehideshow").hide();
        $(".btnhideshow").hide();
        defaultdate();
    });
    var selectdata="";
    $(".closehideshow").click(function() {
        $('#master_form')[0].reset();
        $('#save_update').val("");
        $('#cont_name').val("").trigger('change');
        $(".btnhideshow").hide();
        $(".tablehideshow").show();
        $(".formhideshow").show();
        $('#file_info1').html('');
        defaultdate();
        $('#btnsave').text('Save');
        if(selectdata !=""){
            $('#tdate').val(selectdata);
        }

    });


    //submit form code start
    $(document).on("submit", "#master_form", function(e) {
        e.preventDefault();

        var date1 = $('#tdate').val();
        var contractor = $('#cont_name').val();
        var batch = $('#batch').val();
        var tobacco = $('#tobacco').val();
        var leaves = $('#leaves').val();
        var bl_yarn = $('#bl_yarn').val();
        var wh_yarn = $('#wh_yarn').val();
        var filter = $('#filter').val();
        var tobacco1 = $('#tobacco2').val();
        var leaves1 = $('#leaves2').val();
        var bl_yarn1 = $('#bl_yarn2').val();
        var wh_yarn1 = $('#wh_yarn2').val();
        var filter1 = $('#filter2').val();
        var id = $('#save_update').val();
        //alert(tobacco1+leaves1);
        selectdata=date1;
        var fdateslt = date1.split('/');
        var date = fdateslt[2] + '-' + fdateslt[1] + '-' + fdateslt[0];

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
                url: baseurl + "Cont_adj/adddata",

                data: {
                    id: id,
                    date: date,
                    contractor: contractor,
                    batch: batch,
                    tobacco: tobacco,
                    leaves: leaves,
                    bl_yarn: bl_yarn,
                    wh_yarn: wh_yarn,
                    filter: filter,
                    tobacco1: tobacco1,
                    leaves1: leaves1,
                    bl_yarn1: bl_yarn1,
                    wh_yarn1: wh_yarn1,
                    filter1: filter1,
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
    //----------------show data in the tabale code start-----------------------
    function datashow() {
        var date2 = $('#date2').val();
        var fdateslt = date2.split('/');
        var date = fdateslt[2] + '-' + fdateslt[1] + '-' + fdateslt[0];
        var where = date;

        $.ajax({
            type: "POST",
            url: baseurl + "Cont_adj/filterdate",
            data: {
                where: where,
                table_name: table_name,

            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                // console.log('data'+data);
                var data = eval(data);

                var sum_tobacco = 0;
                var sum_leaves = 0;
                var sum_bl_yarn = 0;
                var sum_wh_yarn = 0;
                var sum_filter = 0;

                var html = '';
                html += '<table id="myTable" class="table table-striped">' +
                    '<thead>' +
                    '<tr>' +
                    '<th><font style="font-weight:bold">Date </font></th>' +
                    '<th><font style="font-weight:bold">Contractor Name</font></th>' +
                    '<th style="display:none;"><font style="font-weight:bold">contractor id. </font></th>' +
                    '<th style="display:none;"><font style="font-weight:bold">batch id. </font></th>' +
                    '<th><font style="font-weight:bold">Batch</font></th>' +
                    '<th><font style="font-weight:bold">Tobacco</font></th>' +
                    '<th><font style="font-weight:bold">Leaves </font></th>' +
                    '<th><font style="font-weight:bold">Black Yarn</font></th>' +
                    '<th><font style="font-weight:bold">White Yarn</font></th>' +
                    '<th><font style="font-weight:bold">Filter</font></th>' +
                    '<th style="display:none;"><font style="font-weight:bold">Tobacco Amt</font></th>' +
                    '<th style="display:none;"><font style="font-weight:bold">Leaces Amt</font></th>' +
                    '<th style="display:none;"><font style="font-weight:bold">BY Amt</font></th>' +
                    '<th style="display:none;"><font style="font-weight:bold">WY amt</font></th>' +
                    '<th style="display:none;"><font style="font-weight:bold">Fil Amt</font></th>' +
                    '<th><font style="font-weight:bold">Operations </font></th> ' +

                    '</tr>' +
                    '</thead>' +
                    '<tbody>';
                for (var i = 0; i < data.length; i++) {

                    var fdateval = data[i].date;
                    var fdateslt = fdateval.split('-');
                    var date = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];

                    var sum_tobacco = parseFloat(sum_tobacco) + parseFloat(data[i].tobacco);
                    var sum_leaves = parseFloat(sum_leaves) + parseFloat(data[i].leaves);
                    var sum_bl_yarn = parseFloat(sum_bl_yarn) + parseFloat(data[i].bl_yarn);
                    var sum_wh_yarn = parseFloat(sum_wh_yarn) + parseFloat(data[i].wh_yarn);
                    var sum_filter = parseFloat(sum_filter) + parseFloat(data[i].filter);

                    html += '<tr>' +
                        '<td id="date_' + data[i].id + '">' + date + '</td>' +
                        '<td id="contractor2_' + data[i].id + '">' + data[i].co_name + '</td>' +
                        '<td style="display:none;" id="contractor_' + data[i].id + '">' + data[i].contractor + '</td>' +
                        '<td style="display:none;" id="batch_' + data[i].id + '">' + data[i].batch + '</td>' +
                        '<td id="batch2_' + data[i].id + '">' + data[i].batchname + '</td>' +
                        '<td id="tobacco_' + data[i].id + '">' + data[i].tobacco + '</td>' +
                        '<td id="leaves_' + data[i].id + '">' + data[i].leaves + '</td>' +
                        '<td id="bl_yarn_' + data[i].id + '">' + data[i].bl_yarn + '</td>' +
                        '<td id="wh_yarn_' + data[i].id + '">' + data[i].wh_yarn + '</td>' +
                        '<td id="filter_' + data[i].id + '">' + data[i].filter + '</td>' +
                        '<td style="display:none;" id="tobamt_' + data[i].id + '">' + data[i].tobacco_amt + '</td>' +
                        '<td style="display:none;" id="levamt_' + data[i].id + '">' + data[i].leaves_amt + '</td>' +
                        '<td style="display:none;" id="blyamt_' + data[i].id + '">' + data[i].bl_yarn_amt + '</td>' +
                        '<td style="display:none;" id="whyamt_' + data[i].id + '">' + data[i].wh_yarn_amt + '</td>' +
                        '<td style="display:none;" id="filamt_' + data[i].id + '">' + data[i].filter_amt + '</td>' +
                        //  '<td class="not-export-column" ><button name="edit" value="edit" class="edit_data btn btn-xs btn-success" id=' + data[i].id + '><i class="fa fa-edit"></i></button>&nbsp;<button name="delete" value="Delete" class="delete_data btn btn-xs btn-danger" id=' + data[i].id + '><i class="fa fa-trash"></i></button></td>' +
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
                html += '</tbody><tfoot>' +
                    '<tr>' +
                    '<td>Total</td>' +
                    '<td></td>' +
                    '<td style="display:none;">0</td>' +
                    '<td style="display:none;">0</td>' +
                    '<td></td>' +
                    '<td>' + sum_tobacco.toFixed(3) + '</td>' +
                    '<td>' + sum_leaves.toFixed(3) + '</td>' +
                    '<td>' + sum_bl_yarn.toFixed(3) + '</td>' +
                    '<td>' + sum_wh_yarn.toFixed(3) + '</td>' +
                    '<td>' + sum_filter.toFixed(3) + '</td>' +

                    '<td></td>  </tr>  ' +

                    '</tfoot></table>';

                $('#show_master').html(html);
                $('#myTable').DataTable({
                    dom: 'Bfrtip',
                    buttons: [{
                            extend: 'pdfHtml5',
                            pageSize: 'A4',
                            //orientation: 'landscape',
                            title: 'DB Stock-Contractor Adjustment',
                            exportOptions: {
                                columns: [0, 1, 4, 5, 6, 7, 8, 9]
                            },
                        },
                        {
                            extend: 'excelHtml5',
                            title: 'DB Stock-Contractor Adjustment',
                            exportOptions: {
                                columns: [0, 1, 4, 5, 6, 7, 8, 9]
                            },
                        }
                    ]
                });

            }

        });

    }
    //------------------show data in the tabale code end-----------------------------------------------
    //-----------------------edit data code start-----------------------------------
    $(document).on("click", ".edit_data", function() {
        $('.formhideshow').show();
        $('.tablehideshow').show();
        $(".btnhideshow").hide();
        $('#btnsave').text('Update');
        var id = $(this).attr('id');
        var contractor = $('#contractor_' + id).html();
        defaultdate();
        $('#cont_name').val(contractor).trigger('change');
        $('#batch').val($('#batch_' + id).html());
        $('#tobacco').val($('#tobacco_' + id).html());
        $('#leaves').val($('#leaves_' + id).html());
        $('#bl_yarn').val($('#bl_yarn_' + id).html());
        $('#wh_yarn').val($('#wh_yarn_' + id).html());
        $('#filter').val($('#filter_' + id).html());
        $('#tobacco2').val($('#tobamt_' + id).html());
        $('#leaves2').val($('#levamt_' + id).html());
        $('#bl_yarn2').val($('#blyamt_' + id).html());
        $('#wh_yarn2').val($('#whyamt_' + id).html());
        $('#filter2').val($('#filamt_' + id).html());
        $('#save_update').val(id);
    });
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
                        url: baseurl + "Cont_adj/deletedata",
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

});