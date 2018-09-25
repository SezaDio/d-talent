<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title></title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">    
    <style type="text/css">
        body{
            font-family: 'Montserrat', sans-serif;
        }
        @page :first{
            margin-header:0px;
            margin-footer:0px;
            margin-top:4.5cm;
            header: html_myHeader1;            
        }
        @page {
            size: auto;            
            header: html_myHeader2;
            footer: html_myFooter1;            
            margin-header: 0px;
            margin-footer: 0px;
            margin-left: 0px;
            margin-right: 0px;
            margin-bottom: 3.5cm;
        }
        header{
            background-image: url("<?php echo base_url('/asset/img/hasil_cetak/PNG'); ?>/Header.png");
            width: 100%;
            height: 15%;
            background-repeat: no-repeat;
            background-size: cover;
            z-index: 999;
        }
        
        .content-header{
            padding-top: 1.5cm;
            padding-left: 5cm;            
            color: white;
        }
        .name{            
            color: white;
            /*border: none;*/
            font-weight: bold;
        }
        .img-header{
            width: 15px;
            margin-right: 5px;
        }
        .info-header{
            font-size: 15px;
        }
        div.header2{
            background-color: black;
            width: 100%;
            height: 3%;
            z-index: 999;
        }
        .content{
            padding-left: 1.8cm;
            padding-right: 1.8cm;
            z-index: 999;
        }
        table.test-content{
            width: 100%;
            padding-top: 30px;            
        }
        .logo-test{
            width: 40px;
        }
        .title-test{
            font-weight: bold;
            margin-bottom: 0px;
        }
        hr.line-test{
            width: 5%;
            text-align: left;
            height: 4px;
            color: #69d4b8;            
            margin-top: 8px;
            margin-bottom: 0px;
            /*padding:0;*/
        }
        td.result-test{
            padding-top: 10px;
            text-align: justify;
        }
    </style>
</head>
<body>
    <htmlpageheader name="myHeader1" style="display:none">
        <header>
            <table class="content-header">
                <tr>
                    <td colspan="2"><h2 class="name"><?= $nama ?></h2></td>
                </tr>
                <tr>
                    <td width="12%"><img class="img-header" src="<?php echo base_url('/asset/img/hasil_cetak/PNG');?>/IconEmail.png"></td>
                    <td class="info-header"><?= $email ?></td>
                </tr>
                <tr>
                    <td><img class="img-header" src="<?php echo base_url('/asset/img/hasil_cetak/PNG');?>/IconPhone.png"></td>
                    <td class="info-header"><?= $nomor_ponsel ?></td>
                </tr>
            </table>
        </header>
    </htmlpageheader>

    <htmlpageheader name="myHeader2" style="display:none">
        <div class="header2">
            
        </div>
    </htmlpageheader>

    <htmlpagefooter name="myFooter1" style="display:none">
        <footer style="background-color: #e6e6e6;width: 100%;height: 80px; margin-bottom: 0px;"></footer>
    </htmlpagefooter>

    <div class="content">    
        <?php
        if($result_character != null || $result_passion != null || $result_work_attitude != null || $result_soft_skill != null) {
        ?>
            <?php
                if($result_character != null) {
            ?>
            <table class="test-content">
                <tr>
                    <td width="60px">
                        <img class="logo-test" src="<?php echo base_url('/asset/img/hasil_cetak/PNG');?>/LogoCharactert.png">
                    </td>
                    <td width="80%" valign="bottom" style="text-align: left;">
                        <h3 class="title-test">Character Test</h3>
                        <hr align="left" class="line-test">
                    </td>                
                </tr>
                <tr>
                    <td width="60px"></td>
                    <td class="result-test">
                        <?php
                            echo "- <b>" . $result_character_sub_title . "</b> -<br>";
                            echo $result_character_detail;
                        ?>                        
                    </td>
                </tr>
            </table>
            <?php
                } 
            ?>
            
            <?php
                if($result_passion != null) {
            ?>
            <table class="test-content">
                <tr>
                    <td width="60px">
                        <img class="logo-test" src="<?php echo base_url('/asset/img/hasil_cetak/PNG');?>/LogoPassion.png">
                    </td>
                    <td width="80%" valign="bottom" style="text-align: left;">
                        <h3 class="title-test">Passion and Interest Test</h3>
                        <hr align="left" class="line-test">
                    </td>                
                </tr>
                <tr>
                    <td width="60px"></td>
                    <td class="result-test">
                        <?php
                            echo $result_passion_detail;
                        ?>                        
                    </td>
                </tr>
            </table>
            <?php
                } 
            ?>

            <?php
                if($result_work_attitude != null) {
            ?>
            <table class="test-content">
                <tr>
                    <td width="60px">
                        <img class="logo-test" src="<?php echo base_url('/asset/img/hasil_cetak/PNG');?>/LogoWork.png">
                    </td>
                    <td width="80%" valign="bottom" style="text-align: left;">
                        <h3 class="title-test">Work Attitude Test</h3>
                        <hr align="left" class="line-test">
                    </td>                
                </tr>
                <tr>
                    <td width="60px"></td>
                    <td class="result-test">
                        <?php
                            echo "- <b>" . $result_work_attitude_title . "</b> -<br>";
                            echo $result_work_attitude_detail;
                        ?>                      
                    </td>
                </tr>
            </table>
            <?php
                } 
            ?>

            <?php
                if($result_soft_skill != null) {
            ?>
            <pagebreak>
        <!-- <div class="content">     -->
            <table class="test-content">
                <tr>
                    <td width="60px">
                        <img class="logo-test" src="<?php echo base_url('/asset/img/hasil_cetak/PNG');?>/LogoSoftskill.png">
                    </td>
                    <td width="80%" valign="bottom" style="text-align: left;">
                        <h3 class="title-test">Soft Skill Test</h3>
                        <hr align="left" class="line-test">
                    </td>                
                </tr>
                <tr>
                    <td width="60px"></td>
                    <td class="result-test">
                        - <b>INTRAPERSONAL SKILL</b> - <br>
                        <?php for ($index = 1; $index <= 5; $index++) 
                            { ?>                                
                                <p><b><?php echo $sub_title[$index]; ?></b></p>
                                <hr style="border: solid 1px gray; margin-bottom: unset; margin-top: unset;">
                                <p><?php echo $result[$index]; ?></p>
                        <?php } ?>
                        <br>
                        - <b>INTERPERSONAL SKILL</b> - <br>
                        <?php for ($index = 6; $index <= 10; $index++) 
                            { ?>                                
                                <p><b><?php echo $sub_title[$index]; ?></b></p>
                                <hr style="border: solid 1px gray; margin-bottom: unset; margin-top: unset;">
                                <p><?php echo $result[$index]; ?></p>                        
                        <?php } ?>                            
                        </td>
                    </tr>
                </table>
            <!-- </div> -->
            <?php
                } 
            ?>
        <?php
        } else{
        ?>
        <h2>Anda Belum Melakukan Test Online!</h2>
        <?php } ?>
    </div>
        
<!--    <footer>
        
    </footer> -->

</body>
</html>