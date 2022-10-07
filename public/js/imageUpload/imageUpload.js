const image_input = document.querySelector('#images');
var uploaded_image = "";

image_input.addEventListener("change", function() {
    const reader = new FileReader();
    const previewIcon = $('#icon-preview');
    const previewImage = $('#image-preview');
    reader.addEventListener("load", () => {
        previewIcon.fadeOut(200);
        previewImage.fadeIn(200);
        uploaded_image = reader.result;
        $("#image-preview").attr('src', uploaded_image);
    })
    reader.readAsDataURL(this.files[0]);
});