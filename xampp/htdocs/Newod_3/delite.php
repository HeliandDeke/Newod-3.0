<?php

    require('db.php');

    if (isset($_GET['id']))
    {
        
        $id = $_GET['id'];

        $db->query("DELETE FROM friends WHERE id=$id");
        
        echo "<script>alert('Успешно удалено!');
        location.href = 'index.php';
        </script>";
    }
?>