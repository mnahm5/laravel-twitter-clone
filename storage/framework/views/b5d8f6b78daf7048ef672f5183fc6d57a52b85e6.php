

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if(Auth::user()->isNot($user)): ?>
                    <p><?php echo e(Auth::user()->username); ?></p>
                    <?php if(Auth::user()->isFollowing($user)): ?>
                        <a class="btn btn-danger" href="<?php echo e(route('user.unfollow', $user)); ?>">UnFollow</a>
                    <?php else: ?>
                        <a class="btn btn-success" href="<?php echo e(route('user.follow', $user)); ?>">Follow</a>
                    <?php endif; ?>
                <?php else: ?>
                    <h2>Followers</h2>
                    <table class="table">
                        <tbody>
                        <?php $__currentLoopData = $followers_that_i_dont_follow; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $username): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th scope="row"><h4><?php echo e($username); ?></h4></th>
                                <td><a href="<?php echo e(url('/users/' . $username . '/follow')); ?>" class="btn btn-success">Follow</a></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php $__currentLoopData = $followers_that_i_follow; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $username): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th scope="row"><h4><?php echo e($username); ?></h4></th>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <h2>Following</h2>
                    <table class="table">
                        <tbody>
                            <?php $__currentLoopData = $following; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $username): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th scope="row"><h4><?php echo e($username); ?></h4></th>
                                    <td><a href="<?php echo e(url('/users/' . $username . '/unfollow')); ?>" class="btn btn-danger">Unfollow</a></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>