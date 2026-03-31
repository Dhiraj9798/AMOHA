<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMOHA Logistics - Transport & Operations</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;700&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS (CDN) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            black: '#030303',
                            red: '#9b0014',
                            white: '#FFFFFF',
                        }
                    },
                    fontFamily: {
                        rubik: ['Rubik', 'sans-serif'],
                    },
                    letterSpacing: {
                        tighter: '-0.04em',
                    },
                    animation: {
                        'fade-in-up': 'fadeInUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards',
                        'fade-in': 'fadeIn 1s ease-out forwards',
                    },
                    keyframes: {
                        fadeInUp: {
                            '0%': { opacity: '0', transform: 'translateY(30px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        },
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' },
                        }
                    }
                }
            }
        }
    </script>
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-white text-brand-black font-rubik overflow-x-hidden m-0 relative flex flex-col min-h-screen selection:bg-brand-black selection:text-white">

    <!-- Header -->
    <header class="fixed top-0 left-0 w-full z-50 bg-white/95 backdrop-blur-md shadow-sm border-b border-gray-200 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-6 md:px-12 py-2 flex items-center justify-between">
            <a href="index.php" class="flex items-center gap-2 hover:opacity-80 transition-opacity">
                <img src="images/logo.png" alt="AMOHA Logistics Logo" class="h-8 md:h-9 w-auto object-contain bg-white rounded">
                <span class="text-sm md:text-lg font-bold tracking-tighter uppercase text-brand-black">AMOHA Logistics</span>
            </a>

            <!-- Desktop Navigation -->
            <div class="hidden md:flex items-center gap-3">
                <nav class="flex items-center gap-4 text-xs font-bold tracking-wide text-brand-black">
                    <a href="index.php" class="hover:text-gray-500 hover:scale-110 transition-all py-1 px-1">HOME</a>
                    
                    <!-- About Dropdown -->
                    <div class="relative group h-full">
                        <button class="hover:text-gray-500 hover:scale-110 transition-all flex items-center gap-1 py-1 px-1 outline-none">
                            ABOUT <i data-lucide="chevron-down" class="w-4 h-4 transition-transform group-hover:rotate-180"></i>
                        </button>
                        <!-- Dropdown Menu -->
                        <div class="absolute top-[100%] left-0 pt-2 w-56 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 transform origin-top z-50">
                            <div class="bg-white border border-gray-200 rounded-lg shadow-xl py-2 flex flex-col">
                                <a href="about-us.php" class="px-5 py-3 hover:bg-gray-100 transition-colors text-xs uppercase font-bold border-b border-gray-100 text-brand-black">About Us</a>
                                <a href="director-message.php" class="px-5 py-3 hover:bg-gray-100 transition-colors text-xs uppercase font-bold text-brand-black">Director Message</a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Services Dropdown -->
                    <div class="relative group h-full">
                        <button class="hover:text-gray-500 hover:scale-110 transition-all flex items-center gap-1 py-1 px-1 outline-none">
                            SERVICES <i data-lucide="chevron-down" class="w-4 h-4 transition-transform group-hover:rotate-180"></i>
                        </button>
                        <!-- Dropdown Menu -->
                        <div class="absolute top-[100%] left-0 pt-2 w-56 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 transform origin-top z-50">
                            <div class="bg-white border border-gray-200 rounded-lg shadow-xl py-2 flex flex-col">
                                <a href="transportation-services.php" class="px-5 py-3 hover:bg-gray-100 transition-colors text-xs uppercase font-bold border-b border-gray-100 text-brand-black">Transportation Services</a>
                                <a href="logistics-support.php" class="px-5 py-3 hover:bg-gray-100 transition-colors text-xs uppercase font-bold border-b border-gray-100 text-brand-black">Logistics Support</a>
                                <a href="truck-operations.php" class="px-5 py-3 hover:bg-gray-100 transition-colors text-xs uppercase font-bold border-b border-gray-100 text-brand-black">Truck Operations</a>
                                <a href="loading-delivery.php" class="px-5 py-3 hover:bg-gray-100 transition-colors text-xs uppercase font-bold border-b border-gray-100 text-brand-black">Loading & Delivery</a>
                                <a href="transport-partner-program.php" class="px-5 py-3 hover:bg-gray-100 transition-colors text-xs uppercase font-bold text-brand-black">Transport Partner Program</a>
                            </div>
                        </div>
                    </div>

                    <!-- Additional Menu Dropdown -->
                    <div class="relative group h-full">
                        <button class="hover:text-gray-500 hover:scale-110 transition-all flex items-center gap-1 py-1 px-1 outline-none">
                            RESOURCES <i data-lucide="chevron-down" class="w-4 h-4 transition-transform group-hover:rotate-180"></i>
                        </button>
                        <!-- Dropdown Menu -->
                        <div class="absolute top-[100%] left-0 pt-2 w-56 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 transform origin-top z-50">
                            <div class="bg-white border border-gray-200 rounded-lg shadow-xl py-2 flex flex-col">
                                <a href="company-profile.php" class="px-5 py-3 hover:bg-gray-100 transition-colors text-xs uppercase font-bold border-b border-gray-100 text-brand-black">Company Profile</a>
                                <a href="driver-application.php" class="px-5 py-3 hover:bg-gray-100 transition-colors text-xs uppercase font-bold text-brand-black">Driver Application</a>
                            </div>
                        </div>
                    </div>

                    <a href="gallery.php" class="hover:text-gray-500 hover:scale-110 transition-all py-1 px-1">GALLERY</a>
                    <a href="contact.php" class="hover:text-gray-500 hover:scale-110 transition-all py-1 px-1">CONTACT US</a>
                </nav>
            </div>

            <!-- Mobile Hamburger Button -->
            <button id="mobile-menu-toggle" class="md:hidden flex items-center justify-center w-10 h-10 text-brand-black hover:text-brand-red transition-colors">
                <i data-lucide="menu" class="w-6 h-6"></i>
            </button>
        </div>

        <!-- Mobile Navigation Sidebar -->
        <div id="mobile-menu" class="fixed top-[58px] left-0 w-full h-[calc(100vh-58px)] bg-white transform -translate-x-full transition-transform duration-300 md:hidden overflow-y-auto shadow-lg z-40">
            <nav class="flex flex-col p-4 space-y-2">
                <!-- Mobile Home Link -->
                <a href="index.php" class="px-4 py-3 text-sm font-bold uppercase tracking-wide text-brand-black hover:bg-red-50 hover:text-brand-red transition-colors rounded-lg">Home</a>

                <!-- Mobile About Dropdown -->
                <div class="space-y-2">
                    <button class="mobile-dropdown-toggle w-full px-4 py-3 text-sm font-bold uppercase tracking-wide text-brand-black hover:bg-red-50 rounded-lg transition-colors flex items-center justify-between" data-dropdown="about">
                        About
                        <i data-lucide="chevron-down" class="w-4 h-4 transition-transform duration-300"></i>
                    </button>
                    <div class="mobile-dropdown-content hidden overflow-hidden transition-all duration-300" data-dropdown="about">
                        <a href="about-us.php" class="block px-6 py-2 text-xs font-bold uppercase tracking-wide text-gray-600 hover:text-brand-red hover:bg-gray-50 transition-colors rounded-lg">About Us</a>
                        <a href="director-message.php" class="block px-6 py-2 text-xs font-bold uppercase tracking-wide text-gray-600 hover:text-brand-red hover:bg-gray-50 transition-colors rounded-lg">Director Message</a>
                    </div>
                </div>

                <!-- Mobile Services Dropdown -->
                <div class="space-y-2">
                    <button class="mobile-dropdown-toggle w-full px-4 py-3 text-sm font-bold uppercase tracking-wide text-brand-black hover:bg-red-50 rounded-lg transition-colors flex items-center justify-between" data-dropdown="services">
                        Services
                        <i data-lucide="chevron-down" class="w-4 h-4 transition-transform duration-300"></i>
                    </button>
                    <div class="mobile-dropdown-content hidden overflow-hidden transition-all duration-300" data-dropdown="services">
                        <a href="transportation-services.php" class="block px-6 py-2 text-xs font-bold uppercase tracking-wide text-gray-600 hover:text-brand-red hover:bg-gray-50 transition-colors rounded-lg">Transportation Services</a>
                        <a href="logistics-support.php" class="block px-6 py-2 text-xs font-bold uppercase tracking-wide text-gray-600 hover:text-brand-red hover:bg-gray-50 transition-colors rounded-lg">Logistics Support</a>
                        <a href="truck-operations.php" class="block px-6 py-2 text-xs font-bold uppercase tracking-wide text-gray-600 hover:text-brand-red hover:bg-gray-50 transition-colors rounded-lg">Truck Operations</a>
                        <a href="loading-delivery.php" class="block px-6 py-2 text-xs font-bold uppercase tracking-wide text-gray-600 hover:text-brand-red hover:bg-gray-50 transition-colors rounded-lg">Loading & Delivery</a>
                        <a href="transport-partner-program.php" class="block px-6 py-2 text-xs font-bold uppercase tracking-wide text-gray-600 hover:text-brand-red hover:bg-gray-50 transition-colors rounded-lg">Transport Partner Program</a>
                    </div>
                </div>

                <!-- Mobile Resources Dropdown -->
                <div class="space-y-2">
                    <button class="mobile-dropdown-toggle w-full px-4 py-3 text-sm font-bold uppercase tracking-wide text-brand-black hover:bg-red-50 rounded-lg transition-colors flex items-center justify-between" data-dropdown="resources">
                        Resources
                        <i data-lucide="chevron-down" class="w-4 h-4 transition-transform duration-300"></i>
                    </button>
                    <div class="mobile-dropdown-content hidden overflow-hidden transition-all duration-300" data-dropdown="resources">
                        <a href="company-profile.php" class="block px-6 py-2 text-xs font-bold uppercase tracking-wide text-gray-600 hover:text-brand-red hover:bg-gray-50 transition-colors rounded-lg">Company Profile</a>
                        <a href="driver-application.php" class="block px-6 py-2 text-xs font-bold uppercase tracking-wide text-gray-600 hover:text-brand-red hover:bg-gray-50 transition-colors rounded-lg">Driver Application</a>
                    </div>
                </div>

                <!-- Mobile Gallery Link -->
                <a href="gallery.php" class="px-4 py-3 text-sm font-bold uppercase tracking-wide text-brand-black hover:bg-red-50 hover:text-brand-red transition-colors rounded-lg">Gallery</a>

                <!-- Mobile Contact Link -->
                <a href="contact.php" class="px-4 py-3 text-sm font-bold uppercase tracking-wide text-brand-black hover:bg-red-50 hover:text-brand-red transition-colors rounded-lg">Contact Us</a>
            </nav>
        </div>

        <!-- Mobile Menu Overlay -->
        <div id="mobile-menu-overlay" class="fixed inset-0 bg-black/50 opacity-0 invisible transition-all duration-300 md:hidden z-30"></div>
    </header>
