<!-- Header -->
<?php echo $this_controller->nav_bar_frontend(); ?>
<!-- close header -->

<!-- Body -->

<!-- close body -->
<div class="job-page">
    <div class="job-banner">
        <img src="<?php echo base_url(); ?>assets/frontend/images/job/job-bg.png" alt="">
    </div>
    <div class="job-banner_mb">
        <img src="<?php echo base_url(); ?>assets/frontend/images/job/job-banner-mb.png" alt="">
    </div>
    <div class="container">
        <div class="job-filter">
            <div class="job-title">
                <h1>Job Opportinities</h1>
                <h2>30 Vị trí tuyển dụng</h2>
            </div>
            <div class="job-filter_wrap">

                <div class="job-filter_item">
                    <div class="job-filter_select">
                        <span class="filter-item_text">Phòng ban</span>
                        <div class="filter-item_img">
                            <img src="<?php echo base_url(); ?>assets/frontend/images/job/down-icon.svg" alt="">
                        </div>
                    </div>
                    <ul class="job-filter_droplist">
                        <!-- <li class="droplist-item active-select">
                            <img src="<?php echo base_url(); ?>assets/frontend/images/job/stick-icon.svg" alt="">
                            <span class="droplist-item_text">Phòng ban</span>
                        </li> -->
                        <li class="droplist-item">
                            <img src="<?php echo base_url(); ?>assets/frontend/images/job/stick-icon.svg" alt="">
                            <span class="droplist-item_text">Sales Department</span>
                        </li>
                        <li class="droplist-item">
                            <img src="<?php echo base_url(); ?>assets/frontend/images/job/stick-icon.svg" alt="">
                            <span class="droplist-item_text">Product Department</span>
                        </li>
                        <li class="droplist-item">
                            <img src="<?php echo base_url(); ?>assets/frontend/images/job/stick-icon.svg" alt="">
                            <span class="droplist-item_text">Marketing Department</span>
                        </li>
                        <li class="droplist-item">
                            <img src="<?php echo base_url(); ?>assets/frontend/images/job/stick-icon.svg" alt="">
                            <span class="droplist-item_text">HR Department</span>
                        </li>
                    </ul>
                </div>

                <div class="job-filter_item">
                    <div class="job-filter_select">
                        <span class="filter-item_text">Vị trí</span>
                        <div class="filter-item_img">
                            <img src="<?php echo base_url(); ?>assets/frontend/images/job/down-icon.svg" alt="">
                        </div>
                    </div>
                    <ul class="job-filter_droplist">
                        <!-- <li class="droplist-item active-select">
                            <img src="<?php echo base_url(); ?>assets/frontend/images/job/stick-icon.svg" alt="">
                            <span class="droplist-item_text">Vị trí</span>
                        </li> -->
                        <li class="droplist-item">
                            <img src="<?php echo base_url(); ?>assets/frontend/images/job/stick-icon.svg" alt="">
                            <span class="droplist-item_text">Intern</span>
                        </li>
                        <li class="droplist-item">
                            <img src="<?php echo base_url(); ?>assets/frontend/images/job/stick-icon.svg" alt="">
                            <span class="droplist-item_text">Fresher </span>
                        </li>
                        <li class="droplist-item">
                            <img src="<?php echo base_url(); ?>assets/frontend/images/job/stick-icon.svg" alt="">
                            <span class="droplist-item_text">Junior</span>
                        </li>
                        <li class="droplist-item">
                            <img src="<?php echo base_url(); ?>assets/frontend/images/job/stick-icon.svg" alt="">
                            <span class="droplist-item_text">Midle</span>
                        </li>
                        <li class="droplist-item">
                            <img src="<?php echo base_url(); ?>assets/frontend/images/job/stick-icon.svg" alt="">
                            <span class="droplist-item_text">Leader</span>
                        </li>
                    </ul>
                </div>

            </div>

            <div class="job-filter_tabble">
                <table style="width:100%">
                    <tr>
                        <td><span></span></td>
                        <td>
                            <span>Vị trí</span>
                        </td>
                        <td><span>Chi tiết</span></td>
                        <td><span>Mức lương</span></td>
                    </tr>
                </table>
                <table class="recruit-top_tabble-list">
                </table>
            </div>

            <!-- <div class="job-btn_wrap">
                <button class="job-btn">
                    <a href="/job.html">Xem thêm</a>
                </button>
            </div> -->
        </div>
    </div>
</div>
<!-- footer -->
<?php echo $this->footer_frontend(); ?>
<!-- close footer -->

<script type="text/javascript" src="<?= base_url(); ?>assets/frontend/js/royal_preloader.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/frontend/js/header-anime.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/frontend/js/parallax.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/frontend/js/custom-home-1.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/flickity.pkgd.min.js"></script>


<script>
window.addEventListener("load", () => {
    fetchText();
})
async function fetchText() {
    const response = await fetch(
        'https://myspa.vn/blog/index.php/wp-json/wp/v2/posts?categories=368&_fields=id%2Cacf%2Cyoast_head%2Cyoast_head_json'
    );
    let resJob = await response.json()
    const table = document.querySelector('.recruit-top_tabble-list')
    let template = ``;
    // Build the new table
    resJob.map((item, index) => {
        template += `<tr>
                        <td><span> ${index < 10 ? `0${index + 1}` : index + 1}</span></td>
                        <td>
                            <a class="link" href="<?php echo base_url();?>chi-tiet-viec-lam/${item.id}">
                                <span>${item.acf.title_job}</span>
                                <span>${item.acf.information}</span>
                            </a>
                        </td>
                        <td><span>${item.acf.desc_job}</span></td>
                        <td><span>${item.acf.wage == "Thoả thuận" ? `Thoả thuận` : item.acf.wage + ` VNĐ`}</span></td>
                    </tr> `
    })
    if (template) table.innerHTML = template
}


let jobFilterItem = document.querySelectorAll('.job-filter_item')

jobFilterItem.forEach((item) => {
    let filterSelect = item.querySelectorAll('.job-filter_select')
    filterSelect.forEach((item) => item.addEventListener('click', (e) => {
        e.target.nextElementSibling.classList.toggle('active-droplist')
        e.target.children[1].classList.toggle('active-arrow')
        let itemDrop = e.target.nextElementSibling.querySelectorAll('.droplist-item')
        itemDrop.forEach((item) => {
            item.addEventListener('click', (e) => {
                let textDropItem = e.target.querySelector('.droplist-item_text')
                    .textContent
                e.target.closest('.job-filter_droplist').previousElementSibling
                    .children[0].textContent = textDropItem
                e.target.closest('.job-filter_droplist').previousElementSibling
                    .children[1].classList.remove('active-arrow')
                e.target.closest('.job-filter_droplist').classList.remove(
                    'active-droplist')
                itemDrop.forEach((item) => {
                    item.classList.remove('active-select')
                })
                item.classList.add('active-select')
            })
        })
    }))
})

window.addEventListener('click', (e) => {
    // if (e.target.contains(droplist) || !e.target.contains(filterSelect)) {
    //     droplist.classList.remove('active-droplist')
    //     droplist.previousElementSibling.children[1].classList.remove('active-arrow')
    // }
})
</script>