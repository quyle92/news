<?php 
if (isset($_POST['name']) ==true){
$ht=htmlentities(trim(strip_tags($_POST['name'])),ENT_QUOTES,'utf-8');
$m=htmlentities(trim(strip_tags($_POST['email'])),ENT_QUOTES,'utf-8');
$td=htmlentities(trim(strip_tags($_POST['subject'])),ENT_QUOTES,'utf-8');
$nd=htmlentities(trim(strip_tags($_POST['message'])),ENT_QUOTES,'utf-8');
$nd= nl2br($nd);
$loi="";
if ($ht=="") $loi.="Bạn chưa nhập họ tên<br>";
if ($m=="") $loi.="Bạn chưa nhập email<br>";
if ($nd=="") $loi.="Bạn chưa nhập nội dung liên hệ<br>";
else if (strlen($nd)<=10) $loi.="Nội dung liên hệ quá ngắn<br>";
if ($loi==""){
   $to ="free2idol@gmail.com"; 
   $from="steven.ng.mmo@gmail.com";
   $pass="free2idol";
   $topText="Họ tên: {$ht}<br>Email: {$m}<br>Tiêu đề: {$td}" ;
   $nd = $topText."<br>Nội dung:<hr>".$nd;		
   $error="";//Allow less secure apps: ON mới nhận email đc
   $t->GuiMail($to, $from,$fromName="BQT",$td,$nd,$from,$pass,$error);
   if ($error!="") $loi=$error;
   else {
       $_SESSION['camon'] ="Cảm ơn bạn. Ý kiến đã được ghi nhận";
       echo "<script>document.location='/news/lien-he/';</script>";
       exit();
   }
}
}
?>
<div id="thongbaoLH" style="background:#ccc;color:red; padding:20px; text-align:center;line-height:150%; margin-top:10px">
<?php 
    if ($loi!="") echo $loi;
    if (isset($_SESSION['camon'])==true) {
        echo $_SESSION['camon'] ; unset($_SESSION['camon']); }
	?>
</div>
<?php if (isset($_SESSION['camon'])==false) {?>
<?php } ?>

<div class="row page_margin_top_section">
								<h4 class="box_header">
									Liên hệ với chúng tôi
								</h4>
								<p class="padding_top_30">Chúng tôi rất vui lòng khi tiếp nhận các ý kiến phản hồi, những mong muốn của bạn, những tin tức từ bạn. Những thông tin từ bạn sẽ giúp chúng tôi hoàn thiện hơn, thông tin nhanh chóng hơn.</p>
								<form class="contact_form margin_top_15" id="contact_form" method="post" action="">
									<fieldset class="column column_1_3">
										<div class="block">
											<input class="text_input" name="name" type="text" value="<?=(isset($_POST['name']))?$_POST['name']:''?>" placeholder="Your Name *"> 
										</div>
									</fieldset>
									<fieldset class="column column_1_3">
										<div class="block">
											<input class="text_input" name="email" type="text" value="<?=(isset($_POST['email']))?$_POST['email']:''?>" placeholder="Your Email *">
										</div>
									</fieldset>
									<fieldset class="column column_1_3">
										<div class="block">
											<input class="text_input" name="subject" type="text" value="<?php if (isset($_POST['subject']) ) echo $_POST['subject']?>" placeholder="Subject">
										</div>
									</fieldset>
									<fieldset>
										<div class="block">
											<textarea name="message" placeholder="Message *">: <?=(isset($_POST[' message ']))?$_POST['message']:''?></textarea>
										</div>
									</fieldset>
									<fieldset>
										<input type="hidden" name="action" value="contact_form" />
										<input type="submit" name="submit" value="SEND MESSAGE" class="more active">
									</fieldset>
								</form>
</div>