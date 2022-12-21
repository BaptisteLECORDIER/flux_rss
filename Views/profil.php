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
        <h1 class="txt-xx-l margin-bottom-xx-l">Profil</h1>

        <form action="./Controllers/preference_controller.php" method="POST" >
            
            <div>
                <input type="checkbox" name="new" checked>
                <label class="txt-md" for="new">A la une</label>
            </div>
            <div>
                <input type="checkbox" name="politics" checked>
                <label class="txt-md" for="politics">Politique</label>
            </div>
            <div>
                <input type="checkbox" name="society" checked>
                <label class="txt-md" for="society">Société</label>
            </div>
            <div>
                <input type="checkbox" name="decodeur" checked>
                <label class="txt-md" for="decodeur">Les décodeurs</label>
            </div>
            <div>
                <input type="checkbox" name="justice" checked>
                <label class="txt-md" for="justice">Justice</label>
            </div>
            <div>
                <input type="checkbox" name="police" checked>
                <label class="txt-md" for="police">Police</label>
            </div>
            <div>
                <input type="checkbox" name="campus" checked>
                <label class="txt-md" for="campus">Campus</label>
            </div>
            <div>
                <input type="checkbox" name="education" checked>
                <label class="txt-md" for="education">Education</label>
            </div>
            <div>
                <input type="checkbox" name="culture" checked>
                <label class="txt-md" for="culture">Culture</label>
            </div>



            <div class="flex-col align-i-center">
                <input type="submit" value="Valider" class="btn bg-second-hover border-rad-xx-sm txt-md ">
            </div>
            

        </form>



        <a href="./Controllers/logout.php" class="txt-md margin-top-xx-l">Se déconnecter</a>
    </main>
      
</body>
<?php include_once('./Views/Composants/footer.php') ?>