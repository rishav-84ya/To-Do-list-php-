<?php
include 'conn.php';
?>
<head>
    <title>Todo App</title>
    <link rel="stylesheet" href="style.css">
</head>

<form method="post">
<label>ADD TEXT</label>
<input type="text" name="task_text">
<input type="submit" name="submit" value="ADD TASK">
</form>


<?php
if(isset($_POST['submit']))
{
    $task = $_POST['task_text'];
    $qu=$conn->prepare("INSERT INTO tasks(TASK) VALUES ('$task')");
    $qu->execute();
}
?>

<?php 
    $que = $conn->prepare("SELECT TASK_ITEM , TASK  FROM tasks");
    $que->execute();
    $result = $que->fetch();


    echo "<table border=1>";
   foreach ($que as $a) {
    echo "<tr>";
    echo "<td>".$a['TASK']."</td>";
    echo "<td>
        <form method='post'>
            <button type='submit' name='delete' value='".$a['TASK_ITEM']."'>
                delete
            </button>
        </form>
    </td>";
    echo "</tr>";
}

    echo "</table>";
?>

<?php

if(isset($_POST['delete'])){
$item = $_POST['delete'];
$qeury = $conn->prepare("DELETE FROM tasks WHERE TASK_ITEM='$item'");
$qeury->execute();
header("Location: " . $_SERVER['PHP_SELF']);
}
?>

<footer>
    <a> created by RISHAV</a>
</footer>