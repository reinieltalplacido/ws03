<section class="relative bg-cover bg-center py-20 px-4 overflow-hidden" style="background-image: url('/images/showcase.jpg');">
    <div class="absolute inset-0 bg-slate-900/75"></div>
    
    <div class="container mx-auto text-center relative z-10">
        <h2 class="text-4xl md:text-6xl text-white font-extrabold mb-6 tracking-tight">
            Discover Your Next <span class="text-blue-400">Career Move</span>
        </h2>
        <p class="text-lg md:text-xl text-slate-300 mb-10 max-w-2xl mx-auto">
            Connecting ambitious talent with the world's most innovative companies. Your future starts here.
        </p>
        
        <form method="GET" action="/listings/search" class="max-w-4xl mx-auto">
            <div class="bg-white p-2 rounded-xl shadow-2xl flex flex-col md:flex-row gap-2">
                <div class="flex-1 flex items-center px-4 border-b md:border-b-0 md:border-r border-slate-100">
                    <i class="fa fa-search text-slate-400 mr-3"></i>
                    <input
                        type="text"
                        name="keywords"
                        placeholder="Job title, keywords, or company"
                        class="w-full py-3 focus:outline-none text-slate-700 bg-transparent" />
                </div>
                <div class="flex-1 flex items-center px-4">
                    <i class="fa fa-location-dot text-slate-400 mr-3"></i>
                    <input
                        type="text"
                        name="location"
                        placeholder="City, state, or remote"
                        class="w-full py-3 focus:outline-none text-slate-700 bg-transparent" />
                </div>
                <button
                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold px-8 py-4 rounded-lg transition-all duration-300 transform hover:scale-[1.02] active:scale-95 shadow-lg">
                    Find Jobs
                </button>
            </div>
        </form>
        
        <div class="mt-8 flex flex-wrap justify-center gap-4 text-slate-400 text-sm">
            <span>Popular:</span>
            <a href="/listings/search?keywords=Remote" class="hover:text-white transition-colors">Remote</a>
            <a href="/listings/search?keywords=Engineer" class="hover:text-white transition-colors">Engineering</a>
            <a href="/listings/search?keywords=Design" class="hover:text-white transition-colors">Design</a>
            <a href="/listings/search?keywords=Marketing" class="hover:text-white transition-colors">Marketing</a>
        </div>
    </div>
</section>
