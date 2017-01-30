

<?php $__env->startSection('content'); ?>
    <div class="container" id="questions_form">
        <form action="#" v-on:submit="inputQuestions">
            <div class="form-group">
                <textarea class="form-control" rows="20" id="questions_input" v-model="questions"></textarea>
            </div>
            <input type="submit" value="Save" class="form-control">
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('js/questions.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>