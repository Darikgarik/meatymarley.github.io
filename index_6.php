<?session_start ();
	require ('page_6.inc');
	$homepage = new Page();
	$homepage -> SetContent('<p> Лабораторная работа по теме: Работа с сессиями в PHP </p>');
	$homepage -> SetTitle('Лабораторная работа по теме: Работа с сессиями в PHP');
	$homepage -> Setnazvanie('Лабораторные работы по курсу Разработка интернет приложений в сфере коммерции посредством PHP и MySQL <br> Студента группы ПИ-172');
	$homepage -> Display();
?>