<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php if(isset($_SESSION["usuario"])):?>
    <!-- Perfil de usuario -->
    <div></div>
    <!-- Vedrutweets de segidos y de todos -->
    <main>
        <div>
            <a id="seguidosBtn" class="m-3 btn btn-primary">Seguidos</a>
            <a id="todosBtn" class="m-3 btn btn-primary">Todos</a>
        </div>
        <div id="seguidos">
            seguidos
            <?php foreach($pubSeguidos as $publication): ?>
                <div>
                    <h4><?= selectName($pdo,$publication);?></h4>
                    <p><?= $publication->text;?></p>
                    <p><?= $publication->createDate;?></p>
                </div>
            <?php endforeach; ?>
        </div>
        <div id="todos">
            todos
            <?php foreach($pubTodos as $publication): ?>
                <div>
                    <h4><?= selectName($pdo,$publication);?></h4>
                    <p><?= $publication->text;?></p>
                    <p><?= $publication->createDate;?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </main>
    <script>
        const seguidos = document.querySelector("#seguidos");
        const todos = document.querySelector("#todos");
        todos.style.display = "none";
        const todosBtn = document.querySelector("#todosBtn");
        const seguidosBtn = document.querySelector("#seguidosBtn");
        todosBtn.addEventListener('click', function(event){
            seguidos.style.display = "none";
            todos.style.display = "block";
        });
        seguidosBtn.addEventListener('click', function(event){
            todos.style.display = "none";
            seguidos.style.display = "block";
        });

    </script>
<?php endif ?>
</body>
</html>