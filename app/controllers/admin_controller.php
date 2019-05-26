<?php

	class AdminController extends AppController{

    public $name = 'Admin';
		var $uses = array('englishTest','englishResult','userInfo');
		public $count;


  public function beforeFilter() {
     $userId = $this -> Session-> read('userId');
      if(isset($userId)){
        $this->set('userId',$userId);

      }else{
       $this->redirect(URL.'/login');
     }
	}


	function index(){
	     $userId = $this->Session->read('userId');
	     $this->set('userId',$userId);
	     
	     //全問題取得
	     $selectAllQestion =   $this->englishTest->find('all' ,array(
	       'conditions'=>array('status'=>0,
	     	                //  'user_id'=> $userId 
	     )
	     ));
//var_dump($selectAllQestion);
	     if(!$selectAllQestion){
	      $displayFlag = 0;
	      $message = "No Data!!";
	      $this->set('displayFlag',$displayFlag);
	      $this->set('message',$message);
	     }else{
	      $displayFlag = 1;
	      $this->set('displayFlag',$displayFlag);
	     }
	     $countAllQestion = count($selectAllQestion);
//var_dump($countAllQestion);
	     $this->set('selectAllQestion',$selectAllQestion);
	     $this->set('countAllQestion',$countAllQestion);
	}
	






	function create(){
       $userId = $this->Session->read('userId');
	     $this->set('userId',$userId);

			 $selectCategory = $this->englishTest->find('all',array(
             'fields' => array('DISTINCT level'),
             'conditions'=>array('status'=>0)
						 ));
			 $count = count($selectCategory);
			 $this->count = $count;

			 if($count <= 5){
				 $msg="";
				 $this->set('count',$count);
				 $this->set('msg',$msg);
				 $this->set('selectCategory',$selectCategory);
			 }else{
				 $msg="カテゴリーの最大登録数を超えています";
				 $this->set('msg',$msg);
			 }						 
       
	    return $msg;
	}


	
function update(){
	 
	 $userId = $this->Session->read('userId');
//var_dump($userId); 
	  
    $id = $_GET['id'];   

     $data =   $this->englishTest->find('all' ,array(
	     'conditions'=>array('id'=>$id)
			 ));
			 

			 
	     
   $msg = $this->create();

   $this->set('msg',$msg);
	 $this->set('data',$data);
	 $this->set('id',$id);
	 $this->set('userId',$userId);
	
	}


		function update_post(){
	
	 $id = $_GET['id'];

	  $userId = $this->Session->read('userId');
	  $this->set('userId',$userId);
	  
	  $q1 = $_POST['q1'];
	  $q2 = $_POST['q2'];
	  $q3 = $_POST['q3'];
	  $q4 = $_POST['q4'];
		$title = $_POST['title'];
		//var_dump($title); 
	  $explanation =$_POST['explanation'];
	  $category =$_POST['category'];
    //var_dump($level);
	  $date = date("Y-m-d");
	  $status = 0;

    $selectCategory = $this->englishTest->find('all',array(
             'fields' => array('DISTINCT level'),
             'conditions'=>array('status'=>0,
							                  'user_id'=>$userId)
						 ));
		$count = count($selectCategory);
	  //var_dump($count);	 
    //サニタイジング
    $q1 = htmlspecialchars($q1);
	  $q2 = htmlspecialchars($q2);
	  $q3 = htmlspecialchars($q3);
	  $q4 = htmlspecialchars($q4);
		$title = htmlspecialchars($title);
		$explanation = htmlspecialchars($explanation);
		$category = htmlspecialchars($category);

		if($count < 6){
       //insert
	     $data = array('englishTest' => array(
				  'id' => $id,
	        'user_id' => $userId,
	        'q1' => $q1,
	        'q2' => $q2,
	        'q3' => $q3,
	        'q4' => $q4,
	        'title' => $title, 
	        'explanation' => $explanation, 
	        'level' => $category,
	        'status' => $status,
	        'user_id'  => $userId,
	        'current_date' => $date)
	      );
	     
	     $fields = array('id','user_id','q1','q2','q3','q4','title','explanation','explanation','level','status','user_id','current_date');
	     $registQuery = $this->englishTest->save($data,false,$fields);
	     
			}else{
				$this->log('"over 5 category"','error');
				$registQuery = false;
			}
//var_dump($registQuery);    
	     if($registQuery){
				 $this->log('success','error');
				 $this->redirect(URL.'/admin');
	     }else{
	       $this->log('Failure','error');
	     }
	 }




	function regist(){
	  $userId = $this->Session->read('userId');
	  $this->set('userId',$userId);
	  
	  $q1 = $_POST['q1'];
	  $q2 = $_POST['q2'];
	  $q3 = $_POST['q3'];
	  $q4 = $_POST['q4'];
		$title = $_POST['title'];
			//var_dump($title); 
	  $explanation =$_POST['explanation'];
	  $category =$_POST['category'];
//var_dump($level);
	  $date = date("Y-m-d");
	  $status = 0;

    $selectCategory = $this->englishTest->find('all',array(
             'fields' => array('DISTINCT level'),
             'conditions'=>array('status'=>0,
							                  'user_id'=>$userId)
						 ));
			 $count = count($selectCategory);
	//var_dump($count);	 

    //サニタイジング
    
    $q1 = htmlspecialchars($q1);
	  $q2 = htmlspecialchars($q2);
	  $q3 = htmlspecialchars($q3);
	  $q4 = htmlspecialchars($q4);
		$title = htmlspecialchars($title);
		$explanation = htmlspecialchars($explanation);
		$category = htmlspecialchars($category);

		if($count < 6){
         //insert
	     $data = array('englishTest' => array(
	        'user_id' => $userId,
	        'q1' => $q1,
	        'q2' => $q2,
	        'q3' => $q3,
	        'q4' => $q4,
	        'title' => $title, 
	        'explanation' => $explanation, 
	        'level' => $category,
	        'status' => $status,
	        'user_id'  => $userId,
	        'current_date' => $date)
	      );
	     
	     $fields = array('user_id','q1','q2','q3','q4','title','explanation','explanation','level','status','user_id','current_date');
	     $registQuery = $this->englishTest->save($data,false,$fields);
	     
			}else{
				$this->log('"over 5 category"','error');
				$registQuery = false;
			}
//var_dump($registQuery);    
	     if($registQuery){
				 $this->log('success','error');
				 $this->redirect(URL.'/admin');
	     }else{
	       $this->log('Failure','error');
	     }
	}







	
	function delete(){
	
	 $id = $_GET['id'];

	//  $del = $this->englishTest->save(array('englishTest.id' => $id), false);
	//  $status = 1;
	 
	//  $data = array('englishTest' => array('id' => $id,'status' => $status));
	//      $fields = array('id','status');
	//      $registQuery = $this->englishTest->save($data,false,$fields);
	$del = $this->englishTest->delete(array('id' => $id), false);  
	 
	 if($del){
	  $this->redirect(URL.'/admin');
	 }
	 
	}
	








	function user(){


	 $userAll = $this->userInfo->findAll();
	 $this->set('userAll',$userAll);

//var_dump($userAll);	
	 
	}






	
	function userDel(){

	 $userId = $_POST['userId'];
	 $Id = $_POST['Id'];
	
	 //POST送信があるなら処理開始
	 if(isset($userId) && isset($Id)){
			 $userDel = $this->userInfo->deleteAll(array('id' => $Id));
			 $resultDel = $this->englishResult->deleteAll(array('user_id' => $userId));
      //  $data = array('englishTest' => array('user_id' => $userId,'status'=>0));
	    //  $fields = array('user_id','status');
			 $registQuery = $this->englishTest->deleteAll(array('user_id' => $userId));  
			 $_SESSION = array();
	       session_destroy();
	 }else{
		 $this->log('POST Failure','error');
		 echo "userDel Failure";
	 }

   if($userDel == true && $registQuery == true && $resultDel == true){
	  $this->redirect(URL.'/admin/user');
	 }else{
	       echo "userDel Failure";
				 $this->log('userDel Failure','error');
				 $this->redirect(URL.'/admin/user');
	 }

	}




	function cate(){
       $userId = $this->Session->read('userId');
	     $this->set('userId',$userId);

			 $selectCategory = $this->englishTest->find('all',array(
             'fields' => array('DISTINCT level'),
             'conditions'=>array('status'=>0)
			));
			 $count = count($selectCategory);
			 //var_dump($selectCategory);
				 $msg="";
				 $this->set('count',$count);
				 $this->set('msg',$msg);	
				 $this->set('selectCategory',$selectCategory);
				 $this->set('msg',$msg);				 
       
	}

	function editCate(){
		$level = $GET_['level'];
		$data = array('englishTest' => array('level' => $level));
	      $fields = array('level');
				$registQuery = $this->englishTest->save($data,false,$fields);
				
			$this->redirect(URL.'/admin/cate');
      exit;				 
}

	function delCate(){
		$level = $GET_['level'];
		$userId = $this->Session->read('userId');
		$this->set('userId',$userId);

		$selectCategory = $this->englishTest->find('all',array(
					'fields' => array('DISTINCT level'),
					'conditions'=>array('status'=>0)
	 ));
		$count = count($selectCategory);

		$this->redirect(URL.'/admin/cate');

			$msg="";
			$this->set('count',$count);
			$this->set('msg',$msg);
			$this->set('selectCategory',$selectCategory);
			$this->set('msg',$msg);				 
		
}
	
 }

