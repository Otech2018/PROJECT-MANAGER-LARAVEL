<?php $__env->startSection('content'); ?>
<div class='col-md-9 col-lg-9 col-sm-9 pull-left'>
<div class='jumbotron col-md-12'>
    <center>
      <h1><?php echo e($company->name); ?></h1>
        <p><?php echo e($company->description); ?></p>
    </center>
</div>

<a href="/projects/create/<?php echo e($company->id); ?>" class="btn btn-primary btn-sm">Add Project</a>
<div class="row" style="background-color:white; margin:10px; padding:15px;">

    <?php $__currentLoopData = $company->projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class='col-md-4 col-lg-4'>
            <center>
            <h4><?php echo e($project->name); ?></h4>
                <p><?php echo e($project->description); ?></p>
                <p><a class="btn btn-success" href="/projects/<?php echo e($project->id); ?>">View project >></a></p>
            </center>
        </div> 
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
</div>
</div>


<div class='col-md-3 col-lg-3 col-sm-3 pull-right'>
    <div>
        <h4>Actions</h4>
        <ol class="list-unstyled">
            <li> <a href="/companies/<?php echo e($company->id); ?>/edit">Edit</a> </li>
            <li> <a href="/companies">View Companies</a> </li>
            <li> <a href="/projects/create/<?php echo e($company->id); ?>">Add Project</a> </li>
             <li> <a href="/companies/create">Create new Company</a> </li>
            <hr/>
            <li>
                <a href="#!"
                onclick="
                    var result = confirm('Are you Sure You Want to Delete this Company?');
                    if(result){
                        event.preventDefault();
                        document.getElementById('delete-form').submit();
                    }
                "> Delete </a>
                <form id="delete-form" action="<?php echo e(route('companies.destroy',[$company->id])); ?>" 
                method="POST" style="display:none;">
                     <?php echo e(csrf_field()); ?>

                    <input type="hidden" name="_method" value="delete">
                </form>
            
             </li>
            <!--li> <a href="#">Add New Member</a> </li-->
        </ol>
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