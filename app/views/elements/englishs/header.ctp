<header style="background:;">
    <a  href="<?php e(URL);?>/top"><img src="<?php e(URL);?>/app/webroot/img/top_yamane.png" alt="<?php echo $title?>" width="50" height="45" margin-right="auto"></a>
    <nav class="button" style="text-align:right !important;margin-right:10px;display:inline-block !important;">
    <a href="<?php e(URL);?>/englishs/before?retry=0">4択問題</a>
    <a href="<?php e(URL);?>/englishs/before?retry=1">再チャレンジ問題</a>
    <a href="<?php e(URL);?>/Record/before_record">成績一覧</a>
    <a href="<?php e(URL);?>/admin">管理者画面</a>
      <?php if($title !== "TOP"){
        echo "<a class='top' href='".URL."/top'>TOPに戻る</a>";
        }else{
        echo "<button type='button' onClick='MyFunction1()' style='color:red'>退会</button>";
       }
       ?>           
            <div style="display:inline-flex">
             <form method="post" action="<?php e(URL);?>/logout"> 
               <input type="submit"  value="ログアウト" >
             </form>
            </div>
            
    </nav>
</header>