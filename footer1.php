<?php ob_start() ?>
						<div class="column column_1_3">
							<h4 class="box_header">{Ve_Chung_Toi}</h4>
							<p class="padding_top_bottom_25">thành  Tin tức hàng ngày hàng giờ, đủ mọi lĩnh vực, đủ các loại thượng vàng hạ cám hằm bà lằn, tổng hợp nhanh, trên khắp mọi miền.</p>
							<div class="row">
								<div class="column column_1_2">
									<h5>{Dia_Chi}</h5>
									<p>
										123 Cung Vàng<br>
										Phường Điện Ngọc,<br>
										Thành phố Trăng Vàng
									</p>
								</div>
								<div class="column column_1_2">
									<h5>ĐT : 0918 123 456</h5>
									<p>
										Phone: 1-800-64-38<br>
										Fax: 1-800-64-39
									</p>
								</div>
							</div>
							<h4 class="box_header page_margin_top">Liên hệ với chúng tôi qua các kênh</h4>
							<ul class="social_icons dark page_margin_top clearfix">
								<li>
									<a target="_blank" title="" href="http://facebook.com/QuanticaLabs" class="social_icon facebook">
										&nbsp;
									</a>
								</li>
								<li>
									<a target="_blank" title="" href="https://twitter.com/QuanticaLabs" class="social_icon twitter">
										&nbsp;
									</a>
								</li>
								<li>
									<a title="" href="mailto:contact@pressroom.com" class="social_icon mail">
										&nbsp;
									</a>
								</li>
								<li>
									<a title="" href="#" class="social_icon skype">
										&nbsp;
									</a>
								</li>
								<li>
									<a title="" href="http://themeforest.net/user/QuanticaLabs?ref=QuanticaLabs" class="social_icon envato">
										&nbsp;
									</a>
								</li>
								<li>
									<a title="" href="#" class="social_icon instagram">
										&nbsp;
									</a>
								</li>
								<li>
									<a title="" href="#" class="social_icon pinterest">
										&nbsp;
									</a>
								</li>
							</ul>
						</div>
<?php
$str=ob_get_clean();
require "lang_$lang.php";
$str=str_replace("{Ve_Chung_Toi}",Ve_Chung_Toi,$str);
$str=str_replace ("{Dia_Chi}",Dia_Chi,$str);
echo $str;
?>