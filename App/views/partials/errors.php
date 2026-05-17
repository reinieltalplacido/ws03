<?php if (!empty($errors)) : ?>
    <div class="bg-red-50 border border-red-100 text-red-800 px-5 py-4 rounded-2xl mb-8 flex items-center gap-3">
        <i class="fa fa-circle-exclamation text-red-500"></i>
        <p class="text-sm font-bold">
            Please complete the <span class="bg-red-500 text-white px-2 py-0.5 rounded-lg text-xs font-black mx-1 shadow-sm"><?= count($errors) ?></span> missing fields below before continuing.
        </p>
    </div>
<?php endif; ?>