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
<?php echo form_open_multipart('course/add_course'); ?>
<table class="table table-bordered table-hover definewidth m10">
     <tr>
        <td width="10%" class="tableleft">Course ID</td>
        <td><input type="text" name="courseID"></td>
    </tr>
    <tr>
        <td class="tableleft">Old Code</td>
        <td ><input type="text" name="oldcode"></td>
    </tr>  
    <tr>
        <td class="tableleft">Course Name</td>
        <td ><input type="text" name="coursename"></td>
    </tr>
    <tr>
        <td class="tableleft">Credits</td>
        <td ><input type="text" name="credits"></td>
    </tr>
    <tr>
        <td class="tableleft">Comment</td>
        <td><input type="text" name="comment"></td>
    </tr>
    <tr>
        <td class="tableleft">Automatically upload</td>
        <td><input type="file" name="userfile" size="20" /></td>
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
				window.location.href="course_index.html";
		 });

    });
</script>