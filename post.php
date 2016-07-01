<?php
$text=$_POST['text'];
$id2=fopen('msgs',a);
fwrite($id2,"<font color='red'>$name</font>: $msg");
fwrite($id2,"<br>");
fclose($id2);
print "<META HTTP-EQUIV='Refresh'
CONTENT='0; URL=index.php'>";
?>
