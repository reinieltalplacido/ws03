<?php 
use Framework\Session;
?>

<!-- Nav -->
<header class="bg-white border-b border-slate-100 sticky top-0 z-50">
    <div class="container mx-auto flex justify-between items-center p-4">
        <h1 class="text-2xl font-extrabold tracking-tight">
            <a href="/" class="flex items-center gap-2">
                <span class="text-slate-900">JobSeek</span>
                <i class="fa fa-search text-slate-400 text-xs ml-1"></i>
            </a>
        </h1>
        <nav class="flex items-center gap-6">
            <a href="/listings" class="hidden md:block text-slate-600 hover:text-blue-600 font-medium transition-colors">Browse Jobs</a>
            
            <?php if(Session::has('user')) : ?>
                <div class="flex items-center gap-6">
                    <div class="hidden lg:block text-sm font-medium text-slate-500">
                        Hello, <span class="text-slate-900"><?= Session::get('user')['name'] ?></span>
                    </div>
                    <form method="POST" action="/auth/logout" class="m-0">
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-5 py-2.5 rounded-xl font-bold transition-all text-sm">Logout</button>
                    </form>
                    
                    <a href="/listings/create"
                       class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-xl font-bold transition-all shadow-lg shadow-blue-200 flex items-center gap-2 text-sm">
                        <i class="fa fa-plus text-xs"></i> Post a Job
                    </a>
                </div>
            <?php else: ?>
                <div class="flex items-center gap-4">
                    <a href="/auth/login" class="text-slate-600 hover:text-blue-600 font-medium transition-colors">Login</a>
                    <a href="/auth/register" class="bg-slate-900 hover:bg-slate-800 text-white px-5 py-2.5 rounded-xl font-bold transition-all text-sm">Register</a>
                </div>
            <?php endif; ?>
        </nav>
    </div>
</header>