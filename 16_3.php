<?php
require('header.inc');
?>

<table width=100% height=100%>
    <td width=100% height=100%>
        <table width=100% height=100% cellspacing=0 cellpadding=0 border=0>
            <tr>
                <td colspan=4> <center><img src="<?php echo $f?>"></center></td>
            </tr>
            <?php
            function scanDir_1($Thumbs0)
            {
                if (@chdir(Thumbs0)==false)
                {
                    echo 'каталог фотографий не существует или недоступен';
                    return(false);
            };
            $d = opendir('.'); 
            $i=0;
            while (($f=readdir($d))!==false)
            {
                if (is_file($f))
                {
                    $list = GetImageSize($f);
                    
                    if ($list[0]>0)
                    {
                        if ($i==4) {$i=0; echo '<tr>';} $i=$i+1;
                        print <<<HERE
                        <td><a href="16_3.php?f=$f"> <img src="Thumbs0/$f" border="0"> </a> <br> </td>
HERE;
                        $f1 = strtok($f,".");
                        $f1[0];
                    };
                };
            };
            closedir($d);
            return(true);
            };
            scanDir_1('Thumbs0');
            
            ?>
        </table>
    </td>
    </table>
<?php
require('../footer.inc');
?>