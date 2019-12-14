$(document).ready(function () {
	setdate();
	function setdate(){
		$.ajax({
            type: "POST",
            url: baseurl + "Issue_Report/setDate",
            data: {
                table_name: 'financial_period',
            },
            dataType: "JSON",
            async: false,
            success: function (data) {
				data=data.split('-');
				data=data[2]+'/'+data[1]+'/'+data[0];
				$('#fdate').val(data);
			}
	});
	}
	
    $("#btnExport").click(function () {	
		$("#file_info").table2excel({
							exclude: ".noExl",
							name: "Recieved Report",
						filename: "Recieved Report",
						fileext: ".xls",
						exclude_img: true,
						exclude_links: true,
						exclude_inputs: true
		});
});	
    $('#search').click(function () {
        var table_name = 'con-party_master';
        var sdate = $('#fdate').val();
        var date = $('#date').val();
        var fdateslt = sdate.split('/');
        var fdate = fdateslt[2] + '-' + fdateslt[1] + '-' + fdateslt[0];
        var fdateslt = date.split('/');
        var cdate = fdateslt[2] + '-' + fdateslt[1] + '-' + fdateslt[0];
        var fdate = fdate;
        var tdate = cdate;
        var batch = $('#batch').val();
        var where = $('#wages').val();
		
        $.ajax({
            type: "POST",
            url: baseurl + "Recieved_Report/showData",
            data: {
                table_name: table_name,
                where: where,
                batch: batch,
                fdate: fdate,
                tdate: cdate
            },
            dataType: "JSON",
            async: false,
            success: function (data) {
                var data = eval(data);
                var tbody; var cname = '';
                console.log(data);
                $('#tbody').html('');
                $('#tfoot').html('');
                for (var i = 1; i < data.length; i++) {
                    //if (cname == data[i].contractor) {
                    cname = data[i].contractor;
                    tbody += '<tr>' +
                        '<td>' + data[i].contractor + '</td>' +
                        '<td>' + data[i].batch + '</td>' +
                        '<td class="texes">' + data[i].asal_bidi + '</td>' +
                        '<td class="texes">' + data[i].chant_bidi_pcs + '</td>' +
                        '<td class="texes">' + data[i].chant_bidi_kgs + '</td>' +
                        '<td class="texes">' + data[i].wages + '</td>' +
                        '</tr>';

                }
                $('#tbody').html(tbody);
                $.ajax({
                    type: "POST",
                    url: baseurl + "Recieved_Report/getbatch",
                    data: {
                        fdate: fdate,
                        where: where,
                        batch: batch,
                        tdate: tdate,
                        table_name: table_name,
                    },
                    dataType: "JSON",
                    async: false,
                    success: function (data) {
                        var data = eval(data);
                        console.log(data);
                        var count = data.length;
                        console.log(count);
                        htm = '';
                        //htm+=;
                        var sumofasb = 0; var sumofcpcs = 0; var sumofckg = 0;
                        for (i = 0; i < data.length; i++) {
                            sumofasb = parseFloat(sumofasb) + parseFloat(data[i].asal_bidi);
                            sumofcpcs = parseFloat(sumofcpcs) + parseFloat(data[i].chant_bidi_pcs);
                            sumofckg = parseFloat(sumofckg) + parseFloat(data[i].chant_bidi_kgs);
                            htm += '<tr class="names"><td>Sub Total--</td>' +
                                '<td class="boldness">' + data[i].batch + '</td>' +
                                '<td class="texes">' + data[i].asal_bidi + '</td>' +
                                '<td class="texes">' + data[i].chant_bidi_pcs + '</td>' +
                                '<td class="texes">' + data[i].chant_bidi_kgs + '</td>' +
                                '<td></td></tr>';
                            // console.log(htm);
                        }
                        htm += '<tr class="names "><td>Grand Total--</td><td></td>' +
                            '<td class="texes">' + sumofasb.toFixed(3) + '</td>' +
                            '<td class="texes">' + sumofcpcs.toFixed(3) + '</td>' +
                            '<td class="texes">' + sumofckg.toFixed(3) + '</td>' +
                            '<td></td>' +
                            '</tr>';
                        $('#tfoot').html(htm);
                    }, error: function () {
                    }
                });
            }
        });
    });
});