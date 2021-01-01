$(document).ready(function() {



    var add_rights = 0;
    var edit_rights = 0;
    var delete_rights = 0;
    var view_rights = 0;


    function get_current_rights(menu, sub_menu) {
        menu_id = menu;
        sub_menu_id = sub_menu;

        $.ajax({
            type: "POST",
            url: get_current_user_rights,
            data: {
                menu_id: menu_id,
                sub_menu_id: sub_menu_id,
            },
            async: false,
            success: function(data) {
                console.log("responce data : " + data);

                add_rights = data.create_rights;
                view_rights = data.read_rights;
                edit_rights = data.update_rights;
                delete_rights = data.delete_rights;
                //     alert(data.delete_rights);
            }
        });

        if (add_rights == 1) {
            $(".btnhideshow").show();
        } else {
            $(".btnhideshow").hide();
        }
    }

    function get_menus() {
        $.ajax({
            type: "POST",
            url: baseurl + "Userpermission/getallmenu",
            dataType: "JSON",
            data: {

            },
            async: false,
            success: function(data) {
                var table = "";
                $('#tbd_user_rights').html('');
                for (var i = 0; i < data.length; i++) {


                    if (data[i].submenudata.length > 0) {

                        table += '<tr class="app-sidebar__heading">' +
                            '<td><label class="main"><input type="checkbox"   class="main_chk"  id="_' + data[i].menuid + '" name="' + data[i].menuid + '" value="1">' + data[i].menu_name + '<span class="geekmark"></span></label></td>' +
                            '<td></td>' +
                            '<td></td>' +
                            '<td></td>' +
                            '<td></td>' +
                            '<td></td>' +
                            '</tr>';
                        for (var j = 0; j < data[i].submenudata.length; j++) {
                            table += '<tr class="sub_menu submenuinfo_' + data[i].menuid + '" id="sub_' + data[i].submenudata[j].submenu_id + '">' +
                                '<td ><span >' + data[i].submenudata[j].submenuname + '</span></td>' +

                                '<td><label class="main"><input type="checkbox" class="addchk"  name="main_chk_' + data[i].menuid + '_' + data[i].submenudata[j].submenu_id + '"  id="add_' + data[i].submenudata[j].submenu_id + '" value="0" /><span class="geekmark"></span></label>  </td>' +
                                '<td><label class="main"><input type="checkbox"  class="readchk" name="main_chk_' + data[i].menuid + '_' + data[i].submenudata[j].submenu_id + '"  id="read_' + data[i].submenudata[j].submenu_id + '"  value="0" /><span class="geekmark"></span></label></td>' +

                                '<td><label class="main"><input type="checkbox" class="editchk"  name="main_chk_' + data[i].menuid + '_' + data[i].submenudata[j].submenu_id + '"  id="edit_' + data[i].submenudata[j].submenu_id + '"  value="0" /><span class="geekmark"></span></label></td>' +
                                '<td><label class="main"><input type="checkbox" class="deletechk"   name="main_chk_' + data[i].menuid + '_' + data[i].submenudata[j].submenu_id + '"  id="delete_' + data[i].submenudata[j].submenu_id + '"  value="0" /><span class="geekmark"></span></label></td>' +
                                //'<td><label class="main"><input type="checkbox" class="printchk" name="main_chk_' + data[i].menuid + '_' + data[i].submenudata[j].submenu_id + '"  id="print_' + data[i].submenudata[j].submenu_id + '"  value="0" /><span class="geekmark"></span></label></td>' +
                                '</tr>';
                        }

                    } else {
                        table += '<tr class="app-sidebar__heading">' +
                            '<td><label class="main"><input type="checkbox"   class="main_chk"  id="_' + data[i].menuid + '" name="' + data[i].menuid + '" value="1">' + data[i].menu_name + '<span class="geekmark"></span></label></td>';
                        if (data[i].menuid != 1) {
                            table += '<td><label class="main"><input type="checkbox" class="addchk submenu_' + data[i].menuid + '" name="main_chk_' + data[i].menuid + '"  id="madd_' + data[i].menuid + '" value="0" /><span class="geekmark"></span></label></td>' +
                                '<td><label class="main"><input type="checkbox" class="readchk submenu_' + data[i].menuid + '" name="main_chk_' + data[i].menuid + '"  id="mread_' + data[i].menuid + '"  value="0" /><span class="geekmark"></span></label></td>' +

                                '<td><label class="main"><input type="checkbox" class="editchk submenu_' + data[i].menuid + '" name="main_chk_' + data[i].menuid + '"  id="medit_' + data[i].menuid + '"  value="0" /><span class="geekmark"></span></label></td>' +
                                '<td><label class="main"><input type="checkbox" class="deletechk submenu_' + data[i].menuid + '" name="main_chk_' + data[i].menuid + '"  id="mdelete_' + data[i].menuid + '"  value="0" /><span class="geekmark"></span></label></td>';
                            //  '<td><label class="main"><input type="checkbox" class="exportchk submenu_' + data[i].menuid + '" name="main_chk_' + data[i].menuid + '"  id="mexport_' + data[i].menuid + '"  value="0" /><span class="geekmark"></span></label></td>' +
                            // '<td><label class="main"><input type="checkbox" class="printchk submenu_' + data[i].menuid + '" name="main_chk_' + data[i].menuid + '"  id="mprint_' + data[i].menuid + '"  value="0" /><span class="geekmark"></span></label></td>';
                        } else {
                            table += '<td colspan="5"></td>';
                        }
                        table += '</tr>';
                    }
                }
                $('#tbd_user_rights').html(table);


                // var data = eval(data);
                // var table = '';
                // var table_s = '';

                // for (var i = 0; i < data.length; i++) {
                //     var cnt = 0;
                //     table_s = '';
                //     var mid = data[i].id;

                //     $.ajax({
                //         type: "POST",
                //         url: baseurl + "Userpermission/getSubMenu",
                //         dataType: "JSON",
                //         data: {
                //             id: mid
                //         },
                //         async: false,
                //         success: function(data) {
                //             // var result = eval(result);
                //             //   console.log(result);



                //             cnt = result.length;

                //             for (var i = 0; i < result.length; i++) {
                //                 var create_cm = '  <div class="checkbox"><input type="checkbox" class="check_all_create acc_chk form-control" name="" id="create_' + mid + '_' + result[i].id + '_0" value="0"></div>';
                //                 var read_cm = '<input type="checkbox" class="check_all_read acc_chk" name="" id="read_' + mid + '_' + result[i].id + '_0" value="0">';
                //                 var update_cm = '<input type="checkbox" class="check_all_update acc_chk" name="" id="update_' + mid + '_' + result[i].id + '_0" value="0">';
                //                 var delete_cm = '<label class="main"><input type="checkbox" class="check_all_delete acc_chk" name="" id="delete_' + mid + '_' + result[i].id + '_0" value="0"> <span class="geekmark"></span> </label>';



                //                 table_s += '<tr class="sub_menu">' +
                //                     '<td  class="submenuof_' + mid + '" id="submenu_' + result[i].id + '" name="0"><span >' + result[i].sub_menu_name + '</span></td>' +
                //                     '<td>' + create_cm + '</td>' +
                //                     '<td>' + read_cm + '</td>' +
                //                     '<td>' + update_cm + '</td>' +
                //                     '<td>' + delete_cm + '</td>' +
                //                     '</tr>';


                //             }
                //         }
                //     });
                //     if (cnt == 0) {
                //         var create_c = '<input type="checkbox" class="check_all_create acc_chk" name="" id="create_' + mid + '_0_0" value="0">';
                //         var read_c = '<input type="checkbox" class="check_all_read acc_chk" name="" id="read_' + mid + '_0_0" value="0">';
                //         var update_c = '<input type="checkbox" class="check_all_update acc_chk" name="" id="update_' + mid + '_0_0" value="0">';
                //         var delete_c = '<input type="checkbox" class="check_all_delete acc_chk" name="" id="delete_' + mid + '_0_0" value="0">';

                //         table += '<tr class="main_menu">' +
                //             '<td><span ><input type="checkbox" checked class="menu_chk  check_all_menu" id="menu_' + mid + '" name="submenu_0" value="1"> <b>' + data[i].menuname + '</b></span></td>' +
                //             '<td>' + create_c + '</td>' +
                //             '<td>' + read_c + '</td>' +
                //             '<td>' + update_c + '</td>' +
                //             '<td>' + delete_c + '</td>' +
                //             '</tr>';
                //     } else {

                //         table += '<tr class="main_menu">' +
                //             '<td><span ><input type="checkbox" checked class="menu_chk check_all_menu" id="menu_' + mid + '"  name="submenu_1" value="1"> <b>' + data[i].menuname + '</b></span></td>' +
                //             '<td></td>' +
                //             '<td></td>' +
                //             '<td></td>' +
                //             '<td></td>' +
                //             '</tr>';
                //     }

                //     table += table_s;
                // }
                // console.log(table);

            }

        });

    }

    $(document).on('change', "#select_all_menu", function(e) {
        e.preventDefault();
        if ($(this).is(":checked")) {
            $(this).val(1);
            $(".check_all_menu").val(1);
            $('.check_all_menu').prop('checked', true);
            $(".sub_menu_chk").val(1);
            $('.sub_menu_chk').prop('checked', true);
        } else {
            $(this).val(0);
            $(".check_all_menu").val(0);
            $('.check_all_menu').prop('checked', false);
            $(".sub_menu_chk").val(0);
            $('.sub_menu_chk').prop('checked', false);
        }

    });

    $(document).on('change', "#select_all_create", function(e) {
        e.preventDefault();
        if ($(this).is(":checked")) {
            $(this).val(1);
            $(".check_all_create").val(1);
            $('.check_all_create').prop('checked', true);

        } else {
            $(this).val(0);
            $(".check_all_create").val(0);
            $('.check_all_create').prop('checked', false);

        }

    });
    $(document).on('change', ".check_all_create", function(e) {
        e.preventDefault();
        $("#select_all_create").val(0);
        $('#select_all_create').prop('checked', false);

    });

    $(document).on('change', "#select_all_read", function(e) {
        e.preventDefault();
        if ($(this).is(":checked")) {
            $(this).val(1);
            $(".check_all_read").val(1);
            $('.check_all_read').prop('checked', true);
        } else {
            $(this).val(0);
            $(".check_all_read").val(0);
            $('.check_all_read').prop('checked', false);
        }

    });

    $(document).on('change', ".check_all_read", function(e) {
        e.preventDefault();
        $("#select_all_read").val(0);
        $('#select_all_read').prop('checked', false);

    });

    $(document).on('change', "#select_all_update", function(e) {
        e.preventDefault();
        if ($(this).is(":checked")) {
            $(this).val(1);
            $(".check_all_update").val(1);
            $('.check_all_update').prop('checked', true);
        } else {
            $(this).val(0);
            $(".check_all_update").val(0);
            $('.check_all_update').prop('checked', false);
        }

    });

    $(document).on('change', ".check_all_update", function(e) {
        e.preventDefault();
        $("#select_all_update").val(0);
        $('#select_all_update').prop('checked', false);

    });

    $(document).on('change', "#select_all_delete", function(e) {
        e.preventDefault();
        if ($(this).is(":checked")) {
            $(this).val(1);
            $(".check_all_delete").val(1);
            $('.check_all_delete').prop('checked', true);
        } else {
            $(this).val(0);
            $(".check_all_delete").val(0);
            $('.check_all_delete').prop('checked', false);
        }

    });

    $(document).on('change', ".check_all_delete", function(e) {
        e.preventDefault();
        $("#select_all_delete").val(0);
        $('#select_all_delete').prop('checked', false);

    });

    $(document).on('change', ".acc_chk", function(e) {
        e.preventDefault();

        if ($(this).is(":checked")) {
            $(this).val(1);

        } else {
            $(this).val(0);
        }
    });

    $(document).on('change', ".sub_menu_chk", function(e) {
        e.preventDefault();

        if ($(this).is(":checked")) {
            $(this).val(1);

        } else {
            $(this).val(0);

        }
    });
    $(document).on('change', ".menu_chk", function(e) {
        e.preventDefault();
        $("#select_all_menu").val(0);
        $('#select_all_menu').prop('checked', false);
        if ($(this).is(":checked")) {
            $(this).val(1);

        } else {
            $(this).val(0);

        }


    });

    $(document).on('change', '#role', function(e) {
        e.preventDefault();
        // get_menus();
        var role = $("#role").val();
        $('#tblmenu').show();
        get_menus();
        getrolepermission(role);


    });

    datashow();

    function datashow() {


        $.ajax({
            type: 'POST',
            url: baseurl + "settings/get_master",
            async: false,
            data: {
                table_name: 'role_master',
            },
            dataType: 'json',
            success: function(data) {
                html = '';
                var name = '';
                html += '<option selected disabled value="" >Select</option>';
                for (i = 0; i < data.length; i++) {
                    var id = '';
                    name = data[i].name;
                    id = data[i].id;
                    html += '<option value="' + id + '">' + name + '</option>';
                }
                $('#role').html(html);
            }
        });

    }




    $(document).on('submit', '#master_form', function(e) {
        e.preventDefault();

        // alert("in submit");
        //$(':input[type="submit"]').prop('disabled', true);
        var save_update = $("#save_update").val();
        var role = $("#role").val();

        var userpermission = [];

        $(".main_chk").each(function() {
            var id1 = $(this).attr('id');




            if ($(this).prop("checked") == true) {

                permission = {};
                permission["menuid"] = id1[1];

                permission["submenu"] = 0;

                if ($("#madd_" + id1[1]).prop("checked") == true) {

                    permission["addpermission"] = 1;


                } else {
                    permission["addpermission"] = 0;
                }

                if ($("#medit_" + id1[1]).prop("checked") == true) {

                    permission["editpermission"] = 1;



                } else {
                    permission["editpermission"] = 0;
                }

                if ($("#mdelete_" + id1[1]).prop("checked") == true) {

                    permission["deletepermission"] = 1;



                } else {
                    permission["deletepermission"] = 0;
                }
                if ($("#mread_" + id1[1]).prop("checked") == true) {

                    permission["readpermission"] = 1;



                } else {
                    permission["readpermission"] = 0;
                }
                // if ($("#mprint_" + id1[1]).prop("checked") == true) {

                //     permission["printpermission"] = 1;



                // } else {
                //     permission["printpermission"] = 0;
                // }
                userpermission.push(permission);

                console.log(userpermission);

                $(".submenuinfo_" + id1[1]).each(function() {
                    var submenu = $(this).attr('id');
                    var name = $(this).attr('name');
                    console.log("id1", id1[1], 'name', name);
                    submenu = submenu.split("_");
                    permission = {};
                    permission["menuid"] = id1[1];
                    var flg = 0;



                    permission["submenu"] = submenu[1];

                    if ($("#add_" + submenu[1]).prop("checked") == true) {

                        permission["addpermission"] = 1;
                        flg = 1;


                    } else {
                        permission["addpermission"] = 0;
                    }

                    if ($("#edit_" + submenu[1]).prop("checked") == true) {

                        permission["editpermission"] = 1;

                        flg = 1;

                    } else {
                        permission["editpermission"] = 0;
                    }

                    if ($("#delete_" + submenu[1]).prop("checked") == true) {

                        permission["deletepermission"] = 1;
                        flg = 1;



                    } else {
                        permission["deletepermission"] = 0;
                    }

                    if ($("#read_" + submenu[1]).prop("checked") == true) {

                        permission["readpermission"] = 1;
                        flg = 1;
                    } else {
                        permission["readpermission"] = 0;
                    }
                    // if ($("#print_" + submenu[1]).prop("checked") == true) {

                    //     permission["printpermission"] = 1;
                    //     flg = 1;
                    // } else {
                    //     permission["printpermission"] = 0;
                    // }


                    if (flg == 1) {
                        userpermission.push(permission);
                    }
                });

            }

        });
        console.log(userpermission);

        $.ajax({
            data: {
                userpermission: userpermission,
                role: role,


            },
            url: baseurl + "Userpermission/savepermission",
            type: "POST",
            dataType: 'json',
            // async: false,
            success: function(data) {

                successTost("Saved Successfully");


            }
        });
    });


    function getrolepermission(role) {

        $.ajax({
            data: {

                role: role,


            },
            url: baseurl + "Userpermission/getuserpermission",
            type: "POST",
            dataType: 'json',
            // async: false,
            success: function(data) {

                for (var i = 0; i < data.length; i++) {



                    if (data[i].create_p == 1) {
                        $('#_' + data[i].menu_id).prop('checked', true);


                        $('#add_' + data[i].submenu_id).prop('checked', true);


                    } else {
                        $('#add_' + data[i].submenu_id).prop('checked', false);
                    }
                    if (data[i].edit_p == 1) {
                        $('#_' + data[i].menu_id).prop('checked', true);


                        $('#edit_' + data[i].submenu_id).prop('checked', true);


                    } else {
                        $('#edit_' + data[i].submenu_id).prop('checked', false);
                    }

                    if (data[i].delete_p == 1) {

                        $('#_' + data[i].menu_id).prop('checked', true);

                        $('#delete_' + data[i].submenu_id).prop('checked', true);


                    } else {
                        $('#delete_' + data[i].submenu_id).prop('checked', false);
                    }

                    if (data[i].read_p == 1) {

                        $('#_' + data[i].menu_id).prop('checked', true);

                        $('#read_' + data[i].submenu_id).prop('checked', true);


                    } else {
                        $('#read_' + data[i].submenu_id).prop('checked', false);
                    }




                    if (data[i].menu_id > 0 && data[i].submenu_id == 0) {
                        $('#_' + data[i].menu_id).prop('checked', true);


                        if (data[i].create_p == 1) {


                            $('#madd_' + data[i].menu_id).prop('checked', true);


                        } else {
                            $('#madd_' + data[i].menu_id).prop('checked', false);
                        }
                        if (data[i].edit_p == 1) {


                            $('#medit_' + data[i].menu_id).prop('checked', true);


                        } else {
                            $('#medit_' + data[i].menu_id).prop('checked', false);
                        }

                        if (data[i].delete_p == 1) {


                            $('#mdelete_' + data[i].menu_id).prop('checked', true);


                        } else {
                            $('#mdelete_' + data[i].menu_id).prop('checked', false);
                        }

                        if (data[i].read_p == 1) {


                            $('#mread_' + data[i].menu_id).prop('checked', true);


                        } else {
                            $('#mread_' + data[i].menu_id).prop('checked', false);
                        }



                    }

                }
            }

        });
    }


    $(document).on('change', '.allchkcheck', function(e) {
        e.preventDefault();
        var id = $(this).attr('id');
        if ($(this).prop("checked") == true) {

            if (id == "alladdchk") {
                $('.addchk').prop("checked", true);
            } else if (id == "alledit") {
                $('.editchk').prop("checked", true);
            } else if (id == "alldelete") {
                $('.deletechk').prop("checked", true);
            } else if (id == "allreadchk") {
                $('.readchk').prop("checked", true);
            }
        } else {

            if (id == "alladdchk") {
                $('.addchk').prop("checked", false);
            } else if (id == "alledit") {
                $('.editchk').prop("checked", false);
            } else if (id == "alldelete") {
                $('.deletechk').prop("checked", false);
            } else if (id == "allreadchk") {
                $('.readchk').prop("checked", false);
            }
        }
    });

    $(document).on('click', "#reset", function(e) {
        e.preventDefault();
        form_clear();
        getallmenu();

    });
    $(document).on('click', ".closehideshow", function(e) {
        e.preventDefault();
        form_clear();
        getallmenu();
    });
    $(document).on('click', '.delete_data', function() {
        var id1 = $(this).attr('id');
        var role = $("#role_" + id1).html();
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
                        url: delete_data,
                        data: {
                            role: role,
                        },
                        async: false,
                        success: function(data) {

                            if (data > 0) {
                                swal("Deleted !!", "Hey, your Data has been deleted !!", "success");
                                $('.closehideshow').trigger('click');
                                $('#save_update').val("");
                                datashow(); //call function show all data
                            } else {
                                errorTost("Data Delete Failed");
                            }

                        },
                        error: function(data) {
                            console.log('Error:', data);
                        }
                    });


                    return false;
                });
        }
    });
});