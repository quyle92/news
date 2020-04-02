<?php
require_once "class/goc.php";
class tin extends goc {
	function TinNoiBat($from, $sotin, $lang) {
		$sql="SELECT idTin,TieuDe,Ngay,TomTat, urlHinh, loaitin.Ten as TenLT,TieuDe_KhongDau
		FROM tin, loaitin 
		WHERE tin.idLT=loaitin.idLT AND tin.AnHien=1 AND TinNoiBat=1 AND tin.lang='$lang'
		ORDER BY idTin DESC LIMIT $from, $sotin";
		$kq=$this->db->query($sql);
		if(!$kq) die('Lỗi trong hàm '.__FUNCTION__.' '. $this->db->error);
		return $kq;
	}
	
	function TinMoi($from,$sotin,$lang) {
		$sql="SELECT idTin,TieuDe,Ngay,TomTat, urlHinh, loaitin.Ten as TenLT, TieuDe_KhongDau 
		FROM tin, loaitin WHERE tin.idLT=loaitin.idLT AND tin.AnHien=1 AND TinNoiBat=1 AND tin.lang='$lang'
		ORDER BY idTin DESC LIMIT $from, $sotin";
		$kq=$this->db->query($sql);
		if(!$kq) die('Lỗi trong hàm '.__FUNCTION__.' '. $this->db->error);
		return $kq;	
	}
	
	function TinMoiTrong1Loai($idLT, $from, $sotin, $lang){
		$sql="SELECT idTin,TieuDe,Ngay,TomTat, urlHinh, TieuDe_KhongDau  
		 FROM tin WHERE idLT = $idLT AND AnHien=1 and lang='$lang' 
		 ORDER BY idTin DESC LIMIT $from, $sotin";
		$kq = $this->db->query($sql);
		if(!$kq) die('Lỗi trong hàm '.__FUNCTION__.' '. $this->db->error);
		return $kq;
	}

		
	function LayTenLoaiTin($idLT){
		$sql="SELECT Ten FROM loaitin WHERE idLT = $idLT";
		$kq = $this->db->query($sql);
		if(!$kq) die('Lỗi trong hàm '.__FUNCTION__.' '. $this->db->error);
	if ($kq->num_rows<=0) return "";
	   $row = $kq->fetch_row();
		$ten= $row[0];
		return $ten;
	}

	
	function TinNgauNhien ($sotin,$lang) {
		$sql="SELECT idTin,TieuDe,Ngay,TomTat, urlHinh, loaitin.Ten as TenLT, TieuDe_KhongDau 
		FROM tin, loaitin
		WHERE tin.idLT=loaitin.idLT AND tin.AnHien=1 and tin.lang='$lang'
		ORDER BY rand() LIMIT 0, $sotin";//nếu index thấy  error liên quan tới hàm thì echo $sql xem sai cái gì
		$kq=$this->db->query($sql);
		if (!$kq) die ('Lỗi trong hàm '.__FUNCTION__.' '.$this->db->error);
		return ($kq);// if "return" is obmitted, this function has nothing to show up and when open indedx.php, it'll has error "Call to a member function fetch_assoc() on null in"
	}
	
	function ListLoaiTin($lang) {
		$sql="SELECT idLT, Ten as TenLT FROM loaitin WHERE lang='$lang' AND AnHien=1 
		ORDER BY ThuTu";
		$kq=$this->db->query($sql);
		if(!$kq) die ('Lỗi trong hàm '.__FUNCTION__.' '.$this->db->error);
		return $kq;
	}
	
	function  ListTags ($lang) {
		$sql="SELECT idTag, TenTag FROM tags WHERE lang='$lang' AND AnHien=1
		ORDER BY ThuTu";
		$kq=$this->db->query($sql);
		if (!$kq) die ('Lỗi trong hàm '.__FUNCTION__.' '.$this->db->error);
		return $kq;
	}
	
	function TinXemNhieu ($from,$sotin,$lang) {
		$sql="SELECT idTin,TieuDe,Ngay,TomTat, urlHinh, loaitin.Ten as TenLT,TieuDe_KhongDau 
		FROM tin, loaitin
		WHERE tin.idLT=loaitin.idLT AND tin.AnHien=1 AND tin.lang='$lang' 
		ORDER BY SoLanXem DESC LIMIT $from, $sotin";//"lang" must specify table name before it  otherwise it will show "ambiguous" error.
		$kq=$this->db->query($sql);
		if (!$kq) die ('Lỗi trong hàm '.__FUNCTION__.' '.$this->db->error);
		return $kq;
			
	}
	
	function TinMoiCoPhanHoi($from,$sotin,$lang) {
		$sql="SELECT idTin,TieuDe,Ngay,TomTat, urlHinh, loaitin.Ten as TenLT, TieuDe_KhongDau 
		FROM tin, loaitin
		WHERE tin.idLT=loaitin.idLT AND tin.AnHien=1 AND tin.lang='$lang' 
		AND idTin in (
			SELECT DISTINCT idTin FROM YKien ORDER By Ngay DESC)
			ORDER BY idTin ASC LIMIT $from, $sotin";
		$kq=$this->db->query($sql);
		if (!$kq) die ('Lỗi trong hàm '.__FUNCTION__.' '.$this->db->error);
		return $kq;
	}
	
	function ListTheLoai($lang){
	$sql="SELECT idTL, TenTL  FROM theloai
	  WHERE AnHien=1 AND lang='$lang' ORDER BY ThuTu ";
	$kq = $this->db->query($sql);
	if(!$kq) die('Lỗi trong hàm '.__FUNCTION__.' '. $this->db->error);
	return $kq;
	}

	
	function ListLoaiTinTrong1TheLoai ($idTL,$lang) {
		$sql="SELECT idLT, Ten, Ten_KhongDau  FROM loaitin WHERE AnHien=1 AND idTL=$idTL AND lang='$lang' ORDER BY ThuTu";//thiếu "AND" sẽ sai, vì $lang là 1 parameter trong function này nên phải có "lang=$lang" trong $sql, otherwise ko cần.
		$kq=$this->db->query($sql);
		if (!$kq) die('Lỗi trong hàm '.__FUNCTION__.' '.$this->db->error);
		return $kq;
	}
	
	function TinMoiNhan($sotin, $lang) {
		$sql="SELECT idTin,TieuDe, Ngay, TieuDe_KhongDau 
		FROM tin WHERE  lang='$lang' ORDER BY idTin DESC LIMIT 0,$sotin";
		$kq=$this->db->query($sql);
		if (!$kq) die('Lỗi trong hàm '.__FUNCTION__.' '.$this->db->error);
		return $kq;
		
	}
	
	function ChiTietTin($idTin) {
		settype($idTin,"int");
		$sql="SELECT idTin, TieuDe, TomTat, Ngay, urlHinh, Content, SoLanXem, 
	tin.idLT, Ten, tin.idTL, TenTL, TieuDe_KhongDau  FROM tin,loaitin,theloai WHERE tin.idLT=loaitin.idLT AND loaitin.idTL=theloai.idTL
	AND idTin=$idTin";
		$kq=$this->db->query($sql);
		if (!$kq) die('Lỗi trong hàm '.__FUNCTION__.' '.$this->db->error);
		if ($kq->num_rows<=0) return FALSE;
		return $kq->fetch_assoc();
	}
	
	function CapNhatSolanXemTin($idTin) {
		settype($idTin,"int");
		$sql="UPDATE tin SET SoLanXem=SoLanXem+1 WHERE idTin=$idTin";
		$this->db->query($sql);
	}
	
	function TinCuCungLoai($idTin, $lang, $sotin = 5){		
	$sql="SELECT idTin, TieuDe, TomTat, urlHinh, Ngay, SoLanXem, TieuDe_KhongDau 
	FROM  tin 
	WHERE AnHien = 1 AND idTin<$idTin AND  lang ='$lang' 
	AND idLT = (SELECT idLT FROM tin WHERE idTin = $idTin)
	ORDER BY idTin DESC  LIMIT 0, $sotin";		
	$kq = $this->db-> query($sql);
	if(!$kq) die( 'Lỗi trong hàm ' . __FUNCTION__. '  '. $this-> db->error);
	return $kq;	
}

	
	function LuuYKien($idTin, $hoten,$email, $noidung, &$loi){
		$loi="";
		settype($idTin, "int");
		$hoten = $this->db->escape_string(trim(strip_tags($hoten)));
		$email = $this->db->escape_string(trim(strip_tags($email)));
		$noidung = $this->db->escape_string(trim(strip_tags($noidung)));
		if ($hoten=="") $loi.="Ban chưa nhập họ tên<br>";
		if ($email=="") $loi.="Ban chưa nhập email<br>";
		if ($noidung=="") $loi.="Ban chưa nhập nội dung ý kiến<br>";
		//if (strlen($noidung)<10) $loi.="Nội dung ý kiến quá ngắn<br>";
		//if ($loi!="") return FALSE;
		
		$sql="INSERT INTO ykien (idTin, HoTen, Email, NoiDung, Ngay) VALUES 
	   ($idTin,'$hoten', '$email', '$noidung', NOW())";		
		$kq = $this->db-> query($sql);
		if(!$kq) die( 'Lỗi trong hàm ' . __FUNCTION__. '  '. $this-> db->error);
		return $kq;		
	}

	function LayCacYKienCua1Tin ($idTin) {
		$sql="SELECT idYKien, HoTen, NoiDung, Ngay  FROM ykien WHERE idTin=$idTin AND AnHien=1 ORDER BY Ngay DESC";
		$kq=$this->db->query($sql);
		if (!$kq) die ( 'Lỗi trong hàm ' . __FUNCTION__. '  '. $this-> db->error);
		return $kq;	
	}
	
	function TinTrongLoai($idLT, $pageNum,$pageSize,&$totalRows){
		$startRow=($pageNum-1)*$pageSize;
		$sql="SELECT idTin, TieuDe, TomTat, urlHinh, Ngay, SoLanXem, TieuDe_KhongDau 
		FROM tin WHERE AnHien=1 AND idLT=$idLT
		ORDER By idTin  DESC LIMIT $startRow,$pageSize";
		$kq=$this->db->query($sql);
		if (!$kq) die($this-> db->error);//thiếu "die" sẽ lỗi "Call to a member function fetch_assoc() on boolean "
			
		$sql="SELECT count(*) FROM tin WHERE AnHien=1 AND idLT=$idLT";
		$rs=$this->db->query($sql);
		$row_rs=$rs->fetch_row();
		$totalRows=$row_rs[0];
		return $kq;
		
	}
	
		function TinTrongTag($tag, $pageNum,$pageSize,&$totalRows){
		$startRow=($pageNum-1)*$pageSize;
		$sql="SELECT idTin, TieuDe, TomTat, urlHinh, Ngay, SoLanXem, TieuDe_KhongDau 
		FROM tin WHERE AnHien=1 AND tags like '%$tag%'
		ORDER By idTin  DESC LIMIT $startRow,$pageSize";
		$kq=$this->db->query($sql);
		if (!$kq) die($this-> db->error);//thiếu "die" sẽ lỗi "Call to a member function fetch_assoc() on boolean "
			
		$sql="SELECT count(*) FROM tin WHERE AnHien=1 AND tags like '%$tag%'";
		$rs=$this->db->query($sql);
		$row_rs=$rs->fetch_row();
		$totalRows=$row_rs[0];
		return $kq;
		
	}
	
	function getTitle($p) {
		if ($p=='') return "Tin Tức Tổng Hợp";
		elseif ($p=='search') return "Tìm Kiếm Tin";
		elseif ($p=='detail') {
			$TieuDe_KhongDau =$_GET['TieuDe_KhongDau'];
			$TieuDe_KhongDau=$this->db->escape_string(trim(strip_tags($TieuDe_KhongDau)));
			$sql="SELECT TieuDe FROM tin WHERE TieuDe_KhongDau='$TieuDe_KhongDau'";
			$kq=$this->db->query($sql);
			if (!$kq) die ($this->db->error);
			if ($kq->num_rows<=0) return "Tin tức Tồng Hợp";
			$row_kq=$kq->fetch_row();
			return $row_kq[0];
					
		}
		elseif ($p=="cat") {
			$Ten_KhongDau=$_GET['Ten_KhongDau'];
			$Ten_KhongDau=$this->db->escape_string(trim(strip_tags($Ten_KhongDau)));
			$kq=$this->db->query("SELECT Ten FROM loaitin Where Ten_KhongDau='$Ten_KhongDau'");
			if (!$kq) die ($this->db->error);
			if ($kq->num_rows<=0)  return "Tin Tức Tổng Hợp";
			$row_kq=$kq->fetch_row();
			return $row_kq[0];
					
			
	}
	}
	
	function TimKiem($tukhoa, &$totalRows, $pageNum=1, $pageSize=5) {
		$startRows=($pageNum-1)*$pageSize;
		$sql="SELECT idTin, TieuDe, TomTat, urlHinh, Ngay, SoLanXem, Ten, TenTL, TieuDe_KhongDau 
		FROM tin, loaitin, theloai 
		WHERE tin.idLT = loaitin.idLT AND tin.idTL = theloai.idTL AND tin.AnHien=1 
		AND (TieuDe REGEXP '$tukhoa' OR TomTat REGEXP '$tukhoa') ORDER BY idTin DESC 
		LIMIT $startRows, $pageSize";
		$kq=$this->db->query($sql);
		if (!$kq) die ('Lỗi trong hàm ' . __FUNCTION__. '  '. $this-> db->error);
		
		$sql="SELECT count(*) FROM tin,loaitin,theloai 
		WHERE tin.idLT=loaitin.idLT AND loaitin.idTL=theloai.idTL AND AnHien=1
		AND (TieuDe REGEXP '$tukhoa' OR TomTat REGEXP '$tukhoa')";
		$rs=$this->db->query($sql);
		if (!$rs) die ('Lỗi trong hàm ' . __FUNCTION__. '  '. $this-> db->error);
		$rs_row=$rs->fetch_row();
		$totalRows=$rs_row[0];
		return $kq;
		
	}
	
	function LayidTin($TieuDe_KhongDau) {
		$TieuDe_KhongDau=$this->db->escape_string(trim(strip_tags($TieuDe_KhongDau)));
		$sql="SELECT idTin FROM tin WHERE TieuDe_KhongDau='$TieuDe_KhongDau'";
		$kq=$this->db->query($sql);
		$row_kq=$kq->fetch_assoc();
		return $row_kq['idTin'];
		
	}
	
	function LayidLT($Ten_KhongDau){
	   $Ten_KhongDau = trim(strip_tags($_GET['Ten_KhongDau']));
	   $Ten_KhongDau = $this->db->escape_string($Ten_KhongDau);
	   $sql="select idLT from loaitin where Ten_KhongDau='$Ten_KhongDau'";
	   $kq = $this->db->query($sql);
	   if(!$kq) die( $this-> db->error);
	   $row_kq = $kq->fetch_assoc();
	   $idLT= $row_kq['idLT'];
	   return $idLT;
	}
	
	function GuiMail($to, $from, $from_name, $subject, $body, $username, $password, &$error){ 
   $error="";
   require_once "class/class.phpmailer.php";      
   require_once "class/class.smtp.php";      
   try {
      $mail = new PHPMailer();  
      $mail->IsSMTP(); 
      $mail->SMTPDebug = 0;  //  1=errors and messages, 2=messages only
      $mail->SMTPAuth = true;  
      $mail->SMTPSecure = 'ssl'; 
      $mail->Host = 'smtp.gmail.com';
      $mail->Port = 465; 
      $mail->Username = $username;  
      $mail->Password = $password;           
      $mail->SetFrom($from, $from_name);
      $mail->Subject = $subject;
      $mail->MsgHTML($body);// noi dung chinh cua mail
      $mail->AddAddress($to);
      $mail->CharSet="utf-8";
      $mail->IsHTML(true);   
      $mail->SMTPOptions = array(
			'ssl' => array(
				'verify_peer' => false,
				'verify_peer_name' => false,
				'allow_self_signed' => true
	    ));
      if(!$mail->Send()) {$error='Loi:'.$mail->ErrorInfo; return false;}
      else { $error = ''; return true; }
   } 
   catch (phpmailerException $e) { echo "<pre>".$e->errorMessage(); }    

	}
} //tin
?>