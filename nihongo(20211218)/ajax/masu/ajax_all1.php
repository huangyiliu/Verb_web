<?php 
// て形(辭書形,含字首)
$pdo= new PDO('mysql:host=sql203.byetcluster.com;dbname=b6_27152753_test_host;charset=utf8','b6_27152753','t2882425');

header('Content-Type: application/json; charset=UTF-8'); //設定資料類型為 json，編碼 utf-8

if ($_SERVER['REQUEST_METHOD'] == "POST") { //如果是 POST 請求
    $v = $_POST["word"]; //取得 word POST 值 
    $a= array("い","え","き","け","げ","せ","て","で","ね","へ","べ","み","め","り","れ");//上下一段判別
	// $i= array("出ます","見ます","寝ます","います");//假名在漢字上的二段
    // $e= array("減ます","要ます","知ます","切ます");//例外
	$t2= mb_substr("$v",-3,1,"utf-8");//動詞倒數第3個假名
    $t3= mb_substr("$v",0,-2,"utf-8");//上下一段動詞的字首
    $t4= mb_substr("$v",0,-3,"utf-8");//五段動詞的字首
    $k= array("き");$k1= '<div class="rr1">'.'為五段動詞<br>(I類動詞)'.'<div class="rr1">'.$t4.'く'.'</div>'.'<div class="rr1">'.$t4.'いて'.'</div>'.'<div class="rr1">'.$t4.'かない'.'</div>';//
	$g= array("ぎ");$g1= '<div class="rr1">'.'為五段動詞<br>(I類動詞)'.'<div class="rr1">'.$t4.'ぐ'.'</div>'.'<div class="rr1">'.$t4.'いて'.'</div>'.'<div class="rr1">'.$t4.'がない'.'</div>';//
	$s= array("し");$s1= '<div class="rr1">'.'為五段動詞<br>(I類動詞)'.'<div class="rr1">'.$t4.'す'.'</div>'.'<div class="rr1">'.$t4.'して'.'</div>'.'<div class="rr1">'.$t4.'さない'.'</div>';//
	$n= array("に");$n1= '<div class="rr1">'.'為五段動詞<br>(I類動詞)'.'<div class="rr1">'.$t4.'ぬ'.'</div>'.'<div class="rr1">'.$t4.'んで'.'</div>'.'<div class="rr1">'.$t4.'なない'.'</div>';//
    $b= array("び");$b1= '<div class="rr1">'.'為五段動詞<br>(I類動詞)'.'<div class="rr1">'.$t4.'ぶ'.'</div>'.'<div class="rr1">'.$t4.'んで'.'</div>'.'<div class="rr1">'.$t4.'ばない'.'</div>';//
    $m= array("み");$m1= '<div class="rr1">'.'為五段動詞<br>(I類動詞)'.'<div class="rr1">'.$t4.'む'.'</div>'.'<div class="rr1">'.$t4.'んで'.'</div>'.'<div class="rr1">'.$t4.'まない'.'</div>';//
    $u= array("い");$u1= '<div class="rr1">'.'為五段動詞<br>(I類動詞)'.'<div class="rr1">'.$t4.'う'.'</div>'.'<div class="rr1">'.$t4.'って'.'</div>'.'<div class="rr1">'.$t4.'わない'.'</div>';//
    $t= array("ち");$t1= '<div class="rr1">'.'為五段動詞<br>(I類動詞)'.'<div class="rr1">'.$t4.'つ'.'</div>'.'<div class="rr1">'.$t4.'って'.'</div>'.'<div class="rr1">'.$t4.'たない'.'</div>';//
    $R= array("り");$R1= '<div class="rr1">'.'為五段動詞<br>(I類動詞)'.'<div class="rr1">'.$t4.'る'.'</div>'.'<div class="rr1">'.$t4.'って'.'</div>'.'<div class="rr1">'.$t4.'らない'.'</div>';//
    $q1= mb_substr("$v",-2,2,"utf-8");//動詞倒數第一個假名
    // $q1= mb_substr("$v",-1,1,"utf-8");//動詞倒數第1個假名

    $r1= '<div class="rr1">'.'為上.下一段動詞<br>(II類動詞)'.'<div class="rr1">'.$t3.'る'.'</div>'.'<div class="rr1">'.$t3.'て'.'</div>'.'<div class="rr1">'.$t3.'ない'.'</div>';//echo上下一段動詞て形變化

    $r2= '<div class="rr1">'.'為五段動詞<br>(I類動詞)'.$t4.'る';//echo五段動詞(ます結尾,一漢二音)
    
    
    if ($v != null && $q1=="ます") { //如果 word 都有填寫
        //回傳 word json 資料

        if($v=="行きます"){echo json_encode(array('word' => '<div class="rr1">'.'為五段動詞<br>(I類動詞)'.'<div class="rr1">'.'いく'.'</div>'.'<div class="rr1">'.'いって'.'</div>'.'<div class="rr1">'.'いかない'.'</div>'));}
        elseif($v=="あります"){echo json_encode(array('word' => '<div class="rr1">'.'為五段動詞<br>(I類動詞)'.'<div class="rr1">'.'ある'.'</div>'.'<div class="rr1">'.'あって'.'</div>'.'<div class="rr1">'.'ない'.'</div>'));}
        elseif($v=="います"){echo json_encode(array('word' => '<div class="rr1">'.'為上.下一段動詞<br>(II類動詞)'.'<div class="rr1">'.'いる'.'</div>'.'<div class="rr1">'.'いて'.'</div>'.'<div class="rr1">'.'いない'.'</div>'));}
        elseif($v=="持って来ます"){echo json_encode(array('word' => '<div class="rr1">'.'為不規則動詞(III類動詞)'.'<div class="rr1">'.'持ってくる'.'</div>'.'<div class="rr1">'.'持ってきて'.'</div>'.'<div class="rr1">'.'持ってこない'.'</div>'));}
        elseif($v=="持って行きます"){echo json_encode(array('word' => '<div class="rr1">'.'為五段動詞<br>(I類動詞)'.'<div class="rr1">'.'持っていく'.'</div>'.'<div class="rr1">'.'持っていって'.'</div>'.'<div class="rr1">'.'持っていかない'.'</div>'));}
        elseif($v=="持ってきます"){echo json_encode(array('word' => '<div class="rr1">'.'為不規則動詞(III類動詞)'.'<div class="rr1">'.'持ってくる'.'</div>'.'<div class="rr1">'.'持ってきて'.'</div>'.'<div class="rr1">'.'持ってこない'.'</div>'));}
        elseif($v=="持っていきます"){echo json_encode(array('word' => '<div class="rr1">'.'為五段動詞<br>(I類動詞)'.'<div class="rr1">'.'持っていく'.'</div>'.'<div class="rr1">'.'持っていって'.'</div>'.'<div class="rr1">'.'持っていかない'.'</div>'));}
        elseif(in_array($t2,$k)){echo json_encode(array('word' => "$k1"));}
        elseif($v=="します"){echo json_encode(array('word' => '<div class="rr1">'.'為不規則動詞(III類動詞)'.'<div class="rr1">'.'する'.'</div>'.'<div class="rr1">'.'して'.'</div>'.'<div class="rr1">'.'しない'.'</div>'));}
        elseif($v=="来ます"){echo json_encode(array('word' => '<div class="rr1">'.'為不規則動詞(III類動詞)'.'<div class="rr1">'.'くる'.'</div>'.'<div class="rr1">'.'きて'.'</div>'.'<div class="rr1">'.'こない'.'</div>'));}
        elseif(in_array($t2,$g)){echo json_encode(array('word' => "$g1"));}
        elseif(in_array($t2,$s)){echo json_encode(array('word' => "$s1"));} 
        elseif(in_array($t2,$n)){echo json_encode(array('word' => "$n1"));}
        elseif(in_array($t2,$b)){echo json_encode(array('word' => "$b1"));}
        elseif(in_array($t2,$m)){echo json_encode(array('word' => "$m1"));}
        elseif(in_array($t2,$u)){echo json_encode(array('word' => "$u1"));}
        elseif(in_array($t2,$t)){echo json_encode(array('word' => "$t1"));}
        elseif(in_array($t2,$R)){echo json_encode(array('word' =>  "$R1"));}
        elseif(in_array($t2,$a)){echo json_encode(array('word' =>  "$r1"));}

       
        else{
        switch($v)
        {   //一漢一音
            case "出ます":
                echo json_encode(array('word' =>  '<div class="rr1">'.$t3.'て'.'</div>'.'<div class="rr1">'.$t3.'る'.'</div>'.'<div class="rr1">'.$t3.'ない'.'</div>'));
                break;
            case "見ます":
                echo json_encode(array('word' =>  '<div class="rr1">'.$t3.'て'.'</div>'.'<div class="rr1">'.$t3.'る'.'</div>'.'<div class="rr1">'.$t3.'ない'.'</div>'));
                break;
            case "寝ます":
                echo json_encode(array('word' =>  '<div class="rr1">'.$t3.'て'.'</div>'.'<div class="rr1">'.$t3.'る'.'</div>'.'<div class="rr1">'.$t3.'ない'.'</div>'));
                break;
            case "鋳ます":
                echo json_encode(array('word' =>  '<div class="rr1">'.$t3.'て'.'</div>'.'<div class="rr1">'.$t3.'る'.'</div>'.'<div class="rr1">'.$t3.'ない'.'</div>')); 
                break; 
            case "居ます":
                echo json_encode(array('word' =>  '<div class="rr1">'.$t3.'て'.'</div>'.'<div class="rr1">'.$t3.'る'.'</div>'.'<div class="rr1">'.$t3.'ない'.'</div>')); 
                break;
            case "射ます":
                echo json_encode(array('word' =>  '<div class="rr1">'.$t3.'て'.'</div>'.'<div class="rr1">'.$t3.'る'.'</div>'.'<div class="rr1">'.$t3.'ない'.'</div>')); 
                break;
            case "煎ます":
                echo json_encode(array('word' =>  '<div class="rr1">'.$t3.'て'.'</div>'.'<div class="rr1">'.$t3.'る'.'</div>'.'<div class="rr1">'.$t3.'ない'.'</div>')); 
                break;
            case "炒ます":
                echo json_encode(array('word' =>  '<div class="rr1">'.$t3.'て'.'</div>'.'<div class="rr1">'.$t3.'る'.'</div>'.'<div class="rr1">'.$t3.'ない'.'</div>')); 
                break;    
            //例外  
            case "減ります":
                echo json_encode(array('word' =>  '<div class="rr1">'.$t3.'て'.'</div>'.'<div class="rr1">'.$t3.'る'.'</div>'.'<div class="rr1">'.$t3.'ない'.'</div>'));
                break;
            case "要ります":
                echo json_encode(array('word' =>  '<div class="rr1">'.$t3.'て'.'</div>'.'<div class="rr1">'.$t3.'る'.'</div>'.'<div class="rr1">'.$t3.'ない'.'</div>'));
                break;
            case "知ります":
                echo json_encode(array('word' =>  '<div class="rr1">'.$t3.'て'.'</div>'.'<div class="rr1">'.$t3.'る'.'</div>'.'<div class="rr1">'.$t3.'ない'.'</div>'));
                break;
            case "切ります":
                echo json_encode(array('word' =>  '<div class="rr1">'.$t3.'て'.'</div>'.'<div class="rr1">'.$t3.'る'.'</div>'.'<div class="rr1">'.$t3.'ない'.'</div>')); 
                break;    
            default:
            echo json_encode(array('word' =>  '<div class="rr1">'.$r2.'って'.'</div>'.'<div class="rr1">'.$r2.'る'.'</div>'.'<div class="rr1">'.$r2.'らない'.'</div>')); 
        }       
            }     
    } 
    

    elseif ($v != null) { //如果 word 都有填寫
        //回傳 word json 資料
        
        echo json_encode(array(
            'word' =>  '未判斷'
        ));
        }
        else {
        //回傳 errorMsg json 資料
        echo json_encode(array(
            'errorMsg' => '資料未輸入完全！'
        ));
    }
} else {
    //回傳 errorMsg json 資料
    echo json_encode(array(
        'errorMsg' => '請求無效，只允許 POST 方式訪問！'
    ));
}



?>