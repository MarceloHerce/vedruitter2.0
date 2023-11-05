<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Trabajito del juaky">
    <meta name="keywords" content="twitter vedruna diversion mirada">
    <meta name="language" content="ES">
    <meta name="author" content="marcelo.herce@vedruna.es">
    <meta name="robots" content="index,follow">
    <meta name="revised" content="Tuesday, February 11th, 2023, 01:00pm">
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE-edge, chrome1">

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
    <link rel="stylesheet" href="css/style.css">

    <title>vedruitter</title>
</head>
<body>
    <?php if(!isset($_SESSION["usuario"])):?>
        <div class="container mt-5">
            <form action="./controller/LoginController.php" method="POST" id="LoginRegister">
            <h6 id="formFunc">Login<h6>
            <div class="form-group">
                <label for="username">User Name</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="username"
                required/>
            </div>
            <div class="form-group">
                <label for="mail">Mail</label>
                <input type="text" class="form-control" id="mail" name="mail" placeholder="mail"
                required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"/>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="ChameleonShirt1234" 
                required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"/>
            </div>
            <input id="sendBttn" class="m-3 btn btn-primary" type="submit" value="Enviar" name="login"/>
            <a href="" id="registerLink">¿No estas registrado?</a>
            </form>
        </div>
        <script>
            const form = document.querySelector("#LoginRegister");
            console.log(form);
            const reg = document.querySelector("#registerLink");
            const sendb = document.querySelector("#sendBttn");
            const h5 = document.querySelector("#formFunc");
            console.log(reg);
            reg.addEventListener('click', function(event) {
                event.preventDefault();
                console.log('Enlace "No estás registrado" fue clickeado.');
                if(sendb.name==="login"){
                    console.log(sendb.name);
                    sendb.name="register";
                    console.log(sendb.name);
                    reg.innerHTML="¡Ya estas registrado!";
                    h5.innerHTML="Register";
                } else {
                    h5.innerHTML="Login";
                    sendb.name="login";
                    reg.innerHTML="¿No estas registrado?";
                }
            });
        </script>
        <!-- Sesion iniciada -->
        <main>
            <!-- Barra nav -->
            <div id="l-bar">
                
            </div>
            <!-- Publicaciones -->
            <div id="c-bar">
                
            </div>
            
            <!-- Recomendaciones -->
            <div id="r-bar">
                
            </div>
        </main>
        <!-- Sesion iniciada -->
    <?php else:?>
        hola
    <?php endif ?>
</body>
</html>