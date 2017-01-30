

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p><?php echo e(Auth::user()->username); ?></p>

                <?php if(Auth::user()->isNot($user)): ?>
                    <?php if(Auth::user()->isFollowing($user)): ?>
                        <a class="btn btn-danger" href="<?php echo e(route('user.unfollow', $user)); ?>">UnFollow</a>
                    <?php else: ?>
                        <a class="btn btn-success" href="<?php echo e(route('user.follow', $user)); ?>">Follow</a>
                    <?php endif; ?>
                <?php else: ?>
                    <h4>Followers</h4>
                    <?php $__currentLoopData = Auth::user()->following()->pluck('username'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $username): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo e($username); ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <h4>Following</h4>
                    <?php $__currentLoopData = Auth::user()->followers()->pluck('username'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $username): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo e($username); ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>