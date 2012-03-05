<?php
$this->breadcrumbs=array(
	'Analasis'=>array('/analasis'),
	'Card',
);?>

<?php 
$this->menu=array(
	array('label'=>'浏览所有会员卡','url'=>array('/card/index')),
);
 ?>
<h1><?php echo '会员卡情况统计'; ?></h1>

<p>
	<div class="row">
		<div class="span3">
			<?php echo "激活情况：" ?>
		</div>
		<div class="span5"><p><?php echo number_format($data['activateNum']/$data['totalNum'] *100) ?>%</p></div>
	</div>

	<div class="row">
		<div class="span3">
			<?php echo "会员性别统计" ?>
		</div>
		<div class="span5"><p>男性百分比：<?php echo number_format($data['maleNum']/$data['totalNum'] *100) ?>%
			<br>
			女性百分比：<?php echo number_format($data['femaleNum']/$data['totalNum'] *100) ?>%</p>
		</div>
	</div>

	<div class="row">
		<div class="span3">
			<?php echo "年龄情况统计" ?>
		</div>
		<div class="span5">
		<p>
		<?php 
			for ($i = 0; $i<10; $i ++) {
				$age = $data['ages'][$i];
				if ($age != 0)
					echo '年龄在'.($i*10).'岁和'.($i*10+10).'岁之间的百分比：'.number_format($data['maleNum']/$data['totalNum'] *100).'%';
			}
		 ?>
		 </p>
		</div>
	</div>


</p>
