<?php loadPartial('head'); ?>
<?php loadPartial('navbar'); ?>
<?php loadPartial('showcase-search'); ?>

<!-- Recent Jobs Section -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between mb-12">
            <div>
                <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">Recent Opportunities</h2>
                <p class="text-slate-500 mt-2">The latest roles from top-tier companies.</p>
            </div>
            <a href="/listings" class="hidden md:flex items-center text-blue-600 font-semibold hover:text-blue-700 transition-colors">
                View all jobs <i class="fa fa-arrow-right ml-2 text-sm"></i>
            </a>
        </div>

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
                           <?= $listing->description  ?>
                        </p>
                        
                        <div class="space-y-4 mb-2">
                            <div class="flex items-center text-slate-600 text-sm font-bold tracking-tight">
                                <i class="fa fa-dollar-sign w-6 text-blue-600 text-base"></i>
                                <span class="text-slate-400 text-[10px] uppercase tracking-widest mr-2">Salary:</span>
                                <span><?= formatSalary($listing->salary) ?></span>
                            </div>
                            <div class="flex items-center text-slate-600 text-sm font-bold tracking-tight">
                                <i class="fa fa-map-marker-alt w-6 text-blue-600 text-base"></i>
                                <span class="text-slate-400 text-[10px] uppercase tracking-widest mr-2">Location:</span>
                                <span><?= $listing->city ?>, <?= $listing->state ?></span>
                            </div>
                            <?php if (!empty($listing->tags)) : ?>
                            <div class="flex items-center text-slate-600 text-sm font-bold tracking-tight">
                                <i class="fa fa-tags w-6 text-blue-600 text-base"></i>
                                <span class="text-slate-400 text-[10px] uppercase tracking-widest mr-2">Tags:</span>
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
        </div>

        <div class="text-center md:hidden">
            <a href="/listings" class="inline-flex items-center px-6 py-3 bg-blue-600 text-white font-bold rounded-xl shadow-lg shadow-blue-200 hover:bg-blue-700 transition-all">
                Browse All Jobs
            </a>
        </div>
    </div>
</section>


<section class="container mx-auto px-4 my-16">
    <div class="bg-white rounded-[2.5rem] p-8 md:p-12 border border-slate-100 shadow-sm relative overflow-hidden">
       
        <div class="absolute top-0 right-0 w-64 h-64 bg-blue-50 rounded-full blur-3xl opacity-20 -mr-32 -mt-32"></div>
        <div class="absolute bottom-0 left-0 w-64 h-64 bg-indigo-50 rounded-full blur-3xl opacity-20 -ml-32 -mb-32"></div>
        
        <div class="relative z-10">
            
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 gap-4">
                <div>
                    <h2 class="text-2xl font-black text-slate-900 tracking-tight uppercase">Overall Popular Categories</h2>
                    <p class="text-slate-500 text-sm mt-1 font-medium">Explore thousands of job openings by industry.</p>
                </div>
                <a href="/listings" class="text-xs font-black text-blue-600 hover:text-blue-700 flex items-center uppercase tracking-widest">
                    All Categories <i class="fa fa-arrow-right ml-2 text-[10px]"></i>
                </a>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                
                <a href="/listings" class="group p-6 rounded-2xl bg-slate-50/50 border border-slate-100 hover:bg-white hover:border-blue-200 hover:shadow-xl hover:shadow-blue-500/5 transition-all duration-300">
                    <div class="w-10 h-10 bg-white text-blue-600 rounded-xl flex items-center justify-center shadow-sm mb-4 group-hover:!bg-blue-600 group-hover:!text-white transition-all">
                        <i class="fa fa-code text-sm"></i>
                    </div>
                    <h3 class="font-black text-slate-900 text-sm uppercase tracking-tight">Technology</h3>
                    <p class="text-slate-400 text-[10px] mt-1 font-bold">1.2k+ Positions</p>
                </a>

                <!-- Design -->
                <a href="/listings" class="group p-6 rounded-2xl bg-slate-50/50 border border-slate-100 hover:bg-white hover:border-indigo-200 hover:shadow-xl hover:shadow-indigo-500/5 transition-all duration-300">
                    <div class="w-10 h-10 bg-white text-indigo-600 rounded-xl flex items-center justify-center shadow-sm mb-4 group-hover:!bg-indigo-600 group-hover:!text-white transition-all">
                        <i class="fa fa-palette text-sm"></i>
                    </div>
                    <h3 class="font-black text-slate-900 text-sm uppercase tracking-tight">Design</h3>
                    <p class="text-slate-400 text-[10px] mt-1 font-bold">850+ Positions</p>
                </a>

               
                <a href="/listings" class="group p-6 rounded-2xl bg-slate-50/50 border border-slate-100 hover:bg-white hover:border-emerald-200 hover:shadow-xl hover:shadow-emerald-500/5 transition-all duration-300">
                    <div class="w-10 h-10 bg-white text-emerald-600 rounded-xl flex items-center justify-center shadow-sm mb-4 group-hover:!bg-emerald-600 group-hover:!text-white transition-all">
                        <i class="fa fa-bullhorn text-sm"></i>
                    </div>
                    <h3 class="font-black text-slate-900 text-sm uppercase tracking-tight">Marketing</h3>
                    <p class="text-slate-400 text-[10px] mt-1 font-bold">640+ Positions</p>
                </a>

               
                <a href="/listings" class="group p-6 rounded-2xl bg-slate-50/50 border border-slate-100 hover:bg-white hover:border-amber-200 hover:shadow-xl hover:shadow-amber-500/5 transition-all duration-300">
                    <div class="w-10 h-10 bg-white text-amber-600 rounded-xl flex items-center justify-center shadow-sm mb-4 group-hover:!bg-amber-600 group-hover:!text-white transition-all">
                        <i class="fa fa-coins text-sm"></i>
                    </div>
                    <h3 class="font-black text-slate-900 text-sm uppercase tracking-tight">Finance</h3>
                    <p class="text-slate-400 text-[10px] mt-1 font-bold">430+ Positions</p>
                </a>
            </div>

            
            <div class="my-10 border-t border-slate-100"></div>

            
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 gap-4">
                <div>
                    <h2 class="text-2xl font-black text-slate-900 tracking-tight uppercase">Success Stories</h2>
                    <p class="text-slate-500 text-sm mt-1 font-medium">Hear from professionals who accelerated their careers with us.</p>
                </div>
                <div class="hidden md:flex text-amber-400 gap-1 text-sm">
                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                
                <div class="bg-slate-50/50 p-8 rounded-3xl border border-slate-100 hover:bg-white hover:border-blue-200 hover:shadow-xl hover:shadow-blue-500/5 transition-all duration-300">
                    <p class="text-slate-600 text-sm leading-relaxed mb-8 italic">
                        "JobSeek streamlined my entire job search. I found a Full Stack Developer role at a top-tier company in just 10 days. The minimalist interface is a breath of fresh air."
                    </p>
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center font-black text-xs">RT</div>
                        <div>
                            <h4 class="text-sm font-black text-slate-900">Reiniel Anjelo Talplacido</h4>
                            <p class="text-[10px] text-slate-400 uppercase font-bold tracking-wider">Full Stack Developer</p>
                        </div>
                    </div>
                </div>

              
                <div class="bg-slate-50/50 p-8 rounded-3xl border border-slate-100 hover:bg-white hover:border-indigo-200 hover:shadow-xl hover:shadow-indigo-500/5 transition-all duration-300">
                    <p class="text-slate-600 text-sm leading-relaxed mb-8 italic">
                        "The quality of listings here is unmatched. As a designer, I found opportunities that truly valued creativity. Landed my dream role within two weeks of signing up."
                    </p>
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 bg-indigo-100 text-indigo-600 rounded-full flex items-center justify-center font-black text-xs">JS</div>
                        <div>
                            <h4 class="text-sm font-black text-slate-900">Jorald Sevilla</h4>
                            <p class="text-[10px] text-slate-400 uppercase font-bold tracking-wider">UI/UX Designer</p>
                        </div>
                    </div>
                </div>

               
                <div class="bg-slate-50/50 p-8 rounded-3xl border border-slate-100 hover:bg-white hover:border-emerald-200 hover:shadow-xl hover:shadow-emerald-500/5 transition-all duration-300">
                    <p class="text-slate-600 text-sm leading-relaxed mb-8 italic">
                        "JobSeek streamlined my entire job search. The community is engaged and the application process is incredibly smooth for everyone."
                    </p>
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 bg-emerald-100 text-emerald-600 rounded-full flex items-center justify-center font-black text-xs">AC</div>
                        <div>
                            <h4 class="text-sm font-black text-slate-900">Ace Cumbe</h4>
                            <p class="text-[10px] text-slate-400 uppercase font-bold tracking-wider">Quality Assurance</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php loadPartial('bottom-banner'); ?>
<?php loadPartial('footer'); ?>