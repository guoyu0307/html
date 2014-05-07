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
<?php echo form_open('assignment/add_assignment'); ?>
<table class="table table-bordered table-hover definewidth m10">
     <tr>
        <td width="10%" class="tableleft">Course ID</td>
        <td><input type="text" name="courseID"></td>
    </tr>
    <tr>
        <td class="tableleft">Year</td>
        <td ><input type="text" name="year"></td>
    </tr>  
    <tr>
        <td class="tableleft">Term</td>
        <td ><select name="term" style="width:auto" >
                <option value="spring">spring</option>
                <option value="summer"/>summer</option>
                <option value="fall">fall</option>
                <option value="winter"/>winter</option>
            </select></td>
    </tr>
    <tr>
        <td class="tableleft">TA Email</td>
        <td ><input type="text" name="taemail"></td>
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