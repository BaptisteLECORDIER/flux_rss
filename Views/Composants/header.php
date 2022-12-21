<?php 

    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
    $url_server = "https://";   
    else  
    $url_server = "http://";   
    // Append the host(domain name, ip) to the URL.   
    $url_host = $_SERVER['HTTP_HOST'];   

    // Append the requested resource location to the URL   
    $url_uri = $_SERVER['REQUEST_URI'];    

    $url = $url_server.$url_host.$url_uri;  





?>

<header class="body-index__header pos-abs">
        <nav class="body-index__header__nav">
            <div class="body-index__header__nav1 bg-main padding-l b-shadow-default" id="nav1 ">
                <ul class="body-index__header__nav1__ul flex-row flex-jc-space-b">
                    <div>
                        <li class="body-index__header__nav1__ul__li" class="menu-nav">
                            <ul class="flex-row">
                        
                                <li class="body-index__header__nav1__ul__li logo-nav width-150">
                                    <a href="<?php echo $url_server.$url_host."/index.php" ?>" class="no-style-a">
                                        <img src="../../assets/img/logo-lemonde.png" alt="" class="img-resp">
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </div>
                    <li class="body-index__header__nav1__ul__li links-nav flex flex-col flex-jc-center align-i-center print-min-w-800">
                        <ul class="flex flex-row">
  
                        </ul>
                    </li>
                    <li class="body-index__header__nav1__ul__li connection-nav flex-row">
                        
                 
                        <?php
                            if (isset($_SESSION["user_email"]) && isset($_SESSION["user_password"])) {
                                echo "<a href='".$url_server.$url_host."/index.php?page=profil' class='no-style-a'><button class='btn bg-second-hover border-rad-xx-sm txt-md'>Profil</button></a>";
                            } else {
                                
                                echo "<a href='".$url_server.$url_host."/index.php?page=login' class='no-style-a'><button class='btn bg-main-hover border-rad-xx-sm txt-md margin-right-md'>Connexion</button></a>";
                                echo "<a href='".$url_server.$url_host."/index.php?page=register' class='no-style-a'><button class='btn bg-second-hover border-rad-xx-sm txt-md'>Inscription</button></a>";
                            }
                        ?>
                    </li>
                </ul>
            </div>
        </nav>
    </header>