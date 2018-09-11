<!DOCTYPE html>
<html>
<head>
	<title>D-Talent Test</title>

	<link href="<?php echo base_url('asset/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">    

    <style type="text/css">
    	@import url('https://fonts.googleapis.com/css?family=Poppins');

    	body{
    		font-family: 'Poppins', sans-serif;
    		display: flex;
			flex-direction: column;
    	}
        .test-wrapper{
            display: none;
        }
        .card{
            width: 100%;
            min-height: 100vh;
            border: 1px solid #ddd;
            position: relative;
            box-shadow: 1px 5px 10px lightgrey;
        }
        .card-header{
            padding: 17px 50px;
            background: #333;
        }
        .card-body,
        .hint-page{
            padding: 20px;
        }
        .hint-page{
            min-height: 100vh;
        }
        .text-hint{
            text-align: justify;
        }
        .test-title h3{
            margin-top: 5px;
            margin-bottom: 35px;
        }
        .test-footer a{
            font-weight: bold;
        }
        .page-text{
            margin-top: 5px;
        }
        .text-access-denied{
            margin-top: 70px;
            margin-bottom: 70px;
        }

        .test{
            padding-bottom: 5px;
        }
        /* hide other page */
        .test:nth-child(n+2){
            display: none;
        }
        /* question margin */
        .test > div{
            margin-bottom: 20px;
        }
        .number{
            margin-right: 8px;
        }
        .test label{
            font-weight: normal;
            margin-left: 25px;
        }
        .test label span{
            position: relative;
            top: -2px;
            left: 10px;
        }
        .online-test hr{
            border-top-color: #ccc;
        }
        
        .soft-skill-subtitle:nth-child(n+2){
            margin-top: 50px;
        }
        .soft-skill-subtitle h3{
            margin-bottom: 20px;
        }

        .modal-hint{
            margin-top: 5%;
        }
        .modal-hint .modal-title{
            margin-top: 20px;
            margin-bottom: 30px;
        }
        .modal-hint .modal-footer{
            border-top: none;
        }
        .hint-icon{
            margin-top: 15px;
            margin-bottom: 30px;
        }

        .test-result ol{
            padding-left: 15px;
        }
        .online-test.access-denied{
            min-height: 380px;
        }
        .access-denied .test > p{
            margin-top: 60px;
            margin-bottom: 60px;
        }

        .button1{
            background-color: black;
            color: white;
            border: 1px solid black;
        }
        .btn-hint{
            background-color: #333;
            color: #fff;
            border: 1px solid #fff;
            border-radius: 0px;
            margin-top: 7px;
        }
        .button1:hover,
        .btn-hint:hover{
            background-color: white;
            color: black;
        }
        .btn.button1:focus{
            background-color: #000;
            color: #fff;
        }
        .btn.btn-hint:focus{
            background-color: #333;
            color: #fff;
        }
        .btn-submit{
            min-width: 76px;
            display: none;
            font-weight: bold;
        }

        .btn-default:active:focus,
        .btn-default:hover{
            background: #fff;
            border-color: #333;
        }
        /* passion result */
        .result ol{
            margin-top: 7px;
            padding-left: 20px;
            text-align: left;
        }
        @media screen and (min-width: 992px) {
            .card-wrapper{
                padding: 60px 90px
            }
            .card{
                min-height: 1px;
                height: auto;
            }
            .online-test{
                min-height: 400px;
            }
            .hint-page{
                min-height: 500px;
            }
            .online-test.soft-skill,
            .online-test.work-attitude{
                min-height: 550px;
            }
            .card-body,
            .hint-page{
                padding: 50px;
            }
            .card{
                border-radius: 5px;
                text-align: justify;
            }
            .card-header{
                border-top-left-radius: 5px;
                border-top-right-radius: 5px;
            }
            .card-body,
            .hint-page{
                border-bottom-left-radius: 5px;
                border-bottom-right-radius: 5px;
            }
            .text-hint{
                margin-left: 50px;
                margin-right: 50px;
                text-align: center;
            }
            .text-access-denied{
                margin-top: 100px;
                margin-bottom: 100px;
            }
            .soft-skill-subtitle:nth-child(n+2){
                margin-top: 0px;
            }

            .bottom-line{
                position: absolute;
                right: 50px;
                left: 50px;
                bottom: 85px;
            }
            .test-footer{
                position: absolute;
                left: 50px;
                right: 50px;
                bottom: 40px;
            }
        }

        @media screen and (max-width: 420px) {
            .test label{
                margin-left: 0px;
            }
            .btn-hint.pull-right{
                margin-top: 25px;
            }
        }

    </style>
</head>

<body>
    <?php
        $this->load->helper('custom');
        $testHint = displayTestHint($test_type);
        if ($testHint != '') {
            // display hint
    ?>
        <!-- modal hint -->
        <div class="modal fade modal-hint" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <h3 class="modal-title text-center">Test Instruction</h3>
                        
                        <div class="hint-icon text-center">
                            <img src="<?php echo site_url('asset/img/warning-icon.png') ?>" alt="">
                        </div>

                        <p class="text-hint">
                            <?php echo $testHint ?>
                        </p>
                    </div>

                    <div class="modal-footer">
                        <hr>
                        <button type="button" class="btn button1" data-dismiss="modal">Tutup</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <div class="card-wrapper hint-wrapper">
            <div class="card center-block">
                <div class="hint-page">
                    <div class="test-title">
                        <h3 class="text-center">Test Instruction</h3>
                    </div>
                    
                    <div class="hint-icon text-center">
                        <!-- <i class="fa fa-exclamation-triangle"></i> -->
                        <img src="<?php echo site_url('asset/img/warning-icon.png') ?>" alt="">
                    </div>
                    <p class="text-hint">
                        <?php echo $testHint ?>
                    </p>

                    <br>
                    <br>
                    <div class="test-footer clearfix">
                        <a href="<?php echo site_url('talent');?>" class="btn btn-default pull-left">
                            <span aria-hidden="true" class="glyphicon glyphicon-chevron-left"></span>
                            Cancel
                        </a>
                        <a href="#!" class="btn button1 pull-right btn-start">
                            <span aria-hidden="true" class="glyphicon glyphicon-pencil"></span>
                            Start Test
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php
        }
    ?>
            
    <div class="card-wrapper <?php echo ($testHint != '') ? 'test-wrapper' : ''; ?>">
        <div class="card center-block">
        	<div class="card-header clearfix">
        		<img src="<?php echo base_url('asset/img/Logo D-Talent putih.png'); ?>" height="46">
                <?php
                    if ($testHint != '') {
                    echo '<button class="pull-right btn btn-hint" data-toggle="modal" data-target=".modal-hint"><i class="fa fa-question-circle"></i> Test Instruction</button>';
                    }
                ?>
        	</div>

            <div class="card-body">
