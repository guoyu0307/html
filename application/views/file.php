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
<?php echo form_open_multipart('data_file/get_file'); ?>
     <tr>
        <input type="hidden" name="type" value="ta" />
        <td width="30%" class="tableleft">Upload ta Information</td>
        <td><input name="userfile" type="file" size="20"></td>
        <td><button type="submit" class="btn btn-primary" type="button" style="margin-right: 400px;">Submit</button></td>
    </tr>
</form>
<?php echo form_open_multipart('data_file/get_file'); ?>
     <tr>
        <input type="hidden" name="type" value="instructor" />
        <td width="30%" class="tableleft">Upload instructor Information</td>
        <td><input name="userfile" type="file" size="20"></td>
        <td><button type="submit" class="btn btn-primary" type="button" style="margin-right: 400px;">Submit</button></td>
    </tr>
</form>
<?php echo form_open_multipart('data_file/get_file'); ?>
     <tr>
        <input type="hidden" name="type" value="course" />
        <td width="30%" class="tableleft">Upload Course Information</td>
        <td><input name="userfile" type="file" size="20"></td>
        <td><button type="submit" class="btn btn-primary" type="button" style="margin-right: 400px;">Submit</button></td>
    </tr>
</form>
<?php echo form_open_multipart('data_file/get_file'); ?>
     <tr>
        <input type="hidden" name="type" value="course_offering" />
        <td width="20%" class="tableleft">Upload Offering Course</td>
        <td><input name="userfile" type="file" size="20"></td>
        <td><button type="submit" class="btn btn-primary" type="button" style="margin-right: 400px;">Submit</button></td>
    </tr>
</form> 
    <tr>
        <td class="tableleft">Export the Course Information</td>
        <td ><a href="http://localhost/html/index.php/data_file/export_data">Export</a></td>
    </tr>
    <tr>
        <td class="tableleft">Export the TA Information</td>
        <td ><a href="">Export</a></td>
    </tr>
    <tr>
        <td class="tableleft">Export the Instructor Information</td>
        <td ><a href="">Export</a></td>
    </tr>
    <tr>
        <?php
            echo form_open('');
        ?>
        <td class="tableleft">Export the Offering Course Information</td>
        <td>From: <select name="from_year" style="width:auto" >
                    <option value="0" selected="selected">Year</option>
                    <option value="1990">1990</option>
                    <option value="1991"/>1991</option>
                  </select>&nbsp;&nbsp;  
                  <select name="from_term" style="width:auto" >
                    <option value="0" selected="selected">Term</option>
                    <option value="spring">spring</option>
                    <option value="summer"/>summer</option>
                    <option value="fall">fall</option>
                    <option value="winter"/>winter</option>
                  </select>  </br>
            To: <select name="from_year" style="width:auto" >
                    <option value="0" selected="selected">Year</option>
                    <option value="1990">1990</option>
                    <option value="1991"/>1991</option>
                </select>&nbsp;&nbsp;  
                <select name="from_term" style="width:auto" >
                    <option value="0" selected="selected">Term</option>
                    <option value="spring">spring</option>
                    <option value="summer"/>summer</option>
                    <option value="fall">fall</option>
                    <option value="winter"/>winter</option>
                </select>  
        </td>
        <td><button type="submit" class="btn btn-primary" type="button" style="margin-right: 400px;">Export</button></td>
    </tr>
    
    <tr>
        <?php
            echo form_open('');
        ?>
        <td class="tableleft">Export the Assignment Information</td>
        <td>From: <select name="from_year" style="width:auto" >
                    <option value="0" selected="selected">Year</option>
                    <option value="1990">1990</option>
                    <option value="1991"/>1991</option>
                  </select>&nbsp;&nbsp;  
                  <select name="from_term" style="width:auto" >
                    <option value="0" selected="selected">Term</option>
                    <option value="spring">spring</option>
                    <option value="summer"/>summer</option>
                    <option value="fall">fall</option>
                    <option value="winter"/>winter</option>
                  </select>  </br>
            To: <select name="from_year" style="width:auto" >
                    <option value="0" selected="selected">Year</option>
                    <option value="1990">1990</option>
                    <option value="1991"/>1991</option>
                </select>&nbsp;&nbsp;  
                <select name="from_term" style="width:auto" >
                    <option value="0" selected="selected">Term</option>
                    <option value="spring">spring</option>
                    <option value="summer"/>summer</option>
                    <option value="fall">fall</option>
                    <option value="winter"/>winter</option>
                </select>  
        </td>
        <td><button type="submit" class="btn btn-primary" type="button" style="margin-right: 400px;">Export</button></td>
    </form>
    </tr>  

</table>

</body>
</html>
<script>
    $(function () {       
        $('#backid').click(function(){
                window.location.href="course_index.html";
         });

    });
</script>