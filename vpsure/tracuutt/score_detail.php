<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "../admincontent/ewcfg6.php" ?>
<?php include "../admincontent/ewmysql6.php" ?>
<?php include "../admincontent/phpfn6.php" ?>
<?php include "../admincontent/userinfo.php" ?>
<?php include "../admincontent/userfn6.php" ?>
<?php error_reporting (E_ALL ^ E_NOTICE); 
      ini_set( 'display_errors', 'off' );
?>
	 <style type="text/css" title="currentStyle">
                            @import "media/css/demo_page.css";
                            @import "media/css/demo_table.css";
                    </style>
                    <script type="text/javascript"  src="media/js/jquery.js" ></script>
                    <script type="text/javascript"  src="media/js/jquery.dataTables.js"/></script>
                    <script type="text/javascript" charset="utf-8">
                            $(document).ready(function() {
                                    $('.dataTable').dataTable();
                                    
                            } );
                    </script>
                    
     
<?php
 $result = $_SESSION['result_core'] ;
if ($_POST["data"] == "1")
  {
?>
  <div id="abc">                    
<table style="width: 100%;margin: 10px 0px 10px 0px">
    <tr>
        <td colspan="4" style="text-align: center">
             <h2 style="font-weight: bold;color:black;font-size: 14px;margin:0px 0px 10px 0px">BẢNG ĐIỂM CHI TIẾT THEO THANG ĐIỂM 10 </h2>
            <?php  $_SESSION['header_title']  ='BẢNG ĐIỂM CHI TIẾT THEO THANG ĐIỂM 10';
                   $_SESSION['title']  ='BangDiemChiTietTheoThangDiem10';
            ?>
        </td>
    </tr>
    <tr>
        <td><span style="color: black;font-weight: bold; " > Họ tên:</span></td><td><?php echo $_SESSION['arraythongtin']['HoTen'] ?></td>
        <td><span style="color: black;font-weight: bold;">Tình trạng</span></td><td> <?php echo $_SESSION['arraythongtin']['TinhTrang'] ?></td>
    </tr>
    <tr>
        <td><span style="color: black;font-weight: bold">Ngày sinh:</span></td><td> <?php echo $_SESSION['arraythongtin']['NgaySinh'] ?></td>
        <td><span  style="color: black;font-weight: bold">Giới tính:</span></td><td> <?php echo $_SESSION['arraythongtin']['GioiTinh'] ?></td>
    </tr>
    <tr>
        <td><span style="color: black;font-weight: bold">Ngành học:</span></td><td> <?php echo $_SESSION['arraythongtin']['TenNganh'] ?></td>
        <td><span style="color: black;font-weight: bold">Khóa học:</span></td><td> <?php echo $_SESSION['arraythongtin']['TenKhoaHoc'] ?></td>
    </tr>
     <tr>
        <td style="width:80PX;"><span style="color: black;font-weight: bold" class="phead_tientrinh">Hệ đào tạo:</span></p></td><td> <?php echo $_SESSION['arraythongtin']['TenHeDaoTao'] ?></td>
        <td style="width: 130PX;"><span style="color: black;font-weight: bold" class="phead_tientrinh">Hình thức đào tạo:</span></td><td> <?php echo $_SESSION['arraythongtin']['DaoTao'] ?></td>
    </tr>
    
</table>
            <form target="_blank" action="export_bangdiem.php?data=1" method="post" onsubmit='
                $("#datatodisplay").val($("<div>").append( $("#ReportTable").eq(0).clone() ).html()); '>
                <div id="ReportTable" >
                    <table cellpadding="1" cellspacing="0" border="1"  class="display dataTable" id="allan" style="font-size: 10px;">
                        <thead>
                           
                            <tr > 
                                    <th class="sophieu">Năm học</th>
                                    <th class="ngaythu">Học kỳ</th>
                                    <th class="sotien">Tên môn học</th>
                                    <th class="namhoc">KL</th>
                                    <th class="namhoc">DQT</th>
                                    <th class="hocky">Điểm Thi1</th>
                                    <th class="phieuhuy"> Điểm TH1 </th>
                                    <th class="hocky">Điểm Thi2</th>
                                    <th class="phieuhuy"> Điểm TH2 </th>
                                    <th class="phieuhuy"> KQ </th>
                                    <td class="center">Ghi chú</td>  
                            </tr>
                    </thead>
                    <tbody>
                          
                        <tr class="gradeX">
                              <?php for($i =0; $i<Count($result); $i++)
                            {
                                if ( ($result[$i]['DiemTH1'] < 5) && ($result[$i]['DiemTH2'] <5))
                                {
                                    $style="red";
                                    $kq= "xx";
                                }
                                else 
                                {
                                     $style="";
                                    $kq= "";
                                }    
                            ?>
                             
                                    <td class="center"><?php echo $result[$i]['NamHoc']; ?></td> 
                                    <td class="center"><?php echo $result[$i]['HocKy']; ?></td>
                                    <td style="width: 250px"><a style="cursor: pointer;text-decoration: underline" title="<?php echo $result[$i]['MaMonHoc']; ?>"> <?php echo $result[$i]['TenMocHoc']; ?> </a></td>
                                    <td class="center"><?php echo $result[$i]['KL']; ?></td>
                                    <td class="center"><?php echo $result[$i]['DQT']; ?></td>
                                    <td class="center"><?php echo $result[$i]['DiemThi1']; ?></td>
                                    <td class="center"><?php echo $result[$i]['DiemTH1']; ?></td>
                                    <td class="center"><?php echo $result[$i]['DiemThi2']; ?></td>
                                    <td class="center"><?php echo $result[$i]['DiemTH2']; ?></td>  
                                    <td class="center" style="background: <?php echo $style  ?>"> <?php echo $kq ?></td> 
                                    <td class="center"><?php echo $result[$i]['GhiChu']; ?></td>
                            </tr>
                            <?php } ?>
                    </tbody>
                    </table>
                </div>
                <div style="padding:30px 0px 10px 0px">
                <center>
                <input type="hidden" id="datatodisplay" name="datatodisplay">
                <input id="export_excel" type="submit" value="Xem - In ấn - Kết xuất">
                </center> 
                </div>
                </div>
  
            </form>
 <div style="clear:both"></div>
<?php } ?>
  </div>
 <!--- thang điểm so -->
 
 <?php

if ($_POST["data"] == "2")
  {
?>
 <table style="width: 100%;margin: 10px 0px 10px 0px">
    <tr>
        <td colspan="4" style="text-align: center">
             <h2 style="font-weight: bold;color:black;font-size: 14px;margin:0px 0px 10px 0px">BẢNG ĐIỂM CHI TIẾT THEO THANG ĐIỂM SỐ </h2>
            <?php  $_SESSION['header_title']  ='BẢNG ĐIỂM CHI TIẾT THEO THANG ĐIỂM SỐ';
                    $_SESSION['title']  ='BangDiemtheothangdiemso';
            ?>
        </td>
    </tr>
    <tr>
        <td><span style="color: black;font-weight: bold; " > Họ tên:</span></td><td><?php echo $_SESSION['arraythongtin']['HoTen'] ?></td>
        <td><span style="color: black;font-weight: bold;">Tình trạng</span></td><td> <?php echo $_SESSION['arraythongtin']['TinhTrang'] ?></td>
    </tr>
    <tr>
        <td><span style="color: black;font-weight: bold">Ngày sinh:</span></td><td> <?php echo $_SESSION['arraythongtin']['NgaySinh'] ?></td>
        <td><span  style="color: black;font-weight: bold">Giới tính:</span></td><td> <?php echo $_SESSION['arraythongtin']['GioiTinh'] ?></td>
    </tr>
    <tr>
        <td><span style="color: black;font-weight: bold">Ngành học:</span></td><td> <?php echo $_SESSION['arraythongtin']['TenNganh'] ?></td>
        <td><span style="color: black;font-weight: bold">Khóa học:</span></td><td> <?php echo $_SESSION['arraythongtin']['TenKhoaHoc'] ?></td>
    </tr>
     <tr>
        <td style="width:80PX;"><span style="color: black;font-weight: bold" class="phead_tientrinh">Hệ đào tạo:</span></p></td><td> <?php echo $_SESSION['arraythongtin']['TenHeDaoTao'] ?></td>
        <td style="width: 130PX;"><span style="color: black;font-weight: bold" class="phead_tientrinh">Hình thức đào tạo:</span></td><td> <?php echo $_SESSION['arraythongtin']['DaoTao'] ?></td>
    </tr>
    
</table>
 
            <form target="_blank" action="export_bangdiem.php?data=2" method="post" onsubmit='
                $("#datatodisplay").val($("<div>").append( $("#ReportTable").eq(0).clone() ).html()); '>
                <div id="ReportTable" >
                    <table cellpadding="1" cellspacing="0" border="1" class="display dataTable" id="allan" style="font-size: 10px;">
                    <thead>
                            <tr> 
                                    <th class="sophieu" >Năm học</th>
                                    <th class="ngaythu">Học kỳ</th>
                                    <th class="sotien">Tên môn học</th>
                                    <th class="namhoc">KL</th>
                                    <th class="namhoc">DQT</th>
                                    <th class="hocky">Điểm Thi1</th>
                                    <th class="phieuhuy"> Điểm TH1 </th>
                                    <th class="hocky">Điểm Thi2</th>
                                    <th class="phieuhuy"> Điểm TH2 </th>
                                    <th class="phieuhuy"> KQ </th>
                                    <td class="center">Ghi chú</td>  
                            </tr>
                    </thead>
                    <tbody>
                          
                        <tr class="gradeX">
                              <?php for($i =0; $i<Count($result); $i++)
                            {
                                if ( ($result[$i]['DiemTH1'] < 5) && ($result[$i]['DiemTH2'] <5))
                                {
                                    $style="red";
                                    $kq= "xx";
                                }
                                else 
                                {
                                     $style="";
                                    $kq= "";
                                }
                                
                       // Quy doi diem qua trinh 
                        if ($result[$i]['DQT'] == null ) $DQT='';
                        else 
                        {
                        $DQT =(double)$result[$i]['DQT'];
                        $DQT =set_thangdiemso ($DQT);
                        }
                        // Diem thi 1
                        if ($result[$i]['DiemThi1'] == null ) $diemthi1='';
                        else 
                        {
                        $diemthi1 = (double)$result[$i]['DiemThi1'];
                        $diemthi1 = set_thangdiemso ($diemthi1) ;
                        }
                        // Diem tong hop 1
                        if ($result[$i]['DiemTH1'] == null ) $diemTH1='';
                        else 
                        {
                        $diemTH1 = (double)$result[$i]['DiemTH1'];
                        $diemTH1 = set_thangdiemso ($diemTH1) ;
                        
                        }
                        // Diem thi 2
                         if ($result[$i]['DiemThi2'] == null ) $DiemThi2='';
                         else 
                         {
                         $DiemThi2 = (double)$result[$i]['DiemThi2'];
                         $DiemThi2 = set_thangdiemso ($DiemThi2) ;
                         }
                         // Diem tong hop 2
                         if ($result[$i]['DiemTH2'] == null ) $DiemTH2='';
                         else 
                         {
                         $DiemTH2 = (double)$result[$i]['DiemTH2'];
                         $DiemTH2 = set_thangdiemso ($DiemTH2) ;
                         }
                            ?>
                             
                                    <td class="center"><?php echo $result[$i]['NamHoc']; ?></td> 
                                    <td class="center"><?php echo $result[$i]['HocKy']; ?></td>
                                    <td style="width: 250px"><a style="cursor: pointer;text-decoration: underline" title="<?php echo $result[$i]['MaMonHoc']; ?>"> <?php echo $result[$i]['TenMocHoc']; ?> </a></td>
                                    <td class="center"><?php echo $result[$i]['KL']; ?></td>
                                    <td class="center"><?php echo $DQT; ?></td>
                                    <td class="center"><?php echo $diemthi1; ?></td>
                                    <td class="center"><?php echo $diemTH1; ?></td>
                                    <td class="center"><?php echo $DiemThi2; ?></td>
                                    <td class="center"><?php echo $DiemTH2; ?></td>  
                                    <td class="center" style="background: <?php echo $style  ?>"> <?php echo $kq ?></td> 
                                    <td class="center"><?php echo $result[$i]['GhiChu']; ?></td>
                            </tr>
                            <?php } ?>
                    </tbody>
                    </table>
                 <div style="padding:30px 0px 10px 0px">
                <center>
                <input type="hidden" id="datatodisplay" name="datatodisplay">
                <input id="export_excel" type="submit" value="Xem - In ấn - Kết xuất">
                </center> 
                </div>
                </div>
            </form>
 <div style="clear:both"></div>
<?php } ?>

<!--- thang điểm chu -->
 
 <?php

if ($_POST["data"] == "3")
  {
?>
<table style="width: 100%;margin: 10px 0px 10px 0px">
    <tr>
        <td colspan="4" style="text-align: center">
             <h2 style="font-weight: bold;color:black;font-size: 14px;margin:0px 0px 10px 0px">BẢNG ĐIỂM CHI TIẾT THEO THANG ĐIỂM CHỮ </h2>
             <?php  $_SESSION['header_title']  ='BẢNG ĐIỂM CHI TIẾT THEO THANG ĐIỂM CHỮ';
                    $_SESSION['title']  ='BangDiemtheothangdiemchu';
             ?>
        </td>
    </tr>
    <tr>
        <td><span style="color: black;font-weight: bold; " > Họ tên:</span></td><td><?php echo $_SESSION['arraythongtin']['HoTen'] ?></td>
        <td><span style="color: black;font-weight: bold;">Tình trạng</span></td><td> <?php echo $_SESSION['arraythongtin']['TinhTrang'] ?></td>
    </tr>
    <tr>
        <td><span style="color: black;font-weight: bold">Ngày sinh:</span></td><td> <?php echo $_SESSION['arraythongtin']['NgaySinh'] ?></td>
        <td><span  style="color: black;font-weight: bold">Giới tính:</span></td><td> <?php echo $_SESSION['arraythongtin']['GioiTinh'] ?></td>
    </tr>
    <tr>
        <td><span style="color: black;font-weight: bold">Ngành học:</span></td><td> <?php echo $_SESSION['arraythongtin']['TenNganh'] ?></td>
        <td><span style="color: black;font-weight: bold">Khóa học:</span></td><td> <?php echo $_SESSION['arraythongtin']['TenKhoaHoc'] ?></td>
    </tr>
     <tr>
        <td style="width:80PX;"><span style="color: black;font-weight: bold" class="phead_tientrinh">Hệ đào tạo:</span></p></td><td> <?php echo $_SESSION['arraythongtin']['TenHeDaoTao'] ?></td>
        <td style="width: 130PX;"><span style="color: black;font-weight: bold" class="phead_tientrinh">Hình thức đào tạo:</span></td><td> <?php echo $_SESSION['arraythongtin']['DaoTao'] ?></td>
    </tr>
    
</table>
            <form target="_blank" action="export_bangdiem.php?data=3" method="post" onsubmit='
                $("#datatodisplay").val($("<div>").append( $("#ReportTable").eq(0).clone() ).html()); '>
                <div id="ReportTable" >
                    <table cellpadding="1" cellspacing="0" border="1" class="display dataTable" id="allan" style="font-size: 10px;">
                    <thead>
                            <tr> 
                                    <th class="sophieu" >Năm học</th>
                                    <th class="ngaythu">Học kỳ</th>
                                    <th class="sotien">Tên môn học</th>
                                    <th class="namhoc">KL</th>
                                    <th class="namhoc">DQT</th>
                                    <th class="hocky">Điểm Thi1</th>
                                    <th class="phieuhuy"> Điểm TH1 </th>
                                    <th class="hocky">Điểm Thi2</th>
                                    <th class="phieuhuy"> Điểm TH2 </th>
                                    <th class="phieuhuy"> KQ </th>
                                    <td class="center">Ghi chú</td>  
                            </tr>
                    </thead>
                    <tbody>
                          
                        <tr class="gradeX">
                              <?php for($i =0; $i<Count($result); $i++)
                            {
                                if ( ($result[$i]['DiemTH1'] < 5) && ($result[$i]['DiemTH2'] <5))
                                {
                                    $style="red";
                                    $kq= "xx";
                                }
                                else 
                                {
                                     $style="";
                                    $kq= "";
                                }
                                
                       // Quy doi diem qua trinh 
                        if ($result[$i]['DQT'] == null ) $DQT='';
                        else 
                        {
                        $DQT =(double)$result[$i]['DQT'];
                        $DQT =set_thangdiemchu ($DQT);
                        }
                        // Diem thi 1
                        if ($result[$i]['DiemThi1'] == null ) $diemthi1='';
                        else 
                        {
                        $diemthi1 = (double)$result[$i]['DiemThi1'];
                        $diemthi1 = set_thangdiemchu ($diemthi1) ;
                        }
                        // Diem tong hop 1
                        if ($result[$i]['DiemTH1'] == null ) $diemTH1='';
                        else 
                        {
                        $diemTH1 = (double)$result[$i]['DiemTH1'];
                        $diemTH1 = set_thangdiemchu ($diemTH1) ;
                        
                        }
                        // Diem thi 2
                         if ($result[$i]['DiemThi2'] == null ) $DiemThi2='';
                         else 
                         {
                         $DiemThi2 = (double)$result[$i]['DiemThi2'];
                         $DiemThi2 = set_thangdiemchu ($DiemThi2) ;
                         }
                         // Diem tong hop 2
                         if ($result[$i]['DiemTH2'] == null ) $DiemTH2='';
                         else 
                         {
                         $DiemTH2 = (double)$result[$i]['DiemTH2'];
                         $DiemTH2 = set_thangdiemchu ($DiemTH2) ;
                         }
                    
                            ?>
                             
                                    <td class="center"><?php echo $result[$i]['NamHoc']; ?></td> 
                                    <td class="center"><?php echo $result[$i]['HocKy']; ?></td>
                                    <td style="width: 250px"><a style="cursor: pointer;text-decoration: underline" title="<?php echo $result[$i]['MaMonHoc']; ?>"> <?php echo $result[$i]['TenMocHoc']; ?> </a></td>
                                    <td class="center"><?php echo $result[$i]['KL']; ?></td>
                                    <td class="center"><?php echo $DQT; ?></td>
                                    <td class="center"><?php echo $diemthi1; ?></td>
                                    <td class="center"><?php echo $diemTH1; ?></td>
                                    <td class="center"><?php echo $DiemThi2; ?></td>
                                    <td class="center"><?php echo $DiemTH2; ?></td>  
                                    <td class="center" style="background: <?php echo $style  ?>"> <?php echo $kq ?></td> 
                                    <td class="center"><?php echo $result[$i]['GhiChu']; ?></td>
                            </tr>
                            <?php } ?>
                    </tbody>
                    </table>
                <div style="padding:30px 0px 10px 0px">
                <center>
                <input type="hidden" id="datatodisplay" name="datatodisplay">
                <input id="export_excel" type="submit" value="Xem - In ấn - Kết xuất">
                </center> 
                </div>
                </div>

            </form>
 <div style="clear:both">
<?php } ?>    
     
 
 