<?php 
$ropisoss = $conectar->_db->query("(SELECT wp.ID,wp.post_date,pm.post_id,oi.order_item_id,oi.order_item_name,pm.meta_value FROM
`stss_postmeta` pm,stss_posts wp,stss_woocommerce_order_items oi WHERE pm.post_id = wp.ID AND pm.post_id = oi.order_id AND
pm.meta_key = '_billing_email' AND pm.meta_value='$emails' AND wp.post_status = 'wc-processing' AND paid = '0') 
UNION (SELECT wp.ID,wp.post_date,pm.post_id,oi.order_item_id,oi.order_item_name,pm.meta_value 
FROM `stss_postmeta` pm,stss_posts wp,stss_woocommerce_order_items oi WHERE pm.post_id = wp.ID AND pm.post_id = oi.order_id AND pm.meta_key = '_billing_email' 
 AND pm.meta_value='$emails' AND wp.post_status = 'wc-completed' AND paid = '0')");
 
 $terss = mysqli_fetch_array($ropisoss);
    $idsss = $terss['ID'];
    $rtss = explode(' ',$terss[order_item_name]);
    $namsoss = $rtss[1];
    $pakisss = 0;
   
    if($namsoss == 500){
        $pakisss = 1;
    }
    if($namsoss == 1000){
        $pakisss = 2;
    }
    if($namsoss == 3000){
        $pakisss = 3;
    }
  $too1 = $conectar->_db->query("UPDATE  security_users SET estado = '1',pack='$pakisss' WHERE user_login = '$emails' "); 
  
  
 $oippSS = $conectar->_db->query("UPDATE stss_posts SET paid='1' WHERE ID = '$idsss'");

?>
