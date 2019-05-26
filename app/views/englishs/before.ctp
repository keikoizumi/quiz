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
<title>カテゴリー選択</title>
<?php 
echo $this->element('englishs/header', array("title" => "カテゴリー選択")); 
echo $html->css('sample');
$imgPas = array();
$imgPas[0]="top_illustrain02-penguin04.png";
$imgPas[1]="top_illustrain02-cat30.png";
$imgPas[2]="top_ashika_todo.png";
$imgPas[3]="top_dog-shibainu.png";
$imgPas[4]="top_chimpanzee_dougu.png";
?>
</head>
<body>
<h2>ようこそ<?php echo $userId ?>さん</h2> 
<br>
<center>
  <h1><?php if ($retry == 1){ echo "再チャレンジ"; } else {echo "4択問題";} ?>　カテゴリー選択</h1>
      <?php if (isset($categorys)) { ?>
        <?php for ($i=0;$i<count($categorys);$i++) { ?>
          <div class="cont-itm"> 
          <a href="<?php e(URL);?>/englishs<?php if($retry == 1){ echo "/reTry"; }?>?level=<?php e($categorys[$i]["englishTest"]["level"]); ?>">
          <img src="<?php e(URL);?>/app/webroot/img/<?php e($imgPas[$i]);?>" width="250" height="250"></a>
          <p><?php e($categorys[$i]["englishTest"]["level"]); ?></p>
          </div>
        <?php } ?>
      <?php } ?>
  </center>   
<br>
<br>
<a href="<?php e(URL);?>/top">TOPに戻る</a>

</body>
</html>
