<?session_start ();
	require ('page_6.inc');
	$homepage = new Page();
	$homepage -> SetContent('<p> ������������ ������ �� ����: ������ � �������� � PHP </p>');
	$homepage -> SetTitle('������������ ������ �� ����: ������ � �������� � PHP');
	$homepage -> Setnazvanie('������������ ������ �� ����� ���������� �������� ���������� � ����� ��������� ����������� PHP � MySQL <br> �������� ������ ��-172');
	$homepage -> Display();
?>