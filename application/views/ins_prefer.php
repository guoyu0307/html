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
<form action="index.html" method="post" class="definewidth m20" >
<input type="hidden" name="id" value="{$role.id}" />
<button type="submit" class="btn btn-primary" type="button">Save</button>
<table class="table table-bordered table-hover definewidth m10" >
    <thead>
    <tr>
        <th>Preference</th>
        <th>Year</th>
        <th>Term</th>
        <th>TA Name</th>
        <th>Program</th>
        <th>Advisor</th>
        <th>Operation</th>
    </tr>
    </thead>
	     <tr>
            <td><select name="preference" style="width:auto" >
                <option value="0">1</option>
                <option value="1"/>2</option>
                <option value="2">3</option>
                <option value="3"/>4</option>
                <option value="4">5</option>
                <option value="5"/>6</option>
            </select></td>
            <td>2014</td>
            <td>Fall</td>
            <td>Wang Ting</td>
            <td>PHD</td>
            <td>helens</td>
            <td>
                  <a href="MoreTAInform.html">More Information</a>
            </td>
        </tr>
      </table>
        <div class="inline pull-right page">
        <a href='#'>Next Page</a>     <span class='current'>1</span><a href='#'>2</a><a href='/chinapost/index.php?m=Label&a=index&p=3'>3</a><a href='#'>4</a><a href='#'>5</a>  <a href='#' >Last Page</a>    </div>
</form>
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