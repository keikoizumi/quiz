<?php

class RecordController extends AppController{

public $name = 'Record';
    var $uses = array('englishTest','englishResult','userInfo');
    
  public function beforeFilter() {
     $userId = $this -> Session-> read('userId');
      if(isset($userId)){
        $this->set('userId',$userId);

      }else{
       $this->redirect(URL.'/login');
     }
  }
    
  function before_record(){
    $userId = $this->Session->read('userId'); 
   $retry = "";
   
   $categorys = $this->englishTest->find('all',array(
             'fields' => array('DISTINCT level'),
             'conditions'=>array('status'=>0
             //                   ,'user_id'=>$userId
                                )
             )); 
    
    $this->set('categorys',$categorys);

	  // if($retry == 1){
	  //   $this->set('retry',$retry);
	  // }else{
	  //   $this->set('retry',"");
	  // }
	  
	 if(!$userId){	
	    $this->redirect(URL.'/login');
	  }
             
     $this->set('userId',$userId);
    
  }

	function index(){
	//成績グラフの作成
	
	   $messageBad = '';
     $messageGood = '';
     $messageGreat = '';
	
     $userId = $this -> Session-> read('userId');
	 $this->set('userId',$userId);

      $selectCategory = $_GET['level'];
//var_dump($selectCategory);
			 $count = count($selectCategory);
			 $this->count = $count;
	 
//      // $actNo = count($actNo);

     //日付の取得
    if (!empty($_GET['startDate']) && isset($_GET['startDate'])) {

      $startDate = $_GET['startDate'];

    }else{
	  $current_date = $this->englishResult->find('all',array(
             'fields' => array('DISTINCT current_date '),
             'conditions'=>array('user_id'=>$userId, 'level' => $selectCategory),
             'order'=>array('current_date DESC')
             ));  
        // var_dump($current_date);  
            
        $startDate = $current_date[0]["englishResult"]["current_date"];
        
        }

        $endDate = date('Y-m-d', strtotime('-7 day'));
        $diff = (strtotime($startDate) - strtotime($endDate)) / ( 60 * 60 * 24);
         for($i = 0; $i <= $diff; $i++) {
              $period[] = date('Y-m-d', strtotime($startDate . '-' . $i . 'days'));
              //$period = ksort($period);
              $emptyData = false;
          $this->set('emptyData',$emptyData);
         }
         if(empty($period)){
          $emptyData = true;
          $this->set('emptyData',$emptyData);
         }
             //var_dump($period);  
     //日にち別の活動回数
     $getDate = array(); 
     for($i = 0;$i < count($period); $i++ ){
     $getDate[] = $this->englishResult->find('count',array(
      'conditions'=>array('user_id'=>$userId,'level' => $selectCategory,
      'or' => array(
        'current_date' => $period[$i],
        'retry_date' => $period[$i],
        ),
      ),
      ));  
    }

   

    //日にち別正解率
    $getQdate = "";
    $getAdate = "";
    $getP = array();
    for($i = 0;$i < count($period); $i++ ){
      $getQdate = $this->englishResult->find('count',array(
       'conditions'=>array('user_id'=>$userId,'level' => $selectCategory,
       'or' => array(
         'current_date' => $period[$i],
         'retry_date' => $period[$i],
         ),
       ),
       ));  
       if($getQdate == 0){
        $getQdate = 1;
       }
       $getAdate = $this->englishResult->find('count',array(
        'conditions'=>array('user_id'=>$userId,'level' => $selectCategory,'result'=>1,
        'or' => array(
          'current_date' => $period[$i],
          'retry_date' => $period[$i],
          ),
        ),
        ));  
        //var_dump($getAdate);
        $getP[] = $getAdate/$getQdate*100;
     }

    //var_dump($getP);
    $nextStartDate = date('Y-m-d', strtotime($startDate . '+' . 7 . 'days'));
    $nextEndDate = date('Y-m-d', strtotime($startDate . '-' . 7 . 'days'));


$sql = "select DISTINCT english_results.title_no, english_results.answer, english_results.result, 
       english_results.question, english_tests.title, english_tests.level, english_results.current_date,
       english_results.act_no,english_results.retry_date
       from english_results 
       inner join english_tests 
       on english_tests.id = english_results.title_no 
       where 
       english_results.user_id = '".$userId."'
       and english_tests.status = '0'
       and english_tests.level = '".$selectCategory."'
       ORDER BY english_results.current_date DESC";
       
       $resultAll = $this->englishResult->query($sql);

// var_dump($resultAll);  
//var_dump($selectCategory);  
     $countAllQestion = count($resultAll);
     $actNo = $countAllQestion;
     $sql = "select DISTINCT english_results.title_no, english_results.answer, english_results.result, english_results.question, english_tests.title, english_tests.level, english_results.current_date, english_results.act_no
       from english_results 
       inner join english_tests 
       on english_tests.id = english_results.title_no 
       where 
       english_results.user_id = '".$userId."'
       and english_results.result = '1'
       and english_tests.status = '0'
       and english_tests.level = '".$selectCategory."'
       ORDER BY english_results.current_date DESC";

             
     $correctAnswer = $this->englishResult->query($sql);
     $countCorrectAnswer = count($correctAnswer);
//var_dump($countAllQestion);	
	  
	  //正答率
	  if($countAllQestion == 0){
	     $message = "解答した問題がありません";
	     $this->set('percentage',0);
	  }else{
	    $percentage = ($countCorrectAnswer/$countAllQestion)*100;
	    $percentage =(int)$percentage;
	    $this->set('percentage',$percentage);
	  }
	  
	  //結果一覧取得

	  //メッセージの設定
	  if(isset($percentage) && $percentage !== 0){
        if(0 <= $percentage && $percentage <50 ){
         $message = $messageBad;
        }elseif(50 <= $percentage && $percentage <65){
         $message = $messageGood;
        }else{
         $message = $messageGreat;
        }
      }
      $message = "";
      $this->set('correctAnswer',$countCorrectAnswer);
      $this->set('countAllQestion',$countAllQestion);
      $this->set('message',$message);
      $this->set('resultAll',$resultAll);
      $this->set('userId',$userId);
      $this->set('actNo',$actNo);
      $this->set('count',$count);
      $this->set('selectCategory',$selectCategory);
      $this->set('period',$period);
      $this->set('getDate',$getDate);
      $this->set('getP',$getP);
      $this->set('startDate',$startDate);
      $this->set('endDate',$endDate);
      $this->set('nextStartDate',$nextStartDate);
      $this->set('nextEndDate',$nextEndDate);
      
      
      
	}

}
?>
