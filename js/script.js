document.addEventListener("DOMContentLoaded", function() {
    if (window.lucide) {
        lucide.createIcons();
    }

    const animatedElements = document.querySelectorAll("[data-animate]");

    const setInitialState = (element) => {
        const animationType = element.dataset.animate || "fade-up";
        const baseState = { opacity: 0 };

        if (animationType === "fade-left") {
            baseState.x = -40;
        } else if (animationType === "fade-right") {
            baseState.x = 40;
        } else if (animationType === "scale-in") {
            baseState.scale = 0.85;
            baseState.y = 16;
        } else {
            baseState.y = 40;
        }

        if (window.gsap) {
            gsap.set(element, baseState);
        } else {
            element.style.opacity = "0";
            element.style.transform = "translateY(40px)";
        }
    };

    const reveal = (element) => {
        const delay = Number(element.dataset.delay || 0);

        if (window.gsap) {
            gsap.to(element, {
                opacity: 1,
                x: 0,
                y: 0,
                scale: 1,
                duration: 0.85,
                delay: delay,
                ease: "power3.out"
            });
        } else {
            element.style.opacity = "1";
            element.style.transform = "translateY(0)";
        }

        const popIcon = element.querySelector(".icon-pop");
        if (popIcon && window.gsap) {
            gsap.fromTo(
                popIcon,
                { scale: 0 },
                {
                    scale: 1,
                    duration: 0.45,
                    delay: delay + 0.1,
                    ease: "back.out(1.7)"
                }
            );
        }
    };

    animatedElements.forEach(setInitialState);

    const observer = new IntersectionObserver(
        (entries, instance) => {
            entries.forEach((entry) => {
                if (!entry.isIntersecting) {
                    return;
                }
                reveal(entry.target);
                instance.unobserve(entry.target);
            });
        },
        {
            root: null,
            rootMargin: "0px",
            threshold: 0.15
        }
    );

    animatedElements.forEach((element) => observer.observe(element));

    const parallaxTargets = document.querySelectorAll("[data-parallax]");
    const updateParallax = () => {
        const viewportHeight = window.innerHeight || 1;

        parallaxTargets.forEach((target) => {
            const speed = Number(target.dataset.parallax || 15);
            const section = target.closest("section");
            if (!section) {
                return;
            }

            const bounds = section.getBoundingClientRect();
            if (bounds.bottom < 0 || bounds.top > viewportHeight) {
                return;
            }

            const progress = (bounds.top + bounds.height / 2 - viewportHeight / 2) / viewportHeight;
            const yOffset = -progress * speed;
            target.style.transform = "translate3d(0, " + yOffset.toFixed(2) + "px, 0)";
        });
    };

    window.addEventListener("scroll", updateParallax, { passive: true });
    window.addEventListener("resize", updateParallax);
    updateParallax();

    // Service Accordion
    const headers = document.querySelectorAll(".service-accordion-header");
    
    headers.forEach((header, index) => {
        header.addEventListener("click", function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            const accordion = this.closest(".service-accordion");
            if (!accordion) return;
            
            const content = accordion.querySelector(".service-accordion-content");
            if (!content) return;
            
            const span = this.querySelector("span");
            const isHidden = content.classList.contains("hidden");
            
            // Close all other accordions first
            document.querySelectorAll(".service-accordion").forEach((otherAccordion) => {
                if (otherAccordion !== accordion) {
                    const otherContent = otherAccordion.querySelector(".service-accordion-content");
                    const otherSpan = otherAccordion.querySelector(".service-accordion-header span");
                    if (otherContent) {
                        otherContent.classList.add("hidden");
                        otherContent.style.display = "";
                    }
                    if (otherSpan) otherSpan.textContent = "+";
                }
            });
            
            // Toggle current
            if (isHidden) {
                content.classList.remove("hidden");
                content.style.display = "block";
                if (span) span.textContent = "−";
            } else {
                content.classList.add("hidden");
                content.style.display = "";
                if (span) span.textContent = "+";
            }
        });
    });

    // Reviews Carousel Auto-Scroll
    const reviewsContainer = document.getElementById("reviews-container");
    if (reviewsContainer) {
        const reviewCards = document.querySelectorAll(".review-card");
        const scrollIndicators = document.querySelectorAll(".scroll-indicator");
        const cardWidth = 336; // 80 + 24 (gap 1.5rem = 24px) = 336px
        let currentIndex = 0;
        let autoScrollInterval;

        const updateCarousel = (index) => {
            currentIndex = index % reviewCards.length;
            const scrollAmount = currentIndex * cardWidth;
            
            reviewsContainer.scrollTo({
                left: scrollAmount,
                behavior: "smooth"
            });

            // Update indicators
            scrollIndicators.forEach((indicator, i) => {
                if (i === currentIndex) {
                    indicator.classList.add("active");
                } else {
                    indicator.classList.remove("active");
                }
            });
        };

        const autoScroll = () => {
            updateCarousel(currentIndex + 1);
        };

        const startAutoScroll = () => {
            autoScrollInterval = setInterval(autoScroll, 3500); // 3.5 seconds
        };

        const pauseAutoScroll = () => {
            clearInterval(autoScrollInterval);
        };

        // Initialize carousel
        updateCarousel(0);
        startAutoScroll();

        // Pause on hover
        reviewsContainer.addEventListener("mouseenter", pauseAutoScroll);
        reviewsContainer.addEventListener("mouseleave", startAutoScroll);

        // Pause on indicator click
        scrollIndicators.forEach((indicator, index) => {
            indicator.addEventListener("click", () => {
                pauseAutoScroll();
                updateCarousel(index);
                startAutoScroll();
            });
        });

        // Resume on scroll end
        let scrollTimeout;
        reviewsContainer.addEventListener("scroll", () => {
            pauseAutoScroll();
            clearTimeout(scrollTimeout);
            scrollTimeout = setTimeout(startAutoScroll, 2000); // Resume after 2 seconds of no scroll
        });
    }

    // Mobile Menu Toggle
    const mobileMenuToggle = document.getElementById("mobile-menu-toggle");
    const mobileMenu = document.getElementById("mobile-menu");
    const mobileMenuOverlay = document.getElementById("mobile-menu-overlay");

    if (mobileMenuToggle && mobileMenu) {
        const closeMobileMenu = () => {
            mobileMenu.classList.add("-translate-x-full");
            mobileMenuOverlay.classList.add("opacity-0", "invisible");
            document.body.style.overflow = "";
        };

        const openMobileMenu = () => {
            mobileMenu.classList.remove("-translate-x-full");
            mobileMenuOverlay.classList.remove("opacity-0", "invisible");
            document.body.style.overflow = "hidden";
        };

        mobileMenuToggle.addEventListener("click", () => {
            if (mobileMenu.classList.contains("-translate-x-full")) {
                openMobileMenu();
            } else {
                closeMobileMenu();
            }
        });

        // Close menu when clicking overlay
        if (mobileMenuOverlay) {
            mobileMenuOverlay.addEventListener("click", closeMobileMenu);
        }

        // Close menu when clicking links
        const mobileLinks = mobileMenu.querySelectorAll("a");
        mobileLinks.forEach(link => {
            link.addEventListener("click", closeMobileMenu);
        });

        // Mobile Dropdown Toggle
        const mobileDropdownToggles = document.querySelectorAll(".mobile-dropdown-toggle");
        mobileDropdownToggles.forEach(toggle => {
            toggle.addEventListener("click", function(e) {
                e.preventDefault();
                const dropdownName = this.dataset.dropdown;
                const dropdownContent = document.querySelector(`.mobile-dropdown-content[data-dropdown="${dropdownName}"]`);
                const icon = this.querySelector("i");

                if (dropdownContent && dropdownContent.classList.contains("hidden")) {
                    dropdownContent.classList.remove("hidden");
                    if (icon) icon.style.transform = "rotate(180deg)";
                } else if (dropdownContent) {
                    dropdownContent.classList.add("hidden");
                    if (icon) icon.style.transform = "rotate(0deg)";
                }
            });
        });
    }
});
