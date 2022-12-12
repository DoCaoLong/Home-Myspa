if (window.screen.width > 768) {
    $(".popup-regis_mb").remove();
} else {
    $(".popup-regis").remove();
}

let errText = document.querySelector(".test-err_form");
const handleSubmitRegisFormBeautyx = () => {
    if ($("#reg_phone").val() !== "") {
        errText.classList.remove("active");
        grecaptcha.ready(function () {
            grecaptcha
                .execute(RECAPTCHA_V3_SITE_KEY, {
                    action: "submit",
                })
                .then(function (token) {
                    let x = {
                        reg_name: $("#reg_name").val(),
                        reg_phone: $("#reg_phone").val(),
                        reg_business_name: $("#reg_business_name").val(),
                        reg_business_add: $("#reg_business_add").val(),
                        reg_email: $("#reg_email").val(),
                        reg_referral: $("#reg_referral").val(),
                        reg_discount_code: $("#reg_discount_code").val(),
                        reg_branch_amount: $("#reg_branch_amount").val(),
                        reg_pass: "",
                        reg_type: $("#reg_type").val(),
                        reg_captcha: token,
                        reg_action: "submit",
                    };
                    console.log(x);
                    // Raven.setUserContext(x);
                    // Raven.captureMessage("Đăng ký", {
                    //     level: "info", // one of 'info', 'warning', or 'error'
                    // });

                    if (x.reg_phone !== "") {
                        $.ajax({
                            url: BASE_URL + "Frontend/register_momo",
                            type: "post",
                            async: true,
                            dataType: "json",
                            data: {
                                reg_name: $("#reg_name").val(),
                                reg_phone: $("#reg_phone").val(),
                                reg_business_name:
                                    $("#reg_business_name").val(),
                                reg_business_add: $("#reg_business_add").val(),
                                reg_email: $("#reg_email").val(),
                                reg_referral: $("#reg_referral").val(),
                                reg_discount_code: "",
                                reg_branch_amount:
                                    $("#reg_branch_amount").val(),
                                reg_pass: "",
                                reg_type: $("#reg_type").val(),
                                reg_captcha: token,
                                reg_action: "submit",
                            },
                            success: function (res) {
                                // console.log(res);
                                // if (typeof res == 'object' && res.status != 'fail') {
                                window.location =
                                    BASE_URL + "thank-you-for-register";
                            },
                        });
                    } else {
                        console.log("error");
                    }
                });
        });
    } else {
        errText.classList.add("active");
    }
};
