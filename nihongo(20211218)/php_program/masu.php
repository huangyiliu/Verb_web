<!-- echo出"ます形"變化 -->
<?php 
	echo '<div style="color:white">';
	$v= "$row[verb]";//資料庫動詞
	$f= mb_substr("$v",0,-1,"utf-8");//動詞語幹
	$i= array("出る","見る","寝る","いる");//假名在漢字上的二段
	$a= array("い","え","き","け","げ","せ","て","で","ね","へ","べ","み","め","り","れ");//上下一段判別
	$e= array("減る","要る","知る","切る","帰る");//例外
	$t2= mb_substr("$v",-2,1,"utf-8");//動詞倒數第二個假名
	$k= array("く");
	$g= array("ぐ");
	$s= array("す");
	$nbm= array("ぬ","ぶ","む");
	$ut= array("う","つ");
	$t1= mb_substr("$v",-1,1,"utf-8");//動詞倒數第一個假名
	if($t1 == "る")//動詞倒數第一個假名為"る"
	{
		if(in_array($t2,$a)){echo $f;}
		elseif(in_array($v,$i)){echo $f;}//假名在漢字上ます形
		elseif(in_array($v,$e)){echo $f."り";}//例外ます形
		elseif($v=="する"){echo "し";}
		elseif($v=="来る"){echo "き";}
		else{
			{echo $f."り";;}
		}
	}
	else//動詞倒數第一個假名非"る"
	{
		echo $f;			
		switch ($t1) 
		{
			case 'う':echo 'い';break;			
			case 'く':echo 'き';break;	
			case 'ぐ':echo 'ぎ';break;
			case 'す':echo 'し';break;
			case 'つ':echo 'ち';break;
			case 'ぬ':echo 'に';break;
			case 'ぶ':echo 'び';break;	
			case 'む':echo 'み';break;										
			default:echo "り";break;
		}	
	}
	echo "ます";
	echo '</div>'

	?>
		