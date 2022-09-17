$(document).ready(function() {
    albumsOverlay();
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