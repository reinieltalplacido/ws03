<?php loadPartial('head'); ?>
<?php loadPartial('navbar'); ?>

<section class="min-h-[80vh] flex items-center justify-center py-12 px-4 bg-slate-50 relative overflow-hidden">
    
    <div class="absolute top-0 right-0 w-96 h-96 bg-blue-100 rounded-full blur-3xl opacity-50 -mr-48 -mt-48"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-indigo-100 rounded-full blur-3xl opacity-50 -ml-48 -mb-48"></div>

    <div class="max-w-md w-full relative z-10">
        <div class="bg-white rounded-[2.5rem] shadow-xl shadow-slate-200/60 p-10 border border-slate-100">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight mb-2">Welcome Back</h2>
                <p class="text-slate-500 font-medium">Log in to manage your career journey.</p>
            </div>

            <?php loadPartial('errors' , ['errors' => $errors ?? []]) ?>

            <form method="POST" action="/auth/login" class="space-y-6">
               
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2 px-1">Email Address</label>
                    <div class="relative">
                        <i class="fa fa-envelope absolute left-4 top-1/2 -translate-y-1/2 text-sm <?= isset($errors['email']) ? 'text-red-400' : 'text-slate-400' ?>"></i>
                        <input
                            type="email"
                            name="email"
                            id="email"
                            placeholder="name@company.com"
                            class="w-full pl-11 pr-4 py-4 bg-slate-50 border rounded-2xl focus:outline-none focus:ring-2 transition-all text-slate-900 placeholder:text-slate-400
                                <?= isset($errors['email'])
                                    ? 'border-red-400 bg-red-50 focus:ring-red-500/20 focus:border-red-500'
                                    : 'border-slate-200 focus:ring-blue-500/20 focus:border-blue-500' ?>"
                        />
                    </div>
                    <?php if (isset($errors['email'])) : ?>
                        <p class="flex items-center gap-1.5 text-red-500 text-xs font-semibold mt-2 px-1">
                            <i class="fa fa-circle-exclamation text-xs"></i>
                            <?= htmlspecialchars($errors['email']) ?>
                        </p>
                    <?php endif; ?>
                </div>

                
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2 px-1">Password</label>
                    <div class="relative">
                        <i class="fa fa-lock absolute left-4 top-1/2 -translate-y-1/2 text-sm <?= isset($errors['password']) ? 'text-red-400' : 'text-slate-400' ?>"></i>
                        <input
                            type="password"
                            name="password"
                            id="password"
                            placeholder="••••••••"
                            class="w-full pl-11 pr-4 py-4 bg-slate-50 border rounded-2xl focus:outline-none focus:ring-2 transition-all text-slate-900 placeholder:text-slate-400
                                <?= isset($errors['password'])
                                    ? 'border-red-400 bg-red-50 focus:ring-red-500/20 focus:border-red-500'
                                    : 'border-slate-200 focus:ring-blue-500/20 focus:border-blue-500' ?>"
                        />
                    </div>
                    <?php if (isset($errors['password'])) : ?>
                        <p class="flex items-center gap-1.5 text-red-500 text-xs font-semibold mt-2 px-1">
                            <i class="fa fa-circle-exclamation text-xs"></i>
                            <?= htmlspecialchars($errors['password']) ?>
                        </p>
                    <?php endif; ?>
                </div>

                <button
                    type="submit" 
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-extrabold py-4 rounded-2xl shadow-lg shadow-blue-500/20 transition-all transform hover:scale-[1.02] active:scale-95"
                >
                    Sign In
                </button>

                <div class="pt-6 text-center border-t border-slate-100">
                    <p class="text-slate-500 font-medium">
                        New to JobSeek?
                        <a class="text-blue-600 hover:text-blue-700 font-bold ml-1 transition-colors" href="/auth/register">Create an account</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</section>

<?php loadPartial('footer'); ?>