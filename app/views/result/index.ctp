<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>結果</title>
<style>
table {
  text-align: center;
}
th {
  color: #FF9800;/*文字色*/
  background: #fff5e5;/*背景色*/	
}

td{
  color: #136FFF;/*文字色*/
}

.chart{
  padding:300px,150px;
}
</style>
</head>
<body>
<?php 
echo $this->element('englishs/header', array("title" => "成績一覧")); 
echo $html->css('sample');
?>

<h3>結果発表</h3>
  <canvas id="myPieChart" class="chart" style="width:1367px; height:187px; margin:50; padding-right:0px;"></canvas><br>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>

  <script>
  var ctx = document.getElementById("myPieChart");
  var myPieChart = new Chart(ctx, {
    type: 'pie',
    data: {
      labels: ["正解", "不正解"],
      datasets: [{
          backgroundColor: [
              "#D7EEFF",
              "#FFBEDA"
          ],
          data: [<?php echo $percentage ?>, 100-<?php echo $percentage ?>]
      }]
    },
    options: {
      title: {
        display: true,
        text: '正答率'
       }
     }
  });
  </script>
<center>
<?php echo $correctAnswer ?>問/
<?php echo $countAllQestion ?>問中　正解
<p>正答率:<?php echo $percentage ?>%</p>
<!-- <p>ステータス:<?php echo $message ?></p> -->

 <table border="1">
    <tr>
      <th>問題番号</th>
      <th>カテゴリー</th>
      <th>問題</th>
      <th>正解</th>
      <th>あなたの解答</th>
      <th>正誤</th>
      <th>解説</th>
    </tr>
<?php
  for($i = 0; $i < $countAllQestion ;$i++ ){
      $title = $resultAll[$i][0]["title"];
      //$category = $resultAll[$i][0]["level"];
      $resultAnswer = $resultAll[$i][0]["answer"];
      $yourAnswer = $resultAll[$i][0]["question"];
      $explanation = $resultAll[$i][0]["explanation"];
      //結果〇×
	  $resultIcon = $resultAll[$i][0]["result"];

	  $id = $i + 1; 
	  
	  if($resultIcon == 0){
      $iconFlag = '×';
      $tr = "<tr style='background:#FFBEDA;'>";
	  }else{
      $iconFlag = '〇';
      $tr = "<tr style='background: #D7EEFF;'>";
	  }
	  
	  
      $td1 = '<td>'.$id.'</td>';
      $td2 = '<td>'.$level.'</td>';
      $td4 = '<td>'.$resultAnswer.'</td>';
      $td5 = '<td>'.$yourAnswer.'</td>';
      $td6 = '<td>'.$iconFlag.'</td>';
      $td3 = '<td>'.$title.'</td>';
      $td7 = '<td>'.$explanation.'</td>';


      echo $tr.$td1.$td2.$td3.$td4.$td5.$td6.$td7.'</tr>';
  }
?>
  </table>
<!--
<a href="<?php e(URL);?>/englishs?level=<?php echo $level ?>">問題に戻る</a><br>
--><br>
<a href="<?php e(URL);?>/top">TOPに戻る</a>
</center>
</body>
</html>
