
<?php 

   if($arwrk[0]['code_ser'] =='BangDiemToanKhoa') 
        {    
        //$result_header = $result['ThongTinSinhVienResult']['diffgram']['DocumentElement']['ThongTinSinhVien'];
        if (isset($result['BangDiemToanKhoaResult']['diffgram']['DocumentElement']['BangDiemToanKhoa'])) 
        {
        $result = $result['BangDiemToanKhoaResult']['diffgram']['DocumentElement']['BangDiemToanKhoa'];
        ?>
<div id="result">

<center>           
          
 <table style="width: 100%;margin: 10px 0px 10px 0px">
    <tr>
        <td colspan="4" style="text-align: center">
             <h2 style="font-weight: bold;color:black;font-size: 14px">BẢNG ĐIỂM TOÀN KHÓA </h2>
            <?php  $_SESSION['header_title']  ='BẢNG ĐIỂM TOÀN KHÓA';
                   $_SESSION['title']  ='BangDiemToanKhoa';
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
        <td><span style="color: black;font-weight: bold">Ngành học:</span></td><td> <?php echo $_SESSION['arraythongtin']['TenNganh'] ?> &nbsp; &nbsp;<b> Lớp:</b> <?php echo $_SESSION['arraythongtin']['MaLop'] ?></td>
        <td><span style="color: black;font-weight: bold">Khóa học:</span></td><td> <?php echo $_SESSION['arraythongtin']['TenKhoaHoc'] ?></td>
    </tr>
     <tr>
        <td style="width:80PX;"><span style="color: black;font-weight: bold" class="phead_tientrinh">Hệ đào tạo:</span></p></td><td> <?php echo $_SESSION['arraythongtin']['TenHeDaoTao'] ?></td>
        <td style="width: 130PX;"><span style="color: black;font-weight: bold" class="phead_tientrinh">Hình thức đào tạo:</span></td><td> <?php echo $_SESSION['arraythongtin']['DaoTao'] ?></td>
    </tr>
    
</table>
            </center>
            <form target="_blank" action="export_bangdiem.php?data=1" method="post" onsubmit='
                $("#datatodisplay").val($("<div>").append( $("#ReportTable").eq(0).clone() ).html()); '>
                <div id="ReportTable" >
                    <table width="100%" cellpadding="1" cellspacing="0" border="1" class="display" id="allan" style="font-size: 10px;">
                    <thead>
                            <tr> 
                                    <th class="sophieu" >Năm học</th>
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
                             
                                    <td class="center"><?php echo $result[$i]['NamHoc']; ?></td> 
                                    <td ><?php echo $result[$i]['MaMonHoc']; ?></td>
                                    <td style="width: 220px"> <?php echo $result[$i]['TenMonHoc']; ?> </td>
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
</div>
 <div style="clear:both">

            <?php } else { ?>

                <div>
                <center>
                <h2 style="line-height:130px;color:red;">Không tồn tại bảng điểm toàn khóa của sinh viên !</h2>
                </center>
                </div>

     <?php } ?>
<?php } ?>