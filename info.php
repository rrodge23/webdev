<?php
    $classInfo = new Info();
    $infoList = $classInfo->getAllInfo();
    if(isset($_POST['method'])){
        if($_POST['method'] == "add"){
            $classInfoAdd = new Info();
            $addInfoResult = $classInfoAdd->addInfo($_POST);
            echo json_encode($addInfoResult);
        }

        if($_POST['method'] == "update"){
            $classInfoUpdate = new Info();
            $updateInfoResult = $classInfoUpdate->updateInfo($_POST);
            echo json_encode($updateInfoResult);
        }

        if($_POST['method'] == "view"){
            $classInfoView = new Info();
            $viewInfoResult = $classInfoView->getInfoById($_POST['id']);
            echo json_encode($viewInfoResult);
        }
    }

    // ->>>>>>> CLASSES


    /**** 
    *   DATABASE
    */
    class database{

        var $conn;

        function __construct(){
            
            $this->conn = new mysqli("localhost","root","","webdev");

			if($this->conn->connect_error)
			{
				die("error: ". $this->conn->connect_error());
			}
        }
    }

    /**** 
    *   INFO
    */
    class Info extends database{

        public function getAllInfo(){
            
			$con = $this->conn;

            $sql = "SELECT * FROM tbl_info";
            $result = $con->query($sql);
            $con->close();
            
			if($result->num_rows > 0)
			{
				return $result;
			}
			return false;
            
        }

        public function getInfoById($data=NULL){
            
			$con = $this->conn;
			$result = $con->query("SELECT * FROM tbl_info WHERE id LIKE '{$data}'");
			$con->close();
			if($result->num_rows > 0)
			{
				$result = $result->fetch_assoc();
				return $result;
			}
			return false;
		}

        public function addInfo($data=NULL){

            $con = $this->conn;

            $sql = "SELECT * FROM tbl_info WHERE email LIKE '".$data['email']."'";
            $result = $con->query($sql);
            
            if($result->num_rows > 0){
                return false;
            }

            $sql = "INSERT INTO tbl_info(firstname,lastname,email) VALUES('{$data['firstname']}','{$data['lastname']}','{$data['email']}')";
            $result = $con->query($sql);

            if($result){
                $last_insert = $con->insert_id;
                $html = '    <tr>
                                <th scope="row">'.$last_insert.'</th>
                                <td>'.$data['firstname'].'</td>
                                <td>'.$data['lastname'].'</td>
                                <td class="email-list" data-id="'.$last_insert.'">'.$data["email"].'</td>
                            </tr>';
                return $html;
            }else{
                return false;
            }
        }

       

        public function updateInfo($data=NULL){
            $con = $this->conn;
            
            $sql = "SELECT * FROM tbl_info WHERE id NOT LIKE '{$data['id']}' AND email LIKE '{$data['email']}'";
            $result = $con->query($sql);
            if($result->num_rows > 0){
                return false;
            }
            
            $sql = "UPDATE tbl_info SET firstname='{$data['firstname']}',
                                        lastname='{$data['lastname']}',
                                        email='{$data['email']}' 
                                        WHERE id LIKE '{$data['id']}'";
            if($result = $con->query($sql)){
                $html = '    <tr>
                                <th scope="row">'.$data['id'].'</th>
                                <td>'.$data['firstname'].'</td>
                                <td>'.$data['lastname'].'</td>
                                <td class="email-list" data-id="'.$data['id'].'">'.$data["email"].'</td>
                            </tr>';
                return $html;
            }else{
                return false;
            }
            
        }
    }
?>