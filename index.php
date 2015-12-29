<?php
mysql_connect("localhost","root");
mysql_select_db("db_pegawai");
$sql_query="SELECT * FROM tabel_login";
$result_set=mysql_query($sql_query);
if(isset($_GET['delete_id']))
{
	$sql_query="DELETE FROM tabel_login WHERE user_id=".$_GET['delete_id'];
	mysql_query($sql_query);
	header("Location: index.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PHP Delete Data With Javascript Confirmation - By Cleartuts</title>
<link rel="stylesheet" href="style.css" type="text/css" />
<script type="text/javascript">
function delete_id(id)
{
	if(confirm('Sure To Remove This Record ?'))
	{
		window.location.href='index.php?delete_id='+id;
	}
}
</script>
</head>
<body>
<center>

<div id="header">
	<div id="content">
    <label>PHP Delete Data With Javascript Confirmation - By Cleartuts</label>
    </div>
</div>
<div id="body">
	<div id="content">
    <table align="center">
    <tr>
    <th>First Name</th>
    <th>Last Name</th>
    <th>City</th>
    <th>Delete</th>
    </tr>
    <?php
	if(mysql_num_rows($result_set)>0)
	{
		while($row=mysql_fetch_row($result_set))
		{
			?>
            <tr>
            <td><?php echo $row[0]; ?></td>
            <td><?php echo $row[1]; ?></td>
            <td><?php echo $row[2]; ?></td>
            <!--<td align="center"><a href="index.php?delete_id=<?php echo $row[0]; ?>"><img src="b_drop.png" alt="Delete" /></a></td>-->
            <td align="center"><a href="javascript:delete_id(<?php echo $row[0]; ?>)"><img src="b_drop.png" alt="Delete" /></a></td>
            </tr>
            <?php
		}
	}
	else
	{
		?>
        <tr>
        <th colspan="4">There's No data found !!!</th>
        </tr>
        <?php
	}
	?>
    </table>
    </div>
</div>

<div id="footer">
	<div id="content">
    <hr /><br/>
    <label>for more tutorials and blog tips visit : <a href="http://cleartuts.blogspot.com">cleartuts.blogspot.com</a></label><br /><br />
    <p><a href="http://cleartuts.blogspot.com/2014/12/delete-data-from-mysql-with-confirmation.html">Tutorial Link</a></p>
    </div>
</div>

</center>
</body>
</html>