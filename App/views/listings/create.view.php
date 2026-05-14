<?php loadPartial('head'); ?>
<?php loadPartial('navbar'); ?>

<section class="flex justify-center items-center mt-10 mb-20">
    <div class="bg-white p-8 rounded-lg shadow-2xl w-full md:w-[600px] mx-6 border border-gray-100">
        <h2 class="text-4xl text-center font-bold mb-4 text-[#2E1065]">Create Job Listing</h2>
        
        <form method="POST" action="/listings">
            <h2 class="text-2xl font-bold mb-6 text-center text-gray-400">Job Info</h2>
            
            <?php if(isset($errors)) : ?>
                <div class="mb-6">
                    <?php foreach($errors as $error): ?>
                        <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-3 mb-2 rounded-r-lg shadow-sm text-sm animate-pulse">
                            <i class="fa fa-exclamation-circle mr-2"></i><?= $error; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            
            <div class="mb-4">
                <input 
                    type="text" 
                    name="title" 
                    placeholder="Job Title" 
                    class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:border-[#581C87] focus:ring-2 focus:ring-[#581C87]/20 transition-all" 
                    value="<?= $listing['title'] ?? '' ?>"/>
            </div>
            
            <div class="mb-4">
                <textarea 
                    name="description" 
                    placeholder="Job Description" 
                    rows="4"
                    class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:border-[#581C87] focus:ring-2 focus:ring-[#581C87]/20 transition-all"><?= $listing['description'] ?? '' ?></textarea>
            </div>
            
            <div class="mb-4">
                <input 
                    type="text" 
                    name="salary" 
                    placeholder="Annual Salary" 
                    class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:border-[#581C87] focus:ring-2 focus:ring-[#581C87]/20 transition-all" 
                    value="<?= $listing['salary'] ?? '' ?>"/>
            </div>
            
            <div class="mb-4">
                <input 
                    type="text" 
                    name="requirements" 
                    placeholder="Requirements" 
                    class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:border-[#581C87] focus:ring-2 focus:ring-[#581C87]/20 transition-all" 
                    value="<?= $listing['requirements'] ?? '' ?>"/>
            </div>
            
            <div class="mb-4">
                <input 
                    type="text" 
                    name="benefits" 
                    placeholder="Benefits" 
                    class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:border-[#581C87] focus:ring-2 focus:ring-[#581C87]/20 transition-all" 
                    value="<?= $listing['benefits'] ?? '' ?>"/>
            </div>

            <div class="mb-4">
                <input 
                    type="text" 
                    name="tags" 
                    placeholder="Tags (comma separated)" 
                    class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:border-[#581C87] focus:ring-2 focus:ring-[#581C87]/20 transition-all" 
                    value="<?= $listing['tags'] ?? '' ?>"/>
            </div>

            <h2 class="text-2xl font-bold mb-6 mt-10 text-center text-gray-400">Company Info & Location</h2>
            
            <div class="mb-4">
                <input 
                    type="text" 
                    name="company" 
                    placeholder="Company Name" 
                    class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:border-[#581C87] focus:ring-2 focus:ring-[#581C87]/20 transition-all" 
                    value="<?= $listing['company'] ?? '' ?>"/>
            </div>
            
            <div class="mb-4">
                <input 
                    type="text" 
                    name="address" 
                    placeholder="Address" 
                    class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:border-[#581C87] focus:ring-2 focus:ring-[#581C87]/20 transition-all" 
                    value="<?= $listing['address'] ?? '' ?>"/>
            </div>
            
            <div class="mb-4">
                <input 
                    type="text" 
                    name="city" 
                    placeholder="City" 
                    class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:border-[#581C87] focus:ring-2 focus:ring-[#581C87]/20 transition-all" 
                    value="<?= $listing['city'] ?? '' ?>"/>
            </div>
            
            <div class="mb-4">
                <input 
                    type="text" 
                    name="state" 
                    placeholder="State" 
                    class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:border-[#581C87] focus:ring-2 focus:ring-[#581C87]/20 transition-all" 
                    value="<?= $listing['state'] ?? '' ?>"/>
            </div>
            
            <div class="mb-4">
                <input 
                    type="text" 
                    name="phone" 
                    placeholder="Phone" 
                    class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:border-[#581C87] focus:ring-2 focus:ring-[#581C87]/20 transition-all" 
                    value="<?= $listing['phone'] ?? '' ?>"/>
            </div>

            <div class="mb-4">
                <input 
                    type="email" 
                    name="email" 
                    placeholder="Email Address" 
                    class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:border-[#581C87] focus:ring-2 focus:ring-[#581C87]/20 transition-all" 
                    value="<?= $listing['email'] ?? '' ?>"/>
            </div>

            <button 
                type="submit" 
                class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 px-4 rounded-lg focus:outline-none focus:shadow-outline transition-all duration-300 mt-6 shadow-lg">
                Save Listing
            </button>
            
            <a 
                href="/listings" 
                class="block text-center w-full bg-gray-100 hover:bg-gray-200 text-blue-900 font-bold py-3 px-4 rounded-lg focus:outline-none focus:shadow-outline transition-all duration-300 mt-4 border border-gray-200">
                Cancel
            </a>
        </form>
    </div>
</section>

<?php loadPartial('footer'); ?>