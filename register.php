<?php
require_once 'init.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
     if(isset($_POST['name']) && strlen(trim($_POST['name'])) > 0 
    && isset($_POST['email']) && strlen(trim($_POST['email'])) >= 5
    && isset($_POST['password']) && strlen(trim($_POST['password'])) >= 6
    && isset($_POST['retyped_password']) 
    && trim($_POST['password']) == trim($_POST['retyped_password'])){

         $user = new User();
         $user -> setName(trim($_POST['name']));
         $user -> setEmail(trim($_POST['email']));
         $user ->setPassword(trim($_POST['password']));
         
         if($user ->saveToDB($conn)){
             echo "Udalo sie zarejestrowac uzytkownika";
             header('Location: index.php');
         }else{
             echo "nie udalo sie zarejestrowac uzytkownika";
         }
     }else{
         echo "bledne dane w formularzu";
     }
}
?>
<html>
    <head>
        <?php include('headers.php');?>
    </head>
    <body>
    <nav>
    </nav>
    <main>
        <section class="jumbotron">
            <div class="container loginForm">
                <form method ='POST'>
                        <label>
                            Imię: <br>
                            <input type='text' name='name'>
                        </label>
                        <br>
                        <label>
                            E-mail:<br>
                            <input type="text" name="email">
                        </label>
                        <br>
                        <label>
                            Hasło: <br>
                            <input type="password" name='password'>
                        </label>
                        <br>
                        <label>
                            Powtórz hasło: <br>
                            <input type='password' name="retyped_password"><br>
                            <input class="btn btn-default" type="submit" value="register">
                            <a href="login.php">strona logowania</a>
                        </label>
                </form>
            </div>
    </main>
    </body>
</html>
