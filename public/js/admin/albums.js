$(document).ready(function () {
    albumsOverlay();
    selectric();
});

function albumsOverlay() {
    $('.album-item').hover(function () {
        const currentAlbum = $(this);
        currentAlbum.children(".album-item-overlay").fadeIn(200);
    }, function () {
        const currentAlbum = $(this);
        currentAlbum.children(".album-item-overlay").fadeOut(200);
    });
}

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