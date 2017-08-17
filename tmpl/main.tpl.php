<!doctype html>
<html lang="`">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Описание">
    <meta name="keywords" content="Ключевые слова">
    <link rel="stylesheet" href="style/main.css">
    <title>Main Page</title>
</head>
<body>


<div class="container">
    <!--header begin-->
    <header>
        <div class="header__logo"></div>
        <div class="header__name">Shop</div>
        <div class="header__nav"></div>
        <div class="clear"></div>
    </header>
    <!--header end-->

    <!--left block start-->
    <div class="left-block">
        <?= $menu ?>
        <?= $auth ?>

        <div class="banner"></div>

    </div>
    <!--left block end-->

    <!--content block start-->
    <div class="content">
        <?= $main_topic ?>
        <?= $topic ?>
        <hr>
        <?= $tp ?>
    </div>

    <!--content block end-->

    <!--right block start-->
    <div class="right-block">
        <?= $search ?>
        <div class="marketing">
            <p>Реклама</p>
            <div class="banner"></div>
            <div class="banner"></div>
        </div>
    </div>
    <!--right block end-->
    <div class="clear"></div>
    <div class="empty1"></div>
    <div class="empty2"></div>
    <footer>
        <p>Все права защищены &copy;</p>
    </footer>

</div>
</body>
</html>
