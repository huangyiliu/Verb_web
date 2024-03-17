<?php 
// て形(辭書形,含字首)
$pdo= new PDO('mysql:host=sql203.byetcluster.com;dbname=b6_27152753_test_host;charset=utf8','b6_27152753','t2882425');


header('Content-Type: application/json; charset=UTF-8'); //設定資料類型為 json，編碼 utf-8

if ($_SERVER['REQUEST_METHOD'] == "POST") { //如果是 POST 請求
    $v = $_POST["word"]; //取得 word POST 值 
    $a= array("い","え","き","け","げ","せ","て","で","ね","へ","べ","み","め","り","れ");//上下一段判別
	// $i= array("出る","見る","寝る","いる");//假名在漢字上的二段
    // $e= array("減る","要る","知る","切る");//例外
	$t2= mb_substr("$v",-2,1,"utf-8");//動詞倒數第二個假名
    $t3= mb_substr("$v",0,-1,"utf-8");//動詞的字首
    $k= array("く");$k1= '<div class="rr1">'.'為五段動詞<br>(I類動詞)'.'</div>'.'<div class="rr1">'.$t3.'きます'.'</div>'.'<div class="rr1">'.$t3.'いて'.'</div>'.'<div class="rr1">'.$t3.'かない'.'</div>'.'<div class="rr1">'.$t3.'ける'.'</div>'.'<div class="rr1">'.$t3.'こう'.'</div>'.'<div class="rr1">'.$t3.'け'.'</div>';
	$g= array("ぐ");$g1= '<div class="rr1">'.'為五段動詞<br>(I類動詞)'.'</div>'.'<div class="rr1">'.$t3.'ぎます'.'</div>'.'<div class="rr1">'.$t3.'いで'.'</div>'.'<div class="rr1">'.$t3.'がない'.'</div>'.'<div class="rr1">'.$t3.'げる'.'</div>'.'<div class="rr1">'.$t3.'ごう'.'</div>'.'<div class="rr1">'.$t3.'げ'.'</div>';
	$s= array("す");$s1= '<div class="rr1">'.'為五段動詞<br>(I類動詞)'.'</div>'.'<div class="rr1">'.$t3.'します'.'</div>'.'<div class="rr1">'.$t3.'して'.'</div>'.'<div class="rr1">'.$t3.'さない'.'</div>'.'<div class="rr1">'.$t3.'せる'.'</div>'.'<div class="rr1">'.$t3.'そう'.'</div>'.'<div class="rr1">'.$t3.'せ'.'</div>';
	$n= array("ぬ");$n1= '<div class="rr1">'.'為五段動詞<br>(I類動詞)'.'</div>'.'<div class="rr1">'.$t3.'にます'.'</div>'.'<div class="rr1">'.$t3.'んで'.'</div>'.'<div class="rr1">'.$t3.'なない'.'</div>'.'<div class="rr1">'.$t3.'ねる'.'</div>'.'<div class="rr1">'.$t3.'のう'.'</div>'.'<div class="rr1">'.$t3.'ね'.'</div>';
    $b= array("ぶ");$b1= '<div class="rr1">'.'為五段動詞<br>(I類動詞)'.'</div>'.'<div class="rr1">'.$t3.'びます'.'</div>'.'<div class="rr1">'.$t3.'んで'.'</div>'.'<div class="rr1">'.$t3.'ばない'.'</div>'.'<div class="rr1">'.$t3.'べる'.'</div>'.'<div class="rr1">'.$t3.'ぼう'.'</div>'.'<div class="rr1">'.$t3.'べ'.'</div>';
    $m= array("む");$m1= '<div class="rr1">'.'為五段動詞<br>(I類動詞)'.'</div>'.'<div class="rr1">'.$t3.'みます'.'</div>'.'<div class="rr1">'.$t3.'んで'.'</div>'.'<div class="rr1">'.$t3.'まない'.'</div>'.'<div class="rr1">'.$t3.'める'.'</div>'.'<div class="rr1">'.$t3.'もう'.'</div>'.'<div class="rr1">'.$t3.'め'.'</div>';
    $u= array("う");$u1= '<div class="rr1">'.'為五段動詞<br>(I類動詞)'.'</div>'.'<div class="rr1">'.$t3.'います'.'</div>'.'<div class="rr1">'.$t3.'って'.'</div>'.'<div class="rr1">'.$t3.'わない'.'</div>'.'<div class="rr1">'.$t3.'える'.'</div>'.'<div class="rr1">'.$t3.'おう'.'</div>'.'<div class="rr1">'.$t3.'え'.'</div>';
    $t= array("つ");$t1= '<div class="rr1">'.'為五段動詞<br>(I類動詞)'.'</div>'.'<div class="rr1">'.$t3.'ちます'.'</div>'.'<div class="rr1">'.$t3.'って'.'</div>'.'<div class="rr1">'.$t3.'たない'.'</div>'.'<div class="rr1">'.$t3.'てる'.'</div>'.'<div class="rr1">'.$t3.'とう'.'</div>'.'<div class="rr1">'.$t3.'て'.'</div>';
	$q1= mb_substr("$v",-1,1,"utf-8");//動詞倒數第一個假名
   
    $r1= '<div class="rr1">'.'為上.下一段動詞<br>(II類動詞)'.'</div>'.'<div class="rr1">'.$t3.'ます'.'</div>'.'<div class="rr1">'.$t3.'て'.'</div>'.'<div class="rr1">'.$t3.'ない'.'</div>'.'<div class="rr1">'.$t3.'られる'.'</div>'.'<div class="rr1">'.$t3.'よう'.'</div>'.'<div class="rr1">'.$t3.'ろ'.'</div>';//echo上下一段動詞
    $r2= '<div class="rr1">'.'為五段動詞<br>(I類動詞)'.'</div>'.'<div class="rr1">'.$t3.'ります'.'</div>'.'<div class="rr1">'.$t3.'って'.'</div>'.'<div class="rr1">'.$t3.'らない'.'</div>'.'<div class="rr1">'.$t3.'れる'.'</div>'.'<div class="rr1">'.$t3.'ろう'.'</div>'.'<div class="rr1">'.$t3.'れ'.'</div>';//echo五段動詞(る結尾,一漢二音)
    


    if ($v != null && $q1=="る") { //如果 word 都有填寫
        //回傳 word json 資料
        if(in_array($t2,$a)){echo json_encode(array('word' =>  "$r1"));}
        elseif($v=="持って来る"){echo json_encode(array('word' => '<div class="rr1">'.'為不規則動詞(III類動詞)'.'<div class="rr1">'.'持ってきます'.'</div>'.'<div class="rr1">'.'持ってきて'.'</div>'.'<div class="rr1">'.'持ってこない'.'</div>'.'<div class="rr1">'.'持ってこられる'.'</div>'.'<div class="rr1">'.'持ってこよう'.'</div>'));}
        elseif($v=="持ってくる"){echo json_encode(array('word' => '<div class="rr1">'.'為不規則動詞(III類動詞)'.'<div class="rr1">'.'持ってきます'.'</div>'.'<div class="rr1">'.'持ってきて'.'</div>'.'<div class="rr1">'.'持ってこない'.'</div>'.'<div class="rr1">'.'持ってこられる'.'</div>'.'<div class="rr1">'.'持ってこよう'.'</div>'));}
        elseif($v=="ある"){echo json_encode(array('word' => '<div class="rr1">'.'為五段動詞<br>(I類動詞)'.'<div class="rr1">'.'あります'.'</div>'.'<div class="rr1">'.'あって'.'</div>'.'<div class="rr1">'.'ない'.'</div>'.'<div class="rr1">'.'ありえる'.'</div>'));}
        elseif($v=="する"){echo json_encode(array('word' => '<div class="rr1">'.'為不規則動詞(III類動詞)'.'</div>'.'<div class="rr1">'.'します'.'</div>'.'<div class="rr1">'.'して'.'</div>'.'<div class="rr1">'.'しない'.'</div>'.'<div class="rr1">'.'できる'.'</div>'.'<div class="rr1">'.'しよう'.'</div>'.'</div>'.'<div class="rr1">'.'しろ'.'</div>'));}
        elseif($v=="来る"){echo json_encode(array('word' => '<div class="rr1">'.'為不規則動詞(III類動詞)'.'</div>'.'<div class="rr1">'.'きます'.'</div>'.'<div class="rr1">'.'きて'.'</div>'.'<div class="rr1">'.'こない'.'</div>'.'<div class="rr1">'.'こられる'.'</div>'.'<div class="rr1">'.'こよう'.'</div>'.'</div>'.'<div class="rr1">'.'こい'.'</div>'));}
        else{
        switch($v)
        {   //一漢一音
            
            //例外  
            case "減る":
                echo json_encode(array('word' =>  '<div class="rr1">'.'為五段動詞<br>(I類動詞)'.'</div>'.'<div class="rr1">'.$t3.'ります'.'</div>'.'<div class="rr1">'.$t3.'って'.'</div>'.'<div class="rr1">'.$t3.'らない'.'</div>'.'<div class="rr1">'.'へれる'.'</div>'.'<div class="rr1">'.'へろう'.'</div>'));
                break;
            case "要る":
                echo json_encode(array('word' =>  '<div class="rr1">'.'為五段動詞<br>(I類動詞)'.'</div>'.'<div class="rr1">'.$t3.'ります'.'</div>'.'<div class="rr1">'.$t3.'って'.'</div>'.'<div class="rr1">'.$t3.'らない'.'</div>'.'<div class="rr1">'.'いれる'.'</div>'.'<div class="rr1">'.'いろう'.'</div>'));
                break;
            case "知る":
                echo json_encode(array('word' =>  '<div class="rr1">'.'為五段動詞<br>(I類動詞)'.'</div>'.'<div class="rr1">'.$t3.'ります'.'</div>'.'<div class="rr1">'.$t3.'って'.'</div>'.'<div class="rr1">'.$t3.'らない'.'</div>'.'<div class="rr1">'.'しれる'.'</div>'.'<div class="rr1">'.'しろう'.'</div>'));
                break;
            case "切る":
                echo json_encode(array('word' =>  '<div class="rr1">'.'為五段動詞<br>(I類動詞)'.'</div>'.'<div class="rr1">'.$t3.'ります'.'</div>'.'<div class="rr1">'.$t3.'って'.'</div>'.'<div class="rr1">'.$t3.'らない'.'</div>'.'<div class="rr1">'.'きれる'.'</div>'.'<div class="rr1">'.'きろう'.'</div>')); 
                break;    
            default:
            echo json_encode(array('word' =>  "$r2"));      
        }       
            }     
    } 
    elseif($v == "行く") {echo json_encode(array('word' => '<div class="rr1">'.'為五段動詞<br>(I類動詞)'.'<div class="rr1">'.$t3.'きます'.'</div>'.'<div class="rr1">'.$t3.'って'.'</div>'.'<div class="rr1">'.$t3.'かない'.'</div>'.'<div class="rr1">'.$t3.'ける'.'</div>'.'<div class="rr1">'.$t3.'こう'.'</div>'.'<div class="rr1">'.$t3.'け'.'</div>'));}
    elseif($v == "いく") {echo json_encode(array('word' => '<div class="rr1">'.'為五段動詞<br>(I類動詞)'.'<div class="rr1">'.$t3.'きます'.'</div>'.'<div class="rr1">'.$t3.'って'.'</div>'.'<div class="rr1">'.$t3.'かない'.'</div>'.'<div class="rr1">'.$t3.'ける'.'</div>'.'<div class="rr1">'.$t3.'こう'.'</div>'.'<div class="rr1">'.$t3.'け'.'</div>'));}
    elseif($v=="持って行く"){echo json_encode(array('word' => '<div class="rr1">'.'為五段動詞<br>(I類動詞)'.'<div class="rr1">'.'持っていきます'.'</div>'.'<div class="rr1">'.'持っていって'.'</div>'.'<div class="rr1">'.'持っていかない'.'</div>'.'<div class="rr1">'.'持っていける'.'</div>'.'<div class="rr1">'.$t3.'持っていこう'.'</div>'.'<div class="rr1">'.$t3.'持っていけ'.'</div>'));}
    elseif($v=="持っていく"){echo json_encode(array('word' => '<div class="rr1">'.'為五段動詞<br>(I類動詞)'.'<div class="rr1">'.'持っていきます'.'</div>'.'<div class="rr1">'.'持っていって'.'</div>'.'<div class="rr1">'.'持っていかない'.'</div>'.'<div class="rr1">'.'持っていける'.'</div>'.'<div class="rr1">'.$t3.'持っていこう'.'</div>'.'<div class="rr1">'.$t3.'持っていけ'.'</div>'));}
    elseif(in_array($q1,$k)){echo json_encode(array('word' => "$k1"));}
	elseif(in_array($q1,$g)){echo json_encode(array('word' => "$g1"));}
	elseif(in_array($q1,$s)){echo json_encode(array('word' => "$s1"));} 
	elseif(in_array($q1,$n)){echo json_encode(array('word' => "$n1"));}
    elseif(in_array($q1,$b)){echo json_encode(array('word' => "$b1"));}
    elseif(in_array($q1,$m)){echo json_encode(array('word' => "$m1"));}
    elseif(in_array($q1,$u)){echo json_encode(array('word' => "$u1"));}
    elseif(in_array($q1,$t)){echo json_encode(array('word' => "$t1"));}

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