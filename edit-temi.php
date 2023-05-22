<?php


$connection = new PDO('mysql:host=localhost;dbname=books;charset=utf8mb4', "root", "");

$id = $_GET['id'];

if ( $id ) {
	
	$obj = $connection->prepare( "SELECT * FROM ganre WHERE id = ?" );
	$obj->execute( [ $id ] );
	$tema = $obj->fetch();
	
	$title = $tema['title'];
}

$delete = $_GET['delete'];

if ( $delete ) {
	
	$obj = $connection->prepare( "DELETE FROM ganre WHERE id = ?" );
	$obj->execute( [ $delete ] );
	
	header("location:admin.php");
}



session_start();

if ( !$_SESSION['user'] ) {
		
	echo "Грешен потребител";
	exit;
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

if ( $_POST ) {

	$title = htmlspecialchars( trim( $_POST['title'] ) );
	$error = false;
	
	if ( !$title ) {
		
		$error = "Попълнете заглавие";
	}
	
	if ( $id ) {
	
		$obj = $connection->prepare( "SELECT * FROM ganre WHERE ganre = ? AND id <> ?" );
		$obj->execute( [ $ganre, $id ] );
		$ganre1 = $obj->fetch();
		
	
	} else {
		
		$obj = $connection->prepare( "SELECT * FROM ganre WHERE ganre = ?" );
		$obj->execute( [ $title ] );
		$ganre1 = $obj->fetch();
	}
	
	if ( $ganre1 ) {
		
		$error = "Такъв жанр вече съществува";
	}
	
	
	if ( !$error ) {
		
			if ( $id ) {

				$sql = "
					UPDATE ganre SET 
					ganre = ?
					WHERE id = ?
				";
				$connection->prepare($sql)->execute([$ganre, $id]);
				
			} else {
	
				$sql = "INSERT INTO ganre (ganre) VALUES (?)";
				$connection->prepare($sql)->execute([$ganre]);
			}
		
			$id = $connection->lastInsertId();

			header("location:admin.php");
			
	}
}

?>



<form action="edit-ganre.php?id=<?= $id ?>" method="post">

<?php
	if ( isset($error) ) {
?>

		<h3 ><?= $error ?></h3><br>
<?php
	}
?>

	<!-- title -->

	<label for="text">Заглавие:</label><br>
	<input id="text" type="text" name="ganre" value="<?= @$title ?>" class="form-control" placeholder="Напишете заглавие">
	<br><br>



	<input type="submit" name="submit" value="Запиши">

</form>

 
 
 
 
 
 
 
 
 
 
 
 
 
        </div>
    </section>
    <!--Sections END-->
</body>
</html>