$(function() {
    $("#coursesDataTable").DataTable({
        "responsive": true,
        "autoWidth": false,
        "columnDefs": [{
            "orderable": false,
            "targets": -1,
            "width": "70px"
        }]
    });
});
$('#updateStage1').on('submit', function(event) {
    event.preventDefault();
    var formData = $("#updateStage1").serialize();
    $('#updateStage1Main').block({
        message: "Please wait..."
    });
    $.ajax({
        url: "courses/updateStage1.php",
        type: "POST",
        data: formData,
        dataType: 'JSON',
        success: function(data) {
            var result = JSON.parse(JSON.stringify(data));
            if (result.status == 1) {
                toastr.success(result.message);
                // window.location.href = "edit-course.php?token=" + result.token;
                location.reload();
                $('#updateStage1Main').unblock();
            } else {
                toastr.error(result.message);
                $('#updateStage1Main').unblock();
            }
        }
    });
});
$('#updatePricing').on('submit', function(event) {
    event.preventDefault();
    var formData = $("#updatePricing").serialize();
    $('#updatePricingMain').block({
        message: "Please wait..."
    });
    $.ajax({
        url: "courses/updatePricing.php",
        type: "POST",
        data: formData,
        dataType: 'JSON',
        success: function(data) {
            var result = JSON.parse(JSON.stringify(data));
            if (result.status == 1) {
                toastr.success(result.message);
                // window.location.href = "edit-course.php?token=" + result.token;
                location.reload();
                $('#updatePricingMain').unblock();
            } else {
                toastr.error(result.message);
                $('#updatePricingMain').unblock();
            }
        }
    });
});
$('#descriptionForm').on('submit', function(event) {
    event.preventDefault();
    var formData = $("#descriptionForm").serialize();
    $('#descriptionFormMain').block({
        message: "Please wait..."
    });
    $.ajax({
        url: "courses/descriptionForm.php",
        type: "POST",
        data: formData,
        dataType: 'JSON',
        success: function(data) {
            var result = JSON.parse(JSON.stringify(data));
            if (result.status == 1) {
                toastr.success(result.message);
                // window.location.href = "edit-course.php?token=" + result.token;
                location.reload();
            } else {
                toastr.error(result.message);
                $('#descriptionFormMain').unblock();
            }
        }
    });
});
$('#upload_thumbnail').on('submit', function(event) {
    event.preventDefault();
    // var formData = $("#upload_thumbnail").serialize();
    // Get form
    var form = $('#upload_thumbnail')[0];

    // Create an FormData object 
    var formData = new FormData(form);
    /* TOAST */
    $('#changeCoverDiv').block({
        message: "Please wait, uploading..."
    });
    $.ajax({
        url: "courses/change_thumbnail.php",
        enctype: 'multipart/form-data',
        type: "POST",
        data: formData,
        dataType: 'JSON',
        processData: false,
        contentType: false,
        cache: false,
        success: function(data) {
            var result = JSON.parse(JSON.stringify(data));
            if (result.status == 1) {
                /* TOAST SUCCESS */
                // console.log(result.message);
                toastr.success(result.message);
                location.reload();
            } else {
                /* TOAST DANGER */
                toastr.error(result.message);
                $('#changeCoverDiv').unblock();
            }
        }
    });
});
$('#upload_cover').on('submit', function(event) {
    event.preventDefault();
    // var formData = $("#upload_cover").serialize();
    // Get form
    var form = $('#upload_cover')[0];

    // Create an FormData object 
    var formData = new FormData(form);
    /* TOAST */
    $('#changeCoverDiv').block({
        message: "Please wait, uploading..."
    });
    $.ajax({
        url: "courses/change_cover.php",
        enctype: 'multipart/form-data',
        type: "POST",
        data: formData,
        dataType: 'JSON',
        processData: false,
        contentType: false,
        cache: false,
        success: function(data) {
            var result = JSON.parse(JSON.stringify(data));
            if (result.status == 1) {
                /* TOAST SUCCESS */
                // console.log(result.message);
                toastr.success(result.message);
                location.reload();
            } else {
                /* TOAST DANGER */
                toastr.error(result.message);
                $('#changeCoverDiv').unblock();
            }
        }
    });
});

function loadThumbnail(input) {
    if (input.files && input.files[0]) {

        var reader = new FileReader();
        reader.onload = function(e) {
            document.querySelector("#thumbnail_preview").setAttribute("src", e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
        $("#submit_thumbnail").show();
    }
}

function loadCover(input) {
    if (input.files && input.files[0]) {

        var reader = new FileReader();
        reader.onload = function(e) {
            document.querySelector("#cover_preview").setAttribute("src", e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
        $("#submit_cover").show();
    }
}

function changeOrder(token) {
    var order_no = $("#order_no" + token).val();
    $('#coursesDataTable').block({
        message: "Please wait..."
    });
    $.ajax({
        url: "courses/changeOrder.php?token=" + token + "&order_no=" + order_no,
        type: "POST",
        data: '',
        dataType: 'JSON',
        success: function(data) {
            var result = JSON.parse(JSON.stringify(data));
            if (result.status == 1) {
                toastr.success(result.message);
                $('#coursesDataTable').unblock();
            } else {
                toastr.error(result.message);
                $("#order_no" + token).focus();
                $('#coursesDataTable').unblock();
            }
        }
    });
}