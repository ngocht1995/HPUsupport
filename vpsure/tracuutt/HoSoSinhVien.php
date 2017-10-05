 <!-- hien thi service cac giay to sinh vien da nop-->
        <?php if($arwrk[0]['code_ser'] =='GiayToDaNop') 
        {    
        //$result_header = $result['ThongTinSinhVienResult']['diffgram']['DocumentElement']['ThongTinSinhVien'];
            if (isset($result['GiayToDaNopResult']['diffgram']['DocumentElement']['GiayToDaNop']))
            {  
            $result = $result['GiayToDaNopResult']['diffgram']['DocumentElement']['GiayToDaNop'];
            //echo '<pre>'; print_r($result);echo '</pre>';
              $_SESSION['result'] = $result;
                            
            ?>
                    <center>           
                    <h2 style="font-weight: bold;color:black">CÁC GIẤY TỜ SINH VIÊN ĐÃ NỘP </h2>
                    <?php  $_SESSION['header_title']  ='CÁC GIẤY TỜ SINH VIÊN ĐÃ NỘP';
                           $_SESSION['title']  ='CacGiayToSinhVienDaNop';
                    ?>
                    </center>
                    <form target="_blank" action="export_gtsvdn.php" method="post" onsubmit='
                $("#datatodisplay").val($("<div>").append( $("#ReportTable").eq(0).clone() ).html()); '>
                <div id="ReportTable" >
                  <table cellpadding="1" cellspacing="0" border="1" class="display dataTable" id="allan">
                    <thead>
                            <tr> 
                                    <th class="center">STT</th>
                                    <th class="center">Mã giấy tờ</th>
                                    <th class="center">Tên giấy tờ</th>
                                    <th class="center">Bản</th>
                                    <th class="center">Trạng thái</th>
                            </tr>
                    </thead>
                     <tbody>
                            <?php for($i =0; $i<Count($result); $i++)
                            {
                            ?>
                            <tr class="gradeX">
                                    <td class="center" ><?php echo $i; ?></td>
                                    <td class="center"><?php echo $result[$i]['MaGiayTo']; ?></td>
                                    <td><?php echo $result[$i]['TenGiayTo']; ?></td>
                                    <td class="center"><?php echo $result[$i]['Ban']; ?></td>
                                    <td class="center"><?php echo $result[$i]['TrangThai']; ?></td>
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
            </form>
                <div style="clear:both">
            <?php } else { ?>
            <div style="">
                <center>
            <h2 style="color:red;">Không tồn tại giấy tờ sinh viên còn thiếu!</h2>
                </center>
            </div>

            <?php } ?>
      <?php }?>

                    
 <!-- hien thi service cac giay to sinh vien con thieu-->
        <?php if($arwrk[0]['code_ser'] =='GiayToConThieu') 
        {    
        //$result_header = $result['ThongTinSinhVienResult']['diffgram']['DocumentElement']['ThongTinSinhVien'];
            if (isset($result['GiayToDaNopResult']['diffgram']['DocumentElement']['GiayToDaNop']))
            {  
            $result = $result['GiayToDaNopResult']['diffgram']['DocumentElement']['GiayToDaNop'];
            //echo '<pre>'; print_r($result);echo '</pre>';
              $_SESSION['result'] = $result;
                            
            ?>
                    <center>           
                    <h2 style="font-weight: bold;color:black">CÁC GIẤY TỜ SINH VIÊN ĐÃ NỘP </h2>
                    <?php  $_SESSION['header_title']  ='CÁC GIẤY TƠ SINH VIÊN CÒN THIẾU';
                           $_SESSION['title']  ='CacGiayToSinhVienConThieu';
                    ?>
                    </center>
                    <form action="export_gtsvdn.php" method="post" onsubmit='
                $("#datatodisplay").val($("<div>").append( $("#ReportTable").eq(0).clone() ).html()); '>
                <div id="ReportTable" >
                  <table cellpadding="1" cellspacing="0" border="1" class="display dataTable" id="allan">
                    <thead>
                            <tr> 
                                    <th class="center">STT</th>
                                    <th class="center">Mã giấy tờ</th>
                                    <th class="center">Tên giấy tờ</th>
                                    <th class="center">Bản</th>
                                    <th class="center">Trạng thái</th>
                            </tr>
                    </thead>
                     <tbody>
                            <?php for($i =0; $i<Count($result); $i++)
                            {
                            ?>
                            <tr class="gradeX">
                                    <td class="center" ><?php echo $i; ?></td>
                                    <td class="center"><?php echo $result[$i]['MaGiayTo']; ?></td>
                                    <td><?php echo $result[$i]['TenGiayTo']; ?></td>
                                    <td class="center"><?php echo $result[$i]['Ban']; ?></td>
                                    <td class="center"><?php echo $result[$i]['TrangThai']; ?></td>
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
            </form>
                <div style="clear:both">
            <?php } else { ?>
            <div style="padding-left:20px;">
            <img src="../images/stop.png" alt="stop" style="height: 130px">
            <h2 style="line-height:130px;color:red;">Không tồn tại giấy tờ sinh viên còn thiếu!</h2>
            </div>

            <?php } ?>
      <?php }?>                   
                    
