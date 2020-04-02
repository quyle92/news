<?php
$Ten_KhongDau=$_GET['Ten_KhongDau'];
$idLT=$t->LayidLT($Ten_KhongDau);
if (isset($_GET['pageNum']))$pageNum=$_GET['pageNum']; settype($pageNum,"int");
if ($pageNum<=0) $pageNum=1;
$pageSize=8;
$offset=3;
$totalRows=0;

$kq=$t->TinTrongLoai($idLT, $pageNum,$pageSize,$totalRows);

?>
<style>
.blog .tintrongloai img {width: 250px; height:200px; display: inline!important;}

.post .with_number a {width:330px;text-align:justify}
.post .post_details + p {text-align:justify}
.blog .post .post_content .post_details {float:right;}
.blog .post .post_content .post_details .date { background:#ddd;}
.page_header .page_header_right ul {float:left;}
</style>
				<?=$t->LayTenLoaiTin($idLT); ?>
				
						<div class="page_header clearfix page_margin_top">
								<div class="page_header_left">
									<h1 class="page_title"><?=$t->LayTenLoaiTin($idLT); ?></h1>
								</div>
								<div class="page_header_right">
									<ul class="bread_crumb">
										<li>
											<a title="Trang chủ " href="index.php">
												Trang chủ  
											</a>
										</li>
										<li class="separator icon_small_arrow right_gray">
											&nbsp;
										</li>
										<li>
											<?=$t->LayTenLoaiTin($idLT); ?>
										</li>
									</ul>
								</div>
						</div>

						<ul class="blog big">
							<?php While ($row=$kq->fetch_assoc()) { ?>
									<li class="post tintrongloai">
										<a href="<?=BASE_URL?>bv/<?=$row['TieuDe_KhongDau'];?>.html" title="<?=$row['TieuDe']?>">
											<img src="<?=$row['urlHinh']?>" onerror="this.src='/news/defaultImg.jpg'" alt='img'>
										</a>
										<div class="post_content">
											<h2 class="with_number">
												<a href="<?=BASE_URL?>bv/<?=$row['TieuDe_KhongDau'];?>.html" title="<?=$row['TieuDe']?> "><?=$row['TieuDe']?> </a>
											
											</h2>
											<ul class="post_details">
												<li class="date">
													<?=date('d-m-Y',strtotime($row['Ngay']))?>
												</li>
											</ul>
											<p><?=$row['TomTat']?></p>
											
										</div>
									</li>
							<?php } ?>
						</ul>
						<div class="page_margin_top_section" style="margin-top:30px!important">&nbsp;aaaaaaa</div>
						<?php
						
$totalPages = ceil($totalRows/$pageSize);
$from=$pageNum-$offset;
$to=$pageNum+$offset;
if ($from<=0) $from = 1;
if ($to>$totalPages) $to=$totalPages; 
$pagePrev=$PageNum-1;
$pageNext=$PageNum+	1;
?>



						<?php if ($totalRows>$pageSize) { ?>
							
						<ul class="pagination clearfix page_margin_top_section" >
						<?php if($pageNum>1) { ?>
							<li>
							<a href="<?=BASE_URL?>tag/<?=$tag?>/">First</a>
							</li>
							<li>
							<a href="<?=BASE_URL?>tag/<?=$tag?>/<?=$pagePrev?>/" > < </a>
							</li>
						<?php } ?>
												
							<?php //Hiện các con sô trong thanh phân trang?>
						<?php for($j = $from; $j <= $to; $j++) { ?>
						   <?php if ($j!=$pageNum) { ?> 
							<li>
							<a href="<?=BASE_URL?>tag/<?=$tag?>/<?=$j?>/"><?=$j?></a>
							</li>
						   <?php } else { ?>
							<li  class="selected" >
							<a href="<?=BASE_URL?>tag/<?=$tag?>/<?=$j?>/"><?=$j?></a>
							</li>
						   <?php } //if ?>   
						<?php } //for?>

								
						<?php if ($pageNum<$totalPages) { ?>
							<li>
							<a href="<?=BASE_URL?>tag/<?=$tag?>/<?=$pageNext?>/" > > </a>
							</li>
							<li>
							<a href="<?=BASE_URL?>tag/<?=$tag?>/<?=$totalPages?>/"> End </a>
							</li>
						
						<?php } ?>
						</ul>	
						<?php } ?>


						