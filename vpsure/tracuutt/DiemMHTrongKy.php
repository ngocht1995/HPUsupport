

</style>
<?php 
   if($arwrk[0]['code_ser'] =='DiemMonHocTrongKy') 
     { 
        //$result_header = $result['ThongTinSinhVienResult']['diffgram']['DocumentElement']['ThongTinSinhVien'];
    if (isset($result['DiemMonHocTrongKyResult']['diffgram']['DocumentElement']['DiemMonHocTrongKy'])) 
        {
        $result = $result['DiemMonHocTrongKyResult']['diffgram']['DocumentElement']['DiemMonHocTrongKy'];
       //x  echo '<pre>'; print_r($result);echo '</pre>';
        $_SESSION['result'] = $result;
        ?>
<div id="result" class="tbl_bangdiem">             
            <br><h1 style="font-weight: bold;color:white">Điểm Môn Học Trong Kỳ </h1><br>
            <?php  $_SESSION['header_title']  ='Điểm Các Môn Học Trong Kỳ';
                $_SESSION['title']  ='DQTMonHocDangKy';
            ?>
            <center>               
 <table class="display table">
    <tr>
        <td colspan="4" style="text-align: center">
            <?php  $_SESSION['header_title']  ='BẢNG ĐIỂM RÚT GỌN';
                   $_SESSION['title']  ='BangDiem';
            ?>
        </td>
    </tr>
    <tr>
        <td><span style="font-weight: bold; " > Họ tên:</span></td><td><?php echo $_SESSION['arraythongtin']['HoTen'] ?></td>
        <td><span style="font-weight: bold;">Tình trạng</span></td><td> <?php echo $_SESSION['arraythongtin']['TinhTrang'] ?></td>
    </tr>
    <tr>
        <td><span style="font-weight: bold;">Ngày sinh:</span></td><td> <?php echo $_SESSION['arraythongtin']['NgaySinh'] ?></td>
        <td><span  style="font-weight: bold;">Giới tính:</span></td><td> <?php echo $_SESSION['arraythongtin']['GioiTinh'] ?></td>
    </tr>
    <tr>
        <td><span style="font-weight: bold;">Ngành học:</span></td><td> <?php echo $_SESSION['arraythongtin']['TenNganh'] ?> &nbsp; &nbsp;<b> Lớp:</b> <?php echo $_SESSION['arraythongtin']['MaLop'] ?></td>
        <td><span style="font-weight: bold;">Khóa học:</span></td><td> <?php echo $_SESSION['arraythongtin']['TenKhoaHoc'] ?></td>
    </tr>
     <tr>
        <td><span style="font-weight: bold;" class="phead_tientrinh">Hệ đào tạo:</span></p></td><td> <?php echo $_SESSION['arraythongtin']['TenHeDaoTao'] ?></td>
    </tr>    
</table>
            </center>
             <br/>

            <form target="_blank" action="export_dkmh.php" method="post" onsubmit='
                $("#datatodisplay").val($("<div>").append( $("#ReportTable").eq(0).clone() ).html()); '>
          <div id="ReportTable" >
                   <table  cellpadding="1" cellspacing="0" border="1" class="display dataTable" id="allan" >
                    <thead style="background-color:rgba(4, 99, 241, 0.73);color:white">
                            <tr> 
                            <th class="sophieu">Mã môn</th>
                            <th class="ngaythu">Tên môn</th>
                            <th class="sotien" >Tỉ lệ <br/> điểm</th>
                            <th class="sotien" >ĐQT</th>
                            <th class="noidung">Thi1</th>
                            <th class="noidung">ĐTH1</th>
                            <th class="noidung">Thi2</th>
                            <th class="noidung">ĐTH2 </th>
                            <th class="ngaythu">Cấm thi</th>
                            <th class="sotien" >Học lại</th>
                                                </tr>
                                        </thead>
                                    <?php 
                                    for ($i=0;$i< count($result);$i++)
                                    {
                                    if ($result[$i]['MaMonHoc'] <> null)
                                            { 
                                    ?>
                                        <tbody>
                                                <tr class="gradeX">
                        <td  class="center"><?php echo $result[$i]['MaMonHoc']; ?></td>  
                        <td style="color:#2A679F"><?php echo $result[$i]['TenMonHoc']; ?></td> 
                        <td ><?php echo $result[$i]['TyLeDiem']; ?></td>  
                        <td class="center"><?php echo $result[$i]['DQT']; ?></td>
                        <td class="center"><?php echo $result[$i]['DiemThiL1']; ?></td>
                        <td class="center"><?php echo $result[$i]['DiemTHL1']; ?></td>
                        <td class="center"><?php echo $result[$i]['DiemThiL2']; ?></td>
                        <td class="center"><?php echo $result[$i]['DiemTHL2']; ?></td>
                        <td class="center"><?php echo $result[$i]['CamThiLan1']; ?></td>
                        <td class="center"><?php echo $result[$i]['PhaiHocLai']; ?></td> 
                                                </tr>
                                        </tbody>
                                        <?php } 
}
                                        ?>
                                             
                                       
                                        </table>
                                  

                                </form>
    <div class="export"> 
     
        </div>
</div>

                                    <div style="clear:both"></div>

                               <?php// include "thamdo_include.php" ?>          
                                <?php } else { ?>

  <div class="error">
  
        <img src="../images/error.jpg" alt="stop" class="error_picture">
          <h2 style="color:red;"> Chưa có điểm kỳ hiện tại !</h2>
                                  
                                    </div></div>

                        <?php } ?>
        
              
<?php } ?>    
                  
<?php

/* Check thăm do mon hoc hungdq 
Get_Survey($thamdo,$trangthai_thamdo);*/

     ?>