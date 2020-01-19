<?php
require('header.inc');
?>

<?php
    $tireqty = $HTTP_POST_VARS['tireqty'];
    $oilqty = $HTTP_POST_VARS['oilqty'];
    $sparkqty = $HTTP_POST_VARS['sparkqty'];
    $address = $HTTP_POST_VARS['address'];

    $DOCUMENT_ROOT = $HTTP_SERVER_VARS['DOCUMENT_ROOT'];
//подключ к базе данных
$hostname="localhost";
$user="root";
$password="";
$db="lab3";

if(!$link=mysql_connect($hostname, $user, $password))
{
    //echo "<br> Не могу соединиться с сервером базы данных <br>";
    exit();
}
echo "<br> Соединение с сервером базы данных прошло успешно <br>";

if (!mysql_select_db($db, $link))
{
    //echo "<br> Не могу выбрать базу данных<br>";
    exit();
}
else
{
    echo "<br> Выбор базы данных прошел успешно";
}

?>
<html>
    <head>
    <title>Автозапчасти от Боба - Результат заказа</title>
    </head>
    <body>
        <h1>Лабораторная работа №3 по теме сохранение и востановление данных посредством СУРБД - MySQL</h1>
        <h2>Автозапчасти от Боба</h2>
        <h3>Результат заказа</h3>
        <?php
            $totalqty = 0;
            $totalqty += $tireqty;
            $totalqty += $oilqty;
            $totalqty += $sparkqty;
        
            $totalamount = 0.00;
            define('TIREPRICE',100);
            define('OILPRICE',10);
            define('SPARKPRICE',4);
        
            $date = date('H:i, js F');
        
            echo '<p>Заказ обработан в ';
            echo $date; 
            echo '<br />';
            echo '<p>Список вашего заказа:';
            echo '<br />';
            if( $totalqty ==0 )
            {
                echo 'Вы ничего не заказали на предыдущей странице!<br />';
            }
            else
            {
                if ( $tireqty>0 )
                    echo $tireqty. ' автопокрышек <br />';
                if ($oilqty>0)
                    echo $oilqty. ' бутылок с маслом<br />';
                if ($sparkqty>0)
                    echo $sparkqty. ' свечей зажигания<br />';
            }
        
        $total = $tireqty * TIREPRICE + $oilqty * OILPRICE + $sparkqty * SPARKPRICE;
        $total=number_format($total, 2, '.', ' ');
        
        echo '<p>Итого по заказу: '.$total.'</p>';
        
        echo '<p>ФИО клиента: '.$fio.'</p>';
        
        echo '<p>Адрес доставки: '.$address.'</p>';
        
        $outputstring = $date. "\t".$tireqty." автопокрышке \t".$oilqty. " масла\t".$sparkqty." свечей\t\$".$total."\t Адрес доставки товара\t ". $address."\t ФИО клиента:".$fio. " \n";
        $date_1=date ("Y-m-d H:i:s",mktime ());
        $query="insert into zakaz (fio,adress,data) values ('$fio','$address','$date_1')";
        $result=mysql_query ($query);
        
        $query_1="select zakaz.id from zakaz where zakaz.fio='$fio' ";
        $result_1=mysql_query ($query_1);
        
        while ($row=mysql_fetch_array ($result_1)) {
            $id=$row["id"];
        }
        $query="insert into tovar (id, tiregty, oilgty, sparkgty) values ('$id','$tireqty','$oilqty','$sparkqty')";
        $result = mysql_query($query);
        echo '<p>Заказ сохранен.</p>';
        ?>
        <a href="vieworders_3.php"> Интерфейс персонала для просмотра файла заказов</a>
    </body>
</html>
<?php
require('footer.inc');
?>