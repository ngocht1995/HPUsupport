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
                    <center>           
                    <h2 style="font-weight: bold;color:black">MÔN THI CHƯA QUA  </h2>
                    <?php  
                           $_SESSION['header_title']  ='MÔN THI CHƯA QUA';
                           $_SESSION['title']  ='CacMonSinhVienNoTrongKy';
                    ?>
                      
                    </center>
               <form target="_blank" action="export_msvntk.php" method="post" onsubmit='
                $("#datatodisplay").val($("<div>").append( $("#ReportTable").eq(0).clone() ).html()); '>
                <div id="ReportTable" >
                  <table cellpadding="1" cellspacing="0" border="1" class="display dataTable" id="allan">
                    <thead>
                            <tr> 
                                    <th style="text-align: center" class="center">STT</th>
                                    <th class="noidung center">Tên môn</th>
                                    <th style="text-align: center" class="center"> Điểm </th>         
                            </tr>
                    </thead>
                     <tbody>
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
            <h2 style="line-height:130px;color:red;">Sinh viên đã thi qua hết tất cả các môn!</h2>
             </center>
            </div>

            <?php } ?>
      <?php }?>