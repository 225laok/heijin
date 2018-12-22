<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header');?>
<div class="m m3">
<div class="m3l">
<div class="top-l">
<?php if($MOD['page_islide']) { ?>
<?php echo tag("moduleid=$moduleid&condition=status=3 and level=2 and thumb!=''&areaid=$cityid&order=addtime DESC&pagesize=".$MOD['page_islide']."&width=420&height=315&target=_blank&template=slide");?>
<?php } ?>
</div>
<div class="top-r">
<div class="headline">
<?php echo tag("moduleid=$moduleid&condition=status=3 and level=3&areaid=$cityid&order=addtime DESC&pagesize=1&target=_blank&template=list-hl");?>
</div>
<div class="subline">
<?php echo tag("moduleid=$moduleid&condition=status=3 and level=1&areaid=$cityid&order=addtime DESC&pagesize=8&datetype=2&target=_blank");?>
</div>
</div>
<div class="b16 c_b"></div>
<?php if(is_array($childcat)) { foreach($childcat as $i => $c) { ?>
<div class="head-txt"><span><a href="<?php echo $MOD['linkurl'];?><?php echo $c['linkurl'];?>">更多<i>&gt;</i></a></span><strong><?php echo $c['catname'];?></strong></div>
<div class="group-cat">
<?php $tags=tag("moduleid=$moduleid&table=club_group_".$moduleid."&condition=status=3&catid=".$c['catid']."&areaid=$cityid&order=addtime desc&pagesize=".$MOD['page_icat']."&template=null");?>
<?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
<div>
<a href="<?php echo $t['linkurl'];?>"><img src="<?php echo $t['thumb'];?>" width="80" height="80" alt="<?php echo $t['alt'];?>"/></a>
<ul>
<li><a href="<?php echo $t['linkurl'];?>"><?php echo $t['title'];?><?php echo $MOD['seo_name'];?></a></li>
<li><span><?php echo $t['post'];?>主题 <?php echo $t['fans'];?>粉丝</span></li>
</ul>
</div>
<?php } } ?>
</div>
<div class="c_b"></div>
<?php } } ?>
</div>
<div class="m3r">
<div class="user-info">
<script type="text/javascript">
var destoon_uname = get_cookie('username');
document.write('<a href="<?php echo $MODULE['2']['linkurl'];?>avatar.php"><img src="'+DTPath+'api/avatar/show.php?size=large&reload=<?php echo DT_TIME;?>&username='+destoon_uname+'"/></a>');
document.write('<ul>');
if(get_cookie('auth')) {
document.write('<li><em><a href="<?php echo $MODULE['2']['linkurl'];?>logout.php">退出</a></em><a href="<?php echo $MODULE['2']['linkurl'];?>"><strong>Hi,'+destoon_uname+'</strong></a></li>');
} else {
if(destoon_uname) {
document.write('<li><em><a href="<?php echo $MODULE['2']['linkurl'];?><?php echo $DT['file_login'];?>">登录</a></em><a href="<?php echo $MODULE['2']['linkurl'];?>"><strong>Hi,'+destoon_uname+'</strong></a></li>');
} else {
document.write('<li><em><a href="<?php echo $MODULE['2']['linkurl'];?><?php echo $DT['file_register'];?>">注册</a></em><a href="<?php echo $MODULE['2']['linkurl'];?><?php echo $DT['file_login'];?>"><strong>Hi,请登录</strong></a></li>');
}
}
document.write('<li><a href="<?php echo $MODULE['2']['linkurl'];?><?php echo $DT['file_my'];?>?mid=<?php echo $moduleid;?>&job=join" class="b">我的商圈</a><i>|</i><a href="<?php echo $MODULE['2']['linkurl'];?><?php echo $DT['file_my'];?>?mid=<?php echo $moduleid;?>" class="b">我的主题</a><i>|</i><a href="<?php echo $MODULE['2']['linkurl'];?><?php echo $DT['file_my'];?>?mid=<?php echo $moduleid;?>&job=group&action=add" class="b">创建商圈</a></li>');
document.write('</ul>');
</script>
</div>
<div class="club-stats">
<ul>
<li><i><?php echo $db->count($table_group, 'status=3', 1800);?></i>商圈</li>
<li><div><i><?php echo $db->count($table, 'status=3', 1800);?></i>帖子</div></li>
<li><i><?php echo $db->count($table, 'status=3 and addtime>'.($today_endtime-86400), 1800);?></i>今日</li>
</ul>
</div>
<div class="head-sub"><strong>点击排行</strong></div>
<div class="list-rank"><?php echo tag("moduleid=$moduleid&condition=status=3 and addtime>$today_endtime-1800*86400&areaid=$cityid&order=hits desc&key=hits&pagesize=9&template=list-rank");?></div>
<div class="head-sub"><strong>商圈排行</strong></div>
<div class="list-rank"><?php echo tag("moduleid=$moduleid&table=club_group_".$moduleid."&condition=status=3&areaid=$cityid&order=post desc&key=post&pagesize=9&template=list-rank");?></div>
</div>
<div class="c_b"></div>
</div>
<?php include template('footer');?>