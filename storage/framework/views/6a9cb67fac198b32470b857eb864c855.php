<div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
        onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
        <?php echo e(__('Logout')); ?>

    </a>

    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
        <?php echo csrf_field(); ?>
    </form>
</div><?php /**PATH C:\Users\joelc\OneDrive\Escritorio\Allan\Ingenieria de software\alcaldias\resources\views/home.blade.php ENDPATH**/ ?>