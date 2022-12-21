<?php
        function read_rss ($fichier,$objets) {
 
            // on lit tout le fichier
            if($chaine = implode("",file($fichier))) {
           
                    // on découpe la chaine obtenue en items
                    $tmp = preg_split("/<\/?"."item".">/",$chaine);
            
                    // pour chaque item
                    for($i=0;$i<sizeof($tmp);$i++)
            
                        // on lit chaque objet de l'item
                        foreach($objets as $objet) {
            
                            // on découpe la chaine pour obtenir le contenu de l'objet
                            $tmp2 = preg_split("/<\/?".$objet.">/",$tmp[$i]);
            
                            // on ajoute le contenu de l'objet au tableau resultat
                            $resultat[$i-1][] = $tmp2[0];
                        }
            
                    // on retourne le tableau resultat
                    return $resultat;
                }
           }


        function print_rss ($url) {
           
           $rss = read_rss($url,array("title","link","description","pubDate", "content"));
            
           $rss = simplexml_load_file($url); 
           foreach ($rss->channel->item as $item) { 

            
             echo '<tr class="news_box ">
                      <td class="news_box_title txt-l flex-row"><div><h1 class="txt-xx-l width-600">'.$item->title.'</h1><br>
                      <div class="news_box_date txt-md width-600">posté le '.date("d/m/Y",strtotime($item->pubDate)).'
                        '.$item->description.' <a href="'.$item->link.'" target="_blank">Lire tout l\'article</a></div></div>
                      <div class="bg-main height-150 width-150 margin-xx-sm b-shadow-default of-hidden responsive-img"><img class"" src="'.$item->children('media', True)->content->attributes()->url.'"/></div></td>
                   </tr>';
           } 

        }


?>