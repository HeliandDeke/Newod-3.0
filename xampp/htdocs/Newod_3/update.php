<?php
    require('db.php');
    $friend = 0;
    if ($_SERVER['REQUEST_METHOD'] === 'GET')
        {
        // хроним id запроса
        $id = $_GET['id'];
        
        // запрос и ответ
        $friends = $db->query("SELECT * FROM friends WHERE id=$id")->fetchAll(PDO::FETCH_ASSOC);
        $friend = $friends[0];
        // обращаемся непосредственно к нашему первому эл-ту
        
    }
    else if ($_SERVER['REQUEST_METHOD']==='POST') {
            //var_dump($_POST);
            $id = $_POST['id'];
            $name = $_POST['namefr'];
            $avatar = $_POST['avatarfr'];
            $status = $_POST['statusfr'];

            $db->query("UPDATE friends SET name='$name', avatar = '$avatar', status='$status' WHERE id = $id");
            echo "<script>alert('Успешно дабавлена кника в список наш!')</script>";
            echo "<script>location.href='friends.php'</script>";
            //echo "<script>location.href='update.php?id=$id'</script>";
    }
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<hr>
    <body>
    <div class="friends">
    <div class = "friend img_hover">
        <img class="img_small" src="<?php echo $friend['avatar'] ?>" alt="">
        <div class="name"><?php echo $friend['name']?></div>
        <a href="delite.php?id=<?php echo $friend['id']?>">Удалить</a>
    </div>
</div>
    
    <hr>
        <form action="" method="POST">
            <input type="text" name="avatarfr" value=<?php echo $friend['avatar']?>>
            <br>
            <input type="text" name="namefr" value=<?php echo $friend['name']?>>
            <br>
            <input type="text" name="statusfr" value=<?php echo $friend['status']?>>
            <br>
            <input type="hidden" name="id" value=<?php echo $friend['id']?>>
            <button type="submit" name="submit">Обновить друга</button>
        </form>
        
        <a href="friends.php">назад</a>
    </body>
</html>