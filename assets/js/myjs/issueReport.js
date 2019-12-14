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
				        name: "Issue Report",
					filename: "Issue Report",
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
        var where = fdate;
        var tdate = cdate;
        $.ajax({
            type: "POST",
            url: baseurl + "Issue_Report/showData",
            data: {
                table_name: table_name,
                fdate: fdate,
                tdate: cdate
            },
            dataType: "JSON",
            async: false,
            success: function (data) {
                var data = eval(data);
                var tbody;var cname='';
                console.log(data);
				$('#tbody').html('');
				$('#tfoot').html('');
                for (var i = 1; i < data.length; i++) {
                    if (cname == data[i].contractor) {
                        cname=data[i].contractor;
                        tbody += '<tr>' +
                            '<td></td>' +//' + data[i].contractor + '
                            '<td>' + data[i].batch + '</td>' +
                            '<td class="texes">' + data[i].tobacco + '</td>' +
                            '<td class="texes">' + data[i].tob_bag + '</td>' +
                            '<td class="texes">' + data[i].leaves + '</td>' +
                            '<td class="texes">' + data[i].leaves_bag + '</td>' +
                            '<td class="texes">' + data[i].bl_yarn + '</td>' +
                            '<td class="texes">' + data[i].wh_yarn + '</td>' +
                            '<td class="texes">' + data[i].filter + '</td>' +
                            '<td class="texes">' + data[i].disc + '</td>' +
                            '<td class="texes">' + data[i].other + '</td>' +
                            '</tr>';
                    }
                    else {
                        cname=data[i].contractor;
                        tbody += '<tr>' +
                            '<td>' + data[i].contractor + '</td>' +
                            '<td>' + data[i].batch + '</td>' +
                            '<td class="texes">' + data[i].tobacco + '</td>' +
                            '<td class="texes">' + data[i].tob_bag + '</td>' +
                            '<td class="texes">' + data[i].leaves + '</td>' +
                            '<td class="texes">' + data[i].leaves_bag + '</td>' +
                            '<td class="texes">' + data[i].bl_yarn + '</td>' +
                            '<td class="texes">' + data[i].wh_yarn + '</td>' +
                            '<td class="texes">' + data[i].filter + '</td>' +
                            '<td class="texes">' + data[i].disc + '</td>' +
                            '<td class="texes">' + data[i].other + '</td>' +
                            '</tr>';
                    }

                }
                $('#tbody').html(tbody);
                var batch = ''; var abidi = 0; var cbidi = 0; var cbidikg = 0; var tob = 0; var tbag = 0; var lev = 0; var lbag = 0; var by = 0; var wy = 0; var fil = 0; var dis = 0; var carton = 0; var htm = '';
                $.ajax({
                    type: "POST",
                    url: baseurl + "Issue_Report/getbatch",
                    data: {
                        where: where,
                        tdate: tdate,
                        table_name: table_name,
                    },
                    dataType: "JSON",
                    async: false,
                    success: function (data) {
                        //var data = eval(data);
                        console.log(data);
                        var count = data.length;
                        console.log(count);
                        html = '';
                        //htm+=;
                        var sumoftob=0;var sumoftobbag=0;var sumofleaves=0;var sumofleavesbag=0;var sumofbl=0;var sumofwh=0;var sumofother=0;var sumofdisc=0;var sumoffil=0;
                        for (i = 0; i < data.length; i++) {
                            sumoftob=parseFloat(sumoftob)+parseFloat(data[i].tob);
                            sumoftobbag=parseFloat(sumoftobbag)+parseFloat(data[i].tob_bag);
                            sumofleaves=parseFloat(sumofleaves)+parseFloat(data[i].leaves);
                            sumofleavesbag=parseFloat(sumofleavesbag)+parseFloat(data[i].leaves_bag);
                            sumofbl=parseFloat(sumofbl)+parseFloat(data[i].bl_yarn);
                            sumofwh=parseFloat(sumofwh)+parseFloat(data[i].wh_yarn);
                            sumoffil=parseFloat(sumoffil)+parseFloat(data[i].filter);
                            sumofdisc=parseFloat(sumofdisc)+parseFloat(data[i].disc);
                            sumofother=parseFloat(sumofother)+parseFloat(data[i].cartons);
                            htm += '<tr class="names texes"><td>Sub Total--</td>' + 
                                '<td class="boldness">' + data[i].batch + '</td>' +
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
                        htm+='<tr class="names texes"><td>Grand Total--</td><td></td>'+
                        '<td>'+sumoftob.toFixed(3)+'</td>'+
                        '<td>'+sumoftobbag.toFixed(3)+'</td>'+
                        '<td>'+sumofleaves.toFixed(3)+'</td>'+
                        '<td>'+sumofleavesbag.toFixed(3)+'</td>'+
                        '<td>'+sumofbl.toFixed(3)+'</td>'+
                        '<td>'+sumofwh.toFixed(3)+'</td>'+
                        '<td>'+sumoffil.toFixed(3)+'</td>'+
                        '<td>'+sumofdisc.toFixed(3)+'</td>'+
                        '<td>'+sumofother.toFixed(3)+'</td>'+
                        '</tr>';
                        //$('#TRS').append(html);
                        $('#tfoot').append(htm);
                        $('.TRS').insertBefore('#total');
                        //$('#TRS').insertBefore('#total');
                    }, error: function () {
                        //alert("Error");
                    }
                });
            }
        });
    });
});