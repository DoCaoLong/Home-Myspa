<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8"> <!-- utf-8 works for most cases -->
    <meta name="viewport" content="width=device-width"> <!-- Forcing initial-scale shouldn't be necessary -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Use the latest (edge) version of IE rendering engine -->
    <title></title> <!-- The title tag shows in email notifications, like Android 4.4. -->

    <style>
        * {
            font-family: sans-serif !important;
        }
    </style>
    <style>
        html,
        body {
            margin: 0 auto !important;
            padding: 0 !important;
            height: 100% !important;
            width: 100% !important;
        }

        * {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
        }

        div[style*="margin: 16px 0"] {
            margin:0 !important;
        }

        table,
        td {
            mso-table-lspace: 0pt !important;
            mso-table-rspace: 0pt !important;
        }

        table {
            border-spacing: 0 !important;
            border-collapse: collapse !important;
            table-layout: fixed !important;
            margin: 0 auto !important;
        }
        table table table {
            table-layout: auto;
        }

        img {
            -ms-interpolation-mode:bicubic;
        }

        .mobile-link--footer a,
        a[x-apple-data-detectors] {
            color:inherit !important;
            text-decoration: underline !important;
        }

    </style>

    <!-- Progressive Enhancements -->
    <style>

        /* What it does: Hover styles for buttons */
        .button-td,
        .button-a {
            transition: all 100ms ease-in;
        }
        .button-td:hover,
        .button-a:hover {
            background: #555555 !important;
            border-color: #555555 !important;
        }

        /* Media Queries */
        @media screen and (max-width: 600px) {

            .email-container {
                width: 100% !important;
                margin: auto !important;
            }

            /* What it does: Forces elements to resize to the full width of their container. Useful for resizing images beyond their max-width. */
            .fluid,
            .fluid-centered {
                max-width: 100% !important;
                height: auto !important;
                margin-left: auto !important;
                margin-right: auto !important;
            }
            /* And center justify these ones. */
            .fluid-centered {
                margin-left: auto !important;
                margin-right: auto !important;
            }

            /* What it does: Forces table cells into full-width rows. */
            .stack-column,
            .stack-column-center {
                display: block !important;
                width: 100% !important;
                max-width: 100% !important;
                direction: ltr !important;
            }
            /* And center justify these ones. */
            .stack-column-center {
                text-align: center !important;
            }

            /* What it does: Generic utility class for centering. Useful for images, buttons, and nested tables. */
            .center-on-narrow {
                text-align: center !important;
                display: block !important;
                margin-left: auto !important;
                margin-right: auto !important;
                float: none !important;
            }
            table.center-on-narrow {
                display: inline-block !important;
            }

        }

        @media screen and (max-width: 340px) {
            .bn-logo{
                width: 160px;
            }
        }

    </style>

</head>
<body width="100%" style="margin: 0;">
<center style="width: 100%; background: #FFF;">
    <!-- Visually Hidden Preheader Text : BEGIN -->
    <div style="display:none;font-size:1px;line-height:1px;max-height:0px;max-width:0px;opacity:0;overflow:hidden;mso-hide:all;font-family: sans-serif;">
        Khách hàng: <?php echo (isset($booking_name) ? $booking_name : '') ;?> vừa đặt hẹn với mã đặt hẹn: <?php echo (isset($booking_code) ? $booking_code : '') ;?>
    </div>
    <table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="margin: auto;" class="email-container">

        <!-- Hero Image, Flush : BEGIN -->
        <tr>
            <td bgcolor="#7266BA" style="padding: 15px;">
                <!--<img class="bn-logo" src="https://myspa.vn/assets/frontend/images/logos/logo-v-w@2x.png" width="100"  alt="alt_text" border="0" align="" class="fluid" style="">-->
                <h3 style="color:#FFF; text-align: center; margin:5px;">KHÁCH HÀNG VỪA ĐẶT HẸN!</h3>
            </td>
        </tr>
        <!-- Hero Image, Flush : END -->

        <!-- 1 Column Text : BEGIN -->
        <tr>
            <td bgcolor="#ffffff" style="padding: 0px 15px 20px; text-align: justify; font-family: sans-serif; font-size: 15px; mso-height-rule: exactly; line-height: 20px; color: #555555;">
                <br><br>
                Xin chào <b><?php echo isset($company_info['company_name']) ? $company_info['company_name'] : '';?></b>,<br><br>
                Khách hàng: <?php echo (isset($booking_name) ? $booking_name : '') ;?> vừa đặt hẹn với mã đặt hẹn: <span style="font-size: 30; font-weight: 900; color:#f26c4f"><?php echo (isset($booking_code) ? $booking_code : '') ;?></span>
                <br>
                <img width="180" src="https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl=<?php echo base_url();?>Booking/redeem?code=<?php echo (isset($booking_code) ? $booking_code : '') ;?>"/>
                <br>
                <h3>THÔNG TIN ĐẶT HẸN</h3>
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border:1px solid #aaa; border-bottom:none">
                    <tr>
                        <!-- Column : BEGIN -->
                        <td width="100%" colspan="2" valign="top">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td dir="ltr" valign="top" style="padding: 5px;">
                                        <span style="font-size: 12px">DỊCH VỤ</span><br>
                                        <span style="font-weight: 900">
                                        <?php
                                        $determine = '';
                                        $booking_services = (isset($booking_services)) ? json_decode($booking_services) : null;
                                        foreach( $service_list as $key => $value ){
                                            if( isset($booking_services) ){
                                                foreach($booking_services as $kbs => $sv) {
                                                    if ($sv == encode($value['id'])) {
                                                        echo $determine.$value['service_name'];
                                                        $determine = ', ';
                                                        break;
                                                    }
                                                }
                                            } ?>
                                            <?php
                                        }?>
                                        </span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <!-- Column : END -->
                    </tr>
                    <tr>
                        <!-- Column : BEGIN -->
                        <td width="50%" valign="top">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td dir="ltr" valign="top" style="padding: 5px;">
                                        <span style="font-size: 12px">NGÀY/GIỜ</span><br>
                                        <h3 style="margin:0; color:#f26c4f"><?php echo (isset($start)) ? $start : '' ;?></h3>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td width="50%" valign="top">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td dir="ltr" valign="top" style="padding: 5px;">
                                        <span style="font-size: 12px">SỐ LƯỢNG</span><br>
                                        <?php echo (isset($booking_quantity) ? $booking_quantity : '') ;?>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <!-- Column : END -->
                    </tr>
                    <tr>
                        <!-- Column : BEGIN -->
                        <td width="100%" colspan="2" valign="top">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td dir="ltr" valign="top" style="padding: 5px;">
                                        <span style="font-size: 12px;">YÊU CẦU</span><br>
                                        <span style=" font-style: italic"><?php echo (isset($note) ? $note : '') ;?></span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <!-- Column : END -->
                    </tr>
                </table>
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border:1px solid #aaa; border-bottom:none">
                    <tr>
                        <!-- Column : BEGIN -->
                        <td width="100%" valign="top">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td dir="ltr" valign="top" style="padding: 5px;">
                                        <span style="font-size: 12px">KHÁCH HÀNG</span><br>
                                        <?php echo (isset($booking_name) ? $booking_name : '') ;?><br>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <!-- Column : END -->
                    </tr>
                    <tr>
                        <!-- Column : BEGIN -->
                        <td width="100%" valign="top">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td dir="ltr" valign="top" style="padding: 5px;">
                                        <span style="font-size: 12px">SỐ ĐIỆN THOẠI</span><br>
                                        <?php echo (isset($booking_phone) ? $booking_phone : '') ;?><br>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <!-- Column : END -->
                    </tr>
                    <tr>
                        <!-- Column : BEGIN -->
                        <td width="100%" valign="top">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td dir="ltr" valign="top" style="padding: 5px;">
                                        <span style="font-size: 12px">EMAIL</span><br>
                                        <?php echo (isset($booking_email) ? $booking_email : '') ;?><br>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <!-- Column : END -->
                    </tr>
                </table>
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border:1px solid #aaa">
                    <tr>
                        <!-- Column : BEGIN -->
                        <td width="100%" valign="top">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td dir="ltr" valign="top" style="padding: 5px;">
                                        <span style="font-size: 12px">NHÀ CUNG CẤP</span><br>
                                        <?php echo isset($company_info['company_name']) ? $company_info['company_name'] : '';?><br>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <!-- Column : END -->
                    </tr>
                    <tr>
                        <!-- Column : BEGIN -->
                        <td width="100%" valign="top">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td dir="ltr" valign="top" style="padding: 5px;">
                                        <span style="font-size: 12px">ĐỊA CHỈ</span><br>
                                        <?php echo isset($company_info['address']) ? $company_info['address'] : '';?><br>
                                        <a href="https://www.google.com/maps/place/<?php echo isset($company_info['address']) ? urlencode($company_info['address']) : ''; ?>" style="font-size: 12px; text-decoration: none;" target="_blank">Xem bản đồ</a><br>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <!-- Column : END -->
                    </tr>
                    <tr>
                        <!-- Column : BEGIN -->
                        <td width="100%" valign="top">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td dir="ltr" valign="top" style="padding: 5px;">
                                        <span style="font-size: 12px">SỐ ĐIỆN THOẠI</span><br>
                                        <?php echo isset($company_info['telephone']) ? $company_info['telephone'] : '';?><br>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <!-- Column : END -->
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</center>
<br>
Trân trọng thông báo,<br>
MYSPA Team
</body>
</html>
