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
        <style>
        .resize-none {
            resize: none;
        }
    </style>
    <title>Document</title>
</head>
<body>
    <!-- User data -->
    <div>
        <a href="..\index.php" class="m-3 btn btn-primary">Home</a>
        <div class="d-flex flex-column">
            <h3><?= $userInfo->userName;?></h3>
            <div>
                <p>Description:</p>
                <div id="des">
                    <p><?= $userInfo->description?></p>
                </div>
                <?php if($_GET["id"]==$_SESSION["usuario"]->id):?>
                    <div id="modDes">
                        <form action="DescriptionController.php" method="POST">
                            <div class="form-group">
                                <textarea id="modDes" name="modDes" rows="4" cols="50" class="resize-none" placeholder="<?= $userInfo->description?>"></textarea>
                            </div>
                            <input type="submit"  class="m-3 btn btn-primary" value="Confirmar">
                        </form>
                    </div>
                    <a href="" class="m-3 btn btn-primary" id="modDesBtn">Modificar</a>
                    <script>
                    const seguidos = document.querySelector("#des");
                    const todos = document.querySelector("#modDes");
                    todos.style.display = "none";
                    const todosBtn = document.querySelector("#modDesBtn");
                    todosBtn.addEventListener('click', function(event){
                        if(todos.style.display === "block"){
                            seguidos.style.display = "block";
                            todos.style.display = "none";
                        } else{
                            seguidos.style.display = "none";
                            todos.style.display = "block";
                        }
                        event.preventDefault();
                    });
                </script>
                <?php endif;?>
            </div>
            <p><?= $userInfo->createDate;?></p>
        </div>
        <!-- Boton de follow unfollow  -->
        <?php if(in_array($userInfo->id,$_SESSION["usuario"]->usersFollowed)):?>
            <a class="m-3 btn btn-primary" href="..\controller\FollowController.php?do=Unfollow&id=<?= $userInfo->id;?>">Unfollow</a>
        <?php elseif(!($_GET["id"]==$_SESSION["usuario"]->id)):?>
            <a class="m-3 btn btn-primary" href="..\controller\FollowController.php?do=Follow&id=<?= $userInfo->id;?>">Follow</a>
        <?php endif;?>
        
    </div>
    <div>
        <?php if($_GET["id"]==$_SESSION["usuario"]->id):?>
            <form action="VedrunearController.php" method="GET">
                <p><label for="vedrunada">Cuentanos que esta pasando:</label></p>
                <div class="form-group">
                    <textarea id="vedrunada" name="vedrunada" rows="4" cols="50" class="resize-none" placeholder="¿Vedrunada?"></textarea>
                </div>
                <input type="submit"  class="m-3 btn btn-primary" value="Vedrunear">
            </form>
        <?php endif;?>
    </div>
    <!-- User Vedrutweets -->
    <div class="d-flex flex-column justify-content-center align-items-center ">
    <?php foreach($pubUser as $publication): ?>
                <div class="card  mb-4 p-3" style="width: 18rem;">
                    <h4><?= $userInfo->userName;?></h4>
                    <p><?= $publication->text;?></p>
                    <p><?= $publication->createDate;?></p>
                </div>
    <?php endforeach; ?>
    </div>
</body>
</html>