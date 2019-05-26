<?php
class ResultController extends AppController{
    public $name = 'Result';
    var $uses = array('englishTest','englishResult','userInfo');
	 
 public function beforeFilter() {
     $userId = $this -> Session-> read('userId');
      if(isset($userId)){
        $this->set('userId',$userId);

      }else{
       $this->redirect(URL.'/login');
     }
  }
    
	function index(){
	  
// 	 $date = date("Y/m/d H:i:s");
// 	 $userId = $this -> Session-> read('userId');
// //var_dump($userId); 
//      $userId = $_POST['userId'];
// //var_dump($userId); 
// //$userId = "kassidy";
//      $level = $_POST['level'];
	 
// 		 //活動回数のカウント
// 	  $actNo = $this->englishResult->find('first',array(
//              'fields' => array('act_no'),
//              'order' => array('act_no' => 'desc'),
//              'conditions'=>array('user_id'=>$userId)
//              )); 
//       $actNo = $actNo["englishResult"]["act_no"];
 
// //var_dump($actNo); 
             
//       if(isset($actNo) || $actNo == NULL){
//       $actNo += 1;
//       }


//     //問題数をカウント
// 	  $data =   $this->englishTest->find('all' ,array(
// 	     'conditions'=>array('status'=>0,'level'=>$level)
// 	     ));
// 	  $count = count($data);
			
// 		if($count >= 0){
// 			//活動回数をuserInfoにupdate
// 			 $data = array('userInfo.act_no'=>$actNo);
// 	     $conditions = array('userInfo.user_id' => $userId);
// 			 $registQuery = $this->userInfo->updateAll($data,$conditions); 

// 			 //結果判定
// 	     for($i=0;$i < $count ; $i++){
		
// 	      $question = $_POST[$i];
// //var_dump($question);
// 	  	  $answer = $_POST['a'.$i];
// //var_dump($answer);
// 	    	$dbid = $_POST['b'.$i];

// 	     if($question === $answer){
// 				 $result = 1;
// 	    //insert
// 	       $data = array('englishResult' => array('user_id' => $userId,'title_no' => $dbid,'level' => $level,'answer' => $answer,'question' => $question ,'result' => $result,'act_no' =>$actNo,'current_date' => $date));
// 	       $fields = array('user_id','title_no','level','answer','question','result','act_no','current_date');
// 	       $this->englishResult->create(false);
// 	       $registQuery = $this->englishResult->save($data,false,$fields);
// 	     }elseif($question !== $answer){
// 	       $result = 0;
// 					//insert
// 				 $retryFlg = 1;
// 	       $data = array('englishResult' => array('user_id' => $userId,'title_no' => $dbid,'level' => $level, 'answer' => $answer,'question' => $question,'result' => $result,'act_no' =>$actNo,'current_date' => $date, 'retry_flg'=> $retryFlg));
// 	       $fields = array('user_id','title_no','level','answer','question','result','act_no','current_date','retry_flg');
// 	       $this->englishResult->create(false);
// 	       $registQuery = $this->englishResult->save($data,false,$fields);
// 	     }
//       }
// 		}
// //var_dump($count);	 
	 
	
     
     //問題数
 //     $countAllQestion = $count;
                        
	  //結果一覧取得
//	  $resultAll = $this->englishResult->find('all',array(
//                         'fields' => array('answer','result','question','current_date','title_no','act_no'),
//                         'conditions'=>array('user_id'=>$userId,'act_no'=>$actNo)
//	                     ));

$level = $_GET['level'];  
$userId = $this ->Session-> read('userId');
// 		 //活動回数のカウント
	  $actNo = $this->englishResult->find('first',array(
             'fields' => array('act_no'),
             'order' => array('act_no' => 'desc'),
             'conditions'=>array('user_id'=>$userId)
             )); 
      $actNo = $actNo["englishResult"]["act_no"];

$countAllQestion =   $this->englishTest->find('count',array(
		     'conditions'=>array('status'=>0,'level'=>$level)
		     ));


                
      
      $sql = "select answer, result, question, title, explanation
       from english_results 
       inner join english_tests 
       on english_tests.id = english_results.title_no 
       where 
       english_results.user_id = '".$userId."' 
       and english_results.act_no = '".$actNo."';";

             
	   $resultAll = $this->englishResult->query($sql);
      
      
      //正解の数
      $correctAnswer = $this->englishResult->find('count',array(
	    'conditions' => array('user_id'=>$userId,'result'=> 1,'act_no' =>$actNo)
	  ));
//var_dump($resultAll); 

        //正答率
	  if($correctAnswer == 0){
	     $message = "";
	     $this->set('percentage',0);
	  }else{
	    $percentage = ($correctAnswer/$countAllQestion)*100;
	    $percentage =(int)$percentage;
	    $this->set('percentage',$percentage);
	  }
	
	  //メッセージの設定
	  if(isset($percentage) && $percentage !== 0){
        if(0 <= $percentage && $percentage <50 ){
         $message = "";
        }elseif(50 <= $percentage && $percentage <65){
         $message = "";
        }else{
         $message = "";
        }
      } 
			$message = "";

	//var_dump($level);
	$this->set('correctAnswer',$correctAnswer);
    $this->set('countAllQestion',$countAllQestion);
    $this->set('message',$message);
    $this->set('resultAll',$resultAll);
    $this->set('level',$level);
	
   }
   
   	function retry(){

$count = $this ->Session-> read('retrycount');
//var_dump($count);
     
$level = $_GET['level'];  
$userId = $this ->Session-> read('userId');
// // 		 //活動回数のカウント
	$actNo = $this->englishResult->find('first',array(
             'fields' => array('act_no'),
             'order' => array('act_no' => 'desc'),
             'conditions'=>array('user_id'=>$userId)
             )); 
  $actNo = $actNo["englishResult"]["act_no"];

// $countAllQestion =   $this->englishTest->find('count',array(
// 		     'conditions'=>array('status'=>0,'level'=>$level)
// 		     ));
                        
	  //結果一覧取得
//	  $resultAll = $this->englishResult->find('all',array(
//                         'fields' => array('answer','result','question','current_date'),
//                         'conditions'=>array('user_id'=>$userId,'act_no'=>$actNo)
//	                     ));

      $sql = "select answer, result, question, title, explanation
       from english_results 
       inner join english_tests 
       on english_tests.id = english_results.title_no 
       where 
       english_results.user_id = '".$userId."' 
       and english_results.act_no = '".$actNo."';";

             
	     $resultAll = $this->englishResult->query($sql);
                        
      //正解の数
      $correctAnswer = $this->englishResult->find('count',array(
	    'conditions' => array('user_id'=>$userId,'result'=> 1,'act_no' =>$actNo)
	  ));
//var_dump($resultAll); 

        //正答率
	  if($correctAnswer == 0){
	     $message = "";
	     $this->set('percentage',0);
	  }else{
	    $percentage = ($correctAnswer/$count)*100;
	      $percentage =(int)$percentage;
	    $this->set('percentage',$percentage);
	  }
	
	  //メッセージの設定
	  if(isset($percentage) && $percentage !== 0){
        if(0 <= $percentage && $percentage <50 ){
         $message = "";
        }elseif(50 <= $percentage && $percentage <65){
         $message = "";
        }else{
         $message = "";
        }
      }
	
			$message = "";
	
  	$this->set('correctAnswer',$correctAnswer);
    //$this->set('countAllQestion',$countAllQestion);
    $this->set('message',$message);
    $this->set('resultAll',$resultAll);
    $this->set('count',$count);
    $this->set('level',$level);
	
   }
   
   
   
 }