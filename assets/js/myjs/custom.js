$(document).ready(function() {
    $('#example').DataTable();

    $('.select2').select2({
        selectOnClose: true
    });

    $(".formhideshow").hide();
    $(".tablehideshow").show();
    $(".btnhideshow").show();

    $(".btnhideshow").click(function() {
        $('#btnsave').text('Save');

        $(".formhideshow").show();
        // $(".tablehideshow").hide();
        $(".btnhideshow").hide();
    });

    $(".closehideshow").click(function() {
        $('#master_form')[0].reset();
        $('#save_update').val("");
        $('#batch').val("").trigger('change');
        $(".btnhideshow").show();
        $(".tablehideshow").show();
        $(".formhideshow").hide();
        $('#item_name').attr("disabled", false);
        $('#batch_name').attr("disabled", false);

    });



    $(".formhideshow1").hide();
    $(".tablehideshow1").show();
    $(".btnhideshow1").show();

    $(".btnhideshow1").click(function() {

        $(".formhideshow1").show();
        $(".tablehideshow1").hide();
        $(".btnhideshow1").hide();
    });

    $(".closehideshow1").click(function() {
        $(".btnhideshow1").show();
        $(".tablehideshow1").show();
        $(".formhideshow1").hide();

    });


});