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
        url: "quiz_winners/status.php",
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