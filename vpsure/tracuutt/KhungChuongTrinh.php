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
            <center>           
            <h2 style="font-weight: bold;color:black">KHUNG CHƯƠNG TRÌNH </h2>
            <?php  $_SESSION['header_title']  ='KHUNG CHƯƠNG TRÌNH';
                   $_SESSION['title']  ='KhungChuongTrinh';
            ?>
            </center>
            <form target="_blank" action="export_khungchuongtrinh.php" method="post" onsubmit='
                $("#datatodisplay").val($("<div>").append( $("#ReportTable").eq(0).clone() ).html()); '>
                <div id="ReportTable" >
            <table cellpadding="1" cellspacing="0" border="1" class="display dataTable" id="allan">
                    <thead>
                            <tr> 
                                    <th class="hocky">STT</th>
                                    <th class="sophieu" >Mã môn Học</th>
                                    <th class="ngaythu">Tên môn học</th>
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

<style type="text/css">
table.sample {
	border-width: 1px;
	border-spacing: 2px;
	border-style: outset;
	border-color: gray;
	border-collapse: separate;
	background-color: white;
        width: 100%
}
table.sample th {
	border-width: 1px;
	padding: 1px;
	border-style: inset;
	border-color: gray;
	background-color: white;

}
table.sample td {
	border-width: 1px;
	padding: 1px;
	border-style: inset;
	border-color: gray;
	background-color: white;
	
}
</style>
 <?php
$result_mhtc= Get_arrayservice($_SESSION['arraythongtin']['MaSinhVien'],'NhomMonTuChon');
if (isset($result_mhtc['NhomMonTuChonResult']['diffgram']['DocumentElement']['NhomMonTuChon'])) 
  {
$result_mhtc = $result_mhtc['NhomMonTuChonResult']['diffgram']['DocumentElement']['NhomMonTuChon'];
$nhommon= "";
$nhommon = $result_mhtc[0]['TenNHom']; 
$tong = 0;
$stt =0;
?>
<table class="sample">
 <thead>
                            <tr>
                                <td colspan="3" style="text-align: center">
                                    <b style="font-size: 16px"> MÔN HỌC TỰ CHỌN </b>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: center"><b>TT</b></td>
                                <td style="text-align: center"><b>Mã môn học <b></td>
                                <td style="text-align: center"><b>Tên môn học</b></td>
                            </tr>
 </thead>
<?php  
for ($j=0;$j<count($result_mhtc);$j++ )
{
 ?>
  <tbody>
      <?php if(($result_mhtc[$j]['TenNHom'] <> $nhommon) || ($j == 0)) { 
        $nhommon = $result_mhtc[$j]['TenNHom']; 
        $tong =$tong + 1; 
        $stt =0;
        if (($result_mhtc[$j]['SoMonPhaiChon'] == 1) || ($result_mhtc[$j]['SoMonPhaiChon'] == true))  $bb ="(bắt buộc)"; else $bb="";
    ?>
                          <tr>
                                <td colspan="3">
                                    <b><?php echo 'NHÓM MÔN TỰ CHỌN '.$tong.": ".$result_mhtc[$j]['TenNHom']  ?>   </b> <?php echo $bb; ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <?php echo "Chọn ".$result_mhtc[$j]['SoMonPhaiChon'].'/'.$result_mhtc[$j]['TongSoMonTuChon']." môn trong các môn" ?>
                                </td>
                            </tr>
             
         <?php } ?>
            <tr>
                                <td style="text-align: center"><?php 
                                $stt = $stt +1;
                                echo $stt  ?></td>
                                <td><?php echo $result_mhtc[$j]['MaMonHoc']  ?></td>
                                <td><?php echo $result_mhtc[$j]['TenMonHoc']  ?></td>
                            </tr>
 
 </tbody>
 <?php } ?>
</table>
<?php } ?>                 
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

                <div style="padding-left: 80px;">
                <img src="../images/stop.png" alt="stop" style="height: 130px">
                <h2 style="line-height:130px;color:red;">Không tồn tại môn học đã dăng ký !</h2>
                </div>

     <?php } ?>
<?php } ?>