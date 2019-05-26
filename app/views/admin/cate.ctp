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
jQuery(function ($) {
  $('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-body input').val(recipient)
})
});
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
      <th>番号</th>
      <th>カテゴリー</th>
      <th>編集</th>
      <th>削除</th>
    </tr>
<?php
 echo $msg;
  for($i=0; $i<count($selectCategory); $i++ ){ 
    $cateName = $selectCategory[$i]['englishTest']['level'];
    $level = "<input type='text' name='.$cateName.'  
    required style='width:300px; height:30px' 
    value='$cateName'>";

    $id = $i + 1; 
	  $td1 = '<td>'.$id.'</td>';
    $td2 = '<td>'.$cateName.'</td>';
    $td3 = "<td><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal' 
    data-whatever='$cateName'>編集</button></td>";
    $td4 = '<td><form action="'.URL.'/admin/delCate?level='.$cateName.'" onsubmit="return MyFunction1()"> 
    <input type="hidden" name="id" value='.$level.'
    <input type="submit" value="削除"> 
  </form> 
  </td>';
  
    echo '<tr>'.$td1.$td2.$td3.$td4.'</tr>';
}
?>
</table>
<!-- モーダル -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">カテゴリ名 編集</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form name="form1" id="id_form1" action="<?php e(URL);?>/admin/editCate" method="get">
          <div class="form-group">
            <input type="text" class="form-control" id="recipient-name" name="level" autofocus>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary">
        </form>
      </div>
    </div>
  </div>
</div>
</body>
</html>