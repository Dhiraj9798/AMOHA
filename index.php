<?php include 'header.php'; ?>

    <!-- Hero Area -->
    <main class="relative w-full h-[72vh] sm:h-screen min-h-[480px] sm:min-h-[600px] flex flex-col px-6 md:px-12 pt-24 md:pt-28 pb-8 z-10 overflow-hidden mt-0">
        <div class="absolute inset-0 bg-black w-full h-full -z-20"></div>
        <img
            src="images/hero.png"
            class="absolute inset-0 w-full h-full object-cover object-[30%_center] sm:object-center -z-10 opacity-70"
            alt="AMOHA Logistics hero background"
        >

        <div class="max-w-7xl mx-auto w-full flex-1 flex flex-col relative z-10 basis-full">
            <div class="flex-1 flex flex-col justify-start pt-4">
                <div class="text-white drop-shadow-2xl" data-animate="fade-up">
                    <h1 class="text-3xl md:text-5xl lg:text-[64px] font-bold uppercase tracking-tighter leading-[1.1] text-left flex flex-wrap items-center gap-2 md:gap-3">
                        <span class="inline">Reliable</span>
                        <span class="whitespace-nowrap inline-block">Transport</span>
                        <span class="inline">& Logistics</span>
                    </h1>

                    <div class="mt-6 flex flex-col sm:flex-row items-start gap-3 max-w-lg">
                        <a href="#services" class="bg-brand-red text-white px-6 py-3 text-xs md:text-sm font-bold uppercase tracking-wide hover:opacity-90 transition-opacity shadow-lg text-center inline-block">
                            Explore Services
                        </a>
                        <a href="#contact" class="bg-white text-brand-black px-6 py-3 text-xs md:text-sm font-bold uppercase tracking-wide hover:bg-gray-100 transition-colors shadow-lg text-center inline-block">
                            Partner With Us
                        </a>
                    </div>
                </div>
            </div>

            <div class="w-full sm:w-max mx-auto md:ml-auto md:mr-0 mt-8 shrink-0" data-animate="fade-up" data-delay="0.2">
                <div class="bg-white/95 rounded-lg shadow-2xl p-4 flex flex-col sm:flex-row items-center justify-between gap-5 border border-white/50 backdrop-blur-sm relative left-0">
                    <div class="text-center sm:text-left">
                        <h3 class="text-sm md:text-base font-bold tracking-tight mb-0.5 text-brand-black">Trip-Based Vehicle Earnings</h3>
                        <p class="text-xs text-gray-600 font-medium">Earn up to ₹95k/month with AMOHA.</p>
                    </div>
                    <a href="transport-partner-program.php" class="bg-brand-black text-white px-5 py-2 font-bold uppercase tracking-wider text-xs hover:bg-black transition-colors shadow-md rounded flex justify-center items-center gap-1.5 whitespace-nowrap w-full sm:w-auto">
                        <i data-lucide="truck" class="w-4 h-4" stroke-width="2.5"></i> Details
                    </a>
                </div>
            </div>
        </div>
    </main>

    <!-- About Section -->
    <section id="about" class="w-full bg-white relative py-20 px-6 md:px-12 overflow-hidden">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-center">
            <div class="relative w-full" data-animate="fade-left">
                <div class="absolute top-6 -left-6 w-full h-full border-2 border-gray-100 rounded-2xl -z-10"></div>
                <img src="images/drivers.jpeg" alt="AMOHA truck and cement transport" class="section-image relative z-10 rounded-2xl shadow-2xl object-cover w-full h-[380px] lg:h-[500px]">
            </div>
            <div data-animate="fade-right">
                <div class="inline-block bg-gray-100 px-3 py-1 rounded text-xs font-bold uppercase tracking-widest text-brand-black mb-4">About AMOHA Logistics</div>
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold uppercase tracking-tight mb-8 text-brand-black leading-tight">About AMOHA Logistics</h2>

                <p class="text-gray-600 mb-6 text-base leading-relaxed font-medium">
                    AMOHA Logistics was established in 2018 in Dhanbad, Jharkhand, and has grown into a reliable transportation and logistics service provider. The company focuses on efficient cement transportation and material supply operations across its working regions.
                </p>
                <p class="text-gray-600 mb-6 text-base leading-relaxed font-medium">
                    AMOHA Logistics has successfully worked with leading companies such as <strong>JSPL, UltraTech Cement, Rungta, and Dalmia Cement</strong>, supporting their transportation and supply chain requirements. Through strong coordination with truck owners, drivers, and vendors, the company ensures safe, timely, and organized delivery of materials.
                </p>
                <p class="text-gray-600 text-base leading-relaxed font-medium">
                    With a commitment to professionalism, transparency, and operational efficiency, AMOHA Logistics continues to strengthen its logistics network while building long-term partnerships in the transportation industry.
                </p>
            </div>
        </div>
    </section>

    <!-- Services & Operations -->
    <section id="services" class="w-full bg-gray-50 relative py-14 px-6 md:px-12 border-y border-gray-100">
        <div class="max-w-5xl mx-auto">
            <!-- Section Header -->
            <div class="text-center mb-10" data-animate="fade-up">
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold uppercase tracking-tight text-brand-black mb-2">
                    Services & Operations
                </h2>
                <p class="text-sm md:text-base font-semibold text-gray-700">
                    Reliable logistics services and organized transportation operations
                </p>
            </div>

            <!-- Services Accordion Container -->
            <div class="space-y-4 mt-10">
                
                <!-- Service 1 -->
                <div class="service-accordion bg-white rounded-lg border border-gray-200 overflow-hidden">
                    <button class="service-accordion-header w-full flex items-center justify-between p-4 hover:bg-gray-50 transition-colors" data-service="1">
                        <div class="flex items-center gap-3 text-left flex-1">
                            <div class="w-10 h-10 flex items-center justify-center bg-red-50 rounded-lg flex-shrink-0">
                                <i data-lucide="truck" class="w-5 h-5 text-brand-red"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900">Transportation Services</h3>
                                <p class="text-xs text-gray-600">Reliable transportation across Jharkhand</p>
                            </div>
                        </div>
                        <span class="text-2xl text-brand-red font-bold flex-shrink-0" style="min-width: 30px; text-align: center;">+</span>
                    </button>
                    <div class="service-accordion-content hidden bg-gray-50 px-4 pb-4 border-t border-gray-200">
                        <p class="text-sm text-gray-700 mb-3">
                            AMOHA Logistics provides reliable transportation and logistics services across Jharkhand, supporting cement and heavy material transportation operations. Our coordinated logistics system ensures materials are transported safely and delivered on schedule.
                        </p>
                        <a href="transportation-services.php" class="inline-block px-4 py-2 text-sm font-bold text-white bg-brand-red rounded hover:bg-brand-black transition-colors">Go to Service</a>
                    </div>
                </div>

                <!-- Service 2 -->
                <div class="service-accordion bg-white rounded-lg border border-gray-200 overflow-hidden">
                    <button class="service-accordion-header w-full flex items-center justify-between p-4 hover:bg-gray-50 transition-colors" data-service="2">
                        <div class="flex items-center gap-3 text-left flex-1">
                            <div class="w-10 h-10 flex items-center justify-center bg-red-50 rounded-lg flex-shrink-0">
                                <i data-lucide="building" class="w-5 h-5 text-brand-red"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900">Industrial Logistics</h3>
                                <p class="text-xs text-gray-600">Support for JSPL, UltraTech, Rungta, Dalmia</p>
                            </div>
                        </div>
                        <span class="text-2xl text-brand-red font-bold flex-shrink-0" style="min-width: 30px; text-align: center;">+</span>
                    </button>
                    <div class="service-accordion-content hidden bg-gray-50 px-4 pb-4 border-t border-gray-200">
                        <p class="text-sm text-gray-700 mb-3">
                            The company works with major industrial partners including JSPL, UltraTech Cement, Rungta, and Dalmia Cement. Through organized transportation coordination and vendor management, AMOHA Logistics supports supply chain requirements.
                        </p>
                        <a href="logistics-support.php" class="inline-block px-4 py-2 text-sm font-bold text-white bg-brand-red rounded hover:bg-brand-black transition-colors">Go to Service</a>
                    </div>
                </div>

                <!-- Service 3 -->
                <div class="service-accordion bg-white rounded-lg border border-gray-200 overflow-hidden">
                    <button class="service-accordion-header w-full flex items-center justify-between p-4 hover:bg-gray-50 transition-colors" data-service="3">
                        <div class="flex items-center gap-3 text-left flex-1">
                            <div class="w-10 h-10 flex items-center justify-center bg-red-50 rounded-lg flex-shrink-0">
                                <i data-lucide="layers" class="w-5 h-5 text-brand-red"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900">Truck Fleet Coordination</h3>
                                <p class="text-xs text-gray-600">12-wheel & 14-wheel truck management</p>
                            </div>
                        </div>
                        <span class="text-2xl text-brand-red font-bold flex-shrink-0" style="min-width: 30px; text-align: center;">+</span>
                    </button>
                    <div class="service-accordion-content hidden bg-gray-50 px-4 pb-4 border-t border-gray-200">
                        <p class="text-sm text-gray-700 mb-3">
                            Our logistics operations include coordination and management of 12-wheel and 14-wheel trucks used for transporting cement and construction materials. Vehicles are scheduled through organized planning to maintain smooth operations.
                        </p>
                        <a href="truck-operations.php" class="inline-block px-4 py-2 text-sm font-bold text-white bg-brand-red rounded hover:bg-brand-black transition-colors">Go to Service</a>
                    </div>
                </div>

                <!-- Service 4 -->
                <div class="service-accordion bg-white rounded-lg border border-gray-200 overflow-hidden">
                    <button class="service-accordion-header w-full flex items-center justify-between p-4 hover:bg-gray-50 transition-colors" data-service="4">
                        <div class="flex items-center gap-3 text-left flex-1">
                            <div class="w-10 h-10 flex items-center justify-center bg-red-50 rounded-lg flex-shrink-0">
                                <i data-lucide="package-check" class="w-5 h-5 text-brand-red"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900">Loading & Delivery</h3>
                                <p class="text-xs text-gray-600">Efficient warehouse & delivery operations</p>
                            </div>
                        </div>
                        <span class="text-2xl text-brand-red font-bold flex-shrink-0" style="min-width: 30px; text-align: center;">+</span>
                    </button>
                    <div class="service-accordion-content hidden bg-gray-50 px-4 pb-4 border-t border-gray-200">
                        <p class="text-sm text-gray-700 mb-3">
                            AMOHA Logistics ensures efficient loading, unloading, and delivery operations through proper coordination between warehouse teams, drivers, and vendors. This organized workflow reduces delays and ensures safe delivery.
                        </p>
                        <a href="loading-delivery.php" class="inline-block px-4 py-2 text-sm font-bold text-white bg-brand-red rounded hover:bg-brand-black transition-colors">Go to Service</a>
                    </div>
                </div>

                <!-- Service 5 -->
                <div class="service-accordion bg-white rounded-lg border border-gray-200 overflow-hidden">
                    <button class="service-accordion-header w-full flex items-center justify-between p-4 hover:bg-gray-50 transition-colors" data-service="5">
                        <div class="flex items-center gap-3 text-left flex-1">
                            <div class="w-10 h-10 flex items-center justify-center bg-red-50 rounded-lg flex-shrink-0">
                                <i data-lucide="handshake" class="w-5 h-5 text-brand-red"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900">Partner Network</h3>
                                <p class="text-xs text-gray-600">Growing network of truck owners & drivers</p>
                            </div>
                        </div>
                        <span class="text-2xl text-brand-red font-bold flex-shrink-0" style="min-width: 30px; text-align: center;">+</span>
                    </button>
                    <div class="service-accordion-content hidden bg-gray-50 px-4 pb-4 border-t border-gray-200">
                        <p class="text-sm text-gray-700 mb-3">
                            The company maintains a growing network of truck owners, drivers, and logistics partners who contribute to transportation operations. Our trip-based transport system ensures reliable work opportunities and consistent logistics coordination.
                        </p>
                        <a href="transport-partner-program.php" class="inline-block px-4 py-2 text-sm font-bold text-white bg-brand-red rounded hover:bg-brand-black transition-colors">Go to Service</a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Expansion & Network -->
    <section id="expansion" class="w-full relative py-24 px-6 md:px-12 overflow-hidden">
        <div class="absolute inset-0 z-0" data-parallax="18">
            <img src="images/truckloding.png" class="w-full h-full object-cover" alt="Truck loading yard background">
            <div class="absolute inset-0 bg-black/60"></div>
        </div>
        <div class="max-w-4xl mx-auto relative z-10 text-center text-white">
            <div class="inline-block bg-white/10 px-3 py-1 rounded text-xs font-bold uppercase tracking-widest mb-4 border border-white/20" data-animate="fade-up">Going the Distance</div>
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold uppercase tracking-tight mb-10" data-animate="fade-up" data-delay="0.1">Expansion & Network</h2>

            <div class="space-y-6 max-w-3xl mx-auto">
                <p class="text-lg text-gray-200 font-medium leading-relaxed" data-animate="fade-up" data-delay="0.2">Currently operating in Jharkhand with active cement transportation services.</p>
                <p class="text-lg text-gray-200 font-medium leading-relaxed" data-animate="fade-up" data-delay="0.3">Expanding operations to Bihar and West Bengal by the end of 2026.</p>
                <p class="text-lg text-gray-200 font-medium leading-relaxed" data-animate="fade-up" data-delay="0.4">Building a strong network of truck owners, drivers, and logistics partners.</p>
            </div>
        </div>
    </section>

    <!-- Vendor & Driver Benefits Section -->
    <section id="vendors" class="w-full bg-white relative py-16 px-6 md:px-12 overflow-hidden">
        <div class="max-w-7xl mx-auto">
            <!-- Section Header -->
            <div class="text-center mb-6" data-animate="fade-up">
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold uppercase tracking-tight text-brand-black mb-2">
                    Vendor & Driver Benefits
                </h2>
                <p class="text-base md:text-lg font-semibold text-gray-700">
                    Reliable Income and Operational Support for Truck Owners and Drivers
                </p>
            </div>

            <!-- Highlight Glass Box -->
            <div class="max-w-2xl mx-auto mb-16" data-animate="fade-up" data-delay="0.1">
                <div class="glass-box p-4 md:p-6">
                    <p class="text-sm md:text-base font-bold text-gray-900 mb-2">
                        Trip-based payment system with stable work opportunities for truck owners and drivers.
                    </p>
                    <p class="text-xs md:text-sm text-gray-800 leading-relaxed">
                        AMOHA Logistics provides organized trip planning and regular transportation work to maintain predictable monthly income.
                    </p>
                </div>
            </div>

            <!-- Sub Section 1: 12-Wheel Truck Income -->
            <div class="mb-14">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-center">
                    <!-- Left: Image -->
                    <div class="relative h-[200px] md:h-[260px] rounded-lg overflow-hidden shadow-md" data-animate="fade-left">
                        <img 
                            src="images/12wheels.jpeg" 
                            alt="12-Wheel Truck" 
                            class="section-image w-full h-full object-cover"
                        >
                    </div>

                    <!-- Right: Text -->
                    <div data-animate="fade-right">
                        <h3 class="text-xl md:text-2xl font-bold text-brand-black mb-3 tracking-tight">
                            12-Wheel Trucks (25 MT Capacity)
                        </h3>
                        <p class="text-sm md:text-base leading-relaxed font-medium text-gray-700">
                            These trucks can generate earnings of approximately <span class="text-brand-red font-bold">₹70,000 per month</span> depending on trip frequency and transportation schedules. AMOHA Logistics ensures regular trip allocation to maintain consistent work opportunities for truck owners.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Sub Section 2: 14-Wheel Truck Income -->
            <div class="mb-14">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-center">
                    <!-- Left: Text -->
                    <div class="order-2 lg:order-1" data-animate="fade-left">
                        <h3 class="text-xl md:text-2xl font-bold text-brand-black mb-3 tracking-tight">
                            14-Wheel Trucks (30 MT Capacity)
                        </h3>
                        <p class="text-sm md:text-base leading-relaxed font-medium text-gray-700">
                            14-wheel trucks used for heavy material transportation can earn approximately <span class="text-brand-red font-bold">₹95,000 per month</span> through continuous trip assignments and organized logistics coordination provided by AMOHA Logistics.
                        </p>
                    </div>

                    <!-- Right: Image -->
                    <div class="relative h-[200px] md:h-[260px] rounded-lg overflow-hidden shadow-md order-1 lg:order-2" data-animate="fade-right">
                        <img 
                            src="images/14wheel.jpeg" 
                            alt="14-Wheel Truck" 
                            class="section-image w-full h-full object-cover"
                        >
                    </div>
                </div>
            </div>

            <!-- Sub Section 3: Driver & Operational Support -->
            <div>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-start">
                    <!-- Left: Driver Image -->
                    <div class="relative h-[200px] md:h-[280px] rounded-lg overflow-hidden shadow-md" data-animate="fade-left">
                        <img 
                            src="images/driverfrontsidephoto.png" 
                            alt="Driver Support" 
                            class="section-image w-full h-full object-cover"
                        >
                    </div>

                    <!-- Right: Bullet Points -->
                    <div data-animate="fade-right">
                        <h3 class="text-xl md:text-2xl font-bold text-brand-black mb-4 tracking-tight">
                            Operational Support for Drivers
                        </h3>

                        <div class="space-y-3 mb-6">
                            <div class="benefit-bullet" data-animate="fade-up" data-delay="0.2">
                                <span class="bullet">•</span>
                                <p class="text-gray-700 font-medium">Company covers driver salary</p>
                            </div>

                            <div class="benefit-bullet" data-animate="fade-up" data-delay="0.3">
                                <span class="bullet">•</span>
                                <p class="text-gray-700 font-medium">Diesel fuel expenses are handled by the company</p>
                            </div>

                            <div class="benefit-bullet" data-animate="fade-up" data-delay="0.4">
                                <span class="bullet">•</span>
                                <p class="text-gray-700 font-medium">Loading and unloading operations are managed by our logistics team</p>
                            </div>

                            <div class="benefit-bullet" data-animate="fade-up" data-delay="0.5">
                                <span class="bullet">•</span>
                                <p class="text-gray-700 font-medium">Vehicle owners only pay toll charges (approx. ₹13,000)</p>
                            </div>

                            <div class="benefit-bullet" data-animate="fade-up" data-delay="0.6">
                                <span class="bullet">•</span>
                                <p class="text-gray-700 font-medium">Operations currently available across Jharkhand and Bihar</p>
                            </div>

                            <div class="benefit-bullet" data-animate="fade-up" data-delay="0.7">
                                <span class="bullet">•</span>
                                <p class="text-gray-700 font-medium">Truck owners can attach their vehicles with AMOHA Logistics</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-2">
                            <p class="text-sm font-bold uppercase tracking-widest text-gray-600">Contact:</p>
                            <a href="tel:+919296911346" class="text-2xl md:text-3xl font-black text-brand-red hover:text-brand-black transition-colors">
                                9296911346
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose AMOHA Logistics -->
    <section id="whyus" class="w-full bg-gray-50 border-t border-gray-100 relative py-24 px-6 md:px-12 overflow-hidden">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-14 items-center">
            <div class="relative w-full h-[220px] md:h-[380px] lg:h-[560px]" data-animate="fade-left">
                <img src="images/truct.jpeg" class="section-image absolute inset-0 w-full h-full object-cover rounded-3xl shadow-xl" alt="AMOHA transport operations">
            </div>

            <div data-animate="fade-right">
                <div class="inline-block bg-white border border-gray-200 px-3 py-1 rounded text-xs font-bold uppercase tracking-widest text-brand-black mb-4 shadow-sm">Excellence Guaranteed</div>
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold uppercase tracking-tight text-brand-black mb-8 leading-tight">Why Choose AMOHA Logistics</h2>

                <div class="space-y-4">
                    <div class="why-point" data-animate="fade-up" data-delay="0.15">
                        <i data-lucide="check-circle" class="w-5 h-5 text-brand-red shrink-0 mt-1"></i>
                        <p>Better coordination between drivers, vendors and operations.</p>
                    </div>
                    <div class="why-point" data-animate="fade-up" data-delay="0.3">
                        <i data-lucide="check-circle" class="w-5 h-5 text-brand-red shrink-0 mt-1"></i>
                        <p>Proper management of loading and unloading processes.</p>
                    </div>
                    <div class="why-point" data-animate="fade-up" data-delay="0.45">
                        <i data-lucide="check-circle" class="w-5 h-5 text-brand-red shrink-0 mt-1"></i>
                        <p>Ensures timely payments for truck owners and drivers.</p>
                    </div>
                    <div class="why-point" data-animate="fade-up" data-delay="0.6">
                        <i data-lucide="check-circle" class="w-5 h-5 text-brand-red shrink-0 mt-1"></i>
                        <p>Reduces trip delays and idle truck time.</p>
                    </div>
                    <div class="why-point" data-animate="fade-up" data-delay="0.75">
                        <i data-lucide="check-circle" class="w-5 h-5 text-brand-red shrink-0 mt-1"></i>
                        <p>Focus on solving common transport problems and improving logistics workflow.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact & Partnership -->
    <section id="contact" class="w-full bg-white py-24 px-6 md:px-12 border-t border-gray-100">
        <div class="max-w-3xl mx-auto text-center">
            <div class="inline-block bg-gray-100 border border-gray-200 px-3 py-1 rounded text-xs font-bold uppercase tracking-widest text-brand-black mb-4" data-animate="fade-up">Connect With AMOHA</div>
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold uppercase tracking-tight text-brand-black mb-6" data-animate="fade-up" data-delay="0.1">Contact & Partnership</h2>
            <p class="text-gray-700 font-medium leading-relaxed mb-3" data-animate="fade-up" data-delay="0.2">Join our growing logistics network and build reliable partnerships with us.</p>
            <p class="text-gray-700 font-medium leading-relaxed mb-8" data-animate="fade-up" data-delay="0.3">We provide transparent operations, flexible payment terms and strong support for our drivers and vendors.</p>

            <div class="text-sm md:text-base text-gray-700 font-bold mb-6" data-animate="fade-up" data-delay="0.4">
                <p>Phone: +91 9296911346</p>
                <p>Email: info@amohalogistics.com</p>
            </div>

            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="tel:+919296911346" class="primary-gradient-btn min-w-[170px]" data-animate="scale-in" data-delay="0.45">Call Now</a>
                <a href="mailto:info@amohalogistics.com" class="border border-brand-black text-brand-black px-8 py-3 rounded-md text-sm font-bold uppercase tracking-wider hover:bg-brand-black hover:text-white transition-all" data-animate="scale-in" data-delay="0.55">Send Email</a>
            </div>
        </div>
    </section>

    <!-- Customer Reviews -->
    <section id="reviews" class="w-full bg-white py-20 px-6 md:px-12">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-16">
                <div class="inline-block bg-red-50 border border-brand-red px-3 py-1 rounded text-xs font-bold uppercase tracking-widest text-brand-red mb-4" data-animate="fade-up">Customer Testimonials</div>
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold uppercase tracking-tight text-brand-black mb-4" data-animate="fade-up" data-delay="0.1">What Our Customers Say</h2>
                <p class="text-gray-600 font-medium max-w-2xl mx-auto" data-animate="fade-up" data-delay="0.2">Trusted by hundreds of businesses across India for reliable, efficient logistics solutions</p>
            </div>

            <!-- Reviews Carousel -->
            <div class="relative group">
                <div id="reviews-container" class="flex overflow-x-auto gap-4 pb-4" style="scroll-snap-type:x mandatory;-webkit-overflow-scrolling:touch;scrollbar-width:none;-ms-overflow-style:none;">
                    <!-- Review 1 -->
                    <div class="flex-shrink-0 w-[88vw] sm:w-80 review-card" style="scroll-snap-align:start;" data-animate="fade-up" data-delay="0.1">
                        <div class="review-glass-card h-full p-6 rounded-xl backdrop-blur-sm border transition-all duration-300 hover:-translate-y-1.5">
                            <div class="flex items-center gap-4 mb-4">
                                <div class="w-12 h-12 rounded-full bg-gradient-to-br from-brand-red to-red-700 flex items-center justify-center flex-shrink-0">
                                    <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                                </div>
                                <div>
                                    <p class="font-bold text-sm text-brand-black">Rakesh Kumar</p>
                                    <p class="text-xs text-gray-500">Transport Manager</p>
                                </div>
                            </div>
                            <p class="text-sm text-gray-700 mb-4">AMOHA Logistics has completely transformed our supply chain operations. Their reliability and professionalism are unmatched. Highly recommended!</p>
                            <div class="flex items-center gap-2">
                                <div class="flex gap-1">
                                    <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2l-2.81 6.63L2 9.24l5.46 4.73L5.82 21z"/></svg>
                                    <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2l-2.81 6.63L2 9.24l5.46 4.73L5.82 21z"/></svg>
                                    <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2l-2.81 6.63L2 9.24l5.46 4.73L5.82 21z"/></svg>
                                    <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2l-2.81 6.63L2 9.24l5.46 4.73L5.82 21z"/></svg>
                                    <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2l-2.81 6.63L2 9.24l5.46 4.73L5.82 21z"/></svg>
                                </div>
                                <span class="text-xs font-bold text-gray-600">8.8/10</span>
                            </div>
                        </div>
                    </div>

                    <!-- Review 2 -->
                    <div class="flex-shrink-0 w-[88vw] sm:w-80 review-card" style="scroll-snap-align:start;" data-animate="fade-up" data-delay="0.2">
                        <div class="review-glass-card h-full p-6 rounded-xl backdrop-blur-sm border transition-all duration-300 hover:-translate-y-1.5">
                            <div class="flex items-center gap-4 mb-4">
                                <div class="w-12 h-12 rounded-full bg-gradient-to-br from-purple-500 to-purple-700 flex items-center justify-center flex-shrink-0">
                                    <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                                </div>
                                <div>
                                    <p class="font-bold text-sm text-brand-black">Sunil Yadav</p>
                                    <p class="text-xs text-gray-500">Business Owner</p>
                                </div>
                            </div>
                            <p class="text-sm text-gray-700 mb-4">Outstanding service quality! The drivers are professional and punctual. Our delivery times have improved significantly. Best investment ever!</p>
                            <div class="flex items-center gap-2">
                                <div class="flex gap-1">
                                    <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2l-2.81 6.63L2 9.24l5.46 4.73L5.82 21z"/></svg>
                                    <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2l-2.81 6.63L2 9.24l5.46 4.73L5.82 21z"/></svg>
                                    <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2l-2.81 6.63L2 9.24l5.46 4.73L5.82 21z"/></svg>
                                    <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2l-2.81 6.63L2 9.24l5.46 4.73L5.82 21z"/></svg>
                                    <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2l-2.81 6.63L2 9.24l5.46 4.73L5.82 21z"/></svg>
                                </div>
                                <span class="text-xs font-bold text-gray-600">9/10</span>
                            </div>
                        </div>
                    </div>

                    <!-- Review 3 -->
                    <div class="flex-shrink-0 w-[88vw] sm:w-80 review-card" style="scroll-snap-align:start;" data-animate="fade-up" data-delay="0.3">
                        <div class="review-glass-card h-full p-6 rounded-xl backdrop-blur-sm border transition-all duration-300 hover:-translate-y-1.5">
                            <div class="flex items-center gap-4 mb-4">
                                <div class="w-12 h-12 rounded-full bg-gradient-to-br from-blue-500 to-blue-700 flex items-center justify-center flex-shrink-0">
                                    <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                                </div>
                                <div>
                                    <p class="font-bold text-sm text-brand-black">Ajay Singh</p>
                                    <p class="text-xs text-gray-500">Fleet Manager</p>
                                </div>
                            </div>
                            <p class="text-sm text-gray-700 mb-4">AMOHA's customer support team is exceptional. They resolve issues quickly and their tracking system is very accurate. Couldn't ask for more!</p>
                            <div class="flex items-center gap-2">
                                <div class="flex gap-1">
                                    <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2l-2.81 6.63L2 9.24l5.46 4.73L5.82 21z"/></svg>
                                    <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2l-2.81 6.63L2 9.24l5.46 4.73L5.82 21z"/></svg>
                                    <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2l-2.81 6.63L2 9.24l5.46 4.73L5.82 21z"/></svg>
                                    <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2l-2.81 6.63L2 9.24l5.46 4.73L5.82 21z"/></svg>
                                    <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2l-2.81 6.63L2 9.24l5.46 4.73L5.82 21z"/></svg>
                                </div>
                                <span class="text-xs font-bold text-gray-600">8.7/10</span>
                            </div>
                        </div>
                    </div>

                    <!-- Review 4 -->
                    <div class="flex-shrink-0 w-[88vw] sm:w-80 review-card" style="scroll-snap-align:start;" data-animate="fade-up" data-delay="0.4">
                        <div class="review-glass-card h-full p-6 rounded-xl backdrop-blur-sm border transition-all duration-300 hover:-translate-y-1.5">
                            <div class="flex items-center gap-4 mb-4">
                                <div class="w-12 h-12 rounded-full bg-gradient-to-br from-green-500 to-green-700 flex items-center justify-center flex-shrink-0">
                                    <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                                </div>
                                <div>
                                    <p class="font-bold text-sm text-brand-black">Mahesh Verma</p>
                                    <p class="text-xs text-gray-500">Distributor</p>
                                </div>
                            </div>
                            <p class="text-sm text-gray-700 mb-4">Cost-effective and reliable! AMOHA Logistics has helped us expand to new cities without worrying about logistics. Worth every penny!</p>
                            <div class="flex items-center gap-2">
                                <div class="flex gap-1">
                                    <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2l-2.81 6.63L2 9.24l5.46 4.73L5.82 21z"/></svg>
                                    <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2l-2.81 6.63L2 9.24l5.46 4.73L5.82 21z"/></svg>
                                    <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2l-2.81 6.63L2 9.24l5.46 4.73L5.82 21z"/></svg>
                                    <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2l-2.81 6.63L2 9.24l5.46 4.73L5.82 21z"/></svg>
                                    <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2l-2.81 6.63L2 9.24l5.46 4.73L5.82 21z"/></svg>
                                </div>
                                <span class="text-xs font-bold text-gray-600">8.5/10</span>
                            </div>
                        </div>
                    </div>

                    <!-- Review 5 -->
                    <div class="flex-shrink-0 w-[88vw] sm:w-80 review-card" style="scroll-snap-align:start;" data-animate="fade-up" data-delay="0.5">
                        <div class="review-glass-card h-full p-6 rounded-xl backdrop-blur-sm border transition-all duration-300 hover:-translate-y-1.5">
                            <div class="flex items-center gap-4 mb-4">
                                <div class="w-12 h-12 rounded-full bg-gradient-to-br from-orange-500 to-orange-700 flex items-center justify-center flex-shrink-0">
                                    <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                                </div>
                                <div>
                                    <p class="font-bold text-sm text-brand-black">Ravi Sharma</p>
                                    <p class="text-xs text-gray-500">Warehouse Owner</p>
                                </div>
                            </div>
                            <p class="text-sm text-gray-700 mb-4">Their logistics expertise and quick response times have saved us thousands. The team is always ready to support our growing business needs.</p>
                            <div class="flex items-center gap-2">
                                <div class="flex gap-1">
                                    <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2l-2.81 6.63L2 9.24l5.46 4.73L5.82 21z"/></svg>
                                    <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2l-2.81 6.63L2 9.24l5.46 4.73L5.82 21z"/></svg>
                                    <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2l-2.81 6.63L2 9.24l5.46 4.73L5.82 21z"/></svg>
                                    <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2l-2.81 6.63L2 9.24l5.46 4.73L5.82 21z"/></svg>
                                    <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2l-2.81 6.63L2 9.24l5.46 4.73L5.82 21z"/></svg>
                                </div>
                                <span class="text-xs font-bold text-gray-600">9.2/10</span>
                            </div>
                        </div>
                    </div>

                    <!-- Review 6 -->
                    <div class="flex-shrink-0 w-[88vw] sm:w-80 review-card" style="scroll-snap-align:start;" data-animate="fade-up" data-delay="0.6">
                        <div class="review-glass-card h-full p-6 rounded-xl backdrop-blur-sm border transition-all duration-300 hover:-translate-y-1.5">
                            <div class="flex items-center gap-4 mb-4">
                                <div class="w-12 h-12 rounded-full bg-gradient-to-br from-pink-500 to-pink-700 flex items-center justify-center flex-shrink-0">
                                    <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                                </div>
                                <div>
                                    <p class="font-bold text-sm text-brand-black">Pankaj Tiwari</p>
                                    <p class="text-xs text-gray-500">Supply Chain Head</p>
                                </div>
                            </div>
                            <p class="text-sm text-gray-700 mb-4">Professional, efficient, and always on time. AMOHA Logistics is our preferred partner for all transport needs. Excellent value for money!</p>
                            <div class="flex items-center gap-2">
                                <div class="flex gap-1">
                                    <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2l-2.81 6.63L2 9.24l5.46 4.73L5.82 21z"/></svg>
                                    <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2l-2.81 6.63L2 9.24l5.46 4.73L5.82 21z"/></svg>
                                    <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2l-2.81 6.63L2 9.24l5.46 4.73L5.82 21z"/></svg>
                                    <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2l-2.81 6.63L2 9.24l5.46 4.73L5.82 21z"/></svg>
                                    <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2l-2.81 6.63L2 9.24l5.46 4.73L5.82 21z"/></svg>
                                </div>
                                <span class="text-xs font-bold text-gray-600">9.5/10</span>
                            </div>
                        </div>
                    </div>

                    <!-- Review 7 -->
                    <div class="flex-shrink-0 w-[88vw] sm:w-80 review-card" style="scroll-snap-align:start;" data-animate="fade-up" data-delay="0.7">
                        <div class="review-glass-card h-full p-6 rounded-xl backdrop-blur-sm border transition-all duration-300 hover:-translate-y-1.5">
                            <div class="flex items-center gap-4 mb-4">
                                <div class="w-12 h-12 rounded-full bg-gradient-to-br from-indigo-500 to-indigo-700 flex items-center justify-center flex-shrink-0">
                                    <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                                </div>
                                <div>
                                    <p class="font-bold text-sm text-brand-black">Deepak Kumar</p>
                                    <p class="text-xs text-gray-500">E-commerce Manager</p>
                                </div>
                            </div>
                            <p class="text-sm text-gray-700 mb-4">Best logistics partner we've worked with! Their technology integration and transparency in pricing make them stand out from competitors.</p>
                            <div class="flex items-center gap-2">
                                <div class="flex gap-1">
                                    <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2l-2.81 6.63L2 9.24l5.46 4.73L5.82 21z"/></svg>
                                    <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2l-2.81 6.63L2 9.24l5.46 4.73L5.82 21z"/></svg>
                                    <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2l-2.81 6.63L2 9.24l5.46 4.73L5.82 21z"/></svg>
                                    <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2l-2.81 6.63L2 9.24l5.46 4.73L5.82 21z"/></svg>
                                    <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2l-2.81 6.63L2 9.24l5.46 4.73L5.82 21z"/></svg>
                                </div>
                                <span class="text-xs font-bold text-gray-600">9.3/10</span>
                            </div>
                        </div>
                    </div>

                    <!-- Review 8 -->
                    <div class="flex-shrink-0 w-[88vw] sm:w-80 review-card" style="scroll-snap-align:start;" data-animate="fade-up" data-delay="0.8">
                        <div class="review-glass-card h-full p-6 rounded-xl backdrop-blur-sm border transition-all duration-300 hover:-translate-y-1.5">
                            <div class="flex items-center gap-4 mb-4">
                                <div class="w-12 h-12 rounded-full bg-gradient-to-br from-cyan-500 to-cyan-700 flex items-center justify-center flex-shrink-0">
                                    <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                                </div>
                                <div>
                                    <p class="font-bold text-sm text-brand-black">Amit Raj</p>
                                    <p class="text-xs text-gray-500">Corporate Buyer</p>
                                </div>
                            </div>
                            <p class="text-sm text-gray-700 mb-4">AMOHA Logistics provides exceptional service with transparent operations. Their team is always proactive and responsive to our needs.</p>
                            <div class="flex items-center gap-2">
                                <div class="flex gap-1">
                                    <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2l-2.81 6.63L2 9.24l5.46 4.73L5.82 21z"/></svg>
                                    <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2l-2.81 6.63L2 9.24l5.46 4.73L5.82 21z"/></svg>
                                    <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2l-2.81 6.63L2 9.24l5.46 4.73L5.82 21z"/></svg>
                                    <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2l-2.81 6.63L2 9.24l5.46 4.73L5.82 21z"/></svg>
                                    <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2l-2.81 6.63L2 9.24l5.46 4.73L5.82 21z"/></svg>
                                </div>
                                <span class="text-xs font-bold text-gray-600">8/10</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Scroll Indicators -->
                <div class="flex justify-center gap-2 mt-8 pb-4">
                    <div class="scroll-indicator w-2 h-2 rounded-full bg-brand-red transition-all duration-300" data-index="0"></div>
                    <div class="scroll-indicator w-2 h-2 rounded-full bg-gray-300 transition-all duration-300" data-index="1"></div>
                    <div class="scroll-indicator w-2 h-2 rounded-full bg-gray-300 transition-all duration-300" data-index="2"></div>
                    <div class="scroll-indicator w-2 h-2 rounded-full bg-gray-300 transition-all duration-300" data-index="3"></div>
                    <div class="scroll-indicator w-2 h-2 rounded-full bg-gray-300 transition-all duration-300" data-index="4"></div>
                    <div class="scroll-indicator w-2 h-2 rounded-full bg-gray-300 transition-all duration-300" data-index="5"></div>
                    <div class="scroll-indicator w-2 h-2 rounded-full bg-gray-300 transition-all duration-300" data-index="6"></div>
                    <div class="scroll-indicator w-2 h-2 rounded-full bg-gray-300 transition-all duration-300" data-index="7"></div>
                </div>
            </div>
        </div>
    </section>

<?php include 'footer.php'; ?>
