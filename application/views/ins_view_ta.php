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


<div style="margin-bottom:-20px;margin-left: 22px;">
    <?php
    echo "<h4>Course Name: $Course_Name&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspCourse ID: $Course_OID</h1>";
    echo "<h4></h1>";
    ?>
</div>

<?php
$attributes = array('class' => 'form-inline definewidth m20');
echo form_open('ins/search_ta', $attributes);
?>
    <input type="text" name="rolename" id="rolename"class="abc input-default" placeholder="" value="">&nbsp;&nbsp; 
    <select name="year" style="width:auto" >
                <option value="0" selected="selected">Year</option>
                <option value="1">2013</option>
                <option value="2"/>2014</option>
    </select>&nbsp;&nbsp;  
    <select name="term" style="width:auto" >
                <option value="0" selected="selected">Term</option>
                <option value="1">fall</option>
                <option value="2"/>winter</option>
                <option value="3">sping</option>
                <option value="4"/>summer</option>
    </select> 
    <select name="skills" style="width:auto" >
                <option value="0" selected="selected">Skills</option>
                <option value="C_Language">C/C++</option>
                <option value="Java"/>Java</option>
                <option value="Python">Python</option>
                <option value="Algorithm"/>Algorithm</option>
                <option value="toc">Computer Theory</option>
                <option value="Data_base"/>Database</option>
                <option value="Networks">Network</option>
                <option value="Software_Engineering"/>Software Engineering</option>
                <option value="Operating_System">Operating System</option>
                <option value="Graphics"/>Graphics</option>
                <option value="Computer_Music">Computer Music</option>
                <option value="AI"/>AI</option>
    </select>
    <select name="degree" style="width:auto" >
                <option value="4" selected="selected">Degree</option>
                <option value="0">No Experience</option>
                <option value="1"/>Begineer</option>
                <option value="2">Falimiar</option>
                <option value="3"/>Master</option>
    </select>
    <button type="submit" class="btn btn-primary">search</button>&nbsp;&nbsp; 
</form>

<?php 
    echo '<input value="'.$Course_ID.'" id="course_id" name="course_id" hidden></input>';
    $tmpl = array (
                    'table_open' => '<table border="1" cellpadding="2" cellspacing="0" class="table table-bordered table-hover definewidth m10">',
                );

    $this->table->set_template($tmpl);
    echo $this->table->generate($results); 
?>

<?php
echo form_open('ins/add_prefer');
?>
<table border="1" cellpadding="2" cellspacing="0" class="table table-bordered table-hover definewidth m10">
    <th>1st Choice</th>
    <th>1st Choice</th>
    <th>1st Choice</th>
    <th>1st Choice</th>
    <th>1st Choice</th>
    <th>1st Choice</th>
    <tr>
        <td id="choice1"></td>
        <td id="choice2"></td>
        <td id="choice3"></td>
        <td id="choice4"></td>
        <td id="choice5"></td>
        <td id="choice6"></td>
    </tr>
</table>
</form>
<div style="margin-top: 30px;margin-left: 900px;">

    <button type="submit" class="btn btn-primary" type="button" style="">Save</button>
</div>



</form>
</body>
</html>
<script>
var store = new array();
//var window.count = 12;
//var count = 0;
var count = 0;
function getInnerHTML(id, name)
{
    if(document.getElementById("choice1").innerHTML == "")
    {
        document.getElementById("choice1").innerHTML = name;
        document.getElementById(id).disabled = true;
    }
    else if(document.getElementById("choice2").innerHTML == "")
    {
        document.getElementById("choice2").innerHTML = name;
        document.getElementById(id).disabled = true;
    }
    else if(document.getElementById("choice3").innerHTML == "")
    {
        document.getElementById("choice3").innerHTML = name;
        document.getElementById(id).disabled = true;
    }
    else if(document.getElementById("choice4").innerHTML == "")
    {
        document.getElementById("choice4").innerHTML = name;
        document.getElementById(id).disabled = true;
    }
    else if(document.getElementById("choice5").innerHTML == "")
    {
        document.getElementById("choice5").innerHTML = name;
        document.getElementById(id).disabled = true;
    }
    else if(document.getElementById("choice6").innerHTML == "")
    {
        document.getElementById("choice6").innerHTML = name;
        document.getElementById(id).disabled = true;
    }
   
}

function clearall()
{
    document.getElementById("choice1").innerHTML = "";
    document.getElementById("choice2").innerHTML = "";
    document.getElementById("choice3").innerHTML = "";
    document.getElementById("choice4").innerHTML = "";
    document.getElementById("choice5").innerHTML = "";
    document.getElementById("choice6").innerHTML = "";

    document.getElementById(id).disabled = true;
}

    $(function () {
        
		$('#addnew').click(function(){

				window.location.href="TA_add.html";
		 });


    });

	function del(id)
	{
		
		
		if(confirm("确定要删除吗？"))
		{
		
			var url = "index.html";
			
			window.location.href=url;		
		
		}
	
	
	
	
	}
</script>