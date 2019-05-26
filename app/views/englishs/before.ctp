<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>カテゴリー選択</title>
<style>

.selectlevel{
  text-align: center;
}
body{
  background: #fff5e5 !important;
}

.cont-itm{
  display:inline-block !important;
  text-align: center;
}

</style>
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
