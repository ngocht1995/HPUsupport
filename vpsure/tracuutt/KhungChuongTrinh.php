
<?php 
   if($arwrk[0]['code_ser'] =='KhungChuongTrinh') 
        {    
        //$result_header = $result['ThongTinSinhVienResult']['diffgram']['DocumentElement']['ThongTinSinhVien'];
     if (isset($result['KhungChuongTrinhResult']['diffgram']['DocumentElement']['KhungChuongTrinh'])) 
        {
        $result = $result['KhungChuongTrinhResult']['diffgram']['DocumentElement']['KhungChuongTrinh'];
        //echo '<pre>'; print_r($result);echo '</pre>';
        $_SESSION['result'] = $result;
        ?>

       <div id="result" class="tbl_bangdiem"> 
                   
            <br/><br/><h2 style="font-weight: bold;color:white">KHUNG CHƯƠNG TRÌNH </h2><br/>
            <?php  $_SESSION['header_title']  ='KHUNG CHƯƠNG TRÌNH';
                   $_SESSION['title']  ='KhungChuongTrinh';
            ?>
        <center>                
 <table  class="display table">
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
        <td style="width:80PX;"><span style="font-weight: bold;" class="phead_tientrinh">Hệ đào tạo:</span></p></td><td> <?php echo $_SESSION['arraythongtin']['TenHeDaoTao'] ?></td>
    </tr>    
</table>
            </center>
             <br/>
            <form target="_blank" action="export_khungchuongtrinh.php" method="post" onsubmit='
                $("#datatodisplay").val($("<div>").append( $("#ReportTable").eq(0).clone() ).html()); '>
                <div id="ReportTable">
            <table cellpadding="1" cellspacing="0" border="1" class="display dataTable" id="allan" >
                    <thead style="background-color:rgba(4, 99, 241, 0.73);">
                            <tr> 
                                    <th class="hocky">STT</th>
                                    <th class="sophieu" >Mã môn học</th>
                                    <th class="ngaythu">Môn học</th>
                                    <th class="noidung">Khối lượng</th>
                                    <th class="sotien" >Đơn vị</th>
                                    <th class="namhoc">Loại môn</th>
                                    <th class="phieuhuy"> Tính điểm TB </th>

                            </tr>
                    </thead>
                    <tbody>
                            <?php for($i =0; $i<Count($result); $i++)
                            {
                            ?>
                            <tr class="gradeX">
                                    <td class="center"><?php echo $i+1; ?></td>
                                    <td class="center"><a title="click xem đề cương chi tiết môn học"  target="_blank" href="<?php echo $result[$i]['URL']; ?>"><?php echo $result[$i]['MaMonHoc']; ?></a></td>
                                    <td ><a target="_blank" title="click xem đề cương chi tiết môn học" href="<?php echo $result[$i]['URL']; ?>"><?php echo $result[$i]['TenMonHoc']; ?></a></td>  
                                    <td class="center"><?php echo $result[$i]['TongSo']; ?></td>
                                    <td class="center"><?php echo $result[$i]['DonVi']; ?></td>
                                    <td class="center">
                                        <?php if ($result[$i]['BatBuoc']=='true')
                                              echo "Bắt buộc"; else  echo "Không bắt buộc";
                                        ?>
                                    
                                    </td> 
                                    <td class="center">
                                        <?php if ($result[$i]['ThamGiaTinhDiemTrungBinh'] =="true")
                                            echo "x"; 
                                        ?>
                                    </td>    
                            </tr>
                            <?php } ?>
                    </tbody>
                    </table>

               
                </div>
               <div class="export">
                 <input type="hidden" id="datatodisplay" name="datatodisplay">
                    <input id="export_excel" type="submit" style="border-radius: 25px;color:#868686;font-weight: bold;" value="Xuất file text">
                        </form>
</div>
            </form>
                <div style="clear:both">
            <?php } else { ?>

                <div class="error">
        <img src="../images/error.jpg" alt="stop" class="error_picture">
                <h2 style="color:red;">Không tìm được khung chương trình của sinh viên !</h2>
                </div>
</div>
     <?php } ?>
<?php } ?>