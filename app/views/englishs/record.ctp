<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>簡易クイズプログラム</title>
</head>
<body>
<?php 
echo $this->element('englishs/header', array("title" => "成績一覧")); 
echo $html->css('sample');
?>
<p>ようこそ<?php echo $userId ?>さん</p> 

<h2><?php echo $message ?></h2>
<br>

<form method="POST" action="<?php e(URL);?>/result/reTry">

<?php

for($i=0;$i < count($tryData) && $i < 10; $i++){
shuffle($tryData); //配列の中身をシャッフル
$dbid = $tryData[$i]["englishTest"]["id"];
$q1 = $tryData[$i]["englishTest"]["q1"];
$q2 = $tryData[$i]["englishTest"]["q2"];
$q3 = $tryData[$i]["englishTest"]["q3"];
$q4 = $tryData[$i]["englishTest"]["q4"];
$explanation = $tryData[$i]["englishTest"]["explanation"];
$reTryCount = count($tryData);

echo '<input type="hidden" name="reTryCount" value="'.$reTryCount.'">';

$question = array($q1,$q2,$q3,$q4); //4択の選択肢を設定
$answer = $question[0]; //正解の問題を設定

$id = $i + 1;
$title = $tryData[$i]["englishTest"]["title"];
$titleAll = $id.".".$title;

echo '<h1>'.$titleAll.'</h1>';

shuffle($question); //配列の中身をシャッフル

   for($j = 0; $j < count($question);$j++ ){ 
     echo '<input type="radio" name="'.$i.'" value="'.$question[$j].'" required>'.$question[$j].'<br>';
     echo '<input type="hidden" name="a'.$i.'" value="'.$answer.'">';
     echo '<input type="hidden" name="b'.$i.'" value="'.$dbid.'">';
   } 
    echo '<br>';
 }

?>
   <br>
<?php if($explanation !== ""){
    echo '<b>'.'【解説】'.'</b><br>';
    echo $explanation;
} ?>
</form>

<br>
<?php
echo '<a href="' . $_SERVER['HTTP_REFERER'] . '">前に戻る</a>';
?>
</body>
</html>
