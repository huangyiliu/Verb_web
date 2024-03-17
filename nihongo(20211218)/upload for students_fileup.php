<?php
$pdo= new PDO('mysql:host=sql203.byetcluster.com;dbname=b6_27152753_teach_for_Japanese;charset=utf8','b6_27152753','t2882425');

if(is_uploaded_file($_FILES['file']['tmp_name']))
{
	if(!file_exists('upload'))
	{
		mkdir('upload');
	}
	$file='upload/'.basename($_FILES['file']['name']);
	
	if(move_uploaded_file($_FILES['file']['tmp_name'], $file))
	{
		echo '上傳成功';
		echo '<p><img style="width:100%;height: 100%;" src="'.$file.'"></p>';
	}
	else
	{
		echo '上傳失敗';
	}
}
else
{
	echo '請選擇檔案';
}


$sql=$pdo->prepare('insert into practice_upload values(null,?)');

if($sql->execute([$file]))
{
	echo '<h2>上傳資料庫成功</h2>';
	echo '<br/>';
	echo '<a href=index.php> 返回首頁 </a>';
	echo '<br/>';
	echo '<a href=upload_for_students.php> 返回練習上傳頁 </a>';
}
else
{
	echo '失敗';
}
?>