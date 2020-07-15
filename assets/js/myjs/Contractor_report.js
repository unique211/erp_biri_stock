$(document).ready(function() {
    $("#btnExport").click(function() {
        $("#file_info").table2excel({
            exclude: ".noExl",
            name: "Contractor Trial Report",
            filename: "Contractor Trial Report",
            fileext: ".xls",
            exclude_img: true,
            exclude_links: true,
            exclude_inputs: true
        });
    });

    $('#search').click(function() {
        var table_name = 'con-party_master';
        var date = $('#date').val();
        var fdateslt = date.split('/');
        var cdate = fdateslt[2] + '-' + fdateslt[1] + '-' + fdateslt[0];
        $.ajax({
            type: "POST",
            url: baseurl + "Report/showData",
            data: {
                table_name: table_name,
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
                var tobacco = 0;
                var leaves = 0;
                var black_yarn = 0;
                var white_yarn = 0;
                var filter = 0;
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
                                if (Tsum == 0 && Lsum == 0 && bsum == 0 && wsum == 0 && fsum == 0) {

                                } else {
                                    html += '<tr class="trs">' +
                                        '<td></td><td></td><td></td><td></td><td class="names">' + Tsum.toFixed(3) + '</td><td class="names">' + Lsum.toFixed(3) + '</td><td class="names">' + bsum.toFixed(3) + '</td><td class="names">' + wsum.toFixed(3) + '</td><td class="names">' + fsum.toFixed(3) + '</td></tr><tr></tr>';
                                    index += 1;
                                    val = val + 1;
                                }
                            } else {
                                html += '<tr></tr>';
                                val++;
                            }
                            Tsum = 0;
                            Lsum = 0;
                            bsum = 0;
                            wsum = 0;
                            fsum = 0;
                            tobacco = data[i].name.tobacco.replace(/,/g, "");
                            Tsum = parseFloat(Tsum) + parseFloat(tobacco);
                            leaves = data[i].name.leaves.replace(/,/g, "");
                            Lsum = parseFloat(Lsum) + parseFloat(leaves);
                            black_yarn = data[i].name.black_yarn.replace(/,/g, "");
                            bsum = parseFloat(bsum) + parseFloat(black_yarn);
                            white_yarn = data[i].name.white_yarn.replace(/,/g, "");
                            wsum = parseFloat(wsum) + parseFloat(white_yarn);
                            filter = data[i].name.filter.replace(/,/g, "");
                            fsum = parseFloat(fsum) + parseFloat(filter);

                            if (data[i].name.tobacco == 0 && data[i].name.leaves == 0 && data[i].name.black_yarn == 0 && data[i].name.white_yarn == 0 && data[i].name.filter == 0) {

                            } else {
                                html += '<tr>' +
                                    '<td>' + index + '</td>' +
                                    '<td>' + data[i].bname + '</td>' +
                                    '<td style="text-align:right;">' + data[i].count + '</td>' +
                                    '<td >' + data[i].name.batchName + '</td>' +
                                    '<td style="text-align:right;">' + data[i].name.tobacco + '</td>' +
                                    '<td style="text-align:right;">' + data[i].name.leaves + '</td>' +
                                    '<td style="text-align:right;">' + data[i].name.black_yarn + '</td>' +
                                    '<td style="text-align:right;">' + data[i].name.white_yarn + '</td>' +
                                    '<td style="text-align:right;">' + data[i].name.filter + '</td>' +
                                    '</tr>';
                            }

                        } else {
                            tobacco = data[i].name.tobacco.replace(/,/g, "");
                            Tsum = parseFloat(Tsum) + parseFloat(tobacco);
                            leaves = data[i].name.leaves.replace(/,/g, "");
                            Lsum = parseFloat(Lsum) + parseFloat(leaves);
                            black_yarn = data[i].name.black_yarn.replace(/,/g, "");
                            bsum = parseFloat(bsum) + parseFloat(black_yarn);
                            white_yarn = data[i].name.white_yarn.replace(/,/g, "");
                            wsum = parseFloat(wsum) + parseFloat(white_yarn);
                            filter = data[i].name.filter.replace(/,/g, "");
                            fsum = parseFloat(fsum) + parseFloat(filter);

                            if (data[i].name.tobacco == 0 && data[i].name.leaves == 0 && data[i].name.black_yarn == 0 && data[i].name.white_yarn == 0 && data[i].name.filter == 0) {

                            } else {
                                html += '<tr>' +
                                    '<td>' + '</td>' +
                                    '<td>' + '</td>' +
                                    '<td>' + '</td>' +
                                    '<td>' + '</td>' +
                                    '<td></td>' +
                                    // '<td>' + data[i].name.batchName + '</td>' +
                                    '<td style="text-align:right;">' + data[i].name.tobacco + '</td>' +
                                    '<td style="text-align:right;">' + data[i].name.leaves + '</td>' +
                                    '<td style="text-align:right;">' + data[i].name.black_yarn + '</td>' +
                                    '<td style="text-align:right;">' + data[i].name.white_yarn + '</td>' +
                                    '<td style="text-align:right;">' + data[i].name.filter + '</td>' +
                                    '</tr>';
                            }
                        }
                    } else {}
                    if (flag == 1) {
                        console.log(flag + " is the flag ??");
                        if (Tsum == 0 && Lsum == 0 && bsum == 0 && wsum == 0 && fsum == 0) {

                        } else {
                            html += '<tr class="trs">' +
                                '<td></td><td></td><td></td><td></td><td style="text-align:right;" class="names">' + Tsum.toFixed(3) + '</td><td class="names">' + Lsum.toFixed(3) + '</td><td class="names">' + bsum.toFixed(3) + '</td><td class="names">' + wsum.toFixed(3) + '</td><td class="names">' + fsum.toFixed(3) + '</td></tr><tr></tr>';
                            index += 1;
                            val = val + 1;
                        }
                    }
                }
                $('#tbody').html(html);
                Total();
            }
        });
    });

    function Total() {
        console.log('Total is: ');
        html = '';
        var r1 = $('#file_info').find('tbody').find('tr.trs');
        var r = r1.length;
        var tob = 0;
        var lev = 0;
        var by = 0;
        var wy = 0;
        var fil = 0;
        var stob = 0;
        var slev = 0;
        var sby = 0;
        var swy = 0;
        sfil = 0;
        for (var i = 0; i < r; i++) {
            tob = $(r1[i]).find('td:eq(4)').html().replace(/,/g, "");
            lev = $(r1[i]).find('td:eq(5)').html().replace(/,/g, "");
            by = $(r1[i]).find('td:eq(6)').html().replace(/,/g, "");
            wy = $(r1[i]).find('td:eq(7)').html().replace(/,/g, "");
            fil = $(r1[i]).find('td:eq(8)').html().replace(/,/g, "");
            stob = parseFloat(stob) + parseFloat(tob);
            slev = parseFloat(slev) + parseFloat(lev);
            sby = parseFloat(sby) + parseFloat(by);
            swy = parseFloat(swy) + parseFloat(wy);
            sfil = parseFloat(sfil) + parseFloat(fil);
        }
        html += '<tr  class="names">' +
            '<td></td>' +
            '<td>Total</td>' +
            '<td></td>' +
            '<td></td>' +
            '<td style="text-align:right;">' + stob.toFixed(3) + '</td>' +
            '<td style="text-align:right;">' + slev.toFixed(3) + '</td>' +
            '<td style="text-align:right;">' + sby.toFixed(3) + '</td>' +
            '<td style="text-align:right;">' + swy.toFixed(3) + '</td>' +
            '<td style="text-align:right;">' + sfil.toFixed(3) + '</td>' +
            '</tr>';
        $('#tfoot').html(html);
    }
});