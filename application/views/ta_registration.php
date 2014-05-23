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
		function validate_email(field,alerttxt)
		{
		with (field)
		{
		apos=value.indexOf("@")
		dotpos=value.lastIndexOf(".")
		if (apos<1||dotpos-apos<2) 
		  {alert(alerttxt);return false}
		else {return true}
		}
		}
		
		function validate_form(thisform)
		{
		with (thisform)
		{
		if (validate_email(email,"Not a valid e-mail address!")==false)
		  {email.focus();return false}
		}
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
  $attr = array('class' => 'form-signin');
  echo form_open('ta/new_ta', $attr);
?>
        <!--<h2 class="form-signin-heading">TA Registration</h2> -->
      <table>        
       <tr>
         <td style="font-size:medium">Name:</td>
         <td><input type="text" name="name" class="input-block-level" placeholder="Name" style="width:auto"></td>
       </tr>
       
       <tr>
         <td style="font-size:medium">Password:</td>
         <td><input type="password" name="password" class="input-block-level" placeholder="Password" style="width:auto"></td>
       </tr>
       
       <tr>
         <td style="font-size:medium">Email:</td>
         <td><input type="text" name="email" class="input-block-level" placeholder="Email" style="width:auto"></td>
       </tr>
       
       <tr>
         <td style="font-size:medium">Student ID:</td>
         <td><input type="text" name="student_id" class="input-block-level" placeholder="ID" style="width:auto"></td>
       </tr>
       
       <tr>
         <td style="font-size:medium">Enroll Year:</td>
         <td><input type="text" name="year" class="input-block-level" placeholder="Year" style="width:auto"></td>
       </tr>
       
       <tr>
         <td style="font-size:medium">Enroll Term:</td>
         <td><select name="term" style="width:auto" >
                <option value="spring">spring</option>
                <option value="summer"/>summer</option>
                <option value="fall">fall</option>
                <option value="winter"/>winter</option>
            </select></td>
       </tr>
       
       <tr>
         <td style="font-size:medium">Program:</td>
         <td><input type="text" name="program" class="input-block-level" placeholder="program" style="width:auto"></td>
       </tr>
       
       <tr>
         <td style="font-size:medium">Advisor:</td>
         <td><input type="text" name="advisor" class="input-block-level" placeholder="advisor" style="width:auto"></td>
       </tr>

       <tr>
         <td style="font-size:medium">Comment:</td>
         <td><input type="text" name="comment" class="input-block-level" placeholder="comment" style="width:auto"></td>
       </tr>
      </table>
        <!--<input type="text" name="verify" class="input-medium" placeholder="验证码">-->
        
       
        <p align="center"><button class="btn btn-large btn-primary" type="submit">Create TA Account</button></p>
    </form>

</div>
</body>
</html>
