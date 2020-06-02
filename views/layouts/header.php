<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Главная</title>
        <!-- <link href="/template/css/bootstrap.min.css" rel="stylesheet"> -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link href="/template/css/header.css" rel="stylesheet">
        <link href="/template/css/main.css" rel="stylesheet"> 
        <link href="/template/css/footer.css" rel="stylesheet">

        <link href="/template/css/font-awesome.min.css" rel="stylesheet">
        <link href="/template/css/prettyPhoto.css" rel="stylesheet">
        <link href="/template/css/price-range.css" rel="stylesheet">
        <!-- <link href="/template/css/animate.css" rel="stylesheet">
        <!-- <link href="/template/css/light.css" rel="stylesheet"> -->
        <!-- <link href="/template/css/responsive.css" rel="stylesheet"> -->

  <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
  <link rel="shortcut icon" href="/template/images/ico/favicon.ico">
  <link rel="apple-touch-icon-precomposed" sizes="144x144"
    href="/template/images/ico/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114"
    href="/template/images/ico/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72"
    href="/template/images/ico/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="/template/images/ico/apple-touch-icon-57-precomposed.png">

  <script src="https://kit.fontawesome.com/cd26113552.js" crossorigin="anonymous"></script>
</head>

<body>
  <div class="page-wrapper">

    <header id="header">

                <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark custom__navbar">
                    <a class="navbar-brand" href="/"><img src="/template/images/home/logo.png" alt="" /></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="/">Главная</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link--category-btn " href="#categoryList" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseExample"> 
                                Категории 
                                <i class="fas fa-chevron-down"></i>
                            </a>
                            <ul class='nav__sublist bg-dark collapse' id="categoryList">
                                <?php foreach($categories as $categoryItem): ?>
                                    <li>
                                        <a href="/category/<?php echo $categoryItem['id'];?>" class='pl-4 nav-link--categories nav-link'>
                                            <?php echo $categoryItem['name'];?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="/about/">О магазине</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="/contacts/">Контакты</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="/feedback/">Отзывы</a>
                        </li>
                    </ul>

          <ul class="navbar-nav">
            <li class="nav-item">
              <a href="/cart" class='nav-link'>
                <i class="fa fa-shopping-cart"></i> Корзина
                (<span id="cart-count"><?php echo Cart::countItems(); ?></span>)
              </a>
            </li>
            <?php if (User::isGuest()): ?>
            <li class="nav-item"><a href="/user/login/" class='nav-link nav__link--last'><i class="login"></i> Вход</a>
            </li>
            <?php else: ?>
            <li class="nav-item"><a href="/cabinet/" class='nav-link'><i
                  class="user"></i><?php echo $name; echo $user['name'];?></a></li>
            <li class="nav-item"><a href="/user/logout/" class='nav-link nav__link--last'><i class="logOut"></i>
                Выход</a></li>
            <?php endif; ?>
          </ul>
        </div>
      </nav>


      <!-- <div class="header__wrapper">
                    <ul class='nav'>
                        <li><a href="/" class='nav__link logo'><img src="/template/images/home/logo.png" alt="" /></a></li>
                        <li><a href="/" class='nav__link'>Главная</a></li>
                        <li><a href="#" class='nav__link nav__link--category-btn'>Категории<i class="fall_menu"></i></a>
                            <ul class='nav__sublist'>
                                <?php foreach($categories as $categoryItem): ?>
                                    <li>
                                        <a href="/category/<?php echo $categoryItem['id'];?>" class='nav__link--categories nav__link'>
                                            <?php echo $categoryItem['name'];?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                        <li><a href="/about/" class='nav__link'>О магазине</a></li>
                        <li><a href="/contacts/" class='nav__link'>Контакты</a></li>
                    </ul>
                    <ul class='nav'>
                        <li>
                            <a href="/cart" class='nav__link'>
                                <i class="fa fa-shopping-cart"></i> Корзина 
                                (<span id="cart-count"><?php echo Cart::countItems(); ?></span>)
                            </a>
                        </li>
                        <?php if (User::isGuest()): ?>                                        
                            <li><a href="/user/login/" class='nav__link nav__link--last'><i class="login"></i> Вход</a></li>
                        <?php else: ?>
                            <li><a href="/cabinet/" class='nav__link'><i class="user"></i><?php echo $name; echo $user['name'];?></a></li>
                            <li><a href="/user/logout/" class='nav__link nav__link--last'><i class="logOut"></i> Выход</a></li>
                        <?php endif; ?>
                    </ul>
                </div> -->
    </header>

  </div>