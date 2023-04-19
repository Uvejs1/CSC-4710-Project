<?php
include("data_layer.php");

if ($_POST) {
    if (isset($_POST['task_desc']) && isset($_POST['task_due_date'])&& isset($_POST['task_cat'])&& isset($_POST['task_priority'])&& isset($_POST['task_status'])) {
        
        $task_desc = $_POST['description'];
        $task_due_date = $_POST['due_date'];
        $task_cat = $_POST['task_cat'];
        $task_priority = $_POST['task_priority'];
        $task_status = $_POST['task_status'];
        
        db_add_student($task_desc,$task_due_date, $task_cat, $task_priority, $task_status);
    }
} else {
    header("location:index.php");
}

?>