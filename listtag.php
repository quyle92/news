<?php $kq=$t->ListTags ($lang);	 ?>
	<h4 class="box_header page_margin_top_section">Tags</h4>
						<?php while ($row=$kq->fetch_assoc()) { ?>
							<ul class="taxonomies clearfix page_margin_top">
								<li>
									<a href="<?=BASE_URL?>tag/<?=$row['TenTag']?>/" title="<?=$row['TenTag']?> "><?=$row['TenTag']?> </a>
								</li>
								<?php	}
						?>
							</ul>