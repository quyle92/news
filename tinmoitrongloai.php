<?php
$tenLT = $t->LayTenLoaiTin($idLT);
$kq=$t->TinMoiTrong1Loai($idLT,0,1,$lang);
$row=$kq->fetch_assoc();
?>	
<style>
.tinmoinhattrongloai {margin:0 !important}
.tinmoinhattrongloai img {height:180px; width:330px;display:inline!important}
.tinmoitieptheo {margin:0; white-space:nowrap; margin-bottom:30px;}
</style>
						<h4 class="box_header"><?=$tenLT?>-tinmoitrongloai</h4>
							<ul class="blog small_margin clearfix">
								<li class="post tinmoinhattrongloai">
									<a href="<?=BASE_URL?>bv/<?=$row['TieuDe_KhongDau']?>.html" title="<?=$row['TieuDe']?>">
										<img src='<?=$row['urlHinh']?>' onerror="this.src='/news/defaultImg.jpg'" alt='img'>
									</a>
									<div class="post_content">
										<h5>
											<a href="<?=BASE_URL?>bv/<?=$row['TieuDe_KhongDau']?>.html" title="<?=$row['TieuDe']?>"><?=$row['TieuDe']?></a>
										</h5>
								
									</div>
								</li>
							</ul>
							<?php $kq=$t->TinMoiTrong1Loai($idLT,1,5,$lang) ?>
							<ul class="list tinmoitieptheo">
							<?php while ($row=$kq->fetch_assoc()) { ?>
								<li class="bullet style_1"><a href="<?=BASE_URL?>bv/<?=$row['TieuDe_KhongDau']?>.html" title="<?=$row['TieuDe']?>"><?=$row['TieuDe']?></a></li>
								<?php }
							?>
							</ul>