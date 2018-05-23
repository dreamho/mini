<?php $__env->startSection('content'); ?>
    <div class="container">
        <h2>You are in the View: application/view/home/index.php (everything in the box comes from this file)</h2>
        <p>In a real application this could be the homepage.</p>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>