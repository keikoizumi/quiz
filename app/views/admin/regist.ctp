<?php
 
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>登録結果</title>
</head>
<body>
<?php 
echo $this->element('englishs/header', array("title" => "成績一覧")); 
echo $html->css('sample');
?>
<p>ようこそ<?php echo $userId ?>さん</p> 

<h2>regist Failure</h2>

<a href = '<?php e(URL);?>/admin'>問題一覧</a><br>
<a href = '<?php e(URL);?>/admin/create'>問題作成</a>
</body>
</html>