<?php
 
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>簡易クイズプログラム - ユーザー管理</title>
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
  background: #D7EEFF;/*背景色*/	
}
</style>
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