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
    echo form_open('ta/add_background');
?>
<input type="hidden" name="id" value="" />
<table class="table table-bordered table-hover ">
    <tr>
        <td class="tableleft">UST UG</td>
        <td ><input type="radio" name="ug" value="1" checked/> Yes &nbsp;&nbsp;
           <input type="radio" name="ug" value="0" /> No</td>
    </tr>
    <tr>
        <td class="tableleft">Course Background</td>
        <td valign="baseline"> <table width="100%" border="0">
          <tr>
            <td>&nbsp;C &nbsp;
                <input type="text" name="c_lang" id="c_lang" readonly>
            </td>
            <td>Java&nbsp;
                <input type="text" name="java" id="java" readonly>
            <td>
          </tr>
          <tr>
            <td>Python &nbsp&nbsp;
                <input type="text" name="python" id="python" readonly>
            </td>
            <td> Algorithms &nbsp;
                <input type="text" name="algorithm" id="algorithm" readonly>
            </td>
          </tr>
          <tr>
            <td>Theory of Computing &nbsp;
                <input type="text" name="toc" id="toc" readonly>
            </td>
            <td>Database&nbsp;
                <input type="text" name="db" id="db" readonly>
            </td>
          </tr>
          <tr>
            <td>Network&nbsp;
                <input type="text" name="network" id="network" readonly>
            </td>
            <td>Software Engineering&nbsp;
                <input type="text" name="se" id="se" readonly>
            </td>
          </tr>
          <tr>
            <td>OS&nbsp;
                <input type="text" name="os" id="os" readonly>
            </td>
            <td> Graphics&nbsp;
                <input type="text" name="graphics" id="graphics" readonly>
            </td>
          </tr>
          <tr>
            <td>Computer Music&nbsp;
                <input type="text" name="music" id="music" readonly>
            </td>
            <td> AI&nbsp;
                <input type="text" name="ai" id="ai" readonly>
            </td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table>
      </td>
    </tr>
    
    <tr>
        <td class="tableleft"></td>
        <td>
            <button type="submit" class="btn btn-primary" type="button">Save</button> 
        </td>
    </tr>
</table>
</form>
</body>
</html>
<script>
<?php
    $map = array(0 => 'No Experience',
                 1 => 'Beginner',
                 2 => 'Familiar',
                 3 => 'Master');

    if($Edited == 1)
    {
            echo 'document.getElementById("c_lang").value = "'.$map[$C_Language].'";';
            echo 'document.getElementById("java").value = "'.$map[$Java].'";';
            echo 'document.getElementById("python").value = "'.$map[$Python].'";';
            echo 'document.getElementById("algorithm").value = "'.$map[$Algorithm].'";';
            echo 'document.getElementById("toc").value = "'.$map[$Computer_Theory].'";';
            echo 'document.getElementById("db").value = "'.$map[$Data_base].'";';
            echo 'document.getElementById("network").value = "'.$map[$Networks].'";';
            echo 'document.getElementById("se").value = "'.$map[$Software_Engineering].'";';
            echo 'document.getElementById("os").value = "'.$map[$Operating_System].'";';
            echo 'document.getElementById("graphics").value = "'.$map[$Graphics].'";';
            echo 'document.getElementById("music").value = "'.$map[$Computer_Music].'";';
            echo 'document.getElementById("ai").value = "'.$map[$AI].'";';
    }
    else
    {
        echo 'document.getElementById("c_lang").value = "Unedited";';
        echo 'document.getElementById("java").value = "Unedited";';
        echo 'document.getElementById("python").value = "Unedited";';
        echo 'document.getElementById("algorithm").value = "Unedited";';
        echo 'document.getElementById("toc").value = "Unedited";';
        echo 'document.getElementById("db").value = "Unedited";';
        echo 'document.getElementById("network").value = "Unedited";';
        echo 'document.getElementById("se").value = "Unedited";';
        echo 'document.getElementById("os").value = "Unedited";';
        echo 'document.getElementById("graphics").value = "Unedited";';
        echo 'document.getElementById("music").value = "Unedited";';
        echo 'document.getElementById("ai").value = "Unedited";';   
    }


?>
    $(function () {       
		$('#backid').click(function(){
				window.location.href="index.html";
		 });

    });
</script>
