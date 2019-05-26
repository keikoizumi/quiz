<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>新規会員登録</title>
</head>
<body>
<?php 
echo $html->css(array('sample','top'));
?>
<h3>LoginIdとPasswordを入力してください</h3>
<h2><?php echo $message ?></h2>
<h2><?php echo $errorMessage ?></h2>
<form method = "POST" action ="<?php e(URL);?>/login/newLoginMember" >
  <p>loginID</p><p><input type="text" name="user_id" required
        maxlength="8" size="5"style="width:200px;"></p>
  <p>password</p><p><input type="password" name="pass" required
       maxlength="8" size="10"style="width:200px;" ></p><br><br>
  <input type="submit" value="登録" />
</form>
<br>
<a href="<?php e(URL);?>/login">戻る</a>
</body>
</html>