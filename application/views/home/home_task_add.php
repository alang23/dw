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


<form method="post" action="<?=base_url()?>index.php?d=home&c=task&m=add" enctype="multipart/form-data">
<table width="511" class="table table-bordered table-hover definewidth m10">
    <thead>
    <tr>

        <th width="64"></th>
        <th width="332"></th>
		<th width="99"></th>
    </tr>
    </thead>


    <tr>
        <td>项目名称</td>       
       <td colspan="2">
         <input type="text" name="t_name">
       </td>
	</tr>
      <tr>
        <td>项目类型</td>       
       <td colspan="2">
         <select name="t_type">
            <option value="0">=项目类型=</option>
            <?php
              foreach($type as $k => $v){
            ?>
            <option value="<?=$v['id']?>"><?=$v['type_name']?></option>
            <?php
              }
            ?>
         </select>
       </td>
  </tr>
      <tr>
      <td>预计天数</td>
      <td colspan="2">
         <input type="text" name="t_days">
      </td>
    </tr>
        <tr>
        <td>难度</td>       
       <td colspan="2">
         <input type="text" name="t_degree">
       </td>
  </tr>
   <tr>
        <td>费用</td>       
       <td colspan="2">
         <input type="text" name="t_cost">
       </td>
  </tr>

   <tr>
        <td>简介</td>       
       <td colspan="2">
         <textarea name="t_content"></textarea>
       </td>
  </tr>

    <tr>
      <td>状态</td>
      <td colspan="2">
        <input type="radio" name="status" value="1"  checked="checked"/>正常  <input type="radio" name="status" value="0" />停用
      </td>
    </tr>
    <tr>
      <td>
        <input type="submit" name="Submit" value="提交">
      </td>
      <td colspan="2">&nbsp;</td>
    </tr>
</table>
</form>
</body>
</html>
