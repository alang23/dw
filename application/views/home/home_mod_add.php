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


<form method="post" action="<?=base_url()?>index.php?d=home&c=mod&m=add" enctype="multipart/form-data">
<table width="511" class="table table-bordered table-hover definewidth m10">
    <thead>
    <tr>

        <th width="64"></th>
        <th width="332"></th>
		<th width="99"></th>
    </tr>
    </thead>


    <tr>
        <td>模块名称</td>       
        <td colspan="2">
         <input type="text" name="m_name">       </td>
	</tr>
      <tr>
        <td>所属项目</td>       
        <td colspan="2">
         <select name="pid">
            <option value="0">=项目类型=</option>
            <?php
              foreach($project as $k => $v){
            ?>
            <option value="<?=$v['id']?>"><?=$v['t_name']?></option>
            <?php
              }
            ?>
         </select>       </td>
  </tr>
        
      <tr>
      <td>排序</td>
      <td colspan="2">
         <input type="text" name="rank">      </td>
    </tr>
       
    <tr>
      <td>
	  
        <input type="submit" name="Submit" value="提交">      </td>
      <td colspan="2">&nbsp;</td>
    </tr>
</table>
</form>
</body>
</html>
