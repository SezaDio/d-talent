<!DOCTYPE html>
<html>
<head>
	<title>D-Talent Test</title>

	<link href="<?php echo base_url('asset/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css" />

    <style type="text/css">
    	@import url('https://fonts.googleapis.com/css?family=Poppins');

    	body{
    		font-family: 'Poppins', sans-serif;
    		display: flex;
			flex-direction: column;
			/*max-height: 100vh;*/
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
        .card-body{
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
                min-height: 450px;
                /*min-height: 550px;*/
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
                bottom: 100px;
            }
            .test-footer{
                position: absolute;
                left: 50px;
                right: 50px;
                bottom: 50px;
            }
        }
        /* hide other page */
    	.test:nth-child(n+2){
    		display: none;
    	}
        /* question space */
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

        .button {
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
        }

        .button1 {
            background-color: black;
            color: white;
            border: 2px solid black;
        }
        .btn-hint{
            background-color: #333;
            color: #fff;
            border: 1px solid #fff;
            border-radius: 0px;
            margin-top: 7px;
        }
        .button1:hover,
        .btn-hint:hover {
            background-color: white;
            color: black;
        }

        .btn-submit{
            display: none;
        }
    </style>
</head>

<body>
    <div style="padding: 60px 90px">
        <div class="card center-block">
            <!-- Hint
                <div class="text-center" style="margin-top: 15px; margin-bottom: 15px;">
                    <span class="glyphicon glyphicon-warning-sign" style="font-size: 55px;"></span>
                </div>
                <p>
                    Di dalam lembar soal terdapat pertanyaan dan dua pilihan jawaban. Pilih jawaban yang paling menggambarkan kondisi Anda, <b>tidak ada jawaban yang benar dan salah</b>.
                </p>
             -->
            
        	<div class="card-header">
        		<img src="<?php echo base_url('asset/img/Logo D-Talent putih.png'); ?>" height="46">
                <button class="pull-right btn btn-hint"><span class="ghlypicon ghlypicon-question-mark"></span> Test Instruction</button>
        	</div>

            <div class="card-body">
