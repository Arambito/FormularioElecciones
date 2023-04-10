<?php
require_once '../core/config.php';

$sql="SELECT id_comuna, nombre_comuna
from COMUNA 
where region_id=$_GET[region] ORDER BY nombre_comuna ASC";

$result=mysqli_query($db,$sql);



while ($ver=mysqli_fetch_row($result)) {
echo $cadena='<option value='.$ver[0].'>'.$ver[1].'</option>';
}


?>