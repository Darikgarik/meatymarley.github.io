<?php
    require ('page_5.inc');
    
    class OrderformPage extends Page
    {
    var $row2buttons = array( 'Re-engineering' => 'reengineering.php',
    'Standards Compliance' => 'standards.php', 'Buzzword Compliance' => 'buzzword.php', 'Mission Statements' => 'mission.php');
        function Display()
        {
            echo "<html>\n<head>\n";
            $this -> DisplayTitle();
            $this -> DisplayKeywords();
            $this -> DisplayStyles();
            echo "</head>\n<body>\n";
            $this -> DisplayHeader();
            $this -> DisplayMenu($this->buttons);
            $this -> DisplayMenu($this->row2buttons);
?>  <table width=100% height=100% border=1><tr><td class="cont"> <? echo $this->content; ?> </td></table> <?
//      echo $this->content;
            $this -> DisplayFooter();
            echo "</body>\n</html>\n";
        }
    }

    $services = new OrderformPage();
    $content ='
    <form action="processorder_5.php" method=post>
    <table border=0>
    <tr bgcolor=#cccccc>
        <td width=150>�����</td>
        <td width=15>����������</td>
    </tr>
                <tr>
                    <td>������������</td>
                    <td align="left"><input type="text" name="tireqty" size="3" maxlength="3"></td>
                </tr>
                 <tr>
                    <td>�������� �����</td>
                    <td align="left"><input type="text" name="oilqty" size="3" maxlength="3"></td>
                </tr>
                 <tr>
                    <td>����� ���������</td>
                    <td align="left"><input type="text" name="sparkqty" size="3" maxlength="3"></td>
                </tr>
                 <tr>
                    <td>��� �������</td>
                    <td align="left"><input type="text" name="fio" size="40" maxlength="40"></td>
                </tr>
                 <tr>
                    <td>������ ��������</td>
                    <td align="left"><input type="text" name="adress" size="40" maxlength="40"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" value="��������� �����"></td>
                </tr>
            </table>
        </form>';
    $services -> SetContent($content);
$services -> SetTitle('������������ ������ �� ����: ��� �� ���');
$services -> Setnazvanie('��� ������ �� ����� ���������� PHP � MySQL <br> ������ ������ ���������, ��������');
    $services -> Display();


?>