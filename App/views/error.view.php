<?php loadPartial('head'); ?>
<?php loadPartial('navbar'); ?>
<?php loadPartial('top-banner'); ?>


<section>
    <div class="container mx-auto p-4 mt-4">
        <div class="text-center text-3xl mb-4 font-bold border border-gray-700 p-3"><?= $status ?> Error</div>
        <p class="text-center text-2xl mb-4">
            <?= $message ?>
        </p>
        <a class="block text-center text-blue-700 hover:underline" href="/listings">
            <i class="fa fa-arrow-left"></i> Go Back To Listings
        </a> 
    </div>
</section>


<?php loadPartial('footer'); ?> 