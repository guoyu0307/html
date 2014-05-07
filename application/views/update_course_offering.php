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

<?php echo form_open('course_offer/update_course_offering') ?>
<?php echo '<input type="hidden" name="id" value="'.$Course_ID.'" />'; ?>
    <table class="table table-bordered table-hover definewidth m10">
    <tr>
        <td width="10%" class="tableleft">Course ID</td>
        <?php
            echo '<td><input type="text" name="courseID"  value="'.$Course_Offical_ID.'" readonly></td>';
        ?>
    </tr>
    <tr>
        <td class="tableleft">Year</td>
        <?php
            echo '<td ><input type="text" name="year" value="'.$Year.'" readonly></td>';
        ?>
    </tr>  
    <tr>
        <td class="tableleft">Term</td>
        <?php
            echo '<td ><input type="text" name="term" value="'.$Term.'" readonly></td>';
        ?>
    </tr>
    <tr>
        <td class="tableleft">Lab Quota</td>
        <?php
            echo '<td ><input type="text" name="labquota"  value="'.$Lab_Quota_Avg.'"></td>';
        ?>
    </tr>
    <tr>
        <td class="tableleft">Lecture Quota</td>
        <?php
            echo '<td><input type="text" name="lecturequota" value="'.$Lecture_Quota_Avg.'"></td>';
        ?>
    </tr>
    <tr>
        <td class="tableleft">Lab Section</td>
         <?php
            echo '<td ><input type="text" name="labsections" value="'.$Lab_Sections.'"></td>';
        ?>
    </tr>
    <tr>
        <td class="tableleft">Lecture Section</td>
        <?php
            echo '<td ><input type="text" name="lecturesections" value="'.$Lecture_Sections.'"></td>';
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
				window.location.href="offering_index.html";
		 });

    });
</script>