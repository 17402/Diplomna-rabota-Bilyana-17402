<!DOCTYPE html>
<html lang="bg">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>БЕЛ |Contacts</title>
    <link rel="stylesheet" href="css/contacts.css">
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
                    <li class="current"><a href="contacts.php">Контакти</a></li>
               </ul>
            </nav>
        </div>
    </header>
    <!--Header End-->
    <!--Sections-->
    <section id="showcase">
        <div>
            <h1>Свържете се с нас</h1>
        </div>
    </section>

    <section>
        <div class="contact-form">
            <form id="contact-form" method="post" action="php/contact-form-handler.php">
                <input name="name" type="text" class="form-control" placeholder="Name" required>
                <br>
                <input name="email" type="email" class="form-control" placeholder="Email" required>
                <br> 

                    <textarea name="message" class="form-control" placeholder="Message" rows="4" 
                    required></textarea><br>

                    <input type="submit" class="form-control submit" value="Изпрати">
                </form>
        </div>
    </section>
    <!--Sections END-->
    <!--Footer-->
    <footer>

    </footer>
    <!--Footer End-->
</body>
</html>