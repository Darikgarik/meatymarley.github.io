<?php
require('header.inc');
?>

<html>
    <head>
        <title>������������ �� ����</title>
    </head>
    <body>
    <h1> ������������ ������ �1 �� ���� �������� �������� ����� � �������� ��������� � �� ����������� ���������</h1>
    <h2>������������ �� ����</h2>
    <h3>����� ������</h3>
    <form action="processorder.php" method=post>
        <table border=0>
            <tr bgcolor=#cccccc>
            <td width=150>�����</td>
                <td width=15>����������</td>
            </tr>
            <tr>
                <td>������������</td>
                <td align="center"><input type="text" name="tireqty" size="3" maxlength="3"></td>
            </tr>
            <tr>
                <td>�������� �����</td>
                <td align="center"><input type="text" name="oilqty" size="3" maxlength="3"></td>
            </tr>
            <tr>
                <td>����� ���������</td>
                <td align="center"><input type="text" name="sparkqty" size="3" maxlength="3"></td>
            </tr>
            <tr>
            <td>��� �� ����� �������� "������������ �� ����?"</td>
            <td><select name="find">
                <option value = "� ���������� ������">� ���������� ������</option>
                <option value = "� ������������� �������">� ������������� �������</option>
                <option value = "� ���������� �����������">� ���������� �����������</option>
                <option value = "���-�� ��������������">���-�� ��������������</option>
                </select>
                </td>
            </tr>
            <tr>
            <td colspan="2" align="center"><input type="submit" value="��������� �����"></td>
            </tr>
        </table>
        </form>
    </body>
</html>
<?php
require('footer.inc');
?>