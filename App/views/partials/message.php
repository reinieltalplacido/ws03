<?php 

use Framework\Session;

?>

<?php $successMessage = Session::getFlashMessage('success_message'); ?>
<?php if ($successMessage !== null) : ?>
    <div class="message bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative my-3" role="alert">
       <?= $successMessage; ?> 
    </div>
<?php endif; ?>

<?php $errorMessage = Session::getFlashMessage('error_message'); ?>
<?php if ($errorMessage !== null) : ?>
    <div class="message bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative my-3" role="alert">
       <?= $errorMessage; ?> 
    </div>
<?php endif; ?>

