
<div class="modal-header bg-dark">
    <h4 class="modal-title text-center w-100">UPDATE PASSWORD</h4>
</div>
<form role="form" id="updatePasswordForm" autocomplete="off">
    <div class="modal-body">
        <div class="row">
            <div class="col-12 float-left">
                <div class="form-group">
                    <input type="password" class="form-control form-control-lg mb-0" name="cPassword" required placeholder="enter current password">
                </div>
            </div>
            <div class="col-12 float-left">
                <div class="form-group">
                    <input type="password" name="nPassword" class="form-control form-control-lg py-2 mb-0 text-left" placeholder="enter new password" required>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group mb-0">
                    <input type="password" name="rPassword" class="form-control form-control-lg py-2 mb-0 text-left" placeholder="re-enter new password" required>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn border btn-lg" data-dismiss="modal">CANCEL</button>
        <button type="submit" class="btn btn-dark btn-lg">UPDATE</button>
    </div>
</form>
<script>
    $('#updatePasswordForm').on('submit', function(event) {
        event.preventDefault();
        var formData = $("#updatePasswordForm").serialize();
        $('#updatePasswordForm').block({
            message: "Please wait..."
        });
        $.ajax({
            url: "updatePassword.php",
            type: "POST",
            data: formData,
            dataType: 'JSON',
            success: function(data) {
                var result = JSON.parse(JSON.stringify(data));
                if (result.status == 1) {
                    window.location.href = "logout.php";
                } else {
                    toastr.error(result.message);
                    $('#updatePasswordForm').unblock();
                }
            }
        });
    });
</script>