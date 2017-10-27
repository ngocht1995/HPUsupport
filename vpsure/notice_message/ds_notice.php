<style type="text/css">
    html,body{
        background-image: url("../notice_message/img/thongbao-background.png");
    }
    input{
        border-radius: 5px;
        background-color: #313131;
        color:white;
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
<?php include "intro_articleinfo.php" ?>
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
 <?php $style_code="thongbao" ?>
<?php include ("../include/header.php");?>

     <style type="text/css">
body {margin:0}

.icon-bar {
    width: 50px;
    height: 350px;
    background-color: #555;
    padding-left: 10px;
    border-radius: 25px;
    position: relative;
    top:200px;
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
    background-color: #ca6600 !important;
}
</style>
      <div class="icon-bar">
  <a href="#"><i class="fa fa-home"></i></a> 
  <a href="#"><i class="fa fa-search"></i></a> 
  <a href="#"><i class="fa fa-bell-o"></i></a> 
  <a href="#"><i class="fa fa-calendar-check-o"></i></a>
  <a href="#"><i class="fa fa-headphones"></i></a> 
  <a href="#"><i class="fa fa-life-ring"></i></a>

</div>  
<div id="mainWap">
    <?php //include ("../include/top_header.php");?>	
      <div id="center">
     <?php //include ("../include/menu_navi.php");?>
		  
			<div class="clr"></div>
			<div id="noidung">
     <div style="position:relative;bottom:350px;left:550px;color:black;max-width: 300px">
        <i class="fa fa-bell-o" style="font-size: 100px"> </i>
        <h1 style="position: relative;right: 20px">Thông báo</h1>
        <p style="position: relative;right:80px"><b>Thông tin từ văn phòng đoàn trường</b></p>    </div>
            
			 <div style="position: relative;left:80px;bottom: 500px">
			  <?php include ("../include/list_notice.php");?>	
		          </div>
              </div>
			<div style="position: relative;left:70px;bottom: 350px; background-color:rgba(21, 19, 20, 0.75);width: 90%;border-radius: 50px;color:white;padding-left: 10px">
			  <div id="content">
			   <?php include ("../notice_message/intro_articlelist.php");?>				
		         </div>
             </div>
         </div>
     </div>
<div class="clr"></div>	

