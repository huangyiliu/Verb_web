<?php  //MySQL 函數寫法
  /*$dbhost = 'localhost'; 
  $dbuser = 'root';
  $dbpass = '';
  $dbname = 'king';
  $conn = mysql_connect($dbhost, $dbuser, $dbpass) or die('Error with MySQL connect') ; 
  mysql_query("SET NAMES 'UTF8'"); 
  mysql_select_db($dbname);*/
  $servername = "sql203.byetcluster.com"; //資料庫位置
  $username = "b6_27152753"; //資料庫連線帳號
  $password = "t2882425"; //資料庫連線密碼
  $dbname = 'b6_27152753_teach_for_Japanese'; //資料庫名稱
  
// Create connection
//$conn = new mysqli($servername, $username, $password);
$conn = mysqli_connect($servername/*資料庫位置*/, $username/*資料庫連線帳號*/, $password/*資料庫連線密碼*/,$dbname/*資料庫名稱*/) or die('Error with MySQL connect') ; 
 mysqli_query($conn,"SET NAMES UTF8");//加入UTF8語瑪寫法
// Check connection
/*if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}*/

$sql = 'SELECT * FROM test';
$result = mysqli_query($conn/*資料庫連線設定*/,$sql/*選取資料表欄位SQL語法*/) or die('MySQL query error');

/*mysql_select_db($dbname);*/

//echo "Connected successfully";


  //分頁設定
  $per_total = mysqli_num_rows($result);  //計算總筆數
  $per = 10;  //每頁筆數
  $pages = ceil($per_total/$per);  //計算總頁數;ceil(x)取>=x的整數,也就是小數無條件進1法

  if(!isset($_GET['page'])){  //!isset 判斷有沒有$_GET['page']這個變數
  	  $page = 1;	  
  }else{
	  $page = $_GET['page'];
  }

  $start = ($page-1)*$per;  //每一頁開始的資料序號(資料庫序號是從0開始)
  $result = mysqli_query($conn,$sql/*/*資料庫連線設定*/.' LIMIT '.$start.', '.$per) or die('MySQL query error'); //讀取選取頁的資料*/

  $page_start = $start +1;  //選取頁的起始筆數
  $page_end = $start + $per;  //選取頁的最後筆數
  if($page_end>$per_total){  //最後頁的最後筆數=總筆數
	 $page_end = $per_total;
  }

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
	<title>動詞變化行</title>
	<meta charset="utf-8">
	<link type="text/css" rel="stylesheet" href="css/styles.css"> 
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="js/nihongo.js"></script>
	<script src="js/ajax.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- <link href="css/bootstrap-4.0.0-beta 2.min.css" rel="stylesheet">
<script src="js/bootstrap-4.0.0-beta 2.min.js"></script> -->

</head>
<body>
	<div class="container" style="font-weight: bolder;">
	
	<?php include('nav.php'); ?>
	<?php include('header.php'); ?>
	
	<marquee id="marquee"><img id="img" src="img/gear.png">網站持續更新中...有疑問可以跟Hiroshi老師反應唷</marquee>
	
	<div class="row">	
	<h1 id="title">動詞變化</h1>
	<h2 class="note"><span style="font-size:2.5em;color:red;">請注意!!</span><br><span style="color:#ACD6FF";>五段動詞(I類動詞)</span>
	<br class="span">
	輸入時.有漢字請使用"漢字",<br><span style="color:#ACD6FF;">上下一段動詞(II類動詞)</span><br class="span">,輸入時.請全程使用"假名"
	<br><span style="color:#ACD6FF;">不規則動詞(III類動詞)</span><br class="span">,輸入時.有漢字請使用"漢字".沒"漢字"用"假名"</h2>
	</div><!-- row2 -->
	<div class="row">	
		<form id="demo">
		<input type="text" id="word" name="word"  placeholder="請輸入辭書形">
		<button type="button" id="submitExample">變化</button>
		<div id="result">
		<div class="rr1" >第?類動詞<br>(?段動詞)</div>	
		<div class="rr1" >ます變化</div>
		<div class="rr1" >て形變化</div>
		<div class="rr1" >ない變化</div>
		<div class="rr1" >可能形變化</div>
		<div class="rr1" >意志形變化</div>
		<div class="rr1" >命令形變化</div>
		<!-- 顯示回傳資料1 -->
		</div><!-- row3 -->
		</form><!-- demo -->
	</div>
	<div class="row"><h2 class="note" style="color:red;">書きます（書く）、生きます（生きる）て形變化邏輯未解</h2>	</div><!-- row4 -->
	<div class="row">
		<form id="demo1">
		<input  type="text" id="word1" name="word"  placeholder="請輸入ます形">
		<button type="button" id="submitExample1" >變化</button>
		<div id="result1">
		<div class="rr1" >第?類動詞<br>(?段動詞)</div>	
		<div class="rr1">辭書形變化</div> <!-- 顯示回傳資料1 -->
		<div class="rr1" >て形變化</div>
		<div class="rr1" >ない變化</div>
		</div>
		</form><!-- demo1 -->
	</div><!-- row5 -->
	<div class="row">
		<form id="demo2">
		<input  type="text" id="word2" name="word"  placeholder="請輸入辭書形">
		<button type="button" id="submitExample2" >變化</button>
		<div id="result1">
		<div class="rr1" >自動詞?他動詞?</div>	
		</div>
		</form><!-- demo2 -->
	</div><!-- row5 -->

<div class="hide">
	<h3 align="center" style="margin-top:10%;"><code>動詞變化形(大家的日本語初級I)</code></h3>
 <table class="table table-sm" border='10' style="color:yellow">
  <thead>
    <tr>
      <th>辞書形</th>
      <th>ます形</th>
	  <th>て形</th>
	  <th>た形</th>
	  <th>ない形</th>
    </tr>
  </thead>
  <tbody>
    <?php while($row=mysqli_fetch_assoc($result)){ //讀取資料到表格內?>
    <tr class="tr1">
      <td class="tr1" style="color:white;border-right:3px;"><?php echo $row['verb']/*姓名*/ ?></td>
      <td class="tr1"><?php  include('php_program/masu.php') /*姓名*/ ?></td>
	  <td class="tr1"><?php include('php_program/te.php') ?> </td>
      <td class="tr1"><?php include('php_program/ta.php') ?></td>
	  <td class="tr1"><?php include('php_program/nai.php') ?></td>
    </tr>
	  <?php } ?>
  </tbody>
 </table>
 </div><!--hide1-->

<div class="row">
<div class="col-md-6" align="center">
<div class="hide">	
  <?php
	//每頁顯示筆數明細
	echo '顯示 '.$page_start.' 到 '.$page_end.' 筆 共 '.$per_total.' 筆，目前在第 '.$page.' 頁 共 '.$pages.' 頁'; 
  ?>
</div><!--hide2-->
</div><!-- "col-md-6"-1 -->

<div class="col-md-6" align="center">
<div class="hide">
  
<?php 
  if($pages>1){  //總頁數>1才顯示分頁選單

	//分頁頁碼；在第一頁時,該頁就不超連結,可連結就送出$_GET['page']
	if($page=='1'){
		echo "首頁 ";
		echo "上一頁 ";		
	}else{
		echo "<a href=?page=1>首頁 </a> ";
		echo "<a href=?page=".($page-1).">上一頁 </a> ";		
	}

   //此分頁頁籤以左、右頁數來控制總顯示頁籤數，例如顯示5個分頁數且將當下分頁位於中間，則設2+1+2 即可。若要當下頁位於第1個，則設0+1+4。也就是總合就是要顯示分頁數。如要顯示10頁，則為 4+1+5 或 0+1+9，以此類推。	
     for($i=1 ; $i<=$pages ;$i++){ 
        $lnum = 2;  //顯示左分頁數，直接修改就可增減顯示左頁數
        $rnum = 2;  //顯示右分頁數，直接修改就可增減顯示右頁數

   //判斷左(右)頁籤數是否足夠設定的分頁數，不夠就增加右(左)頁數，以保持總顯示分頁數目。
     if($page <= $lnum){
         $rnum = $rnum + ($lnum-$page+1);
     }

     if($page+$rnum > $pages){
         $lnum = $lnum + ($rnum - ($pages-$page));
     }

        //分頁部份處於該頁就不超連結,不是就連結送出$_GET['page']
          if($page-$lnum <= $i && $i <= $page+$rnum){
              if($i==$page){
                 echo $i.' ';
                      }else{
                          echo '<a href=?page='.$i.'>'.$i.'</a> ';
                   }
              }
          }


	//在最後頁時,該頁就不超連結,可連結就送出$_GET['page']	
	if($page==$pages){
		echo " 下一頁";
		echo " 末頁";	
	}else{
		echo "<a href=?page=".($page+1)."> 下一頁</a>";
		echo "<a href=?page=".$pages."> 末頁</a>";		
	}
  }

  ?>

</div> <!-- "col-md-6"-2 -->
</div><!--hide3-->
</div><!-- row6 -->
<?php include('footer.php'); ?>

<?php echo "訪客人數: " . $counter; ?>

<div class="row" >
<audio id="audio" preload="metadata" src="Music/Nocturne in E flat major, Op. 9 no. 2.mp3" controls="controls" autoplay loop="true"></audio>
</div>


</body>
</html>