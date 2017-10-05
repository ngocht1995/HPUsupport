<!-- hien thi service cac khoan sinh vien con thieu-->

        <?php 
        if($arwrk[0]['code_ser'] =='MienGiamHP') 
        {    
        //$result_header = $result['ThongTinSinhVienResult']['diffgram']['DocumentElement']['ThongTinSinhVien'];
            if (isset($result['MienGiamHPResult']['diffgram']['DocumentElement']['MienGiamHP']))
            {  
            $result = $result['MienGiamHPResult']['diffgram']['DocumentElement']['MienGiamHP'];
             $_SESSION['result'] = $result;
             $tong_tien=0;
          ?>
                    <center>           
                    <h2 style="font-weight: bold;color:black">CÁC KHOẢN SINH VIÊN ĐƯỢC MIỄN GIẢM </h2>  
                    </center>
               <form target="_blank" action="export_cksvct.php" method="post" onsubmit='
                $("#datatodisplay").val($("<div>").append( $("#ReportTable").eq(0).clone() ).html()); '>
                <div id="ReportTable" >
                  <table cellpadding="1" cellspacing="0" border="1" class="display dataTable" id="allan">
                    <thead>
                            <tr> 
                                    <th style="text-align: center"  align="center">STT</th>
                                    <th  style="text-align: center" >Năm học</th>
                                    <th  style="text-align: center" >Nội dung</th>
                                    <th  style="text-align: center" >Số tiền miễn giảm</th>      
                            </tr>
                    </thead>
                     <tbody>
           <?php 
               if ($result['maSinhVien'] <> null)
                         {
                   $tong_tien= $tong_tien+($result['SoTienMienGiam']);
                   ?>
                              <tr class="gradeX">
                                    <td align="center"><?php echo '1'; ?></td>
                                    <td align="center"><?php echo $result['NamHoc']; ?></td>
                                    <td><?php echo $result['ghiChu']; ?></td>
                                    <td align="center"><?php echo display_number($result['SoTienMienGiam'])." (VNĐ)"; ?></td>
                                </tr>
                 <?php } else
                         {  
                           for($i =0; $i<Count($result); $i++)
                            {
                    $tong_tien= $tong_tien+($result[$i]['SoTienMienGiam']);
                            ?>
                               <tr class="gradeX">
                                    <td align="center"><?php echo $i+1; ?></td>
                                    <td align="center"><?php echo $result[$i]['NamHoc']; ?></td>
                                    <td><?php echo $result[$i]['ghiChu']; ?></td>
                                    <td align="center"><?php echo display_number($result[$i]['SoTienMienGiam'])." (VNĐ)"; ?></td>
                                </tr>
                            <?php } 
                 } ?>
                     </tbody>
                     <tfoot>
                                <tr>
                                    <th colspan="3">Tổng tiền</th>
                                    <th><?php echo display_number($tong_tien); ?></th>
                                </tr>
                      </tfoot>
                    </table>
                </div>
            </form>
                <div style="clear:both">

            <?php } else { ?>
            <div>
            <center>
            <h2 style="line-height:130px;color:red;">Sinh viên không thuộc diện được miễn giảm!</h2>
            </center>
            </div>

            <?php } ?>
      <?php }?>