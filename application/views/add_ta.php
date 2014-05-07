<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/html/application/Css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="/html/application/Css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="/html/application/Css/style.css" />
    <script type="text/javascript" src="/html/application/Js/jquery.js"></script>
    <script type="text/javascript" src="/html/application/Js/jquery.sorted.js"></script>
    <script type="text/javascript" src="/html/application/Js/bootstrap.js"></script>
    <script type="text/javascript" src="/html/application/Js/ckform.js"></script>
    <script type="text/javascript" src="/html/application/Js/common.js"></script>
    <style type="text/css">
        body {
            padding-bottom: 40px;
        }
        .sidebar-nav {
            padding: 9px 0;
        }

        @media (max-width: 980px) {
            /* Enable use of floated navbar text */
            .navbar-text.pull-right {
                float: none;
                padding-left: 5px;
                padding-right: 5px;
            }
        }


    </style>
</head>
<form action="index.html" method="post">
<table class="table table-bordered table-hover definewidth m10">
     <tr>
        <td width="10%" class="tableleft">Name</td>
        <td><input type="text" name="name" ></td>
    </tr>
    <tr>
        <td class="tableleft">Student ID</td>
        <td ><input type="text" name="id"></td>
    </tr> 
    <tr>
        <td class="tableleft">Email</td>
        <td ><input type="text" name="email"></td>
    </tr>
    <tr>
        <td class="tableleft">Program</td>
        <td><input type="text" name="program"></td>
    </tr>
    <tr>
        <td class="tableleft">Enrollment</td>
        <td><input type="text" name="enrollment"></td>
    </tr>
    <tr>
        <td class="tableleft">Advisor</td>
        <td><input type="text" name="advisor"></td>
    </tr>
    <tr>
        <td class="tableleft">TA history</td>
        <td><input type="text" name="history"></td>
    </tr>
    <tr>
        <td class="tableleft">Comment</td>
        <td><input type="text" name="advisor"></td>
    </tr>
    <tr>
        <td class="tableleft">Automatically upload</td>
        <td><input name="" type="button" value="select file from computer"></td>
    </tr>
    <tr>
        <td class="tableleft"></td>
        <td>
            <button type="submit" class="btn btn-primary" type="button">Save</button> &nbsp;&nbsp;<button type="button" class="btn btn-success" name="backid" id="backid">Back to list</button>
        </td>
    </tr>
</table>
</form>
</body>
</html>
<script>
    $(function () {       
		$('#backid').click(function(){
				window.location.href="TA_index.html";
		 });

    });
</script>