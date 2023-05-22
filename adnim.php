<!DOCTYPE html>
<html lang="bg">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
    <!--Header End-->
    <header>    
        <div class="container"> 
            <div id="branding">
                <h1>БЕЛ</h1>
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
    <!--Sections-->
    <section>
        <div class="contact-form">
            <h3><a href="#">Добави</a></h3>
            <h3><a href="#">Изтрий</a></h3>
            <form id="contact-form" method="post" action="php/contact-form-handler.php">
                <input name="email" type="email" class="form-control" placeholder="Email" required>
                <br>
                <input name="password" type="text" class="form-control" placeholder="Password" required>
                <br> 
                    <input type="submit" class="form-control submit" value="Влез">
                </form>
        </div>
    </section>
    <!--Sections END-->
</body>
</html>