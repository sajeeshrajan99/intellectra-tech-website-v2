$(function() {
    $("#speakersDataTable").DataTable({
        "responsive": true,
        "autoWidth": false,
        "columnDefs": [{
                "orderable": false,
                "targets": -1,
                "width": "70px"
            }]
            // ,
            // dom: 'Bfrtip',
            // buttons: [{
            //         extend: 'excelHtml5',
            //         exportOptions: {
            //             columns: [0, 1, 2, 4]
            //         }
            //     },
            //     {
            //         extend: 'pdfHtml5',
            //         exportOptions: {
            //             columns: [0, 1, 2, 4]
            //         }
            //     },
            // ]
    });
});

function changeStatus(token, status) {
    $('#speakersDataTableDiv').block({ message: "Please wait..." });
    $.ajax({
        url: "speakers/status.php",
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