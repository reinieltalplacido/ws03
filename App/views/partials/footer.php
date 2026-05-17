<?php use Framework\Session; ?>
<!-- Footer -->
<footer class="bg-slate-900 pt-16 pb-8">
    <div class="container mx-auto px-4"> 
        <div class="grid grid-cols-1 md:grid-cols-12 gap-10 mb-14"> 
            <div class="md:col-span-4 space-y-5">
                <a href="/" class="flex items-center gap-2.5">
                    <span class="w-9 h-9 bg-blue-600 rounded-lg flex items-center justify-center text-white text-sm font-black shadow-lg shadow-blue-600/20">J</span>
                    <span class="text-lg font-black tracking-tight text-white">JobSeek</span>
                </a>
                <p class="text-slate-400 text-sm leading-relaxed max-w-xs">
                    Where talent meets opportunity. Connecting professionals with their next career move since 2026.
                </p>
                <div class="flex items-center gap-3 pt-2">
                    <a href="#" class="w-9 h-9 rounded-xl bg-slate-800 border border-slate-700/50 flex items-center justify-center hover:bg-blue-600 hover:border-blue-500 text-slate-400 hover:text-white transition-all duration-300 text-xs">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="w-9 h-9 rounded-xl bg-slate-800 border border-slate-700/50 flex items-center justify-center hover:bg-blue-600 hover:border-blue-500 text-slate-400 hover:text-white transition-all duration-300 text-xs">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="#" class="w-9 h-9 rounded-xl bg-slate-800 border border-slate-700/50 flex items-center justify-center hover:bg-blue-600 hover:border-blue-500 text-slate-400 hover:text-white transition-all duration-300 text-xs">
                        <i class="fab fa-github"></i>
                    </a>
                    <a href="#" class="w-9 h-9 rounded-xl bg-slate-800 border border-slate-700/50 flex items-center justify-center hover:bg-blue-600 hover:border-blue-500 text-slate-400 hover:text-white transition-all duration-300 text-xs">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                </div>
            </div>

           
            <div class="md:col-span-2">
                <h4 class="text-[11px] font-black uppercase tracking-[0.2em] text-slate-500 mb-5">Explore</h4>
                <ul class="space-y-3">
                    <li><a href="/listings" class="text-slate-400 hover:text-white text-sm font-medium transition-colors duration-200">Browse Jobs</a></li>
                    <li><a href="/listings" class="text-slate-400 hover:text-white text-sm font-medium transition-colors duration-200">Remote Roles</a></li>
                    <li><a href="/listings" class="text-slate-400 hover:text-white text-sm font-medium transition-colors duration-200">Tech Jobs</a></li>
                    <li><a href="/listings" class="text-slate-400 hover:text-white text-sm font-medium transition-colors duration-200">Design Jobs</a></li>
                </ul>
            </div>

           
            <div class="md:col-span-2">
                <h4 class="text-[11px] font-black uppercase tracking-[0.2em] text-slate-500 mb-5">Company</h4>
                <ul class="space-y-3">
                    <li><a href="/listings/create" class="text-slate-400 hover:text-white text-sm font-medium transition-colors duration-200">Post a Job</a></li>
                    <li><a href="#" class="text-slate-400 hover:text-white text-sm font-medium transition-colors duration-200">About Us</a></li>
                    <li><a href="#" class="text-slate-400 hover:text-white text-sm font-medium transition-colors duration-200">Careers</a></li>
                    <li><a href="#" class="text-slate-400 hover:text-white text-sm font-medium transition-colors duration-200">Blog</a></li>
                </ul>
            </div>

            
            <div class="md:col-span-2">
                <h4 class="text-[11px] font-black uppercase tracking-[0.2em] text-slate-500 mb-5">Legal</h4>
                <ul class="space-y-3">
                    <li><a href="#" class="text-slate-400 hover:text-white text-sm font-medium transition-colors duration-200">Privacy Policy</a></li>
                    <li><a href="#" class="text-slate-400 hover:text-white text-sm font-medium transition-colors duration-200">Terms of Service</a></li>
                    <li><a href="#" class="text-slate-400 hover:text-white text-sm font-medium transition-colors duration-200">Cookie Policy</a></li>
                </ul>
            </div>

            
            <div class="md:col-span-2">
                <h4 class="text-[11px] font-black uppercase tracking-[0.2em] text-slate-500 mb-5">Get Started</h4>
                <?php if(!Session::has('user')): ?>
                    <div class="space-y-3">
                        <a href="/auth/register" class="block w-full text-center bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold uppercase tracking-wider px-5 py-3 rounded-xl transition-all shadow-lg shadow-blue-600/20">
                            Sign Up Free
                        </a>
                        <a href="/auth/login" class="block w-full text-center bg-slate-800 hover:bg-slate-700 text-slate-300 hover:text-white text-xs font-bold uppercase tracking-wider px-5 py-3 rounded-xl border border-slate-700/50 transition-all">
                            Login
                        </a>
                    </div>
                <?php else: ?>
                    <a href="/listings/create" class="block w-full text-center bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold uppercase tracking-wider px-5 py-3 rounded-xl transition-all shadow-lg shadow-blue-600/20">
                        <i class="fa fa-plus mr-1.5"></i> Post a Job
                    </a>
                <?php endif; ?>
            </div>
        </div>

        
        <div class="border-t border-slate-800 pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
            <p class="text-slate-500 text-xs font-medium">
                &copy; <?= date('Y') ?> <span class="font-bold text-slate-400">JobSeek</span>. All rights reserved.
            </p>
            <div class="flex items-center gap-6 text-slate-500 text-[10px] font-bold uppercase tracking-[0.15em]">
            </div>
        </div>
    </div>
</footer>