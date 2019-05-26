<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>問題作成</title>
<script>
function setData(txt)
{
	document.create.category.value = txt;
  console.log(aaa);
}
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
echo $this->element('englishs/header', array("title" => "問題作成")); 
echo $html->css('sample');
?>
<h1>問題作成</h1>
<a href = '<?php e(URL);?>/admin/'>問題一覧</a>
<a href = '<?php e(URL);?>/admin/user'>ユーザー管理</a><br>
<br>
<div style="padding:100px; background-color:#CCFFFF;;">

  <form name="create" method="POST" action="../admin/regist">
     <div><p>カテゴリー</p>
       <select onChange="setData(this[this.selectedIndex].value)">
        <?php 
         echo "<option value=''></option>";
         for($i = 0;$i < $count; $i++){
          $category = $selectCategory[$i]["englishTest"]["level"];
          echo "<option value=".$category.">".$category."</option>";
         }
        ?>
        
       </select></div><br>
     <div><p>カテゴリー（新規作成 ※最大登録数は5つまでです）<?php e($msg); ?></p>
     <input type="text" name="category"  required style="width:300px; height:30px"></div>


     </br> 
     <div><p>問題文</p><textarea name="title" required   style="width:1000px; height:100px"></textarea></div></br>
     <div><p>正解</p><input type="text" name="q1"  required style="width:700px; height:30px"></div></br>
     <div><p>誤答1</p><input type="text" name="q2"  required style="width:700px; height:30px"></div></br>
     <div><p>誤答2</p><input type="text" name="q3"  required style="width:700px; height:30px"></div></br>
     <div><p>誤答3</p><input type="text" name="q4"  required style="width:700px; height:30px"></div></br>
     <div><p>解説</p><textarea type="text" name="explanation" style="width:1000px; height:100px"></textarea></div></br>
     <br></br>
     <div style="text-align:center;"><input type="submit" value="登録"></div>

  </form>
</div>
</body>
</html>