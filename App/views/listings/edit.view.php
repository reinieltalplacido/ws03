<?php loadPartial('head'); ?>
<?php loadPartial('navbar'); ?>

<section class="min-h-screen bg-slate-50 py-16 px-4">
    <div class="max-w-2xl mx-auto">
        <div class="bg-white rounded-[2.5rem] shadow-xl shadow-slate-200/60 p-10 border border-slate-100">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight mb-2">Edit Job Listing</h2>
                <p class="text-slate-500 font-medium">Refine the details of your opportunity.</p>
            </div>
            
            <form method="POST" action="/listings/<?= $listing->id ?>" class="space-y-8">
                <input type="hidden" name="_method" value="PUT">
                
                
                <div>
                    <h3 class="text-sm font-bold uppercase tracking-widest text-slate-400 mb-6 flex items-center gap-3">
                        <span class="w-8 h-px bg-slate-200"></span>
                        Role Details
                        <span class="flex-1 h-px bg-slate-200"></span>
                    </h3>
                    
                    <?php loadPartial('errors' , ['errors' => $errors ?? []]) ?>
                    
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2 px-1">Job Title</label>
                            <input 
                                type="text" 
                                name="title" 
                                placeholder="e.g. Senior Software Engineer" 
                                class="w-full px-4 py-3.5 bg-slate-50 border rounded-2xl focus:outline-none focus:ring-2 transition-all text-slate-900 placeholder:text-slate-400
                                    <?= isset($errors['title']) 
                                        ? 'border-red-400 bg-red-50 focus:ring-red-500/20 focus:border-red-500' 
                                        : 'border-slate-200 focus:ring-blue-500/20 focus:border-blue-500' ?>" 
                                value="<?= $listing->title ?? '' ?>"/>
                            <?php if (isset($errors['title'])) : ?>
                                <p class="flex items-center gap-1.5 text-red-500 text-xs font-semibold mt-2 px-1">
                                    <i class="fa fa-circle-exclamation text-xs"></i>
                                    <?= htmlspecialchars($errors['title']) ?>
                                </p>
                            <?php endif; ?>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2 px-1">Description</label>
                            <textarea 
                                name="description" 
                                placeholder="Describe the role, team, and impact..." 
                                rows="6"
                                class="w-full px-4 py-3.5 bg-slate-50 border rounded-2xl focus:outline-none focus:ring-2 transition-all text-slate-900 placeholder:text-slate-400 leading-relaxed
                                    <?= isset($errors['description']) 
                                        ? 'border-red-400 bg-red-50 focus:ring-red-500/20 focus:border-red-500' 
                                        : 'border-slate-200 focus:ring-blue-500/20 focus:border-blue-500' ?>"><?= $listing->description ?? '' ?></textarea>
                            <?php if (isset($errors['description'])) : ?>
                                <p class="flex items-center gap-1.5 text-red-500 text-xs font-semibold mt-2 px-1">
                                    <i class="fa fa-circle-exclamation text-xs"></i>
                                    <?= htmlspecialchars($errors['description']) ?>
                                </p>
                            <?php endif; ?>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2 px-1">Annual Salary</label>
                                <div class="relative">
                                    <i class="fa fa-dollar-sign absolute left-4 top-1/2 -translate-y-1/2 text-sm <?= isset($errors['salary']) ? 'text-red-400' : 'text-slate-400' ?>"></i>
                                    <input 
                                        type="text" 
                                        name="salary" 
                                        placeholder="e.g. 120000" 
                                        class="w-full pl-11 pr-4 py-3.5 bg-slate-50 border rounded-2xl focus:outline-none focus:ring-2 transition-all text-slate-900 placeholder:text-slate-400
                                            <?= isset($errors['salary']) 
                                                ? 'border-red-400 bg-red-50 focus:ring-red-500/20 focus:border-red-500' 
                                                : 'border-slate-200 focus:ring-blue-500/20 focus:border-blue-500' ?>" 
                                        value="<?= $listing->salary ?? '' ?>"/>
                                </div>
                                <?php if (isset($errors['salary'])) : ?>
                                    <p class="flex items-center gap-1.5 text-red-500 text-xs font-semibold mt-2 px-1">
                                        <i class="fa fa-circle-exclamation text-xs"></i>
                                        <?= htmlspecialchars($errors['salary']) ?>
                                    </p>
                                <?php endif; ?>
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2 px-1">Tags</label>
                                <div class="relative">
                                    <i class="fa fa-tags absolute left-4 top-1/2 -translate-y-1/2 text-sm <?= isset($errors['tags']) ? 'text-red-400' : 'text-slate-400' ?>"></i>
                                    <input 
                                        type="text" 
                                        name="tags" 
                                        placeholder="e.g. PHP, Laravel, AWS" 
                                        class="w-full pl-11 pr-4 py-3.5 bg-slate-50 border rounded-2xl focus:outline-none focus:ring-2 transition-all text-slate-900 placeholder:text-slate-400
                                            <?= isset($errors['tags']) 
                                                ? 'border-red-400 bg-red-50 focus:ring-red-500/20 focus:border-red-500' 
                                                : 'border-slate-200 focus:ring-blue-500/20 focus:border-blue-500' ?>" 
                                        value="<?= $listing->tags ?? '' ?>"/>
                                </div>
                                <?php if (isset($errors['tags'])) : ?>
                                    <p class="flex items-center gap-1.5 text-red-500 text-xs font-semibold mt-2 px-1">
                                        <i class="fa fa-circle-exclamation text-xs"></i>
                                        <?= htmlspecialchars($errors['tags']) ?>
                                    </p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

               
                <div>
                    <h3 class="text-sm font-bold uppercase tracking-widest text-slate-400 mb-6 flex items-center gap-3">
                        <span class="w-8 h-px bg-slate-200"></span>
                        Requirements & Perks
                        <span class="flex-1 h-px bg-slate-200"></span>
                    </h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2 px-1">Requirements</label>
                            <textarea 
                                name="requirements" 
                                placeholder="List the key requirements..." 
                                rows="3"
                                class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all text-slate-900 placeholder:text-slate-400 leading-relaxed"><?= $listing->requirements ?? '' ?></textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2 px-1">Benefits</label>
                            <textarea 
                                name="benefits" 
                                placeholder="List the perks and benefits..." 
                                rows="3"
                                class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all text-slate-900 placeholder:text-slate-400 leading-relaxed"><?= $listing->benefits ?? '' ?></textarea>
                        </div>
                    </div>
                </div>

                
                <div>
                    <h3 class="text-sm font-bold uppercase tracking-widest text-slate-400 mb-6 flex items-center gap-3">
                        <span class="w-8 h-px bg-slate-200"></span>
                        Company & Location
                        <span class="flex-1 h-px bg-slate-200"></span>
                    </h3>
                    
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2 px-1">Company Name</label>
                            <input 
                                type="text" 
                                name="company" 
                                placeholder="Company Name" 
                                class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all text-slate-900 placeholder:text-slate-400" 
                                value="<?= $listing->company ?? '' ?>"/>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2 px-1">Office Address</label>
                            <input 
                                type="text" 
                                name="address" 
                                placeholder="Street Address" 
                                class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all text-slate-900 placeholder:text-slate-400" 
                                value="<?= $listing->address ?? '' ?>"/>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2 px-1">City</label>
                                <div class="relative">
                                    <i class="fa fa-city absolute left-4 top-1/2 -translate-y-1/2 text-sm <?= isset($errors['city']) ? 'text-red-400' : 'text-slate-400' ?>"></i>
                                    <input 
                                        type="text" 
                                        name="city" 
                                        placeholder="City" 
                                        class="w-full pl-11 pr-4 py-3.5 bg-slate-50 border rounded-2xl focus:outline-none focus:ring-2 transition-all text-slate-900 placeholder:text-slate-400
                                            <?= isset($errors['city']) 
                                                ? 'border-red-400 bg-red-50 focus:ring-red-500/20 focus:border-red-500' 
                                                : 'border-slate-200 focus:ring-blue-500/20 focus:border-blue-500' ?>" 
                                        value="<?= $listing->city ?? '' ?>"/>
                                </div>
                                <?php if (isset($errors['city'])) : ?>
                                    <p class="flex items-center gap-1.5 text-red-500 text-xs font-semibold mt-2 px-1">
                                        <i class="fa fa-circle-exclamation text-xs"></i>
                                        <?= htmlspecialchars($errors['city']) ?>
                                    </p>
                                <?php endif; ?>
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2 px-1">State</label>
                                <div class="relative">
                                    <i class="fa fa-map-marker-alt absolute left-4 top-1/2 -translate-y-1/2 text-sm <?= isset($errors['state']) ? 'text-red-400' : 'text-slate-400' ?>"></i>
                                    <input 
                                        type="text" 
                                        name="state" 
                                        placeholder="State" 
                                        class="w-full pl-11 pr-4 py-3.5 bg-slate-50 border rounded-2xl focus:outline-none focus:ring-2 transition-all text-slate-900 placeholder:text-slate-400
                                            <?= isset($errors['state']) 
                                                ? 'border-red-400 bg-red-50 focus:ring-red-500/20 focus:border-red-500' 
                                                : 'border-slate-200 focus:ring-blue-500/20 focus:border-blue-500' ?>" 
                                        value="<?= $listing->state ?? '' ?>"/>
                                </div>
                                <?php if (isset($errors['state'])) : ?>
                                    <p class="flex items-center gap-1.5 text-red-500 text-xs font-semibold mt-2 px-1">
                                        <i class="fa fa-circle-exclamation text-xs"></i>
                                        <?= htmlspecialchars($errors['state']) ?>
                                    </p>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2 px-1">Phone</label>
                                <input 
                                    type="text" 
                                    name="phone" 
                                    placeholder="Phone" 
                                    class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all text-slate-900 placeholder:text-slate-400" 
                                    value="<?= $listing->phone ?? '' ?>"/>
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2 px-1">Email</label>
                                <div class="relative">
                                    <i class="fa fa-envelope absolute left-4 top-1/2 -translate-y-1/2 text-sm <?= isset($errors['email']) ? 'text-red-400' : 'text-slate-400' ?>"></i>
                                    <input 
                                        type="email" 
                                        name="email" 
                                        placeholder="jobs@company.com" 
                                        class="w-full pl-11 pr-4 py-3.5 bg-slate-50 border rounded-2xl focus:outline-none focus:ring-2 transition-all text-slate-900 placeholder:text-slate-400
                                            <?= isset($errors['email']) 
                                                ? 'border-red-400 bg-red-50 focus:ring-red-500/20 focus:border-red-500' 
                                                : 'border-slate-200 focus:ring-blue-500/20 focus:border-blue-500' ?>" 
                                        value="<?= $listing->email ?? '' ?>"/>
                                </div>
                                <?php if (isset($errors['email'])) : ?>
                                    <p class="flex items-center gap-1.5 text-red-500 text-xs font-semibold mt-2 px-1">
                                        <i class="fa fa-circle-exclamation text-xs"></i>
                                        <?= htmlspecialchars($errors['email']) ?>
                                    </p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pt-8 flex flex-col md:flex-row gap-4">
                    <button 
                        type="submit" 
                        class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-extrabold py-4 rounded-2xl shadow-lg shadow-blue-500/20 transition-all transform hover:scale-[1.02] active:scale-95">
                        Update Listing
                    </button>
                    
                    <a 
                        href="/listings/<?= $listing->id; ?>" 
                        class="flex-1 bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold py-4 rounded-2xl transition-all text-center">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</section>

<?php loadPartial('footer'); ?>