<!-- hien thi service cac khoan thu của sinh viên khi ở trong khách sạn-->
        <?php if($arwrk[0]['code_ser'] =='SuDungDienNuocKSSVTheoSinhVien') 
        {    
        //$result_header = $result['ThongTinSinhVienResult']['diffgram']['DocumentElement']['ThongTinSinhVien'];
            if (isset($result['SuDungDienNuocKSSVTheoSinhVienResult']['diffgram']['DocumentElement']['SuDungDienNuocKSSVTheoSinhVien']))
            {  
            $result = $result['SuDungDienNuocKSSVTheoSinhVienResult']['diffgram']['DocumentElement']['SuDungDienNuocKSSVTheoSinhVien'];
            // echo '<pre>'; print_r($result);echo '</pre>';
             $_SESSION['result'] = $result;
             $tong_tien=0;
          ?>
                    <center>           
                    <h2 style="font-weight: bold;color:black">CÁC KHOẢN THU KHI SINH VIÊN Ở TRONG KHÁCH SẠN  </h2>
                    </center>
<table style="width: 100%;margin-top:20px;margin-bottom: 20px">
    <tr>
        <td colspan="4" style="text-align: center">
            <h2 class="phead_tientrinh">
                <b> </b>
            </h2>
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
               <form target="_blank" action="export_cksvct.php" method="post" onsubmit='
                $("#datatodisplay").val($("<div>").append( $("#ReportTable").eq(0).clone() ).html()); '>
                <div id="ReportTable" >
           
                    <table cellpadding="1" cellspacing="0" border="1" class="display dataTable" id="allan" style="font-size: 12px">
                    <thead>
                            <tr> 
                                    <th class="noidung center">Mã Phòng</th>
                                    <th class="center">Ngày Vào</th>
                                    <th class="center">Ngày Ra</th>
                                    <th class="center">Tiền Điện</th>
                                    <th class="center">Tiền Nước</th>
                                    <th class="center">Tiền Nước Nóng </th>
                                    <th class="center">Tiền nhà </th>
                                    <th class="center">Tổng tiền (ĐV:VNĐ)</th>
                            </tr>
                    </thead>
                     <tbody>
           <?php 
               if ($result['MaSinhVien'] <> null)
                         {
                      $tong_tien= $tong_tien+($result['TongCong']);
                   ?>
                              <tr class="gradeX">
                                    <td><?php echo $result['MaPhong']; ?></td>
                                    <td align="center"><?php echo date ( 'j/m/Y' ,strtotime ($result['NgayVao'])); ?></td>
                                    <td align="center"><?php echo date ( 'j/m/Y' ,strtotime ($result['NgayRa'])); ?></td>
                                    <td align="center"><?php echo display_number($result['TienDien']); ?></td>
                                    <td align="center"><?php echo display_number($result['TienNuocLanh']); ?></td>
                                    <td align="center"><?php echo display_number($result['TienNuocNong']); ?></td>
                                    <td align="center"><?php echo display_number($result['TienNha']); ?></td>
                                    <td align="center"><?php echo display_number($result['TongCong']); ?></td>
                                </tr>
                              
                 <?php } else
                         {  
                           for($i =0; $i<Count($result); $i++)
                            {
                             $tong_tien= $tong_tien+($result[$i]['TongCong']);
                            ?>
                               <tr class="gradeX">
                                     <td><?php echo $result[$i]['MaPhong']; ?></td>
                                    <td align="center"><?php echo date ( 'j-m-Y' ,strtotime ($result[$i]['NgayVao'])); ?></td>
                                    <td align="center"><?php echo date ( 'j-m-Y' ,strtotime ($result[$i]['NgayRa'])); ?></td>
                                    <td align="center"><?php echo display_number($result[$i]['TienDien']); ?></td>
                                    <td align="center"><?php echo display_number($result[$i]['TienNuocLanh']); ?></td>
                                    <td align="center"><?php echo display_number($result[$i]['TienNuocNong']); ?></td>
                                    <td align="center"><?php echo display_number($result[$i]['TienNha']); ?></td>
                                    <td align="center"><?php echo display_number($result[$i]['TongCong']); ?></td>
                                </tr>
                            <?php } ?>         
                     <?php  } ?>
                     </tbody>
                    </table>
                   
                   <br/>
                    <div style="clear: both"> <p class="phead_thongbao"><b>Tổng số tiền: </b><?php echo display_number($tong_tien); ?> (VNĐ)
                    <span style="font-style: italic">  
                    <?php
                      echo "(".docso($tong_tien)."VNĐ)";
                      ?>    
                   </span>
                </div>
                  
                <div style="padding:30px 0px 10px 0px">
                    <center>
           
                    </center>
                </div>
            </form>
                <div style="clear:both">

            <?php } else { ?>
            <div>
             <center>
            <h2 style="line-height:130px;color:red;">Sinh viên không ở nội trú hoặc vẫn đang ở nên không có số liệu!</h2>
            </center>
            </div>

            <?php } ?>
      <?php }?>