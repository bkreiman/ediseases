<?php 
    if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
    $OT_builder = new OT_home_builder; 
    //get block data
    $data = $OT_builder->get_data(); 
    //extract array data
    extract($data[0]); 


   
?>

<!-- BEGIN .main-nosplit -->
<div class="main-nosplit">
	<?php echo $code;?>
	<br/>
</div>