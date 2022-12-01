$(document).ready(function() {
    selectric();
});


function selectric() {
    $('select').selectric();
    $('select').selectric().on('change', function() {
        if ($(this).val() === "new") {
            $('#author-input').fadeIn(200);
        } else {
            $('#author-input').fadeOut(200);
        }
    });
}