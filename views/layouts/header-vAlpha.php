<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Главная</title>
        <link href="/template/css/bootstrap.min.css" rel="stylesheet">
        <link href="/template/css/font-awesome.min.css" rel="stylesheet">
        <link href="/template/css/prettyPhoto.css" rel="stylesheet">
        <link href="/template/css/price-range.css" rel="stylesheet">
        <link href="/template/css/animate.css" rel="stylesheet">
        <link href="/template/css/header.css" rel="stylesheet">
        <!-- <link href="/template/css/main.css" rel="stylesheet"> -->
        <link href="/template/css/responsive.css" rel="stylesheet">

        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->       
        <link rel="shortcut icon" href="/template/images/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/template/images/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/template/images/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/template/images/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="/template/images/ico/apple-touch-icon-57-precomposed.png">
    </head><!--/head-->

    <body>
        <div class="page-wrapper">


            <header id="header"><!--header-->
                <div class="header_top">
                    <div class="container">
                        <div class="content">
                            <div class="box">
                                <div class="left">
                                    <div class="logo">
                                        <ul class="nav nav-pills">
                                            <a href="/"><img src="/template/images/home/logo.png" alt="" /></a>
                                        </ul>
                                    </div>
                                </div>
                                <div class="center">
                                    <div class="menu">
                                        <ul class="nav_menu">
                                            <li><a href="/">Главная</a></li>
                                            <li class="dropdown"><a href="#">Категории<i class="fall_menu"></i></a>
                                                <ul role="menu" class="sub_menu">
                                                    <?php foreach($categories as $categoryItem): ?>
                                                        <li>
                                                            <a href="/category/<?php echo $categoryItem['id'];?>">
                                                                <?php echo $categoryItem['name'];?>
                                                            </a>
                                                        </li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </li>
                                            <li><a href="/about/">О магазине</a></li>
                                            <li><a href="/contacts/">Контакты</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="right">
                                    <ul class="nav navbar-nav">
                                        <li>
                                            <a href="/cart">
                                                <i class="fa fa-shopping-cart"></i> Корзина 
                                                (<span id="cart-count"><?php echo Cart::countItems(); ?></span>)
                                            </a>
                                        </li>
                                        <?php if (User::isGuest()): ?>                                        
                                            <li><a href="/user/login/"><i class="login"></i> Вход</a></li>
                                        <?php else: ?>
                                            <li><a href="/cabinet/"><i class="user"></i><?php echo $name; echo $user['name'];?></a></li>
                                            <li><a href="/user/logout/"><i class="logOut"></i> Выход</a></li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--/header_top-->


            </header><!--/header-->