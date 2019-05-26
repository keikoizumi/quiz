<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>成績一覧</title>
	<script src="http://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
	<script>
		jQuery(function ($) {
			$('#pref-search2').change(function () {
        var select_val2 = $('#form-control2 option:selected').val();
				$.each($("#pref-table tr"), function (index, element) {
					if (select_val2 == "") {
						$(element).css("display", "table-row");
						return true;
          }    
          var row_text = $(element).text();
          if (row_text) {
            if ( (row_text.indexOf(select_val2) != -1 && row_text.indexOf(select_val2) != 0)) {
              $(element).css("display", "table-row");
            } else {
              $(element).css("display", "none");
            }
          }

        });
        
      });
      
    });

jQuery(function ($) {
    $('#pref-search3').change(function () {
    var select_val3 = $('#form-control3 option:selected').val();
    $.each($("#pref-table tbody tr"), function (index, element) {
    if (select_val3 == "") {
      $(element).css("display", "table-row");
      return true;
    }
    var row_text = $(element).text();
    if (row_text) {
      if ( (row_text.indexOf(select_val3) != -1 && row_text.indexOf(select_val3) != 0)) {
        $(element).css("display", "table-row");
      } else {
        $(element).css("display", "none");
      }
    }

  });
  
});

});

jQuery(function ($) {
			$('#pref-search4').change(function () {
        var select_val4 = $('#form-control4 option:selected').val();

				$.each($("#pref-table tbody tr"), function (index, element) {
					if (select_val4 == "") {
						$(element).css("display", "table-row");
						return true;
          }
          var row_text = $(element).text();
          if (row_text) {
            if ( (row_text.indexOf(select_val2) != -1 && row_text.indexOf(select_val2) != 0)) {
              $(element).css("display", "table-row");
            } else {
              $(element).css("display", "none");
            }
          }

        });
        
      });
      
    });
    function onButtonClick() {
          
        var innerText = document.forms.id_form1.id_textBox1.value;
        console.log(innerText);

        jQuery(function ($) {
				$.each($("#pref-table tbody tr"), function (index, element) {
					if (innerText == "") {
						$(element).css("display", "table-row");
						return true;
					}

					var row_text = $(element).text();
					if (row_text.indexOf(innerText) != -1) {
						$(element).css("display", "table-row");   
            $(innerText).css("background-color","yellow");        
            console.log("aaaaaaaaaaa");
					} else {
						$(element).css("display", "none");
            
            console.log("bbbbbbbbbbbbbbbbbb");
					}
         
				});
			});
		}
	</script>
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

td a:hover{
  background-color: #FFFF99;
} 

td a{
  display:block;
  width:100%;
  height:100%;
} 

.highlight{
  background-color:yellow;
}
</style>
</head>
<body>
<?php 
echo $this->element('englishs/header', array("title" => "成績一覧")); 
echo $html->css('sample');
?>
<h2><?= $userId ?>さんの成績一覧</h2>
<a href="<?php e(URL);?>/record/before_record">前に戻る</a>
<br>
<br>
<?php if($emptyData == true){?>
<h1>No data</h1>
<a href="<?php e(URL);?>/record?level=<?= $selectCategory?>&startDate=<?= $nextStartDate?>">翌週＞</a>
<? } else {?>
<div class="seiseki">

  <canvas id="myPieChart" style="width:1367px; height:187px; margin:50; padding-right:0px;"></canvas><br>
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
          data: [<?= $percentage ?>, 100-<?= $percentage ?>]
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
   <canvas id="myChart" style="width:1367px; height:187px; margin:50; padding-right:0px;"></canvas>
    <script type="text/javascript">
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['<?= $period[6] ?>', '<?= $period[5] ?>', '<?= $period[4] ?>', '<?= $period[3] ?>', '<?= $period[2] ?>', '<?= $period[1] ?>', '<?= $period[0] ?>'],
                datasets: [{
                    label: '正解率',
                    type: "line",
                    fill: false,
                    data: ['<?= $getP[6] ?>', '<?= $getP[5] ?>', '<?= $getP[4] ?>', '<?= $getP[3] ?>', '<?= $getP[2] ?>', '<?= $getP[1] ?>', '<?= $getP[0] ?>'],
                    borderColor: "rgb(154, 162, 235)",
                    yAxisID: "y-axis-1",
                }, {
                    label: '活動回数',
                    data: ['<?= $getDate[6] ?>', '<?= $getDate[5] ?>', '<?= $getDate[4] ?>', '<?= $getDate[3] ?>', '<?= $getDate[2] ?>', '<?= $getDate[1] ?>', '<?=($getDate[0]) ?>'],
                    borderColor: "rgb(255, 99, 132)",
                    backgroundColor: "rgba(255, 99, 132, 0.2)",
                    yAxisID: "y-axis-2",
                }]
            },
            options: {
                tooltips: {
                    mode: 'nearest',
                    intersect: false,
                },
                responsive: true,
                scales: {
                    yAxes: [{
                        id: "y-axis-1",
                        type: "linear",
                        position: "left",
                        ticks: {
                            max: 100,
                            min: 0,
                            stepSize: 10
                        },
                    }, {
                        id: "y-axis-2",
                        type: "linear",
                        position: "right",
                        ticks: {
                            max: 100,
                            min: 0,
                            stepSize: 10
                        },
                        gridLines: {
                            drawOnChartArea: false,
                        },
                    }],
                },
            }
        });

    </script>
<a href="<?php e(URL);?>/record?level=<?= $selectCategory?>&startDate=<?= $nextEndDate?>">＜先週</a>
<a href="<?php e(URL);?>/record?level=<?= $selectCategory?>&startDate=<?= $nextStartDate?>">翌週＞</a>

<br>
<p>総活動回数<?= $actNo ?>回</p>
<?= $correctAnswer ?>問/
<?= $countAllQestion ?>問中　正解
<!--<p>正答率:<?= $percentage ?>%</p>-->
<!-- <p>ステータス:<?= $message ?></p> -->
	<main class="container">
	<!--	<div id="pref-search">-->
		<!--	<select id="form-control"> -->
			<!-- 	<option value="">カテゴリーで絞込(全て)</option> 
				/*
         for($i = 0; $i < $countAllQestion ;$i++ ){
           $category = $resultAll[$i]["english_tests"]["level"];
          echo "<option value=".$category.">".$category."</option>";
        */
        --> 
			</select>
      <div id="pref-search2">
      <select id="form-control2">
				<option value='<?= $selectCategory ?>'>間違えた問題のみ表示(全て)</option>
        <option value='〇'>正解</option>
        <option value="×">不正解</option>
			</select>
    </div>
    <div id="pref-search3">
      <select id="form-control3">
				<option value="<?= $selectCategory ?>">全ての問題を表示する</option>
        <option value='partOf'>同じ問題は表示しない</option>
			</select>
    </div>
    <div id="pref-search4">
      <select id="form-control4">
				<option value="">日時で選択する</option>
        <?php 
         for($i = 0;$i < count($period); $i++){
          echo "<option value=".$period[$i].">".$period[$i]."</option>";
         }
        ?>
			</select>
    </div>
      <form name="form1" id="id_form1" action="">
           <input name="textBox1" id="id_textBox1" type="text" value="" />
           <input type="button" value="検索" onclick="onButtonClick();" />
      </form>
      <h2 id="output" style="color:red;"></h2>
		</div>
    <br>

<div id="pref-data">

<table>
<tr>
      <th>番号</th>
      <th>カテゴリー</th>
      <th>問題</th> 
      <th>正解(〇/×)</th>
      <th>あなたの解答</th>
      <th>正誤</th>
      <th>解答日時</th>
      </table>
      <table id="pref-table" class="table table-borderd">
      </tr>
<?php
  for($i = 0; $i < $countAllQestion ;$i++ ){
      $titelNo = $resultAll[$i]["english_results"]["title_no"];
      $title = $resultAll[$i]["english_tests"]["title"];
      $category = $resultAll[$i]["english_tests"]["level"];
      $resultAnswer = $resultAll[$i]["english_results"]["answer"];
      $yourAnswer = $resultAll[$i]["english_results"]["question"];
      //結果〇×
	  $resultIcon = $resultAll[$i]["english_results"]["result"];
    $date = $resultAll[$i]["english_results"]["current_date"];
    
    if (is_null($date)) {
      $date = $resultAll[$i]["english_results"]["retry_date"];
    } 

	  $actNo = $resultAll[$i]["english_results"]["act_no"];

	  $id = $i + 1; 

	  if($resultIcon == 0){
      $iconFlag = '×';
      $tr = "<tr style='background:#FFBEDA;'>";
	  }else{
      $iconFlag = '〇';
      $tr = "<tr style='background: #D7EEFF;'>";
	  }
	  
      $td1 = '<td>'.$id.'</td>';
      $td2 = '<td>'.$category.'</td>';
      $td3 = '<td><a href="'.URL.'/englishs/record?titleNo='.$titelNo.'&actNo='.$actNo.'">'.$title.'</td>';
      $td4 = '<td>'.$resultAnswer.'</td>'; 
      $td5 = '<td>'.$yourAnswer.'</td>';
      $td6 = '<td>'.$iconFlag.'</td>';
      $td7 = '<td>'.$date.'</td>';
      
      echo $tr.$td1.$td2.$td3.$td4.$td5.$td6.$td7.'</tr>';
  }
?>
  </table>
</div>
<button>csvファイルとしてダウンロードする</button>
<? } ?>
<br>
<a href="<?php e(URL);?>/top">TOPに戻る</a>

</div>
</body>
</html>