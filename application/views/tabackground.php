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
              <select name="c_lang" id="c_lang" style="width:auto" >
                <option value="0">No Experience</option>
                <option value="1"/>              
                Beginner
                </option>
                <option value="2"/>              
                Familiar
                </option>
                <option value="3"/>              
                Master
                </option>
            </select></td>
            <td>Java&nbsp;
              <select name="java" id="java" style="width:auto" >
                <option value="0">No Experience</option>
                <option value="1"/>              
                Beginner
                </option>
                <option value="2"/>              
                Familiar
                </option>
                <option value="3"/>              
                Master
                </option>
            </select></td>
          </tr>
          <tr>
            <td>Python &nbsp&nbsp;
              <select name="python" id="python" style="width:auto" >
                <option value="0">No Experience</option>
                <option value="1"/>              
                Beginner
                </option>
                <option value="2"/>              
                Familiar
                </option>
                <option value="3"/>              
                Master
                </option>
            </select></td>
            <td> Algorithms &nbsp;
              <select name="algorithm" id="algorithm" style="width:auto" >
                <option value="0">No Experience</option>
                <option value="1"/>              
                Beginner
                </option>
                <option value="2"/>              
                Familiar
                </option>
                <option value="3"/>              
                Master
                </option>
            </select></td>
          </tr>
          <tr>
            <td>Theory of Computing &nbsp;
              <select name="toc" id="toc" style="width:auto" >
                <option value="0">No Experience</option>
                <option value="1"/>              
                Beginner
                </option>
                <option value="2"/>              
                Familiar
                </option>
                <option value="3"/>              
                Master
                </option>
            </select></td>
            <td>Database&nbsp;
              <select name="database" id="database" style="width:auto" >
                <option value="0">No Experience</option>
                <option value="1"/>              
                Beginner
                </option>
                <option value="2"/>              
                Familiar
                </option>
                <option value="3"/>              
                Master
                </option>
            </select></td>
          </tr>
          <tr>
            <td>Network&nbsp;
              <select name="network" id="network" style="width:auto" >
                <option value="0">No Experience</option>
                <option value="1"/>              
                Beginner
                </option>
                <option value="2"/>              
                Familiar
                </option>
                <option value="3"/>              
                Master
                </option>
            </select></td>
            <td>Software Engineering&nbsp;
              <select name="se" id="se" style="width:auto" >
                <option value="0">No Experience</option>
                <option value="1"/>              
                Beginner
                </option>
                <option value="2"/>              
                Familiar
                </option>
                <option value="3"/>              
                Master
                </option>
            </select></td>
          </tr>
          <tr>
            <td>OS&nbsp;
              <select name="os" id="os" style="width:auto" >
                <option value="0">No Experience</option>
                <option value="1"/>              
                Beginner
                </option>
                <option value="2"/>              
                Familiar
                </option>
                <option value="3"/>              
                Master
                </option>
            </select></td>
            <td> Graphics&nbsp;
              <select name="graphics" id="graphics" style="width:auto" >
                <option value="0">No Experience</option>
                <option value="1"/>              
                Beginner
                </option>
                <option value="2"/>              
                Familiar
                </option>
                <option value="3"/>              
                Master
                </option>
            </select></td>
          </tr>
          <tr>
            <td>Computer Music&nbsp;
              <select name="music" id="music" style="width:auto" >
                <option value="0">No Experience</option>
                <option value="1"/>              
                Beginner
                </option>
                <option value="2"/>              
                Familiar
                </option>
                <option value="3"/>              
                Master
                </option>
            </select></td>
            <td> AI&nbsp;
              <select name="ai" id="ai" style="width:auto" >
                <option value="0">No Experience</option>
                <option value="1"/>              
                Beginner
                </option>
                <option value="2"/>              
                Familiar
                </option>
                <option value="3"/>              
                Master
                </option>
            </select></td>
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
if($New == 0)
{
    echo 'document.getElementById("c_lang").options['.$C_Language.'].selected=true;';
    echo 'document.getElementById("java").options['.$Java.'].selected=true;';
    echo 'document.getElementById("python").options['.$Python.'].selected=true;';
    echo 'document.getElementById("algorithm").options['.$Algorithm.'].selected=true;';
    echo 'document.getElementById("toc").options['.$Computer_Theory.'].selected=true;';
    echo 'document.getElementById("database").options['.$Data_base.'].selected=true;';
    echo 'document.getElementById("network").options['.$Networks.'].selected=true;';
    echo 'document.getElementById("se").options['.$Software_Engineering.'].selected=true;';
    echo 'document.getElementById("os").options['.$Operating_System.'].selected=true;';
    echo 'document.getElementById("graphics").options['.$Graphics.'].selected=true;';
    echo 'document.getElementById("music").options['.$Computer_Music.'].selected=true;';
    echo 'document.getElementById("ai").options['.$AI.'].selected=true;';
}
?>
    $(function () {       
		$('#backid').click(function(){
				window.location.href="index.html";
		 });

    });
</script>
