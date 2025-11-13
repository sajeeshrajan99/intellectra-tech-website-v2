$('#getinForm').on('submit', function(event) {
    event.preventDefault();
    var formData = $("#getinForm").serialize();
    $.ajax({
        url: "actions/getin.php",
        type: "POST",
        data: formData,
        dataType: 'JSON',
        success: function(data) {
            var result = JSON.parse(JSON.stringify(data));
            if (result.status == 1) {
                toastr.clear();
                toastr.success(result.message);
                location.href = 'dashboard';
            } else {
                toastr.clear();
                toastr.error(result.message);
            }
        }
    });
});

function forgotPassword() {
    var formData = $("#getinForm").serialize();
    $.ajax({
        url: "forgotPassword.php",
        type: "POST",
        data: formData,
        dataType: 'JSON',
        success: function(data) {
            var result = JSON.parse(JSON.stringify(data));
            if (result.status == 1) {
                toastr.clear();
                toastr.success(result.message);
            } else {
                toastr.clear();
                toastr.error(result.message);
            }
        }
    });
}