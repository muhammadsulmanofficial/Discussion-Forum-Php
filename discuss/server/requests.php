<?php

session_start();

include("../common/db.php");
if(isset($_POST['signup'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];

    $stmt = $conn->prepare("INSERT INTO users
            (username, email, password, address)
            VALUES 
            (?, ?, ?, ?)
            "); 

    $hasedPassword = password_hash($password, PASSWORD_DEFAULT);
    $stmt->bind_param("ssss",$username, $email, $hasedPassword, $address);

    $result = $stmt->execute();
     
    $user_id = $conn->insert_id;
    // echo $user_id;

    if($result){
        // echo "Signup successful";
        $_SESSION['user'] = ["username"=>$username, "email"=>$email, "user_id"=>$user_id];
        header("location: /discuss");
        exit;
    } else {
        echo "Error".$stmt->error;
    }

} else if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $username="";

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? ");
    $stmt->bind_param("s",$email);
    $stmt->execute();

    $user_id = 0;

    $result = $stmt->get_result();

    if($result->num_rows>0){
        $row = $result->fetch_assoc();

        $username = $row['username'];
        $user_id = $row['id'];
        // echo $user_id;


        $_SESSION['user'] = ["username"=>$username, "email"=>$email, "user_id"=>$user_id];

        if(password_verify($password, $row['password'])){
            header("location: /discuss");
            exit;
        } else {
            echo "Wrong password";
        }
    }
} else if(isset($_GET['logout'])){
    session_unset();
    session_destroy();

    header("location: /discuss");
    exit;
} else if(isset($_POST['ask'])){

    // print_r($_SESSION['user']['user_id']);

    $title = $_POST['title'];
    $description = $_POST['description'];
    $category_id = $_POST['category'];
    $user_id = $_SESSION['user']['user_id'];

    $stmt = $conn->prepare("INSERT INTO questions
            (title, description, category_id, user_id)
            VALUES 
            (?, ?, ?, ?)
            ");
    $stmt->bind_param("ssii", $title, $description, $category_id, $user_id);
    $result = $stmt->execute();
    
    if($result){
        header("location: /discuss");
        exit;
    } else {
        echo "Question not added";
    }

} else if(isset($_POST['answer'])){

    // print_r($_POST);
    $answer = $_POST['answer'];
    $question_id = $_POST['question_id'];

    if(!isset($_SESSION['user'])){
        die("User not logged in");
    }

    $user_id = $_SESSION['user']['user_id'];

    $stmt = $conn->prepare("INSERT INTO answers 
            (answer, question_id, user_id)
            VALUES
            (?, ?, ?)
    ");
    $stmt->bind_param("sii", $answer, $question_id, $user_id);
    $result = $stmt->execute();


    if($result) {
        header("location: /discuss?question_id=$question_id");
        exit;
    } else {
        echo "Answer is not submitted";
    }
} else if(isset($_GET['delete'])){
    $deleteId = $_GET['delete'];
    $stmt = $conn->prepare("DELETE FROM questions WHERE id = ? ");
    $stmt->bind_param("i", $deleteId);
    $result = $stmt->execute();

    if($result){
        header("location: /discuss");
        exit;
    } else {
        echo "question not deleted";
    }
}

?>


