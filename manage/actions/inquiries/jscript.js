$(document).ready(function() {
    let enable_search = true;
    $("#dataTable").dataTable({
        responsive: false,
        displayStart: 0,
        processing: true,
        serverSide: true,
        serverMethod: "post",
        searching: enable_search,
        ajax: {
            url: "actions/inquiries/get.php",
        },
        columns: [
            {
                data: "name",
            },
            {
                data: "email",
            },
            {
                data: "contact_no",
            },
             {
                data: "subject",
            },
            {
                data: "message",
            },
            {
                data: "created_at",
            },
            {
                data: "actions",
            },
        ],
        columnDefs: [{
            targets: -1,
            title: "-",
            orderable: false,
            width: "80px",
            className: "text-center align-middle p-0",
            render: function render(data, type, full, meta) {
                let deleteit = "deleteit('" + full.token + "')";
                return (
                    `<button class="btn text-danger btn-sm px-3" onclick="${deleteit}"><i class="fa fa-trash"></i></button>`
                );
            },
        }, ],
    });
});


function deleteit(token) {
    if (confirm("Are you sure you want to delete this?\nThere is no undo for this action.")) {
        $.ajax({
            url: "actions/inquiries/delete.php",
            type: "POST",
            data: "token=" + token,
            dataType: "JSON",
            success: function(data) {
                let result = JSON.parse(JSON.stringify(data));
                if (result.status == 1) {
                    toastr.success(result.message);
                    $("#dataTableDiv").unblock();
                    $("#dataTable").DataTable().ajax.reload();
                } else {
                    toastr.error(result.message);
                    $("#dataTableDiv").unblock();
                }
            },
        });
    }
}