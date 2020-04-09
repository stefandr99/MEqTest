<?php 
include_once 'php/config.php';
        if(isset($_GET["id"])){
            $pageid = $_GET["id"];
            $sql = 'SELECT CONTENT from quizzes where ID_DOCUMENT = ?';
            $quizcontent = '';
            if($stmt = mysqli_prepare($dbc, $sql)){
                mysqli_stmt_bind_param($stmt, "i", $pageid);

                if(mysqli_stmt_execute($stmt)){
                    mysqli_stmt_store_result($stmt);
                    
                    if(mysqli_stmt_num_rows($stmt) == 1){   
                        mysqli_stmt_bind_result($stmt, $quizcontent);
                        mysqli_stmt_fetch($stmt);
                    }    
                }   
            mysqli_stmt_close($stmt);          
            echo $quizcontent;
            }
        }
        mysqli_close($dbc);
?>