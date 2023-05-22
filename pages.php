<?php

// connection

$connection = new PDO('mysql:host=localhost;dbname=books;charset=utf8mb4', "root", "");

$id = $_GET['id'];

// SELECT заявка към базата

$obj = $connection->prepare( 'SELECT * FROM book WHERE id = ?' );
$obj->execute([$id]); 
$literature = $obj->fetch();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $literature['autor_and_title'] ?></title>
    <link rel="stylesheet" href="css/pages-style.css">
</head>
<body>
    <!--Header End-->
    <header>    
        <div class="container"> 
            <div id="branding">
                <h1>silly.foxy_books</h1>
            </div>
            <nav> 
                <ul>
                    <li><a href="index.php">Начало</a></li>
                    <li><a href="contacts.php">Контакти</a></li>
               </ul>
            </nav>
        </div>
    </header>
    <!--Header End-->
    
   <!--АSIDE-->
  <!--   <aside id="content">
            <h3 id="box-title"><a href="#top">Съдържание:</a></h3>
        <nav>
            <ul>
                <li class="main"><a href="#h4-1">Автор</a></li>
                <li class="main"><a href="#h4-2">Жанр</a></li>
                <li class="main"><a href="#h4-3">Заглавие</a></li>
                <li><a href="#h4-4">Тематика</a></li>
                <li><a href="#h4-5">Проблематика</a></li>
                <li><a href="#h4-6">Композиция</a></li>
                <li><a href="#h4-7">Образи<a></li>
            </ul>
        </nav>
    </aside>
-->
    <!--АSIDE END-->

    <!--Sections-->
    <section>
        <div id="title">
            <h1><?= $book['title'] ?></h1>
        </div>
    </section>
    <section>
        <div id="about">
        <h1><?= $book['title'] ?></h1>
        <img src="<?= $book['img'] ?>" alt="<?= $book['title'] ?>">
        <h4 id="h4-1">АВТОР</h4>
        <p><?= str_replace("\n","<br>", $book['title'] ) ?>
        </p>
        <br><br>
    <h4 id="h4-2">ЖАНР</h4>
        <p><?= str_replace("\n","<br>",$book['author'] ) ?>
        </p>
        <br><br>
    <h4 id="h4-3">Брой страници</h4>
        <p><?= str_replace("\n","<br>", $book['pages'] ) ?>
        </p>
        <br><br>
    <h4 id="h4-4">Мнение</h4>
        <p><?= str_replace("\n","<br>", $book['my_opinion'] ) ?>
        </p>
        <br><br>
    <h4 id="h4-5">В книгата се разказва за:</h4>
        <p><?= str_replace("\n","<br>", $book['about'] ) ?>
        </p>
        <br><br>
    <h4 id="h4-6">Цитати</h4>
        <blockquote><?= str_replace("\n","<br>", $book['quotes'] ) ?>
        </blockquote>
        <br><br>
    <h4 id="h4-7">ОБРАЗИ</h4>
        <p><?= str_replace("\n","<br>", $book['images'] ) ?>
        </p>
        <br><br>
    <h4 id="h4-7">Харесайте поста и ме последвайте в инстаграм:</h4>
        <p><?= str_replace("\n","<br>", $book['link'] ) ?>
        </p>
    
        </div>
    </section>
    <!--Sections END-->
    <!--Footer-->
    <footer>

    </footer>
    <!--Footer End-->
</body>
</html>