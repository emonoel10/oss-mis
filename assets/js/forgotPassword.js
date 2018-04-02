var forgotPassword = (function () {
    function _init() {
        $(document).on("submit", "form#resetPasswordForm", function (e) {
            e.preventDefault();
            e.stopPropagation();

            var account = $("form#resetPasswordForm").serializeArray();

            $("form#resetPasswordForm button#resetPasswordSubmit").empty().html('<div class="sk-fading-circle"><div class="sk-circle1 sk-circle"></div><div class="sk-circle2 sk-circle"></div><div class="sk-circle3 sk-circle"></div><div class="sk-circle4 sk-circle"></div><div class="sk-circle5 sk-circle"></div><div class="sk-circle6 sk-circle"></div><div class="sk-circle7 sk-circle"></div><div class="sk-circle8 sk-circle"></div><div class="sk-circle9 sk-circle"></div><div class="sk-circle10 sk-circle"></div><div class="sk-circle11 sk-circle"></div><div class="sk-circle12 sk-circle"></div></div>');

            $.ajax({
                url: 'forgotPasswordController.php',
                type: 'POST',
                data: account,
                dataType: 'json',
                success: function (response) {
                    console.log(response);
                    if (response.success === true) {
                        $("form#resetPasswordForm > div.container").empty().html(response.msg);
                    } else {
                        $("form#resetPasswordForm button#resetPasswordSubmit").empty().text('Submit');
                        $("form#resetPasswordForm p.error_cntnr").empty().text(response.msg);
                    }
                },
                error: function (xhr) {
                    console.log('error: ' + window.JSON.stringify(xhr));
                    $("form#resetPasswordForm p.error_cntnr").empty().text(xhr);
                }
            })
        });

        $(document).on("submit", "form#confirmResetPasswordForm", function (e) {
            e.preventDefault();
            e.stopPropagation();

            var account = $("form#confirmResetPasswordForm").serializeArray();

            $("form#confirmResetPasswordForm button#confirmResetPasswordSubmit").empty().html('<div class="sk-fading-circle"><div class="sk-circle1 sk-circle"></div><div class="sk-circle2 sk-circle"></div><div class="sk-circle3 sk-circle"></div><div class="sk-circle4 sk-circle"></div><div class="sk-circle5 sk-circle"></div><div class="sk-circle6 sk-circle"></div><div class="sk-circle7 sk-circle"></div><div class="sk-circle8 sk-circle"></div><div class="sk-circle9 sk-circle"></div><div class="sk-circle10 sk-circle"></div><div class="sk-circle11 sk-circle"></div><div class="sk-circle12 sk-circle"></div></div>');

            $.ajax({
                url: 'forgotPasswordController.php',
                type: 'POST',
                data: account,
                dataType: 'json',
                success: function (response) {
                    console.log(response);
                    if (response.success === true) {
                        $("form#confirmResetPasswordForm > div.container").empty().html(response.msg).css('padding', '15px');
                        setTimeout(function () {
                            window.location.href = "graduatesLogin.php";
                        }, 3000);
                    } else {
                        $("form#confirmResetPasswordForm button#confirmResetPasswordSubmit").empty().text('Reset Password');
                        $("form#confirmResetPasswordForm p.error_cntnr").empty().text(response.msg);
                    }
                },
                error: function (xhr) {
                    console.log('error: ' + window.JSON.stringify(xhr));
                    $("form#confirmResetPasswordForm p.error_cntnr").empty().text(xhr);
                }
            })
        });

        $("input[name='account']").on('keydown', function (e) {
            $("form#resetPasswordForm p.error_cntnr").empty();
        });

        $("input[name='newAccountPassword']").on('keydown', function (e) {
            $("form#confirmResetPasswordForm p.error_cntnr").empty();
        });
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
