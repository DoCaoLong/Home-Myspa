// validate form

// popup regis software
let btnNextRegisSoftware = document.querySelectorAll(".sofware-form_button");
let btnPrevRegisSoftware = document.querySelectorAll(".btn-prev_software");
let popupRegisSoftware = document.querySelector(".popup-software");
let itemStep = document.querySelectorAll(".software-progressbar_step");
let formSoftware = document.querySelectorAll(".software-form");
let softName = document.querySelector(".popup-sofware_form #reg_name2");
let softEmail = document.querySelector(".popup-sofware_form #reg_email2");
let softPhone = document.querySelector(".popup-sofware_form #reg_phone2");
let softNameBusiness = document.querySelector(
    ".popup-sofware_form #reg_business_name2"
);
let softBusinessAdd = document.querySelector(
    ".popup-sofware_form #reg_business_add2"
);

// submit form
const handleSubmitRegisFormAppDesign = () => {
    const values = checkValidate();
    if (values) {
        grecaptcha.ready(function () {
            grecaptcha
                .execute(RECAPTCHA_V3_SITE_KEY, {
                    action: "submit",
                })
                .then(function (token) {
                    let x = {
                        reg_name: $("#reg_name2").val(),
                        reg_phone: $("#reg_phone2").val(),
                        reg_business_name: $("#reg_business_name2").val(),
                        reg_business_add: $("#reg_business_add2").val(),
                        reg_email: $("#reg_email2").val(),
                        reg_referral: $("#reg_referral").val(),
                        reg_discount_code: $("#reg_discount_code").val(),
                        reg_branch_amount: $("#reg_branch_amount").val(),
                        reg_pass: "",
                        reg_type: $("#reg_type").val(),
                        reg_captcha: token,
                        reg_action: "submit",
                    };
                    // console.log(x);
                    if (x.reg_phone !== "") {
                        $.ajax({
                            url: BASE_URL + "Frontend/register_momo",
                            type: "post",
                            async: true,
                            dataType: "json",
                            data: {
                                reg_name: $("#reg_name2").val(),
                                reg_phone: $("#reg_phone2").val(),
                                reg_business_name: $(
                                    "#reg_business_name2"
                                ).val(),
                                reg_business_add: $("#reg_business_add2").val(),
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
                    }
                });
        });
        console.log(values);
    }
};
// close submit form

// active popup software
const openPopupRegisBrandApp = () => {
    popupRegisSoftware.classList.add("active");
};
// close active popup software

document.body.addEventListener("click", (e) => {
    if (e.target.parentNode.matches(".form-regis_cancel")) {
        popupRegisSoftware.classList.remove("active");
    } else if (
        e.target.matches(".popup-software") ||
        e.target.matches(".btn-close")
    ) {
        popupRegisSoftware.classList.remove("active");
    }
});

const checkValidate = () => {
    let valName = softName.value.trim();
    let valTelephone = softPhone.value.trim();
    let valNameBusi = softNameBusiness.value.trim();
    let valBusinessAdd = softBusinessAdd.value.trim();
    let valEmail = softEmail.value.trim();
    let isCheck = true;

    if (valName === "") {
        setError(softName, "Quỹ đầu tư không được để trống");
        isCheck = false;
    }
    if (valBusinessAdd === "") {
        setError(softBusinessAdd, "Vui lòng nhập địa chỉ");
        isCheck = false;
    }
    if (valEmail === "") {
        setError(softEmail, "Vui lòng nhập Email");
        isCheck = false;
    } else if (!isEmail(valEmail)) {
        setError(softEmail, "Email không đúng định dạng example@gmail.com");
        isCheck = false;
    }
    if (valTelephone === "") {
        setError(softPhone, "Vui lòng nhập số điện thoại");
        isCheck = false;
    }
    if (valNameBusi === "") {
        setError(softNameBusiness, "Vui lòng nhập số tên doanh nghiệp");
        isCheck = false;
    }

    function setError(ele, message) {
        let parentEle = ele.parentNode.parentNode;
        console.log(parentEle);
        parentEle.classList.add("error-text_join");
        parentEle.querySelector(".test-err_form").innerText = message;
    }

    if (isCheck)
        return (values = {
            softName: valName,
            softPhone: valTelephone,
            softBusinessAdd: valBusinessAdd,
            softEmail: valEmail,
            softNameBusiness: valNameBusi,
        });

    function isEmail(email) {
        return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(
            email
        );
    }
};

// close popup regis software
