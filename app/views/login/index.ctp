<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ログイン</title>
<!-- BootstrapのCSS読み込み -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>  

<!--CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<!--JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
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

div{
  display:flex !important;
  padding: 1px;
}

.cont1{
  background:#FFABCE;
  display:inline-block !important;
  border: 2px;
  padding: 15px;
  margin: 1px;
}

.cont2{
  background:#A7F1FF;
  display:inline-block !important;
  border: 1px; 
  padding: 15px;
  margin: 1px;
}

/*全体*/
.hidden_box {
    margin: 2em 0;/*前後の余白*/
    padding: 0 25;
    display:inline-block !important;
}

/*ボタン装飾*/
.hidden_box label {
    padding: 15px;
    font-weight: bold;
    border: solid 2px black;
    cursor :pointer;
    background:#A7F1FF;
}

/*ボタンホバー時*/
.hidden_box label:hover {
    background: #efefef;
}

/*チェックは見えなくする*/
.hidden_box input {
    display: none;
}

/*中身を非表示にしておく*/
.hidden_box .hidden_show {
    height: 0;
    padding: 0;
    overflow: hidden;
    opacity: 0;
    transition: 0.8s;
}

/*クリックで中身表示*/
.hidden_box input:checked ~ .hidden_show {
    padding: 10px 0;
    height: auto;
    opacity: 1;
    display:block;
}


</style>
</head>
<body>
<?php 
//echo $html->css(array('sample','top'));
?>
<header style="background:#CCFFFF;">
  <img class="text-center" src="<?php e(URL);?>/app/webroot/img/image4207.gif" alt=ログイン width="50" height="45">
</header>
<div>
<div class="cont1">
  <h1>ログイン</h1>
    <form method = "POST" action ="<?php e(URL);?>/login/doLogin" >
      <p><input type="text" name="user_id" placeholder="LoginID" required maxlength="8" size="5" style="width:200px;" ></p>
      <p><input type="password" name="pass" placeholder="Password" required maxlength="8" size="10" style="width:200px;" ></p><br>
      <input type="submit" value="login" />
    </form><br>
    <?php echo($message) ?>
    <p>IDをお持ちでない方は<a href = "<?php e(URL);?>/login/newMember" >こちら</a>をクリックしてください。</p>
</div>
</body>
</html>