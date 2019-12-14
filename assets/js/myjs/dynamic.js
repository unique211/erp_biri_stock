$(document).ready(function() {
    getMasterSelect("states", ".state");
    getMasterSelect("batch_master", ".batch");
    getMasterSelect("packingbatch", ".labelnm");
    getMasterSelect("item_master", ".item");
    getMasterSelect("checker_master", ".checker");
    getMasterSelect("wages_fixation", ".wages");
    getMasterSelect("rate_master", ".batch_rate");
    getMastercont("con-party_master", ".cont", "contractor");
    getMastercont("con-party_master", ".party", "party");


    function getMastercont(table_name, selecter, where) {
        //alert('hi');
        $.ajax({
            type: "POST",
            url: baseurl + "Settings/get_master_where",
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

    function getMasterSelect(table_name, selecter) {

        $.ajax({
            type: "POST",
            url: baseurl + "settings/get_master",
            data: { table_name: table_name },
            dataType: "JSON",
            async: false,
            success: function(data) {
                console.log(data);
                html = '';

                if (table_name == "batch_master") {
                    var batch = '';
                    html += '<option selected disabled value="0" >Select</option>';
                    for (i = 0; i < data.length; i++) {
                        var id = '';
                        batch = data[i].batch;
                        id = data[i].id;
                        //alert(name);	
                        html += '<option value="' + id + '">' + batch + '</option>';
                    }
                } else if (table_name == "item_master") {
                    var name = '';
                    html += '<option selected disabled value="" >Select</option>';
                    for (i = 0; i < data.length; i++) {
                        var id = '';
                        name = data[i].name;
                        id = data[i].id;
                        //alert(name);	
                        html += '<option value="' + id + '">' + name + '</option>';
                    }
                } else if (table_name == "checker_master") {
                    var name = '';
                    html += '<option selected disabled value="" >Select</option>';
                    for (i = 0; i < data.length; i++) {
                        var id = '';
                        name = data[i].name;
                        id = data[i].id;
                        //alert(name);	
                        html += '<option value="' + id + '">' + name + '</option>';
                    }
                } else if (table_name == "wages_fixation") {
                    var name = '';
                    html += '<option selected disabled value="" >Select</option>';
                    for (i = 0; i < data.length; i++) {
                        var id = '';
                        name = data[i].name;
                        id = data[i].id;
                        //alert(name);	
                        html += '<option value="' + id + '">' + name + '</option>';
                    }
                } else if (table_name == "rate_master") {
                    var batch = '';
                    html += '<option selected disabled value="" >Select</option>';
                    for (i = 0; i < data.length; i++) {
                        var id = '';
                        batch = data[i].batch;
                        id = data[i].id;
                        //alert(name);	
                        html += '<option value="' + id + '">' + batch + '</option>';
                    }
                } else if (table_name == "packingbatch") {
                    var lablenm = '';
                    html += '<option selected disabled value="" >Select</option>';
                    for (i = 0; i < data.length; i++) {
                        var id = '';
                        lablenm = data[i].lablenm;
                        id = data[i].id;
                        //alert(name);	
                        html += '<option value="' + id + '">' + lablenm + '</option>';
                    }
                } else if (table_name == "states") {
                    var name = '';
                    html += '<option selected disabled value="" >Select</option>';
                    for (i = 0; i < data.length; i++) {
                        var id = '';
                        name = data[i].name;
                        id = data[i].id;
                        //alert(name);	
                        html += '<option value="' + id + '">' + name + '</option>';
                    }
                }

                $(selecter).html(html);
            }
        });
    }







});