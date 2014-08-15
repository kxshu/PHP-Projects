<?php if (!defined('THINK_PATH')) exit();?>﻿<section class="widget">
  <h3 class="widget-title">部落格分類</h3>
  <ul class="widget-list">
    <?php if(is_array($Cate)): foreach($Cate as $key=>$Cate): ?><li><a href="<?php echo U('/list/'.$Cate['cid']);?>"><?php echo ($Cate["cname"]); ?></a></li><?php endforeach; endif; ?>
  </ul>
</section>