<?php


$connection = new PDO('mysql:host=localhost;dbname=books;charset=utf8mb4', "root", "");

$id = $_GET['id'];

if ( $id ) {
	
	$obj = $connection->prepare( "SELECT * FROM book WHERE id = ?" );
	$obj->execute( [ $id ] );
	$book = $obj->fetch();
	
	$title = $book['title'];
	$author = $book['author'];
	$pages = $book['pages'];
	$my_opinion = $book['my_opinionmy_opinion'];
	$about = $book['about'];
	$quotes = $book['quotes'];
	$link = $book['link'];
	$img = $book['img'];
}

$delete = $_GET['delete'];

if ( $delete ) {
	
	$obj = $connection->prepare( "DELETE FROM book WHERE id = ?" );
	$obj->execute( [ $delete ] );
	
	header("location:admin-book.php");
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
	$autor = htmlspecialchars( trim( $_POST['autor'] ) );
	$pages = htmlspecialchars( trim( $_POST['pages'] ) );
	$my_opinion = htmlspecialchars( trim( $_POST['my_opinion'] ) );
	$about = htmlspecialchars( trim( $_POST['about'] ) );
	$quotes = htmlspecialchars( trim( $_POST['quotes'] ) );
	$img = htmlspecialchars( trim( $_POST['img'] ) );
	$link = htmlspecialchars( trim( $_POST['link'] ) );
	$tema_id = htmlspecialchars( trim( $_POST['tema_id'] ) );
    $file = $_FILES['pic'];
	$file_name = $_FILES['pic']['name'];
	$file_temp = $_FILES['pic']['tmp_name'];
	$file_type = $_FILES['pic']['type'];
	$error = false;
	
	if ( !$title ) {
		
		$error .= "Попълнете заглавие<br>";
	}
	
	if ( !$autor ) {
		
		$error .= "Попълнете автор<br>";
	}

	if ( !$pages ) {
		
		$error .= "Попълнете броя на страниците<br>";
	}

	if ( !$my_opinion ) {
		
		$error .= "Попълнете полето за лично мнение<br>";
	}

	if ( $file_name && ( $file_type != "img/jpeg" && $file_type != "img/png" ) ) {
		
		$error .= "Качете .jpeg или .png снимка<br>";
	}

	
	if ( !$error ) {
		
		
			if ( $id ) {

				$sql = "
					UPDATE literature SET 
					autor_and_title = ?,
					autor = ?,
					ganre = ?,
					title = ?,
					subject_matter = ?,
					issues = ?,
					composition = ?,
					images = ?,
					tema_id = ?
					WHERE id = ?
				";
				$connection->prepare($sql)->execute([$autor_and_title,$autor,$ganre,$title,$subject_matter,$issues,$composition,$images,$tema_id,$id]);
				
			} else {
				
				$sql = "
					INSERT INTO literature ( autor_and_title,autor,ganre,title,subject_matter,issues,composition,images,tema_id )
					VALUES (?,?,?,?,?,?,?,?,?)
				";
				$connection->prepare($sql)->execute([$autor_and_title,$autor,$ganre,$title,$subject_matter,$issues,$composition,$images,$tema_id]);

				$id = $connection->lastInsertId();

				if ( !$id )
					$error = "Грешка при запис в базата";
				
			}
		
			if( $id && $file_name ) {
				
				move_uploaded_file( $file_temp, "img/".$id.".jpg" );
				
				$connection->query("UPDATE literature SET picture = 'img/".$id.".jpg' WHERE id = ".$id );
			}

			header("location:admin-literature.php");
			
	}
}

?>

<div id="edit-literature">
<form action="edit-literature.php?id=<?= $id ?>" method="post" enctype="multipart/form-data">

<?php
	if ( $error ) {
?>

		<h3 ><?= $error ?></h3><br>
<?php
	}
?>

	<!-- title -->

	<label for="text">Заглавие:</label><br>
	<input id="text" type="text" name="title" value="<?= @$title ?>" class="form-control" placeholder="Напишете заглавие">
	<br><br>

<?php
	$rows = $connection->query('SELECT * FROM ganre');
?>
	<label >Тема:</label><br>
	<select name="ganre_id">
<?php
	foreach( $rows as $row ) {
?>
		<option value="<?= $row['id'] ?>"><?= $row['title'] ?></option>
<?php
	}
?>
	</select><br><br>

	<label >Автор:</label><br>
	<input id="text" type="text" name="author" value="<?= @$author ?>" class="form-control" placeholder="Напишете автор">
	<br><br>
	<label >Информация за жанр:</label><br>
	<input id="text" type="text" name="pages" value="<?= @$pages ?>" class="form-control" placeholder="Напишете броя на страниците">
	<br><br>


	<label >Лично мнение за книгата:</label><br>
	<textarea  name="my_opinion" class="form-control" placeholder="Напишете лично мнение за книгата" style="height:300px; weight: 500px;"><?= @$my_opinion ?></textarea>
	<br><br>

	<label >Какво се разказва в книгата:</label><br>
	<textarea  name="about" class="form-control" placeholder="about" style="height:300px; weight: 500px;"><?= @$about ?></textarea>
	<br><br>

	<label >Цитат:</label><br>
	<textarea  name="quotes" class="form-control" placeholder="Напишете цитат" style="height:300px; weight: 500px;"><?= @$quotes ?></textarea>
	<br><br>
	
	<label >Прикъчете линк към публикацията:</label><br>
	<input id="text" type="file" name="link" class="form-control">
	<br><br>

    <label for="text">Picture</label><br>
	<input id="text" type="file" name="pic" class="form-control">
	<br><br>

	<input type="submit" name="submit" value="Запиши">

</form>
</div>
 
 
 
 
 
 
 
 
 
 
 
 
 
        </div>
    </section>
    <!--Sections END-->
</body>
</html>