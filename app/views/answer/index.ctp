<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>結果</title>
</head>
<body>
<?php 
echo $this->element('englishs/header', array("title" => "成績一覧")); 
echo $html->css('sample');
?>
<h1>クイズの結果</h1>
<h2><?php echo $result ?></h2><br>
<p>正解</p>
<?php echo $correctAnswer ?>
<br><br>
<form method = "POST" action ="englishs" >
  <input type="hidden" name="id" value="<?php echo $nextId ?>">
  <input type="submit" value="次の問題" />
</form>
<br>
</body>
</html>