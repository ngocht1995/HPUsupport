
 <div class="sidebar-menu" style="border-radius: 25px">
		  	<div class="logo"> <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="#"> <span id="logo" ></span> 
			      <!--<img id="logo" src="" alt="Logo"/>--> 
			  </a> </div>		  
		    <div class="menu">
		      <ul id="menu" >
		        <li id="menu-home" ><a href="index.html"><i class="fa fa-tachometer"></i><span>Trang chủ</span></a></li>
		    	<li><a href="#"><i class="fa fa-search"></i><span>Tra cứu thông tin</span></a></li>
		        <li><a href="#"><i class="fa fa-calendar-check-o"></i><span>Thời khóa biểu</span><span class="fa fa-angle-right" style="float: right"></span></a>
		        	 <ul id="menu-academico-sub" >
		        	 	<li><a href="http://hpu.edu.vn/thoikhoabieu/Tkb_GiaoVien/DanhSachGiaoVien.html">Thời khóa biểu giáo viên</a></li>
		        	 	<li><a href="http://hpu.edu.vn/thoikhoabieu/Tkb_Lop/DanhSachLop.html">Thời khóa biểu lớp</a></li>
			            <li><a href="http://hpu.edu.vn/thoikhoabieu/Tkb_PhongHoc/DanhSachPhongHoc.html">Thời khóa biểu phòng học</a></li>
		             </ul>
		        </li>      
		        <li><a href="#"><i class="fa fa-bell-o"></i><span>Thông báo</span></a></li>
		        <li><a href="#"><i class="fa fa-comments"></i><span>Trợ giúp</span><span class="fa fa-angle-right" style="float: right"></span></a>
		        	 <ul id="menu-academico-sub" >
		        	 	<li id="" ><a href="inbox.html">Câu hỏi thường gặp</a></li>
			            <li id="" ><a href="inbox.html">Đặt câu hỏi</a></li>
			            <li id="" ><a href="inbox-details.html">Câu hỏi đã trả lời</a></li>
		             </ul>
		        </li>
		    
		      </ul>
		    </div>
	 </div>
	<div class="clearfix"> </div>
	
<script type="text/javascript">
	
var toggle = true;
  function w3_close() {
				$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
   				 $("#menu span").css({"position":"absolute"});
		};

$(".sidebar-icon").click(function() {               
  if (toggle)
  {
    $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
    setTimeout(function() {
      $("#menu span").css({"position":"relative"});
    }, 400);
  }                           
});
</script>