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
    $attributes = array('class' => 'definewidth m20');
    echo form_open('ta/add_prefer', $attributes);
?>
<table class="table table-bordered table-hover definewidth m10">
    <thead>
    <tr>
        <th>1st Choice</th>
        <th>2nd Choice</th>
        <th>3rd Choice</th>
        <th>4th Choice</th>
        <th>5th Choice</th>
        <th>6th Choice</th>
    </tr>
    </thead>
    <tr>
        <td>
            <input type="text" name="choice1" id="choice1" >
        </td>
        <td>
            <input type="text" name="choice2" id="choice2" >
        </td>
        <td>
            <input type="text" name="choice3" id="choice3">
        </td>
        <td>
            <input type="text" name="choice4" id="choice4">
        </td>
        <td>
            <input type="text" name="choice5" id="choice5">
        </td>
        <td>
            <input type="text" name="choice6" id="choice6">
        </td>
        
    </tr>
</table>
<button type="submit" class="btn btn-primary" type="button" style="margin-left: 1000px; margin-top:20px;">Save</button>
</form>

<h4 style="margin-left: 30px;">The assignment result</h4>
<?php 
    $tmpl = array (
                    'table_open' => '<table border="1" cellpadding="2" cellspacing="0" class="table table-bordered table-hover definewidth m10">',
                );

    $this->table->set_template($tmpl);
    echo $this->table->generate($results); 
?>

</body>
</html>
<script>
    $(function () {
        $(':checkbox[name="group[]"]').click(function () {
            $(':checkbox', $(this).closest('li')).prop('checked', this.checked);
        });

		$('#backid').click(function(){
				window.location.href="index.html";
		 });
    });
</script>