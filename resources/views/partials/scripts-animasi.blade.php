<!-- Scripts Animasi -->
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollToPlugin.min.js"></script>
<script>
    AOS.init({ duration: 1400, once: true })
    gsap.registerPlugin(ScrollTrigger)

    // Navbar Scroll
    document.addEventListener('scroll', () => {
        document.getElementById('navbar').classList.toggle('navbar-scrolled', window.scrollY > 50)
    })

    // Mobile Menu
    const menuToggle = document.getElementById('menuToggle')
    const mobileMenu = document.getElementById('mobileMenu')

    menuToggle.addEventListener('click', () => {
        if (mobileMenu.classList.contains('hidden')) {
            // Show Menu
            mobileMenu.classList.remove('hidden')
            setTimeout(() => {
                mobileMenu.classList.remove('scale-y-0', 'opacity-0')
                mobileMenu.classList.add('scale-y-100', 'opacity-100')
            }, 10)

            // Animate Links One by One
            document.querySelectorAll('#mobileMenu .menu-item').forEach((item, i) => {
                item.style.opacity = '0'
                item.style.transform = 'translateX(-10px)'
                setTimeout(() => {
                    item.style.opacity = '1'
                    item.style.transform = 'translateX(0)'
                    item.style.transition = 'all 0.3s ease'
                }, 100 * i)
            })
        } else {
            // Hide Menu
            mobileMenu.classList.add('scale-y-0', 'opacity-0')
            setTimeout(() => {
                mobileMenu.classList.add('hidden')
            }, 300)
        }
    })
    // Hero Text Morph
    const texts = ["Hi, I'm Firzi", 'Laravel Developer', 'Tailwind Enthusiast', 'Creative Web Dev']
    let i = 0
    setInterval(() => {
        gsap.to('#heroTitle', {
            opacity: 0,
            duration: 0.5,
            onComplete: () => {
                i = (i + 1) % texts.length
                document.getElementById('heroTitle').textContent = texts[i]
                gsap.to('#heroTitle', { opacity: 1, duration: 0.5 })
            },
        })
    }, 3000)

    // Parallax About Image
    const aboutImg = document.getElementById('aboutImage')
    window.addEventListener('mousemove', (e) => {
        const x = (window.innerWidth / 2 - e.clientX) / 50
        const y = (window.innerHeight / 2 - e.clientY) / 50
        aboutImg.style.transform = `translate(${x}px,${y}px) scale(1.05)`
    })
    aboutImg.addEventListener(
        'mouseleave',
        () => (aboutImg.style.transform = 'translate(0,0) scale(1)'),
    )

    // Particle Background
    const canvas = document.getElementById('particleCanvas'),
        ctx = canvas.getContext('2d')
    canvas.width = window.innerWidth
    canvas.height = document.getElementById('about').offsetHeight
    let particles = []
    for (let i = 0; i < 50; i++) {
        particles.push({
            x: Math.random() * canvas.width,
            y: Math.random() * canvas.height,
            r: Math.random() * 3,
            dx: (Math.random() - 0.5) * 0.5,
            dy: (Math.random() - 0.5) * 0.5,
        })
    }
    function animateParticles() {
        ctx.clearRect(0, 0, canvas.width, canvas.height)
        ctx.fillStyle = 'rgba(99,102,241,0.3)'
        particles.forEach((p) => {
            ctx.beginPath()
            ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2)
            ctx.fill()
            p.x += p.dx
            p.y += p.dy
            if (p.x < 0 || p.x > canvas.width) p.dx *= -1
            if (p.y < 0 || p.y > canvas.height) p.dy *= -1
        })
        requestAnimationFrame(animateParticles)
    }
    animateParticles()

    // Lazy Load Projects
    const cards = document.querySelectorAll('.lazy-card')
    window.addEventListener('scroll', () => {
        cards.forEach((c) => {
            const rect = c.getBoundingClientRect()
            if (rect.top < window.innerHeight - 50) c.classList.add('visible')
        })
    })

    // Magnetic Cursor
    document.querySelectorAll('.magnetic').forEach((el) => {
        el.addEventListener('mousemove', (e) => {
            const r = el.getBoundingClientRect(),
                x = (e.clientX - (r.left + r.width / 2)) / 5,
                y = (e.clientY - (r.top + r.height / 2)) / 5
            el.style.transform = `translate(${x}px,${y}px)`
        })
        el.addEventListener('mouseleave', () => (el.style.transform = 'translate(0,0)'))
    })

    // Service Animation Card
    gsap.from('.service-card', {
        scrollTrigger: {
            trigger: '#services', // ID section services
            start: 'top 30%', // mulai saat 30% viewport
            toggleActions: 'play none none reverse',
        },
        opacity: 0,
        y: 80,
        scale: 0.8,
        rotateY: 10,
        duration: 1.2,
        stagger: 0.3,
        ease: 'back.out(1.7)',
        onComplete: () => {
            document.querySelectorAll('.service-card').forEach((card) => {
                card.classList.add('glow-effect')
            })
            setTimeout(() => {
                document.querySelectorAll('.service-card').forEach((card) => {
                    card.classList.remove('glow-effect')
                })
            }, 1200)
        },
    })

    // 🎯 Tilt Hover Premium
    document.querySelectorAll('.service-card').forEach((card) => {
        card.addEventListener('mousemove', (e) => {
            const rect = card.getBoundingClientRect()
            const x = e.clientX - rect.left
            const y = e.clientY - rect.top
            const centerX = rect.width / 2
            const centerY = rect.height / 2
            const rotateX = ((y - centerY) / centerY) * 6
            const rotateY = ((x - centerX) / centerX) * -6
            card.style.transform = `rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale(1.08)`
        })
        card.addEventListener('mouseleave', () => {
            card.style.transform = `rotateX(0deg) rotateY(0deg) scale(1)`
        })
    })

    // Button To TOP
    const scrollBtn = document.getElementById('scrollTopBtn')

    window.addEventListener('scroll', () => {
        if (window.scrollY > 300) {
            scrollBtn.classList.add('show')
            scrollBtn.classList.remove('hidden')
        } else {
            scrollBtn.classList.remove('show')
            setTimeout(() => scrollBtn.classList.add('hidden'), 300)
        }
    })

    scrollBtn.addEventListener('click', () => {
        gsap.to(window, { duration: 1, scrollTo: { y: 0 }, ease: 'power2.out' })
    })

    // Send To Email
    document.getElementById('contactForm').addEventListener('submit', async function(e){
    e.preventDefault();

    const form = e.target;
    const formData = new FormData(form);

    const response = await fetch("{{ route('contact.send.ajax') }}", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": "{{ csrf_token() }}"
        },
        body: formData
    });

    const result = await response.json();

    if(result.success){
        form.reset();
        const notif = document.getElementById('notif');
        notif.classList.remove('hidden');
        notif.classList.remove('scale-0');
        notif.classList.add('scale-100');

        setTimeout(() => {
            notif.classList.add('scale-0');
            setTimeout(() => notif.classList.add('hidden'), 300);
        }, 3000);
    }
});
</script>
