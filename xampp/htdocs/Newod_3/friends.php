<?php
    require('db.php');

    $friends = $db->query("SELECT * FROM friends")->fetchAll(PDO::FETCH_ASSOC);

?>

<?php
    if (isset($_POST['submit']))
    {
        //url
        $avatarfr = $_POST['avatarfr'];
        //
        $namefr = $_POST['namefr'];
        //
        $statusfr = $_POST['statusfr'];

        $xml = simplexml_load_file("data.xml");

        $db->query("INSERT INTO friends (name, avatar, status) VALUES ('$namefr', '$avatarfr', '$statusfr')");

        echo "<script>alert('Друг был добавлен в список')</script>";
        echo "<script>location.href='friends.php'</script>";
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Друзья</title>
</head>
<h1>Ваши друзья</h1>

<hr>
<div class="friends">
<?php
    foreach($friends as $user)
    {   
        ?>
            <a href="update.php?id=<?php echo $user['id']?>" class = "friend img_hover">
                <img class="img_small" src="<?php echo $user['avatar'] ?>" alt="">
                <div class="name"><?php echo $user['name']?></div>
            </a>
        <?php
    }
?>
</div>

<h1>Добавить друга<h1>
<hr>
    <body>
        <form action="" method="POST">
            <input type="text" name="avatarfr" placeholder="аватар">
            <br>
            <input type="text" name="namefr" placeholder="имя друга">
            <br>
            <input type="text" name="statusfr" placeholder="статус">
            <br>
            <button type="submit" name="submit">Добавить друга</button>
        </form>

        <a href="index.php">назад</a>
    </body>
</html>
