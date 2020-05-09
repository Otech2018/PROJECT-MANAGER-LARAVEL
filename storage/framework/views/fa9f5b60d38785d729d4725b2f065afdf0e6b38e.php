<?php $__env->startSection('content'); ?>

<div class=' col-md-3 col-lg-3'></div>
<div class=' col-md-6 col-lg-6'>
        <div style=" padding:10px; border:2px solid blue; border-radius:5px;">
        <h3 style="background-color:blue;color:white; padding:10px; margin:-10px;">  Companies  
        <a style="margin-left:140px;" class=" btn btn-success btn-sm" href="/companies/create">Create new </a></h3>
          
          <div style="background-color:white;color:black; margin-top:40px;"> 
          
    
                <ul class="list-group">
                <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="list-group-item"><a href="/companies/<?php echo e($company->id); ?>"><?php echo e($company->name); ?></a></li>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
          </div>
        </div>
        
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>