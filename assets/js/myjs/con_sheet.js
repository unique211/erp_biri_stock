$(document).ready(function() {
    // $("#btnExport").click(function () {
    // $("#file_info").table2excel({
    // filename: "Contractor Trial Report"
    // });
    // });

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
        var radioValue = $("input[name='deduction']:checked").val();
        console.log(radioValue);
        var sdate = $('#fdate').val();
        var date = $('#date').val();
        var fdateslt = sdate.split('/');
        var fdate = fdateslt[2] + '-' + fdateslt[1] + '-' + fdateslt[0];
        var fdateslt = date.split('/');
        var cdate = fdateslt[2] + '-' + fdateslt[1] + '-' + fdateslt[0];
        $.ajax({
            type: "POST",
            url: baseurl + "Contractor_sheet/showData",
            data: {
                table_name: table_name,
                where: radioValue,
                fdate: fdate,
                date: cdate
            },
            dataType: "JSON",
            async: false,
            success: function(data) {

                var data = eval(data);
                console.log(data);

                if (radioValue == 'withdeduction') {
                    $('#thead').html('');
                    //console.log("From if");
                    //$('#thead').html('');
                    var thead = '';
                    var netbidi = 0;
                    var wages = 0;
                    var bonus = 0;
                    var handlingc = 0;
                    var addition = 0;
                    var tfoot = '';
                    var sumnetbiri = 0;
                    var grossTotal = 0;
                    var sumlev = 0;
                    var sumtob = 0;
                    var sumbly = 0;
                    var sumwhy = 0;
                    var sumfil = 0;
                    var sumbag = 0;
                    var sumdice = 0;
                    var sumother = 0;
                    var sumTshort = 0;
                    var sumadvance = 0;
                    var sumpf = 0;
                    var sumtds = 0;
                    var sumnetTotal = 0;
                    var sumwages = 0;
                    var sumbonus = 0;
                    sumhcharges = 0;
                    var sumaddition = 0;
                    var sumgrossTotal = 0;
                    var tbody = '';
                    var index = 1;
                    thead += '<tr>' +
                        '<th width="5%" rowspan="2">SL No</th>' +
                        '<th width="20%" rowspan="2">Contractor Name</th>' +
                        '<th style="text-align:right;" width="10%" rowspan="2">Net Biri</th>' +
                        '<th style="text-align:right;" width="10%" rowspan="2">Wages</th>' +
                        '<th style="text-align:right;" width="10%" rowspan="2">Bonus</th>' +
                        '<th style="text-align:right;" width="10%" rowspan="2">Handling  Charges</th>' +
                        '<th style="text-align:right;" width="10%" rowspan="2">Addition</th>' +
                        '<th style="text-align:right;"  width="10%" rowspan="2">Gross Total</thstyle="text-align:right;">' +
                        '<th width="10%" style="align-content: center;" colspan="12">D  E  D  U  C  T  I  O  N </th>' +
                        '<th style="text-align:right;" width="10%" rowspan="2">Net Total</th>' +
                        '</tr><tr>' +
                        '<th style="text-align:right;">Leaves</th>' +
                        '<th style="text-align:right;">Tobacco</th>' +
                        '<th style="text-align:right;">Bl-Sutta</th>' +
                        '<th style="text-align:right;">Wh-Sutta</th>' +
                        '<th style="text-align:right;">filter</th>' +
                        '<th style="text-align:right;">Bags</th>' +
                        '<th style="text-align:right;">Dice</th>' +
                        '<th style="text-align:right;">Other</th>' +
                        '<th style="text-align:right;">T-Short</th>' +
                        '<th style="text-align:right;">Advance</th>' +
                        '<th style="text-align:right;">P.F.</th>' +
                        '<th style="text-align:right;">TDS</th>' +
                        '</tr>';
                    $('#thead').html(thead);
                    for (var i = 0; i < data.length; i++) {
                        netbidi = data[i].netbiri.replace(/,/g, "");

                        //netbidi=netbidi.replace(/,/g,"");
                        sumnetbiri = parseFloat(sumnetbiri) + parseFloat(netbidi);
                        wages = data[i].wages.replace(/,/g, "");
                        sumwages = parseFloat(sumwages) + parseFloat(wages);
                        bonus = data[i].bonus.replace(/,/g, "");
                        sumbonus = parseFloat(sumbonus) + parseFloat(bonus);
                        handlingc = data[i].handlingcharges.replace(/,/g, "");
                        sumhcharges = parseFloat(sumhcharges) + parseFloat(handlingc)
                        addition = data[i].addition.replace(/,/g, "");
                        sumaddition = parseFloat(sumaddition) + parseFloat(addition);
                        grossTotal = data[i].grossTotal.replace(/,/g, "");
                        grossTotal = Math.round(grossTotal);
                        sumgrossTotal = parseFloat(sumgrossTotal) + parseFloat(grossTotal);
                        leaves = data[i].leaves.replace(/,/g, "");
                        sumlev = parseFloat(sumlev) + parseFloat(leaves);
                        tobacco = data[i].tobacco.replace(/,/g, "");
                        sumtob = parseFloat(sumtob) + parseFloat(tobacco);
                        blackyarn = data[i].blackyarn.replace(/,/g, "");
                        sumbly = parseFloat(sumbly) + parseFloat(blackyarn);
                        whiteyarn = data[i].whiteyarn.replace(/,/g, "");
                        sumwhy = parseFloat(sumwhy) + parseFloat(whiteyarn);
                        filter = data[i].filter.replace(/,/g, "");
                        sumfil = parseFloat(sumfil) + parseFloat(filter);
                        Bags = data[i].Bags.replace(/,/g, "");
                        sumbag = parseFloat(sumbag) + parseFloat(Bags);
                        Dice = data[i].Dice.replace(/,/g, "");
                        sumdice = parseFloat(sumdice) + parseFloat(Dice);
                        other = data[i].other.replace(/,/g, "");
                        sumother = parseFloat(sumother) + parseFloat(other);
                        T_Short = data[i].T_Short.replace(/,/g, "");
                        sumTshort = parseFloat(sumTshort) + parseFloat(T_Short);
                        Advance = data[i].Advance.replace(/,/g, "");
                        sumadvance = parseFloat(sumadvance) + parseFloat(Advance);
                        Pf = data[i].Pf.replace(/,/g, "");
                        sumpf = parseFloat(sumpf) + parseFloat(Pf);
                        Tds = data[i].Tds.replace(/,/g, "");
                        sumtds = parseFloat(sumtds) + parseFloat(Tds);
                        NetTotal = data[i].NetTotal.replace(/,/g, "");
                        sumnetTotal = parseFloat(sumnetTotal) + parseFloat(NetTotal);

                        tbody += '<tr>' +
                            '<td>' + index + '</td>' +
                            '<td>' + data[i].name + '</td>' +
                            '<td style="text-align:right;">' + data[i].netbiri + '</td>' +
                            '<td style="text-align:right;">' + data[i].wages + '</td>' +
                            '<td style="text-align:right;">' + data[i].bonus + '</td>' +
                            '<td style="text-align:right;">' + data[i].handlingcharges + '</td>' +
                            '<td style="text-align:right;">' + data[i].addition + '</td>' +
                            '<td style="text-align:right;">' + grossTotal.toFixed(2) + '</td>' +
                            '<td style="text-align:right;">' + data[i].leaves + '</td>' +
                            '<td style="text-align:right;">' + data[i].tobacco + '</td>' +
                            '<td style="text-align:right;">' + data[i].blackyarn + '</td>' +
                            '<td style="text-align:right;">' + data[i].whiteyarn + '</td>' +
                            '<td style="text-align:right;">' + data[i].filter + '</td>' +
                            '<td style="text-align:right;">' + data[i].Bags + '</td>' +
                            '<td style="text-align:right;">' + data[i].Dice + '</td>' +
                            '<td style="text-align:right;">' + data[i].other + '</td>' +
                            '<td style="text-align:right;">' + data[i].T_Short + '</td>' +
                            '<td style="text-align:right;">' + data[i].Advance + '</td>' +
                            '<td style="text-align:right;">' + data[i].Pf + '</td>' +
                            '<td style="text-align:right;">' + data[i].Tds + '</td>' +
                            '<td style="text-align:right;">' + data[i].NetTotal + '</td>' +
                            '</tr>';
                        index += 1;
                    }
                    $('#tbody').html(tbody);
                    tfoot += '<tr>' +
                        '<td></td>' +
                        '<td>Total</td>' +
                        '<td style="text-align:right;">' + sumnetbiri.toFixed(3) + '</td>' +
                        '<td style="text-align:right;">' + sumwages.toFixed(2) + '</td>' +
                        '<td style="text-align:right;">' + sumbonus.toFixed(2) + '</td>' +
                        '<td style="text-align:right;">' + sumhcharges.toFixed(2) + '</td>' +
                        '<td style="text-align:right;">' + sumaddition.toFixed(2) + '</td>' +
                        '<td style="text-align:right;">' + sumgrossTotal.toFixed(2) + '</td>' + //
                        //'<td>'+sumgrossTotal.toFixed(2)+'</td>'+
                        '<td style="text-align:right;">' + sumlev.toFixed(2) + '</td>' +
                        '<td style="text-align:right;">' + sumtob.toFixed(2) + '</td>' +
                        '<td style="text-align:right;">' + sumbly.toFixed(2) + '</td>' +
                        '<td style="text-align:right;">' + sumwhy.toFixed(2) + '</td>' +
                        '<td style="text-align:right;">' + sumfil.toFixed(2) + '</td>' +
                        '<td style="text-align:right;">' + sumbag.toFixed(2) + '</td>' +
                        '<td style="text-align:right;">' + sumdice.toFixed(2) + '</td>' +
                        '<td style="text-align:right;">' + sumother.toFixed(2) + '</td>' +
                        '<td style="text-align:right;">' + sumTshort.toFixed(2) + '</td>' +
                        '<td style="text-align:right;">' + sumadvance.toFixed(2) + '</td>' +
                        '<td style="text-align:right;">' + sumpf.toFixed(2) + '</td>' +
                        '<td style="text-align:right;">' + sumtds.toFixed(2) + '</td>' +
                        '<td style="text-align:right;">' + sumnetTotal.toFixed(2) + '</td>' +
                        '</tr><tr></tr>';
                    $('#tfoot').html(tfoot);
                } else if (radioValue == 'withoutdeduction') {
                    $('#thead').html('');
                    var thead = '';
                    var netbidi = 0;
                    var wages = 0;
                    var bonus = 0;
                    var handlingc = 0;
                    var addition = 0;
                    var tfoot = '';
                    var sumnetbiri = 0;
                    var grossTotal = 0;
                    var sumwages = 0;
                    var sumbonus = 0;
                    sumhcharges = 0;
                    var sumaddition = 0;
                    var sumgrossTotal = 0;
                    var tbody = '';
                    thead += '<tr>' +
                        '<td>Sl No.</td>' +
                        '<td>Contractor Name</td>' +
                        '<td style="text-align:right;">Net Biri</td>' +
                        '<td style="text-align:right;">Wages</td>' +
                        '<td style="text-align:right;">Bonus</td>' +
                        '<td style="text-align:right;">Handling Charges</td>' +
                        '<td style="text-align:right;">Addition</td>' +
                        '<td style="text-align:right;">Gross Total</td>' +
                        '</tr>';
                    $('#thead').html(thead);
                    var index = 1;
                    for (var i = 0; i < data.length; i++) {
                        netbidi = data[i].netbiri.replace(/,/g, "");
                        //console.log(netbidi);
                        //netbidi=netbidi.replace(/,/g,"");
                        sumnetbiri = parseFloat(sumnetbiri) + parseFloat(netbidi);
                        wages = data[i].wages.replace(/,/g, "");
                        sumwages = parseFloat(sumwages) + parseFloat(wages);
                        bonus = data[i].bonus.replace(/,/g, "");
                        sumbonus = parseFloat(sumbonus) + parseFloat(bonus);
                        handlingc = data[i].handlingcharges.replace(/,/g, "");
                        sumhcharges = parseFloat(sumhcharges) + parseFloat(handlingc)
                        addition = data[i].addition.replace(/,/g, "");
                        sumaddition = parseFloat(sumaddition) + parseFloat(addition);
                        grossTotal = data[i].grossTotal.replace(/,/g, "");
                        grossTotal = Math.round(grossTotal)
                        sumgrossTotal = parseFloat(sumgrossTotal) + parseFloat(grossTotal);
                        tbody += '<tr>' +
                            '<td>' + index + '</td>' +
                            '<td>' + data[i].name + '</td>' +
                            '<td style="text-align:right;">' + data[i].netbiri + '</td>' +
                            '<td style="text-align:right;">' + data[i].wages + '</td>' +
                            '<td style="text-align:right;">' + data[i].bonus + '</td>' +
                            '<td style="text-align:right;">' + data[i].handlingcharges + '</td>' +
                            '<td style="text-align:right;">' + data[i].addition + '</td>' +
                            '<td style="text-align:right;">' + grossTotal.toFixed(2) + '</td>' +
                            '</tr>';
                        index += 1;
                    }
                    $('#tbody').html(tbody);
                    tfoot += '<tr>' +
                        '<td></td>' +
                        '<td>Total</td>' +
                        '<td style="text-align:right;">' + sumnetbiri.toFixed(3) + '</td>' +
                        '<td style="text-align:right;">' + sumwages.toFixed(2) + '</td>' +
                        '<td style="text-align:right;">' + sumbonus.toFixed(2) + '</td>' +
                        '<td style="text-align:right;">' + sumhcharges.toFixed(2) + '</td>' +
                        '<td style="text-align:right;">' + sumaddition.toFixed(2) + '</td>' +
                        '<td style="text-align:right;">' + sumgrossTotal.toFixed(2) + '</td>' +
                        '</tr><tr></tr>';
                    $('#tfoot').html(tfoot);
                }
                console.log(data);
            },
            error: function() {

            }
        });
    });

    $(document).on('click', "#btnExportpdf", function(e) {
        e.preventDefault();
        Export1();
    });

    function Export1() {
        html2canvas($('#file_info')[0], {
            onrendered: function(canvas) {
                var data = canvas.toDataURL();
                var docDefinition = {
                    content: [{
                        image: data,
                        width: 500
                    }]
                };
                pdfMake.createPdf(docDefinition).download("Contractorledger.pdf");
            }
        })

    }
});