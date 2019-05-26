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
<title>新規会員登録</title>
</head>
<body>
<?php 
echo $html->css(array('sample','top'));
?>
<h3>LoginIdとPasswordを入力してください</h3>

<form method = "POST" action ="<?php e(URL);?>/login/newLoginMember" >
  <p>loginID</p><p><input type="text" name="user_id" required maxlength="8" size="5" style="width:200px;"></p>
  <p>password</p><p><input type="password" name="pass" required maxlength="8" size="10" style="width:200px;" ></p><br><br>
  <input type="submit" value="登録" />
</form>
<br>
<a href="<?php e(URL);?>/login">戻る</a>
</body>
</html>