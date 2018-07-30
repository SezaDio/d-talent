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
			max-height: 100vh;
    	}
    	header{
    		min-height: 75px;
    		border-bottom: 1px solid #333;
    	}
    	footer{
    		min-height: 75px;
    		background-color: #333;
    		color: #fff;
            padding: 20px;
    	}
        .online-test{
            /*min-height: 400px;*/
        }
        .card{
            width: 100%;
            height: auto;
            margin-top: 30px;
            margin-bottom: 30px;
            border: 1px solid #ddd;
            padding: 15px;
            position: relative;
            text-align: justify;
        }
        .page-text{
            position: relative;
            top: -32px;
            left: 15px;
            display: inline-block;
        }
        @media screen and (min-width: 992px) {
            /*header{
                min-height: 12vh;
            }
            footer{
                min-height: 12vh;
                position: absolute;
                left: 0px;
                right: 0px;
                bottom: 0px;
                padding-top: 25px;
            }*/
            .online-test.soft-skill{
                min-height: 650px;
            }
            .card{
                width: 60%;
                min-height: 55vh;
            }
            .access-denied .card{
                min-height: 60vh;
            }
            .soft-skill .card,
            .work-attitude .card{
                min-height: 500px;
            }
            .btn-submit-wrapper{
                position: absolute;
                bottom: 20px;
            }
            .pagination-wrapper{
                position: absolute;
                bottom: 17px;
            }
            .pagination{
                margin: 0px;
            }
            .page-text{
                top: -12px;
            }
        }
    	.test:nth-child(n+2){
    		display: none;
    	}
    	.test:nth-child(n+2) > div{
    		margin-bottom: 20px;
    	}
    	.number{
    		margin-right: 8px;
    	}
    	.test label{
    		font-weight: normal;
    		margin-left: 15px;
    	}
    	.test label span{
    		position: relative;
    		top: -3px;
    		left: 3px;
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
    	.btn-submit-wrapper{
    		right: 15px;
    		display: none;
    	}
        .pagination-wrapper > nav{
            display: inline-block;
        }
    	.pagination > li > a{
    		color: #333;
    	}
        /* hide number > 5 */
        .pagination .page-number:nth-child(n+7){
            display: none;
        }

        .button {
            background-color: #4CAF50;
            border: none;
            border-radius: 5px;
            width: 100%;
            color: white;
            padding: 10px 30px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 15px;
            margin: 4px 2px;
            -webkit-transition-duration: 0.4s;
            transition-duration: 0.4s;
            cursor: pointer;
        }

        .button1 {
            background-color: black;
            color: white;
            border: 2px solid black;
        }

        .button1:hover {
            background-color: white;
            color: black;
        }
    </style>
</head>

<body>
	<header>
		<div class="text-center" style="padding: 5px;">
			<img src="<?php echo base_url('asset/img/logo1.png'); ?>">
		</div>
	</header>
