
<?php 

   if($arwrk[0]['code_ser'] =='BangDiemToanKhoa') 
        {    
        //$result_header = $result['ThongTinSinhVienResult']['diffgram']['DocumentElement']['ThongTinSinhVien'];
        if (isset($result['BangDiemToanKhoaResult']['diffgram']['DocumentElement']['BangDiemToanKhoa'])) 
        {
        $result = $result['BangDiemToanKhoaResult']['diffgram']['DocumentElement']['BangDiemToanKhoa'];
        ?>
<div id="result" class="tbl_bangdiem">
<center>           
          <br>
 <table class="display table">
    <tr>
        <td colspan="4" style="text-align: center">
             <h2 >BẢNG ĐIỂM TOÀN KHÓA </h2><br>
            <?php  $_SESSION['header_title']  ='BẢNG ĐIỂM TOÀN KHÓA';
                   $_SESSION['title']  ='BangDiemToanKhoa';
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
        <td><span style="font-weight: bold;" class="phead_tientrinh">Hình thức đào tạo:</span></td><td> <?php echo $_SESSION['arraythongtin']['DaoTao'] ?></td>
    </tr>
    
</table>
            </center>
         <form target="_blank" action="export_bangdiem.php?data=1" method="post" onsubmit='
                $("#datatodisplay").val($("<div>").append( $("#ReportTable").eq(0).clone() ).html()); '>
                <div id="ReportTable" style="width:100%;">
                   <table  cellpadding="1" cellspacing="0" border="1" class="display dataTable" id="allan" >
                    <thead style="background-color:rgba(4, 99, 241, 0.73);color:white">
                            <tr style="height: 50px"> 
                                    <th class="namhoc">Mã môn học</th>
                                    <th class="sotien">Tên môn học</th>
                                    <th class="namhoc">Khối lượng</th>
                                    <th class="hocky">Thang điểm 10</th>
                                    <th class="phieuhuy"> Thang điểm 4 </th>
                                    <th class="hocky">Thang điểm chữ</th>
                            </tr>
                    </thead>
                    <tbody>
                   <tr>
                         <?php for($i =0; $i<Count($result); $i++)
                            {
                                
                            ?>
      
                                    <td style="color:brown"><?php echo $result[$i]['MaMonHoc']; ?></td>
                                    <td style="width: 220px;color:#2A679F"> <?php echo $result[$i]['TenMonHoc']; ?> </td>
                                    <td class="center"><?php echo $result[$i]['KhoiLuong']; ?></td>
                                    <td class="center"><?php echo $result[$i]['DiemThang10']; ?></td>
                                    <td class="center"><?php echo $result[$i]['DiemThang4']; ?></td>
                                    <td class="center"><?php echo $result[$i]['DiemChu']; ?></td>
         
                            </tr>
                    <?PHP } ?>
                                </tbody>
                    </table>
                </div>
               
            </form>
  <div style="padding:30px 0px 10px 0px; position: relative;top: 35px;height: 20px"> 
   
</div>
</div>

 <div style="clear:both"></div>

            <?php } else { ?>

  <div class="error">
       <center>
           <img src="../images/error.jpg" alt="stop" class="error_picture">
                <h2 style="color:red;">Không tồn tại bảng điểm của sinh viên !</h2>
                </center>
                </div>

     <?php } ?>
<?php } ?>