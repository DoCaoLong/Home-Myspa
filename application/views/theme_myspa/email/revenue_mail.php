
<html>

<head>

    <meta charset="utf-8" />

    <title><?php echo '['.$this->mcompany_contract->get_data()['company_name'].'] - '.$this->lang->line('daily_report')." ({$yesterday})" ?></title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />


    <style>
        @media screen and (max-width:992px) {
            .col-2 {
                width: 80%
            }
        }

        @media screen and (min-width:992px) {
            .col-2 {
                width: 16.666%
            }
        }

        .col-12 {
            width: 100%
        }

        .text-center {
            text-align: center
        }

        .text-primary {
            color: #7266ba
        }

        .text-warning {
            color: #f68e56;
        }

        .bc-sumary {
            padding: 10px 0
        }

        .b-primary {
            border-color: #7266ba !important
        }

        .b {
            border: 1px solid
        }

        .b-success {
            border-color: #abd373
        }

        .inline-block {
            display: inline-block
        }

        span {
            font-size: 16px
        }

        .text-secondary {
            font-size: 12px;
        }

        .bg-danger {
            color: #fff;
            background-color: #f26c4f
        }

        .bg-success {
            color: #fff;
            background-color: #abd373
        }

        .bg-warning {
            color: #fff;
            background-color: #f68e56;
        }

        .bg-info {
            color: #fff;
            background-color: #3dbcf8;
        }

        .text-success {
            color: #abd373
        }

        .text-footer {
            color: grey
        }

        .text-right {
            text-align: right
        }

        .b-white {
            border-color: #fff
        }

        .b-warning {
            border-color: #f68e56;
        }

        .b-info {
            border-color: #3dbcf8
        }

        .text-info {
            color: #3dbcf8
        }

        .text-bold {
            font-weight: 700
        }

        .h1,
        .h2,
        .h3,
        .h4,
        .h5,
        .h6,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: Oswald, sans-serif;
            font-weight: 400
        }

        .text-uppercase {
            text-transform: uppercase
        }

        .container {
            width: 80%;
            margin: 0 auto
        }

        footer {
            margin-top: auto
        }
    </style>

</head>

<body>
    <?php 
    $base_currency = $this->session->userdata('site_currency') ? $this->session->userdata('site_currency') : $this->config->item('base_currency');
    ?>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h3 class="text-uppercase"><?php echo $this->lang->line('daily_report');?> (<?php echo $yesterday ?>)</h3>
                <h3><?php echo $company_name = $this->mcompany_contract->get_data()['company_name'] ?></h3>
            </div>


        </div>
        <hr>
        <?php if($current_branch == 0) { ?>
        <div class="row b b-success" style="margin-bottom:2em;padding-bottom:2em">
            <div class="col-12 text-center">
                <h3 class="text-uppercase text-success" style="margin-bottom:2em"><?php echo $this->lang->line('total_revenue') . ' ' .$this->lang->line('branch');;?></h3>
                <?php 
                $branch_list = $this->mbranch->get_all_data();
                $from_date = format_date_for_db($yesterday);
                $to_date = format_date_for_db($yesterday);
                $this->morder_payment_history->_from_date = $from_date;
                $this->morder_payment_history->_to_date = $to_date;
                $this->morder_payment_history->_branch_id = 0;
                
                $this->mpayment_history->_from_date = $from_date;
                $this->mpayment_history->_to_date = $to_date;
                $this->mpayment_history->_branch_id = 0;
        
        
                $this->morder_payment_history->_order_done  = false;
                $this->mpayment_history->_order_done        = false;

                $order_prepaid    = $this->morder_payment_history->get_total_prepaid();
                $mbs_prepaid  = $this->mpayment_history->get_order_done();
                ?>
                <div class="col-2 inline-block">
                    <div class="block text-center bg-success bc-sumary b b-white">
                        <span class="text-bold text-uppercase"><?php echo $this->lang->line('revenue');?></span><br>
                        <span class="text-secondary text-uppercase">(<?php echo $this->lang->line('all_branch'); ?>)</span>
                        <h4><?php  echo format_money(($order_prepaid['total_prepay'] + $mbs_prepaid['total_money']),'');?> <?php echo $base_currency['symbol']; ?></h4>
                    </div>
                </div>
                <?php foreach($branch_list as $value) { ?>
                    <?php 
                        
                        $from_date = format_date_for_db($yesterday);
                        $to_date = format_date_for_db($yesterday);
                        $this->morder_payment_history->_from_date = $from_date;
                        $this->morder_payment_history->_to_date = $to_date;
                        $this->morder_payment_history->_branch_id = $value['id'];
                        
                        $this->mpayment_history->_from_date = $from_date;
                        $this->mpayment_history->_to_date = $to_date;
                        $this->mpayment_history->_branch_id = $value['id'];
                
                
                        $this->morder_payment_history->_order_done  = false;
                        $this->mpayment_history->_order_done        = false;
    
                        $order_prepaid    = $this->morder_payment_history->get_total_prepaid();
                        $mbs_prepaid  = $this->mpayment_history->get_order_done();
                    ?>
                    <div class="col-2 inline-block">
                        <div class="block text-center bg-success bc-sumary b b-white">
                            <span class="text-bold text-uppercase"><?php echo $this->lang->line('revenue');?></span><br>
                        <span class="text-secondary text-uppercase">(<?php echo $value['branch_name']; ?>)</span>
                            <h4><?php  echo format_money(($order_prepaid['total_prepay'] + $mbs_prepaid['total_money']),'');?> <?php echo $base_currency['symbol']; ?></h4>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>


        <div class="row b b-info" style="margin-bottom:2em;padding-bottom:2em">
            <div class="col-12 text-center">
                <h3 class="text-uppercase text-info" style="margin-bottom:2em"><?php echo $this->lang->line('total_commission') . ' ' .$this->lang->line('branch');;?></h3>
                <?php 
                $branch_list = $this->mbranch->get_all_data();
                $from_date = format_date_for_db($yesterday);
                $to_date = format_date_for_db($yesterday);
                
                $this->morder_staff->_start_date = $from_date;
                $this->morder_staff->_end_date = $to_date;
                $this->morder_staff->_branch_id    = 0;

                $get_total_report_commission = $this->morder_staff->get_total_commission_revenue_group_by_staff(null, null, "desc", $from_date, $to_date,$type = 1,$sharing_type = 0,$commission_debt_type = 1);
                $total_com = 0;
                foreach($get_total_report_commission as $key => $to){
                    $total_com += $to['total_commission'];
                    $total_com_debt += 0;
                    $max++;
                }
                ?>
                <div class="col-2 inline-block">
                    <div class="block text-center bg-info bc-sumary b b-white">
                        <span class="text-bold text-uppercase"><?php echo $this->lang->line('total_commission');?></span><br>
                        <span class="text-secondary text-uppercase">(<?php echo $this->lang->line('all_branch'); ?>)</span>
                        <h4><?php  echo format_money($total_com,'');?> <?php echo $base_currency['symbol']; ?></h4>
                    </div>
                </div>
                <?php foreach($branch_list as $value) { ?>
                    <?php 
                        
                        $from_date = format_date_for_db($yesterday);
                        $to_date = format_date_for_db($yesterday);
                        
                        $this->morder_staff->_start_date = $from_date;
                        $this->morder_staff->_end_date = $to_date;
                        $this->morder_staff->_branch_id    = $value['id'];

                        $get_total_report_commission = $this->morder_staff->get_total_commission_revenue_group_by_staff(null, null, "desc", $from_date, $to_date,$type = 1,$sharing_type = 0,$commission_debt_type = 1);
                        $total_com = 0;
                        foreach($get_total_report_commission as $key => $to){
                            $total_com += $to['total_commission'];
                            $total_com_debt += 0;
                            $max++;
                        }
                    ?>
                    <div class="col-2 inline-block">
                        <div class="block text-center bg-info bc-sumary b b-white">
                            <span class="text-bold text-uppercase"><?php echo $this->lang->line('total_commission');?></span><br>
                            <span class="text-secondary text-uppercase">(<?php echo $value['branch_name']; ?>)</span>
                            <h4><?php  echo format_money(($total_com),'');?> <?php echo $base_currency['symbol']; ?></h4>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <?php } ?>
        
        <div class="row b b-warning" style="margin-bottom:2em;padding-bottom:2em">
            <div class="col-12 text-center">
                <h3 class="text-uppercase text-warning" style="margin-bottom:2em"><?php echo $this->lang->line('summary_total_report');?></h3>
                <div class="col-2 inline-block" style="margin-bottom:5px">
                    <div class="block text-center text-warning b-white bg-warning bc-sumary b">
                        <span class="text-bold"><?php echo $this->lang->line('total_payment');?></span>
                        <h4><?php  echo ($total_order['count_records'] + $total_payment['count_records']);?></h4>
                    </div>
                </div>
                <div class="col-2 inline-block" style="margin-bottom:5px">
                    <div class="block text-center text-warning b-white bg-warning bc-sumary b">
                        <span class="text-bold"><?php echo $this->lang->line('total_paid');?></span>
                        <h4><?php  echo format_money(($total_order['total_prepay'] + $total_payment['total_money']),'');?> <?php echo $base_currency['symbol']; ?></h4>
                    </div>
                </div>

                <div class="col-2 inline-block" style="margin-bottom:5px">
                    <div class="block text-center text-warning b-white bg-warning bc-sumary b">
                        <span class="text-bold"><?php echo $this->lang->line('total_paid_approved');?></span>
                        <h4><?php echo format_money(($total_order_done['total_prepay'] + $total_payment_done['total_money']),'');?> <?php echo $base_currency['symbol']; ?></h4>
                    </div>
                </div>

                <div class="col-2 inline-block" style="margin-bottom:5px">
                    <div class="block text-center text-warning b-white bg-warning bc-sumary b">
                        <span class="text-bold"><?php echo $this->lang->line('total_debit');?></span>
                        <h4><?php
                                echo format_money(($total_order_debt['total_remain']+$total_mbs_debt['total_remain']),'');?> <?php echo $base_currency['symbol']; ?></h4>
                    </div>
                </div>

                <div class="col-2 inline-block" style="margin-bottom:5px">
                    <div class="block text-center text-warning b-white bg-warning bc-sumary b">
                        <span class="text-bold"><?php echo $this->lang->line('total_commission');?></span>
                        <h4><?php
                                echo format_money(($total_comission),'');?> <?php echo $base_currency['symbol']; ?></h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="row b b-primary"  style="margin-bottom:2em;padding-bottom:2em">
            <div class="col-12 text-center">
                <h3 class="text-uppercase text-primary" style="margin-bottom:2em"><?php echo $this->lang->line('payment_method_1');?></h3>
                <?php 
                    $counter = 1;
                    foreach($payment_method as $item) { ?>
                    <?php 
                        if($counter == 1 || $counter % 5 == 1){
                            echo '<div class="col-12">';
                        } 
                    ?>
                  <div class="col-2 inline-block" style="margin-bottom:5px">
                    <div class="block text-center text-primary b b-primary bc-sumary ">
                        <span class="text-bold"><?php echo $item['payment_method_name'] ?></span>
                        <h4><?php echo $item['total_prepay'] != null ? format_money($item['total_prepay']) : 0 ?> <?php echo $base_currency['symbol']; ?></h4>

                    </div>
                  </div>
                  <?php if($counter % 5 == 0){
                        echo '</div>';
                    }else if($counter == count($payment_method)){
                        echo '</div>';
                    } ?>
                <?php $counter++; } ?>
                
            </div>
        </div>
        <?php if(!empty($commission_list)) { ?>
            <div class="row b b-info"  style="margin-bottom:3em;padding-bottom:2em">
                <div class="col-12 text-center">
                    <h3 class="text-uppercase text-info" style="margin-bottom:2em"><?php echo $this->lang->line('staff_commission'); ?></h3>
                    <?php 
                        $counter = 1;
                        foreach($commission_list as $item) { ?>
                        <?php 
                            if($counter == 1 || $counter % 5 == 1){
                                echo '<div class="col-12">';
                            } 
                        ?>
                      <div class="col-2 inline-block" style="margin-bottom:5px">
                        <div class="block text-center text-info b b-info bc-sumary ">
                            <span class="text-bold"><?php echo $item['fullname'] ?></span>
                            <h4><?php echo format_money($item['total_commission']) ?> <?php echo $base_currency['symbol']; ?></h4>
                        </div>
                      </div>
                      <?php if($counter % 5 == 0){
                            echo '</div>';
                        }else if($counter == count($commission_list)){
                            echo '</div>';
                        } ?>
                    <?php
                        $counter++; } ?>
                    
                </div>
            </div>    
        <?php } ?>
        <hr >

        <footer class="text-right">
            <span class="text-footer">Report powered by myspa.vn</span>
            
        </footer>
    </div>

</body>

</html>