<?php 
$kq=$t->TinXemNhieu(0,10,$lang);
$i=0;
$a=$i++;
?>
<style>
.tinxemnhieu img {height:170px}

</style>
								<div id="most-read">
									<div class="horizontal_carousel_container page_margin_top">
										<ul class="blog horizontal_carousel page_margin_top autoplay-0 visible-4 scroll-1 navigation-1 easing-easeInOutQuint duration-750">
										<?php While ($row=$kq->fetch_assoc()) { ?>
											<li class="post tinxemnhieu">
												<a href="<?=BASE_URL?>bv/<?=$row['TieuDe_KhongDau']?>.html" title="<?=$row['TieuDe']?>">
													<img src='<?=$row['urlHinh']?> ' alt='img' onerror="this.src='/news/defaultImg.jpg'">
												</a>
												<h5><span class="number"><?=++$a?>.</span><a href="<?=BASE_URL?>bv/<?=$row['TieuDe_KhongDau']?>.html" title="<?=$row['TieuDe']?> "><?=$row['TieuDe']?> </a></h5>
												<ul class="post_details simple">
													<li class="category"><a href="category_health.html" title="<?=$row['TenLT']?>"><?=$row['TenLT']?></a></li>
													<li class="date">
														<?=date('d-m-Y',strtotime($row['Ngay']))?>
													</li>
												</ul>
											</li>
												<?php	}
										?>
											
											
											
											
										</ul>
									</div>
								</div>