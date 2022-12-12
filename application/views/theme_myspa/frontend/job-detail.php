<?php
    $jobRes = $_SESSION['post_content'];
    $jobTitle = $jobRes['title_job'];
    $jobInfor = $jobRes['information'];
    $jobDesc = $jobRes['desc_job'];
    $jobDescribe = $jobRes['describe'];
    $jobReqment = $jobRes['job_requirements'];
?>

<!-- Header -->
<?php echo $this_controller->nav_bar_frontend(); ?>
<!-- close header -->

<!-- Body -->
<div class="jobDe-page">
    <div class="container">
        <div class="jobDe-top">
            <h1 class="jobDe-title">
                <?=$jobTitle?>
            </h1>
            <h3 class="jobDe-info">
                <?=$jobInfor?>
            </h3>
            <p class="jobDe-desc">
                <?=$jobDesc?>
            </p>

            <div class="jobDe-job_desc">
                <h2 class="job-desc_title">
                    Mô tả công việc
                </h2>
                <ul>
                    <?php 
                        for ($i = 1; $i <= count($jobDescribe); $i++) {
                            if($jobDescribe['describe_' . $i]){
                        ?>
                    <li>
                        <?= $jobDescribe['describe_' . $i] ?>
                    </li>
                    <?php }} ?>
                </ul>
            </div>
            <div class="jobDe-job_requi">
                <h2 class="job-desc_title">
                    Yêu cầu công việc
                </h2>
                <ul>
                    <?php 
                        for ($i = 1; $i <= count($jobReqment); $i++) {
                            if($jobReqment['job_reqment_' . $i]){
                        ?>
                    <li>
                        <?= $jobReqment['job_reqment_' . $i] ?>
                    </li>
                    <?php }} ?>
                </ul>
            </div>
        </div>

        <div class="jobDe-mid">
            <div class="jobDe-btn_wrap">
                <button class="jobDe-btn">
                    Ứng tuyển ngay
                </button>
            </div>

            <!-- open form -->
            <div class="jobDe-form">
                <?= form_open(base_url() . 'Frontend/recruitment', ["class" => "jobDe-form_wrap"]); ?>
                <div class="jobDe-wrap">
                    <div class="jobDe-wrap_input">
                        <input required id="name" type="text" name="name" class="jobDe-input" placeholder="Họ và tên">
                        <label for="name">Họ và tên </label>
                        <span class="jobDe-text_error">Error message</span>
                    </div>
                    <div class="jobDe-wrap_input">
                        <input class="jobDe-input_date" style="text-transform: capitalize;" required type="text "
                            placeholder="Ngày tháng năm sinh"
                            onfocus="$(this).hide().next().attr('hidden',false).focus();" />
                        <input required pattern="\d{2}-\d{2}-\d{4}" hidden="true" type="date" class="jobDe-input_date"
                            required id="birthday" name="birthday">
                        <label for="birthday">Ngày tháng năm sinh </label>
                        <span class="jobDe-text_error">Error message</span>
                    </div>
                </div>
                <div class="jobDe-wrap">
                    <div class="jobDe-wrap_input ">
                        <input required id="phone" type="text" name="phone" class="jobDe-input"
                            placeholder="Số điện thoại">
                        <label for="phone">Số điện thoại </label>
                        <span class="jobDe-text_error">Error message</span>

                    </div>
                    <div class="jobDe-wrap_input">
                        <input required id="email" type="text" name="email" class="jobDe-input" placeholder="Email">
                        <label for="email">Email </label>
                        <span class="jobDe-text_error">Error message</span>
                    </div>
                </div>
                <div class="jobDe-wrap">
                    <span class="input-type_label">
                        CV
                    </span>
                    <div class="jobDe-wrap_input">
                        <input multiple type="file" class="inputfile" name="file" id="file"
                            data-multiple-caption="{count} tệp đã được tải lên" accept=".doc, .docx, .pdf">
                        <label class="jobDe-cus_label" for="file">
                            <span class="jobDe-cus_label-text">CV của bạn</span>
                            <button type="button" class="jobDe-cus_label-btn"><span>Tải CV lên</span></button>
                        </label>
                        <span class="jobDe-text_error">Error message</span>
                        <span class="required-text_file">(.doc, .docx, .pdf - Tối đa 2MB)</span>
                    </div>
                </div>
                <div class="jobDe-wrap">
                    <div class="jobDe-wrap_input">
                        <label for="yourself">Giới thiệu bản thân </label>
                        <textarea rows="6" id="yourself" type="text" name="yourself" class="jobDe-input"
                            placeholder="Giới thiệu bản thân"></textarea>
                    </div>
                </div>
                <div class="jodDe-btn_wrap">
                    <button type="button" class="jobDe-btn_submit">
                        Nộp đơn ứng tuyển
                    </button>
                </div>
                <?= form_close(); ?>
            </div>
            <!-- close form -->
        </div>

        <div class="jobDe-bottom">
            <h3 class="jobDe-recoment">
                Công việc tương tự
            </h3>
            <ul class="recoment-list">
            </ul>
        </div>
    </div>
</div>
<!-- close body -->


<!-- footer -->
<?php echo $this->footer_frontend(); ?>
<!-- close footer -->

<script type="text/javascript" src="<?= base_url(); ?>assets/frontend/js/royal_preloader.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/frontend/js/header-anime.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/frontend/js/parallax.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/frontend/js/custom-home-1.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/flickity.pkgd.min.js"></script>

<script>
window.addEventListener('load', () => {
    fetchJobList()
})
// map data list job recomment
async function fetchJobList() {
    const resJobList = await fetch(
        'https://myspa.vn/blog/index.php/wp-json/wp/v2/posts?categories=368&_fields=id%2Cacf%2Cyoast_head%2Cyoast_head_json'
    );
    const dataJobs = await resJobList.json()
    const recomentList = document.querySelector('.recoment-list')
    let templateItemRecom = ``
    dataJobs.map((item, index) => {
        templateItemRecom += `<li class="recoment-item"><a href="<?php echo base_url();?>chi-tiet-viec-lam/${item.id}">
        ${item.acf.title_job}
        </a>
        </li>`
    })
    recomentList.innerHTML = templateItemRecom
}
// close map data list job recomment

// get value input type file
let inputs = document.querySelectorAll('.inputfile');
Array.prototype.forEach.call(inputs, function(input) {
    let label = input.nextElementSibling,
        labelVal = label.innerHTML;
    input.addEventListener('change', function(e) {
        let fileName = '';
        if (this.files && this.files.length > 1)
            fileName = (this.getAttribute('data-multiple-caption') || '').replace('{count}', this.files
                .length);
        else
            fileName = e.target.value.split('\\').pop();
        if (fileName)
            label.querySelector('span').innerHTML = fileName;
        else
            label.innerHTML = labelVal;
    });
});
// close get value input type file

// active btn recruitment
let activeForm = document.querySelector('.jobDe-btn')
activeForm.addEventListener('click', () => {
    activeForm.classList.add('active-btn')
})
activeForm.addEventListener('click', () => {
    activeForm.closest('.jobDe-btn_wrap').nextElementSibling.classList.add('active-form-job')
})
// close active btn recruitment


// submit form
let name = document.getElementById('name')
let birthday = document.getElementById('birthday')
let phone = document.getElementById('phone')
let email = document.getElementById('email')
let file = document.getElementById('file')
let form = document.querySelector('.jobDe-form_wrap')
let inputEles = document.querySelectorAll('.jobDe-wrap_input')
let btnSubmit = document.querySelector('.jobDe-btn_submit')

btnSubmit.addEventListener('click', (e) => {
    e.preventDefault()
    Array.from(inputEles).map((item) => item.classList.remove('error-text-valid'))
    const values = checkValidate();
    if (values) {
        alert('Gửi đăng ký thành công');
        console.log(values)
        form.submit();
        form.reset();
    }
})

function checkValidate() {
    let nameVal = name.value
    let birthdayVal = birthday.value
    let phoneVal = phone.value
    let emailVal = email.value
    let fileVal = file.files[0]
    let isCheck = true;
    let values

    if (nameVal == "") {
        setError(name, "Tên không được để trống");
        isCheck = false;
    }
    if (birthdayVal == "") {
        setError(birthday, "Ngày sinh không được để trống");
        isCheck = false;
    }
    if (phoneVal == "") {
        setError(phone, "Số điện thoại không được để trống");
        isCheck = false;
    } else if (!isPhone(phoneVal)) {
        setError(phone, "Số điện thoại không đúng định dạng");
        isCheck = false
    }
    if (emailVal == "") {
        setError(email, "Email không được để trống");
        isCheck = false;
    } else if (!isEmail(emailVal)) {
        setError(email, "Email không đúng định dạng Examp@gmail.com");
        isCheck = false
    }
    if (fileVal == "") {
        setError(file, "Vui lòng tải tệp lên");
        isCheck = false;
    }
    if (isCheck) {
        values = {
            name: nameVal,
            birthday: birthdayVal,
            phone: phoneVal,
            email: emailVal,
            file: fileVal,
        }
    }
    return values
}

function setError(ele, message) {
    let parentEle = ele.parentNode;
    parentEle.classList.add("error-text-valid");
    parentEle.querySelector(".jobDe-text_error").innerText = message;
}

function isEmail(email) {
    return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        .test(
            email
        );
}

function isPhone(number) {
    return /(84|0[3|5|7|8|9])+([0-9]{8})\b/.test(number);
}
// close submit form
</script>