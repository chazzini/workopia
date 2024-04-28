<?php
use \Framework\Session; ?>
<section class="container p-4 mx-auto mt-4">
    <?php if ($success_message = Session::getFlashMessage('success_message')): ?>
        <div class=".message bg-green-100 p-3 my-3" role="alert">
            <strong><?= $success_message ?></strong>
        </div>
    <?php endif; ?>
    <?php if ($error_message = Session::getFlashMessage('error_message')): ?>
        <div class=".message bg-red-100 p-3 my-3" role="alert">
            <strong><?= $error_message ?></strong>
        </div>

    <?php endif; ?>
</section>