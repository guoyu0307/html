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

<form class="form-inline definewidth m20" action="index.html" method="get">  
    
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
    <button type="submit" class="btn btn-primary">search</button>&nbsp;&nbsp; <button type="button" class="btn btn-success" id="addnew">add</button>
</form>

<?php 
    $tmpl = array (
                    'table_open' => '<table border="1" cellpadding="2" cellspacing="0" class="table table-bordered table-hover definewidth m10">',
                );

    $this->table->set_template($tmpl);
    echo $this->table->generate($results); 
?>

<?php 
echo '<div class="inline pull-right page">';
echo $this->pagination->create_links(); 
echo '</div>';
?>

</body>
</html>
<script>
    $(function () {
        
		$('#addnew').click(function(){

				window.location.href="http://localhost/html/index.php/assignment/direct_add_assignment";
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