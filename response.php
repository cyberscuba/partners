<?php
  include("./class/path.php");
   include("./config/bd_config.php");
  
      $conectar = new mysql;  
      $conectar->__construct();

$usuariop = $user;      
$resd =  $conectar->_db->query("SELECT lft,rgt FROM security_users WHERE ID = '$usuariop'");
$ee = mysqli_fetch_array($resd);
$lftt = $ee[0];
$lgtt = $ee[1];
       
$res =  $conectar->_db->query("SELECT security_users.ID, CONCAT(lower(security_users.username), '  STS', format(pack.val_usd,0)) as text, parent_id FROM  security_users INNER JOIN pack ON pack.id = security_users.pack WHERE lft between '$lftt' AND '$lgtt'");
	//iterate on results row and create new index array of data
	while( $row = mysqli_fetch_assoc($res) ) { 
		$data[] = $row;
	}
	$itemsByReference = array();

// Build array of item references:
foreach($data as $key => &$item) {
   $itemsByReference[$item['ID']] = &$item;
   // Children array:
   $itemsByReference[$item['ID']]['children'] = array();
   // Empty data class (so that json_encode adds "data: {}" ) 
   $itemsByReference[$item['ID']]['data'] = new StdClass();
}

// Set items as children of the relevant parent item.
foreach($data as $key => &$item)
   if($item['parent_id'] && isset($itemsByReference[$item['parent_id']]))
      $itemsByReference [$item['parent_id']]['children'][] = &$item;

// Remove items that were added to parents elsewhere:
foreach($data as $key => &$item) {
   if($item['parent_id'] && isset($itemsByReference[$item['parent_id']]))
      unset($data[$key]);
}

echo json_encode($data);
?>
