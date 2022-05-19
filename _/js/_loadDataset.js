$(document).ready(function () {
    
    $('#loading').hide();
    
    });


$("#loadDataset").click(function () {
    $('#loading').show();
    $.post("http://localhost/SCAP/_/php/startProjectSession.php", function (data, status) {
        $('#loading').hide();
        $("#text_load").html("<p><h4>New data loaded.</h4>");
        window.location.reload();
    });
});