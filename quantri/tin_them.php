<?php
if ($_POST) {
	$TD=$_POST['TieuDe'];
	$TD_KD=$_POST['TieuDe_KhongDau'];
	$TT=$_POST['TomTat'];
	$urlHinh=$_POST['urlHinh'];
	$AnHien=$_POST['AnHien'];
	$TNB=$_POST['TinNoiBat'];
	$lang=$_POST['lang'];
	$tags=$_POST['tags'];
	$Ngay=$_POST['Ngay'];
	$idTL=$_POST['idTL'];
	$idLT=$_POST['idLT'];
	$ND=$_POST['NoiDungTin'];
	$qt->Tin_Them ($TD,$TD_KD,$TT,$urlHinh,$AnHien,$TNB,$lang,$tags,$Ngay,$idTL,$idLT,$ND);
	echo "<script>document.location='index.php?p=tin_ds';</script>";
	exit();
}
?>
<style>
.form-group {margin-bottom:15px;}
.form-group .form-line {border-bottom:none}
.form-group .form-control {padding:3px; border:1px solid #999;}
.form-group .form-line.abc {padding-top:5px;}
.form-group .form-control{ background: #337ab7; 
  border-radius: 6px; color:yellow; font-size:14px;letter-spacing:1px}
.form-group .form-control::placeholder {color:white}
#form_validation .col-md-4  {margin-bottom:0px;}
</style>
<div class="row clearfix">
                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12" style="margin:auto; float:none">
                    <div class="card">
                        <div class="header">
                            <h2>THÊM TIN</h2>
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
                            <form id="form_validation" method="POST">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                       <input type="text" class="form-control" name="TieuDe" required maxlength="100" minlength="10"  placeholder="Tiêu đề tin"> 
                                       
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                      <input type="text" class="form-control" name="TieuDe_KhongDau" placeholder="Tiêu đề không dấu">
                                    </div>
								</div>	
								<div class="form-group form-float">
                                    <div class="form-line">
                                      <textarea  type="text" class="form-control" name="TomTat" placeholder="TomTat" cols="30" rows="5" class="form-control no-resize"></textarea>
                                        
                                    </div>
                                </div>								 
                                 
                                
                                <div class="form-group form-float">
                                    <div class="form-line">
                                       <input type="text" name="urlHinh" id="urlHinh" class="form-control" onclick="selectFileWithCKFinder('urlHinh')"  placeholder="Địa chỉ hình của tin" >
                                       
                                    </div>
                                </div>

								
								<div class="row cleafix">
								<div class="col-md-4">
								   <div class="form-group form-float">
								   <input type="radio" name="AnHien" id="AH0" value="0">
								   <label for="AH0">Ẩn</label>
								   <input type="radio" name="AnHien" id="AH1" value="1" checked>
								   <label for="AH1" class="m-l-20">Hiện</label>
								   </div>
								</div>
								<div class="col-md-4">
								   <div class="form-group form-float">
								   <input type="radio" name="TinNoiBat" id="TNB0" value="0">
								   <label for="TNB0">Tin thường</label>
								   <input type="radio" name="TinNoiBat" id="TNB1" value="1" checked>
								   <label for="TNB1" class="m-l-20">Tin nổi bật</label>
								   </div>
								</div>
								<div class="col-md-4">
								   <div class="form-group form-float">
									  <input type="radio" name="lang" id="vi" value="vi" checked>
									  <label for="vi">Tiếng Việt</label>
									  <input type="radio" name="lang" id="en" value="en" >
									  <label for="en" class="m-l-20">English</label>
								   </div>
								</div>
								</div>
								
								<div class="row cleafix">
								  <div class="col-md-6">
									 <div class="form-group form-float">
									 <div class="form-line">
									 <input class="form-control" name="tags" placeholder="Tags">
									 </div>
									  </div>
									</div>
								  <div class="col-md-6">
									 <div class="form-group form-float">
									 <div class="form-line">
									 <input class="datepicker form-control" name="Ngay" placeholder="Ngày đăng" value="<?=date('d/m/Y')?>">
									 </div>
									 </div>
								  </div>
								</div>
								
								<!-- Hiện thể loại -->
								<div class="row clearfix">
											<!-- Chọn Thể loại -->
											<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"> 
											<div class="form-line">
											<?php $ListTin=$qt->ListTheLoai() ?>
											<select class="form-control show-tick" name="idTL" id="idTL" required> 
												<option value=0>---Chọn thể loại</option>
												<?php
													while ($r=$ListTin->fetch_assoc()) { ?>
													<option value="<?=$r['idTL']?>"> <?=$r['TenTL']?></option>

													<?php }
												?>
											</select>
											</div> 
											</div>
								
											<!-- Chọn loại tin -->
											<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"> 
											<div class="form-line">
											<?php $ListTin1=$qt->ListLoaiTin() ?>
											<select class="form-control show-tick" name="idLT" id="idLT" required> 
												<option value=0>---Chọn loại tin</option>
												<?php
													while ($r1=$ListTin1->fetch_assoc()) { ?>
													<option value="<?=$r1['idLT']?>"> <?=$r1['Ten']?></option>

													<?php }
												?>
											</select>
											</div> 
											</div>
								</div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <textarea name="NoiDungTin" cols="30" rows="10" class="form-control" required placeholder="Nội dung tin"></textarea>
                                       
                                    </div>
                                </div>
                             
                                
                                <button class="btn btn-primary waves-effect" type="submit">THÊM TIN</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

<script>
$(document).ready(function(e) {   
	$("#idTL").change(function(){
		var idTL=$(this).val();
		$("#idLT").load("news_layloaitin.php?idTL="+ idTL);
	});
});
</script>
<script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script> <!--Có thể chèn trực tiếp từ net-->
<script>
                        CKEDITOR.replace( 'NoiDungTin' );
                </script>
<!-- Bootstrap Material Datetime Picker Css -->
<link href="plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />

<!-- Autosize Plugin Js -->
<script src="plugins/autosize/autosize.js"></script>

<!-- Moment Plugin Js -->
<script src="plugins/momentjs/moment.js"></script>

<!-- Bootstrap Material Datetime Picker Plugin Js -->
<script src="plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

<script>
$(document).ready(function(e) {   
    $('.datepicker').bootstrapMaterialDatePicker({
        format: 'D/M/Y', 
        weekStart: 1, time: false
    });	
});
</script>
<script src="plugins/ckfinder/ckfinder.js"></script><!-- src should be in <>, not outside of it -->
<script type="text/javascript">
$(document).ready(function(e) { 
	$("#form_validation").submit(function(){
		if ($("$idTL").val==0) {
			alert("Chưa Chọn Thể Loại");return false;
		}
		if ($("$idLT).val==0) {
			alert("Chưa Chọn Loại Tin");return false;
		}	

	});
});
</script>
<script type="text/javascript">
function selectFileWithCKFinder( elementId ) {
   CKFinder.popup( {
        chooseFiles: true, width: 800, height: 600,
        onInit: function( finder ) {
            finder.on( 'files:choose', function( evt ) {
                var file = evt.data.files.first();
                var output = document.getElementById( elementId );
                output.value = file.getUrl();
            });
        finder.on( 'file:choose:resizedImage', function( evt ) {
             var output = document.getElementById( elementId );
             output.value = evt.data.resizedUrl;
        });
        }
   });
}
</script>
