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
function Display()
		{
			echo "<html>\n<head>\n";
			$this -> DisplayTitle();
			$this -> DisplayKeywords();
			$this -> DisplayStyles();
			echo "</html>\n<body>\n";
			$this -> DisplayHeader();
			$this -> DisplayMenu($this->buttons);
			$this -> DisplayMenu($this->row2buttons);
?> <table width=100% height=100% border=1><tr><td class=cont><? echo $this->spisok(); ?> </td></table> <?
    $this -> DisplayFooter();
    //echo "</body>\n</html>\n";
}
        function spisok ()
        {
            $DOCUMENT_ROOT = $HTTP_SERVER_VARS['DOCUMENT_ROOT'];
        
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
        
$query_1="select zakaz.id, zakaz.fio, zakaz.adress, zakaz.data, tovar.id, tovar.tiregty, tovar.oilgty, tovar.sparkgty FROM zakaz, tovar where zakaz.id=tovar.id" //order by zakaz.data
$result_1=mysql_query ($query_1);
        ?>
<table border=1 color=black width=100% height=100%>
            <tr>
            <td><b>№</b></td>
                <td><b>ФИО</b></td>
                <td><b>Адрес</b></td>
                <td><b>Дата заказа</b></td>
                <td><b>Покрышки</b></td>
                <td><b>Масла</b></td>
                <td><b>Свечи</b></td>
                <?
                while ($row_1=mysql_fetch_array ($result_1)) {
                    $id=$row_1["id"];
                    $fio=$row_1["fio"];
                    $address=$row_1["adress"];
                    $data=$row_1["data"];
                    $tireqty=$row_1["tiregty"];
                    $oilqty=$row_1["oilgty"];
                    $sparkqty=$row_1["sparkgty"];
                    ?><tr>
        <td> <? echo $id ?> </td><td><? echo $fio ?> </td><td><? echo $address ?> </td><td><? echo $data ?></td><td><? echo $tireqty ?></td><td><? echo $oilqty ?></td><td><? echo $sparkqty ?></td>
            </tr>
            <?
                }
            ?> </table> <?
    }}

$services = new OrderformPage();
$content ='cddc';
$services -> SetContent($content);
$services -> SetTitle('Лабораторная работа по теме: ООП на РНР');
$services -> Setnazvanie('Лаб работа по курсу разработка PHP и MySQL <br> Иванов Даниил Сергеевич, Кадыкова');
//$services -> Display_1 ($tireqty);
$services -> Display();
// $services -> zakaz ($tireqty, $oilqty, $sparkqty, $address, $DOCUMENT_ROOT, $fio);

?>

        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        