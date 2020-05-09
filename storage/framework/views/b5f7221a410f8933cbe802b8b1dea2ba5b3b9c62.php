<?php $__env->startSection('content'); ?>
<div class='col-md-9 col-lg-9 col-sm-9 pull-left'>
<div class='well well-lg col-md-12'>
    <center>
      <h1><?php echo e($project->name); ?></h1>
        <p><?php echo e($project->description); ?></p>
    </center>
</div>

<a href="/projects/create" class="btn btn-primary btn-sm">Add Project</a>

<?php echo $__env->make('layouts.comments', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<br/>
 <div class='col-md-12 col-lg-12'>

        <form method="POST" action=<?php echo e(route('comments.store')); ?>>
            <?php echo e(csrf_field()); ?>

           
            <input type="hidden" name="commentable_type" value="App\Project">
            <input type="hidden" name="commentable_id" value="<?php echo e($project->id); ?>">
            <div class="form-group">
                <label > Comments  <span class="required">*</span></label>
                <textarea style="resize:vertical;" class="form-control" name="body" rows="3"></textarea >
            </div>

            <div class="form-group">
                <label > Proof Of Work Done (url)  <span class="required">*</span></label>
                <textarea style="resize:vertical;" class="form-control" name="url" rows="1"></textarea >
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
            <li> <a href="/projects/<?php echo e($project->id); ?>/edit">Edit</a> </li>
            <li> <a href="/projects">View projects</a> </li>
            <li> <a href="/projects/create">Create new project</a> </li>
            <hr/>
          

            <?php if($project->user_id == auth()->user()->id): ?>
              <li>
                <a href="#!"
                onclick="
                    var result = confirm('Are you Sure You Want to Delete this project?');
                    if(result){
                        event.preventDefault();
                        document.getElementById('delete-form').submit();
                    }
                "> Delete </a>
                <form id="delete-form" action="<?php echo e(route('projects.destroy',[$project->id])); ?>" 
                method="POST" style="display:none;">
                     <?php echo e(csrf_field()); ?>

                    <input type="hidden" name="_method" value="delete">
                </form>
            
             </li>

             <?php endif; ?>
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
        <h4>Add Members</h4>
        <div class="row">
            <div class="col-md-12">
                
               <form id="delete-form" action="/projects/adduser" 
                    method="POST">
                     <input type="hidden" name="project_id" value="<?php echo e($project->id); ?>">
                <div class="input-group">
                     <?php echo e(csrf_field()); ?>

                    <input type="text" class="form-control" name="email" placeholder="Search Email..."  />
                    <span class="input-group-btn">
                        <button class="btn btn-primary" type="submit">Add!</button>
                    </span>
                    
                </div>
              </form> 
            </div>
        
        </div>
<hr/>

    <div>
        <h4>Team Members</h4>
        <ol class="list-unstyled">
        <?php $__currentLoopData = $project->users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li> <a href="#"><?php echo e($user->email); ?></a> </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ol>
    </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>