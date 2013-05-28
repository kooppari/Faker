<!DOCTYPE html>
<html>
<head>
<title>Faker testailu</title>
</head>
<body>

<h1>DATAGENERAATTORI 3000</h1>

<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">

Tiedoston nimi (esim. testi.sql): <br /><input type="text" name="tiedostonimi" /><br />
Tietokannan nimi: <br /><input type="text" name="kantanimi" /><br />
Tietokannan taulun nimi: <br /><input type="text" name="taulunimi" /><br /><br />

Nimien määrä: <br /><input type="text" name="maara" />
<input type="submit" value="Lataa" name="nappi" /><br /><br />

</form>

<?php

	require_once '/src/autoload.php';
	
	if(isset($_REQUEST['nappi']))
	{
		$faker = Faker\Factory::create('fi_FI');
		
		$kantanimi = $_REQUEST['kantanimi'];
		$taulunimi = $_REQUEST['taulunimi'];
		$maara = $_REQUEST['maara'];
		//$tiedostonimi = $_REQUEST['tiedostonimi'];
		
		//$ext = substr($tiedostonimi, strpos($tiedostonimi,'.')+1);
		
		$file = $_REQUEST['tiedostonimi'];
		
		$current = file_get_contents($file);
		
		$current .= "CREATE DATABASE IF NOT EXISTS " . $kantanimi . ";\n";
		file_put_contents($file, $current);
		$current .= "USE " . $kantanimi . ";\n";
		file_put_contents($file, $current);
		$current .= "\n";
		file_put_contents($file, $current);
		
		$current .= "CREATE TABLE IF NOT EXISTS `" . $taulunimi . "` (\n";
		file_put_contents($file, $current);
		$current .= "`id` int(20) NOT NULL AUTO_INCREMENT,\n";
		file_put_contents($file, $current);
		$current .= "`nimi` text COLLATE utf8_swedish_ci NOT NULL,\n";
		file_put_contents($file, $current);
		 /*$current .= "`osoite` text COLLATE utf8_swedish_ci NOT NULL,\n";
		file_put_contents($file, $current);
		$current .= "`kaupunki` text COLLATE utf8_swedish_ci NOT NULL,\n";
		file_put_contents($file, $current);
		$current .= "`postinum` text COLLATE utf8_swedish_ci NOT NULL,\n";
		file_put_contents($file, $current);
		$current .= "`puhelin` text COLLATE utf8_swedish_ci NOT NULL,\n";
		file_put_contents($file, $current);
		$current .= "`syntpaiva` text COLLATE utf8_swedish_ci NOT NULL,\n";
		file_put_contents($file, $current);
		$current .= "`syntkuukausi` text COLLATE utf8_swedish_ci NOT NULL,\n";
		file_put_contents($file, $current);
		$current .= "`syntvuosi` text COLLATE utf8_swedish_ci NOT NULL,\n";
		file_put_contents($file, $current);
		$current .= "`kieli` text COLLATE utf8_swedish_ci NOT NULL,\n"; */
		file_put_contents($file, $current);
		$current .= "PRIMARY KEY (`id`)\n";
		file_put_contents($file, $current);
		$current .= ") ENGINE=InnoDB  DEFAULT CHARSET=utf8;\n\n";
		file_put_contents($file, $current);
		
		// generate data by accessing properties
		
		//$current .= "INSERT INTO `" . $taulunimi . "` (`nimi`, `osoite`, `kaupunki`, `postinum`, `puhelin`, `syntpaiva`, syntkuukausi`, `syntkuukausi`, `syntvuosi`, `kieli`) VALUES\n" */
		
		$current .= "INSERT INTO `" . $taulunimi . "` (`nimi`) VALUES\n";
		file_put_contents($file, $current);
		
		for ($i=0; $i < $maara-1; $i++) {
			
			$current .= "('" . $faker->name . "'),\n";
			file_put_contents($file, $current);			
		}
		$current .= "('" . $faker->name . "')\n";
		file_put_contents($file, $current);
		
		$current .= ";";
		file_put_contents($file, $current);
		
		//var_dump($current);
		
		/*$file2 = file_get_contents($current);
		header("Content-Description: File Transfer");
		header('Content-Type: application/x-sql');
		header('Content-Disposition: attachment; filename="' . $tiedostonimi .'"');
		header('Content-Length: "'. filesize($file) .'"');
		echo $file;*/
		
		//var_dump($current);
		
		header('location: /Faker/download.php?file="' . $file .'"');
		
		/*$file_out = $current;

		$out = strlen($file_out);
		if (isset($file_out)) {
			header("Content-Length: $out");
			header("Content-type: application/x-sql");
			header("Content-Disposition: attachment; filename=$filename");
			echo $file_out;
			exit;
		}*/

	}
	
?>

</body>
</html>