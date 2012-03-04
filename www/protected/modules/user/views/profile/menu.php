<ul class="actions">
<?php 
if(UserModule::isAdmin()) {
?>
<li><?php echo CHtml::link(UserModule::t('管理用户'),array('/user/admin')); 
?></li>
<?php 
} else {
?>
<?php if (UserModule::isAdmin()) : ?>
<li><?php echo CHtml::link(UserModule::t('List User'),array('/user')); ?></li>
<?php endif; ?>
<?php
}
?>
<li><?php echo CHtml::link(UserModule::t('修改个人信息'),array('edit')); ?></li>
<li><?php echo CHtml::link(UserModule::t('Change password'),array('changepassword')); ?></li>
<li><?php echo CHtml::link(UserModule::t('Logout'),array('/user/logout')); ?></li>
</ul>