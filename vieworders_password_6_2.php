<?session_start ();
require ('page_6.inc');
class OrderformPage extends Page 
	{
		var $row2buttons = array ('Re-engineering' => 'reengineering.php',
								  'Standards Compliance' => 'standards.php',
								  'Buzzword Compliance' => 'buzzword.php',
								  'Mission Statements' => 'mission.php');
    function Display($nick, $passwd)
		{
			echo "<html>\n<head>\n";
			$this -> DisplayTitle();
			$this -> DisplayKeywords();
			$this -> DisplayStyles();
			echo "</html>\n<body>\n";
			$this -> DisplayHeader();
			$this -> DisplayMenu($this->buttons);
			$this -> DisplayMenu($this->row2buttons);
?> <table width=100% height=100% border=1><tr><td class=cont><? echo $this->proverka(); ?> </td></table> <?
// echo $this->content;
	$this -> DisplayFooter();
	echo "</body>\n</html>\n";
		}
function Display_2()
{
?> <table width=100% height=100% border=1><tr><td class=cont> <? echo $this->content; ?> </td></table><?
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
		//echp "<br> �� ���� ���������� � �������� �� <br>";
		exit();
	}
	//echo "<br> ���������� � �������� �� ������ ������� <br>";

	if (!mysql_select_db($db, $link))
	{
		//echp "<br> �� ���� ������� �� <br>";
		exit();
	}
	else
	{
		//echo "<br> ����� �� ������ ������� <br>";
	}
        
$query_1="select zakaz.id, zakaz.fio, zakaz.adress, zakaz.data, tovar.id, tovar.tiregty, tovar.oilgty, tovar.sparkgty FROM zakaz, tovar where zakaz.id=tovar.id" //order by zakaz.data
$result_1=mysql_query ($query_1);
        ?>
<table border=1 color=black width=100% height=100%>
            <tr>
            <td><b>�</b></td>
                <td><b>���</b></td>
                <td><b>�����</b></td>
                <td><b>���� ������</b></td>
                <td><b>��������</b></td>
                <td><b>�����</b></td>
                <td><b>�����</b></td>
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
    }
function proverka($nick, $passwd)
{
   // <?php
   // $tireqty = $HTTP_POST_VARS['tireqty'];
   // $oilqty = $HTTP_POST_VARS['oilqty'];
   // $sparkqty = $HTTP_POST_VARS['sparkqty'];
   // $address = $HTTP_POST_VARS['address'];
  //  $DOCUMENT_ROOT = $HTTP_SERVER_VARS['DOCUMENT_ROOT'];
//������� � ���� ������
$hostname="localhost";
$user="root";
$password="root";
$db="lab3";

if(!$link=mysql_connect($hostname, $user, $password))
{
    //echo "<br> �� ���� ����������� � �������� ���� ������ <br>";
    exit();
}
echo "<br> ���������� � �������� ���� ������ ������ ������� <br>";

if (!mysql_select_db($db, $link))
{
    //echo "<br> �� ���� ������� ���� ������<br>";
    exit();
}
else
{
    echo "<br> ����� ���� ������ ������ �������"
}

    $query="select id from info where nick='$nick' AND password='$passwd'";
    $result_1=mysql_query ($query);
    if (mysql_num_rows ($result_1)!=0) {unset($_SESSION ['login']); unset($_SESSION ['pass']); $_SESSION ['login']=$nick; $_SESSION ['pass']=passwd; echo $_SESSION}
        else {
$services = new OrderformPage();
$content ='
<form action="vieworders_password_6_2.php" name="reply" method="POST">
<table width=60% align=center>
<tr><td><b>�����:</b><td><input type="text" name="nick" size=20>
<tr><td><b>������:</b><td><input type="password" name="paswd" size=20>
<tr><td colspan=2 align=center>&nbsp;<br><input type="submit" value="Submit"></table> </form>
';

    $services -> SetContent ($content);
    $services -> Display_2();
        }
    ?>
<br>
<br>
<a href="vieworders_password_6.php"> ��������� ��������� ��� ����� ������� </a> <?}}

$services -> SetContent($content);

$services -> SetTitle ('������������ ������ �� ����: ��� �� ���');
$services -> Setnazvanie('��� ������ �� ����� ���������� PHP � MySQL <br> ������ ������ ���������, ��������');
$services -> Display($nick, $passwd);
?>