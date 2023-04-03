<html>
<head>
    <title>Edit News</title>
    <meta http-equiv="Content-Type" content="text/html; charset="iso"-8859-1">
</head>

<body>
<?php
if(!isset($a){
$link = @mysql_connect(localhost, username, password);
if(!$link){
   echo('Error connecting to the database: ' . $mysql_error());
   exit();
}
$db = @mysql_selectdb('mydatabase');
if(!$db){
   echo('Error selecting database: ' . $mysql_error());
   exit();
}
$query = "SELECT id, headline, timestamp FROM news ORDER BY timestamp DESC";
$result = @mysql_query($query);
if(!$result){
   echo('Error selecting news: ' . $mysql_error());
   exit();
}
if (mysql_num_rows($result) > 0){
    while($row = mysql_fetch_object($result))
    {
    ?>
<font size="-1"><b><?php echo $row->headling; ?></b> <i><?php echo formatDate($row->timestamp); ?></i></font>
<br>
<font size="-2"><a href="edit.php?a=edit&id=<?php echo $row->id; ?>">edit</a> |
    <a href="edit.php?a=delete&id=<?php echo $row->id; ?>">delete</a></font>
<?php
}else{
?>
<font size="-2">No news in the database</font>
<?php }
mysql_close($link);
}elseif($a == 'edit'){
if(!isset($update)){
$link = @mysql_connect(localhost, username, password);
if(!$link){
    echo('Error connecting to the database: ' . $mysql_error());
    exit();
}
$db = @mysql_selectdb('mydatabase');
if(!$db){
    echo('Error selecting database: ' . $mysql_error());
    exit();
}
$query = "SELECT name, email, headline, story FROM news WHERE id = '$id'";
$result = @mysql_query($query);
if(!$result){
    echo('Error selecting news item: ' . $mysql_error());
    exit();
}
mysql_fetch_object($result);
?>
<form name="form1" method="post" action="edit.php?a=edit&id=<?php echo($id) ?>&update=1">
    <table width="50%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td width="50%">Name</td>
            <td><input name="name" type="text" id="name" value="<?php echo($row->name) ?>"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input name="email" type="text" id="email" value="<?php echo($row->email) ?>"></td>
        </tr>
        <tr>
            <td> </td>
            <td> </td>
        </tr>
        <tr>
            <td>Headline</td>
            <td><input name="headline" type="text" id="headline" value="<?php echo($row->headline) ?>"></td>
        </tr>
        <tr>
            <td>News Story</td>
            <td><textarea name="story" id="story" value="<?php echo($row->story) ?>"></textarea></td>
        </tr>
        <tr>
            <td colspan="2"><div align="center">
                    <input name="hiddenField" type="hidden" value="update">
                    <input name="add" type="submit" id="add" value="Update">
                </div></td>
        </tr>
    </table>
</form>
<?php
}
else{
    $query = "UPDATE news SET name = '$name, email = '$email', headline = '$headline', story = '$story', timestamp = NOW() WHERE id = '$id'";
$result = @mysql_query($query);
if(!$result){
   echo('Error updating news item: ' . $mysql_error());
   exit();
}
else{
   mysql_close($link);
   echo('Update successful!');
 }
}
elseif($a == 'delete'){
$link = @mysql_connect(localhost, username, password);
if(!$link){
   echo('Error connecting to the database: ' . $mysql_error());
   exit();
}
$db = @mysql_selectdb('mydatabase');
if(!$db){
   echo('Error selecting database: ' . $mysql_error());
   exit();
}
$query = "DELETE FROM news WHERE id = '$id'";
$result = @mysql_query($query);
if(!$result){
   echo('Error deleteing news item: ' . $mysql_error());
   exit();
}
mysql_close($link);
echo('News item deleted.');
}
?>
</body>
</html>