<?php
    namespace Seip;
    use PDO;

    class Users
    {
        public $id = null;
        public $title = null;
        
        public $conn = null;
        
        public function __construct()
        {
            //Connection to database
            $servername = "localhost";
            $username = "root";
            $password = "";
            
            $this->conn = new PDO("mysql:host=$servername;dbname=php_project",$username,$password);
            //set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }

        public function index()
        {    
            $query = "SELECT * FROM `users` WHERE status=1";
            
            $stmt = $this->conn->prepare($query);
            $result = $stmt->execute();

            $_users = $stmt->fetchAll();

            return $_users;
        }

        public function index2()
        {
            $query = "SELECT * FROM `users` WHERE status=0 AND is_rejected=0";
            
            $stmt = $this->conn->prepare($query);
            $result = $stmt->execute();

            $_users = $stmt->fetchAll();

            return $_users;
        }

        public function reject_index()
        {
            $query = "SELECT * FROM `users` WHERE is_rejected=1";
            
            $stmt = $this->conn->prepare($query);
            $result = $stmt->execute();

            $_users = $stmt->fetchAll();

            return $_users;
        }

        public function getActiveUsers()
        {
            //Connection to database
            $_startfrom = 0;
            $_total = 3;

            $query = "SELECT * FROM `users` WHERE is_active=1 LIMIT $_startfrom$_total";
             
            $stmt = $this->conn->prepare($query);
            $result = $stmt->execute();
 
            $users = $stmt->fetchAll();
 
            return $users;
        }
     
        public function store()
        {
            $webroot = "http://localhost/php_project/";
            $_user_name = $_POST['name'];
            $_email = $_POST['email'];
            $_password = $_POST['password'];
            $_confirm_password = $_POST['confirm_password'];
            $query = "INSERT INTO `users` (`name`,`email`,`password`,`confirm_password`)
                        VALUES (:name,:email,:password,:confirm_password)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':name',$_user_name);
            $stmt->bindParam(':email',$_email);
            $stmt->bindParam(':password',$_password);
            $stmt->bindParam(':confirm_password',$_confirm_password);
            $result = $stmt->execute();
            if($result)
            {
                $_SESSION['message'] = "User is added successfully";
            }
            else
            {
                $_SESSION['message'] = "User is not added";
            }

            header("location:".$webroot."admin/users/index.php");
        }

        public function show(){    
            $_id = $_GET['id'];
            
            $query = "SELECT * FROM `users` WHERE id=:id";
            
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id',$_id);
            $result = $stmt->execute();

            $_user = $stmt->fetch();

            return $_user;
        }

        public function edit()
        {
            $_id = $_GET['id'];
            
            $query = "SELECT * FROM `users` WHERE id=:id";
            
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id',$_id);
            $result = $stmt->execute();
        
            $_user = $stmt->fetch();
        
            return $_user;
        }

        public function update()
        {
            $webroot = "http://localhost/php_project/";
            //Connection to database
            $_id = $_POST['id'];
            $_user_name = $_POST['name'];
            $_email = $_POST['email'];
            $_password = $_POST['password'];
            $_confirm_password = $_POST['confirm_password'];
            //Insert command
            $query = "UPDATE `users` SET `name`=:name,`email`=:email,`password`=:password,`confirm_password`=:confirm_password WHERE `users`.`id`=:id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id',$_id);
            $stmt->bindParam(':name',$_user_name);
            $stmt->bindParam(':email',$_email);
            $stmt->bindParam(':password',$_password);
            $stmt->bindParam(':confirm_password',$_confirm_password);
            $result = $stmt->execute();
            if($result)
            {
                $_SESSION['message'] = "User is updated successfully";
            }
            else
            {
                $_SESSION['message'] = "User is not updated";
            }
            
            header("location:".$webroot."admin/users/index.php");
        }

        public function delete()
        {
            $webroot = "http://localhost/php_project/";
            //Connection to database
            $_id = $_GET['id'];
            //Insert command
            $query = "DELETE FROM `users` WHERE `users`.`id`=:id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id',$_id);
            $result = $stmt->execute();
            if($result)
            {
                $_SESSION['message']="Deleted successfully";
            }
            else
            {
                $_SESSION['message']="Failed to delete";
            }

            header("location:".$webroot."admin/users/index.php");
        }

        public function signUp()
        {
            $webroot = "http://localhost/php_project/";
            $_user_name = $_POST['name'];
            $_email = $_POST['email'];
            $_password = $_POST['password'];
            $_confirm_password = $_POST['confirm_password'];
            if(empty($_user_name) || empty($_email) || empty($_password)
                || empty($_confirm_password))
            {
                $_SESSION['message'] = "All fields are required";
                header("location:".$webroot."public/sign-up.php");
            }
            else
            {
                $queryy = "SELECT COUNT(*) AS total FROM `users` WHERE 
                email LIKE :email";
                $stmtt = $this->conn->prepare($queryy);
                $stmtt->bindParam(':email',$_email);
                $stmtt->execute();
                $total_found = $stmtt->fetch();
                if($total_found['total']==0)
                {
                    if(strcmp($_password,$_confirm_password)!=0)
                    {
                        $_SESSION['message'] = "password don't match";
                        header("location:".$webroot."public/sign-up.php");
                    }
                    else
                    {
                        $query = "INSERT INTO `users` (`name`,`email`,`password`,`confirm_password`)
                                VALUES (:name,:email,:password,:confirm_password)";
                        $stmt = $this->conn->prepare($query);
                        $stmt->bindParam(':name',$_user_name);
                        $stmt->bindParam(':email',$_email);
                        $stmt->bindParam(':password',$_password);
                        $stmt->bindParam(':confirm_password',$_confirm_password);
                        $result = $stmt->execute();
                        if($result)
                        {
                            $_SESSION['message'] = "sign-up is completed successfully";
                        }
                        else
                        {
                            $_SESSION['message'] = "Failed to sign-up";
                        }

                        header("location:".$webroot."public/login.php");
                    }
                }
                else
                {
                    $_SESSION['message'] = "Email is already exist";
                    header("location:".$webroot."public/sign-up.php");
                }
            }
        }

        public function login($email,$password)
        {
            $webroot = "http://localhost/php_project/";
            $query = "SELECT COUNT(*) AS total FROM `users` WHERE 
            email LIKE :email AND password LIKE :password AND status=1";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':email',$email);
            $stmt->bindParam(':password',$password);
            $stmt->execute();
            $total_found = $stmt->fetch();
            if($total_found['total']!=0)
            {
                $_SESSION['is_authenticated'] = true;
                header("location:".$webroot."admin/dashboard.php");
            }
            else
            {
                $_SESSION['is_authenticated'] = false;
                header("location:".$webroot."404.php");
            }
        }

        public function accept()
        {
            $webroot = "http://localhost/php_project/";
            $_id = $_GET['id'];
            $_status = 1;

            $query = "UPDATE `users` SET `status`=:status WHERE `users`.id=:id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id',$_id);
            $stmt->bindParam(':status',$_status);
            $result = $stmt->execute();
            if($result)
            {
                $_SESSION['message'] = "Accepted Successfully";
            }
            else
            {
                $_SESSION['message'] = "Failed to accept";
            }

            header("location:".$webroot."admin/users/index2.php");
        }

        public function reject()
        {
            $webroot = "http://localhost/php_project/";
            $_id = $_GET['id'];
            $_is_rejected = 1;

            $query = "UPDATE `users` SET `is_rejected`=:is_rejected WHERE `users`.id=:id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id',$_id);
            $stmt->bindParam(':is_rejected',$_is_rejected);
            $result = $stmt->execute();
            if($result)
            {
                $_SESSION['message'] = "Rejected Successfully";
            }
            else
            {
                $_SESSION['message'] = "Failed to reject";
            }

            header("location:".$webroot."admin/users/reject_index.php");
        }
    }
?>
