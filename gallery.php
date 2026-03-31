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
                <span class="text-brand-black font-bold">Gallery</span>
            </div>
            <!-- Description -->
            <p class="hero-description text-gray-600 text-lg max-w-2xl mx-auto">Explore AMOHA Logistics operations, fleet, and services through our photo gallery.</p>
        </div>
    </section>

    <!-- Page Content -->
    <section class="w-full py-20 px-6 md:px-12">
        <div class="max-w-6xl mx-auto">
            <!-- Gallery Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Image 1 -->
                <div class="group relative h-64 md:h-72 rounded-lg overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 bg-gray-200">
                    <img src="images/truct1.jpg" alt="AMOHA Fleet" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                    <div class="absolute inset-0 bg-black/0 group-hover:bg-black/40 transition-colors duration-300 flex items-center justify-center">
                        <span class="text-white font-bold text-lg invisible group-hover:visible">Fleet Operations</span>
                    </div>
                </div>

                <!-- Image 2 -->
                <div class="group relative h-64 md:h-72 rounded-lg overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 bg-gray-200">
                    <img src="images/truct1.jpg" alt="Loading Operations" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                    <div class="absolute inset-0 bg-black/0 group-hover:bg-black/40 transition-colors duration-300 flex items-center justify-center">
                        <span class="text-white font-bold text-lg invisible group-hover:visible">Loading Operations</span>
                    </div>
                </div>

                <!-- Image 3 -->
                <div class="group relative h-64 md:h-72 rounded-lg overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 bg-gray-200">
                    <img src="images/truct1.jpg" alt="Truck Fleet" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                    <div class="absolute inset-0 bg-black/0 group-hover:bg-black/40 transition-colors duration-300 flex items-center justify-center">
                        <span class="text-white font-bold text-lg invisible group-hover:visible">Truck Fleet</span>
                    </div>
                </div>

                <!-- Image 4 -->
                <div class="group relative h-64 md:h-72 rounded-lg overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 bg-gray-200">
                    <img src="images/truct1.jpg" alt="Logistics Support" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                    <div class="absolute inset-0 bg-black/0 group-hover:bg-black/40 transition-colors duration-300 flex items-center justify-center">
                        <span class="text-white font-bold text-lg invisible group-hover:visible">Logistics Support</span>
                    </div>
                </div>

                <!-- Image 5 -->
                <div class="group relative h-64 md:h-72 rounded-lg overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 bg-gray-200">
                    <img src="images/truct1.jpg" alt="Delivery Services" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                    <div class="absolute inset-0 bg-black/0 group-hover:bg-black/40 transition-colors duration-300 flex items-center justify-center">
                        <span class="text-white font-bold text-lg invisible group-hover:visible">Delivery Services</span>
                    </div>
                </div>

                <!-- Image 6 -->
                <div class="group relative h-64 md:h-72 rounded-lg overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 bg-gray-200">
                    <img src="images/truct1.jpg" alt="Operations Team" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                    <div class="absolute inset-0 bg-black/0 group-hover:bg-black/40 transition-colors duration-300 flex items-center justify-center">
                        <span class="text-white font-bold text-lg invisible group-hover:visible">Operations Team</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include 'footer.php'; ?>
