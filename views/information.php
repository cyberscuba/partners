<?php

             $cref = 1;
             $confg = $Muestra->get_users6($cref);
                      while ($ing = mysqli_fetch_array($confg)){
                      $cpny = $ing['company_config'];
                      $favicon = $ing['favicon_intall'];
                      $logo = $ing['logo_install'];
                      $uabout = $ing['url_about'];
                      $uprivacy = $ing['url_privacy'];
                      $ucontact = $ing['url_contact'];
                      $web =  $ing['web'];
                      $ofic = $ing['direcory'];
                      $pdf = $ing['doc_pdf'];
                      $wall = $ing['wall_ofi'];
                      $sis_wall = $ing['sis_wall'];
                      $shar_wall = $ing['shar_wall'];
                      $pos_wall = $ing['pos_wall'];
                      $cupons_on = $ing['cupons_on'];
                      $zoom = $ing['zoom'];
                     $youtube = $ing['youtube'];
                    
                      }

?>