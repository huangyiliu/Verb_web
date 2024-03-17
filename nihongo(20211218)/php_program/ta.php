<!-- echo出"た形"變化 -->
<?php 
	echo '<div style="color:white">';
	$v= $row['verb'];//資料庫動詞
	$f= mb_substr($v,0,-1,"utf-8");
	if($f=="す"){echo "し";}
	elseif($f=="来"){echo "き";}
	else{echo $f;}
	$a= array("い","え","き","け","げ","せ","て","で","ね","へ","べ","み","め","り","れ");//上下一段判別
	$i= array("出る","見る","寝る","いる");//假名在漢字上的二段
	$e= array("減る","要る","知る","切る");//例外
	$t2= mb_substr("$v",-2,1,"utf-8");//動詞倒數第二個假名
	$k= array("く");
	$g= array("ぐ");
	$s= array("す");
	$nbm= array("ぬ","ぶ","む");
	$ut= array("う","つ");
	$t1= mb_substr("$v",-1,1,"utf-8");//動詞倒數第一個假名
	if($t1 == "る")//動詞倒數第一個假名為"る"
	{
	if(in_array($t2,$a))
	{echo "た";}elseif(in_array($v,$i)){echo "た";}elseif($v=="する"){echo "た";}elseif($v=="来る"){echo "た";}elseif(in_array($v,$e)){echo "った";}else{echo "った";}
	}
	elseif("$v" == "行く") 
	{echo "った";}
	elseif(in_array($t1,$k)) 
	{echo "いた";}
	elseif(in_array($t1,$g)) 
	{echo "いだ";}
	elseif(in_array($t1,$s)) 
	{echo "した";}
	elseif(in_array($t1,$nbm)) 
	{echo "んだ";}	
	elseif(in_array($t1,$ut)) 
	{echo "った";}
	echo '</div>'
	?>
		