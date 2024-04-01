<?php
loadPartial('head');
loadPartial('navbar');

?>




<section>
    <div class="container p-4 mx-auto mt-4">
        <div class="p-3 mb-4 text-3xl font-bold text-center border border-gray-300">
            <?= $status ?>
        </div>
        <p class="mb-4 text-2xl text-center">
            <?= $message ?>
        </p>
    </div>
</section>


<?= loadPartial('footer'); ?>