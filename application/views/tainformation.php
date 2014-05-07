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
<form action="../Node/index.html" method="post" class="definewidth m20">
<input type="hidden" name="id" value="" />
<table class="table table-bordered table-hover ">
    <tr>
        <td width="10%" class="tableleft">Name</td>
        <td>Wang Ting</td>
    </tr>
    <tr>
        <td class="tableleft">Title</td>
        <td>Mr.</td>
    </tr>  
    <tr>
        <td class="tableleft">Email</td>
        <td >twangah@ust.hk</td>
    </tr>
    <tr>
        <td class="tableleft">UST UG</td>
        <td >Yes</td>
    </tr>
    <tr>
        <td class="tableleft">Program</td>
        <td>PhD</td>
    </tr>
    <tr>
        <td class="tableleft">Enrollment</td>
        <td>Fall 2012D</td>
    </tr>
    <tr>
        <td class="tableleft">Advisor</td>
        <td>hamdi</td>
    </tr>
    <tr>
        <td class="tableleft">Course Background</td>
        <td> Java &nbsp;&nbsp; Python &nbsp;&nbsp; Database</td>
    </tr>
    <tr>
        <td class="tableleft">TA history</td>
        <td>1001 (2013S); 1001 (13F);</td>
    </tr>
    <tr>
        <td class="tableleft">Comment</td>
        <td>returning from leave</td>
    </tr>
    <tr>
        <td class="tableleft"></td>
        <td>
            <button type="button" class="btn btn-success" name="backid" id="backid">Back to list</button>
        </td>
    </tr>
</table>
</form>
</body>
		</html>

<script>
    $(function () {       
		$('#backid').click(function(){
				window.location.href="Instrpreference.html";
		 });

    });
</script>