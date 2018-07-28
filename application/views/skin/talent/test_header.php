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
    		height: 60px;
    		border-bottom: 1px solid #333;
    	}
    	footer{
    		height: 60px;
    		background-color: #333;
    		color: #fff;
            padding: 20px;
    	}
        .card{
            width: 100%;
            height: auto;
            margin-top: 30px;
            border: 1px solid #ddd;
            padding: 15px;
            position: relative;
            text-align: justify;
        }
        @media screen and (min-width: 992px) {
            header{
                height: 10vh;
            }
            footer{
                height: 10vh;
                position: absolute;
                left: 0px;
                right: 0px;
                bottom: 0px;
                padding-top: 25px;
            }
            .card{
                width: 60%;
                height: 55vh;
            }

            .pagination-wrapper,
            .btn-submit-wrapper{
                position: absolute;
                bottom: 20px;
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
        .pagination.center-block{
            display: inline-block;
        }
    	.pagination > li > a{
    		color: #333;
    	}
    </style>
</head>

<body>
	<header>
		<div class="text-center">
			<img src="<?php echo base_url('asset/img/logo.png'); ?>">
		</div>
	</header>
