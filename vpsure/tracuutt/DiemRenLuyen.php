<?php 
   if($arwrk[0]['code_ser'] =='SinhvienDiemRenLuyen') 
        {    
        //$result_header = $result['ThongTinSinhVienResult']['diffgram']['DocumentElement']['ThongTinSinhVien'];
     if (isset($result['SinhvienDiemRenLuyenResult']['diffgram']['DocumentElement']['SinhvienDiemRenLuyen'])) 
        {
        $result = $result['SinhvienDiemRenLuyenResult']['diffgram']['DocumentElement']['SinhvienDiemRenLuyen'];
        //echo '<pre>'; print_r($result);echo '</pre>';
        $_SESSION['result'] = $result;
        ?>
<div id="printdiv">
 <div class="clr"></div>	
<table style="width: 100%">
    <tr>
        <td colspan="4" style="text-align: center">
            <h2 class="phead_tientrinh">
                <b>   ĐIỂM RÈN LUYỆN </b>
            <input style="float: right" id="export_excel" onclick="printform('ReportTable1')" type="button" value="&nbsp;&nbsp;&nbsp;  In ấn &nbsp;&nbsp;&nbsp; ">
            </h2>
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
        <td><span style="color: black;font-weight: bold">Ngành học:</span></td><td> <?php echo $_SESSION['arraythongtin']['TenNganh'] ?></td>
        <td><span style="color: black;font-weight: bold">Khóa học:</span></td><td> <?php echo $_SESSION['arraythongtin']['TenKhoaHoc'] ?></td>
    </tr>
     <tr>
        <td style="width:80PX;"><span style="color: black;font-weight: bold" class="phead_tientrinh">Hệ đào tạo:</span></p></td><td> <?php echo $_SESSION['arraythongtin']['TenHeDaoTao'] ?></td>
        <td style="width: 130PX;"><span style="color: black;font-weight: bold" class="phead_tientrinh">Hình thức đào tạo:</span></td><td> <?php echo $_SESSION['arraythongtin']['DaoTao'] ?></td>
    </tr>
    
</table>
<?php
  
      $categories ="";
      $data_lan1="";
      $string_lan1="";
       if (($result['MaSinhVien'] <> null))
       {
                $string_cate= $string_cate."'HK:".$result['HocKy']."<br/>".$result['NamHoc']."', ";
                $string_lan1 =$string_lan1."".$result['Diem'].", ";
       }
       else 
       {
            for($i=0;$i<count($result);$i++)
             {
                $string_cate= $string_cate."'HK:".$result[$i]['HocKy']."<br/>".$result[$i]['NamHoc']."', ";
                $string_lan1 =$string_lan1."".$result[$i]['Diem'].", ";
             }
                  
       }    
   $categories= "categories: [".$string_cate."]";
   $data_lan1="data: [".$string_lan1."]";

  ?>           

<script src="../js/highcharts.js"></script>
<script src="../js/exporting.js"></script>    
<script type="text/javascript">
$(function () {
    var chart;
         $(document).ready(function() {

        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'container1',
                type: 'line'
            },
            title: {
                text: 'Biểu đồ điểm rèn luyện ',
                x: -20 //center
            },
            subtitle: {
                text: '',
                x: -20
            },
            xAxis: {
                title: {
                    text: 'Trục giá trị theo học Kỳ của năm học'
                },
                 <?php echo $categories; ?>
            },
            yAxis: {
                title: {
                    text: 'Trục điểm theo thang diểm 100'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                formatter: function() {
                        return '<b>'+ this.series.name +'</b><br/>'+
                        'Học kỳ:'+this.x +': '+ this.y +'(Điểm)';
                }
            },
            legend: {
                layout: 'vertical',
                verticalAlign: 'top',
                x: 80,
                y: 30,
                borderWidth: 0
            },
            series: [{
                name: 'Điểm rèn luyện',
                <?php echo $data_lan1; ?>
            }]
        });

   }); 
});
		</script>
<div class="clr"></div>	
<div id="container1" style="width:700px; height: 400px; margin: 0 auto"></div>



            <center>           
            
            <?php  $_SESSION['header_title']  ='ĐIỂM RÈN LUYỆN';
                   $_SESSION['title']  ='DiemRenLuyen';
            ?>
            </center>
            <form target="_blank" action="export_diemrenluyen.php" method="post" onsubmit='
                $("#datatodisplay").val($("<div>").append( $("#ReportTable").eq(0).clone() ).html()); '>
                <div id="ReportTable" >
              
            <table cellpadding="1" cellspacing="0" border="1" class="display dataTable" id="allan">
                    <thead>
                            <tr> 
                                    <th class="sophieu" >Năm học</th>
                                    <th class="ngaythu">Học kỳ</th>
                                    <th class="hocky">Điểm rèn luyện</th>
                               
                            </tr>
                    </thead>
                    <tbody>
                            <?php for($i =0; $i<Count($result); $i++)
                            {
                            ?>
                            <tr class="gradeX">
                                    <td class="center"><?php echo $result[$i]['NamHoc']; ?></td> 
                                    <td class="center"><?php echo $result[$i]['HocKy']; ?></td>
                                    <td class="center"><?php echo $result[$i]['Diem']; ?></td>
                            </tr>
                            <?php } ?>
                    </tbody>
                    </table>
                </div>
         </div>
 <!-- end print diem ren luen -->     
                <center>
                <div style="padding:30px 0px 10px 0px">
                <input type="hidden" id="datatodisplay" name="datatodisplay">
                <input id="export_excel" type="submit" value="Xem - Kết xuất">
                <input id="export_excel" onclick="printform('printdiv')" type="button" value="&nbsp;&nbsp;&nbsp; In ấn &nbsp;&nbsp;&nbsp; ">
                </center>
                </div>
            </form>
     <div style="clear:both">            
            <?php } else { ?>

                <div>
                    <center>
                <h2 style="line-height:130px;color:red;">Không tồn tại điểm rèn luyện của sinh viên !</h2>
                    </center>
                </div>

     <?php } ?>
<?php } ?>