 // 可輸入日文字串JS
function sub_str($str, $length =, $append = true)
{
$str = trim($str);
$strlength = strlen($str);
if ($length == || $length >= $strlength)
{
return $str; //擷取長度等於或大於等於本字串的長度，返回字串本身
}
elseif ($length < ) //如果擷取長度為負數
{
$length = $strlength   $length;//那麼擷取長度就等於字串長度減去擷取長度
if ($length < )
{
$length = $strlength;//如果擷取長度的絕對值大於字串本身長度，則擷取長度取字串本身的長度
}
}
if (function_exists('mb_substr'))
{
$newstr = mb_substr($str, , $length, EC_CHARSET);
}
elseif (function_exists('iconv_substr'))
{
$newstr = iconv_substr($str, , $length, EC_CHARSET);
}
else
{
//$newstr = trim_right(substr($str, , $length));
$newstr = substr($str, , $length);
}
if ($append && $str != $newstr)
{
$newstr .= '...';
}
return $newstr;
}