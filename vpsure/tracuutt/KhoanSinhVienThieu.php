<!-- hien thi service cac khoan sinh vien con thieu-->
<style type="text/css">
table.sample {
	border-width: 1px;
	border-spacing: 2px;
	border-style: outset;
	border-color: gray;
	border-collapse: separate;
	background-color: white;
        width: 100%
}
table.sample th {
	border-width: 1px;
	padding: 1px;
	border-style: inset;
	border-color: gray;
	background-color: white;

}
table.sample td {
	border-width: 1px;
	padding: 1px;
	border-style: inset;
	border-color: gray;
	background-color: white;
	
}
</style>
<div id="ReportTable1">
    <script language="javascript">
        function printform(divid) {
        var printContent = document.getElementById(divid);
        var windowUrl = 'about:blank';
        var uniqueName = new Date();
        var windowName = 'Print' + uniqueName.getTime();
        var printWindow = window.open(windowUrl, windowName, 'left=0;top=0,width=0,height=0,toolbar=0,scrollbars=1,status=0,location=0');

        printWindow.document.write(printContent.innerHTML);
        printWindow.document.close();
        printWindow.focus();
        printWindow.print();
        printWindow.close();
        }
 var mangso = ['không','một','hai','ba','bốn','năm','sáu','bảy','tám','chín'];
function dochangchuc(so,daydu)
{
    var chuoi = "";
    chuc = Math.floor(so/10);
    donvi = so%10;
    if (chuc>1) {
        chuoi = " " + mangso[chuc] + " mươi";
        if (donvi==1) {
            chuoi += " mốt";
        }
    } else if (chuc==1) {
        chuoi = " mười";
        if (donvi==1) {
            chuoi += " một";
        }
    } else if (daydu && donvi>0) {
        chuoi = " lẻ";
    }
    if (donvi==5 && chuc>=1) {
        chuoi += " lăm";
    } else if (donvi>1||(donvi==1&&chuc==0)) {
        chuoi += " " + mangso[ donvi ];
    }
    return chuoi;
}
function docblock(so,daydu)
{
    var chuoi = "";
    tram = Math.floor(so/100);
    so = so%100;
    if (daydu || tram>0) {
        chuoi = " " + mangso[tram] + " trăm";
        chuoi += dochangchuc(so,true);
    } else {
        chuoi = dochangchuc(so,false);
    }
    return chuoi;
}
function dochangtrieu(so,daydu)
{
    var chuoi = "";
    trieu = Math.floor(so/1000000);
    so = so%1000000;
    if (trieu>0) {
        chuoi = docblock(trieu,daydu) + " triệu";
        daydu = true;
    }
    nghin = Math.floor(so/1000);
    so = so%1000;
    if (nghin>0) {
        chuoi += docblock(nghin,daydu) + " nghìn";
        daydu = true;
    }
    if (so>0) {
        chuoi += docblock(so,daydu);
    }
    return chuoi;
}
function docso(so)
{
        if (so==0) return mangso[0];
    var chuoi = "", hauto = "";
    do {
        ty = so%1000000000;
        so = Math.floor(so/1000000000);
        if (so>0) {
            chuoi = dochangtrieu(ty,true) + hauto + chuoi;
        } else {
            chuoi = dochangtrieu(ty,false) + hauto + chuoi;
        }
        hauto = " tỷ";
    } while (so>0);
    return chuoi;
}        
        
   </script>
        <?php if($arwrk[0]['code_ser'] =='CacKhoanThieu') 
        {    
        //$result_header = $result['ThongTinSinhVienResult']['diffgram']['DocumentElement']['ThongTinSinhVien'];
            if (isset($result['CacKhoanThieuResult']['diffgram']['DocumentElement']['CacKhoanThieu']))
            {  
            $result = $result['CacKhoanThieuResult']['diffgram']['DocumentElement']['CacKhoanThieu'];
            // echo '<pre>'; print_r($result);echo '</pre>';
             $_SESSION['result'] = $result;
             $tong_tien=0;
          ?>
                    <center>           
                    <h2 style="font-weight: bold;color:black">CÁC KHOẢN SINH VIÊN CÒN THIẾU </h2>
                    <?php  $_SESSION['header_title']  ='CÁC KHOẢN SINH VIÊN CÒN THIẾU';
                           $_SESSION['title']  ='CacKhoanSinhVienConThieu';
                    ?>
                      
                    </center>

               <form target="_blank" action="export_cksvct.php" method="post" onsubmit='
                $("#datatodisplay").val($("<div>").append( $("#ReportTable").eq(0).clone() ).html()); '>
                <div id="ReportTable" >
                      <?php  if ($result['maSinhVien'] <> null)
                         { ?>
                       <center> 
                          <span> Năm học: </span> <?php echo $result['namHoc']; ?>
                          <span> Học Kỳ: </span><?php echo $result['hocKy']; ?>
                       </center>
                      <?php } else { ?>
                      <center> 
                          <span> Năm học: </span> <?php echo $result[0]['namHoc']; ?>
                          <span> Học Kỳ: </span><?php echo $result[0]['hocKy']; ?>
                       </center> 
                       <?php } ?>
                   <h2 style="font-weight: bold;color:black">Khoản học phí </h2>  
                  <table cellpadding="1" cellspacing="0" border="1" class="display dataTable" id="allan" style="font-size: 11px">
                    <thead>
                            <tr> 
                                    <th class="noidung center">Tên khoản</th>
                                    <th class="center">Số tiền quy định</th>
                                    <th class="center">Số tiền thay đổi</th>
                                    <th class="center">Số tiền miễn giảm</th>
                                    <th class="center">Số tiền kỳ trước chuyển sang</th>
                                    <th class="center">Số tiền đã thu</th>
                                    <th class="center">Số tiền phải chi</th>
                                    <th class="center">Số tiền đã chi</th>
                                    <th class="center">Số tiền chuyển sang kỳ sau</th>
                                    <th class="center">Số tiền thiếu (ĐV:VNĐ)</th>
                            </tr>
                    </thead>
                     <tbody>
           <?php 
               if ($result['maSinhVien'] <> null)
                         {
                      $tong_tien= $tong_tien+($result['Thieu']);
                   ?>
                              <tr class="gradeX">
                                    <td><?php echo $result['Ten']; ?></td>
                                    <td align="center"><?php echo display_number($result['soTienQuyDinh']); ?></td>
                                    <td><?php echo $result['SoTienThayDoi']; ?></td>
                                    <td><?php echo $result['soTienMienGiam']; ?></td>
                                    <td align="center"><?php echo $result['SoTienKyTruocChuyenSang']; ?></td>
                                    <td align="center"><?php echo $result['SoTienDaThu']; ?></td>
                                    <td align="center"><?php echo $result['SoTienPhaiChi']; ?></td>
                                    <td align="center"><?php echo $result['SoTienDaChi']; ?></td>
                                    <td align="center"><?php echo $result['SoTienChuyenSangKySau']; ?></td>
                                    <td align="center"><?php echo display_number($result['Thieu']); ?></td>
                                </tr>
                              
                 <?php } else
                         {  
                           for($i =0; $i<Count($result); $i++)
                            {
                             $tong_tien= $tong_tien+($result[$i]['Thieu']);
                            ?>
                               <tr class="gradeX">
                                    <td><?php echo $result[$i]['Ten']; ?></td>
                                    <td align="center"><?php echo display_number($result[$i]['soTienQuyDinh']); ?></td>
                                    <td><?php echo $result[$i]['SoTienThayDoi']; ?></td>
                                    <td><?php echo $result[$i]['soTienMienGiam']; ?></td>
                                    <td align="center"><?php echo $result[$i]['SoTienKyTruocChuyenSang']; ?></td>
                                    <td align="center"><?php echo $result[$i]['SoTienDaThu']; ?></td>
                                    <td align="center"><?php echo $result[$i]['SoTienPhaiChi']; ?></td>
                                    <td align="center"><?php echo $result[$i]['SoTienDaChi']; ?></td>
                                    <td align="center"><?php echo $result[$i]['SoTienChuyenSangKySau']; ?></td>
                                    <td align="center"><?php   echo display_number($result[$i]['Thieu']); ?></td>
                                </tr>
                            <?php } ?>         
                     <?php  } ?>
                     </tbody>
                    </table>
                   
                   <br/>
           <div style="clear: both"> <p class="phead_thongbao"><b>Tổng số tiền học phí thiếu: </b><?php echo display_number($tong_tien); ?> (VNĐ)
                   <span style="font-style: italic">  
                    <?php
                      echo "(".docso($tong_tien)."VNĐ)";
                      ?>    
                   </span></p>
           </div> 

                </div>
                  
             
            </form>
   <div style="clear:both"></div>

            <?php } else { ?>
            <div>
             <center>
            <h2 style="line-height:130px;color:red;">Không tồn tại các khoản sinh viên còn thiếu học phí!</h2>
            </center>
            </div>
 <?php } ?>

   <?php   
   /* Mon hoc con thieu tien*/
            $result= Get_arrayservice($msv,'MonHocConThieuTien');
            if (isset($result['MonHocConThieuTienResult']['diffgram']['DocumentElement']['MonHocConThieuTien']))
            {  
            $result = $result['MonHocConThieuTienResult']['diffgram']['DocumentElement']['MonHocConThieuTien'];
    ?> 
   <hr>
   <p class="phead_thongbao">Chi tiết học phí các môn học còn thiếu </p>
   <table cellpadding="1" cellspacing="0" border="1" class="sample" style="font-size: 11px">
                    <thead>
                            <tr> 
                                    <th style="text-align: center;font-weight: bold">Mã lớp</th>
                                    <th style="text-align: center;font-weight: bold">Mã môn học</th>
                                    <th style="text-align: center;font-weight: bold">Tên môn học</th>
                                    <th style="text-align: center;font-weight: bold">Khối lượng</th>
                                    <th style="text-align: center;font-weight: bold">Học phí môn học </th>
                                    <th style="text-align: center;font-weight: bold">Số tiền đã đóng</th>
                                   
                            </tr>
                    </thead>
                     <tbody>
           <?php 
               if ($result['MaSinhVien'] <> null)
                         {
                      $tong_tien_x1= $tong_tien_x1+($result['HocPhi']);
                      $tong_tien_x2= $tong_tien_x2+($result['soTienDaNop']);
                   ?>
                              <tr class="gradeX">
                                    <td align="center"><?php echo $result['MaLop']; ?></td>
                                    <td align="center"><?php echo $result['MaMonHoc']; ?></td>
                                    <td><?php echo $result['TenMonHoc']; ?></td>
                                    <td align="center"><?php echo $result['KhoiLuong']; ?></td>
                                    <td align="center"><?php echo display_number($result['HocPhi']); ?></td>
                                    <td align="center"><?php echo $result['soTienDaNop']; ?></td>
                                   
                                </tr>
                              
                 <?php } else
                         {  
                           for($i =0; $i<Count($result); $i++)
                            {
                             $tong_tien_x1= $tong_tien_x1+($result[$i]['HocPhi']);
                             $tong_tien_x2= $tong_tien_x2+($result[$i]['soTienDaNop']);
                            ?>
                               <tr class="gradeX">
                                    <td align="center"><?php echo $result[$i]['MaLop']; ?></td>
                                    <td align="center"><?php echo $result[$i]['MaMonHoc']; ?></td>
                                    <td><?php echo $result[$i]['TenMonHoc']; ?></td>
                                    <td align="center"><?php echo $result[$i]['KhoiLuong']; ?></td>
                                    <td align="center"><?php   echo display_number($result[$i]['HocPhi']); ?></td>
                                    <td align="center"><?php   echo display_number($result[$i]['soTienDaNop']); ?></td>
                                </tr>
                            <?php } ?>         
                     <?php  } ?>
                     </tbody>
                     <tfoot>
                     <td> <b>Tổng:</b></td>
                     <td colspan="3">
                   
                     </td>
                     <td align="center"><?php echo display_number($tong_tien_x1); ?></td>
                     <td align="center"><?php echo display_number($tong_tien_x2); ?></td>
                     </tfoot>
                    </table>
   
    <?php  } ?>
 
   <?php   
    /* Mon hoc lai con thieu tien */
           $result= Get_arrayservice($msv,'MonHocLaiConThieuTien');
           //echo '<h2>Fault</h2><pre>'; print_r($result);echo '</pre>';
            if (isset($result['MonHocLaiConThieuTienResult']['diffgram']['DocumentElement']['MonHocLaiConThieuTien']))
            {  
            $result = $result['MonHocLaiConThieuTienResult']['diffgram']['DocumentElement']['MonHocLaiConThieuTien'];
    ?> 
   <hr>
   <p class="phead_thongbao">Chi tiết học phí môn học học lại còn thiếu </p> <br/>
                  <table cellpadding="1" cellspacing="0" border="1" class="sample" id="allan" style="font-size: 11px">
                    <thead>
                            <tr> 
                                <th style="text-align: center;font-weight: bold">Mã lớp</th>
                                <th style="text-align: center;font-weight: bold">Tên môn học</th>
                                <th style="text-align: center;font-weight: bold">Học phí môn học </th>
                                <th style="text-align: center;font-weight: bold">Số tiền đã đóng </th>
                            </tr>
                    </thead>
                     <tbody>
           <?php 
               if ($result['MaSinhVien'] <> null)
                         {
                      $tong_tien_x3= $tong_tien_x3+($result['HocPhiHocLai']);
                      $tong_tien_x4 = $tong_tien_x4+($result['HocPhiDaNop']);
                   ?>
                              <tr class="gradeX">
                                    <td align="center"><?php echo $result['maMonHoc']; ?></td>
                                    <td><?php echo $result['TenMonHoc']; ?></td>
                                    <td align="center"><?php echo display_number($result['HocPhiHocLai']); ?></td>
                                    <td align="center"><?php echo display_number($result['HocPhiDaNop']); ?></td>
                                </tr>
                              
                 <?php } else
                         {  
                           for($i =0; $i<Count($result); $i++)
                            {
                             $tong_tien_x3= $tong_tien_x4+($result[$i]['HocPhiHocLai']);
                             $tong_tien_x4= $tong_tien_x4+($result[$i]['HocPhiDaNop']);
                            ?>
                               <tr class="gradeX">
                                    <td align="center"><?php echo $result[$i]['maMonHoc']; ?></td>
                                    <td><?php echo $result[$i]['TenMonHoc']; ?></td>
                                    <td align="center"><?php   echo display_number($result[$i]['HocPhiHocLai']); ?></td>
                                    <td align="center"><?php   echo display_number($result[$i]['HocPhiDaNop']); ?></td>
                                </tr>
                            <?php } ?>         
                     <?php  } ?>
                     </tbody>
                     <tfoot>
                     <td> <b>Tổng: </b></td>
                     <td> </td>
                     <td align="center"><?php echo display_number($tong_tien_x3); ?></td>
                     <td align="center"><?php echo display_number($tong_tien_x4); ?></td>
                     </tfoot>
                    </table>
   
    <?php  } ?>
   
   <?php   
    /* Mon hoc bo sung con thieu tien */
           $result= Get_arrayservice($msv,'MonHocBoSungConThieuTien');
           //echo '<h2>Fault</h2><pre>'; print_r($result);echo '</pre>';
           $tong_tien_x3 =0;$tong_tien_x4=0;
            if (isset($result['MonHocBoSungConThieuTienResult']['diffgram']['DocumentElement']['MonHocBoSungConThieuTien']))
            {  
            $result = $result['MonHocBoSungConThieuTienResult']['diffgram']['DocumentElement']['MonHocBoSungConThieuTien'];
    ?> 
   <hr>
   <p class="phead_thongbao">Chi tiết học phí môn học bổ sung còn thiếu </p> <br/>
                  <table cellpadding="1" cellspacing="0" border="1" class="sample" id="allan" style="font-size: 11px">
                    <thead>
                            <tr> 
                                <th style="text-align: center;font-weight: bold">Mã lớp</th>
                                <th style="text-align: center;font-weight: bold">Tên môn học</th>
                                <th style="text-align: center;font-weight: bold">Học phí môn học </th>
                                <th style="text-align: center;font-weight: bold">Số tiền đã đóng </th>
                            </tr>
                    </thead>
                     <tbody>
           <?php 
               if ($result['MaSinhVien'] <> null)
                         {
                      $tong_tien_x3= $tong_tien_x3+($result['HocPhi']);
                      $tong_tien_x4 = $tong_tien_x4+($result['HocPhiDaNop']);
                   ?>
                              <tr class="gradeX">
                                    <td align="center"><?php echo $result['maMonHoc']; ?></td>
                                    <td><?php echo $result['TenMonHoc']; ?></td>
                                    <td align="center"><?php echo display_number($result['HocPhiHocLai']); ?></td>
                                    <td align="center"><?php echo display_number($result['HocPhiDaNop']); ?></td>
                                </tr>
                              
                 <?php } else
                         {  
                           for($i =0; $i<Count($result); $i++)
                            {
                             $tong_tien_x3= $tong_tien_x3+($result[$i]['HocPhi']);
                             $tong_tien_x4= $tong_tien_x4+($result[$i]['HocPhiDaNop']);
                            ?>
                               <tr class="gradeX">
                                    <td align="center"><?php echo $result[$i]['maMonHoc']; ?></td>
                                    <td><?php echo $result[$i]['TenMonHoc']; ?></td>
                                    <td align="center"><?php   echo display_number($result[$i]['HocPhiHocLai']); ?></td>
                                    <td align="center"><?php   echo display_number($result[$i]['HocPhiDaNop']); ?></td>
                                </tr>
                            <?php } ?>         
                     <?php  } ?>
                     </tbody>
                     <tfoot>
                     <td> <b>Tổng: </b></td>
                     <td> </td>
                     <td align="center"><?php echo display_number($tong_tien_x3); ?></td>
                     <td align="center"><?php echo display_number($tong_tien_x4); ?></td>
                     </tfoot>
                    </table>
   
    <?php  } ?>
   

   <!-- hien thi service cac khoan sinh vien còn nợ trong KSSV-->
        <?php 
          $result= Get_arrayservice($msv,'NoTienKSSV');
        //$result_header = $result['ThongTinSinhVienResult']['diffgram']['DocumentElement']['ThongTinSinhVien'];
            if (isset($result['NoTienKSSVResult']['diffgram']['DocumentElement']['NoTienKSSV']))
            {  
            $result = $result['NoTienKSSVResult']['diffgram']['DocumentElement']['NoTienKSSV'];
            // echo '<pre>'; print_r($result);echo '</pre>';
             $_SESSION['result'] = $result;
             $tong_tien=0;
          ?>     
 <h2 style="font-weight: bold;color:black;margin-top: 10px;">Khoản tại khách sạn sinh viên </h2>  
               <form target="_blank" action="export_cksvct.php" method="post" onsubmit='
                $("#datatodisplay").val($("<div>").append( $("#ReportTable").eq(0).clone() ).html()); '>
                <div id="ReportTable" > 
                    <table cellpadding="1" cellspacing="0" border="1" class="display dataTable" id="allan" style="font-size: 11px">
                    <thead>
                            <tr> 
                                  
                                    <th class="noidung center">Tên khoản</th>
                                    <th class="center">Số tiền quy định</th>
                                    <th class="center">Số tiền thay đổi</th>
                                    <th class="center">Số tiền miễn giảm</th>
                                    <th class="center">Số tiền kỳ trước chuyển sang</th>
                                    <th class="center">Số tiền đã thu</th>
                                    <th class="center">Số tiền phải chi</th>
                                    <th class="center">Số tiền đã chi</th>
                                    <th class="center">Số tiền chuyển sang kỳ sau</th>
                                    <th class="center">Số tiền còn thiếu (VNĐ)</th>
                            </tr>
                    </thead>
                     <tbody>
           <?php 
               if ($result['maSinhVien'] <> null)
                         { 
                      $tong_tien= $tong_tien+($result['Thieu']);
                   ?>
                              <tr class="gradeX">
                                   
                                    <td><?php echo $result['Ten']; ?></td>
                                    <td align="center"><?php echo display_number($result['soTienQuyDinh']); ?></td>
                                    <td><?php echo $result['SoTienThayDoi']; ?></td>
                                    <td><?php echo $result['soTienMienGiam']; ?></td>
                                    <td align="center"><?php echo $result['SoTienKyTruocChuyenSang']; ?></td>
                                    <td align="center"><?php echo  display_number($result['SoTienDaThu']); ?></td>
                                    <td align="center"><?php echo $result['SoTienPhaiChi']; ?></td>
                                    <td align="center"><?php echo $result['SoTienDaChi']; ?></td>
                                    <td align="center"><?php echo $result['SoTienChuyenSangKySau']; ?></td>
                                    <td align="center"><?php echo display_number($result['Thieu']); ?></td>
                                </tr>
                 <?php } else
                         {  
                           for($i =0; $i<Count($result); $i++)
                            {
                             $tong_tien= $tong_tien+($result[$i]['Thieu']);
                            ?>
                               <tr class="gradeX">
                                    <td><?php echo $result[$i]['namHoc']; ?></td>
                                    <td><?php echo $result[$i]['Ten']; ?></td>
                                    <td align="center"><?php echo display_number($result[$i]['soTienQuyDinh']); ?></td>
                                    <td><?php echo $result[$i]['SoTienThayDoi']; ?></td>
                                    <td><?php echo $result[$i]['soTienMienGiam']; ?></td>
                                    <td align="center"><?php echo $result[$i]['SoTienKyTruocChuyenSang']; ?></td>
                                    <td align="center"><?php echo  display_number($result[$i]['SoTienDaThu']); ?></td>
                                    <td align="center"><?php echo $result[$i]['SoTienPhaiChi']; ?></td>
                                    <td align="center"><?php echo $result[$i]['SoTienDaChi']; ?></td>
                                    <td align="center"><?php echo $result[$i]['SoTienChuyenSangKySau']; ?></td>
                                    <td align="center"><?php echo display_number($result[$i]['Thieu']); ?></td>
                                </tr>
                            <?php } 
                 } ?>
                     </tbody>
                    </table>
                     <br/>
                   <div style="clear: both"> <p class="phead_thongbao"><b>Tổng số tiền thiếu tại khách sạn sinh viên: </b><?php echo display_number($tong_tien); ?> (VNĐ)
                    <span style="font-style: italic">  
                    <?php
                      echo "(".docso($tong_tien)." VNĐ)";
                      ?>    
                   </span>
                       
                       </p></div>
               <div style="padding:30px 0px 10px 0px">
            
                </div>
                </div>
                
            </form>
 <div style="clear:both"></div>

            <?php }  ?>
    <center>
      
    </center> 
      <?php }?>   
   </div>
         
 