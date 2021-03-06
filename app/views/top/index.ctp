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
<title>TOP</title>
<script>
function MyFunction1() {

// 「OK」時の処理開始 ＋ 確認ダイアログの表示
	if(window.confirm('本当に退会してもよろしいでしょうか？')){
		location.href = "<?php e(URL);?>/withdraw";
	}
	// 「キャンセル」時の処理開始
	else{
		location.href = "<?php e(URL);?>/top";
	}
	// 「キャンセル」時の処理終了
}
</script>
<style>
div{
  display:inline-block;
}
</style>
</head>
<body>
<?php 
echo $this->element('englishs/header', array("title" => "TOP")); 
echo $html->css(array('sample','top'));
?>
<h2>ようこそ<?php echo $userId ?>さん</h2>
<br> 
<center>
  <div class="cont-itm"> 
    <a href="<?php e(URL);?>/englishs/before?retry=0">
    <img src="<?php e(URL);?>/app/webroot/img/top_illustrain02-penguin04.png" width="250" height="250"></a>
    <center><p>4択問題</p></center>
  </div>
  <div class="cont-itm"> 
    <a href="<?php e(URL);?>/englishs/before?retry=1">
    <img src="<?php e(URL);?>/app/webroot/img/top_illustrain02-cat30.png"  width="250" height="250"></a>
    <center><p>再チャレンジ問題</p></center>  
  </div>
  <div class="cont-itm"> 
    <a href="<?php e(URL);?>/Record/before_record">
    <img src="<?php e(URL);?>/app/webroot/img/top_ashika_todo.png" width="220" height="220" ></a>
   <center><p>成績一覧</p></center>
  </div>
  <div class="cont-itm"> 
    <a href="<?php e(URL);?>/admin">
    <img src="<?php e(URL);?>/app/webroot/img/top_dog-shibainu.png" width="220" height="220" ></a>
    <center><p>管理者画面</p></center>
  </div>
</center>
</body>
</html>
