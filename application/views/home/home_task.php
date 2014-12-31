<?php Widget::head();?>
<script>
function flush(msg,url){
	art.dialog(
		msg, 
		function () {
			
			window.location = url;
		},
		function(){
			
		}
	);
}



</script>
<body>

<form class="form-inline definewidth m20" >
    <a href="<?=base_url()?>index.php?d=home&c=task&m=add"><button type="button" class="btn btn-success" id="addnew">添加</button></a>

</form>

<table class="table table-bordered table-hover definewidth m10">
    <thead>
    <tr>

        <th>ID</th>
        <th >项目名称</th>
		 <th>项目类型</th>
		 <th>预计天数</th>
        <th>难度</th>
        <th>费用</th>
        <th>管理操作</th>
    </tr>
    </thead>

	<?php
		foreach($list as $k => $v){
	?>
    <tr>
        <td valign="middle"><?=$v['id']?></td>
       
        <td valign="middle"><?=$v['t_name']?></td>
        <td valign="middle"><?=$v['type_name']?></td>
        <td valign="middle"><?=$v['t_days']?></td>
        <td><?=$v['t_degree']?></td>
		 <td><?=$v['t_cost']?></td>
        <td>
        <a href="<?=base_url()?>index.php?d=home&c=task&m=trouble&id=<?=$v['id']?>">任务</a> |
		<a href="<?=base_url()?>index.php?d=home&c=task&m=update&id=<?=$v['id']?>">编辑</a> | 
		<a href="<?=base_url()?>index.php?d=home&c=task&m=del&id=<?=$v['id']?>">删除</a>
		</td>
    </tr>

	<?php
	}
	?>
	<tr>
        <td colspan="9"><?=$page?></td>
    </tr>
</table>

</body>
</html>
