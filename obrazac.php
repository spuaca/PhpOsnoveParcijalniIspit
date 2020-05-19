<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PHP Parcijalni Ispit</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>

	<div id="left">
		<form action="" method="POST">
			<label for="rijec">Upišite riječ:</label><br>
			<input type="text" name="rijec" autofocus><br>
			<input type="submit" value="Pošalji">
		</form>
	</div>

	<div id="right">
		<table border="1" cellpadding="10">
			<tr>
				<th>Riječ</th>
				<th>Broj slova</th>
				<th>Broj suglasnika</th>
				<th>Broj samoglasnika</th>
			</tr>
				<?php 
		
				// var_dump($_POST);
				// echo "<br>";
		
				// Include samoglasnik i suglasnik funkcije
				include "funkcija.php";
		
				// Ucitaj datoteku i dekodiraj
				$wordsJson = file_get_contents(__DIR__. "/words.json");
				$words = json_decode($wordsJson, true);
		
				// Provjera uvjeta za POST
				// Provjeri da li je POST prazan
				if (empty($_POST)) {
					echo "<h1>Upišite željenu riječ!</h1>"; 
				}
				
				// Provjeri da li je polje prazno
				elseif (empty($_POST["rijec"])) {
					echo "<h1>Polje ne smije biti prazno!</h1>";
				}
				
				// Provjeri da li polje nije prazno i da li su u rijeci samo slova
				elseif (!empty($_POST["rijec"]) and ctype_alpha($_POST["rijec"])) {
					echo "<h1>Upišite željenu riječ!</h1>";

					// Spremi polje s tekstom u POST
					$rijec = $_POST["rijec"];
		
					// Dodaj novu rijec u niz
					$words[] = $_POST['rijec'];
				}

				// Ako nije ispunjen niti 1 uvjet
				else {
					echo "<h1>Upišite željenu riječ!</h1>"; 
				}
		
				// Enkodiraj i ispisi u datoteku
				$wordsJson = json_encode($words);
				file_put_contents(__DIR__. "/words.json", $wordsJson);
		
		
				// Popuni tablicu
				foreach ($words as $word) {
		
					$broj_slova = strlen($word);
					$broj_suglasnika = brojaci($word)[0];
					$broj_samoglasnika = brojaci($word)[1];
		
					echo "<tr>";
					echo "<td>", $word , "</td>";
					echo "<td>", $broj_slova , "</td>";
					echo "<td>", $broj_suglasnika , "</td>";
					echo "<td>", $broj_samoglasnika , "</td>";
					echo "</tr>";
				}

				?>
		</table>
	</div>


</body>
</html>