$(document).ready(function() {
    albumsOverlay();
    selectric();
});

function albumsOverlay() {
    $('.album-item').hover(function() {
        const currentAlbum = $(this);
        currentAlbum.children(".album-item-overlay").fadeIn(200);
    }, function() {
        const currentAlbum = $(this);
        currentAlbum.children(".album-item-overlay").fadeOut(200);
    });
}

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