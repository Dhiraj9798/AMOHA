<?php include 'header.php'; ?>

<main class="w-full bg-white pt-24">
    <!-- Half Hero Section -->
    <section class="w-full py-12 px-6 md:px-12 bg-gradient-to-br from-blue-50 via-indigo-50 to-blue-50 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-96 h-96 bg-gradient-to-br from-brand-red/10 to-transparent rounded-full -mr-48 -mt-48 blur-3xl"></div>
        <div class="max-w-5xl mx-auto relative z-10 text-center">
            <!-- Breadcrumb -->
            <div class="hero-breadcrumb flex items-center justify-center gap-2 text-sm text-gray-600 mb-4 font-medium">
                <a href="index.php" class="hover:text-brand-red transition-colors">Home</a>
                <i data-lucide="chevron-right" class="w-4 h-4 text-gray-400"></i>
                <span class="text-brand-black font-bold">Contact Us</span>
            </div>
            <!-- Description -->
            <p class="hero-description text-gray-600 text-lg max-w-2xl mx-auto">Get in touch with AMOHA Logistics for any inquiries about our services and partnerships.</p>
        </div>
    </section>

    <!-- Page Content -->
    <section class="w-full py-20 px-6 md:px-12">
        <div class="max-w-4xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <!-- Contact Information -->
                <div>
                    <h2 class="text-2xl md:text-3xl font-bold text-brand-black mb-8">Get in Touch</h2>

                    <!-- Phone -->
                    <div class="mb-8">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 rounded-full bg-red-50 flex items-center justify-center flex-shrink-0 mt-1">
                                <i data-lucide="phone" class="w-6 h-6 text-brand-red"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-brand-black mb-2">Phone</h3>
                                <a href="tel:+919296911346" class="text-gray-700 hover:text-brand-red transition-colors">+91 9296911346</a>
                            </div>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="mb-8">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 rounded-full bg-red-50 flex items-center justify-center flex-shrink-0 mt-1">
                                <i data-lucide="mail" class="w-6 h-6 text-brand-red"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-brand-black mb-2">Email</h3>
                                <a href="mailto:info@amohalogistics.com" class="text-gray-700 hover:text-brand-red transition-colors">info@amohalogistics.com</a>
                            </div>
                        </div>
                    </div>

                    <!-- Location -->
                    <div class="mb-8">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 rounded-full bg-red-50 flex items-center justify-center flex-shrink-0 mt-1">
                                <i data-lucide="map-pin" class="w-6 h-6 text-brand-red"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-brand-black mb-2">Location</h3>
                                <p class="text-gray-700">Jharkhand, India</p>
                            </div>
                        </div>
                    </div>

                    <!-- Hours -->
                    <div>
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 rounded-full bg-red-50 flex items-center justify-center flex-shrink-0 mt-1">
                                <i data-lucide="clock" class="w-6 h-6 text-brand-red"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-brand-black mb-2">Operating Hours</h3>
                                <p class="text-gray-700">Monday - Sunday<br>24/7 Service Available</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div>
                    <div class="bg-gray-50 rounded-lg p-8 border border-gray-200">
                        <h3 class="text-xl font-bold text-brand-black mb-6">Send us a Message</h3>
                        <form action="#" method="POST" class="space-y-4">
                            <!-- Name -->
                            <div>
                                <label class="block text-sm font-bold text-brand-black mb-2">Full Name</label>
                                <input type="text" name="name" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-brand-red transition-colors" placeholder="Your Name">
                            </div>

                            <!-- Email -->
                            <div>
                                <label class="block text-sm font-bold text-brand-black mb-2">Email Address</label>
                                <input type="email" name="email" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-brand-red transition-colors" placeholder="your@email.com">
                            </div>

                            <!-- Phone -->
                            <div>
                                <label class="block text-sm font-bold text-brand-black mb-2">Phone Number</label>
                                <input type="tel" name="phone" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-brand-red transition-colors" placeholder="+91">
                            </div>

                            <!-- Subject -->
                            <div>
                                <label class="block text-sm font-bold text-brand-black mb-2">Subject</label>
                                <input type="text" name="subject" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-brand-red transition-colors" placeholder="How can we help?">
                            </div>

                            <!-- Message -->
                            <div>
                                <label class="block text-sm font-bold text-brand-black mb-2">Message</label>
                                <textarea name="message" rows="5" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-brand-red transition-colors resize-none" placeholder="Your message..."></textarea>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="w-full bg-brand-red text-white py-3 rounded-lg font-bold uppercase tracking-wide hover:opacity-90 transition-opacity">
                                Send Message
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include 'footer.php'; ?>
