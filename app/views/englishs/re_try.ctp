<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>再挑戦</title>
<style>
@import url(https://fonts.googleapis.com/css?family=Roboto);
.radio-inline__input {
    clip: rect(1px, 1px, 1px, 1px);
    position: absolute !important;
}

.radio-inline__label {
    display: inline-block;
    padding: 0.5rem 1rem;
    margin-right: 18px;
    border-radius: 3px;
    transition: all .2s;
}

.radio-inline__input:checked + .radio-inline__label {
    background: #CCFFFF;
    color: #000000;
    text-shadow: 0 0 1px rgba(0,0,0,.7);
}

.radio-inline__input:focus + .radio-inline__label {
    outline-color: #4D90FE;
    outline-offset: -2px;
    outline-style: auto;
    outline-width: 5px;
}
</style>
</head>
<body>
<?php 
echo $this->element('englishs/header', array("title" => "再挑戦")); 
echo $html->css('sample');
?>
<h2>ようこそ<?php echo $userId ?>さん</h2> 

<h2><?php echo $message ?></h2>
<br>
<form method="POST" action="<?php e(URL);?>/englishs_retry_post/">
<input type="hidden" name="userId" value=<?php echo $userId ?>>
<input type="hidden" name="level" value=<?php echo $level ?>>
<input type="hidden" name="count" value=<?php echo $count ?>>
<?php
if(isset($tryData)){
for($i=0;$i < count($tryData) && $i < 10; $i++){

$dbid = $tryData[$i]["englishTest"]["id"];

if(isset($dbid)){

$q1 = $tryData[$i]["englishTest"]["q1"];
$q2 = $tryData[$i]["englishTest"]["q2"];
$q3 = $tryData[$i]["englishTest"]["q3"];
$q4 = $tryData[$i]["englishTest"]["q4"];
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
     echo '<input type="radio" class="radio-inline__input" name="'.$i.'" id="'.$question[$j].'" value="'.$question[$j].'" required>
           <label class="radio-inline__label" for="'.$question[$j].'">'.$question[$j].'</label><br>';
     echo '<input type="hidden" name="a'.$i.'" value="'.$answer.'">';
     echo '<input type="hidden" name="b'.$i.'" value="'.$dbid.'">';
   } 
    echo '<br>';
  }
 }
}
?>
   <br>
   <?php if(isset($message) && !empty($message)){ ?>

<?php } else {?>
   <input type="submit" value="回答する">
</form>
<?php } ?>
<br>
<a href="<?php e(URL);?>/englishs/before?retry=1">前に戻る</a>
</body>
</html>
