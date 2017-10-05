<!-- hien thi service cac khoan sinh vien còn nợ trong KSSV-->
        <?php if($arwrk[0]['code_ser'] =='NoTienKSSV') 
        {    
        //$result_header = $result['ThongTinSinhVienResult']['diffgram']['DocumentElement']['ThongTinSinhVien'];
            if (isset($result['NoTienKSSVResult']['diffgram']['DocumentElement']['NoTienKSSV']))
            {  
            $result = $result['NoTienKSSVResult']['diffgram']['DocumentElement']['NoTienKSSV'];
            // echo '<pre>'; print_r($result);echo '</pre>';
             $_SESSION['result'] = $result;
             $tong_tien=0;
          ?>
                    <center>           
                    <h2 style="font-weight: bold;color:black">KHOẢN NỢ KHÁCH SẠN SINH VIÊN </h2>  
                    </center>
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
                   <div style="clear: both"> <p class="phead_thongbao"><b>Tổng số tiền thiếu: </b><?php echo display_number($tong_tien); ?> (VNĐ)</p></div>
                </div>
            </form>
                <div style="clear:both">

            <?php } else { ?>
            <div style="padding-left:20px;">
                <center>
            <h2 style="line-height:130px;color:red;">Sinh viên không nợ tiền KSSV!</h2>
              </center>
            </div>

            <?php } ?>
      <?php }?>