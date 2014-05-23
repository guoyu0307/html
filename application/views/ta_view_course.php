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

        input
        {
            width: 80px;
        }
    </style>
</head>
<body>

<?php 
    $tmpl = array (
                    'table_open' => '<table border="1" cellpadding="2" cellspacing="0" class="table table-bordered table-hover definewidth m10">',
                );

    $this->table->set_template($tmpl);
    echo $this->table->generate($results); 
?>
<?php
    echo form_open('ta/ta_prefer');
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
<button type="submit" class="btn btn-primary" type="button" style="margin-left: 1000px;margin-top: 30px;">Save</button>
</form>
</body>
</html>
<script>
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
    $(function () {
        $(':checkbox[name="group[]"]').click(function () {
            $(':checkbox', $(this).closest('li')).prop('checked', this.checked);
        });

		$('#backid').click(function(){
				window.location.href="index.html";
		 });
    });
</script>