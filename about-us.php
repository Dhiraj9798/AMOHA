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
                <span class="text-brand-black font-bold">About Us</span>
            </div>
            <!-- Description -->
            <p class="hero-description text-gray-600 text-lg max-w-2xl mx-auto">Learn more about AMOHA Logistics and our commitment to excellence in transportation and logistics.</p>
        </div>
    </section>

    <!-- Page Content -->
    <section class="w-full py-20 px-6 md:px-12">
        <div class="max-w-5xl mx-auto">
            <!-- Introduction -->
            <div class="mb-16" data-animate="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold text-brand-black mb-4">About AMOHA Logistics</h2>
                <p class="text-gray-700 text-lg leading-relaxed">AMOHA Logistics was established in 2018 in Dhanbad, Jharkhand, and has grown into a reliable transportation and logistics service provider. With a focus on efficient cement transportation and material supply operations, we serve major industrial clients while building a strong network of partners.</p>
            </div>

            <!-- Company Story -->
            <div class="mb-16">
                <h3 class="text-2xl font-bold text-brand-black mb-8">Our Journey</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    
                    <!-- Card 1 -->
                    <div class="bg-gradient-to-br from-red-50 to-white p-6 rounded-lg border border-red-100 hover:shadow-md transition-shadow" data-animate="fade-up" data-delay="0.1">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 flex items-center justify-center bg-brand-red rounded-lg flex-shrink-0">
                                <i data-lucide="calendar" class="w-6 h-6 text-white"></i>
                            </div>
                            <div>
                                <h4 class="text-lg font-bold text-gray-900 mb-2">Established in 2018</h4>
                                <p class="text-gray-700 text-sm">Founded in Dhanbad, Jharkhand with vision to become a reliable transportation and logistics provider in industrial segments.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="bg-gradient-to-br from-red-50 to-white p-6 rounded-lg border border-red-100 hover:shadow-md transition-shadow" data-animate="fade-up" data-delay="0.2">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 flex items-center justify-center bg-brand-red rounded-lg flex-shrink-0">
                                <i data-lucide="briefcase" class="w-6 h-6 text-white"></i>
                            </div>
                            <div>
                                <h4 class="text-lg font-bold text-gray-900 mb-2">Growth & Trust</h4>
                                <p class="text-gray-700 text-sm">Successfully partnered with leading companies like JSPL, UltraTech Cement, Rungta, and Dalmia Cement for transportation and supply chain needs.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="bg-gradient-to-br from-red-50 to-white p-6 rounded-lg border border-red-100 hover:shadow-md transition-shadow" data-animate="fade-up" data-delay="0.3">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 flex items-center justify-center bg-brand-red rounded-lg flex-shrink-0">
                                <i data-lucide="network" class="w-6 h-6 text-white"></i>
                            </div>
                            <div>
                                <h4 class="text-lg font-bold text-gray-900 mb-2">Strong Network</h4>
                                <p class="text-gray-700 text-sm">Building strong coordination with truck owners, drivers, and vendors to ensure safe, timely, and organized delivery of materials.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Card 4 -->
                    <div class="bg-gradient-to-br from-red-50 to-white p-6 rounded-lg border border-red-100 hover:shadow-md transition-shadow" data-animate="fade-up" data-delay="0.4">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 flex items-center justify-center bg-brand-red rounded-lg flex-shrink-0">
                                <i data-lucide="target" class="w-6 h-6 text-white"></i>
                            </div>
                            <div>
                                <h4 class="text-lg font-bold text-gray-900 mb-2">Our Commitment</h4>
                                <p class="text-gray-700 text-sm">Committed to professionalism, transparency, and operational efficiency. Strengthening logistics network while building long-term partnerships.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Core Values -->
            <div class="mb-16 bg-gradient-to-r from-blue-50 to-indigo-50 p-8 rounded-lg border border-blue-100">
                <h3 class="text-2xl font-bold text-brand-black mb-8">Our Core Values</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="text-center" data-animate="fade-up">
                        <div class="w-14 h-14 flex items-center justify-center bg-white rounded-lg mx-auto mb-4 shadow-sm">
                            <i data-lucide="check-circle-2" class="w-7 h-7 text-brand-red"></i>
                        </div>
                        <h4 class="font-bold text-gray-900 mb-2">Reliable Delivery</h4>
                        <p class="text-sm text-gray-700">Consistent, on-time delivery through strong coordination between drivers, vendors, and transport operations.</p>
                    </div>
                    <div class="text-center" data-animate="fade-up" data-delay="0.1">
                        <div class="w-14 h-14 flex items-center justify-center bg-white rounded-lg mx-auto mb-4 shadow-sm">
                            <i data-lucide="wallet" class="w-7 h-7 text-brand-red"></i>
                        </div>
                        <h4 class="font-bold text-gray-900 mb-2">Prompt Vendor Payments</h4>
                        <p class="text-sm text-gray-700">Timely payments ensuring truck owners and drivers do not face payment issues.</p>
                    </div>
                    <div class="text-center" data-animate="fade-up" data-delay="0.2">
                        <div class="w-14 h-14 flex items-center justify-center bg-white rounded-lg mx-auto mb-4 shadow-sm">
                            <i data-lucide="shield" class="w-7 h-7 text-brand-red"></i>
                        </div>
                        <h4 class="font-bold text-gray-900 mb-2">Driver Safety First</h4>
                        <p class="text-sm text-gray-700">Zero-tolerance approach to safety with proper management of operations and reduced delays.</p>
                    </div>
                </div>
            </div>

            <!-- Highlights -->
            <div class="mb-16">
                <h3 class="text-2xl font-bold text-brand-black mb-8">What Defines AMOHA</h3>
                <div class="space-y-4">
                    <div class="flex items-start gap-4" data-animate="fade-up">
                        <div class="w-6 h-6 flex items-center justify-center bg-brand-red text-white rounded-full flex-shrink-0 mt-1 text-sm font-bold">1</div>
                        <div>
                            <h4 class="font-bold text-gray-900">Solving Transport Problems</h4>
                            <p class="text-gray-700 text-sm mt-1">AMOHA Logistics focuses on solving common transport problems and keeping operations running smoothly.</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4" data-animate="fade-up" data-delay="0.1">
                        <div class="w-6 h-6 flex items-center justify-center bg-brand-red text-white rounded-full flex-shrink-0 mt-1 text-sm font-bold">2</div>
                        <div>
                            <h4 class="font-bold text-gray-900">Expansion & Growth</h4>
                            <p class="text-gray-700 text-sm mt-1">Currently operating in Jharkhand with active cement transportation, expanding to Bihar and West Bengal by end of 2026.</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4" data-animate="fade-up" data-delay="0.2">
                        <div class="w-6 h-6 flex items-center justify-center bg-brand-red text-white rounded-full flex-shrink-0 mt-1 text-sm font-bold">3</div>
                        <div>
                            <h4 class="font-bold text-gray-900">Long-Term Partnerships</h4>
                            <p class="text-gray-700 text-sm mt-1">Building strong, long-term partnerships with truck owners, drivers, and logistics professionals.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CTA Button -->
            <div class="text-center" data-animate="fade-up">
                <a href="contact.php" class="inline-block px-8 py-3 bg-brand-red text-white font-bold rounded-lg hover:bg-brand-black transition-colors">
                    Partner with AMOHA Today
                </a>
            </div>
        </div>
    </section>
</main>

<?php include 'footer.php'; ?>
