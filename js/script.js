document.addEventListener("DOMContentLoaded", function() {
    if (window.lucide) {
        lucide.createIcons();
    }

    const prefersReducedMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

    const progressBar = document.querySelector("#index-scroll-progress span");
    if (progressBar) {
        const updateScrollProgress = () => {
            const doc = document.documentElement;
            const scrollTop = doc.scrollTop || document.body.scrollTop;
            const maxScroll = Math.max(doc.scrollHeight - doc.clientHeight, 1);
            const progress = Math.min((scrollTop / maxScroll) * 100, 100);
            progressBar.style.width = progress.toFixed(2) + "%";
        };

        window.addEventListener("scroll", updateScrollProgress, { passive: true });
        window.addEventListener("resize", updateScrollProgress);
        updateScrollProgress();
    }

    // Hero Slider
    const heroSlider = document.getElementById("hero-slider");
    if (heroSlider) {
        const heroSlides = Array.from(heroSlider.querySelectorAll(".hero-slide"));
        const heroDots = Array.from(document.querySelectorAll("[data-hero-slide]"));
        let currentHeroIndex = 0;
        let heroAutoTimer = null;

        const setHeroSlide = (nextIndex) => {
            if (!heroSlides.length) return;

            const normalizedIndex = ((nextIndex % heroSlides.length) + heroSlides.length) % heroSlides.length;
            currentHeroIndex = normalizedIndex;

            heroSlides.forEach((slide, index) => {
                if (index === normalizedIndex) {
                    slide.classList.remove("opacity-0");
                    slide.classList.add("opacity-100");
                    slide.classList.add("is-active");
                } else {
                    slide.classList.remove("opacity-100");
                    slide.classList.add("opacity-0");
                    slide.classList.remove("is-active");
                }
            });

            heroDots.forEach((dot, index) => {
                dot.classList.toggle("bg-white/90", index === normalizedIndex);
                dot.classList.toggle("bg-white/40", index !== normalizedIndex);
                dot.classList.toggle("scale-125", index === normalizedIndex);
            });
        };

        const startHeroAuto = () => {
            if (heroSlides.length <= 1 || prefersReducedMotion) return;
            clearInterval(heroAutoTimer);
            heroAutoTimer = setInterval(() => {
                setHeroSlide(currentHeroIndex + 1);
            }, 3800);
        };

        const stopHeroAuto = () => {
            clearInterval(heroAutoTimer);
        };

        heroDots.forEach((dot) => {
            dot.addEventListener("click", () => {
                const nextIndex = Number(dot.dataset.heroSlide);
                if (Number.isNaN(nextIndex)) return;
                setHeroSlide(nextIndex);
                startHeroAuto();
            });
        });

        heroSlider.addEventListener("mouseenter", stopHeroAuto);
        heroSlider.addEventListener("mouseleave", startHeroAuto);

        document.addEventListener("visibilitychange", () => {
            if (document.hidden) {
                stopHeroAuto();
            } else {
                startHeroAuto();
            }
        });

        setHeroSlide(0);
        startHeroAuto();

        const heroWords = Array.from(document.querySelectorAll(".hero-word"));
        let heroWordTimers = [];

        const clearHeroWordTimers = () => {
            heroWordTimers.forEach((timerId) => window.clearTimeout(timerId));
            heroWordTimers = [];
        };

        const runHeroWordFadeSequence = () => {
            if (!heroWords.length) return;

            clearHeroWordTimers();

            if (prefersReducedMotion) {
                heroWords.forEach((word) => {
                    word.style.opacity = "1";
                    word.style.transition = "none";
                });
                return;
            }

            heroWords.forEach((word) => {
                word.style.opacity = "0";
                word.style.transition = "opacity 0.72s cubic-bezier(0.22, 1, 0.36, 1)";
            });

            heroWords.forEach((word, index) => {
                const timerId = window.setTimeout(() => {
                    word.style.opacity = "1";
                }, 280 + index * 300);
                heroWordTimers.push(timerId);
            });
        };

        runHeroWordFadeSequence();
    }

    const enhanceSecondaryPages = () => {
        const isHomePage = Boolean(document.getElementById("hero-slider"));
        if (isHomePage) {
            return;
        }

        const main = document.querySelector("main");
        if (!main) {
            return;
        }

        main.classList.add("is-secondary-page");

        const firstSection = main.querySelector("section");
        if (firstSection) {
            firstSection.classList.add("secondary-hero-surface");
        }

        const contentSections = Array.from(main.querySelectorAll("section")).slice(1);
        contentSections.forEach((section, index) => {
            if (!section.dataset.animate) {
                section.dataset.animate = "fade-up";
                section.dataset.delay = (Math.min(index, 6) * 0.06).toFixed(2);
            }
        });

        const cardSelector = [
            ".bg-gradient-to-br.from-red-50.to-white.rounded-lg",
            ".bg-gradient-to-r.from-blue-50.to-indigo-50.rounded-lg",
            ".bg-gradient-to-r.from-red-50.to-orange-50.rounded-lg",
            ".bg-white.rounded-lg.border",
            ".bg-white.rounded-lg.shadow-lg",
            ".group.relative.h-64"
        ].join(",");

        const cards = main.querySelectorAll(cardSelector);
        cards.forEach((card, index) => {
            card.classList.add("refine-card-lite");

            if (!card.dataset.animate) {
                card.dataset.animate = index % 2 === 0 ? "fade-up" : "fade-right";
                card.dataset.delay = ((index % 8) * 0.05).toFixed(2);
            }
        });

        const miniHeadings = main.querySelectorAll("h5.text-sm.uppercase.tracking-wide");
        miniHeadings.forEach((heading) => {
            heading.classList.add("secondary-kicker");
            if (!heading.dataset.animate) {
                heading.dataset.animate = "wipe-in";
            }
        });
    };

    enhanceSecondaryPages();

    const animatedElements = document.querySelectorAll("[data-animate]");

    const setInitialState = (element) => {
        const animationType = element.dataset.animate || "fade-up";
        const baseState = { opacity: 0 };

        if (animationType === "fade-left") {
            baseState.x = -40;
        } else if (animationType === "fade-right") {
            baseState.x = 40;
        } else if (animationType === "blur-up") {
            baseState.y = 24;
            baseState.filter = "blur(10px)";
        } else if (animationType === "wipe-in") {
            baseState.opacity = 1;
            baseState.scaleX = 0.15;
            baseState.transformOrigin = "left center";
        } else if (animationType === "float-in") {
            baseState.y = 30;
            baseState.scale = 0.92;
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
        const animationType = element.dataset.animate || "fade-up";

        if (window.gsap) {
            const toConfig = {
                opacity: 1,
                x: 0,
                y: 0,
                scale: 1,
                filter: "blur(0px)",
                duration: 0.85,
                delay: delay,
                ease: "power3.out"
            };

            if (animationType === "wipe-in") {
                toConfig.scaleX = 1;
                toConfig.duration = 0.7;
                toConfig.ease = "power2.out";
            }

            gsap.to(element, toConfig);
        } else {
            element.style.opacity = "1";
            element.style.transform = "none";
            element.style.filter = "blur(0px)";
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

    const sectionStages = document.querySelectorAll(".section-stage");
    if (sectionStages.length) {
        const stageObserver = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add("is-inview");
                    }
                });
            },
            { threshold: 0.18 }
        );

        sectionStages.forEach((section) => stageObserver.observe(section));
    }

    const parallaxTargets = document.querySelectorAll("[data-parallax]");
    const floatTargets = document.querySelectorAll("[data-float]");
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

        floatTargets.forEach((target) => {
            const speed = Number(target.dataset.float || 8);
            const section = target.closest("main, section");
            if (!section) return;

            const bounds = section.getBoundingClientRect();
            if (bounds.bottom < -80 || bounds.top > viewportHeight + 80) {
                return;
            }

            const progress = (bounds.top + bounds.height / 2 - viewportHeight / 2) / viewportHeight;
            const yOffset = -progress * speed;
            target.style.setProperty("--float-offset", yOffset.toFixed(2) + "px");
        });
    };

    window.addEventListener("scroll", updateParallax, { passive: true });
    window.addEventListener("resize", updateParallax);
    updateParallax();

    const initThreeBackground = (config) => {
        const container = document.getElementById(config.containerId);
        if (!container) {
            return;
        }

        if (!window.THREE || prefersReducedMotion) {
            container.style.background = config.fallback;
            return;
        }

        const scene = new THREE.Scene();
        const camera = new THREE.PerspectiveCamera(42, 1, 0.1, 1000);
        camera.position.z = config.cameraZ || 95;

        const renderer = new THREE.WebGLRenderer({ alpha: true, antialias: true });
        renderer.setPixelRatio(Math.min(window.devicePixelRatio || 1, 1.5));
        renderer.outputColorSpace = THREE.SRGBColorSpace;
        container.appendChild(renderer.domElement);

        const group = new THREE.Group();
        scene.add(group);

        const particleCount = config.particleCount || 180;
        const spreadX = config.spreadX || 115;
        const spreadY = config.spreadY || 70;
        const spreadZ = config.spreadZ || 38;

        const pointsGeometry = new THREE.BufferGeometry();
        const pointsPos = new Float32Array(particleCount * 3);
        for (let i = 0; i < particleCount; i++) {
            const i3 = i * 3;
            pointsPos[i3] = (Math.random() - 0.5) * spreadX;
            pointsPos[i3 + 1] = (Math.random() - 0.5) * spreadY;
            pointsPos[i3 + 2] = (Math.random() - 0.5) * spreadZ;
        }
        pointsGeometry.setAttribute("position", new THREE.BufferAttribute(pointsPos, 3));

        const basePointOpacity = config.pointOpacity || 0.3;
        const pointsMaterial = new THREE.PointsMaterial({
            color: config.pointColor,
            size: config.pointSize || 1.7,
            transparent: true,
            opacity: basePointOpacity,
            depthWrite: false
        });

        const points = new THREE.Points(pointsGeometry, pointsMaterial);
        group.add(points);

        const wireMesh = new THREE.Mesh(
            new THREE.IcosahedronGeometry(config.wireSize || 20, 1),
            new THREE.MeshBasicMaterial({
                color: config.wireColor,
                wireframe: true,
                transparent: true,
                opacity: config.wireOpacity || 0.2
            })
        );
        wireMesh.position.set(config.wireX || 18, config.wireY || -4, config.wireZ || -8);
        group.add(wireMesh);

        const sphereMesh = new THREE.Mesh(
            new THREE.SphereGeometry(config.sphereSize || 12, 22, 22),
            new THREE.MeshBasicMaterial({
                color: config.sphereColor,
                transparent: true,
                opacity: config.sphereOpacity || 0.16
            })
        );
        sphereMesh.position.set(config.sphereX || -20, config.sphereY || 8, config.sphereZ || -16);
        group.add(sphereMesh);

        const resize = () => {
            const width = Math.max(container.clientWidth, 1);
            const height = Math.max(container.clientHeight, 1);
            renderer.setSize(width, height, false);
            camera.aspect = width / height;
            camera.updateProjectionMatrix();
        };

        let rafId = 0;
        let running = false;
        const speed = config.speed || 1;

        const renderFrame = () => {
            if (!running) {
                return;
            }

            const time = performance.now() * 0.001;
            points.rotation.y += 0.0008 * speed;
            points.rotation.x += 0.0003 * speed;
            wireMesh.rotation.y += 0.0019 * speed;
            wireMesh.rotation.x += 0.0014 * speed;
            sphereMesh.position.y = (config.sphereY || 8) + Math.sin(time * (0.9 + speed * 0.2)) * (2 + speed);
            pointsMaterial.opacity = basePointOpacity + Math.sin(time * 0.8) * 0.04;

            renderer.render(scene, camera);
            rafId = requestAnimationFrame(renderFrame);
        };

        const start = () => {
            if (running) return;
            running = true;
            renderFrame();
        };

        const stop = () => {
            running = false;
            if (rafId) {
                cancelAnimationFrame(rafId);
                rafId = 0;
            }
        };

        const onVisibilityChange = () => {
            if (document.hidden) {
                stop();
            } else {
                start();
            }
        };

        resize();
        start();
        window.addEventListener("resize", resize);
        document.addEventListener("visibilitychange", onVisibilityChange);
    };

    initThreeBackground({
        containerId: "about-photo-three-bg",
        fallback: "radial-gradient(circle at 20% 24%, rgba(249, 115, 22, 0.25) 0%, rgba(249, 115, 22, 0) 52%), radial-gradient(circle at 82% 74%, rgba(6, 182, 212, 0.25) 0%, rgba(6, 182, 212, 0) 54%), linear-gradient(145deg, rgba(15, 23, 42, 0.82) 0%, rgba(30, 41, 59, 0.72) 100%)",
        cameraZ: 84,
        particleCount: 120,
        spreadX: 95,
        spreadY: 60,
        spreadZ: 34,
        pointColor: 0xfbbf24,
        pointSize: 1.85,
        pointOpacity: 0.34,
        wireColor: 0xf97316,
        wireOpacity: 0.2,
        wireSize: 14,
        wireX: 14,
        wireY: -2,
        wireZ: -8,
        sphereColor: 0x22d3ee,
        sphereOpacity: 0.18,
        sphereSize: 9,
        sphereX: -15,
        sphereY: 7,
        sphereZ: -13,
        speed: 0.9
    });

    initThreeBackground({
        containerId: "vendor-three-bg",
        fallback: "radial-gradient(circle at 18% 22%, rgba(249, 115, 22, 0.16) 0%, rgba(249, 115, 22, 0) 52%), radial-gradient(circle at 82% 72%, rgba(6, 182, 212, 0.16) 0%, rgba(6, 182, 212, 0) 54%), linear-gradient(145deg, rgba(2, 6, 23, 0.95) 0%, rgba(15, 23, 42, 0.9) 100%)",
        cameraZ: 96,
        particleCount: 220,
        spreadX: 130,
        spreadY: 84,
        spreadZ: 44,
        pointColor: 0xfb7185,
        pointSize: 1.95,
        pointOpacity: 0.32,
        wireColor: 0xf43f5e,
        wireOpacity: 0.22,
        wireSize: 22,
        wireX: 21,
        wireY: -4,
        wireZ: -10,
        sphereColor: 0x22d3ee,
        sphereOpacity: 0.17,
        sphereSize: 12,
        sphereX: -22,
        sphereY: 9,
        sphereZ: -17,
        speed: 1.15
    });

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
                    otherAccordion.classList.remove("is-open");
                }
            });
            
            // Toggle current
            if (isHidden) {
                content.classList.remove("hidden");
                content.style.display = "block";
                if (span) span.textContent = "−";
                accordion.classList.add("is-open");
            } else {
                content.classList.add("hidden");
                content.style.display = "";
                if (span) span.textContent = "+";
                accordion.classList.remove("is-open");
            }
        });
    });

    // Reviews Carousel
    const reviewsContainer = document.getElementById("reviews-container");
    if (reviewsContainer) {
        const reviewCards = document.querySelectorAll(".review-card");
        const scrollIndicators = document.querySelectorAll(".scroll-indicator");
        let currentIndex = 0;
        let autoScrollInterval;

        // Hide scrollbar on webkit (Chrome/Safari/Mobile)
        reviewsContainer.style.cssText += ";scrollbar-width:none;-ms-overflow-style:none;";
        const styleTag = document.createElement("style");
        styleTag.textContent = "#reviews-container::-webkit-scrollbar{display:none;}";
        document.head.appendChild(styleTag);

        // Dynamically get card width from actual rendered card (works for mobile 88vw and desktop 320px)
        const getCardWidth = () => {
            if (reviewCards.length === 0) return 320;
            const firstCard = reviewCards[0];
            const style = window.getComputedStyle(reviewsContainer);
            const gap = parseFloat(style.gap) || 16;
            return firstCard.offsetWidth + gap;
        };

        const updateActiveReviewCard = (index) => {
            reviewCards.forEach((card, i) => {
                card.classList.toggle("is-active", i === index);
            });
        };

        const updateIndicators = (index) => {
            scrollIndicators.forEach((indicator, i) => {
                if (i === index) {
                    indicator.classList.add("active");
                    indicator.style.background = "var(--brand-red, #9b0014)";
                    indicator.style.width = "20px";
                } else {
                    indicator.classList.remove("active");
                    indicator.style.background = "#d1d5db";
                    indicator.style.width = "8px";
                }
            });
        };

        const updateCarousel = (index) => {
            currentIndex = ((index % reviewCards.length) + reviewCards.length) % reviewCards.length;
            const cardWidth = getCardWidth();
            reviewsContainer.scrollTo({ left: currentIndex * cardWidth, behavior: "smooth" });
            updateIndicators(currentIndex);
            updateActiveReviewCard(currentIndex);
        };

        const autoScroll = () => updateCarousel(currentIndex + 1);

        const startAutoScroll = () => {
            if (prefersReducedMotion) return;
            autoScrollInterval = setInterval(autoScroll, 3500);
        };

        const pauseAutoScroll = () => clearInterval(autoScrollInterval);

        // Init
        updateCarousel(0);
        startAutoScroll();

        // Desktop hover pause/resume
        reviewsContainer.addEventListener("mouseenter", pauseAutoScroll);
        reviewsContainer.addEventListener("mouseleave", startAutoScroll);

        // Indicator dot click
        scrollIndicators.forEach((indicator, i) => {
            indicator.addEventListener("click", () => {
                pauseAutoScroll();
                updateCarousel(i);
                startAutoScroll();
            });
        });

        // Sync indicator with manual scroll (touch swipe or mouse drag)
        let scrollTimeout;
        reviewsContainer.addEventListener("scroll", () => {
            pauseAutoScroll();
            clearTimeout(scrollTimeout);
            scrollTimeout = setTimeout(() => {
                // Snap to nearest card and update indicator
                const cardWidth = getCardWidth();
                const newIndex = Math.round(reviewsContainer.scrollLeft / cardWidth);
                currentIndex = Math.min(newIndex, reviewCards.length - 1);
                updateIndicators(currentIndex);
                updateActiveReviewCard(currentIndex);
                startAutoScroll();
            }, 150);
        });
    }

    const floatingSidebar = document.getElementById("floating-social-sidebar");
    if (floatingSidebar) {
        const heroStage = document.querySelector("main.hero-stage");
        const footer = document.querySelector("footer");

        const updateFloatingSidebarVisibility = () => {
            const viewportHeight = window.innerHeight || 1;

            const heroPassed = heroStage
                ? heroStage.getBoundingClientRect().bottom <= Math.min(viewportHeight * 0.38, 260)
                : true;

            const beforeFooter = footer
                ? footer.getBoundingClientRect().top > viewportHeight * 0.88
                : true;

            const shouldShow = heroPassed && beforeFooter;
            floatingSidebar.classList.toggle("is-visible", shouldShow);
        };

        window.addEventListener("scroll", updateFloatingSidebarVisibility, { passive: true });
        window.addEventListener("resize", updateFloatingSidebarVisibility);
        updateFloatingSidebarVisibility();
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
