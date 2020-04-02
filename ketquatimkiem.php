<?php
$tukhoa=$_GET['tukhoa']; 
if (@$pageNum<=0) $pageNum=1;
$offset=3;
$totalRows=0;



?>
<style>
.blog .tintrongloai img {width: 250px; height:200px; display: inline!important;}

.post .with_number a {width:330px;text-align:justify}
.post .post_details + p {text-align:justify}
.blog .post .post_content .post_details {float:right;}
.blog .post .post_content .post_details .date { background:#ddd;}
.page_header .page_header_right ul {float:left;}
</style>
				Keyword: <?=$tukhoa?>
				<div class="page_header clearfix page_margin_top">
								<div class="page_header_left">
									<h1 class="page_title"><?=$kq=$t->TimKiem($tukhoa,$totalRows, $pageNum, $pageSize); ?></h1>
								</div>
								<div class="page_header_right">
									<ul class="bread_crumb">
										<li>
											Results found: <?=$totalRows?> tin
										</li>
									
									</ul>
								</div>
						</div>

						<ul class="blog big">
							<?php While ($row=$kq->fetch_assoc()) { ?>
									<li class="post tintrongloai">
										<a href="index.php?p=search&tukhoa=<?=$tukhoa?>" title="<?=$row['TieuDe']?>">
											<img src="<?=$row['urlHinh']?>" onerror="this.src='/news/defaultImg.jpg'" alt='img'>
										</a>
										<div class="post_content">
											<h2 class="with_number">
												<a href="post.html" title="<?=$row['TieuDe']?> "><?=$row['TieuDe']?> </a>
											
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
							<a href="index.php?p=search&tukhoa=<?=$tukhoa?>">First</a>
							</li>
							<li>
							<a href="index.php?p=search&tukhoa=<?=$tukhoa?>&pageNum=<?=$pagePrev?>" > < </a>
							</li>
						<?php } ?>
												
							<?php //Hiện các con sô trong thanh phân trang?>
						<?php for($j = $from; $j <= $to; $j++) { ?>
						   <?php if ($j!=$pageNum) { ?> 
							<li>
							<a href="index.php?p=search&tukhoa=<?=$tukhoa?>&pageNum=<?=$j?>"><?=$j?></a>
							</li>
						   <?php } else { ?>
							<li  class="selected" >
							<a href="index.php?p=search&tukhoa=<?=$tukhoa?>&pageNum=<?=$j?>"><?=$j?></a>
							</li>
						   <?php } //if ?>   
						<?php } //for?>

								
						<?php if ($pageNum<$totalPages) { ?>
							<li>
							<a href="index.php?p=search&tukhoa=<?=$tukhoa?>&pageNum=<?=$pageNext?>" > > </a>
							</li>
							<li>
							<a href="index.php?p=search&tukhoa=<?=$tukhoa?>&pageNum=<?=$totalPages?>"> End </a>
							</li>
						
						<?php } ?>
						</ul>	
						<?php } ?>


						