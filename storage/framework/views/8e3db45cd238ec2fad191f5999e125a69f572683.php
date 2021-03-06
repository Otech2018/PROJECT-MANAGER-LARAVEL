<?php $__env->startSection('content'); ?>
<div class='col-md-9 col-lg-9 col-sm-9 pull-left'>

    <div class="col-md-12" style="background-color:white; margin:10px; padding:15px;">
    <h3 align="center">CREATE COMPANY </h3>
        <form method="POST" action=<?php echo e(route('companies.store')); ?>>
            <?php echo e(csrf_field()); ?>

            <div class="form-group">
                <label for="company-name"> Name  <span class="required">*</span></label>
                <input type="text"  
                class="form-control " 
                
                placeholde="Company Name" name="name" />
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
           <li> <a href="/companies">All Companies</a> </li>
            
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