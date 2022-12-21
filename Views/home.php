<!------------------------------------------------------------------------------------------->
<!-- Head -->
<?php include_once('./Views/Composants/head.php') ?>
<?php include_once('./Functions/crud_functions.php') ?>
<!------------------------------------------------------------------------------------------->

<body class="body-index">

<!------------------------------------------------------------------------------------------->
    <!-- Header -->
    <?php include_once('./Views/Composants/header.php') ?>
<!------------------------------------------------------------------------------------------->
    <?php include_once('./Controllers/read_rss.php') ?>
    <main class="flex-col flex-js-center align-items padding-md">
        <div class="flex-row flex-jc-center">
        <table class="">
            <?php 
            

                if (isset($_SESSION["user_email"])) {





                    print_rss ("https://www.lemonde.fr/rss/une.xml");
                }
            
            
            ?>
        </table>

        </div>
    </main>
    
  
</body>
<?php include_once('./Views/Composants/footer.php') ?>



