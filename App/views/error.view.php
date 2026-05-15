<?php loadPartial('head'); ?>
<?php loadPartial('navbar'); ?>


<section class="error-container">
    <div class="error-content">
        <div class="error-status"><?= $status ?></div>
        <h2 class="error-message"><?= $message ?></h2>
        <p class="error-description">
            <?php if ($status === '404') : ?>
                We could not find the page you are looking for. The link may be broken, or the listing may have expired. 
                Explore our latest career opportunities to find your next role.
            <?php elseif ($status === '403') : ?>
                Access to this section is restricted. You do not have the necessary permissions to view this content. 
                Please return to the main board or contact support for assistance.
            <?php else : ?>
                An unexpected error has occurred. Our technical team has been notified and is working on a resolution.
            <?php endif; ?>
        </p>
        <a href="/listings" class="btn-primary">
            <i class="fa fa-arrow-left"></i> Back to Job Listings
        </a>
    </div>
</section>

<?php loadPartial('footer'); ?>
