<!-- hien thi service thong tin khach san sinh vien-->
        <?php if($arwrk[0]['code_ser'] =='SoChoTrongKSSV') 
        {    
        //$result_header = $result['ThongTinSinhVienResult']['diffgram']['DocumentElement']['ThongTinSinhVien'];
            if (isset($result['SoChoTrongKSSVResult']['diffgram']['DocumentElement']['SoChoTrongKSSV']))
            {  
            $result = $result['SoChoTrongKSSVResult']['diffgram']['DocumentElement']['SoChoTrongKSSV'];
            // echo '<pre>'; print_r($result);echo '</pre>';
             $_SESSION['result'] = $result;
          ?>
<h2 style="padding: 5px 5px 5px 5px"><b> Thống kê hiện thời phòng tại khách sạn sinh viên </b></h2>
 <table cellpadding="1" cellspacing="0" border="1" class="display dataTable" id="allan">
                    <thead>
                            <tr> 
                                    <th style="text-align: center"  align="center">STT</th>
                                    <th  style="text-align: center" >Loại phòng</th>
                                    <th  style="text-align: center" >Số SV đang ở</th>
                                    <th  style="text-align: center" >Số chỗ trống</th>  
                                    <th  style="text-align: center" >Tổng số chỗ</th> 
                            </tr>
                    </thead>
                     <tbody>
                         <?php 
                           for($i =0; $i<Count($result); $i++)
                               { 
                         ?>
                              <tr class="gradeX">
                                    <td align="center"><?php echo $i+1; ?></td>
                                    <td align="center"><?php echo $result[$i]['Loai']; ?></td>
                                    <td align="center"><?php echo $result[$i]['SoSVDangO']; ?></td>
                                    <td align="center"><?php echo $result[$i]['SoChoTrong']; ?></td>
                                    <td align="center"><?php echo $result[$i]['TongSoCho']; ?></td>
                                </tr>
                         <?php  } ?>
                     </tbody>
   </table>
<div style="clear: both"></div>
<h2 style="padding:5px"><b> Bảng giá sử dụng điện nước hiện thời tại khách sạn sinh viên</b></h2>
<table cellpadding="1" cellspacing="0" border="1" class="display dataTable" id="allan">
                    <thead>
                            <tr> 
                                    <th style="text-align: center"  align="center">STT</th>
                                    <th  style="text-align: center" >Giá điện</th>
                                    <th  style="text-align: center" >Giá nước lạnh</th>
                                    <th  style="text-align: center" >Giá nước nóng</th>  
                                    <th  style="text-align: center" >Giá phòng ở</th>
                                    <th  style="text-align: center" >Thời gian áp dụng</th> 
                            </tr>
                    </thead>
                     <tbody>
                         <?php 
                           $array_giatien= Get_arrayservice('1354020033','GiaDienNuocKSSV');
                           $array_giatien = $array_giatien['GiaDienNuocKSSVResult']['diffgram']['DocumentElement']['GiaDienNuocKSSV']; // mang tien tinh theo thoi gian
                           $max =Count($result);
                            
                         ?>
                              <tr class="gradeX">
                                    <td align="center"><?php echo 1; ?></td>
                                    <td align="center"><?php echo display_number($array_giatien[0]['giaDien'])."/số"; ?></td>
                                    <td align="center"><?php echo display_number($array_giatien[0]['giaNuocLanh'])."/khối"; ?></td>
                                    <td align="center"><?php echo display_number($array_giatien[0]['giaNuocNong'])."/khối"; ?></td>
                                    <td align="center"><?php echo display_number($array_giatien[0]['giaPhongO'])."/ngày"; ?></td>
                                    <td align="center"><?php echo date ('j/m/Y',strtotime($array_giatien[0]['apDungTuNgay'])); ?></td>
                                </tr>
                                </tr>
             
                     </tbody>
                      <tfoot>
                                <tr>
                                    <th colspan="6">Đơn vị tính: VNĐ</th>
                                </tr>
                      </tfoot>
    </table>
<div style="clear: both"></div>
<div class="noidung" style="padding: 10px 5px 10px 5px">
    <?php echo $arwrk[0]['descript_ser'] ?>
</div>
            <?php } else { ?>
            <div>
                <center>    
            <h2 style="line-height:100px;color:red;">Không có thông tin về khách sạn sinh viên !</h2>
                </center>
            </div>

            <?php } ?>
      <?php }?>