<div class="form-group row">
    <label class="col-sm-2 form-label"> <?php echo e($label, false); ?></label>
    <div class="col-sm-8">
        <?php echo $__env->make($presenter->view(), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</div><?php /**PATH C:\xampp\htdocs\perenco_asset_management\perenco_tracking\vendor\open-admin-org\open-admin\src/../resources/views/filter/where.blade.php ENDPATH**/ ?>