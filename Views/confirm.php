<?php 
    require_once('./Controllers/confirm_controller.php')
?>


<!------------------------------------------------------------------------------------------->
<!-- Head -->
<?php include_once('./Views/Composants/head.php') ?>
<!------------------------------------------------------------------------------------------->

<body class="body-index">

<!------------------------------------------------------------------------------------------->
    <!-- Header -->
    <?php include_once('./Views/Composants/header.php') ?>
<!------------------------------------------------------------------------------------------->
    
    <main class="flex-col align-i-center padding-md">
        <h1 class="txt-xx-l">Nous vous avons envoyé un mail</h1>
        <form action="./Controllers/register_controller.php" method="POST">
            <input value="<?php echo $_POST["user_email"] ?>" type="text" name="user_email" id="" hidden>
            <input value="<?php echo $_POST["user_password"] ?>" type="text" name="user_password" id="" hidden>
            <input value="<?php echo $gen_code ?>" type="text" name="gen_code" id="" hidden>

            <label for="code" class="flex-col align-i-center">Votre code</label><br>
            <input type="txt" name="code" id=""><br><br>

            <div class="flex-col align-i-center">
                <input type="submit" name="" id="" class="btn bg-second-hover border-rad-xx-sm margin-top-sm" value="Valider">
            </div>
            
        </form>
    </main>
      
</body>
<?php include_once('./Views/Composants/footer.php') ?>