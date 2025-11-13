$("#publcishNowForm").on("submit", function(event) {
    event.preventDefault();
    var formData = $("#publcishNowForm").serialize();
    $("#publcishNowForm").block({
        message: "Please wait...",
    });
    var stage = 1;
    $.ajax({
        url: "courses/publish-now-action.php",
        type: "POST",
        data: formData + "&stage=" + stage,
        dataType: "JSON",
        success: function(data) {
            var result = JSON.parse(JSON.stringify(data));
            if (result.status == 1) {
                toastr.success(result.message);
                if (result.status == 1) {
                    var stage = 2;
                    $.ajax({
                        url: "courses/publish-now-action.php",
                        type: "POST",
                        data: formData + "&stage=" + stage,
                        dataType: "JSON",
                        success: function(data) {
                            var result = JSON.parse(JSON.stringify(data));
                            if (result.status == 1) {
                                $("#publcishNowForm").block({
                                    message: result.message,
                                });
                                if (result.status == 1) {
                                    var stage = 2;
                                    $.ajax({
                                        url: "courses/publish-now-action.php",
                                        type: "POST",
                                        data: formData + "&stage=" + stage,
                                        dataType: "JSON",
                                        success: function(data) {
                                            var result = JSON.parse(JSON.stringify(data));
                                            if (result.status == 1) {
                                                $("#publcishNowForm").block({
                                                    message: result.message,
                                                });
                                                if (result.status == 1) {
                                                    var stage = 3;
                                                    $.ajax({
                                                        url: "courses/publish-now-action.php",
                                                        type: "POST",
                                                        data: formData + "&stage=" + stage,
                                                        dataType: "JSON",
                                                        success: function(data) {
                                                            var result = JSON.parse(JSON.stringify(data));
                                                            if (result.status == 1) {
                                                                $("#publcishNowForm").block({
                                                                    message: result.message,
                                                                });
                                                                if (result.status == 1) {
                                                                    var stage = 4;
                                                                    $.ajax({
                                                                        url: "courses/publish-now-action.php",
                                                                        type: "POST",
                                                                        data: formData + "&stage=" + stage,
                                                                        dataType: "JSON",
                                                                        success: function(data) {
                                                                            var result = JSON.parse(
                                                                                JSON.stringify(data)
                                                                            );
                                                                            if (result.status == 1) {
                                                                                $("#publcishNowForm").block({
                                                                                    message: result.message,
                                                                                });
                                                                                if (result.status == 1) {
                                                                                    toastr.success(result.message);
                                                                                    location.reload();
                                                                                }
                                                                            } else {
                                                                                $("#publcishNowForm").block({
                                                                                    message: result.message,
                                                                                });
                                                                            }
                                                                        },
                                                                    });
                                                                }
                                                            } else {
                                                                $("#publcishNowForm").block({
                                                                    message: result.message,
                                                                });
                                                            }
                                                        },
                                                    });
                                                }
                                            } else {
                                                $("#publcishNowForm").block({
                                                    message: result.message,
                                                });
                                            }
                                        },
                                    });
                                }
                            } else {
                                $("#publcishNowForm").block({
                                    message: result.message,
                                });
                            }
                        },
                    });
                }
            } else {
                $("#publcishNowForm").block({
                    message: result.message,
                });
            }
        },
    });
});