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
			/*max-height: 100vh;*/
    	}
        .card-wrapper{
            padding: 60px 90px
        }
        .test-wrapper{
            display: none;
        }
        .card{
            width: 100%;
            height: auto;
            border: 1px solid #ddd;
            border-radius: 4px;
            position: relative;
            text-align: justify;
            box-shadow: 1px 5px 10px lightgrey;
        }
        .card-header{
            height: 80px;
            padding: 17px 50px;
            background: #333;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }
        .card-body,
        .hint-page{
            padding: 50px;
            border-bottom-left-radius: 5px;
            border-bottom-right-radius: 5px;
        }
        .test-title h3{
            margin-top: 5px;
            margin-bottom: 35px;
        }
        .bottom-line{
            position: absolute;
            right: 15px;
            left: 15px;
            bottom: 70px;
        }
        .test-footer{
            position: absolute;
            left: 15px;
            right: 15px;
            bottom: 30px;
        }
        .test-footer a{
            font-weight: bold;
        }
        .page-text{
            margin-top: 5px;
        } 
        @media screen and (min-width: 992px) {
            .online-test{
                min-height: 400px;
                /*min-height: 550px;*/
            }
            .hint-page{
                min-height: 500px;
            }
            .online-test.soft-skill,
            .online-test.work-attitude{
                min-height: 650px;
            }
            .card{
                /*width: 60%;*/
                /*min-height: 55vh;*/
            }
            .access-denied .card{
                min-height: 60vh;
            }
            .soft-skill .card{
                min-height: 550px;
            }
            .work-attitude .card{
                min-height: 500px;
            }
            /* .btn-submit-wrapper{
                position: absolute;
                bottom: 20px;
            }
            .pagination-wrapper{
                position: absolute;
                bottom: 17px;
            }
            .pagination{
                margin: 0px;
            } */
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
        .access-denied{
            min-height: 380px;
        }
        .access-denied .test > p{
            margin-top: 60px;
            margin-bottom: 60px;
        }
    	/* .btn-submit-wrapper{
            right: 15px;
            display: none;
        }
                .pagination-wrapper > nav{
                    display: inline-block;
                }
        .pagination > li > a{
            color: #333;
        } */

        /* .button {
            background-color: #4CAF50;
            border: none;
            border-radius: 5px;
            color: white;
            padding: 10px 30px;
            display: inline-block;
            font-size: 15px;
            -webkit-transition-duration: 0.4s;
            transition-duration: 0.4s;
            cursor: pointer;
        } */

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

                        <p class="text-center">
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
                    <p class="text-center" style="margin-left: 50px; margin-right: 50px;">
                        <?php echo $testHint ?>
                    </p>

                    <br>
                    <br>
                    <div class="test-footer">
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
            
    <div class="card-wrapper test-wrapper">
        <div class="card center-block">
        	<div class="card-header">
        		<img src="<?php echo base_url('asset/img/Logo D-Talent putih.png'); ?>" height="46">
                <button class="pull-right btn btn-hint" data-toggle="modal" data-target=".modal-hint"><i class="fa fa-question-circle"></i> Test Instruction</button>
        	</div>

            <div class="card-body">
