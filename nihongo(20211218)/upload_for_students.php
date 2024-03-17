<?php 
$pdo= new PDO('mysql:host=sql203.byetcluster.com;dbname=b6_27152753_teach_for_Japanese;charset=utf8','b6_27152753','t2882425');
//   以下是計數器
$counter = intval(file_get_contents("counter.dat"));
$pp= 24*3600;
if (!isset($_COOKIE['visitor'])) {
    $counter++;
    $fp = fopen("counter.dat", "w");
    flock($fp, LOCK_EX);   // do an exclusive lock
    fwrite($fp, $counter);
    flock($fp, LOCK_UN);   // release the lock
    fclose($fp);
    setcookie("visitor", 1, time()+$pp);
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>練習上傳區</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link type="text/css" rel="stylesheet" href="css/styles.css"> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="js/nihongo.js"></script>
	<script src="js/ajax.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- <link href="css/bootstrap-4.0.0-beta 2.min.css" rel="stylesheet">
<script src="js/bootstrap-4.0.0-beta 2.min.js"></script> -->
<style>
	body{
		background-image: url(img/stardust.png);
		color:white;
	}
  
</style>
</head>
<body>

	<div class="container" style="font-weight: bolder;">

	<?php include('nav.php'); ?>
	<?php include('header.php'); ?>
	<marquee id="marquee"><img id="img" src="img/gear.png">網站持續更新中...有疑問可以跟Hiroshi老師反應唷</marquee>
	

	<h1 id="title">練習上傳區</h1>
	<div id="content">請上傳圖片或照片(上傳時請標註姓名與標題,ex:Hiroshi 五十音練習)</div>
  <div id="submit">
	<form action="upload for students_fileup.php" method="post" enctype="multipart/form-data">
		<input type="file" name="file">
		<input type="submit" value="送出">
	</form>
</div>

<?php include('footer.php'); ?>
<?php echo "訪客人數: " . $counter; ?>

<div class="row" >
<audio id="audio" preload="metadata" src="Music/Nocturne in E flat major, Op. 9 no. 2.mp3" controls="controls" autoplay loop="true"></audio>
</div>
	
</div><!-- container -->

</body>
</html>