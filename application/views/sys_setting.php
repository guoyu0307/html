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

<table class="table table-bordered table-hover definewidth m10">
<?php echo form_open_multipart('data_file/assignment_match'); ?>
     <tr>
        <input type="hidden" name="type" value="course" />
        <td width="30%" class="tableleft">Generate the assignment result</td>
        <td><button type="submit" class="btn btn-primary" type="button" style="margin-right: 200px;">Confirm</button></td>
    </tr>
</form>
<?php
echo form_open_multipart('system_setting/alter_release'); 
?>
     <tr>
        <input type="hidden" name="type" value="course_offering" />
        <td width="20%" class="tableleft">Release the assignment result</td>
        <td>
            <select name="release" id="release" style="width:auto" >
                <option value="yes">yes</option>
                <option value="no"/>no</option>
            </select>
        </td>
        <td><button type="submit" class="btn btn-primary" type="button" style="margin-right: 400px;">Save</button></td>
    </tr>
</form>
<?php echo form_open_multipart('data_file/get_file'); ?>
     <tr>
        <input type="hidden" name="type" value="course_offering" />
        <td width="20%" class="tableleft">Current time</td>
        <td>
            <select name="mode" id="mode" style="width:auto" onchange="test()">
                <option value="manual">Manual</option>
                <option value="auto"/>auto</option>
            </select>
            <select name="term" id="term" style="width:auto" >
                <option value="spring">Spring</option>
                <option value="summer"/>Summer</option>
                <option value="fall"/>Fall</option>
                <option value="winter"/>Winter</option>
            </select>
            <select name="year" id="year" style="width:auto" >
                <option value="2013">2013</option>
                <option value="2014">2014</option>
                <option value="2015">2015</option>
                <option value="2016">2016</option>
                <option value="2017">2017</option>
                <option value="2018">2018</option>
            </select>
        </td>
        <td><button type="submit" class="btn btn-primary" type="button" style="margin-right: 400px;">Save</button></td>
    </tr>
</form> 

</table>
</body>
</html>
<script>
function test()
{
    var select = document.getElementById("mode");
    var index = select.selectedIndex; 
    var s_value = select.options[index].text;
    
    if(s_value == "Manual")
    {
        document.getElementById("year").disabled = false;
        document.getElementById("term").disabled = false;
    }
    else
    {
        document.getElementById("year").disabled = true;
        document.getElementById("term").disabled = true;
    }
}
</script>