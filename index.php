<?php
    include("data_layer.php");

    function create_tasks_table() {
        //  Request for student data
        $tasks = db_get_task_data();
        // Create table with student data
        foreach ($tasks as $r) {
            echo "<tr>\n";
            echo "<td>" . $r[0] . "</td>\n";
            echo "<td>" . $r[1] . "</td>\n";
            echo "<td>" . $r[2] . "</td>\n";
            //echo "<td><a href='db_remove_student.php?id=" . $r[0] . "'>Delete</a></td>\n";
            echo "</tr>\n";
        }
    }
?>


<!DOCTYPE html>
<html>

<head>
   <meta charset="utf-8">
   <title>To-Do List</title>
   <style>
body {
background-color: #b4e1fa;
margin: 0 10%;
font-family: sans-serif;
}
h1 {text-align: center;
font-family: serif;
font-weight: normal;
text-transform: uppercase;
border-bottom: 1px solid #57b1dc;
margin-top: 30px;
}

</style>

</head>
<nav>
    <ul>
        <li><a href="authors.html">Authors' Pages</a></li>
    </ul>
</nav>

<h1>Your To-Do List</h1>

    <legend>Task Information (*Required field)</legend>
    <ul>

        <form method="post" action="db_add_task.php">

        <li><label for="description">*Task Description: 
           <br> <textarea rows="2" cols="30" name="description"id="description"></textarea>
              
        <li><label for="due_date">*Due Date: <input type="date" name="due_date"id="due_date"></li>
        <li><label for="task_name">Task Category: <input type="text" name="task_cat"id="task_cat"></li>
            <legend>Priority</legend>
            <select name="task_priority" id="task_priority">
                <option value ="0">NA</option>
                <option value="1">1 (Highest)</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4 (Lowest)</option>
            </select>
            <p>*Is the task active or complete?</p>
            <input type="radio" name="task_status" id="active" value="0" checked>
            <label for="active">Active</label>
            <input type="radio" name="task_status" id="complete" value="1">
            <label for="complete">Complete</label>
            <br>
            <input type="submit" value="Add Task">
      
        </form>

        <body>
            <h1>To-Do List</h1>
            
            <table>
                <tr>
                    <th>Description</th>
                    <th>Due Date</th>
                    <th>Category</th>
                    <th>Priority</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>

                <?php
                create_tasks_table();
                ?>
                
               