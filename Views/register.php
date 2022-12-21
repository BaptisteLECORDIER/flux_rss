<!------------------------------------------------------------------------------------------->
<!-- Head -->
<?php include_once('./Views/Composants/head.php') ?>
<?php include_once('./Functions/get_url.php') ?>
<!------------------------------------------------------------------------------------------->

<body class="body-index">

<!------------------------------------------------------------------------------------------->
    <!-- Header -->
    <?php include_once('./Views/Composants/header.php') ?>
<!------------------------------------------------------------------------------------------->
    
    <main class="flex-col align-i-center padding-md">
        <h1 class="txt-xx-l">S'inscrire</h1>
        <form action="./index.php?page=confirm" method="POST">
            <br>
            <label for="user_email" class="txt-l">Adresse mail</label><br>
            <input type="text" name="user_email" id="" placeholder="ex : john.doe@truc.fr"><br><br>
            <label for="user_password" class="txt-l">Mot de passe</label><br>
            <input type="password" name="user_password" id=""><br><br>
            <div class="flex-col align-i-center">
                <input type="submit" name="" id="" class="btn bg-second-hover border-rad-xx-sm margin-top-sm" value="S'inscrire">
            </div>
            
        </form>
    </main>
      
</body>
<?php include_once('./Views/Composants/footer.php') ?>