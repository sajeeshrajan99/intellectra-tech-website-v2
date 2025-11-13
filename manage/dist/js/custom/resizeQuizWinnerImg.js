var fileReader = new FileReader();
var filterType = /^(?:image\/bmp|image\/cis\-cod|image\/gif|image\/ief|image\/jpeg|image\/jpeg|image\/jpeg|image\/pipeg|image\/png|image\/svg\+xml|image\/tiff|image\/x\-cmu\-raster|image\/x\-cmx|image\/x\-icon|image\/x\-portable\-anymap|image\/x\-portable\-bitmap|image\/x\-portable\-graymap|image\/x\-portable\-pixmap|image\/x\-rgb|image\/x\-xbitmap|image\/x\-xpixmap|image\/x\-xwindowdump)$/i;

fileReader.onload = function(event) {
    $('#createSpeakerForm').block({ message: "Please wait, uploading..." });
    var image = new Image();

    image.onload = function() {
        // document.getElementById("original-Img").src = image.src;
        var canvas = document.createElement("canvas");
        var context = canvas.getContext("2d");

        /* ADDED CODE */
        canvas.width = 400;
        canvas.height = 400;
        context.drawImage(image, 0, 0, image.width, image.height, 0, 0, canvas.width, canvas.height);
        document.getElementById("upload-Preview").src = canvas.toDataURL();
        document.getElementById("newUpImg").value = canvas.toDataURL();
        setTimeout($('#createSpeakerForm').unblock(), 1000);

    }
    image.src = event.target.result;
};

var loadImageFile = function() {
    var uploadImage = document.getElementById("upload-Image");

    //check and retuns the length of uploded file.
    if (uploadImage.files.length === 0) {
        document.getElementById("upload-Preview").src = '';
        document.getElementById("newUpImg").value = '';
        return;
    }

    //Is Used for validate a valid file.
    var uploadFile = document.getElementById("upload-Image").files[0];
    if (!filterType.test(uploadFile.type)) {
        // alert("Please select a valid image.");
        $('#createSpeakerForm').block({ message: "Please select a valid image" });
        setTimeout($('#createSpeakerForm').unblock(), 1000);

        return;
    }
    $('#createSpeakerForm').block({ message: "Please wait..." });
    fileReader.readAsDataURL(uploadFile);
}