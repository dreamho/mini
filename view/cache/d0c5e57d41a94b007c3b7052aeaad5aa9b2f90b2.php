<?php $__env->startSection('content'); ?>
    <hr>
    <?php if(!empty($errors)): ?>
        <ul>
        <?php $__currentLoopData = $errors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $__currentLoopData = $error; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($value); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    <?php endif; ?>
    <form method="POST" action="<?php echo e(URL); ?>auth/register">
        <label>Name:</label><br>
        <input autofocus type="text" name="name" /><br><br>
        <label>Email</label><br>
        <input type="text" name="email" /><br><br>
        <label>Password</label><br>
        <input type="input" name="password" /><br><br>
        <label>Repeat Password</label><br>
        <input type="input" name="re_password" /><br><br>
        <input type="submit" name="submit_save_user" value="Save" />
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>