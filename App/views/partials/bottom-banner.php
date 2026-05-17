<?php
use Framework\Session;
?>
<!-- Bottom Banner -->
<section class="container mx-auto px-4 my-16">
    <div class="bg-slate-900 rounded-[2rem] p-8 md:p-12 shadow-2xl overflow-hidden relative group">
       
        <div class="absolute -top-24 -right-24 w-64 h-64 bg-indigo-600 rounded-full blur-3xl opacity-20 group-hover:opacity-30 transition-opacity"></div>
        
        <div class="flex flex-col md:flex-row items-center justify-between gap-8 relative z-10">
            <div class="max-w-xl">
                <h2 class="text-3xl md:text-4xl font-extrabold text-white tracking-tight mb-4">
                    Start hiring <span class="text-blue-400">smarter</span> today.
                </h2>
                <p class="text-slate-400 text-lg leading-relaxed">
                    Post your job listing and connect with thousands of qualified professionals actively searching for their next opportunity.
                </p>
            </div>
            
            <?php if(!Session::has('user')): ?>
            <div class="flex flex-col sm:flex-row gap-4 w-full md:w-auto">
                <a href="/auth/register" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-4 rounded-2xl font-bold transition-all shadow-lg shadow-blue-500/20 text-center transform hover:scale-[1.02]">
                    Get Started Free
                </a>
                <a href="/listings/create" class="bg-slate-800 hover:bg-slate-700 text-white px-8 py-4 rounded-2xl font-bold transition-all text-center border border-slate-700">
                    Post a Job Now
                </a>
            </div>
            <?php else: ?>
                <a href="/listings/create" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-4 rounded-2xl font-bold transition-all shadow-lg shadow-blue-500/20 text-center transform hover:scale-[1.02]">
                    <i class="fa fa-plus mr-2"></i> Post a Job
                </a>
            <?php endif; ?>
        </div>
    </div>
</section>