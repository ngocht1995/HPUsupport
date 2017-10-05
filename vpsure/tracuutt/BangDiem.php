<style type="text/css">
    table {
    border-collapse: collapse;
    width: 100%;
    border:solid black;
}

th, td {
    text-align: left;
    padding: 8px;
    border:1px solid black;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: black;
    color: black;
}
</style>
<?php 
   if($arwrk[0]['code_ser'] =='BangDiem') 
        {    
        //$result_header = $result['ThongTinSinhVienResult']['diffgram']['DocumentElement']['ThongTinSinhVien'];
     if (isset($result['BangDiemResult']['diffgram']['DocumentElement']['BangDiem'])) 
        {
        $result = $result['BangDiemResult']['diffgram']['DocumentElement']['BangDiem'];
        //echo '<pre>'; print_r($result);echo '</pre>';
        $_SESSION['result'] = $result;
        $_SESSION['result_core'] = $result;
        
      
        ?>

<div style="position: relative;bottom:500px">
    <center>
<span style="color:#333366;font-weight: bold;">Hiển thị:</span>
<select name="search_scores" style="width: 350px"  id="search_scores_id">
                                        <option value="0">Thang điểm </option>
					<option value="1">Thang điểm 10 </option>
					<option value="2">Thang điểm 4</option>
					<option value="3">Thang điểm chữ</option>
					
</select>
   </center>
</div>
<div style="clear: both"></div>
 <script type="text/javascript">
$(document).ready(function(){
  //  $("#a1").hide();
    $("#search_scores_id").change( function() {
        $("#result").html('Retrieving ...');
        $.ajax({
            type: "POST",
            data: "data=" + $(this).val(),
            url: "score_detail.php",
            success: function(msg){
                if (msg != ''){
                   $("#abc").html(msg).show();

                    $("#result").html('');
                }
                else{
                    $("#result").html('<em>No item result</em>');
                }
            }
        });
    });
});
</script>
<div id="abc">
   
</div>
<div id="result" style="position: relative;bottom:500px">

<center>           
          
 <table class="display table" style="width:40%">
    <tr>
        <td colspan="4" style="text-align: center">
             <h2 style="font-weight: bold;color:black;font-size: 20px">BẢNG ĐIỂM CHI TIẾT</h2>
            <?php  $_SESSION['header_title']  ='BẢNG ĐIỂM CHI TIẾT';
                   $_SESSION['title']  ='BangDiem';
            ?>
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
        <td><span style="color: black;font-weight: bold">Ngành học:</span></td><td> <?php echo $_SESSION['arraythongtin']['TenNganh'] ?> &nbsp; &nbsp;<b> Lớp:</b> <?php echo $_SESSION['arraythongtin']['MaLop'] ?></td>
        <td><span style="color: black;font-weight: bold">Khóa học:</span></td><td> <?php echo $_SESSION['arraythongtin']['TenKhoaHoc'] ?></td>
    </tr>
     <tr>
        <td style="width:80PX;"><span style="color: black;font-weight: bold" class="phead_tientrinh">Hệ đào tạo:</span></p></td><td> <?php echo $_SESSION['arraythongtin']['TenHeDaoTao'] ?></td>
        <td style="width: 130PX;"><span style="color: black;font-weight: bold" class="phead_tientrinh">Hình thức đào tạo:</span></td><td> <?php echo $_SESSION['arraythongtin']['DaoTao'] ?></td>
    </tr>    
</table>
            </center>
             <br/>
 <br/>

            <form target="_blank" action="export_bangdiem.php?data=1" method="post" onsubmit='
                $("#datatodisplay").val($("<div>").append( $("#ReportTable").eq(0).clone() ).html());'>
            
     <table class="display dataTable" id="allan" style="font-size: 17px;width:80%;">
                    <thead>
                            <tr style="background-color: white" > 
                                    <th class="sophieu" >Năm học</th>
                                    <th class="ngaythu">Học kỳ</th>
                                    <th class="sotien">Tên môn học</th>
                                    <th class="namhoc">Tỉ lệ <br/> điểm</th>
                                    <th class="namhoc">KL</th>
                                    <th class="namhoc">DQT</th>
                                    <th class="hocky">Điểm Thi1</th>
                                    <th class="phieuhuy"> Điểm TH1 </th>
                                    <th class="hocky">Điểm Thi2</th>
                                    <th class="phieuhuy"> Điểm TH2 </th>
                                    <th class="phieuhuy"> KQ </th>
                            
                            </tr>
                    </thead>
                    <tbody>
                    <?php 
                  if ($result['TenMocHoc'] <> null)
                         { 
                   ?>   
                        <tr class="gradeX">
                              <?php 
                                if ( ($result['DiemTH1'] < 5) && ($result['DiemTH2'] <5))
                                {
                                    $style="red";
                                    $kq= "xx";
                                }
                                else 
                                {
                                     $style="";
                                    $kq= "";
                                }    
                            ?>
                 
<td class="center" ><?php echo $result[$i]['NamHoc']; ?></td> 
<td class="center"><?php echo $result[$i]['HocKy']; ?></td>
<td style="cursor: pointer;" title="<?php echo $result[$i]['MaMonHoc']; ?>"> <?php echo $result[$i]['TenMocHoc']; ?> </td>
<td class="center"><?php echo $result[$i]['TyLeDiem']; ?></td>
<td class="center"><?php echo $result[$i]['KL']; ?></td>
<td class="center"><?php echo $result[$i]['DQT']; ?></td>
<td class="center"><?php echo $result[$i]['DiemThi1']; ?></td>
<td class="center"><?php echo $result[$i]['DiemTH1']; ?></td>
<td class="center"><?php echo $result[$i]['DiemThi2']; ?></td>
<td class="center"><?php echo $result[$i]['DiemTH2']; ?></td>  
<td class="center" style="background: <?php echo $style  ?>"> <?php echo $kq ?></td> 
                          
                            </tr>
                    <?PHP } ELSE { ?>
                         <tr class="gradeX">
                              <?php for($i =0; $i<Count($result); $i++)
                            {
                                if ( ($result[$i]['DiemTH1'] < 5) && ($result[$i]['DiemTH2'] <5))
                                {
                                    $style="red";
                                    $kq= "xx";
                                }
                                else 
                                {
                                     $style="";
                                    $kq= "";
                                }    
                            ?>
                             
        <td class="center" "><?php echo $result[$i]['NamHoc']; ?></td> 
        <td class="center"><?php echo $result[$i]['HocKy']; ?></td>
        <td  style="cursor: pointer;" title="<?php echo $result[$i]['MaMonHoc']; ?>"> <?php echo $result[$i]['TenMocHoc']; ?> </td>
        <td class="center"><?php echo $result[$i]['TyLeDiem']; ?></td>
        <td  class="center"><?php echo $result[$i]['KL']; ?></td>
        <td class="center"><?php echo $result[$i]['DQT']; ?></td>
        <td class="center"><?php echo $result[$i]['DiemThi1']; ?></td>
        <td class="center"><?php echo $result[$i]['DiemTH1']; ?></td>
        <td class="center"><?php echo $result[$i]['DiemThi2']; ?></td>
        <td class="center"><?php echo $result[$i]['DiemTH2']; ?></td>  
        <td class="center" style="background: <?php echo $style  ?>"> <?php echo $kq ?></td> 
                    
                            </tr>
                    <?PHP } ?>
                       
                            <?php } ?>
                    </tbody>
                    </table>
                <div style="padding:30px 0px 10px 0px">
                <center>
                <input type="hidden" id="datatodisplay" name="datatodisplay">
                <input id="export_excel" type="submit" value="Xem - In ấn - Kết xuất">
                </center> 
                </div>
            </form>
</div>
 <div style="clear:both">

            <?php } else { ?>

                <div>
                <center>
                <h2 style="line-height:130px;color:red;">Không tồn tại bảng điểm của sinh viên !</h2>
                </center>
                </div>

     <?php } ?>
<?php } ?>