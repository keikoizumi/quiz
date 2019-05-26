<?php

class LoginController extends AppController{

    public $name = 'login';
    var $uses = array('userInfo');
    
    
	function index(){
	$message = "";
	$this->set('message',$message);
//$xml = new SimpleXMLElement('<item></item>');
 
//$xml->addChild('title', 'TitleName');
//$xml->addChild('description', 'description value');
 
//echo $xml->asXML();


	
	
//	$url = "http://weather.livedoor.com/forecast/webservice/json/v1?city=130010";

// cURLセッションを初期化
//$ch = curl_init();

// オプションを設定
//curl_setopt($ch, CURLOPT_URL, $url); // 取得するURLを指定
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // 実行結果を文字列で返す
//curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // サーバー証明書の検証を行わない

// URLの情報を取得
//$response =  curl_exec($ch);

// 取得結果を表示
//$wresult = json_decode($response, true);
// $this->set('wresult',$wresult);


// セッションを終了
//curl_close($ch);


//echo phpinfo();
//$date = date("Y/m/d");
//    $this->set('date',$date);

//$url = "http://api.jugemkey.jp/api/horoscope/free/".$date;

// cURLセッションを初期化
//$ch = curl_init();

// オプションを設定
//curl_setopt($ch, CURLOPT_URL, $url); // 取得するURLを指定
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // 実行結果を文字列で返す
//curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // サーバー証明書の検証を行わない

// URLの情報を取得
//$response =  curl_exec($ch);

// 取得結果を表示
//$result = json_decode($response, true);
// $this->set('result',$result);
//var_dump($result);
// セッションを終了
//curl_close($ch);

	//phpinfo();
	}
	
	function doLogin(){

	  $userId = $_POST['user_id'];
		$pass = $_POST['pass'];
		//サニタイジング
    $userId = htmlspecialchars($userId);
		$pass = htmlspecialchars($pass);
		
		define("BASEURL",'localhost');
	   
	  $resUserId = $this->userInfo->find('first',array(
             'fields' => array('user_id'),
             'conditions'=>array('user_id'=>$userId)
             ));
             
	  $resPass = $this->userInfo->find('first',array(
             'fields' => array('pass'),
             'conditions'=>array('pass'=>$userId)
             ));
	  
	   if($userId == $resUserId['userInfo']['user_id'] && $pass == $resPass['userInfo']['pass'] ){
	    $this -> Session-> write('userId', $userId);
	    $this->redirect(URL.'/top');
	   }else{
			$message = "No Regist"; 
			$this->set('message',$message);
	    $this->redirect(URL.'/login');
	   }
	 
	}
	
	function newMember(){
	 
	}
	
	function newLoginMember(){
	   $userId = $_POST['user_id'];
	   $pass = $_POST['pass'];
	   $current_date = date('Y-m-d');
	   $message = "ok";
	   $errorMessage = "ng";
		 

  //POST送信なら処理開始
	if($_SERVER['REQUEST_METHOD']==='POST'){
		//サニタイジング
    $userId = htmlspecialchars($userId);
    $pass = htmlspecialchars($pass);
		//新しいUserIdが既存でないことを確認
	   if($userId){
	    $resUserId = $this->userInfo->find('all',array(
             'fields' => array('user_id'),
             'conditions'=>array('user_id'=>$userId)
             )); 
            //既存のuserIdがない場合
             if(!$resUserId){
             $data = array('userInfo' => array('user_id' =>$userId,'pass'=>$pass,'act_no' => 0,'current_date' =>$current_date));
	           $fields = array('user_id','pass','act_no','current_date');
	           $resdata = $this->userInfo->save($data,false,$fields);
	           
	           $this -> Session-> write('userId', $userId);
	           $this->set('message',$message);

	           $this->redirect(URL.'/top');
             }else{
                $errorMessage = "already exist! please change your loginId.";
								$this->set('errorMessage',$errorMessage);
								$message = " ";
	              $this->set('message',$message);
             }
	   }else{
	      $this->set('errorMessage',$errorMessage);
	      $message = " ";
	      $this->set('message',$message);
		 }  
		 header(URL.'login/newLoginMember');	
	}
		
	}
}

?>