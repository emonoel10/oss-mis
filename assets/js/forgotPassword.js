var forgotPassword = (function () {
    function _init() {
        $(document).on("submit", "form#resendEmailForm", function (e) {
            e.preventDefault();
            e.stopPropagation();

            var account = $("form#resendEmailForm").serializeArray();

            $.ajax({
                url: 'forgotPasswordController.php',
                type: 'POST',
                data: account,
                dataType: 'json',
                success: function (response) {
                    console.log(response);
                    if (response.success === true) {
                        $("form#resendEmailForm").html(response.msg);
                    }
                },
                error: function (xhr) {
                    console.log('error: ' + window.JSON.stringify(xhr));
                }
            })
        });
    }

    function popupalertmessage() {
        $('#alert_error').slideToggle("slow").delay(1500).slideToggle("slow");
    }

    return {
        init: function () {
            _init();
        }
    }
}());

$(function () {
    forgotPassword.init();
});
