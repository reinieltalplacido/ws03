<footer class="bg-indigo-900 text-white pt-12 pb-8">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12 mb-12">
            <!-- Brand Section -->
            <div class="space-y-4">
                <h2 class="text-3xl font-bold tracking-tight">JobSeek</h2>
                <p class="text-indigo-200 leading-relaxed max-w-sm">
                    Empowering careers and connecting talent with opportunity. The leading platform for modern job search and professional growth.
                </p>
                <div class="flex space-x-4 pt-2">
                    <a href="#" class="w-10 h-10 rounded-full bg-indigo-800 flex items-center justify-center hover:bg-white hover:text-indigo-900 transition-all duration-300">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-full bg-indigo-800 flex items-center justify-center hover:bg-white hover:text-indigo-900 transition-all duration-300">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-full bg-indigo-800 flex items-center justify-center hover:bg-white hover:text-indigo-900 transition-all duration-300">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-full bg-indigo-800 flex items-center justify-center hover:bg-white hover:text-indigo-900 transition-all duration-300">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="text-xl font-bold mb-6">Quick Links</h3>
                <ul class="space-y-4">
                    <li><a href="/" class="text-indigo-200 hover:text-white transition-colors duration-200">Home</a></li>
                    <li><a href="/listings" class="text-indigo-200 hover:text-white transition-colors duration-200">Browse Jobs</a></li>
                    <li><a href="/listings/create" class="text-indigo-200 hover:text-white transition-colors duration-200">Post a Job</a></li>
                    <li><a href="/about" class="text-indigo-200 hover:text-white transition-colors duration-200">About Us</a></li>
                    <li><a href="/contact" class="text-indigo-200 hover:text-white transition-colors duration-200">Contact</a></li>
                </ul>
            </div>

            <!-- Support & Legal -->
            <div>
                <h3 class="text-xl font-bold mb-6">Support</h3>
                <ul class="space-y-4 text-indigo-200">
                    <li><a href="#" class="hover:text-white transition-colors duration-200">Help Center</a></li>
                    <li><a href="#" class="hover:text-white transition-colors duration-200">Privacy Policy</a></li>
                    <li><a href="#" class="hover:text-white transition-colors duration-200">Terms of Service</a></li>
                    <li><a href="#" class="hover:text-white transition-colors duration-200">Cookie Policy</a></li>
                </ul>
            </div>
        </div>

        <!-- Bottom Bar -->
        <div class="border-t border-indigo-800 pt-8 mt-8 flex flex-col md:flex-row justify-between items-center text-indigo-300 text-sm">
            <p>&copy; <?= date('Y') ?> JobSeek. Designed with precision for your career.</p>
            <div class="flex space-x-6 mt-4 md:mt-0">
                <span class="flex items-center gap-2"><i class="fas fa-globe"></i> English (US)</span>
                <span class="flex items-center gap-2"><i class="fas fa-shield-alt"></i> Secure Site</span>
            </div>
        </div>
    </div>
</footer>