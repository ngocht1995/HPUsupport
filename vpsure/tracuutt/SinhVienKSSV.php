<!-- hien thi service cac khoan sinh vien con thieu-->
        <?php if($arwrk[0]['code_ser'] =='SinhvienKSSV') 
        {    
        //$result_header = $result['ThongTinSinhVienResult']['diffgram']['DocumentElement']['ThongTinSinhVien'];
            if (isset($result['SinhvienKSSVResult']['diffgram']['DocumentElement']['SinhvienKSSV']))
            {  
            $result = $result['SinhvienKSSVResult']['diffgram']['DocumentElement']['SinhvienKSSV'];
            // echo '<pre>'; print_r($result);echo '</pre>';
             $_SESSION['result'] = $result;
             
          ?>
                    <center>           
                    <h2 style="font-weight: bold;color:black">HOẠT ĐỘNG SINH VIÊN TRONG KHÁCH SẠN  </h2>
                    <?php  $_SESSION['header_title']  ='HOẠT ĐỘNG SINH VIÊN TRONG KHÁCH SẠN';
                           $_SESSION['title']  ='HoatDongSinhVienTrongKhachSan';
                    ?>
                      
                    </center>
               <form target="_blank" action="export_svkssv.php" method="post" onsubmit='
                $("#datatodisplay").val($("<div>").append( $("#ReportTable").eq(0).clone() ).html()); '>
                <div id="ReportTable" >
                    <table cellpadding="1" cellspacing="0" border="1" class="display dataTable" id="allan" style="font-size:9px">
                    <thead>
                            <tr> 
                                    <th class="center">Năm học</th>
                                    <th class="center">Mã phòng</th>
                                    <th class="center">Ngày vào</th>
                                    <th class="center">Ngày ra</th>
                                    <th class="center">Chỉ số điện khi vào</th>
                                    <th class="center">Chỉ số nước lạnh khi vào</th>
                                    <th class="center">Chỉ số nước nóng khi vào</th>
                                    <th class="center">Chỉ số điện khi ra</th>
                                    <th class="center">Chỉ số nước lạnh khi ra</th>
                                    <th class="center">Chỉ số nước nóng khi ra</th>
                                    <th class="center">Trạng thái</th>
                          
                            </tr>
                    </thead>
                     <tbody>
           <?php 
               if ($result['MaSinhVien'] <> null)
                         { ?>
                              <tr class="gradeX">
                                    <td align="center"><?php echo $result['NamHoc']; ?></td>
                                    <td align="center"> <a target="_blank" href="../tracuutt/ttsv_thongsodiennuoc.php?data=<?php echo $result['MaPhong']; ?>"><?php echo $result['MaPhong']; ?> </a></td>
                                    <td align="center"><?php echo $result['NgayVao']; ?></td>
                                    <td align="center">
                                        <?php 
                                            if ($status > 0)  echo '';
                                            else 
                                            echo $result['NgayRa'];   
                                            ?> 
                                    </td>
                                    <td align="center"><?php echo $result['chiSoDienKhiVao']; ?></td>
                                    <td align="center"><?php echo $result['chiSoNuocLanhKhiVao']; ?></td>
                                    <td align="center"><?php echo $result['chiSoNuocNongKhiVao']; ?></td>
                                    <td align="center">
                                          <?php 
                                            if ($status > 0)  echo '';
                                            else 
                                            echo $result['chiSoDienKhiRa'];   
                                            ?> 
                                    </td>
                                    <td align="center">
                                           <?php 
                                            if ($status > 0)  echo '';
                                            else 
                                            echo $result['chiSoNuocLanhKhiRa'];   
                                            ?> 
                                    </td>
                                    <td align="center">
                                            <?php 
                                            if ($status > 0)  echo '';
                                            else 
                                            echo $result['chiSoNuocNongKhiRa'];   
                                            ?> 
                                    </td>
                                    <td align="center">
                                         <?php 
                                            if ($status > 0)  
                                            echo "<b>".$result['TrangThai']."</b>";  
                                            else 
                                            echo $result['TrangThai'];   
                                            ?> 
                                    </td>
                                </tr>
                 <?php } else
                         {  
                           for($i =0; $i<Count($result); $i++)
                            {
                               if(trim($result[$i]['TrangThai']) == 'Đang ở') $status =1;
                               else $status =0  ;
                               $curYear = date('Y'); 
                               if ($curYear == substr($result[$i]['NamHoc'],-4))
                               $url="<a title=\"Click xem thông tin chi tiết điện nước theo tháng tại phòng\" style=\"font-size:12px;text-decoration:underline\" target=\"_blank\" href=\"../tracuutt/ttsv_thongsodiennuoc.php?data=".$result[$i]['MaPhong']."\">".$result[$i]['MaPhong']."</a>"; 
                               else
                               $url ="<span style=\"font-size:12px\">".$result[$i]['MaPhong']."</span>" ;      
                            ?>
                               
                               <tr class="gradeX">
                                    <td align="center"><?php echo $result[$i]['NamHoc']; ?></td>
                                    <td align="center">	
                                     <?php echo $url; ?>
                                    </td>
                                    <td align="center"><?php echo $result[$i]['NgayVao']; ?></td>
                                    <td align="center">
                                        <?php 
                                            if ($status > 0)  echo '';
                                            else 
                                            echo $result[$i]['NgayRa'];   
                                            ?> 
                                    </td>
                                    <td align="center"> <?php echo $result[$i]['chiSoDienKhiVao'];?> </td>
                                    <td align="center"><?php echo $result[$i]['chiSoNuocLanhKhiVao']; ?></td>
                                    <td align="center"><?php echo $result[$i]['chiSoNuocNongKhiVao']; ?></td>
                                    <td align="center">
                                          <?php 
                                            if ($status > 0)  echo '';
                                            else 
                                            echo $result[$i]['chiSoDienKhiRa'];   
                                            ?> 
                                    </td>
                                    <td align="center">
                                           <?php 
                                            if ($status > 0)  echo '';
                                            else 
                                            echo $result[$i]['chiSoNuocLanhKhiRa'];   
                                            ?> 
                                    </td>
                                    <td align="center">
                                            <?php 
                                            if ($status > 0)  echo '';
                                            else 
                                            echo $result[$i]['chiSoNuocNongKhiRa'];   
                                            ?> 
                                    </td>
                                    <td align="center">
                                         <?php 
                                            if ($status > 0)  
                                            echo "<b>".$result[$i]['TrangThai']."</b>";  
                                            else 
                                            echo $result[$i]['TrangThai'];   
                                            ?> 
                                    </td>
                                </tr>
                            <?php } 
                 } ?>
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
            <div>
                <center>    
            <img src="../images/stop.png" alt="stop" style="height: 100px">
            <h2 style="line-height:100px;color:red;">Không tồn tại sinh viên trong khách sạn !</h2>
                </center>
            </div>

            <?php } ?>
      <?php }?>