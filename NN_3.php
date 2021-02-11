<?php
	class myRectangle // класс для прямоугольника
	{
		public $a, $b;
		function square($a,$b)
		{
			$this->a =$a;
			$this->b =$b;
		$this->s = $s = $a * $b;
		}
	}
	$myRect = new myRectangle;
	$myRect->square(5,6);
/*	echo "<br>"."</br>";
	echo $myRect->s ;*/
	
	class myСircle // класс для круга
	{
		public $r;
		function square($r)
		{
			$this->r =$r;
			
		$this->s = $s = M_PI * $r**2;
		}
	}
	$myСirc = new myСircle;
	$myСirc->square(5);
/*	echo "<br>"."</br>";
	echo $myСirc->s ;*/
	
	class myTriangle // класс для треугольника
	{
		public $h, $b;
		function square($h,$b)
		{
			$this->a =$h;
			$this->b =$b;
		$this->s = $s = ($h * $b)/2;
		}
	}
	$myTrian = new myTriangle;
	$myTrian->square(5,6);
/*	echo "<br>"."</br>";
	echo $myTrian->s ;*/

	// заносим случайные числа в массив 
	$array = [];

	$quan_rand = 20; // колличество случайных чисел
	
	for($i=0; $i < $quan_rand; $i++) 
	{
		$rand_num1 =  mt_rand(1 ,10); // формируем случайные числа
		$rand_num2 =  mt_rand(1 ,10);
		
		$arr['rand_num1']= $rand_num1;
		$arr['rand_num2']= $rand_num2;
		$array[] = $arr;
	}
	
	
	$array_myСirc = [];
	
	for($i=0; $i < count($array); $i++) // получаем массив после выполнения класса
	{
		$myRect->square($array[$i]['rand_num1'],$array[$i]['rand_num2']);
		$array_myRect[] = $myRect->s;
	}
 
	$fd = fopen("myRect.txt", 'w') or die("не удалось создать файл");// записываем в файл
		$str = implode('|', $array_myRect);
			fwrite($fd, $str);
				fclose($fd);


	$f = fopen("myRect.txt", "rt") or die("Ошибка!");// получаем значения из файла и сортируем
	$my_Rect_table = fgetcsv($f, 1000, "|");
	arsort($my_Rect_table);
 

	$table = '<table border="1">'; // печатаем таблицу
	$table .= '<tr><th>Число</th><th>Площадь <br> прямоугольника</th></tr>';
	$i_i = 0;
	
foreach($my_Rect_table as $key => $value)
{
	$k = 1+$i_i;
	$i_i++;
	$table .= '<tr><td>'. $k .'</td><td>'. $value .'</td></tr>';
}
	echo $table;
 
	$array_myСirc = [];
	
	for($i=0; $i < count($array); $i++) // получаем массив после выполнения класса
	{
		$myСirc->square($array[$i]['rand_num1']);
		$array_myСirc[] = $myСirc->s;
	}
 
	$fd = fopen("myСirc.txt", 'w') or die("не удалось создать файл");// записываем в файл
		$str = implode('|', $array_myСirc);
			fwrite($fd, $str);
			fclose($fd);


	$f = fopen("myСirc.txt", "rt") or die("Ошибка!");// получаем значения из файла и сортируем
		$my_Сirc_table = fgetcsv($f, 1000, "|");
			arsort($my_Сirc_table);
	
	$table = '<table border="1">'; // печатаем таблицу
	$table .= '<tr><th>Число</th><th>Круга</th></tr>';
	$i_i = 0;

foreach($my_Сirc_table as $key => $value)
{
	$k = 1+$i_i;
	$i_i++;
	$table .= '<tr><td>'. $k .'</td><td>'. $value .'</td></tr>';
}
	echo $table;
 
 $array_myTrian = [];
	
	for($i=0; $i < count($array); $i++) // получаем массив после выполнения класса
	{
		$myTrian->square($array[$i]['rand_num1'],$array[$i]['rand_num2']);
		$array_myTrian[] = $myTrian->s;
	}
 
	$fd = fopen("myTrian.txt", 'w') or die("не удалось создать файл");// записываем в файл
		$str = implode('|', $array_myTrian);
			fwrite($fd, $str);
				fclose($fd);


	$f = fopen("myTrian.txt", "rt") or die("Ошибка!");// получаем значения из файла и сортируем
		$my_Trian_table = fgetcsv($f, 1000, "|");
 
 arsort($my_Trian_table);

	$table = '<table border="1">'; // печатаем таблицу
	$table .= '<tr><th>Число</th><th>Площадь <br> треугольника</th></tr>';
	$i_i = 0;
	
foreach($my_Trian_table as $key => $value)
{
	$k = 1+$i_i;
	$i_i++;
	$table .= '<tr><td>'. $k .'</td><td>'. $value .'</td></tr>';
}
	echo $table;
 
?>