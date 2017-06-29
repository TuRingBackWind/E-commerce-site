<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title> </title>
	<style type="text/css">
    td{
	border:1px solid black;
	border-collapse:collapse;}
    .center{
    	margin-left:20%;
    	
    }
    </style>
</head>
<body>
    <div class="center">
        <h3>系统信息</h3>
    <table style="width:70%;background:#ccc;border:1px solid #000;border-collapse:collapse;">
        <tr>
            <th>操作系统</th>
            <td><?php echo PHP_OS;?></td>
        </tr>
         <tr>
            <th>Apache版本</th>
            <td><?php echo "5.5.7";?></td>
        </tr>
         <tr>
            <th>PHP版本</th>
            <td><?php echo PHP_VERSION;?></td>
        </tr>
         <tr>
            <th>运行方式</th>
            <td><?php echo PHP_SAPI;?></td>
        </tr>
    </table>
    <h3>软件信息</h3>
    <table style="width:70%;background:#ccc;border:1px solid #000;border-collapse:collapse;">
        <tr>
            <th>系统信息</th>
            <td>电子商城</td>
        </tr>
         <tr>
            <th>开发团队</th>
            <td>信大一阵风</td>
        </tr>
         <tr>
            <th>网址</th>
            <td><a href="http://www.yizhenfeng.com">http://www.yizhenfeng.com</a></td>
        </tr>
        <tr>
            <th>成功案例</th>
            <td>一阵风</td>
        </tr>
    </table>
    </div>
</body>
</html>
