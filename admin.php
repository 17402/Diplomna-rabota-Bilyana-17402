<?php

session_start();
$error = false;

if ( isset( $_POST['login'] ) ) {
	
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	if ( $email == "silly.foxy_books" && $password == "020202bB" ) {
		
		$_SESSION['user'] = "silly.foxy_books";
		
	} else {
		
		$error = "Грешен потребител";
	}
}
?>

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
 
<?php
if ( !isset($_SESSION['user'] )) {
	
	if ( $error ) {
?>

		<h3><?= $error ?></h3>
<?php
	}
?>

            <form id="contact-form" method="post" action="admin.php" method="post">
                <input name="email" type="text" class="form-control" placeholder="Email" required>
                <br>
                <input name="password" type="text" class="form-control" placeholder="Password" required>
                <br> 
                    <input type="submit" name="login" class="form-control submit" value="Влез">
                </form>
<?php
} else {
?>
	<h3><a href="admin.php">Жанр</a> &bull; <a href="admin-literature.php">Книги</a></h3><br>
	
<?php
	
	// connection

$connection = new PDO('mysql:host=localhost;dbname=books;charset=utf8mb4', "root", "");

// в $rows има записани всички редове от таблицата temi

$rows = $connection->query('SELECT * FROM ganre');
?>
           <h3><a href="edit-temi.php">Добави</a></h3>
<center>
<table>
<?php
  foreach( $rows as $row ) {
?>
	<tr>
		<td style="color:white; text-align:center;"><?= $row['title'] ?></td>
		<td>
			<h3><a href="edit-temi.php?delete=<?= $row['id'] ?>" onclick="if(!confirm('Изтриване?'))return false;">Изтрий</a></h3>
			<h3><a href="edit-temi.php?id=<?= $row['id'] ?>">Редакция</a></h3>
		</td>

	</tr>
<?php
  }
 ?>
</table>
</center>
<?php
}
?>
        </div>
    </section>
    <!--Sections END-->
</body>
</html>