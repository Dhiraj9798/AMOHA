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

        const animationPreset = config.animationPreset || "default";

        const wireGeometry = animationPreset === "orbital"
            ? new THREE.TorusKnotGeometry(
                config.wireSize || 15,
                config.wireTube || 1.8,
                config.wireTubularSegments || 148,
                config.wireRadialSegments || 18
            )
            : new THREE.IcosahedronGeometry(config.wireSize || 20, 1);

        const wireMesh = new THREE.Mesh(
            wireGeometry,
            new THREE.MeshBasicMaterial({
                color: config.wireColor,
                wireframe: animationPreset !== "orbital",
                transparent: true,
                opacity: config.wireOpacity || 0.2
            })
        );

        const baseWireX = config.wireX ?? 18;
        const baseWireY = config.wireY ?? -4;
        const baseWireZ = config.wireZ ?? -8;
        const baseSphereX = config.sphereX ?? -20;
        const baseSphereY = config.sphereY ?? 8;
        const baseSphereZ = config.sphereZ ?? -16;

        wireMesh.position.set(baseWireX, baseWireY, baseWireZ);
        group.add(wireMesh);

        const sphereGeometry = animationPreset === "orbital"
            ? new THREE.OctahedronGeometry(config.sphereSize || 10, 1)
            : new THREE.SphereGeometry(config.sphereSize || 12, 22, 22);

        const sphereMesh = new THREE.Mesh(
            sphereGeometry,
            new THREE.MeshBasicMaterial({
                color: config.sphereColor,
                transparent: true,
                opacity: config.sphereOpacity || 0.16
            })
        );
        sphereMesh.position.set(baseSphereX, baseSphereY, baseSphereZ);
        group.add(sphereMesh);

        let haloMesh = null;
        if (animationPreset === "orbital") {
            haloMesh = new THREE.Mesh(
                new THREE.TorusGeometry(config.haloRadius || 30, config.haloTube || 0.65, 18, config.haloSegments || 160),
                new THREE.MeshBasicMaterial({
                    color: config.haloColor || 0x7dd3fc,
                    transparent: true,
                    opacity: config.haloOpacity || 0.16,
                    wireframe: true
                })
            );
            haloMesh.position.set(config.haloX ?? -1, config.haloY ?? 0, config.haloZ ?? -12);
            haloMesh.rotation.x = Math.PI * 0.24;
            group.add(haloMesh);
        }

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

            if (animationPreset === "orbital") {
                points.rotation.y += 0.0016 * speed;
                points.rotation.z += 0.0008 * speed;

                wireMesh.rotation.y += 0.0028 * speed;
                wireMesh.rotation.x += 0.0014 * speed;
                wireMesh.rotation.z += 0.0012 * speed;
                wireMesh.position.x = baseWireX + Math.sin(time * (0.95 + speed * 0.14)) * (2.8 + speed);
                wireMesh.position.y = baseWireY + Math.cos(time * (0.82 + speed * 0.1)) * (2.2 + speed * 0.6);

                sphereMesh.rotation.y += 0.0022 * speed;
                sphereMesh.rotation.z += 0.0015 * speed;
                sphereMesh.position.x = baseSphereX + Math.cos(time * (0.78 + speed * 0.12)) * (4.4 + speed);
                sphereMesh.position.y = baseSphereY + Math.sin(time * (1.15 + speed * 0.12)) * (2.4 + speed * 0.5);
                sphereMesh.position.z = baseSphereZ + Math.sin(time * 0.62) * (2 + speed * 0.35);

                if (haloMesh) {
                    haloMesh.rotation.y += 0.0017 * speed;
                    haloMesh.rotation.z += 0.0009 * speed;
                    const haloScale = 1 + Math.sin(time * (1.06 + speed * 0.08)) * 0.08;
                    haloMesh.scale.setScalar(haloScale);
                }

                pointsMaterial.opacity = basePointOpacity + Math.sin(time * 1.35) * 0.06;
            } else {
                points.rotation.y += 0.0008 * speed;
                points.rotation.x += 0.0003 * speed;
                wireMesh.rotation.y += 0.0019 * speed;
                wireMesh.rotation.x += 0.0014 * speed;
                sphereMesh.position.y = baseSphereY + Math.sin(time * (0.9 + speed * 0.2)) * (2 + speed);
                pointsMaterial.opacity = basePointOpacity + Math.sin(time * 0.8) * 0.04;
            }

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

    const initVendorCanvasAnimation = () => {
        const canvas = document.getElementById("vendor-canvas-bg");
        if (!canvas) {
            return;
        }

        const ctx = canvas.getContext("2d");
        if (!ctx) {
            return;
        }

        let width = 1;
        let height = 1;
        let dpr = 1;
        let mouseX = -999;
        let mouseY = -999;
        let tick = 0;

        const COLORS = [
            { r: 26, g: 158, b: 111 },
            { r: 15, g: 122, b: 85 },
            { r: 52, g: 211, b: 153 },
            { r: 6, g: 95, b: 70 },
            { r: 16, g: 185, b: 129 },
            { r: 110, g: 231, b: 183 },
            { r: 5, g: 150, b: 105 },
            { r: 167, g: 243, b: 208 }
        ];

        const TOTAL = 90;
        const particles = [];
        let waves = [];

        const createWaves = () => Array.from({ length: 5 }, (_, i) => ({
            y: height * (0.15 + i * 0.18),
            amp: 18 + i * 8,
            freq: 0.006 + i * 0.002,
            speed: 0.008 + i * 0.003,
            phase: (i / 5) * Math.PI * 2,
            alpha: 0.04 + i * 0.012,
            thick: 0.8 + i * 0.3
        }));

        const createParticle = (forceX) => {
            let x;
            if (forceX === "L") {
                x = Math.random() * width * 0.38;
            } else if (forceX === "R") {
                x = width * 0.62 + Math.random() * width * 0.38;
            } else {
                x = Math.random() * width;
            }

            const col = COLORS[Math.floor(Math.random() * COLORS.length)];
            return {
                x,
                y: Math.random() * height,
                vx: (Math.random() - 0.5) * 0.55,
                vy: (Math.random() - 0.5) * 0.45,
                r: 2 + Math.random() * 4.5,
                col,
                alpha: 0.3 + Math.random() * 0.5,
                shape: Math.random() < 0.3 ? "diamond" : "circle",
                pulse: Math.random() * Math.PI * 2,
                pulseSpeed: 0.015 + Math.random() * 0.015
            };
        };

        const seedParticles = () => {
            particles.length = 0;
            for (let i = 0; i < TOTAL; i++) {
                const zone = i < TOTAL * 0.35
                    ? "L"
                    : i < TOTAL * 0.7
                        ? "R"
                        : null;
                particles.push(createParticle(zone));
            }
        };

        const getAlpha = (x, baseAlpha) => {
            const xf = x / Math.max(width, 1);
            if (xf >= 0.26 && xf <= 0.74) {
                const d = Math.min(xf - 0.26, 0.74 - xf) / 0.13;
                const fade = 1 - Math.min(d, 1);
                return baseAlpha * fade * fade * fade;
            }

            return baseAlpha;
        };

        const drawCircle = (particle, alpha) => {
            ctx.beginPath();
            ctx.arc(particle.x, particle.y, particle.r, 0, Math.PI * 2);
            ctx.fillStyle = `rgba(${particle.col.r},${particle.col.g},${particle.col.b},${alpha})`;
            ctx.fill();

            ctx.beginPath();
            ctx.arc(
                particle.x - particle.r * 0.28,
                particle.y - particle.r * 0.28,
                particle.r * 0.35,
                0,
                Math.PI * 2
            );
            ctx.fillStyle = `rgba(255,255,255,${alpha * 0.55})`;
            ctx.fill();
        };

        const drawDiamond = (particle, alpha) => {
            const size = particle.r * 1.5;
            ctx.save();
            ctx.translate(particle.x, particle.y);
            ctx.rotate(Math.PI / 4);
            ctx.beginPath();
            ctx.rect(-size * 0.7, -size * 0.7, size * 1.4, size * 1.4);
            ctx.fillStyle = `rgba(${particle.col.r},${particle.col.g},${particle.col.b},${alpha})`;
            ctx.fill();
            ctx.strokeStyle = `rgba(255,255,255,${alpha * 0.4})`;
            ctx.lineWidth = 0.8;
            ctx.stroke();
            ctx.restore();
        };

        const drawFrame = () => {
            ctx.clearRect(0, 0, width, height);
            ctx.fillStyle = "rgba(255,255,255,0.98)";
            ctx.fillRect(0, 0, width, height);

            const bgL = ctx.createLinearGradient(0, 0, width * 0.32, 0);
            bgL.addColorStop(0, "rgba(26,158,111, 0.06)");
            bgL.addColorStop(1, "rgba(26,158,111, 0)");
            ctx.fillStyle = bgL;
            ctx.fillRect(0, 0, width * 0.32, height);

            const bgR = ctx.createLinearGradient(width, 0, width * 0.68, 0);
            bgR.addColorStop(0, "rgba(26,158,111, 0.06)");
            bgR.addColorStop(1, "rgba(26,158,111, 0)");
            ctx.fillStyle = bgR;
            ctx.fillRect(width * 0.68, 0, width * 0.32, height);

            waves.forEach((wave) => {
                ctx.beginPath();
                for (let x = 0; x <= width; x += 3) {
                    const y = wave.y + Math.sin(x * wave.freq + tick * wave.speed + wave.phase) * wave.amp;
                    if (x === 0) {
                        ctx.moveTo(x, y);
                    } else {
                        ctx.lineTo(x, y);
                    }
                }

                const waveGradient = ctx.createLinearGradient(0, 0, width, 0);
                waveGradient.addColorStop(0, `rgba(26,158,111, ${wave.alpha})`);
                waveGradient.addColorStop(0.28, `rgba(26,158,111, ${wave.alpha * 0.3})`);
                waveGradient.addColorStop(0.5, `rgba(26,158,111, ${wave.alpha * 0.05})`);
                waveGradient.addColorStop(0.72, `rgba(26,158,111, ${wave.alpha * 0.3})`);
                waveGradient.addColorStop(1, `rgba(26,158,111, ${wave.alpha})`);
                ctx.strokeStyle = waveGradient;
                ctx.lineWidth = wave.thick;
                ctx.stroke();
            });

            const LINK_DIST = 100;
            for (let i = 0; i < particles.length; i++) {
                for (let j = i + 1; j < particles.length; j++) {
                    const pi = particles[i];
                    const pj = particles[j];
                    const dx = pi.x - pj.x;
                    const dy = pi.y - pj.y;
                    const dist = Math.sqrt(dx * dx + dy * dy);

                    if (dist < LINK_DIST) {
                        const aiBase = getAlpha(pi.x, 1);
                        const ajBase = getAlpha(pj.x, 1);
                        if (aiBase < 0.05 || ajBase < 0.05) {
                            continue;
                        }

                        const lineA = (1 - dist / LINK_DIST) * 0.18 * Math.min(aiBase, ajBase);
                        ctx.beginPath();
                        ctx.moveTo(pi.x, pi.y);
                        ctx.lineTo(pj.x, pj.y);
                        ctx.strokeStyle = `rgba(26,158,111, ${lineA})`;
                        ctx.lineWidth = 0.7;
                        ctx.stroke();
                    }
                }
            }

            particles.forEach((particle) => {
                if (mouseX > 0) {
                    const dx = mouseX - particle.x;
                    const dy = mouseY - particle.y;
                    const distance = Math.sqrt(dx * dx + dy * dy);
                    if (distance < 160 && distance > 1) {
                        particle.vx += (dx / distance) * 0.012;
                        particle.vy += (dy / distance) * 0.012;
                    }
                }

                particle.vx *= 0.995;
                particle.vy *= 0.995;

                particle.x += particle.vx;
                particle.y += particle.vy;
                particle.pulse += particle.pulseSpeed;

                if (particle.x < -20) particle.x = width + 20;
                if (particle.x > width + 20) particle.x = -20;
                if (particle.y < -20) particle.y = height + 20;
                if (particle.y > height + 20) particle.y = -20;

                const pulseA = particle.alpha * (0.7 + Math.sin(particle.pulse) * 0.3);
                const finalA = getAlpha(particle.x, pulseA);
                if (finalA < 0.01) {
                    return;
                }

                if (particle.shape === "diamond") {
                    drawDiamond(particle, finalA);
                } else {
                    drawCircle(particle, finalA);
                }
            });

            const cornerShapes = [
                { x: width * 0.04, y: height * 0.18, r: 28, a: 0.12 + Math.sin(tick * 0.008) * 0.04 },
                { x: width * 0.1, y: height * 0.65, r: 20, a: 0.1 + Math.sin(tick * 0.007 + 1) * 0.04 },
                { x: width * 0.96, y: height * 0.22, r: 26, a: 0.12 + Math.sin(tick * 0.009 + 2) * 0.04 },
                { x: width * 0.9, y: height * 0.7, r: 22, a: 0.1 + Math.sin(tick * 0.006 + 3) * 0.04 }
            ];

            cornerShapes.forEach((shape) => {
                ctx.beginPath();
                for (let i = 0; i < 6; i++) {
                    const ang = (i / 6) * Math.PI * 2 - Math.PI / 6 + tick * 0.004;
                    const px = shape.x + Math.cos(ang) * shape.r;
                    const py = shape.y + Math.sin(ang) * shape.r;
                    if (i === 0) {
                        ctx.moveTo(px, py);
                    } else {
                        ctx.lineTo(px, py);
                    }
                }

                ctx.closePath();
                ctx.strokeStyle = `rgba(26,158,111, ${shape.a})`;
                ctx.lineWidth = 1.5;
                ctx.stroke();

                ctx.beginPath();
                for (let i = 0; i < 6; i++) {
                    const ang = (i / 6) * Math.PI * 2 - Math.PI / 6 - tick * 0.004;
                    const px = shape.x + Math.cos(ang) * shape.r * 0.55;
                    const py = shape.y + Math.sin(ang) * shape.r * 0.55;
                    if (i === 0) {
                        ctx.moveTo(px, py);
                    } else {
                        ctx.lineTo(px, py);
                    }
                }

                ctx.closePath();
                ctx.strokeStyle = `rgba(26,158,111, ${shape.a * 0.6})`;
                ctx.lineWidth = 0.8;
                ctx.stroke();
            });

            const DOT_SPACING = 44;
            for (let gx = 0; gx < width; gx += DOT_SPACING) {
                for (let gy = 0; gy < height; gy += DOT_SPACING) {
                    const drift = Math.sin(tick * 0.005 + gx * 0.04 + gy * 0.03) * 4;
                    const dotA = getAlpha(gx, 0.1);
                    if (dotA < 0.01) {
                        continue;
                    }

                    ctx.beginPath();
                    ctx.arc(gx + drift, gy + drift * 0.6, 1, 0, Math.PI * 2);
                    ctx.fillStyle = `rgba(26,158,111, ${dotA})`;
                    ctx.fill();
                }
            }

            const centerGradient = ctx.createRadialGradient(width * 0.5, height * 0.44, 0, width * 0.5, height * 0.44, width * 0.27);
            centerGradient.addColorStop(0, "rgba(255,255,255, 0.85)");
            centerGradient.addColorStop(0.55, "rgba(255,255,255, 0.45)");
            centerGradient.addColorStop(1, "rgba(255,255,255, 0)");
            ctx.fillStyle = centerGradient;
            ctx.fillRect(0, 0, width, height);

            const bottomFade = ctx.createLinearGradient(0, height * 0.72, 0, height);
            bottomFade.addColorStop(0, "rgba(255,255,255,0)");
            bottomFade.addColorStop(1, "rgba(255,255,255,1)");
            ctx.fillStyle = bottomFade;
            ctx.fillRect(0, height * 0.72, width, height * 0.28);
        };

        const resize = () => {
            const parent = canvas.parentElement;
            const nextWidth = parent ? parent.clientWidth : canvas.clientWidth;
            const nextHeight = parent ? parent.clientHeight : canvas.clientHeight;

            width = Math.max(nextWidth, 1);
            height = Math.max(nextHeight, 1);
            dpr = Math.min(window.devicePixelRatio || 1, 1.5);

            canvas.width = Math.max(Math.floor(width * dpr), 1);
            canvas.height = Math.max(Math.floor(height * dpr), 1);
            canvas.style.width = `${width}px`;
            canvas.style.height = `${height}px`;
            ctx.setTransform(dpr, 0, 0, dpr, 0, 0);

            waves = createWaves();
            if (!particles.length) {
                seedParticles();
            }

            if (prefersReducedMotion) {
                drawFrame();
            }
        };

        const onMouseMove = (event) => {
            const rect = canvas.getBoundingClientRect();
            if (
                event.clientX < rect.left ||
                event.clientX > rect.right ||
                event.clientY < rect.top ||
                event.clientY > rect.bottom
            ) {
                mouseX = -999;
                mouseY = -999;
                return;
            }

            mouseX = event.clientX - rect.left;
            mouseY = event.clientY - rect.top;
        };

        const clearMouse = () => {
            mouseX = -999;
            mouseY = -999;
        };

        let animationFrameId = 0;
        let running = false;

        const render = () => {
            if (!running) {
                return;
            }

            drawFrame();
            tick += 1;
            animationFrameId = requestAnimationFrame(render);
        };

        const start = () => {
            if (running) {
                return;
            }

            running = true;
            render();
        };

        const stop = () => {
            running = false;
            if (animationFrameId) {
                cancelAnimationFrame(animationFrameId);
                animationFrameId = 0;
            }
        };

        const onVisibilityChange = () => {
            if (document.hidden) {
                stop();
                return;
            }

            if (!prefersReducedMotion) {
                start();
            }
        };

        resize();
        window.addEventListener("resize", resize);
        window.addEventListener("load", resize);
        window.addEventListener("mousemove", onMouseMove, { passive: true });
        window.addEventListener("blur", clearMouse);
        document.addEventListener("visibilitychange", onVisibilityChange);

        if (prefersReducedMotion) {
            drawFrame();
            return;
        }

        start();
    };

    initVendorCanvasAnimation();

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
