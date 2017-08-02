<!DOCTYPE HTML>
<html>
<head>
<title>Night club </title>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
</head>
<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
?>
<body>
	<?php 
		
		$stylesOfMusic = array(
			array(
				'music' => 'pop',
				'actions' => 'плавно двигается туловищем, руками, ногами и головой'
			),
			array(
				'music' => 'rnb',
				'actions' => 'покачивает телом вперед и назад, ноги в полу-присяде, руки сгибает в локтях, головой вперед-назад'
			),
			array(
				'music' => 'electrohouse',
				'actions' => 'покачивает туловищем вперед-назад, почти нет двигает головой, круговые движения - вращает руками, ноги двигаются в ритме'
			)
		);
		
		$guests = array();
		$guestsMusic = array();
		$countOfGuests = rand(1,25);
		echo "<h1>Сегодня к нам в клуб пожаловало гостей: ".$countOfGuests.".</h1><p><strong>Вот что они о себе рассказали:</strong></p>";
		for ($i=0;$i<$countOfGuests;$i++){ //здесь создается гость со своими умениями
			$guests[$i]['name'] = "Имя".$i;
			$countOfFavMusic = rand(0,count($stylesOfMusic)); //рандомное число любимых треков 
			$guests[$i]['countFavMusic'] = $countOfFavMusic; //рандомное число любимых треков гостя
			echo "<p>------- Гость <strong>".$guests[$i]['name']."</strong>";
			if ($countOfFavMusic == 0){
				echo " не умеет танцевать. Пришел пить водку :D";
			} else {
				for ($j=0; $j<$countOfFavMusic; $j++){
					$randLoveStyle = rand(0,count($stylesOfMusic)-1); //рандомный любимый стиль гостя
					$guestsMusic[$i][$j]= $stylesOfMusic[$randLoveStyle]['music'];
				}
				$arr = array_unique($guestsMusic[$i]);
				echo " любит музыку: ";
				foreach ($arr as $value) {
					echo "<i>".$value." </i>";
				}
			}
			echo " ------- </p>";
		}
		
		$summTrack = rand(1,6); //сколько композиций будет сыграно в клубе
		echo "<h3>Композиций будет сыграно: ".$summTrack."</h3>";
		echo "<h2>Дискотека начинается! </h2><hr />";
		for ($k = 0; $k < $summTrack; $k++){
			$countStyleMusic = rand(0,count($stylesOfMusic)-1);
			echo "<p><strong>В клубе заиграла музыка в стиле ".$stylesOfMusic[$countStyleMusic]['music']."</strong></p>";
			for ($i=0;$i<$countOfGuests;$i++){	//выводит действия каждого гостя во время композиции
				$countOfFav = $guests[$i]['countFavMusic'];
				if ( $countOfFav != 0){
					for ($j=0; $j < $countOfFav; $j++){
						if ($stylesOfMusic[$countStyleMusic]['music'] == $guestsMusic[$i][$j]){
							$action = "<p>---<strong>".$guests[$i]['name']."</strong> ".$stylesOfMusic[$countStyleMusic]['actions']." </p>";
							$j = $countOfFav;
						} else {
							$action = "<p>---<strong>".$guests[$i]['name']."</strong> пьет водку</p>";
						}
					}
					echo $action;
				} else {
					echo "<p>---<strong>".$guests[$i]['name']."</strong> пьет водку</p>";
				}
			}
			echo "<p><strong>В клубе закончилась музыка в стиле ".$stylesOfMusic[$countStyleMusic]['music']."</strong></p><hr />";
		}
		echo "<h2>Время вышло. Все ушли по домам. </h2>";
	?>
</body>
</html>