<?php 
$idTL=-1;//why this line neccesay?
if (isset($_GET['idTL']))
$idTL=$_GET['idTL']; settype($idTL,"int");

$idLT=-1;
if (isset($_GET['idLT'])==true)
$idLT=$_GET['idLT']; settype($idLT,"int");

$kq = $qt->ListTin($idTL, $idLT ); 
?>


 		<div class="container-fluid">
         
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Quản trị tin
                            </h2>
							<form method="get" action="" class="bg-info p-t-10 p-b-10 p-l-10">
							<input type="hidden" name="p" value="tin_ds">
							
							<!--Chọn Thể Loại-->
							<?php $listTL=$qt->ListTheLoai(); ?>
							<select id="idTL" name="idTL" class="btn btn-success" onchange="this.form.idLT.value=-1; this.form.submit();">
								<option value=-1> Chọn Thể Loại </option>
								<?php while ($r=$listTL->fetch_assoc()) { ?>
											<?php if ($r['idTL']==$_GET['idTL']) { ?>
											<option value="<?=$r['idTL']?>" selected> <?=$r['TenTL']?>	</option>
											<?php } ELSE  { ?>
											<option value="<?=$r['idTL']?>"> <?=$r['TenTL']?>	</option>
											<?php }
											?>
								<?php } ?>							
							</select>
							
							<!--Chọn Loại Tin-->
							<?php $listLT=$qt->ListLoaiTin(); ?>
							<select id="idLT" name="idLT" class="btn btn-primary" onchange="this.form.idTL.value=-1; this.form.submit();">
							<option value=-1>Chọn Loại Tin</option>
							<?php while ($r=$listLT->fetch_assoc()) { ?>
							<?php if ($r['idLT']==$_GET['idLT']) { ?>
							<option value="<?=$r['idLT']?>" selected> <?=$r['Ten']?> </option>
							<?php } 
							ELSE { ?> <option value="<?=$r['idLT']?>"> <?=$r['Ten']?> </option>

							<?php }
							?>//if


							<?php }
							?>//while
					
							</select>
							</form>
							
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th width="89">idTin/Ngay</th>
                                            <th width="134">Tiêu Đề/Tóm Tắt</th>
                                            <th width="150"><a name="OLE_LINK52">Cập nhật/Xóa</a></th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
									<?php while ($rowTin=$kq->fetch_assoc())  { ?>
                                        <tr>
                                            <td><P>idTin: <?=str_pad($rowTin['idTin'],3,"0",STR_PAD_LEFT)?></P>
											<p><?=date('d/m/Y',strtotime($rowTin['Ngay']))?></p>
											<p>Xem: <?=$rowTin['SoLanXem']?><p/>
											</td>
                                            <td><h4><?=$rowTin['TieuDe']?> <span>(<?=$rowTin['TenTL']?>/<?=$rowTin['Ten']?>)</span></h4>
											<p><?=$rowTin['TomTat']?></p></td>
                                            <td width="120" > 
											<p><a href="?p=tin_sua&idTin=<?=$rowTin['idTin']?>" class="btn bg-blue waves-effect">Chỉnh </a> &nbsp;
											<a href="tin_xoa.php?idTin=<?=$rowTin['idTin']?>" class="btn bg-red waves-effect" onClick="return confirm ('Xóa hả')">Xóa</a></p>
											<p><?=($rowTin['AnHien']==1)?"Hiện":"Ẩn"?></p>
											<p><?=($rowTin['TinNoiBat']==1)?"Tin Nỗi Bật":"Tin Thường"?></p>
											</td>
                                        </tr>
										
									<?php } ?>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
          
        </div>
	<!-- JQuery DataTable Css -->
<link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
	
    <!-- Jquery DataTable Plugin Js -->
    <script src="plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/tables/jquery-datatable.js"></script>