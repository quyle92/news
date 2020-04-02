<?php
//$idTin=$_GET['idTin'];settype($idTin,"int");
$TieuDe_KhongDau=$_GET['TieuDe_KhongDau'];
$idTin=$t->layidTin($TieuDe_KhongDau);
$row=$t->ChiTietTin($idTin);
$t->CapNhatSolanXemTin($idTin);

?>
<?php
	$loi="";
	if ($_POST) {
		$hoten=$_POST['name'];
		$email=$_POST['email'];
		$noidung=$_POST['message'];
		$idTin=$_POST['idTin'];
		$kq=$t->LuuYKien($idTin,$hoten,$email,$noidung,$loi);
		if ($loi=="") {
			$url=$_SERVER['REQUEST_URI'];
			$_SESSION['thongbao']="Cảm ơn bạn, ý kiến đã được ghi nhận";
			echo "<script>document.location='{$url}';</script>";
			exit();//"exit" dung de stop $_POST
		}
	}
	
		
?>	
<div id="thongbaoYK" style="background: #ccc; color:red; text-align:center;line-height:250%; margin-top:10px">
<?php
if ($loi!="") {echo $loi;}
	else {
		echo @$_SESSION['thongbao'];
		unset($_SESSION['thongbao']);	
	}
?>

</div>
<style>
.tintieptheo a img {height:140px;}
.single .noidungtin .content_box {width:100%; margin-left:0; margin-top:20px;}
.single h1{font-size:32px; }
.post .post_content .content_box .excerpt {font-size:24px; ; letter-spacing:1px; text-align:justify }
#thongbaoYK {padding: 15px; color:cyan; background:#aaa; text-align:center; line-height:200%; font-size:20px}
</style>				
<!--<?php echo "aa",$_SERVER['PHP_SELF'],"bb";//cach fix loi?>-->
								<div class="post single">
									<h1 class="post_title">
										<?=$row['TieuDe']?>
									</h1>
									<ul class="post_details clearfix">
										<li class="detail category"><a href="category_health.html" title="<?=$row['Ten']?>"><?=$row['Ten']?></a></li>
										<li class="detail date"><?=$row['Ngay']?></li>
										
										<li class="detail views"><?=$row['SoLanXem']?> lan xem</li>
										
									</ul>
								
								
									<div class="post_content noidungtin  clearfix">
										<div class="content_box">
											<h3 class="excerpt"><?=$row['TomTat']?></h3>
											<div class="text">
												<p><?=$row['Content']?></p>
												
											</div>
										</div>
						
									</div>
									
							
							<div class="row page_margin_top_section">
								<h4 class="box_header">Tin Tiếp Theo</h4>
								<div class="horizontal_carousel_container page_margin_top">
									<ul class="blog horizontal_carousel autoplay-1 scroll-1 navigation-1 easing-easeInOutQuint duration-750">
									<?php $kq=$t->TinCuCungLoai($idTin, $lang, 8)   ?>
									<?php while ($row=$kq->fetch_assoc()) { ?>
										<li class="post tintieptheo">
											<a href="<?=BASE_URL?>bv/<?=$row['TieuDe_KhongDau'];?>.html" >
												<img src='<?=$row['urlHinh']?>' alt='img' onerror="this.src='/news/defaultImg.jpg'">
											</a>
											<h5>
											<a href="<?=BASE_URL?>bv/<?=$row['TieuDe_KhongDau'];?>.html"> 
											<?=$row['TieuDe']?>
											</a>
											</h5>
											<ul class="post_details simple">
												<li class="category"><a href="category_health.html" title="HEALTH">HEALTH</a></li>
												<li class="date">
													<?=date( 'd/m/Y', strtotime($row['Ngay']) )?> 
												</li>
											</ul>
										</li>
									<?php } ?>					
										
									</ul>
								</div>
							</div>
							
								<div class="row page_margin_top_section">
								<h4 class="box_header">Leave a Comment</h4>
								<p class="padding_top_30">Your email address will not be published. Required fields are marked with *</p>
								<form class="comment_form margin_top_15" id="comment_form" method="post" action="">
								<input type="hidden" name="idTin" value="<?=$idTin?>" >
									<fieldset class="column column_1_3">
										<span style="color:black">Name:</span> <input class="text_input" name="name" type="text" value="<?=(isset($_POST['name']))?$_POST['name']:""?>" placeholder="">
									</fieldset>
									 <fieldset class="column column_1_3">
									<span style="color:black">Email:</span> <input class="text_input" name="email" type="text" value="<?=(isset($_POST['email']))?$_POST['email']:""?>" placeholder="">
									</fieldset>
								
									<fieldset>
										<span style="color:black; margin-top:10px">Message:</span>  <textarea name="message"  value="<?=(isset($_POST['message']))?$_POST['message']:""?>"></textarea>
									</fieldset>
									<fieldset>
										<input type="submit" value="POST COMMENT" class="more active">
										<a href="#cancel" id="cancel_comment" title="Cancel reply">Cancel reply</a>
									</fieldset>
								</form>
							</div>
							
							<?php $kq=$t->LayCacYKienCua1Tin($idTin); ?>
						<h4 class="box_header"> <?=$kq->num_rows;?> Comments </h4>
							<ul id="comments_list">
							<?php while ($row=$kq->fetch_assoc()) { ?>
									<li class="comment clearfix" id="comment-1">
										<div class="comment_author_avatar">
											&nbsp;
										</div>
										<div class="comment_details">
											<div class="posted_by clearfix">
												<h5><a class="author" href="#" title="Kevin Nomad"><?=$row['HoTen']?></a></h5>
												<abbr title="<?=date('d-m-Y H:i:s',strtotime($row['Ngay']))?>" class="timeago"><?=date('d-m-Y H:i:s',strtotime($row['Ngay']))?></abbr>
											</div>
											<p>
												<?=$row['NoiDung']?>
											</p>
											
										</div>
									</li>
							<?php } ?>
									
								</ul>
								</div>
								