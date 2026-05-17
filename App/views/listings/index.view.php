<?php loadPartial('head'); ?>
<?php loadPartial('navbar'); ?>

<section class="py-12 bg-slate-50 min-h-screen">
    <div class="container mx-auto px-4">
       
        <div class="mb-12">
            <h1 class="text-4xl font-extrabold text-slate-900 tracking-tight">
                <?php if (isset($keywords)) : ?> 
                    Opportunities for <span class="text-blue-600">"<?= htmlspecialchars($keywords) ?>"</span>
                <?php else : ?> 
                    Browse All <span class="text-blue-600">Opportunities</span>
                <?php endif; ?>
            </h1>
            <p class="text-slate-500 mt-2 text-lg">Find your next big break from our curated list of roles.</p>
        </div>

        <?php loadPartial('message') ?>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
          <?php foreach ($listings as $listing) : ?>
            <div class="group bg-white rounded-3xl shadow-sm hover:shadow-xl transition-all duration-300 border border-slate-100 overflow-hidden flex flex-col">
                <div class="p-8 flex-1">
                    <div class="flex justify-between items-start mb-6">
                        <h3 class="text-2xl font-black text-blue-600 uppercase tracking-tight group-hover:text-blue-700 transition-colors leading-none">
                            <?= $listing->title ?>
                        </h3>
                        <span class="bg-blue-50 text-blue-600 text-[10px] font-black px-3 py-1 rounded-full uppercase tracking-widest">Local</span>
                    </div>
                    
                    <p class="text-slate-600 text-sm font-medium leading-relaxed mb-6">
                        <?= $listing->description ?>
                    </p>
                    <div class="space-y-4 mb-2">
                        <div class="flex items-center text-slate-600 text-sm font-bold tracking-tight">
                            <i class="fa fa-dollar-sign w-6 text-blue-600 text-base"></i>
                            <span class="text-slate-400 mr-1.5">Salary:</span>
                            <span><?= formatSalary($listing->salary) ?></span>
                        </div>
                        <div class="flex items-center text-slate-600 text-sm font-bold tracking-tight">
                            <i class="fa fa-map-marker-alt w-6 text-blue-600 text-base"></i>
                            <span class="text-slate-400 mr-1.5">Location:</span>
                            <span><?= $listing->city ?>, <?= $listing->state ?></span>
                        </div>
                        <?php if (!empty($listing->tags)) : ?>
                        <div class="flex items-center text-slate-600 text-sm font-bold tracking-tight">
                            <i class="fa fa-tags w-6 text-blue-600 text-base"></i>
                            <span class="text-slate-400 mr-1.5">Tags:</span>
                            <span class="truncate"><?= $listing->tags ?></span>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                
                <div class="px-8 py-5 bg-slate-50/50 border-t border-slate-100 flex items-center justify-between">
                    <a href="/listings/<?= $listing->id ?>"
                        class="inline-flex items-center text-sm font-black text-blue-600 hover:text-blue-700 transition-all hover:gap-2">
                        View Details <i class="fa fa-chevron-right ml-2 text-[10px]"></i>
                    </a>
                </div>
            </div>
          <?php endforeach; ?>

          <?php if (empty($listings)) : ?>
            <div class="col-span-full bg-white rounded-3xl p-16 text-center border-2 border-dashed border-slate-200">
                <div class="w-20 h-20 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fa fa-search text-3xl text-slate-300"></i>
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-2">No jobs found</h3>
                <p class="text-slate-500 max-w-sm mx-auto">We couldn't find any opportunities matching your criteria. Try adjusting your search keywords or location.</p>
                <a href="/listings" class="inline-block mt-8 text-blue-600 font-bold hover:underline">Clear all filters</a>
            </div>
          <?php endif; ?>
        </div>
    </div>
</section>

<?php loadPartial('bottom-banner'); ?>
<?php loadPartial('footer'); ?>