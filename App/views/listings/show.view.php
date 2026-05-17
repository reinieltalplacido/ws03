<?php loadPartial('head'); ?>
<?php loadPartial('navbar'); ?>

<section class="py-12 bg-slate-50">
    <div class="container mx-auto px-4">
       
        <div class="mb-8">
            <a href="/listings" class="inline-flex items-center text-slate-500 hover:text-blue-600 transition-colors font-medium">
                <i class="fa fa-arrow-left mr-2 text-xs"></i> Back to Opportunities
            </a>
        </div>

        <div class="flex flex-col lg:flex-row gap-8">
            
            <div class="lg:w-2/3 space-y-8">
               
                <div class="bg-white rounded-3xl p-8 shadow-sm border border-slate-100">
                    <?php loadPartial('message') ?>
                    <div class="flex items-start justify-between gap-4 mb-6">
                        <div>
                            <span class="text-[10px] text-slate-400 font-bold uppercase tracking-widest"><i class="fa fa-briefcase mr-1"></i> Title:</span>
                            <h1 class="text-2xl font-black text-slate-900 tracking-tight uppercase"><?= $listing->title ?></h1>
                        </div>
                        <span class="bg-blue-50 text-blue-600 text-[10px] font-black px-3 py-1.5 rounded-full uppercase tracking-widest flex-shrink-0 mt-3">Local</span>
                    </div>

                    <div class="border-t border-slate-100 pt-5 mb-5">
                        <span class="text-[10px] text-slate-400 font-bold uppercase tracking-widest"><i class="fa fa-align-left mr-1"></i> Description:</span>
                        <p class="text-sm text-slate-600 leading-relaxed whitespace-pre-line mt-1"><?= $listing->description ?></p>
                    </div>

                    <?php if(!empty($listing->requirements)): ?>
                    <div class="border-t border-slate-100 pt-5 mb-5">
                        <span class="text-[10px] text-slate-400 font-bold uppercase tracking-widest"><i class="fa fa-clipboard-list mr-1"></i> Job Requirements:</span>
                        <p class="text-sm text-slate-600 leading-relaxed whitespace-pre-line mt-1"><?= $listing->requirements ?></p>
                    </div>
                    <?php endif; ?>

                    <?php if(!empty($listing->benefits)): ?>
                    <div class="border-t border-slate-100 pt-5">
                        <span class="text-[10px] text-slate-400 font-bold uppercase tracking-widest"><i class="fa fa-gift mr-1"></i> Benefits & Perks:</span>
                        <p class="text-sm text-slate-600 leading-relaxed whitespace-pre-line mt-1"><?= $listing->benefits ?></p>
                    </div>
                    <?php endif; ?>
                </div>
            </div>

            
            <div class="lg:w-1/3">
                <div class="sticky top-24 space-y-6">
                    
                    <div class="bg-white rounded-3xl p-8 shadow-xl shadow-slate-200/50 border border-slate-100">
                        <h3 class="text-lg font-bold text-slate-900 mb-6">Quick Overview</h3>
                        
                        <div class="space-y-4 mb-8">
                            <div class="flex items-center p-3 bg-slate-50 rounded-xl">
                                <div class="w-10 h-10 bg-blue-100 text-blue-600 rounded-lg flex items-center justify-center mr-4">
                                    <i class="fa fa-dollar-sign"></i>
                                </div>
                                <div>
                                    <div class="text-xs text-slate-400 font-bold uppercase tracking-wider">Salary</div>
                                    <div class="text-slate-900 font-bold"><?= formatSalary($listing->salary) ?></div>
                                </div>
                            </div>

                            <div class="flex items-center p-3 bg-slate-50 rounded-xl">
                                <div class="w-10 h-10 bg-indigo-100 text-indigo-600 rounded-lg flex items-center justify-center mr-4">
                                    <i class="fa fa-map-marker-alt"></i>
                                </div>
                                <div>
                                    <div class="text-xs text-slate-400 font-bold uppercase tracking-wider">Location</div>
                                    <div class="text-slate-900 font-bold"><?= $listing->city ?>, <?= $listing->state ?></div>
                                </div>
                            </div>

                            <?php if (!empty($listing->tags)) : ?>
                            <div class="p-3 bg-slate-50 rounded-xl">
                                <div class="flex items-center gap-3 mb-3">
                                    <div class="w-10 h-10 bg-emerald-100 text-emerald-600 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <i class="fa fa-tags"></i>
                                    </div>
                                    <div class="text-xs text-slate-400 font-bold uppercase tracking-wider">Tags</div>
                                </div>
                                <div class="flex flex-wrap gap-2">
                                    <?php foreach(explode(',', $listing->tags) as $tag): ?>
                                    <span class="bg-blue-50 text-blue-600 text-xs font-bold px-3 py-1 rounded-full"><?= htmlspecialchars(trim($tag)) ?></span>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>

                        <a href="mailto:<?= htmlspecialchars($listing->email) ?>?subject=<?= urlencode('Job Application - ' . $listing->title) ?>&body=<?= urlencode('Hello,' . "\n\n" . 'I am writing to apply for the ' . $listing->title . ' position.' . "\n\n") ?>"
                           class="block w-full text-center py-4 bg-blue-600 hover:bg-blue-700 text-white font-extrabold rounded-2xl transition-all shadow-lg shadow-blue-200 transform hover:scale-[1.02] active:scale-95 mb-4">
                            <i class="fa fa-envelope mr-2"></i> Apply for this position
                        </a>

                        <p class="text-center text-xs text-slate-400">
                            Opens your email client with the subject pre-filled.
                        </p>
                    </div>

                    
                    <?php if(Framework\Authorization::isOwner($listing->user_id)): ?>
                    <div class="bg-slate-900 rounded-3xl p-6 text-white">
                        <h3 class="text-sm font-bold uppercase tracking-widest text-slate-400 mb-4">Listing Management</h3>
                        <div class="grid grid-cols-2 gap-3">
                            <a href="/listings/edit/<?= $listing->id?>" 
                               class="flex items-center justify-center gap-2 py-3 bg-slate-800 hover:bg-slate-700 rounded-xl font-bold transition-colors">
                                <i class="fa fa-edit text-xs"></i> Edit
                            </a>
                            <form method="POST" class="m-0">
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" 
                                        class="w-full flex items-center justify-center gap-2 py-3 bg-red-500/10 hover:bg-red-500/20 text-red-500 rounded-xl font-bold transition-colors">
                                    <i class="fa fa-trash-can text-xs"></i> Delete
                                </button>
                            </form>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php loadPartial('bottom-banner'); ?>
<?php loadPartial('footer'); ?>