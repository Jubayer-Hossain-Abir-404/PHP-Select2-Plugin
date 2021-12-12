<?php
    session_start();
    $con = mysqli_connect('localhost', 'root', '', 'select2_plugin');



    if(isset($_POST['update_hobbies'])){
        $user_id = $_POST['user_id'];
        $hobbies_input = $_POST['hobbies'];

        
        //$user_id = $_GET['user_id'];
        $fetchquery = "SELECT * FROM user_hobbylist WHERE user_id='$user_id' ";

        $fetchquery_run = mysqli_query($con, $fetchquery);
        $userHobbies = [];
        foreach($fetchquery_run as $fetchrow){
            $userHobbies[] = $fetchrow['hobby_list_id'];
        }

        // Insert Newly added data

        foreach($hobbies_input as $inputValues){
            if(!in_array($inputValues, $userHobbies)){
                $insert_query = "INSERT INTO user_hobbylist (user_id,hobby_list_id) VALUES 
                ('$user_id', '$inputValues')";
                $insert_query_run = mysqli_query($con, $insert_query);
            }
        }


        //Delete added user data

        foreach($userHobbies as $fetchedRow){
            if(!in_array($fetchedRow, $hobbies_input)){
                $delete_query = "DELETE FROM user_hobbylist WHERE user_id='$user_id' AND hobby_list_id = '$fetchedRow' ";
                $delete_query_run = mysqli_query($con, $delete_query);
            }
        }

        $_SESSION['status'] ="Updated Successfully";
        header("Location: select-option-edit.php?user_id=$user_id");
        exit();
        
    }


    if(isset($_POST['save_hobbies'])){
        $user_id = $_POST['user_id'];
        $hobbies = $_POST['hobbies'];

        foreach($hobbies as $hobbylist){
            $query = "INSERT INTO user_hobbylist (user_id, hobby_list_id) VALUES ('$user_id', '$hobbylist')";
            $query_run = mysqli_query($con, $query);
        }

        if($query_run){
            $_SESSION['status'] = "Hobbies Inserted Successfully";
            header("Location: select-box-with-search.php");
            exit(0);
        }
        else{
            $_SESSION['status'] = "Hobbies Not Inserted Successfully";
            header("Location: select-box-with-search.php");
            exit(0);
        }
    }


?>