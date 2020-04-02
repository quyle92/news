<?php
require_once "../class/quantritin.php";
$qt=new quantritin;
$idTL=$_GET['idTL'];
$loaitin=$qt->LoaiTinTrongTheLoai($idTL);
?>
<?php while ($row_loaitin=$loaitin->fetch_assoc()) { ?>
	<option value="<?=$row_loaitin['idLT']?>"> 
	<?=$row_loaitin['Ten']?>
	</option>
<?php }
?>