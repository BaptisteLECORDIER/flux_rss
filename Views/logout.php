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
        <h1 class="txt-xx-l">Se deconnecter</h1>
        <form action="../Controllers/User/UserLogoutController.php" method="POST">
            <div class="flex-col align-i-center">
                <a href="" class="txt-md">Se déconnecter</a>
            </div>
            
        </form>
    </main>
  
</body>
<?php include_once('./Views/Composants/footer.php') ?>