<?php $__env->startSection('content'); ?>
<div class="container">
    <p>This is the Error-page. Will be shown when a page (= controller / method) does not exist.</p>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>