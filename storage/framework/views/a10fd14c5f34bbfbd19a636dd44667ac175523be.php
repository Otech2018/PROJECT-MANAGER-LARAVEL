<?php $__env->startSection('content'); ?>
<div class='col-md-9 col-lg-9 col-sm-9 pull-left'>

    <div class="col-md-12" style="background-color:white; margin:10px; padding:15px;">
    <h3 align="center">CREATE PROJECT </h3>
        <form method="POST" action=<?php echo e(route('projects.store')); ?>>
            <?php echo e(csrf_field()); ?>


            <?php if($companies != null): ?>
            <div class="form-group">
                <label for="exampleFormControlSelect1"> Select Company</label>
                <select class="form-control" name="company_id" required>
                    <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($company->id); ?>"> <?php echo e($company->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                    
                </select>
            </div>
            <?php endif; ?>

            <div class="form-group">
                <label for="project-name"> Name  <span class="required">*</span></label>
                <input type="text"  
                class="form-control "  placeholde="project Name" name="name" />
                  <?php if($companies == null): ?>
                <input type="hidden" name="company_id" value="<?php echo e($company_id); ?>" >
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label > Description  <span class="required">*</span></label>
                <textarea style="resize:vertical;" class="form-control" name="description" rows="5"></textarea >
            </div>

             <div class="form-group">
                <input type="submit" value="submit" class="btn btn-danger"  />
            </div>
        </form>

    </div>
</div>


<div class='col-md-3 col-lg-3 col-sm-3 pull-right'>
    <div>
        <h4>Actions</h4>
        <ol class="list-unstyled">
           <li> <a href="/projects">All projects</a> </li>
            
    </div>

    <!--
      <div>
        <h4>Members</h4>
        <ol class="list-unstyled">
            <li> <a href="#">Edit</a> </li>
            <li> <a href="#">Delete</a> </li>
            <li> <a href="#">Add New User</a> </li>
        </ol>
    </div>
    -->

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>