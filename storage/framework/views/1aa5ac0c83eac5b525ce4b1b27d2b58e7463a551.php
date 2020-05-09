<hr/>
<h5>Recents Comments</h5>
<div class="row">



    <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class='col-md-12' style="padding:10px; background-color:#ccc8cc; border:2px solid white; border-radius:5px;">
         
            <h5><a href="/users/<?php echo e($comment->user->id); ?>">
            <?php echo e($comment->user->first_name); ?> <?php echo e($comment->user->last_name); ?> - <?php echo e($comment->user->email); ?>

            </a></h5>
            <p><?php echo e($comment->body); ?></p>
                <p><?php echo e($comment->url); ?></p>
                <p><a class="btn btn-success" href="/projects/<?php echo e($project->id); ?>">View project >></a></p>
          
        </div> 
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  

</div>