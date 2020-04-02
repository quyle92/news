        <div class="container-fluid">
         
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                QUẢN TRỊ Users
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>idUser</th>
                                            <th>HoTen</th>
                                            <th>Username</th>
                                            <th width="40">Password</th>
											<th>Cập nhật/Xóa</th>
											
                                            <th>DiaChi/Dienthoai/Email/NgayDangKy/NgaySinh/GioiTinh</th>
                                           
											
											
											
										
											<th>idGroup</th>
											<th>urlHinh</th>
											<th>active</th>
											<th>randomkey</th>

                                        </tr>
                                    </thead>
                              
                                    <tbody>
									     <?php $kq=$qt->ListUsers();?>
									<?php while ($rowUsers = $kq->fetch_assoc() ) { ?>
                                        <tr>
                                            <td><?=$rowUsers['idUser']?></td>
                                            <td><?=$rowUsers['HoTen']?></td>
                                            <td><?=$rowUsers['Username']?></td>
                                            <td><?=($rowUsers['Password'])?></td>
																						
											<td>
												<a href="index.php?p=users_them?idUser=<?=$rowUsers['idUser']?>"class="btn bg-blue waves-effect">Cập nhật</a>
												<a href="users_xoa.php?idUser=<?=$rowUsers['idUser']?>"class="btn bg-red waves-effect">Xóa</a>
											</td>
                                            <td>
												<p>Địa chỉ: <?=$rowUsers['DiaChi']?></p>
												<p>Tel: <?=$rowUsers['Dienthoai']?></p>
												<p>Email: <?=$rowUsers['Email']?></p>
												<p>Ngày Đăng Ký: <?=date('d-m-Y',strtotime($rowUsers['NgayDangKy']))?></p>
												<p>Ngày Sinh: 
												<?php if ($rowUsers['NgaySinh']!="0000-00-00") 
													echo  date('d-m-Y',strtotime($rowUsers['NgaySinh']));
												?>
												</p>
												<p>Giới Tính: <?=($rowUsers['GioiTinh'])==1?"Nam":"Nữ"?></p>
											</td>
                                            

											<td><?=($rowUsers['idGroup'])?"Admin":"Thường"?></td>
											
											
											<td><?=$rowUsers['urlHinh']?></td>
											<td><?=$rowUsers['active']?></td>
											<td><?=$rowUsers['randomkey']?></td>

											 
											 
                                        </tr>
										 <?php } ?>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                        </tr>
                                    </tbody>
								  
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
          
        </div>
	<!-- JQuery DataTable Css -->
<link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
	
    <!-- Jquery DataTable Plugin Js -->
    <script src="plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="plugins/jquery-datatable/exHoTen sions/export/dataTables.buttons.min.js"></script>
    <script src="plugins/jquery-datatable/exHoTen sions/export/buttons.flash.min.js"></script>
    <script src="plugins/jquery-datatable/exHoTen sions/export/jszip.min.js"></script>
    <script src="plugins/jquery-datatable/exHoTen sions/export/pdfmake.min.js"></script>
    <script src="plugins/jquery-datatable/exHoTen sions/export/vfs_fonts.js"></script>
    <script src="plugins/jquery-datatable/exHoTen sions/export/buttons.html5.min.js"></script>
    <script src="plugins/jquery-datatable/exHoTen sions/export/buttons.print.min.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/tables/jquery-datatable.js"></script>