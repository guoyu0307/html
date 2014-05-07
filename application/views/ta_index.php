
<!DOCTYPE HTML>
<html>
 <head>
  <title>TA Managemet System</title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <link href="/html/application/assets/css/dpl-min.css" rel="stylesheet" type="text/css" />
  <link href="/html/application/assets/css/bui-min.css" rel="stylesheet" type="text/css" />
   <link href="/html/application/assets/css/main-min.css" rel="stylesheet" type="text/css" />
 </head>
 <body>

 <div class="header">
    

<h1 align="center"><font color="#C1D5EC" size="4">HKUST Teaching Assistant Management System</font></h1>
  </div>  
   <div class="content">
   
    <div class="dl-main-nav">
      <div class="dl-log">Welcome，<span class="dl-log-user">root</span><a href="/chinapost/index.php?m=Public&a=logout" title="退出系统" class="dl-log-quit">[Logout]</a>
        </div>
      <div class="dl-inform"><div class="dl-inform-title"><s class="dl-inform-icon dl-up"></s></div></div>
      
      <ul id="J_Nav"  class="nav-list ks-clear">
          <li class="nav-item dl-selected"><div class="nav-item-inner ">TA</div></li>       
      </ul>
    </div> 
    
    <ul id="J_NavContent" class="dl-tab-conten">
    </ul>
    
   </div>
  <script type="text/javascript" src="/html/application/assets/js/jquery-1.8.1.min.js"></script>
  <script type="text/javascript" src="/html/application/assets/js/bui-min.js"></script>
  <script type="text/javascript" src="/html/application/assets/js/common/main-min.js"></script>
  <script type="text/javascript" src="/html/application/assets/js/config-min.js"></script>
  <script>
    BUI.use('common/main',function(){
      var config = [
	  
	  {id:'7',homePage : '9',menu:[{text:'TA',
	  items:[{id:'9',text:'View Offering Course',href:'http://localhost/html/index.php/ta/ta_view_course'},
	  {id:'10',text:'TA Background',href:'http://localhost/html/index.php/ta/to_tabackground'}]}]}
	  ];
      new PageUtil.MainPage({
        modulesConfig : config
      });
    });
  </script>
 </body>
</html>