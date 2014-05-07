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
<body>

<?php
echo form_open('course/update_course'); 
?>
<input type="hidden" name="id" value="{$user.id}" />
<?php
    echo '<input type="hidden" name="id" value="'.$Course_ID.'" />';

?>
    <table class="table table-bordered table-hover definewidth m10">
     <tr>
        <td width="10%" class="tableleft">Course ID</td>
        <?php
            echo  '<td><input type="text" name="courseID"  value="'.$Course_Offical_ID.'"></td>';
        ?>
    </tr>
    <tr>
        <td class="tableleft">Used Code</td>
        <?php
            echo '<td ><input type="text" name="oldcode"  value="'.$Course_Used_ID.'"></td>';
        ?>
    </tr>  
    <tr>
        <td class="tableleft">Course Name</td>
        <?php
            echo '<td ><input type="text" name="coursename" value= "'.$Course_Name.'"></td>';
        ?>
    </tr>
    <tr>
        <td class="tableleft">Credits</td>
        <?php
            echo '<td ><input type="text" name="credits"  value="'.$Credits.'"></td>';
        ?>
    </tr>
    <tr>
        <td class="tableleft">Comment</td>
        <?php
            echo '<td><input type="text" name="comment" value="'.$Comment.'"></td>';
        ?>
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
