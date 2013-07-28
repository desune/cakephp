<?php
class BooksController extends AppController{
	var $name = "Books";


	// //--------phan trang--------

	var $helpers = array('Paginator','Html');
	var $components = array('Session');
	var $paginate = array();

    //------- Paging Normal 
	function paging(){
		$this->paginate = array(
			'limit' => 4,
			'order' => array('title' => 'desc'),
			);
		$data = $this->paginate("Book");
		$this->set("data",$data);
	}

    //-------- index()
	function index(){
		$this->render("/pages/home");
	}

//----MongoDB-----
	function exam01(){
		$results = $this->Book->find('all');
		$this->set(compact('results'));
	}

	function exam02(){
		$params = array(
			'fields' => array('title'),
			'conditions' => array('isbn' => 'php'),
			//'conditions' => array('hoge' => array('$gt' => '10', '$lt' => '34')),
			//'order' => array('title' => 1, 'body' => 1),
			'order' => array('_id' => -1),
			'limit' => 35,
			'page' => 1,
			);
		$results = $this->Book->find('all', $params);
		//$result = $this->Post->find('count', $params);
		$this->set(compact('results'));
	}

//------MySql-----
	// function exam01(){
	// 	$data = $this->Book->find("all"); //gọi Model Book và lấy tất cả về dạng mảng
	// 	$this->set("data", $data); //gán giá trị vào biến data để hiển thị tương ứng.
	// }	

	// function exam02(){
	// 	$sql = array(
	// 		"conditions"=> array(
	// 			"title LIKE"=> "PHP%",
	// 			"id !=" => 4,
	// 			),
	// 		"limit" => "0,2"
	// 		);        
	// 	$data = $this->Book->find("all",$sql);
	// 	$this->set("data",$data);
	// }
	// function exam03(){
	// 	$sql = "Select * From books";
	// 	$data = $this->Book->query($sql);
	// 	$this->set("data",$data); 
	// }  

}