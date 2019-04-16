
<br>
User: <b><?php echo e($user->getName()); ?></b> <br>
Posts: <br>
<ul>
<?php $__currentLoopData = $user->getPosts()->getValues(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li><?php echo e($post->getTitle()); ?></li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
<?php /* /var/www/composer/composer/Resources/Views/user.blade.php */ ?>