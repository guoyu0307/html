<!DOCTYPE html>
<html>
<head>
    <title>TA Management System</title>
  <meta charset="UTF-8">
   <link rel="stylesheet" type="text/css" href="/html/application/Css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="/html/application/Css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="/html/application/Css/style.css" />
    <script type="text/javascript" src="/html/application/Js/jquery.js"></script>
    <script type="text/javascript" src="/html/application/Js/jquery.sorted.js"></script>
    <script type="text/javascript" src="/html/application/Js/bootstrap.js"></script>
    <script type="text/javascript" src="/html/application/Js/ckform.js"></script>
    <script type="text/javascript" src="/html/application/Js/common.js"></script>
    
    <script type="text/javascript">
      function check()
    {
    username=login.username.value;
    password=login.password.value;
    if(username==""||password=="")   
    {
      alert("Username and Password can't be null!");
      return false; 
    }
      return true;
     }
    </script>
    <style type="text/css">
        body {
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }

        .form-signin {
            max-width: 300px;
            padding: 19px 29px 29px;
            margin: 0 auto 20px;
            background-color: #fff;
            border: 1px solid #e5e5e5;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, .05);
            -moz-box-shadow: 0 1px 2px rgba(0, 0, 0, .05);
            box-shadow: 0 1px 2px rgba(0, 0, 0, .05);
        }

        .form-signin .form-signin-heading,
        .form-signin .checkbox {
            margin-bottom: 10px;
        }

        .form-signin input[type="text"],
        .form-signin input[type="password"] {
            font-size: 16px;
            height: auto;
            margin-bottom: 15px;
            padding: 7px 9px;
        }

    </style>  
</head>
<body>
<div class="container">
<h2 align="center"><font color="#000000"></font>HKUST Teaching Assistant Management System</h2><br>

<?php
  $attributes = array('class' => 'form-signin');
  echo form_open('login', $attributes);
?>
        <!--<h3 class="form-signin-heading">Login to Continue</h2> -->
        <table>
          <tr>
             <td style="font-size:medium">Username:</td>
             <td><input type="text" name="username" class="input-block-level" placeholder="Username"></td>
          </tr>
          <tr>
             <td style="font-size:medium">Password:</td>
             <td><input type="password" name="password" class="input-block-level" placeholder="Password"></td>
          </tr>
        <!--<input type="text" name="verify" class="input-medium" placeholder="验证码">-->
        
          <tr>
              <td style="font-size:medium">Access:</td>
             <td><select size="+1" name="access" >
                 <option selected value="student">Student</option>
                 <option value="staff">Instructor</option>
                 <option value="administrator">Administrator</option>
                 </select></td>
          </tr>
       </table>
        <p align="center"><button class="btn btn-large btn-primary" type="submit" onClick="return check()">Login</button></p>
        <a href="http://localhost/html/index.php/ta/ta_registration" style="margin-left: 0px">TA Sign Up</a></br>
        <a href="http://localhost/html/index.php/ins/ins_registration" style="margin-left: 0px">Instructor Sign Up</a>
        
    </form>

</div>
</body>
</html>