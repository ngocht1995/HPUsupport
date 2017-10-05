<?php 
   if($arwrk[0]['code_ser'] =='MonHocDangKy') 
        {    
        //$result_header = $result['ThongTinSinhVienResult']['diffgram']['DocumentElement']['ThongTinSinhVien'];
     if (isset($result['MonHocDangKyResult']['diffgram']['DocumentElement']['MonHocDangKy'])) 
        {
        $result = $result['MonHocDangKyResult']['diffgram']['DocumentElement']['MonHocDangKy'];
        //echo '<pre>'; print_r($result);echo '</pre>';
        $_SESSION['result'] = $result;
        ?>
            <center>           
            <h2 style="font-weight: bold;color:black">CÁC MÔN HỌC ĐĂNG KÝ </h2>
            <?php  $_SESSION['header_title']  ='CÁC MÔN HỌC ĐĂNG KÝ';
                   $_SESSION['title']  ='CacMonHocDangKy';
            ?>
            </center>
            <form target="_blank" action="export_dkmh.php" method="post" onsubmit='
                $("#datatodisplay").val($("<div>").append( $("#ReportTable").eq(0).clone() ).html()); '>
                <div id="ReportTable" >
                    <table cellpadding="1" cellspacing="0" border="1" class="display dataTable" id="allan" style="font-size: 12px;">
                    <thead>
                            <tr> 
                                    <th class="sophieu" >Mã lớp</th>
                                    <th class="sophieu" >Mã môn</th>
                                    <th class="ngaythu">Tên môn học</th>
                                    <th class="noidung">Số t/c</th>
                                    <th class="sotien" >Số tiền</th>
                                    <th class="hocky">Học kỳ</th>
                                    <th class="namhoc">Năm học</th>
                                    <th class="phieuhuy"> Trạng thái </th>

                            </tr>
                    </thead>
                  <?php 
                  if ($result['MaMonhoc'] <> null)
                         { 
                   ?>
                    <tbody>
                            <tr class="gradeX">
                                    <td><?php
                                    if( $result['MaLop'] <> "") echo $result['MaLop'] ;
                                    else echo  $_SESSION['arraythongtin']['MaLop'] ;
                                    ?></td>  
                                    <td class="center"><?php echo $result['MaMonHoc']; ?></td>  
                                    <td><?php echo $result['TenMonHoc']; ?></td>
                                    <td class="center"><?php echo $result['sotc']; ?></td>
                                    <td class="center"><?php echo $result['HocPhi']; ?></td>
                                    <td class="center"><?php echo $result['HocKy']; ?></td>
                                    <td class="center"><?php echo $result['NamHoc']; ?></td> 
                                    <td class="center"><?php echo $result['TrangThai']; ?></td>    
                            </tr>
                   
                    </tbody>
                    <?php } else  { ?>
                     <tbody>
                            <?php for($i =0; $i<Count($result); $i++)
                            {
                            ?>
                            <tr class="gradeX">
                                    <td><?php
                                    if( $result[$i]['MaLop'] <> null) echo $result[$i]['MaLop'] ;
                                    else echo  $_SESSION['arraythongtin']['MaLop'] ;
                                    ?></td>  
                                    <td class="center"><?php echo $result[$i]['MaMonHoc']; ?></td>  
                                    <td><?php echo $result[$i]['TenMonHoc']; ?></td>
                                    <td class="center"><?php echo $result[$i]['sotc']; ?></td>
                                    <td class="center"><?php echo $result[$i]['HocPhi']; ?></td>
                                    <td class="center"><?php echo $result[$i]['HocKy']; ?></td>
                                    <td class="center"><?php echo $result[$i]['NamHoc']; ?></td> 
                                    <td class="center"><?php echo $result[$i]['TrangThai']; ?></td>    
                            </tr>
                            <?php } ?>
                    </tbody>
                    <?php } ?>
                    </table>
                </div>
                <center>
                <div style="padding:30px 0px 10px 0px">
                <input type="hidden" id="datatodisplay" name="datatodisplay">
                <input id="export_excel" type="submit" value="Xem - In ấn - Kết xuất">
                </center>
                </div>
            </form>
                <div style="clear:both">
            <?php } else { ?>

                <div>
                 <center>
                <h2 style="line-height:130px;color:red;">Không tồn tại môn học đã đăng ký !</h2>
                  </center>
                </div>

     <?php } ?>
<?php } ?>