
<!-- hien thi service cac khoan sinh vien con thieu-->
        <?php if($arwrk[0]['code_ser'] =='MonSinhVienNoMon') 
        {    
        //$result_header = $result['ThongTinSinhVienResult']['diffgram']['DocumentElement']['ThongTinSinhVien'];
            if (isset($result['MonSinhVienNoMonResult']['diffgram']['DocumentElement']['MonSinhVienNoMon']))
            {  
            $result = $result['MonSinhVienNoMonResult']['diffgram']['DocumentElement']['MonSinhVienNoMon'];
            // echo '<pre>'; print_r($result);echo '</pre>';
             $_SESSION['result'] = $result;
          ?>
          <div id="result" class="tbl_bangdiem">          
                   <br/> <h2 style="font-weight: bold;color:white">MÔN THI CHƯA QUA  </h2><br/>
                    <?php  
                           $_SESSION['header_title']  ='MÔN THI CHƯA QUA';
                           $_SESSION['title']  ='CacMonSinhVienNoTrongKy';
                    ?>

                    <center>           
     
 <table class="display table" >
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
                      
<form target="_blank" action="export_msvntk.php" method="post" onsubmit='
$("#datatodisplay").val($("<div>").append( $("#ReportTable").eq(0).clone() ).html()); '>
              
  <table  cellpadding="1" cellspacing="0" border="1" class="display dataTable" id="allan">
    <thead style="background-color:rgba(4, 99, 241, 0.73);color:black">
        <tr> 
        <th style="text-align: center" class="center">STT</th>
        <th class="noidung center">Tên môn</th>
        <th style="text-align: center" class="center"> Điểm </th>         
             </tr>
                    </thead>
                     <tbody style="color:black">
           <?php 
               if ($result['MaSinhVien'] <> null)
                 { ?>
                      <tr class="gradeX">
                            <td align="center"><?php echo 1; ?></td>
                            <td><?php echo $result['TenMonHoc']; ?></td>
                            <td align="center"><?php echo $result['DiemMax']; ?></td>
                           
                        </tr>
         <?php } else
                 {  
                   for($i =0; $i<Count($result); $i++)
                    {
                    ?>
                       <tr class="gradeX">
                            <td align="center"><?php echo $i+1; ?></td>
                            <td><?php echo $result[$i]['TenMonHoc']; ?></td>
                            <td align="center"><?php echo $result[$i]['DiemMax']; ?></td>
                       
                        </tr>
                    <?php } 
         } ?>
                     </tbody>
                    </table>
     <div class="export"> 
     <input type="hidden" id="datatodisplay" name="datatodisplay">
        <input id="export_excel"  type="submit" style="border-radius: 25px;color:#868686;font-weight: bold;" value="Xuất file text">
            </form>
                <div style="clear:both">

            <?php } else { ?>
           <div class="notice">
                  <img src="../images/congrat.jpg" alt="stop" class="error_picture">
            <h2 style="color:red;">Sinh viên đã thi qua hết tất cả các môn!</h2>
            </div>
</div>
            <?php } ?>
      <?php }?>