<?php

function db_get_task_data() {
    require("db_credentials.php");
    // $servername ="localhost";
    // $username ="id20140698_csc4110";
    // $password = "!A123456789a";
    // $database="id20140698_todolist";
    
    $conn = mysqli_connect($servername,$username,$password,$database);
    
    $query = "SELECT task_id,task_desc,task_cat FROM tasks;";
    $result = mysqli_query($conn,$query);
    if (!$result) {
    trigger_error(mysqli_error($conn), E_USER_ERROR);
    }
    $relation = array();
    while ($row = mysqli_fetch_row($result)) {
        $temp = array();
        array_push($temp,$row[0],$row[1],$row[2]);
        array_push($relation,$temp);
    }
    mysqli_close($conn);
    return $relation;
}

function db_get_student_grade_data() {
    require("db_credentials.php");
    //$servername ="localhost";
    //$username ="id17856758_user4710";
    //$password = "";
    //$database="id17856758_csc4710";
    
    $conn = mysqli_connect($servername,$username,$password,$database);
    $query = "SELECT id,fname,lname,exam_num,grade FROM students s JOIN grades g WHERE s.id=g.stu_id;";
    $result = mysqli_query($conn,$query);
    $relation = array();
    while ($row = mysqli_fetch_row($result)) {
        $temp = array();
        array_push($temp,$row[0],$row[1],$row[2],$row[3],$row[4]);
        array_push($relation,$temp);
    }
    mysqli_close($conn);
    return $relation;
}

function db_add_student($fname,$lname) {
    require("db_credentials.php");
    $conn = mysqli_connect($servername,$username,$password,$database);
    $stmt = mysqli_prepare($conn,"INSERT INTO students (fname,lname) VALUES (?,?)");
    mysqli_stmt_bind_param($stmt,"ss",$fname,$lname);
    mysqli_stmt_execute($stmt);
    mysqli_close($conn);
    header("location:students.php");
}

function db_add_grade($student,$examNum,$grade) {
    require("db_credentials.php");
    $conn = mysqli_connect($servername,$username,$password,$database);
    $stmt = mysqli_prepare($conn,"INSERT INTO grades (stu_id,exam_num,grade) VALUES (?,?,?)");
    mysqli_stmt_bind_param($stmt,"iid",$student,$examNum,$grade);
    mysqli_stmt_execute($stmt);
    mysqli_close($conn);
    header("location:grades.php");
}

function db_remove_student($id) {
    require("db_credentials.php");
    $conn = mysqli_connect($servername,$username,$password,$database);
    $stmt = mysqli_prepare($conn,"DELETE FROM students WHERE id=?");
    mysqli_stmt_bind_param($stmt,"i",$id);
    mysqli_stmt_execute($stmt);
    mysqli_close($conn);
    header("location:students.php");
}

function db_add_task($task_desc,$task_due_date, $task_cat, $task_priority, $task_status ) {
    require("db_credentials.php");
    $conn = mysqli_connect($servername,$username,$password,$database);
    $stmt = mysqli_prepare($conn,"INSERT INTO tasks (task_desc, task_due_date, task_cat, task_priority, task_status) VALUES (?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt,"ss",$task_desc,$task_due_date, $task_cat, $task_priority, $task_status);
    mysqli_stmt_execute($stmt);
    mysqli_close($conn);
    header("location:index.php");
}

?>