<?php
require "../class/goc.php";
class quantritin extends goc  {

	function thongtinuser($u, $p){
		$u=$this->db->escape_string(trim(strip_tags($u)));
		$p=md5($this->db->escape_string(trim(strip_tags($p))));
	echo $sql="SELECT * FROM users WHERE Username='$u' AND Password='$p'";
		$kq = $this->db->query($sql); 
		if ($kq->num_rows<1) { $_SESSION['error']="Sai ID hoặc PASS"; return false;}
		//else return $kq;
	}

	function checkLogin() {
		if (isset($_SESSION['login_id'])==false) {
			$_SESSION['error']="Chưa log in!";
			$_SESSION['back']='http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
			header('location: login.php');
			exit();
		}
		else if ($_SESSION['login_level']!=1) {
			$_SESSION['error']="Ko được quyền vào đây!";
			$_SESSION['back']='http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
			header('location: login.php');
			exit();
		}
	}
	 
	
	function ListTheLoai(){
	   $sql="SELECT idTL,TenTL,ThuTu,AnHien,TenTL_KhongDau,lang FROM theloai ORDER BY ThuTu";
	   $kq = $this->db->query($sql) ;
	   if(!$kq) die( $this-> db->error);
	   return $kq; 
	}

		 
	function TheLoai_Them($TenTL, $TenTL_KD, $ThuTu,$AnHien,$lang){
		$TenTL=$this->db->escape_string(trim(strip_tags($TenTL)));
		$TenTL= mb_convert_case($TenTL, MB_CASE_TITLE, "UTF-8");
		$TenTL_KD=$this->db->escape_string(trim(strip_tags($TenTL_KD)));
		if ($TenTL_KD == NULL OR $TenTL_KD == "") $TenTL_KD=$this->changeTitle($TenTL);
		settype($ThuTu,'int');
		settype($AnHien,'int');
		$sql="INSERT INTO theloai (TenTL, TenTL_KhongDau, ThuTu,AnHien,lang) VALUES ('$TenTL', '$TenTL_KD', $ThuTu,$AnHien,'$lang')";
		$kq=$this->db->query($sql);
		if(!$kq) die( $this-> db->error);
	}
	
	function changeTitle($str){
		$str = $this->stripUnicode($str);
		$str = $this->stripSpecial($str);
		$str = mb_convert_case($str , MB_CASE_LOWER , 'utf-8');
		return $str;
	}

	function stripSpecial($str){
	   $arr = array(",","$","!","?","&","'",'"',"+");
		$str = str_replace($arr,"",$str);
		$str = trim($str);
	    while (strpos($str,"  ")>0) $str = str_replace("  "," ",$str);
		$str = str_replace(" ","-",$str);
		return $str;
	}

	function stripUnicode($str){
		if(!$str) return false;
		$unicode = array(
		 'a'=>'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
		 'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
		 'd'=>'đ','D'=>'Đ',
		 'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ', 'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
		 'i'=>'í|ì|ỉ|ĩ|ị', 'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
		 'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
		 'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
		 'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự', 'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
		 'y'=>'ý|ỳ|ỷ|ỹ|ỵ', 'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ'
		);
		foreach($unicode as $khongdau=>$codau) {
		  $arr = explode("|",$codau);
		  $str = str_replace($arr,$khongdau,$str);
		}
		    return $str;
	}
		
	function TheLoai_ChiTiet($idTL){
		$sql="SELECT TenTL, TenTL_KhongDau, ThuTu,AnHien,lang FROM theloai WHERE idTL=$idTL";
		$kq=$this->db->query($sql);
		if (!$kq) die ($this->db->error);
		return $kq;
	}
	function TheLoai_DemTin($idTL){
		

		}
	function TheLoai_Sua($idTL, $TenTL, $TenTL_KD, $ThuTu,$AnHien,$lang){
		$TenTL=$this->db->escape_string(trim(strip_tags($TenTL)));
		$TenTL= mb_convert_case($TenTL, MB_CASE_TITLE, "UTF-8");
		$TenTL_KD=$this->db->escape_string(trim(strip_tags($TenTL_KD)));
		if ($TenTL_KD == NULL OR $TenTL_KD == "") echo  "SS".$TenTL_KD=$this->changeTitle($TenTL);
		settype($ThuTu,'int');
		settype($AnHien,'int');
		echo $sql="UPDATE theloai SET TenTL='$TenTL', TenTL_KhongDau='$TenTL_KD', ThuTu=$ThuTu,AnHien=$AnHien,lang='$lang' WHERE idTL=$idTL	 ";
		$kq=$this->db->query($sql);
		if (!$kq) die ($this->db->error);
	}
	
	function TheLoai_Xoa($idTL){
		echo $sql="DELETE FROM theloai WHERE idTL=$idTL";
		$kq=$this->db->query($sql);
		if (!$kq) die ($this->db->error);
		return $kq;
	}
	
	function DemTinTrongTheLoai($idTL){
		$sql="SELECT count(*) FROM tin WHERE idTL=$idTL";
		$kq=$this->db->query($sql);
		if (!$kq) die ($this->db->error);
		$row=$kq->fetch_row();
		return $row[0];
	}
	
	function ListLoaiTIn(){
		$sql="SELECT * FROM theloai, loaitin WHERE theloai.idTL=loaitin.idTL ORDER BY loaitin.ThuTu DESC";
	   $kq = $this->db->query($sql);
	   if(!$kq) die( $this-> db->error);
	   return $kq; 
	}

	function LoaiTin_Them($Ten, $Ten_KD, $ThuTu,$AnHien,$idTL,$lang){
		$Ten=$this->db->escape_string(trim(strip_tags($Ten)));
		$Ten=mb_convert_case($Ten,MB_CASE_TITLE, "UTF-8");
		$Ten_KD=$this->db->escape_string(trim(strip_tags($Ten_KD)));
		if (isset($Ten_KD)==false) $Ten_KD=$this->changeTitle($Ten);
		settype($ThuTu,'int');
		settype($AnHien,'int');
		settype($idTL,'int');
		echo $sql="INSERT INTO loaitin(Ten,Ten_KhongDau, ThuTu,AnHien,idTL,lang) VALUES('$Ten', '$Ten_KD', $ThuTu,$AnHien,$idTL,'$lang') ";
		$kq = $this->db->query($sql) ;
		if(!$kq) die( $this-> db->error);
		return $kq; 

}

	function LoaiTin_ChiTiet($idLT){
	   $sql="SELECT idLT,Ten,ThuTu,AnHien,Ten_KhongDau,idTL,lang 
	   FROM loaiTin 
	   WHERE idLT=$idLT";
	   $kq = $this->db->query($sql) ;
	   if(!$kq) die( $this-> db->error);
	   return $kq; 
	}
	function LoaiTin_Sua($Ten, $Ten_KD, $ThuTu,$AnHien,$idTL,$idLT,$lang){
		$Ten = $this->db->escape_string(trim(strip_tags($Ten)));
		$Ten_KD= $this->db->escape_string(trim(strip_tags($Ten_KD)));
		if ($Ten_KD=="") $Ten_KD = $this->changeTitle($Ten);
		$lang= $this->db->escape_string(trim(strip_tags($lang)));
		settype($ThuTu,"int");
		settype($AnHien,"int");
		settype($idTL,"int");
		settype($idLT,"int");
		$sql="UPDATE loaitin SET Ten='$Ten', Ten_KhongDau='$Ten_KD', 
		ThuTu=$ThuTu, AnHien=$AnHien, idTL=$idTL, lang='$lang'
		WHERE idLT=$idLT";
		$kq= $this->db->query($sql) ;
		if(!$kq) die( $this-> db->error);
	}

	function LoaiTin_Xoa  ($idLT) {
		$sql="DELETE FROM loaitin WHERE idLT=$idLT";
		$kq=$this->db->query($sql);
		if (!$kq) die ($this->db->error);
		return $kq;
	}

	function DemTinTrongLoai ($idLT) {
		$sql="SELECT count(*) FROM tin WHERE idLT=$idLT";// count(*) phải có ()
		$kq=$this->db->query($sql);
		$row=$kq->fetch_row();
		return $row[0];
	}

	function ListTin($idTL ,$idLT ){
	   $sql="SELECT idTin,TieuDe,TomTat,tin.AnHien, tin.lang, TinNoiBat,
	   Ngay, SoLanXem, TenTL,Ten FROM tin, loaitin, theloai 
		  WHERE tin.idLT=loaitin.idLT AND loaitin.idTL=theloai.idTL
		  AND ($idTL=-1 OR tin.idTL=$idTL) 
		AND ($idLT=-1 OR tin.idLT=$idLT) 
		  ORDER BY idTin Desc";
	   $kq = $this->db->query($sql) ;
	   if(!$kq) die( $this-> db->error);
	   return $kq; 
	}
	
	function LoaiTinTrongTheLoai($idTL){
	 $sql="SELECT idLT,Ten FROM loaitin WHERE idTL=$idTL ";
	 $kq = $this->db->query($sql) ;
	 if(!$kq) die( $this-> db->error);
	 return $kq; 
	}

	function Tin_Them ($TD,$TD_KD,$TT,$urlHinh,$AnHien,$TNB,$lang,$tags,$Ngay,$idTL,$idLT,$ND) {
		$TD=$this->db->escape_string(trim(strip_tags($TD)));
		$TD_KD=$this->db->escape_string(trim(strip_tags($TD_KD)));
		if ($TD_KD=="") $TD_KD=$this->stripSpecial($TD);
		$TT=$this->db->escape_string(trim(strip_tags($TT)));
		$ND = $this->db->escape_string($ND);
		$tags = $this->db->escape_string(trim(strip_tags($tags)));
		$lang = $this->db->escape_string(trim(strip_tags($lang)));
		$arr=explode("/",$Ngay);
		if (count($arr)==3) {$Ngay=$arr[2]."-".arr[1]."-".arr[0];} 
		ELSE date("Y-m-d");
		$idUser=$_SESSION['login_id'];
		settype($AnHien,"int");
		settype($TNB,"int");
		settype($idTL,"int");
		settype($idTL,"int");
		$sql="INSERT INTO tin SET TieuDe='$TD',TieuDe_KhongDau='$TD_KD',TomTat='TT',urlHinh='$urlHinh',AnHien='$AnHien',TinNoiBat='$TNB',lang='$lang',tags='$tags',Ngay='$Ngay',idTL='$idTL',idLT='$idLT',Content='$ND' ";
		$kq=$this->db->query($sql);
		if (!$kq) die($this->db->error);	

	}
		

	function Tin_ChiTiet ($idTin) {
		$sql="SELECT * FROM tin WHERE idTin=$idTin";
		$kq=$this->db->query($sql);
		if (!$kq) die($this->db->error);
		return $kq;
	}
	
	function Tin_Sua ($TD,$TD_KD,$TT,$urlHinh,$AnHien,$TNB,$lang,$tags,$Ngay,$idTL,$idLT,$ND) {
		$TD=$this->db->escape_string(trim(strip_tags($TD)));
		$TD_KD=$this->db->escape_string(trim(strip_tags($TD_KD)));
		if ($TD_KD=="") $TD_KD=$this->stripSpecial($TD);
		$TT=$this->db->escape_string(trim(strip_tags($TT)));
		$ND = $this->db->escape_string($ND);
		$tags = $this->db->escape_string(trim(strip_tags($tags)));
		$lang = $this->db->escape_string(trim(strip_tags($lang)));
		$arr=explode("/",$Ngay);
		if (count($arr)==3) {$Ngay=$arr[2]."-".arr[1]."-".arr[0];} 
		ELSE date("Y-m-d");
		$idUser=$_SESSION['login_id'];
		settype($AnHien,"int");
		settype($TNB,"int");
		settype($idTL,"int");
		settype($idTL,"int");
		$sql="UPDATE tin SET TieuDe='$TD',TieuDe_KhongDau='$TD_KD',TomTat='TT',urlHinh='$urlHinh',AnHien='$AnHien',TinNoiBat='$TNB',lang='$lang',tags='$tags',Ngay='$Ngay',idTL='$idTL',idLT='$idLT',Content='$ND' ";
		$kq=$this->db->query($sql);
		if (!$kq) die($this->db->error);	

	}
	
	function Tin_Xoa($idTin) {
		$sql="DELETE  FROM tin WHERE idTin=$idTin";
		$kq=$this->db->query($sql);
		if (!$kq) die ($this->db->error);
		return $kq;
	}
	
	function  DemYKienTrongTin ($idTin) {
		$sql="SELECT count(*) FROM ykien WHERE idtin=$idTin";//count(*) phải viết liền nhau, no space in-between. Nếu ko sẽ hiện lỗi Fatal error: Call to a member function fetch_row() on boolean
		$kq=$this->db->query($sql);
		$row=$kq->fetch_row();
		return $row[0];
	}
	
	function ListUsers() {
		$sql="SELECT * FROM users ORDER BY idGroup DESC";
		$kq=$this->db->query($sql);
		return $kq;
	}
	
	function Users_Them($HoTen,$Username,$Password,$Email,$DiaChi,$Dienthoai,$NgayDangKy,$NgaySinh,$idGroup,$GioiTinh) {
		$HoTen=$this->db->escape_string(trim(strip_tags($HoTen)));
		$Username=$this->db->escape_string($Username);
		$Password=$this->db->escape_string($Password);
		$Password=md5($Password);
		$Email=$this->db->escape_string(trim(strip_tags($Email)));
		$DiaChi=$this->db->escape_string(trim(strip_tags($DiaChi)));
		settype($Dienthoai,"int");
		$akk=explode('-',$NgayDangKy);
		$NgayDangKy=$akk[2]."-".$akk[1]."-".$akk[0];
		$arr=explode('/',$NgaySinh);
		if (count($arr)==3) {$NgaySinh=$arr[2]."-".$arr[1]."-".$arr[0];}
		ELSE $NgaySinh=NULL;
		settype($idGroup,"int");
		settype($GioiTinh,"int");
		$sql="INSERT INTO users SET HoTen='$HoTen',Username='$Username',Password='$Password',Email='$Email',DiaChi='$DiaChi',Dienthoai='$Dienthoai',NgayDangKy='$NgayDangKy',NgaySinh='$NgaySinh',idGroup='$idGroup',GioiTinh='$GioiTinh'";
		$kq=$this->db->query($sql);
		if (!$kq) die($this->db->error);
	}

//function
}
?>
