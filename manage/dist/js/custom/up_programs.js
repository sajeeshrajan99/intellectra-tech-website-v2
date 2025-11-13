$(function() {
    $("#speakersDataTable").DataTable({
        "responsive": true,
        "autoWidth": false,
        "columnDefs": [{
            "orderable": false,
            "targets": -1,
            "width": "70px"
        }]
    });
});

function changeStatus(token, status) {
    $('#speakersDataTableDiv').block({ message: "Please wait..." });
    $.ajax({
        url: "up_programs/status.php",
        type: "POST",
        data: "token=" + token + "&status=" + status,
        dataType: 'JSON',
        success: function(data) {
            var result = JSON.parse(JSON.stringify(data));
            if (result.status == 1) {
                toastr.success(result.message);
                location.reload();
            } else {
                toastr.error(result.message);
                $('#speakersDataTableDiv').unblock();
            }
        }
    });
}

function changeOrder(token) {
    var order_no = $("#order_no" + token).val();
    $('#speakersDataTable').block({
        message: "Please wait..."
    });
    $.ajax({
        url: "up_programs/changeOrder.php?token=" + token + "&order_no=" + order_no,
        type: "POST",
        data: '',
        dataType: 'JSON',
        success: function(data) {
            var result = JSON.parse(JSON.stringify(data));
            if (result.status == 1) {
                toastr.success(result.message);
                $('#speakersDataTable').unblock();
            } else {
                toastr.error(result.message);
                $("#order_no" + token).focus();
                $('#speakersDataTable').unblock();
            }
        }
    });
}