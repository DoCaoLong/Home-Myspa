
<!DOCTYPE html>
<html lang="vi" class="">
<head>
    <meta charset="utf-8" />
    <title>MySpa | 404</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="<?php echo base_url();?>bower_components/animate.css/animate.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url();?>bower_components/font-awesome/css/font-awesome.min.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url();?>bower_components/simple-line-icons/css/simple-line-icons.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url();?>bower_components/bootstrap/dist/css/bootstrap.css" type="text/css" />

    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/app.css" type="text/css" />

</head>
<body>
<div class="app app-header-fixed ">


    <div class="container w-xxl w-auto-xs" ng-init="app.settings.container = false;">
        <div class="text-center m-b-lg">
            <h1 class="text-shadow text-white">404</h1>
        </div>
        <div class="list-group bg-success auto m-b-sm m-b-lg">
            <a href="#/" class="list-group-item" onclick="window.history.go(-1); return false;">
                <i class="fa fa-chevron-right text-muted"></i>
                <i class="fa fa-fw fa-mail-forward m-r-xs"></i> <?php echo $this->lang->line('back_to_application');?>
            </a>
        </div>
        <div class="text-center" ng-include="'tpl/blocks/page_footer.html'">
            <p>
                <small class="text-muted">MySpa &copy; <?php echo date('Y');?></small>
            </p>
        </div>
    </div>


</div>

<script src="<?php echo base_url();?>assets/js/app.min.js"></script>

</body>
</html>
