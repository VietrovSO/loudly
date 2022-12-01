$(document).ready(function() {
    selectric();
});


function selectric() {
    $('select').selectric();
    $('select').selectric().on('change', function () {
        const inputElement = $(this).parents(".selectric-wrapper").siblings("input");
        if ($(this).val() === "new" && inputElement) {
            inputElement.fadeIn(200);
        } else {   
            inputElement.fadeOut(200);
        }
    });
}