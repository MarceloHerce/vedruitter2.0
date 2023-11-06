<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Añado la fuente Roboto -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"
        defer></script>
    <title>Document</title>
</head>
<body>
    <!-- User data -->
    <div>
        <a href="..\index.php" class="m-3 btn btn-primary">Home</a>
        <div class="d-flex justify-center">
            <h3><?= $userInfo->userName;?></h3>
            <p>Description:</p>
            <p><?= $userInfo->description;?></p>
            <p><?= $userInfo->createDate;?></p>
        </div>
        <?php if(in_array($userInfo->id,$_SESSION["usuario"]->usersFollowed)):?>
            <a class="m-3 btn btn-primary">Unfollow</a>
        <?php else:?>
            <a class="m-3 btn btn-primary">Follow</a>
        <?php endif;?>
    </div>
    <!-- User Vedrutweets -->
    <div>
    <?php foreach($pubUser as $publication): ?>
                <div>
                    <a href="#<?= $userInfo->id?>">
                        <h4><?= $userInfo->userName;?></h4>
                    </a>
                    <p><?= $publication->text;?></p>
                    <p><?= $publication->createDate;?></p>
                </div>
    <?php endforeach; ?>
    </div>
</body>
</html>