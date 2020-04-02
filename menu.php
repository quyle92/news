			<div class="menu_container sticky   clearfix">
				<nav>
				<ul class="sf-menu">
					<li class="selected">
						<a href="<?=BASE_URL?>" title="Trang chủ">
							Trang chủ 
						</a>
						
					</li>
				
					
					

<?php $kq = $t->ListTheLoai($lang);	?>
<?php while ($rowTL = $kq->fetch_assoc() ) {?>
					<li class="submenu">
						<a href="#" title="<?=$rowTL['TenTL']?>">
							<?=$rowTL['TenTL']?>
						</a>
						<ul>
						<?php $kq1=$t->ListLoaiTinTrong1TheLoai($rowTL['idTL'],$lang) ?>
						<?php while ($rowLT = $kq1->fetch_assoc() ) {?>
							<li>
								<a href="<?=BASE_URL?>cat/<?=$rowLT['Ten_KhongDau']?>/" title="<?=$rowLT['Ten']?>">
									<?=$rowLT['Ten']?>
								</a>
							</li>
						<?php }?>
							
						</ul>
					</li>
					<?php }?>

				</ul>
				</nav>
				
			</div>	