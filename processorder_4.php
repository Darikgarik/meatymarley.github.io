<?php
require('header.inc');
?>

<?php
    $tireqty = $HTTP_POST_VARS['tireqty'];
    $oilqty = $HTTP_POST_VARS['oilqty'];
    $sparkqty = $HTTP_POST_VARS['sparkqty'];
    $address = $HTTP_POST_VARS['address'];

    $DOCUMENT_ROOT = $HTTP_SERVER_VARS['DOCUMENT_ROOT'];
?>
<html>
    <head>
    <title>Автозапчасти от Боба - Результат заказа</title>
    </head>
    <body>
        <h1>Лабораторная работа №4</h1>
        <h2>Автозапчасти от Боба</h2>
        <h3>Форма заказа</h3>
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
        
        $products=array("$date", "$tireqty","$oilqty","$sparkqty", "$total","$address","$fio");
        
        $outputstring = $products[0]."\t".$products[1]." автопокрышек \t".$products[2]." масла\t".$products[3]." свечей\t\$".$products[4]."\t Адрес доставки товара\t ".$products[5]. "\t ФИО клиента:\t".$products [6]." \n";        
        $fp = fopen("orders_4.txt", 'a');
        
        flock($fp, LOCK_EX);
        if (!$fp)
        {
            echo '<p><strong>В настоящий момент ваш запрос не может быть обработан. '.'Пожалуйста, попытайтесь позже.</strong></p></body></html>';
            exit;
        }
        
        fwrite($fp, $outputstring);
        flock($fp, LOCK_UN);
        fclose($fp);
        
        echo '<p>Заказ сохранен.</p>';
        ?>
        
        <a href="vieworders_4.php"> Интерфейс персонала для просмотра файла заказов</a>
        
        
    </body>
</html>
<?php
require('footer.inc');
?>