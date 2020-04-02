<?php
$idTL=$_GET['idTL'];
settype($idTL,'int');
if (isset($idTL)==true) $kq=$qt->TheLoai_ChiTiet($idTL);
$row=$kq->fetch_assoc();
?>

<?php
if (isset($_POST['TenTL'])) {
	$TenTL=$_POST['TenTL'];
	$TenTL_KD=$_POST['TenTL_KhongDau'];
	$ThuTu=$_POST['ThuTu'];
	$AnHien=$_POST['AnHien'];
	$lang=$_POST['lang'];
	$qt->TheLoai_Sua($idTL, $TenTL, $TenTL_KD, $ThuTu,$AnHien,$lang);
	echo "<script>document.location='index.php?p=theloai_ds';</script>";
	exit();
}
?>
<style>
.form-group .form-line {border-bottom:none; }
.form-group .form-control {padding:3px; border:1px solid #999;}
.form-group .form-line.abc {padding-top:5px; }

</style>
<div class="row clearfix">
              <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 center-block" style="float:none">
                    <div class="card">
                        <div class="header">
                            <h2>
                                CHỈNH SỬA THỂ LOẠI
                            </h2>
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
                            <form class="form-horizontal" method="post" action="">
                                <div class="row clearfix">
                                    <div class="col-sm-3 form-control-label">
                                        <label for="TenTL"> Tên TL </label>
                                    </div>
                                   <div class="col-sm-9">
                                        <div class="form-group">
                                            <div class="form-line">
                                              <input type="text" id="TenTL" name="TenTL" value="<?=$row['TenTL']?>" class="form-control" placeholder="Nhập tên thể loại"  maxlength= "20" minlength="3" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-3 form-control-label">
                                        <label for="TenTL_KhongDau">TênTL không dấu</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" value="<?=$row['TenTL_KhongDau']?>"  placeholder="Tên không dấu"id="TenTL_KhongDau" name="TenTL_KhongDau" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
								   <div class="row clearfix">
                                    <div class="col-sm-3 form-control-label">
                                        <label for="ThuTu">Thứ Tự</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" value="<?=$row['ThuTu']?>"  placeholder="Thứ tự"id="ThuTu" name="ThuTu" min="1" max="1000" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								   <div class="row clearfix">
                                    <div class="col-sm-3 form-control-label">
                                        <label>Ẩn Hiện</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group ">
                                            <div class="form-line abc">
                                                <input type="radio" <?=($row['AnHien']==1)?"checked":""?>  id="AH1" name="AnHien"  value="1"> 
												<label for="AH1">Hiện</label>
												<input type="radio" <?=($row['AnHien']==0)?"checked":""?>  id="AH0" name="AnHien" value="0">
												<label for="AH0">Ẩn</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								 <div class="row clearfix">
                                    <div class="col-sm-3 form-control-label">
                                        <label>Ngôn Ngữ</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group" >
                                            <div class="form-line abc">
											<input type="radio" id="vi" name="lang" <?=($row['lang']=='vi')?"checked":""?>  value="vi"> 
											<label for="vi">Tiếng Việt</label>
											<input type="radio" id="en" <?=($row['lang']=='en')?"checked":""?> name="lang" value="en">
											<label for="en">English</label>

											</div>
                                        </div>
                                    </div>
                                </div>
                               
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">CẬP NHẬT THỂ LOẠI</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>