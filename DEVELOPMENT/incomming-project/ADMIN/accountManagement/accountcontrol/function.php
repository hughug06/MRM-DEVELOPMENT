;<?php 

require '../../Database/database.php';

//NEED TO FIX
/*function checkparamId($paramtype){

    if(isset($P_POST[$paramtype])){
        if($_POST[$paramtype] != null){
            return $_POST[$paramtype];
        }
        else{
            return 'no id given'; //error message 
        }
    } 
    else{
        return 'no id'; //error message
    }
    }*/

//HOLD USER ID WHEN ADMIN CLICK EDIT BUTTON


//EDIT USER



 
  



/*function getById($tableName , $Id){
    global $conn;
    $table = $tableName;
    $id = $Id;

    $sql = "Select * from $table where Id='$id' LIMIT 1";
    $result = mysqli_query($conn , $sql);

    if($result){
        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_array($result , MYSQLI_ASSOC);
            $response = [
                'status' => 200,
                'message' => 'Success',
                'data' => $row
            ];
            return $response;
        }
        else{
            $response = [
                'status' => 404,
                'message' => 'No Data Record'
            ];
            return $response;
        }
    }
    else{
        $response = [
            'status' => 500,
            'message' => 'Something went wrong'
        ];
        return $response;
    }
}*/



//ADD USER
if(isset($_POST['saveuser']))
{
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $ban = $_POST['is_ban'] == true ? 1:0;
 
    if($fullname != '' || $username != '' || $password != '' || $email != ''){
            $sql_insert = "insert into users (name,username,email,password,is_ban,role) 
                            VALUES ('$fullname' , '$username' , '$email' , '$password', ' $ban'  , '$role')";
            if (mysqli_query($conn, $sql_insert)) {
                echo "New record created successfully";
                header('location: user-management.php');
                exit();
              } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
              }
    }
    else{
        //ERROR MESSAGE
    }
}



?>