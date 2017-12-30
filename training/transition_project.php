<?php
    session_start([
    'cookie_lifetime' => 7200,
    'read_and_close'  => true,]);
    
    $root = realpath($_SERVER["DOCUMENT_ROOT"]);
    include "$root/ProjetNAO/userBD/connBDD.php";

    $sql1 = "SELECT State
            FROM state_exercise s, exercise e
            WHERE s.Exercise_id = e.Exercise_id
            AND e.Project_id = '{$_SESSION['p_id']}'";
        
    $result1 = $link->query($sql1);

    $count = 0;
    $complete = 0;
    //We count the number of exercises that are in the project - $count
    //as well as the number of exercises that are completed - $complete
    if ($result1->num_rows > 0) {
        while($row1 = $result1->fetch_assoc()) {
            $count = $count + 1;
            if ($row1['State'] == 'complete')
                $complete = $complete + 1;
        }
    }

    $p_complete = false;

    if ($complete == $count)
        $p_complete = true;

    if ($p_complete == true) {
        header('Location: http://localhost/ProjetNAO/training/project_done.php');
    } else {
        header('Location: http://localhost/ProjetNAO/training/projets.php');
    }
?>