<?php
include ("admin/connect.php");
include ("admin/session.php");

$data_array =  array(
    "userid" => $_SESSION['userid'],
    "question" => $_POST['question'],
    "description" => $_POST['description'],
    "option1" => $_POST['option1'],
    "option2" => $_POST['option2'],
    "option3" => $_POST['option3'],
    "option4" => $_POST['option4'],
    "is_correct" => $_POST['correct'],
    "level" => $_POST['level'],
    "model" => $_POST['model'],
    "source" => $_POST['source'],
    "category" => $_POST['category'],
    "course_type" => $_POST['course_type'],
    "course" => $_POST['course'],
    "type" => $_POST['type'],
    "subject" => $_POST['subject'],
    "concept" => $_POST['concept'],
    "topic" => $_POST['topic']
);
    $make_call = callAPI1('POST', 'addquestion', $data_array,null);
    $response = json_decode($make_call, true);
    print_r($response);
    if($response['message']){
        echo "<script>alert('".$response['message']."')
        window.location.href='addquestion.php';
        </script>";
    }  

?>