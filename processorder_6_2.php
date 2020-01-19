<?php
//echo "$tireqty";
//echo "$oilqty";
	require ('page_6.inc');

	class OrderformPage extends Page 
	{
		var $row2buttons = array ('Re-engineering' => 'reengineering.php',
								  'Standards Compliance' => 'standards.php',
								  'Buzzword Compliance' => 'buzzword.php',
								  'Mission Statements' => 'mission.php');
// var $tireqty;
// var $oilqty;
// var $sparkqty;
// var $address ;
		function Display_1($tireqty)
		{
			//$this->tireqty=$tireqty ;
			//echo $this->tireqty;
			echo $tireqty;
		}

	function Display ($nick, $fio, $email, $passwd)
	{
		echo "<html>\n<head>\n";
			$this -> DisplayTitle();
			$this -> DisplayKeywords();
			$this -> DisplayStyles();
			echo "</html>\n<body>\n";
			$this -> DisplayHeader();
			$this -> DisplayMenu($this->buttons);
			$this -> DisplayMenu($this->row2buttons);
?> <table width=100% height=100% border=1><tr><td class=cont><? echo $this->zakaz($nick, $fio, $email, $passwd); ?> </td></table> <?
	$this -> DisplayFooter();
	//echo "</body>\n</html>\n";
	}

	function Display_2()
	{?> <table width=100% height=100% border=1><tr>
		<td class=cont> Не все поля формы заполненны! </td><tr>
			<td class=cont> <? echo $this -> content; ?> </td></table> <? }

function zakaz($nick, $fio, $email, $passwd)
{
	// <?php
	//$tireqty = $HTTP_POST_VARS ['tireqty'];
	//$oilqty = $HTTP_POST_VARS ['oilqty'];
	//$sparkqty = $HTTP_POST_VARS ['sparkqty'];
	//$address = $HTTP_POST_VARS ['address'];
	//$DOCUMENT_ROOT = $HTTP_SERVER_VARS ['DOCUMENT_ROOT'];
	$hostname ="localhost";
	$user="root";
	$password="";
	$db="lab3";
	if (!$link = mysql_connect($hostname, $user, $password))
	{
		//echp "<br> Не могу соединитья с сервером бд <br>";
		exit();
	}
	//echo "<br> Соединение с сервером бд прошло успешно <br>";

	if (!mysql_select_db($db, $link))
	{
		//echp "<br> Не могу выбрать бд <br>";
		exit();
	}
	else
	{
		//echo "<br> Выбор бд прошел успешно <br>";
	}
	if ($nick!="" and $passwd!="" and $email!="" and $fio!="")
	{
		$query="insert into info (nick, password, email, fio) values ('$nick', '$passwd', '$email', '$fio')";
		$result=mysql_query($query);
		$outputspring = Пользователь. "\t".$fio. " просит зарегистрировать его на сайте www.kuzbass-go.ru с логином \t".$nick." и паролем \t".$passwd."\n";
		echo outputspring;
	} else {
		$services = new OrderformPage();
        $content ='
        <form action="processorder_6_2.php" method=POST>
        <table width=60% align=center bgcolor="white">
        <tr><td><b>Логин:</b><td><input type="text" name="nick" size=40>
        <tr><td><b>ФИО:</b><td><input type="text" name="fio" size=40>
        <tr><td><b>e-mail:</b><td><input type="text" name="email" size=40>
        <tr><td><b>Пароль:</b><td><input type="text" name="passwd" size=40>
        <tr><td><b>Подтвердение пароля:</b><td><input type="text" name="passwdreturn" size=40>
        <tr><td colspan=2 align=center>&nbsp; <br><input type="submit" value="Submit"></table>
        </form>';
        $services -> SetContent($content);
        $services -> Display_2();
	}
    ?>
<br>
<br>
<a href="vieworders_password_6.php"> Интерфейс персонала для просмотра файла заказов</a> <?}
}
$services = new OrderformPage();
$content = 'cddc';
$services -> SetContent($content);
$services -> SetTitle('Лабораторная работа по теме: ООП на РНР');
$services -> Setnazvanie('Лабораторные работы по курсу РНР и МуSQL');
//$services -> Display_1 ($tireqty);
$services -> Display($nick, $fio, $email, $passwd);
// $services -> zakaz ($tireqty, $oilqty, $sparkqty, $address, $DOCUMENT_ROOT, $fio);
?>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        