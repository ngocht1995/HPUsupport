<html>

<style type="text/css">
    body {
  background: #eee;
  font: 12px Lucida sans, Arial, Helvetica, sans-serif;
    color: #333;
    text-align: center;
}

a {
    color: #2A679F;
}
/*========*/

.form-wrapper {
    background-color: #f6f6f6;
    background-image: -webkit-gradient(linear, left top, left bottom, from(#f6f6f6), to(#eae8e8));
    background-image: -webkit-linear-gradient(top, #f6f6f6, #eae8e8);
    background-image: -moz-linear-gradient(top, #f6f6f6, #eae8e8);
    background-image: -ms-linear-gradient(top, #f6f6f6, #eae8e8);
    background-image: -o-linear-gradient(top, #f6f6f6, #eae8e8);
    background-image: linear-gradient(top, #f6f6f6, #eae8e8);
    border-color: #dedede #bababa #aaa #bababa;
    border-style: solid;
    border-width: 1px;
    -webkit-border-radius: 10px;
    -moz-border-radius: 10px;
    border-radius: 10px;
    -webkit-box-shadow: 0 3px 3px rgba(255,255,255,.1), 0 3px 0 #bbb, 0 4px 0 #aaa, 0 5px 5px #444;
    -moz-box-shadow: 0 3px 3px rgba(255,255,255,.1), 0 3px 0 #bbb, 0 4px 0 #aaa, 0 5px 5px #444;
    box-shadow: 0 3px 3px rgba(255,255,255,.1), 0 3px 0 #bbb, 0 4px 0 #aaa, 0 5px 5px #444;
    margin: 100px auto;
    overflow: hidden;
    padding: 8px;
    width: 450px;
    position: relative;
    bottom: 500px;
    left:50px;
}

.form-wrapper #txtmsv {
    border: 1px solid #CCC;
    -webkit-box-shadow: 0 1px 1px #ddd inset, 0 1px 0 #FFF;
    -moz-box-shadow: 0 1px 1px #ddd inset, 0 1px 0 #FFF;
    box-shadow: 0 1px 1px #ddd inset, 0 1px 0 #FFF;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
    color: #999;
    float: left;
    font: 16px Lucida Sans, Trebuchet MS, Tahoma, sans-serif;
    padding: 10px;   
    height:10px;
}

.form-wrapper #txtmsv:focus {
    border-color: #aaa;
    -webkit-box-shadow: 0 1px 1px #bbb inset;
    -moz-box-shadow: 0 1px 1px #bbb inset;
    box-shadow: 0 1px 1px #bbb inset;
    outline: 0;
}

.form-wrapper #txtmsv:-moz-placeholder,
.form-wrapper #txtmsv:-ms-input-placeholder,
.form-wrapper #txtmsv::-webkit-input-placeholder {
    color: #999;
    font-weight: normal;
}

.form-wrapper #bnttracuu {
    background-color: #c2c2c2;
    background-image: -webkit-gradient(linear, left top, left bottom, from(#c2c2c2), to(#505050));
    background-image: -webkit-linear-gradient(top, ##c2c2c2, #505050);
    background-image: -moz-linear-gradient(top, #c2c2c2, #505050);
    background-image: -ms-linear-gradient(top, #c2c2c2, #505050);
    background-image: -o-linear-gradient(top, #c2c2c2, #505050);
    background-image: linear-gradient(top, #c2c2c2, #505050);
    border:solid 1px #c2c2c2;
    -moz-border-radius: 3px;
    -webkit-border-radius: 3px;
    border-radius: 3px;
    -webkit-box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset, 0 1px 0 #FFF;
    -moz-box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset, 0 1px 0 #FFF;
    box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset, 0 1px 0 #FFF;
    color: #fafafa;
    cursor: pointer;
    height: 42px;
    float: right;
    font: 15px Arial, Helvetica;
    padding: 0;
    text-transform: uppercase;
    text-shadow: 0 1px 0 rgba(0, 0 ,0, .3);
    width: 100px;
}

.form-wrapper #bnttracuu:hover,
.form-wrapper #bnttracuu:focus {
    background-color: #c2c2c2;
    background-image: -webkit-gradient(linear, left top, left bottom, from(#505050), to(#c2c2c2));
    background-image: -webkit-linear-gradient(top, #505050, #c2c2c2);
    background-image: -moz-linear-gradient(top, #505050, #c2c2c2);
    background-image: -ms-linear-gradient(top, #505050, #c2c2c2);
    background-image: -o-linear-gradient(top, #505050, #c2c2c2);
    background-image: linear-gradient(top, #505050, #c2c2c2);
}

.form-wrapper #bnttracuu:active {
    -webkit-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.5) inset;
    -moz-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.5) inset;
    box-shadow: 0 1px 4px rgba(0, 0, 0, 0.5) inset;
    outline: 0;
}

.form-wrapper #bnttracuu::-moz-focus-inner {
    border: 0;
}
</style>

<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "../admincontent/ewcfg6.php" ?>
<?php include "../admincontent/ewmysql6.php" ?>
<?php include "../admincontent/phpfn6.php" ?>
<?php include "../admincontent/userinfo.php" ?>
<?php include "../admincontent/userfn6.php" ?>

<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // Always modified
header("Cache-Control: private, no-store, no-cache, must-revalidate"); // HTTP/1.1
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache"); // HTTP/1.0
?>
<?php
// Define page object
$default = new cdefault();
$Page =& $default;

// Page init processing
$default->Page_Init();

// Page main processing
$default->Page_Main();
?>
<?php

//
// Page Class
//
class cdefault {

    // Page ID
    var $PageID = 'default';

    // Page Object Name
    var $PageObjName = 'default';

    // Page Name
    function PageName() {
        return ew_CurrentPage();
    }

    // Page Url
    function PageUrl() {
        $PageUrl = ew_CurrentPage() . "?";
        return $PageUrl;
    }

    // Message
    function getMessage() {
        return @$_SESSION[EW_SESSION_MESSAGE];
    }

    function setMessage($v) {
        if (@$_SESSION[EW_SESSION_MESSAGE] <> "") { // Append
            $_SESSION[EW_SESSION_MESSAGE] .= "<br>" . $v;
        } else {
            $_SESSION[EW_SESSION_MESSAGE] = $v;
        }
    }

    // Show Message
    function ShowMessage() {
        if ($this->getMessage() <> "") { // Message in Session, display
            echo "<p><span class=\"ewMessage\">" . $this->getMessage() . "</span></p>";
            $_SESSION[EW_SESSION_MESSAGE] = ""; // Clear message in Session
        }
    }

    // Validate Page request
    function IsPageRequest() {
        return TRUE;
    }

    //
    //  Class initialize
    //  - init objects
    //  - open connection
    //
    function cdefault() {
        global $conn;

        // Initialize user table object
        $GLOBALS["user"] = new cuser;

        // Intialize page id (for backward compatibility)
        if (!defined("EW_PAGE_ID"))
            define("EW_PAGE_ID", 'default', TRUE);

        // Open connection to the database
        $conn = ew_Connect();
    }

    //
    //  Page_Init
    //
    function Page_Init() {
        global $gsExport, $gsExportFile, $user;
        global $Security;
        $Security = new cAdvancedSecurity();

        // Global page loading event (in userfn6.php)
        Page_Loading();

        // Page load event, used in current page
        $this->Page_Load();
    }

    //
    //  Page_Terminate
    //  - called when exit page
    //  - if URL specified, redirect to the URL
    //
    function Page_Terminate($url = "") {
        global $conn;

        // Page unload event, used in current page
        $this->Page_Unload();

        // Global page unloaded event (in userfn*.php)
        Page_Unloaded();

        // Close Connection
        $conn->Close();

        // Go to URL if specified
        if ($url <> "") {
            ob_end_clean();
            header("Location: $url");
        }
        exit();
    }

    // Page main processing
    function Page_Main() {

    }

    // Page Load event
    function Page_Load() {

        //echo "Page Load";
    }

    // Page Unload event
    function Page_Unload() {

        //echo "Page Unload";
    }
}
?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Custom Theme files -->
<link href="../css/style.css" rel="stylesheet" type="text/css" media="all"/>
<!--js-->
<script src="../js/jquery-2.1.1.min.js"></script> 
<!--icons-css-->
<link href="../css/font-awesome.css" rel="stylesheet"> 
<?php include "../include/header.php" ?>
 <?php include ("ttsv_navi.php") ?>
<body>
  <?php $style_code="tracuu" ?>
  <?php //include ("../include/top_header.php");?>
  
<?php //include ("../include/menu_navi.php");?>


<div id="content" >
      <script type="text/javascript">
		$(document).ready(function(){
			$("#contact").validate({
				errorElement: "span", //Thành phần HTML hiện thông báo lỗi
				//Sử dụng tùy chọn rules cho những validate không hỗ trợ bởi class name
				rules: {
					cpassword: {
						equalTo: "#password" //So sánh với trường cpassword với thành trường có id là password
					},
					min_field: { min: 5 }, //Giá trị tối thiểu
					max_field: { max : 10 }, //Giá trị tối đa
					range_field: { range: [4,10] }, //Giá trị trong khoảng từ 4 - 10
					rangelength_field: { rangelength: [4,10] } //Chiều dài chuỗi trong khoảng từ 4 - 10 ký tự
				}
			});
		});
	</script>  
      <script>
    function searchKeyPress(e)
    {
        // look for window.event in case event isn't passed in
        if (typeof e == 'undefined' && window.event) { e = window.event; }
        if (e.keyCode == 13)
        {
            document.getElementById('bnttracuu').click();
        }
    }
   
    function searchKeyPressFullName(e)
    {
        // look for window.event in case event isn't passed in
  
        if (typeof e == 'undefined' && window.event) { e = window.event; }
        if (e.keyCode == 13)
        {
            
            document.getElementById('bnttracuu_tensinhvien').click();
           
        }
    }

    </script>   
    
   <?php
   
        $conn = ew_Connect();
    // xac dinh tham do hay 
    $today = date("Y-m-d H:i:s");    
    $sSqlWrk = "Select * From `t_setting` Where (set_id=2) And (set_active=1) And (t_setting.set_date_start<='$today') And (t_setting.set_date_end>='$today')";   
    $rswrk = $conn->Execute($sSqlWrk);
    $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
    if ($rswrk) $rswrk->Close();
    $rowswrk = count($arwrk);
    if ($rowswrk){
        $thamdo=true;
        $trangthai_thamdo = $arwrk[0]['set_status'];
       $GLOBALS['content_ax'] = $arwrk[0]['set_description'];
    } else 
    {
        $thamdo=false;
        $trangthai_thamdo = '';
        $content_ax ='';
      }  
   ?>
    <style>
        div#divhoten {display: none}
        #idxacdinhhoten:hover{color:navy;text-decoration: underline;cursor: pointer}    
    </style>
     <style type="text/css">
body {margin:0}

.icon-bar {
    width: 60px;
    background-color: #555;
    position: relative;
    bottom: 55px;
}

.icon-bar a {
    display: block;
    text-align: center;
    padding: 16px;
    transition: all 0.3s ease;
    color: white;
    font-size: 24px;
}

.icon-bar a:hover {
    background-color: #000;
}

.active {
    background-color: #4CAF50 !important;
}
</style>
      <div class="icon-bar">
  <a class="active" href="#"><i class="fa fa-home"></i></a> 
  <a href="#"><i class="fa fa-search"></i></a> 
  <a href="#"><i class="fa fa-envelope"></i></a> 
  <a href="#"><i class="fa fa-globe"></i></a>
  <a href="#"><i class="fa fa-trash"></i></a> 
  

</div>              
                 
    <div align="left" style="position: relative;left:70px;bottom: 320px;color:white;max-width: 300px">
        <i class="fa fa-search" style="font-size: 100px"> </i>
        <h1>Tra cứu</h2>
        <p><b>Tra cứu thông tin sinh viên</b></p>    
            
        </div>

  

  
      <form class="form-wrapper">
         <h3>Nhập mã sinh viên:</h3>
            <input onkeypress="searchKeyPress(event);" class="required" id="txtmsv" name="txtmsv" type="text" style="height: 40px;width: 330px"  value="" maxlength="12" />                        <input id="bnttracuu"  type="button" value="Tìm"   />   
            <span id="msgbox" style="display:none"></span>
            <span id="idxacdinhhoten" style="color:blue;position: relative;right: 100px;top:10px"> Tìm kiếm theo tên </span>
            <div id="divhoten"><br/>
            <span ><h3>Nhập tên sinh viên:</h3></span>
            <input onkeypress="searchKeyPressFullName(event);" class="required" id="txthoten" name="txthoten" type="text"  value="" />
            <input id="bnttracuu_tensinhvien"  type="button" value="Tra cứu"   /> <br/>
            <span id="msgbox"><i>( Tên quy định là tiếng việt có dấu)</i></span>
          </div><br/><br/>  
    </form>
        




                         <script>
                        $("#idxacdinhhoten").click(function () {
                        $("#divhoten").toggle();
                        });
                        </script>
						
                                    <script type="text/javascript">
                                    $(document).ready(function(){
                                         $("#bnttracuu").click(function () {
                                            $("#divhoten").hide();
                                            $.ajax({
                                                type: "POST",
                                                data: "msv=" + $("#txtmsv").val(),
                                                url: "secure.php",
                                                success: function(msg){
                                                    if (msg != ''){
                                                       $("#htht").html(msg).show();
                                                    }
                                                    else{
                                                        $("#htht").html('<em>No item result</em>');
                                                    }
                                                }
                                            });
                                        });
                                      });
                                    </script>
<script type="text/javascript">
$(document).ready(function(){
       
     $("#bnttracuu_tensinhvien").click(function () {
        strVal=  $("#txthoten").val();;
        var outString = strVal.replace(/[`~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]insert/gi, '');       
        $.ajax({
            type: "POST",
            data: "msv_fullname=" + outString,
            url: "secure_fullname.php",
            success: function(msg){
                if (msg != ''){
                   $("#htht").html(msg).show();
                }
                else{
                    $("#htht").html('<em>No item result</em>');
                }
            }
        });
    });
  });
</script>	
						
        <div style="clear: both"></div>
        <div id="htht" style="color: black"></div>
                           </div>       					
				
<div class="clr"></div>	
</body>	
 <?php //include ("../include/footer.php");?>

        
</html>