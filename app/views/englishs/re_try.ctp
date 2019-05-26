<!doctype html>
<html>
<head>
<meta charset="utf-8">
<!-- viewport meta -->
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<title>カテゴリ</title>
 <!-- jQuery、Popper.js、Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>
<title>再挑戦</title>
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
