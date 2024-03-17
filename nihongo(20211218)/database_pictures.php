<?php
$pdo= new PDO('mysql:host=sql203.byetcluster.com;dbname=b6_27152753_teach_for_Japanese;charset=utf8','b6_27152753','t2882425');

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>後台banner</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link type="text/css" rel="stylesheet" href="css/styles.css"> 
</head>
<body>

<div id="admin_allDiv" class="container">
<?php include('nav.php'); ?>
	<?php include('header.php'); ?>
	
	<div class="row">
	

		<div class="col-md-8 col-4">
			<table class="table">
				<tr>
					<td>ID</td>
					<td>圖片</td>
					<td>刪除</td>
					
				</tr>
				<?php  foreach($pdo->query('select * from practice_upload order by practice_id desc') as $row)
				{
		  ?>
				<tr>
					<td><?php echo $row['practice_id']; ?></td>
					<td><img src="<?php echo $row['practice_name']; ?>" width="100px"></td>
					<td><a href="practice_del.php?id=<?php echo $row['practice_id']; ?>">刪除</a></td>
					
				</tr>
				<?php } ?>
			</table>
			<a href="upload for students_fileup.php">新增Banner</a>


		</div>
		
	</div>

	<?php include('footer.php'); ?>
	


</div>



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>