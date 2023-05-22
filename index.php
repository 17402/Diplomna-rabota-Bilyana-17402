<!DOCTYPE html>
<html lang="bg">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>БЕЛ |Home</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<?php

// connection

$connection = new PDO('mysql:host=localhost;dbname=books;charset=utf8mb4', "root", "");

// в $rows има записани всички редове от таблицата temi

$rows = $connection->query('SELECT * FROM ganre');
?>
<body>
    <!--Header-->
    <header>    
        <div class="container">
            <div id="branding">
                <h1>silly.foxy_books</h1>
            </div>
            <nav> 
                <ul>
                    <li class="current"><a href="index.php">Начало</a></li>
                    <li><a href="contacts.php">Контакти</a></li>
               </ul>
            </nav>
        </div>
    </header>
    <!--Header End-->

    <!--Sections-->
    <section id="showcase">
        <div class="container">
            <h1>~Чети и мечтай</h1>
        </div>
    </section>
    <section id="box">
     <p class="edit"><a href="admin.php">Администратор</a></p>
    </section>
<!--
    <section id="box1">
        <div class="box">
            <h3 class="box-title">Български език</h3>
            <nav>
                <ol>
                    <li><a href="">Членуване</a></li>
                    <li><a href="">Пунктуационни норми</a></li>
                    <li><a href="">Правоговорна норма</a></li>
                    <li><a href="">Правописна норма</a></li>
                    <li><a href="">Граматични норми</a></li>
                    <li><a href="">Пунктуационна норма</a></li>
                </ol>
            </nav>
        </div>
    </section>      
-->

    <section id="box2">   
        <div class="box">
        <?php foreach( $rows as $row ) { ?>
            <h3 class="box-title">
            <a href="pages.php?id=<?= $row['id'] ?>"><?= $row['title'] ?></a></h3>
                <p><a href="pages.php?id=<?= $row['id'] ?>"><?= $row['link'] ?><?= str_replace("\n","<br>", $book['link'] ) ?></a></p>
                <img src="<?= $book['img'] ?>" alt="<?= $book['title'] ?>">
                <?php 
                     }
                ?>
            <nav>
                <dl>
                <?php
                foreach( $rows as $row ) {
                    $literature = $connection->query('SELECT * FROM literature WHERE tema_id = '.$row['id']);
                ?>
                    <dt><?= $row['title'] ?></dt>

                    <?php
                    foreach( $literature as $row1 ) {
                    ?>
                    <dd><a href="pages.php?id=<?= $row1['id'] ?>"><?= $row1['autor_and_title'] ?> </a></dd>

                   
             <?php
                    
                    
                    }
                }
                ?>
            </nav>
        </div>
    </section>

<!--
    <section id="box2">   
        <div class="box">
            <h3 class="box-title">Теми по литература</h3>
            <nav>
                <dl>
                    <dt>Родното и чуждото</dt>
                        <dd><a href="pages/balkanski-sindrom.php">"Балкански синдром"</a></dd>
                        <dd><a href="pages/bay-ganyo-journalist.php">"Бай Ганьо журналист"</a></dd>
                        <dd><a href="pages/zhelezniya-svetilnik.php">"Железният светилник"</a></dd>
                    <dt>Минаото и паметта</dt>
                        <dd><a href="">"Паисий"</a></dd>
                        <dd><a href="">"Ноев ковчег"</a></dd>
                        <dd><a href="">"История"</a></dd>
                    <dt>Обществото и властта</dt>
                        <dd><a href="">"Приказка за стълбата"</a></dd>
                        <dd><a href="">"Андрешко"</a></dd>
                        <dd><a href="">"Борба"</a></dd>
                    <dt>Животът и смъртта</dt>
                        <dd><a href="">"Новото гробище над Сливница"</a></dd>
                        <dd><a href="">"До моето първо либе"</a></dd>
                        <dd><a href="">"Крадецът на праскови"</a></dd>
                    <dt>Природата</dt>
                        <dd><a href="">"Спи езерото"</a></dd>
                        <dd><a href="">"Градушка"</a></dd>
                        <dd><a href="">"При Рилския манастир"</a></dd>
                    <dt>Любовта</dt>
                        <dd><a href="">"Аз искам да те помня все така"</a></dd>
                        <dd><a href="">"Колко си хубава"</a></dd>
                        <dd><a href="">"Посвещение"</a></dd>
                    <dt>Вярата и надеждата</dt>
                        <dd><a href="">"Спасова могила"</a></dd>
                        <dd><a href="">"Молитва"</a></dd>
                        <dd><a href="">"Вяра"</a></dd>
                    <dt>Трудът и творчеството</dt>
                        <dd><a href="">"Ветрена малница"</a></dd>
                        <dd><a href="">"Песен на колелата"</a></dd>
                        <dd><a href="">"Балада за Георг Хених"</a></dd>
                        <dt></dt>
                            <dd><a href=""></a></dd>
                            <dd><a href=""></a></dd>
                            <dd><a href=""></a></dd> 

                </dl>
            </nav>
        </div>
    </section>   -->

    <!--Sections END-->
    
    <!--Footer-->
    <footer>
        
    </footer>
    <!--Footer End-->
</body>
</html>