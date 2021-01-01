$(document).ready(function() {
    var table_name = "cont_issue_receive";
    defaultdate();
    latestdata();

    function latestdata() {

        $.ajax({
            type: "POST",
            url: baseurl + "Cont_IR/filtertoday",
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
                $("#date3").val(fdate);
                //alert(fdate);
                datashow();
            }
        });

    }


    $(document).on("change", "#batch", function() {

        var table_name = "batch_master";
        var id = $(this).val();

        $.ajax({
            type: "POST",
            url: baseurl + "Cont_IR/fetch_tobacco",
            dataType: "JSON",
            data: {
                id: id,
                table_name: table_name,

            },
            success: function(data) {
                var data = eval(data);
                for (var i = 0; i < data.length; i++) {
                    var tobacco_val = data[i].tobacco;
                    var tobbacco = (tobacco_val - 0.020);
                    $('#tob_wt').val(tobbacco.toFixed(3));
                    $('#batch2').val(id).trigger('change');
                }
            }
        });
    });

    function defaultdate() {
        $('.doj').datepicker({
            'todayHighlight': true,
        });
        var date = new Date();
        date = date.toString('dd/MM/yyyy');

        $("#date").val(date);
        // $("#date2").val(date);
    }

    $(".closehideshow").click(function() {
        $('#master_form')[0].reset();
        $('#save_update').val("");
        $('#batch').val("").trigger('change');
        $('#cont_name').val("").trigger('change');
        $('#checker').val("").trigger('change');
        $('#wages').val("").trigger('change');
        $('#batch2').val("").trigger('change');
        $(".btnhideshow").hide();
        $(".tablehideshow").show();
        $(".formhideshow").show();
        defaultdate();
        dateofone;
    });



    $(document).on("change", "#date2", function() {
        datashow();
    });
    $(document).on("change", "#date3", function() {
        datashow();
    });
    $('#filter').on('click', function() {
        datashow();
    });
    var dateofone;

    //submit form code start
    $(document).on("submit", "#master_form", function(e) {
        e.preventDefault();

        var date1 = $('#date').val();
        var cont_name = $('#cont_name').val();
        var checker_name = $('#checker').val();
        var batch1 = $('#batch').val();
        var asal_bidi = $('#asal_bidi').val();
        var chant_bidi_pcs = $('#chant_bidi_pcs').val();
        var chant_bidi_kgs = $('#chant_bidi_kgs').val();
        var wages = $('#wages').val();
        var qlty = $('#qlty').val();
        var tob_wt = $('#tob_wt').val();
        var batch2 = $('#batch2').val();
        var tob = $('#tobacco').val();
        var tob_bag = $('#tobacco_bag').val();
        var leaves = $('#leaves').val();
        var leaves_bag = $('#leaves_bag').val();
        var bl_yarn = $('#b_yarn').val();
        var wh_yarn = $('#w_yarn').val();
        var filter = $('#filter').val();
        var disc = $('#disk').val();
        var cartons = $('#cartons').val();
        var id = $('#save_update').val();

        var fdateslt = date1.split('/');
        var date = fdateslt[2] + '-' + fdateslt[1] + '-' + fdateslt[0];
        dateofone = date1;


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
                url: baseurl + "Cont_IR/adddata",

                data: {
                    id: id,
                    date: date,
                    cont_name: cont_name,
                    checker_name: checker_name,
                    batch1: batch1,
                    asal_bidi: asal_bidi,
                    chant_bidi_pcs: chant_bidi_pcs,
                    chant_bidi_kgs: chant_bidi_kgs,
                    wages: wages,
                    qlty: qlty,
                    tob_wt: tob_wt,
                    batch2: batch2,
                    tob: tob,
                    tob_bag: tob_bag,
                    leaves: leaves,
                    leaves_bag: leaves_bag,
                    bl_yarn: bl_yarn,
                    wh_yarn: wh_yarn,
                    filter: filter,
                    disc: disc,
                    cartons: cartons,
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
                        $('.formhideshow').show();
                        $('.tablehideshow').show();
                        $(".btnhideshow").show();
                        datashow();
                        $('.closehideshow').trigger('click');
                    } else {
                        errorTost("Data Cannot Save");
                    }

                    $('#date').val(dateofone);
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
        var date3 = $('#date3').val();
        var fdateslt = date2.split('/');
        var date = fdateslt[2] + '-' + fdateslt[1] + '-' + fdateslt[0];
        var fdateslt = date3.split('/');
        var date3 = fdateslt[2] + '-' + fdateslt[1] + '-' + fdateslt[0];
        var where = date;
        var tdate = date3;

        $.ajax({
            type: "POST",
            url: baseurl + "Cont_IR/filterdate",
            data: {
                where: where,
                tdate: tdate,
                table_name: table_name,
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                // console.log('data'+data);
                var data = eval(data);

                var sum_asal_bidi = 0;
                var sum_chant_bidi_pcs = 0;
                var sum_chant_bidi_kgs = 0;
                var sum_tob_wt = 0;
                var sum_tob = 0;
                var sum_tob_bag = 0;
                var sum_leaves = 0;
                var sum_leaves_bag = 0;
                var sum_bl_yarn = 0;
                var sum_wh_yarn = 0;
                var sum_filter = 0;
                var sum_disc = 0;
                var sum_cartons = 0;

                var html = '';
                html += '<table id="myTable" style="width:100%;table-layout:fixed;"  class="table table-striped">' +
                    '<thead>' +
                    '<tr>' +
                    '<th style="display:none;"><font style="font-weight:bold">Id</font></th>' + //0
                    '<th width="7%"><font style="font-weight:bold">Date</font></th>' + //1
                    '<th style="display:none;"><font style="font-weight:bold">contractor No. </font></th>' + //2
                    '<th width="8%"><font style="font-weight:bold">Contractor Name </font></th>' + //3
                    '<th style="display:none;"><font style="font-weight:bold">Checker Name</font></th>' + //4
                    '<th style="display:none;"><font style="font-weight:bold">Batchname </font></th>' + //5
                    '<th width="5%"><font style="font-weight:bold">Batch </font></th>' + //6
                    '<th width="5%"><font style="font-weight:bold">Asal Bidi </font></th>' + //7
                    '<th width="5%"><font style="font-weight:bold">Chant Bidi Pcs </font></th>' + //8
                    '<th width="5%"><font style="font-weight:bold">Chant Bidi Kgs </font></th> ' + //9
                    '<th style="display:none;"><font style="font-weight:bold">Wages Group </font></th>' + //10
                    '<th width="7%"><font style="font-weight:bold">Wages Group </font></th>' + //11
                    '<th style="display:none;"><font style="font-weight:bold">Quality</font></th>' + //12
                    '<th width="5%"><font style="font-weight:bold">Tobacco Weight </font></th>' + //13
                    '<th width="5%"><font style="font-weight:bold">Tobacco </font></th>' + //14
                    '<th width="5%"><font style="font-weight:bold">Tobacco Bag </font></th>' + //15
                    '<th width="5%"><font style="font-weight:bold">Leaves </font></th>' + //16
                    '<th style="display:none;"><font style="font-weight:bold">Batch </font></th>' + //17
                    '<th width="5%"><font style="font-weight:bold">Leaves Bag </font></th>' + //18
                    '<th width="5%"><font style="font-weight:bold">Black Yarn </font></th>' + //19
                    '<th width="5%"><font style="font-weight:bold">White Yarn </font></th>' + //20
                    '<th width="5%"><font style="font-weight:bold">Filter </font></th>' + //21
                    '<th width="5%"><font style="font-weight:bold">Disc </font></th>' + //22
                    '<th width="5%"><font style="font-weight:bold">Cartons </font></th>' + //23
                    '<th width="8%" class="not-export-column"><font style="font-weight:bold">Action</font></th>' +
                    '</tr>' +
                    '</thead>' +
                    '<tbody>';
                var batch = '';
                for (var i = 0; i < data.length; i++) {

                    var fdateval = data[i].date;
                    var fdateslt = fdateval.split('-');
                    var fdate = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];
                    var batch = data[i].batchname;

                    var sum_asal_bidi = parseFloat(sum_asal_bidi) + parseFloat(data[i].asal_bidi);
                    //console.log(sum_asal_bidi);
                    var sum_chant_bidi_pcs = parseFloat(sum_chant_bidi_pcs) + parseFloat(data[i].chant_bidi_pcs);
                    var sum_chant_bidi_kgs = parseFloat(sum_chant_bidi_kgs) + parseFloat(data[i].chant_bidi_kgs);
                    var sum_tob_wt = parseFloat(sum_tob_wt) + parseFloat(data[i].tob_wt);
                    var sum_tob = parseFloat(sum_tob) + parseFloat(data[i].tob);
                    var sum_tob_bag = parseFloat(sum_tob_bag) + parseFloat(data[i].tob_bag);
                    var sum_leaves = parseFloat(sum_leaves) + parseFloat(data[i].leaves);
                    var sum_leaves_bag = parseFloat(sum_leaves_bag) + parseFloat(data[i].leaves_bag);
                    var sum_bl_yarn = parseFloat(sum_bl_yarn) + parseFloat(data[i].bl_yarn);
                    var sum_wh_yarn = parseFloat(sum_wh_yarn) + parseFloat(data[i].wh_yarn);
                    var sum_filter = parseFloat(sum_filter) + parseFloat(data[i].filter);
                    var sum_disc = parseFloat(sum_disc) + parseFloat(data[i].disc);
                    var sum_cartons = parseFloat(sum_cartons) + parseFloat(data[i].cartons);

                    html += '<tr>' +
                        '<td style="display:none;" id="id_' + data[i].id + '">' + data[i].id + '</td>' +
                        '<td id="date_' + data[i].id + '">' + fdate + '</td>' +
                        '<td style="display:none;" id="cont_name_' + data[i].id + '">' + data[i].cont_name + '</td>' +
                        '<td id="cont_name2_' + data[i].id + '">' + data[i].co_name + '</td>' +
                        '<td style="display:none;" id="checker_' + data[i].id + '">' + data[i].checker_name + '</td>' +
                        '<td style="display:none;" id="batch1_' + data[i].id + '">' + data[i].batch1 + '</td>' +
                        '<td id="batch12_' + data[i].id + '">' + data[i].batchname + '</td>' +
                        '<td id="asalbidi_' + data[i].id + '">' + data[i].asal_bidi + '</td>' +
                        '<td id="chant_pcs_' + data[i].id + '">' + data[i].chant_bidi_pcs + '</td>' +
                        '<td id="chant_kgs_' + data[i].id + '">' + data[i].chant_bidi_kgs + '</td>' +
                        '<td style="display:none;" id="wages_' + data[i].id + '">' + data[i].wages + '</td>' +
                        '<td id="wagess_' + data[i].id + '">' + data[i].wagesname + '</td>' +
                        '<td style="display:none;" id="qlty_' + data[i].id + '">' + data[i].qlty + '</td>' +
                        '<td id="tob_wt_' + data[i].id + '">' + data[i].tob_wt + '</td>' +
                        '<td id="tob_' + data[i].id + '">' + data[i].tob + '</td>' +
                        '<td id="tob_bag_' + data[i].id + '">' + data[i].tob_bag + '</td>' +
                        '<td id="leaves_' + data[i].id + '">' + data[i].leaves + '</td>' +
                        '<td style="display:none;"id="batch2_' + data[i].id + '">' + data[i].batch2 + '</td>' +
                        '<td id="leaves_bag_' + data[i].id + '">' + data[i].leaves_bag + '</td>' +
                        '<td id="bl_yarn_' + data[i].id + '">' + data[i].bl_yarn + '</td>' +
                        '<td id="wh_yarn_' + data[i].id + '">' + data[i].wh_yarn + '</td>' +
                        '<td id="filter_' + data[i].id + '">' + data[i].filter + '</td>' +
                        '<td id="disc_' + data[i].id + '">' + data[i].disc + '</td>' +
                        '<td id="cartons_' + data[i].id + '">' + data[i].cartons + '</td>' +
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
                //var func=getbatch(batch);
                html += '</tbody><tfoot id="tfoot">' +
                    '<tr id="total">' +
                    '<td  class="boldness" style="display:none;">0</td>' +
                    '<td></td>' +
                    '<td style="display:none;">0</td>' +
                    '<td></td>' +
                    '<td style="display:none;">0</td>' +
                    '<td style="display:none;">0</td>' +
                    '<td class="boldness" >Total </td>' +
                    '<td class="boldness" >' + sum_asal_bidi.toFixed(3) + '</td>' +
                    '<td class="boldness" >' + sum_chant_bidi_pcs.toFixed(3) + '</td>' +
                    '<td class="boldness" >' + sum_chant_bidi_kgs.toFixed(3) + '</td>' +
                    '<td class="boldness"  style="display:none;">0</td>' +
                    '<td></td>' +
                    '<td style="display:none;">0</td>' +
                    '<td class="boldness" ></td>' + //' + sum_tob_wt.toFixed(3) + '
                    '<td class="boldness" >' + sum_tob.toFixed(3) + '</td>' +
                    '<td class="boldness" >' + sum_tob_bag + '</td>' +
                    '<td class="boldness" >' + sum_leaves.toFixed(3) + '</td>' +
                    '<td style="display:none;"> </td>' +
                    '<td class="boldness" >' + sum_leaves_bag + '</td>' +
                    '<td class="boldness" >' + sum_bl_yarn.toFixed(3) + ' </td>' +
                    '<td class="boldness" >' + sum_wh_yarn.toFixed(3) + '</td>' +
                    '<td class="boldness" >' + sum_filter.toFixed(3) + '</td>' +
                    '<td class="boldness" >' + sum_disc + '</td>' +
                    '<td class="boldness" >' + sum_cartons + '</td>' +
                    '<td class="boldness" > </td>  </tr>  ' +
                    '</tfoot></table>';
                $('#show_master').html(html);

                var batch = '';
                var abidi = 0;
                var cbidi = 0;
                var cbidikg = 0;
                var tob = 0;
                var tbag = 0;
                var lev = 0;
                var lbag = 0;
                var by = 0;
                var wy = 0;
                var fil = 0;
                var dis = 0;
                var carton = 0;
                var htm = '';
                $.ajax({
                    type: "POST",
                    url: baseurl + "Cont_IR/getbatch",
                    data: {
                        where: where,
                        tdate: tdate,
                        table_name: table_name,
                    },
                    dataType: "JSON",
                    async: false,
                    success: function(data) {
                        var data = eval(data);
                        console.log(data);
                        var count = data.length;
                        console.log(count);
                        html = '';
                        //htm+=;
                        for (i = 0; i < data.length; i++) {
                            htm += '<tr class="TRS"><td></td>' + '<td></td>' +
                                '<td class="boldness">' + data[i].batch + '</td>' +
                                '<td class="boldness">' + data[i].asal_bidi + '</td>' +
                                '<td class="boldness">' + data[i].chant_bidi_pcs + '</td>' +
                                '<td class="boldness">' + data[i].chant_bidi_kgs + '</td>' +
                                '<td></td>' +
                                '<td></td>' +
                                '<td class="boldness">' + data[i].tob + '</td>' +
                                '<td class="boldness">' + data[i].tob_bag + '</td>' +
                                '<td class="boldness">' + data[i].leaves + '</td>' +
                                '<td class="boldness">' + data[i].leaves_bag + '</td>' +
                                '<td class="boldness">' + data[i].bl_yarn + '</td>' +
                                '<td class="boldness">' + data[i].wh_yarn + '</td>' +
                                '<td class="boldness">' + data[i].filter + '</td>' +
                                '<td class="boldness">' + data[i].disc + '</td>' +
                                '<td class="boldness">' + data[i].cartons + '</td>' +
                                '<td class="boldness"></td></tr>';
                            // console.log(htm);
                        }
                        //$('#TRS').append(html);
                        $('#tfoot').append(htm);
                        $('.TRS').insertBefore('#total');
                        //$('#TRS').insertBefore('#total');
                    },
                    error: function() {
                        //alert("Error");
                    }
                });
                $('#myTable').DataTable({
                    dom: 'Bfrtip',
                    buttons: [{
                            extend: 'pdfHtml5',
                            pageSize: 'A4',
                            orientation: 'landscape',
                            title: 'DB Stock-Contractor Issue Receive',
                            exportOptions: {
                                columns: [1, 3, 6, 7, 8, 9, 11, 13, 14, 15, 16, 18, 19, 20, 21, 22, 23]
                            },
                        },
                        {
                            extend: 'excelHtml5',
                            title: 'DB Stock-Contractor Issue Receive',
                            exportOptions: {
                                columns: [1, 3, 6, 7, 8, 9, 11, 13, 14, 15, 16, 18, 19, 20, 21, 22, 23],
                                footer: true,
                                stripNewlines: false,
                                format: {
                                    footer: function(data, column, row) {
                                        console.log(data.replace(/<br\s*[\/]?>/gi, '\n'));
                                        return data.replace(/<br\s*[\/]?>/gi, '\n');
                                    }
                                }
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
                        url: baseurl + "Cont_IR/deletedata",
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

        var date1 = $('#date_' + id).html();
        var cont_name = $('#cont_name_' + id).html();
        var checker_name = $('#checker_' + id).html();
        var batch1 = $('#batch1_' + id).html();
        var asal_bidi = $('#asalbidi_' + id).html();
        var chant_bidi_pcs = $('#chant_pcs_' + id).html();
        var chant_bidi_kgs = $('#chant_kgs_' + id).html();
        var wages = $('#wages_' + id).html();
        var qlty = $('#qlty_' + id).html();
        var tob_wt = $('#tob_wt_' + id).html();
        var batch2 = $('#batch2_' + id).html();
        var tob = $('#tob_' + id).html();
        var tob_bag = $('#tob_bag_' + id).html();
        var leaves = $('#leaves_' + id).html();
        var leaves_bag = $('#leaves_bag_' + id).html();
        var bl_yarn = $('#bl_yarn_' + id).html();
        var wh_yarn = $('#wh_yarn_' + id).html();
        var filter = $('#filter_' + id).html();
        var disc = $('#disc_' + id).html();
        var cartons = $('#cartons_' + id).html();


        $('#save_update').val(id);
        $('#date').val(date1);
        $('#cont_name').val(cont_name).trigger('change');
        $('#checker').val(checker_name).trigger('change');
        $('#batch').val(batch1).trigger('change');
        $('#asal_bidi').val(asal_bidi);
        $('#chant_bidi_pcs').val(chant_bidi_pcs);
        $('#chant_bidi_kgs').val(chant_bidi_kgs);
        $('#wages').val(wages).trigger('change');
        $('#qlty').val(qlty);
        $('#tob_wt').val(tob_wt);
        $('#batch2').val(batch2).trigger('change');
        $('#tobacco').val(tob);
        $('#tobacco_bag').val(tob_bag);
        $('#leaves').val(leaves);
        $('#leaves_bag').val(leaves_bag);
        $('#b_yarn').val(bl_yarn);
        $('#w_yarn').val(wh_yarn);
        $('#filter').val(filter);
        $('#disk').val(disc);
        $('#cartons').val(cartons);





    });
});