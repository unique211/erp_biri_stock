$(document).ready(function() {
    var table_name = "purchase_master";
    //submit form code start

    $("#if_pur").hide();

    defaultdate();

    $(document).on("change", "#type", function() {
        var type = $("#type").val();
        if (type == "Purchase") {
            $("#if_pur").show();
        } else {
            $("#if_pur").hide();
        }

    });
    // getMastercont("con-party_master", "#cont_name", "party");


    function getMastercont(table_name, selecter, where) {

        $.ajax({
            type: "POST",
            url: baseurl + "settings/get_master_where",
            data: {
                table_name: table_name,
                where: where,
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                console.log(data);

                html = '';
                var name = '';
                html += '<option selected disabled value="" >Select</option>';
                for (i = 0; i < data.length; i++) {
                    var id = '';
                    name = data[i].name;
                    id = data[i].id;
                    html += '<option value="' + id + '">' + name + '</option>';
                }
                $(selecter).html(html);
            }
        });
    }



    function defaultdate() {
        $('.doj').datepicker({
            'todayHighlight': true,
        });
        var date = new Date();
        date = date.toString('dd/MM/yyyy');

        $("#date").val(date);
        $("#b_date").val(date);
    }
    $(".closehideshow").click(function() {
        // $('#master_form')[0].reset();
        formclear();
        defaultdate();
        $('#save_update').val('');

        $('#batch').val("").trigger('change');
        $(".btnhideshow").show();
        $(".tablehideshow").show();
        $(".formhideshow").show();
        $("#if_pur").hide();
        // $('#file_info_tbody').html('');
        $('#file_info tbody').html('');
        $('#btnsave').text('Save');

    });
    $(document).on('click', '#btnsave', function(e) {
        e.preventDefault();
        table_name = "raw_batch_master";
        // var id=$('#id').val();
        var bname = $('#bname').val();
        var item = $('#item').val();
        if (bname != "") {
            $.ajax({
                type: "POST",
                url: baseurl + "RawItem_PS/insert",
                data: {
                    table_name: table_name,
                    bname,
                    bname,
                    item: item,
                },
                dataType: "JSON",
                async: false,
                success: function(data) {
                    $('#myModal').modal('hide');
                    successTost("Batch Added", "success");
                    $('#item').val(item).trigger('change');
                }
            });
        }

    });
    $(document).on("change", "#batch", function() {
        var batch = $('#batch').val();
        if (batch == "new") {
            $('#myModal').modal('show');
        }

    });
    $(document).on("change", "#item", function() {
        var id = $(this).val();
        var where = id;
        table_name = "batch_wise_stock";
        $.ajax({
            type: "POST",
            url: baseurl + "RawItem_PS/filter_batch",
            data: {
                table_name: table_name,
                where: where

            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                console.log(data);

                html = '';
                var batch = '';
                var type = $('#type').val();
                console.log("type" + type)
                if (type == "Purchase") {
                    html += '<option selected disabled value="" >Select</option>' + '<option value="new" >New</option>';
                } else {
                    html += '<option selected disabled value="" >Select</option>';
                }
                for (i = 0; i < data.length; i++) {
                    var id = '';

                    batch = data[i].batch;


                    html += '<option value="' + batch + '">' + batch + '</option>';
                }
                $("#batch").html(html);


            }

        });

    });


    $("#qty").keyup(function() {
        mul();
    });
    $("#rate").keyup(function() {
        mul();
    });

    function mul() {
        var rate = $("#rate").val();
        var qty = $("#qty").val();
        $("#amt").val(rate * qty);
    }

    function formclear() {
        $('#item').val('');
        $('#batch').val('');
        $('#qty').val('');
        $('#alt_qty').val('');
        $('#rate').val('');
        $('#amt').val('');
        $('#truckno').val('');
        $('#freight').val('');
        $('#date').val('');
        $('#type').val('');
        $('#bill_no').val('');
        $('#b_date').val('');
        $('#cont_name').val('');
        $('#sgst_per').val(0);
        $('#cgst_per').val(0);
        $('#igst_per').val(0);
        $('#save_update').val('');
        $('#ids').val('');
        $("#sgst_amt").val(0);
        $("#cgst_amt").val(0);
        $("#igst_amt").val(0);
        $('#tax_amt').val(0);
        $("#total").val(0);


    }
    $('#plus').on('click', function() {
        //console.log("HII");

        var rowid = $('#row').val();
        var row_id = parseInt(rowid) + 1;
        var item_name = $("#item option:selected").html();
        var item = $("#item").val();
        var batch_name = $('#batch').val();
        var qty = $('#qty').val();
        var alt_qty = $('#alt_qty').val();
        var item_rate = $('#rate').val();
        var amt = $('#amt').val();
        var id = $("#ids").val();
        //alert(id);
        if (id != "") {
            $("#item_" + id).html(item);
            $("#itemname_" + id).html(item_name);
            $("#batchname_" + id).html(batch_name);
            $("#qty_" + id).html(qty);
            $("#alt_qty_" + id).html(alt_qty);
            $("#item_rate_" + id).html(item_rate);
            $("#amt_" + id).html(amt);


        } else {
            //   alert(row_id);
            var table = "";

            table = '<tr id="' + row_id + '">' +
                '<td id="itemname_' + row_id + '">' + item_name +
                '</td><td hidden id="item_' + row_id + '">' + item +
                '</td><td id="batchname_' + row_id + '">' + batch_name +
                '</td><td id="qty_' + row_id + '">' + qty +
                '</td><td id="alt_qty_' + row_id + '">' + alt_qty +
                '</td><td id="item_rate_' + row_id + '">' + item_rate +
                '</td><td id="amt_' + row_id + '">' + amt +
                '</td><td><button type="button" name="edit" class="edit_data1 btn btn-xs btn-success" id="' + row_id + '"><i class="fa fa-edit"></i></button></td><td><button type="button" name="delete" value="Delete" class="btn btn-xs delete_data1 btn-danger"><i class="fa fa-trash"></i></button></td></tr>';

            $('#file_info_tbody').append(table);

            $('#row').val(row_id);
            $('#ids').val('');
        }






        count_total();
        // formclear();
        $('#item').val('');
        $('#batch').val('');
        $('#qty').val('');
        $('#alt_qty').val('');
        $('#rate').val('');
        $('#amt').val('');
        $("#ids").val('');



    });
    $(document).on('click', '.delete_data1', function() {

        if (confirm("Are you sure you want to delete this?")) {

            $(this).parents("tr").remove();

        } else {
            return false;
        }
        count_total();
    });
    $(document).on('click', '.edit_data1', function(e) {
        e.preventDefault();
        var id1 = $(this).attr('id');

        $("#ids").val(id1);
        $('#item').val($('#item_' + id1).text()).trigger('change');
        $('#batch').val($('#batchname_' + id1).text()).trigger('change');
        $('#qty').val($('#qty_' + id1).text());
        $('#alt_qty').val($('#alt_qty_' + id1).text());
        $('#rate').val($('#item_rate_' + id1).text());
        $('#amt').val($('#amt_' + id1).text());

    });

    $(document).on("submit", "#master_form", function(e) {
        e.preventDefault();
        table_name = "purchase_master";
        var purchase_id = 0;
        var sales_id = 0;
        var voucher_date1 = $('#date').val();
        var type = $('#type').val();
        var billno = $('#bill_no').val();
        var bill_date1 = $('#b_date').val();
        var party_id = $('#cont_name').val();
        var sgst = $('#sgst_per').val();
        var cgst = $('#cgst_per').val();
        var igst = $('#igst_per').val();
        var total = $('#tax_amt').val();
        var truck = $('#truckno').val();
        var freight = $('#freight').val();
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
            if (id == "") {
                if (type == "Purchase") {

                    // sales_id = 0;
                    $.ajax({
                        type: "POST",
                        url: baseurl + "RawItem_PS/getmaxid",
                        data: {
                            table_name: table_name,

                        },
                        dataType: "JSON",
                        async: false,
                        success: function(data) {
                            purchase_id = data;
                        }
                    });

                } else if (type == "Sales") {
                    //  purchase_id = 0;
                    $.ajax({
                        type: "POST",
                        url: baseurl + "RawItem_PS/getmaxid2",
                        data: {
                            table_name: table_name,

                        },
                        dataType: "JSON",
                        async: false,
                        success: function(data) {
                            sales_id = data;
                        }
                    });
                }
            }
            var fdateslt = voucher_date1.split('/');
            var voucher_date = fdateslt[2] + '-' + fdateslt[1] + '-' + fdateslt[0];
            var fdateslt = bill_date1.split('/');
            var bill_date = fdateslt[2] + '-' + fdateslt[1] + '-' + fdateslt[0];

            var r1 = $('table#file_info').find('tbody').find('tr');
            var r = r1.length;

            if (r > 0) {
                $.ajax({
                    type: "POST",
                    url: baseurl + "RawItem_PS/adddata",

                    data: {
                        id: id,
                        purchase_id: purchase_id,
                        sales_id: sales_id,
                        voucher_date: voucher_date,
                        billno: billno,
                        type: type,
                        bill_date: bill_date,
                        party_id: party_id,
                        sgst: sgst,
                        cgst: cgst,
                        igst: igst,
                        total: total,
                        truck: truck,
                        freight: freight,
                        table_name: table_name
                    },
                    dataType: "JSON",
                    async: false,
                    success: function(data) {
                        if (id == "") { purchase_id = data; } else {
                            purchase_id = id;
                        }

                        var r1 = $('table#file_info').find('tbody').find('tr');
                        var r = r1.length;

                        table_name = "purchase_data";


                        for (var i = 0; i < r; i++) {

                            item_id = $(r1[i]).find('td:eq(1)').html();
                            item_batch = $(r1[i]).find('td:eq(2)').html();
                            qty = $(r1[i]).find('td:eq(3)').html();
                            alt_qty = $(r1[i]).find('td:eq(4)').html();
                            rate = $(r1[i]).find('td:eq(5)').html();


                            $.ajax({
                                type: "POST",
                                url: baseurl + "RawItem_PS/adddata1",

                                data: {
                                    id: id,
                                    purchase_id: purchase_id,
                                    item_id: item_id,
                                    item_batch: item_batch,
                                    qty: qty,
                                    alt_qty: alt_qty,
                                    rate: rate,
                                    table_name: table_name
                                },
                                dataType: "JSON",
                                async: false,
                                success: function(result) {

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

                // $('#master_form')[0].reset();
                formclear();
                $('#row').val("0");
                defaultdate();
                $('#file_info tbody').html('');

                $('.tablehideshow').show();

                datashow();
                $('.closehideshow').trigger('click');
            } else {
                swal("Selcet One Item To Purchase Or Sale!!");
            }
        } else {
            swal("You Not Have This Permission!", "success");
        }


    });


    $("#sgst_per").blur(function() {
        count_total();
    });
    $("#cgst_per").blur(function() {
        count_total();
    });
    $("#igst_per").blur(function() {
        count_total();
    });

    $(document).on("change", "#cont_name", function() {
        var id = $("#cont_name").val();
        $.ajax({
            type: "POST",
            url: baseurl + "RawItem_PS/getcode",
            data: {
                id: id
            },
            dataType: "JSON",
            async: false,
            success: function(data) {
                // alert("Success Data is: "+data);
                if (data == 0) {
                    $('#sgst_per').val('0');
                    $('#cgst_per').val('0');
                    $("#sgst_per").attr("disabled", true);
                    $("#cgst_per").attr("disabled", true);
                    $("#igst_per").attr("disabled", false);
                } else if (data == 1) {
                    $('#igst_per').val('0');
                    //$('#cgst_per').val('0');
                    $("#sgst_per").attr("disabled", false);
                    $("#cgst_per").attr("disabled", false);
                    $("#igst_per").attr("disabled", true);
                }
            },
            error: function() {
                // alert("Error..");
            }
        });
    });

    function count_total() {
        var r1 = $('#file_info').find('tbody').find('tr');
        var r = r1.length;

        var taxable = 0;
        // var sgst = 0;
        // var cgst = 0;
        //  var igst = 0;

        for (var i = 0; i < r; i++) {
            //var t = document.getElementById('total');
            amt = $(r1[i]).find('td:eq(6)').html();
            taxable = parseFloat(taxable) + parseFloat(amt);

        }
        taxable = Math.round(taxable);
        $('#tax_amt').val(taxable.toFixed(2));

        var p_total = taxable;
        var sgst = parseFloat($("#sgst_per").val());
        var cgst = parseFloat($("#cgst_per").val());
        var igst = parseFloat($("#igst_per").val());
        var sgst_amt = parseFloat(p_total) * parseFloat(sgst) / 100;
        var cgst_amt = parseFloat(p_total) * parseFloat(cgst) / 100;
        var igst_amt = parseFloat(p_total) * parseFloat(igst) / 100;

        sgst_amt = Math.round(sgst_amt);
        $("#sgst_amt").val(sgst_amt.toFixed(2));
        cgst_amt = Math.round(cgst_amt);
        $("#cgst_amt").val(cgst_amt.toFixed(2));
        igst_amt = Math.round(igst_amt);
        $("#igst_amt").val(igst_amt.toFixed(2));


        var grand_total = p_total + sgst_amt + cgst_amt + igst_amt;
        $("#total").val(grand_total.toFixed(2));


    }
    $(document).on("change", "#type2", function() {
        datashow();
    });



    //----------------------submit form code end------------------------------
    datashow();
    //----------------show data in the tabale code start-----------------------
    function datashow() {
        var where = $('#type2').val();
        table_name = "purchase_master";

        $.ajax({
            type: "POST",
            url: baseurl + "RawItem_PS/showdata",
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
                    '<th><font style="font-weight:bold">Type</font></th>' +
                    '<th><font style="font-weight:bold">Voucher Date</font></th>' +
                    '<th style="display:none;">type</th>' +
                    '<th style="display:none;">bill id</th>' +
                    '<th style="display:none;">bill date</th>' +
                    '<th style="display:none;">Party id</th>' +
                    '<th><font style="font-weight:bold">Party Name</font></th>' +
                    '<th><font style="font-weight:bold">Taxable Amount</font></th>' +
                    '<th style="display:none;"><font style="font-weight:bold">SGST(%)</font></th>' +
                    '<th><font style="font-weight:bold">SGST</font></th>' +
                    '<th style="display:none;"><font style="font-weight:bold">CGST(%)</font></th>' +
                    '<th><font style="font-weight:bold">CGST</font></th>' +
                    '<th style="display:none;"><font style="font-weight:bold">IGST(%)</font></th>' +
                    '<th><font style="font-weight:bold">IGST</font></th>' +
                    '<th><font style="font-weight:bold">Total Amount</font></th>' +
                    '<th style="display:none;"><font style="font-weight:bold">Truck</font></th>' +
                    '<th style="display:none;"><font style="font-weight:bold">Freight</font></th>' +
                    '<th class="not-export-column"><font style="font-weight:bold">Operations</font></th>' +

                    '</tr>' +
                    '</thead>' +
                    '<tbody>';
                for (var i = 0; i < data.length; i++) {

                    var fdateval = data[i].voucher_date;
                    var fdateslt = fdateval.split('-');
                    var voucher_date = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];
                    var fdateval = data[i].bill_date;
                    var fdateslt = fdateval.split('-');
                    var bill_date = fdateslt[2] + '/' + fdateslt[1] + '/' + fdateslt[0];

                    var tot = Math.round(data[i].total);
                    var sgst = Math.round(data[i].sgst);
                    var cgst = Math.round(data[i].cgst);
                    var igst = Math.round(data[i].igst);

                    var sgst_amt = parseFloat(tot) * parseFloat(sgst) / 100;
                    var cgst_amt = parseFloat(tot) * parseFloat(cgst) / 100;
                    var igst_amt = parseFloat(tot) * parseFloat(igst) / 100;
                    //var nccd_amt = parseFloat(tot) * parseFloat(nccd) / 100;
                    var grand_total = parseFloat(tot) + parseFloat(igst_amt) + parseFloat(sgst_amt) + parseFloat(cgst_amt);
                    var grand_tot = Math.round(grand_total);

                    html += '<tr>' +
                        '<td id="type_' + data[i].id + '">' + data[i].type + '</td>' +
                        '<td id="voucher_date_' + data[i].id + '">' + voucher_date + '</td>' +
                        '<td style="display:none;"id="type_' + data[i].id + '">' + data[i].type + '</td>' +
                        '<td style="display:none;"id="billno_' + data[i].id + '">' + data[i].bill_no + '</td>' +
                        '<td style="display:none;"id="bill_date_' + data[i].id + '">' + bill_date + '</td>' +
                        '<td style="display:none;"id="party_id_' + data[i].id + '">' + data[i].party_id + '</td>' +
                        '<td id="party_name_' + data[i].id + '">' + data[i].party_name + '</td>' +
                        '<td id="total_' + data[i].id + '">' + data[i].total + '</td>' +
                        '<td style="display:none;" id="sgst_' + data[i].id + '">' + data[i].sgst + '</td>' +
                        '<td id="sgst1_' + data[i].id + '">' + sgst_amt + '</td>' +
                        '<td style="display:none;" id="cgst_' + data[i].id + '">' + data[i].cgst + '</td>' +
                        '<td id="cgst1_' + data[i].id + '">' + cgst_amt + '</td>' +
                        '<td style="display:none;" id="igst_' + data[i].id + '">' + data[i].igst + '</td>' +
                        '<td id="igst1_' + data[i].id + '">' + igst_amt + '</td>' +
                        '<td id="total_' + data[i].id + '">' + grand_tot + '</td>' +
                        '<td style="display:none;" id="truck_' + data[i].id + '">' + data[i].truck_no + '</td>' +
                        '<td style="display:none;" id="freight_' + data[i].id + '">' + data[i].freight + '</td>' +
                        //   '<td class="not-export-column" ><button name="edit" value="edit" class="edit_data btn btn-xs btn-success" id=' + data[i].id + '><i class="fa fa-edit"></i></button>&nbsp;<button name="delete" value="Delete" class="delete_data btn btn-xs btn-danger" id=' + data[i].id + '><i class="fa fa-trash"></i></button></td>' +
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
                            title: 'DB Stock-Raw Item Purchase & Sales',
                            //orientation: 'landscape',
                            pageSize: 'A4',
                            exportOptions: {
                                columns: [0, 1, 6, 7, 8, 9, 10]
                            },
                        },
                        {
                            title: 'DB Stock-Raw Item Purchase & Sales',
                            extend: 'excelHtml5',
                            exportOptions: {
                                columns: [0, 1, 6, 7, 8, 9, 10]
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
                        url: baseurl + "RawItem_PS/deletedata",
                        dataType: "JSON",
                        data: {
                            id: id1,
                            table_name: table_name,
                        },
                        success: function(data) {

                            table_name = "purchase_data";
                            $.ajax({
                                type: "POST",
                                url: baseurl + "RawItem_PS/deletedata",
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
        var voucher_date1 = $('#voucher_date_' + id).html();
        var type = $('#type_' + id).html();
        var billno = $('#billno_' + id).html();
        var bill_date1 = $('#bill_date_' + id).html();
        var party_id = $('#party_id_' + id).html();
        var sgst = $('#sgst_' + id).html();
        var cgst = $('#cgst_' + id).html();
        var igst = $('#igst_' + id).html();
        var total = $('#total_' + id).html();
        var truck = $('#truck_' + id).html();
        var freight = $('#freight_' + id).html();

        $('#date').val(voucher_date1);
        $('#type').val(type).trigger('change');
        $('#bill_no').val(billno);
        $('#b_date').val(bill_date1);
        $('#cont_name').val(party_id).trigger('change');
        $('#sgst_per').val(sgst);
        $('#cgst_per').val(cgst);
        $('#igst_per').val(igst);
        $('#tax_amt').val(total);
        $('#truckno').val(truck);
        $('#freight').val(freight);
        $('#save_update').val(id);


        table_name = "purchase_data";
        $.ajax({
            type: "POST",
            url: baseurl + "RawItem_PS/fetch_data",
            dataType: "JSON",
            data: {
                id: id,
                table_name: table_name,
            },
            success: function(data) {

                var data = eval(data);

                var r = data.length;
                //   alert(r);
                var row_id = $("#row").val();
                var table = "";
                for (var i = 0; i < r; i++) {

                    row_id = parseInt(row_id) + 1;

                    //var rowid = $('#row').val();
                    // var row_id = parseInt(rowid) + 1;
                    var qty = data[i].qty;
                    var rate = data[i].rate;
                    var amt = parseInt(qty) * parseInt(rate);


                    table += '<tr id="' + row_id + '">' +

                        '<td  id="itemname_' + row_id + '">' + data[i].item_name +
                        '</td><td style="display:none;"id="item_' + row_id + '">' + data[i].item_id +
                        '</td><td id="batchname_' + row_id + '">' + data[i].item_batch +
                        '</td><td id="qty_' + row_id + '">' + data[i].qty +
                        '</td><td id="alt_qty_' + row_id + '">' + data[i].alt_qty +
                        '</td><td id="item_rate_' + row_id + '">' + data[i].rate +
                        '</td><td id="amt_' + row_id + '">' + amt +
                        '</td><td><button type="button" name="edit" class="edit_data1 btn btn-xs btn-success" id="' + row_id + '"><i class="fa fa-edit"></i></button></td><td><button type="button" name="delete" value="Delete" class="btn btn-xs delete_data1 btn-danger"><i class="fa fa-trash"></i></button></td></tr>';


                    $('#row').val(row_id);
                    // alert(table);

                }

                $('#file_info_tbody').html(table);
                mul();
                count_total();
                //  alert(row_id);
            }

        });
    });
});