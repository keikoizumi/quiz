<?php

class TopController extends AppController{

public $name = 'Top';
    var $uses = null;
    
  public function beforeFilter() {
     $userId = $this -> Session-> read('userId');
      if(isset($userId)){
        $this->set('userId',$userId);

      }else{
       $this->redirect(URL.'/login');
     }
  }
    
 function index(){
     
    }
    
 }
 

