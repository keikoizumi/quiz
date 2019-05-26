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
<title>ユーザー管理</title>
<script>
function MyFunction1() {
// 「OK」時の処理開始 ＋ 確認ダイアログの表示
	if(window.confirm('本当に削除しますか？削除されたデータは復活しません！')){
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
echo $this->element('englishs/header', array("title" => "成績一覧")); 
echo $html->css('sample');
?>
<h2>Admin Top</h2>
<a href = '<?php e(URL); ?>/admin'>問題一覧</a>　　
<a href = '<?php e(URL); ?>/admin/create'>問題作成</a>　　


 <table border="1">
    <tr>
      <th>番号</th>
      <th>ユーザーID</th>
      <th>パスワード</th>
      <th>活動回数</th>
      <th>登録日時</th>
      <th>削除</th>
    </tr>
<?php
  for($i = 0; $i < count($userAll) ;$i++ ){
  
    $id = $userAll[$i]["userInfo"]["id"];
	  $userId = $userAll[$i]["userInfo"]["user_id"];
	  $pass = $userAll[$i]["userInfo"]["pass"];
	  $actNo = $userAll[$i]["userInfo"]["act_no"];
	  $currentDate = $userAll[$i]["userInfo"]["current_date"];

      $td1 = '<td>'.$id.'</td>';
      $td2 = '<td>'.$userId.'</td>';
      $td3 = '<td>'.$pass.'</td>';
      $td4 = '<td>'.$actNo.'</td>';
      $td5 = '<td>'.$currentDate.'</td>';
      $td6 = '<td><form action="'.URL.'/admin/userDel" onsubmit="return MyFunction1()" method="post"> 
        <input type="hidden" name="userId" value='.$userId.'>
        <input type="hidden" name="Id" value='.$id.'>
        <input type="submit" value="削除"> 
      </form> 
      </td>';

      echo '<tr>'.$td1.$td2.$td3.$td4.$td5.$td6.'</tr>';
  }
?>
  </table>

</body>
</html>