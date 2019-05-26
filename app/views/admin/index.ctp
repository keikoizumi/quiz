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
<title>問題一覧</title>
<script>
function MyFunction1() {
// 「OK」時の処理開始 ＋ 確認ダイアログの表示
	if(window.confirm('本当に削除しますか？')){
		return true;
	}
	// 「キャンセル」時の処理開始
	else{
		return false;
	}
	// 「キャンセル」時の処理終了
}
</script>
</head>
<body>
<?php 
echo $this->element('englishs/header', array("title" => "問題一覧")); 
echo $html->css('sample');
?>
<p>ようこそ<?php echo $userId ?>さん</p> 
<h1>問題一覧</h1>

<a href = '<?php e(URL);?>/top'>TOPへ戻る</a>
<a href = '<?php e(URL);?>/admin/create'>問題作成</a>
<a href = '<?php e(URL);?>/admin/cate'>カテゴリ</a>
<a href = '<?php e(URL);?>/admin/user'>ユーザー管理</a>
<br>
 <table border="1">
    <tr>
      <th>問題番号</th>
      <th>カテゴリー</th>
      <th>問題文</th>
      <th>正解</th>
      <th>誤答1</th>
      <th>誤答2</th>
      <th>誤答3</th>
      <th>解説</th>
      <th>最終更新者</th>
      <th>最終更新日時</th>
      <th>編集</th>
      <th>削除</th>
    </tr>
<?php
if($displayFlag == 0){
 echo $message;
}elseif($displayFlag == 1){
  for($i = 0; $i < $countAllQestion ;$i++ ){
//
    $level = $selectAllQestion[$i]["englishTest"]["level"];
    $id = $selectAllQestion[$i]["englishTest"]["id"];
	  $q1 = $selectAllQestion[$i]["englishTest"]["q1"];
	  $q2 = $selectAllQestion[$i]["englishTest"]["q2"];
	  $q3 = $selectAllQestion[$i]["englishTest"]["q3"];
	  $q4 = $selectAllQestion[$i]["englishTest"]["q4"];
    $title = $selectAllQestion[$i]["englishTest"]["title"];
//$title = trim($title);
//$title = str_replace('\n','<br>',$title);
    $explanation = $selectAllQestion[$i]["englishTest"]["explanation"];
    $updatePerson = $selectAllQestion[$i]["englishTest"]["user_id"];
	  $current_date = $selectAllQestion[$i]["englishTest"]["current_date"];
	  
	    $td1 = '<td>'.$id.'</td>';
      $td2 = '<td>'.$level.'</td>';
      $td3 = '<td>'.$title.'</td>';
      $td4 = '<td>'.$q1.'</td>';
      $td5 = '<td>'.$q2.'</td>';
      $td6 = '<td>'.$q3.'</td>';
      $td7 = '<td>'.$q4.'</td>';
      $td8 = '<td>'.$explanation.'</td>';
      $td9 = '<td>'.$updatePerson.'</td>';
      $td10 = '<td>'.$current_date.'</td>';
      $td11 = '<td><form action="'.URL.'/admin/update"> 
        <input type="hidden" name="id" value='.$id.'>
        <input type="submit" value="編集"> 
      </form> 
      </td>';
      $td12 = '<td><form action="'.URL.'/admin/delete" onsubmit="return MyFunction1()"> 
        <input type="hidden" name="id" value='.$id.'>
        <input type="submit" value="削除"> 
      </form> 
      </td>';

      echo '<tr>'.$td1.$td2.$td3.$td4.$td5.$td6.$td7.$td8.$td9.$td10.$td11.$td12.'</tr>';
  }  
}
?>
  </table>

</body>
</html>