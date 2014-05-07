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
$attribute = array('class' => 'definewidth m20');
echo form_open('ins/insert_evaluation', $attribute);
?>

<table class="table table-bordered table-hover definewidth m10">
     <tr>
        <?php echo '<input type="hidden" name="Instructor_ID" value='.$Instructor_ID.'></input>';?>
        <?php echo '<input type="hidden" name="TA_ID" value='.$TA_ID.'></input>';?>
        <?php echo '<input type="hidden" name="Course_ID" value='.$Course_ID.'></input>';?>
        <?php echo '<input type="hidden" name="Year" value='.$Year.'></input>';?>
        <?php echo '<input type="hidden" name="Term" value='.$Term.'></input>';?>
        
        <td width="10%" class="tableleft">Perference Rating</td>
        <td><select name="rating" style="width:auto">
            <option value="excellent">excellent</option>
            <option value="good"/>good</option>
            <option value="satisfying"/>satisfying</option>
            <option value="poor"/>poor</option>
            </select></td>
    </tr>
    <tr>
        <td class="tableleft">Comment</td>
        <td ><textarea name="comment" style="width:100%" rows="3"></textarea></td>
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
				window.location.href="evaluation.html";
		 });

    });
</script>
