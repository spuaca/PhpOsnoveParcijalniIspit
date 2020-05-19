<?php 

	function brojaci($rijec) {
		// Pretvori rijec u lowercase
		$rijec = strtolower($rijec);
		// Podijeli znakove rijeci na niz
		$rijec = str_split($rijec);
		// Incijaliziraj brojace
		$brojac_samoglasnika = 0;
		$brojac_suglasnika = 0;

		foreach ($rijec as $slovo) {
			switch ($slovo) {
				case "a":
				case "e":
				case "i":
				case "o":
				case "u":
					$brojac_samoglasnika++;
					break;
				default:
					$brojac_suglasnika++;
					break;
			}
		}

		return array($brojac_suglasnika, $brojac_samoglasnika);

		// // 2. NACIN ZA IZRACUNATI SUGLASNIKE
		// // Spremi duljinu rijeci
		// $duljina_rijeci = strlen($rijec);
		// // Pretvori rijec u lowercase
		// $rijec = strtolower($rijec);
		// // Podijeli znakove rijeci na niz
		// $rijec = str_split($rijec);
		// // Incijaliziraj brojace
		// $brojac_samoglasnika = 0;
		// $brojac_suglasnika = 0;

		// foreach ($rijec as $slovo) {
		// 	if ($slovo == "a" or $slovo == "e" or $slovo == "i" or $slovo == "o" or $slovo == "u") {
		// 		$brojac_samoglasnika++;
		// 	}
		// }
		// $brojac_suglasnika = $duljina_rijeci - $brojac_samoglasnika;

		// return array($brojac_suglasnika, $brojac_samoglasnika);
	}
 ?>