<?php 
class UsersController extends AppController{ 
    var $name = "Users"; 
    var $layout = false; // Không sử dụng Layout mặc định của CakePHP , dùng file CSS riêng 
    var $helpers = array("Html"); 
    var $component = array("Session");      
    var $_sessionUsername  = "Username"; // tên Session được qui định trước 
     
     
    //---------- View 
    function view(){ 
        if(!$this->Session->read($this->_sessionUsername)) // đọc Session xem có tồn tại không 
            $this->redirect("login"); 
        else 
            $this->render("/users/index"); // load 1 file view index.ctp trong thư mục “views/demos/users”/ 
    } 
     
    //--------- Login 
    function login(){ 
      $error="";// thong bao loi 
        if($this->Session->read($this->_sessionUsername)) 
            $this->redirect("view"); 

        if(isset($_POST['ok'])){ 
           $username = $_POST['username']; 
           $password = $_POST['password'];  
           if($this->User->checkLogin($username,$password)){ 
                $this->Session->write($this->_sessionUsername,$username); 
                $this->redirect("view"); 
            }else{ 
                $error = "Username or Password wrong"; 
           } 
        } 
        $this->set("error",$error); 
        $this->render("/users/login"); 
    } 
    //---------- Logout 
    function logout(){ 
        $this->Session->delete($this->_sessionUsername); 
        $this->redirect("login"); 
    } 

    //-------- index()
    function index(){
        $this->render("/pages/home");
    }
}