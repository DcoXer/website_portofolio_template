<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Portofolio Firzi</title>
        @vite('resources/css/app.css')
        <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet" />

        <style>
            html {
                scroll-behavior: smooth;
            }
            .navbar-scrolled {
                backdrop-filter: blur(10px);
                background: rgba(31, 29, 43, 0.8);
            }
            .gradient-animate {
                background: linear-gradient(180deg, #e3e3f3 0%, #d4d9ff 100%);
                background-size: 600% 600%;
                animation: gradientBG 10s ease infinite;
            }
            @keyframes gradientBG {
                0% {
                    background-position: 0%50%;
                }
                50% {
                    background-position: 100%50%;
                }
                100% {
                    background-position: 0%50%;
                }
            }

            /* Floating Shapes */
            .floating {
                position: absolute;
                width: 120px;
                height: 120px;
                background: rgba(255, 110, 199, 0.2);
                border-radius: 50%;
                filter: blur(50px);
                animation: float 10s infinite ease-in-out;
            }
            .floating:nth-child(2) {
                left: 70%;
                top: 30%;
                animation-delay: 3s;
                background: rgba(0, 201, 167, 0.2);
            }
            .floating:nth-child(3) {
                left: 20%;
                bottom: 20%;
                animation-delay: 6s;
                background: rgba(108, 99, 255, 0.2);
            }
            @keyframes float {
                0% {
                    transform: translateY(0);
                }
                50% {
                    transform: translateY(-40px);
                }
                100% {
                    transform: translateY(0);
                }
            }

            /* Particle */
            #particleCanvas {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                z-index: 0;
            }

            /* Lazy Load */
            .lazy-card {
                opacity: 0;
                transform: translateY(50px);
                transition:
                    opacity 0.6s ease,
                    transform 0.6s ease;
            }
            .lazy-card.visible {
                opacity: 1;
                transform: translateY(0);
            }

            /* Magnetic Cursor */
            .magnetic {
                display: inline-block;
                transition: transform 0.2s ease;
            }

            /* Border Gradient Animasi */
            .border-gradient {
                position: relative;
                display: inline-block;
                padding: 4px;
                border-radius: 50%;
                background: conic-gradient(from 0deg, #ff6ec7, #6c63ff, #00c9a7, #ff6ec7);
                animation: spin-border 10s linear infinite;
            }
            .border-gradient img {
                border-radius: 50%;
                display: block;
            }
            @keyframes spin-border {
                0% {
                    transform: rotate(0deg);
                }
                100% {
                    transform: rotate(360deg);
                }
            }

            /* Glassmorphism Contact Form */
            .glass {
                background: rgba(255, 255, 255, 0.1);
                backdrop-filter: blur(10px);
                border: 1px solid rgba(255, 255, 255, 0.2);
                border-radius: 16px;
            }
            footer {
                position: relative;
                overflow: hidden;
            }
            footer::before {
                content: '';
                position: absolute;
                top: 0;
                left: -50%;
                width: 200%;
                height: 2px;
                background: linear-gradient(90deg, transparent, #ff6ec7, #00c9a7, transparent);
                animation: footerGlow 5s linear infinite;
            }
            @keyframes footerGlow {
                0% {
                    transform: translateX(-50%);
                }
                100% {
                    transform: translateX(50%);
                }
            }

            /* Glow Effect */
            .glow-effect {
                box-shadow:
                    0 0 25px rgba(108, 99, 255, 0.7),
                    0 0 50px rgba(255, 110, 199, 0.3);
                transition: box-shadow 0.6s ease;
            }
            .service-card {
                opacity: 1;
                transform-style: preserve-3d;
                perspective: 1200px;
                transition:
                    transform 0.2s ease,
                    box-shadow 0.3s ease;
                border: 1px solid rgba(255, 255, 255, 0.1);
                background: rgba(255, 255, 255, 0.05);
            }
            .service-card:hover {
                box-shadow: 0 20px 50px rgba(108, 99, 255, 0.4);
            }
            .social-icon {
                transition: all 0.3s ease;
                background: rgba(255, 255, 255, 0.2);
            }
            .social-icon:hover {
                background: rgba(255, 255, 255, 0.4);
                transform: scale(1.1);
                box-shadow: 0 0 12px rgba(108, 99, 255, 0.4);
            }
            .section-gradient-1 {
                background: linear-gradient(180deg, #e3e3f3 0%, #d4d9ff 100%);
            }
            .section-gradient-2 {
                background: linear-gradient(180deg, #d4d9ff 0%, #c9d6ff 100%);
            }
            .section-gradient-3 {
                background: linear-gradient(180deg, #c9d6ff 0%, #bfc8ff 100%);
            }
            .section-gradient-4 {
                background: linear-gradient(180deg, #bfc8ff 0%, #aebbff 100%);
            }
            #scrollTopBtn {
                opacity: 0;
                transform: translateY(50px);
                transition:
                    opacity 0.3s ease,
                    transform 0.3s ease;
            }
            #scrollTopBtn.show {
                opacity: 1;
                transform: translateY(0);
            }
        </style>
    </head>
    <body class="bg-[#F9FAFB] font-sans text-gray-200">
        <!-- Floating Background Shapes -->
        <div class="floating" style="left: 10%; top: 10%"></div>
        <div class="floating"></div>
        <div class="floating"></div>

        <!-- Navbar -->
        <nav
            id="navbar"
            class="fixed z-50 w-full bg-[#1F1D2B]/70 shadow-md backdrop-blur-md transition"
        >
            <div class="mx-auto flex max-w-6xl items-center justify-between px-6 py-4">
                <h1 class="magnetic text-2xl font-bold text-[#FF6EC7]">Firzi.dev</h1>
                <ul class="hidden gap-20 font-medium tracking-wide text-white md:flex">
                    <li><a href="#heroTitle" class="magnetic hover:text-[#00C9A7]">Home</a></li>
                    <li><a href="#about" class="magnetic hover:text-[#00C9A7]">About</a></li>
                    <li><a href="#services" class="magnetic hover:text-[#00C9A7]">Services</a></li>
                    <li><a href="#projects" class="magnetic hover:text-[#00C9A7]">Projects</a></li>
                    <li><a href="#contact" class="magnetic hover:text-[#00C9A7]">Contact</a></li>
                </ul>
                <button id="menuToggle" class="p-2 text-white focus:outline-none md:hidden">
                    <svg
                        id="menuIcon"
                        class="h-7 w-7"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M4 6h16M4 12h16M4 18h16"
                        />
                    </svg>
                </button>
            </div>
            <!-- Mobile Menu -->
            <div
                id="mobileMenu"
                class="bg-transparant mt-2 hidden origin-top scale-y-0 transform flex-col rounded-b-2xl px-8 pb-6 opacity-0 shadow-2xl transition-all duration-300 ease-in-out"
            >
                <a
                    href="#heroTitle"
                    class="menu-item border-b border-gray-700/50 py-3 text-lg font-medium text-white transition-all duration-300 hover:pl-2 hover:text-[#00C9A7]"
                >
                    Home
                </a>
                <a
                    href="#about"
                    class="menu-item border-b border-gray-700/50 py-3 text-lg font-medium text-white transition-all duration-300 hover:pl-2 hover:text-[#00C9A7]"
                >
                    About
                </a>
                <a
                    href="#services"
                    class="menu-item border-b border-gray-700/50 py-3 text-lg font-medium text-white transition-all duration-300 hover:pl-2 hover:text-[#00C9A7]"
                >
                    Services
                </a>
                <a
                    href="#projects"
                    class="menu-item border-b border-gray-700/50 py-3 text-lg font-medium text-white transition-all duration-300 hover:pl-2 hover:text-[#00C9A7]"
                >
                    Projects
                </a>
                <a
                    href="#contact"
                    class="menu-item py-3 text-lg font-medium text-white transition-all duration-300 hover:pl-2 hover:text-[#00C9A7]"
                >
                    Contact
                </a>
            </div>
        </nav>

        <!-- Hero -->
        <section
            class="gradient-animate relative flex min-h-screen flex-col items-center justify-center overflow-hidden text-center"
        >
            <h2
                id="heroTitle"
                class="text-5xl font-extrabold text-gray-600 drop-shadow-lg md:text-7xl"
            >
                Hi, I'm Firzi
            </h2>
            <p class="mx-auto mt-4 max-w-xl text-lg text-gray-500 md:text-2xl">
                Web Developer | Laravel Enthusiast | Tech Explorer
            </p>
            <a
                href="#projects"
                class="magnetic relative z-10 mt-6 rounded-full bg-white px-8 py-3 text-base font-semibold text-[#6C63FF] shadow-lg transition hover:scale-105 md:text-lg"
            >
                Jelajahi Semua Karya & Proyek Kreatif Saya
            </a>
        </section>

        <!-- About -->
        <section id="about" class="section-gradient-1 relative overflow-hidden py-24">
            <canvas id="particleCanvas"></canvas>
            <div
                class="relative z-10 mx-auto flex max-w-6xl flex-col items-center gap-10 px-6 md:flex-row"
            >
                <div class="flex justify-center md:w-1/2" data-aos="fade-right">
                    <div class="border-gradient">
                        <img
                            id="aboutImage"
                            src="{{ asset('images/my_foto.jpg') }}"
                            alt="Firzi"
                            class="h-64 w-64 object-cover shadow-2xl"
                        />
                    </div>
                </div>
                <div class="md:w-1/2" data-aos="fade-left">
                    <h3 class="mb-4 text-4xl font-extrabold text-[#1F1D2B]">Tentang Saya</h3>
                    <p class="mb-6 text-lg leading-relaxed text-gray-700">
                        Saya
                        <span class="font-semibold text-[#6C63FF]">Firzi</span>
                        , developer yang suka membuat website
                        <span class="text-[#00C9A7]">modern, interaktif, dan high-end</span>
                        .
                    </p>
                    <div class="mb-6 flex flex-wrap gap-3">
                        @foreach (['Laravel', 'Tailwind CSS', 'GSAP', 'Livewire', 'MySQL', 'REST API'] as $skill)
                            <span
                                class="rounded-full bg-[#6C63FF]/10 px-3 py-1 text-sm font-medium text-[#6C63FF] shadow-sm transition hover:bg-[#6C63FF]/20"
                            >
                                {{ $skill }}
                            </span>
                        @endforeach
                    </div>
                    <a
                        href="#projects"
                        class="magnetic inline-block rounded-lg bg-[#6C63FF] px-6 py-3 text-white shadow-lg transition hover:scale-105"
                    >
                        Lihat Project Saya →
                    </a>
                </div>
            </div>
        </section>

        <!-- Services -->
        <section id="services" class="section-gradient-2 relative overflow-hidden py-24 text-white">
            <div class="mx-auto max-w-6xl px-6 text-center">
                <h3 class="mb-4 text-3xl font-extrabold text-[#1F1D2B]">
                    Apa yang Bisa Saya Bantu?
                </h3>
                <p class="mb-10 text-lg text-gray-700 opacity-90">
                    Saya siap membantu Anda membangun solusi digital dengan performa tinggi, desain
                    elegan, dan teknologi terkini.
                </p>

                <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-4">
                    @php
                        $services = [
                            ['title' => 'Web Development', 'desc' => 'Website modern, cepat, dan responsif menggunakan teknologi terbaru.', 'icon' => '🌐'],
                            ['title' => 'UI/UX Design', 'desc' => 'Desain antarmuka yang elegan dan pengalaman pengguna yang optimal.', 'icon' => '🎨'],
                            ['title' => 'API Integration', 'desc' => 'Integrasi API yang aman, cepat, dan stabil untuk aplikasi Anda.', 'icon' => '🔗'],
                            ['title' => 'Website Maintenance', 'desc' => 'Perawatan dan optimasi website agar selalu maksimal.', 'icon' => '🛠️'],
                        ];
                    @endphp

                    @foreach ($services as $service)
                        <div
                            class="service-card relative rounded-2xl bg-white/10 p-6 shadow-lg backdrop-blur-md"
                        >
                            <div
                                class="absolute inset-0 rounded-2xl bg-gradient-to-r from-[#6C63FF]/20 to-[#FF6EC7]/20 opacity-0 transition duration-300 hover:opacity-100"
                            ></div>
                            <div class="relative z-10 flex flex-col items-center text-center">
                                <div class="mb-4 text-4xl">{!! $service['icon'] !!}</div>
                                <h4 class="mb-2 text-xl font-bold text-[#1F1D2B]">
                                    {{ $service['title'] }}
                                </h4>
                                <p class="text-gray-700">{{ $service['desc'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Projects -->
        <section id="projects" class="section-gradient-2 py-16 text-gray-700">
            <canvas id="particleCanvas"></canvas>
            <div class="mx-auto max-w-6xl px-6">
                <h3 class="mb-10 text-center text-3xl font-bold">Project Terbaru</h3>
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ([1, 2, 3, 4, 5, 6] as $p)
                        <div
                            class="project-card lazy-card transform overflow-hidden rounded-xl bg-white/10 shadow-lg backdrop-blur-md transition duration-300 hover:scale-105"
                        >
                            <img
                                src="{{ asset('images/my_foto.jpg') }}"
                                alt="Project"
                                class="opacity-90"
                            />
                            <div class="p-4">
                                <h4 class="text-lg font-bold">Project {{ $p }}</h4>
                                <p class="mt-2 text-sm text-gray-800">
                                    Deskripsi singkat project ini...
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Contact -->
        <section id="contact" class="section-gradient-3 py-20 text-gray-800">
            <div class="mx-auto max-w-3xl px-6 text-center">
                <h3 class="mb-6 text-3xl font-bold text-[#1F1D2B]">Hubungi Saya</h3>
                <p class="mb-8 text-lg opacity-80">Punya project atau ide? Ayo kolaborasi!</p>

                <!-- Social Media -->
                <div
                    class="mb-10 grid grid-cols-3 gap-4 px-4 sm:flex sm:flex-wrap sm:justify-center sm:gap-6"
                >
                    @php
                        $socials = [
                            ['name' => 'Github', 'url' => 'https://github.com/DcoXer', 'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24"><path d="M12 .5C5.4.5 0 5.9 0 12.4c0 5.3 3.4 9.8 8.2 11.3.6.1.8-.3.8-.6v-2c-3.3.7-4-1.5-4-1.5-.5-1.1-1.3-1.5-1.3-1.5-1-.7.1-.7.1-.7 1.1.1 1.7 1.1 1.7 1.1 1 .1.5.2 1.5.3.2-.7.5-1.1.9-1.4-2.6-.3-5.3-1.3-5.3-5.9 0-1.3.5-2.3 1.2-3.2-.1-.3-.5-1.5.1-3.2 0 0 1-.3 3.3 1.2a11.2 11.2 0 0 1 6 0C16.7 4.7 17.7 5 17.7 5c.6 1.7.2 2.9.1 3.2.7.9 1.2 1.9 1.2 3.2 0 4.6-2.7 5.6-5.3 5.9.5.4.9 1.1.9 2.3v3.3c0 .3.2.7.8.6C20.6 22.2 24 17.7 24 12.4 24 5.9 18.6.5 12 .5z"/></svg>'],
                            ['name' => 'LinkedIn', 'url' => 'https://linkedin.com/in/#', 'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24"><path d="M4.98 3.5A2.5 2.5 0 0 0 2.5 6a2.5 2.5 0 1 0 2.48-2.5zM2.5 21.5h5v-12h-5v12zm7.5 0h5v-7c0-1.9 2-2.1 2-2.1 1.9 0 1.5 1.9 1.5 1.9v7.2h5V14c0-5.4-5-5.2-5-5.2-2.3 0-3.5 1.3-3.5 1.3V9.5h-5v12z"/></svg>'],
                            ['name' => 'Instagram', 'url' => 'https://instagram.com/#', 'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24"><path d="M7.5 2h9A5.5 5.5 0 0 1 22 7.5v9A5.5 5.5 0 0 1 16.5 22h-9A5.5 5.5 0 0 1 2 16.5v-9A5.5 5.5 0 0 1 7.5 2zm0 2A3.5 3.5 0 0 0 4 7.5v9A3.5 3.5 0 0 0 7.5 20h9A3.5 3.5 0 0 0 20 16.5v-9A3.5 3.5 0 0 0 16.5 4h-9zm4.5 3a5.5 5.5 0 1 1 0 11 5.5 5.5 0 0 1 0-11zm0 2A3.5 3.5 0 1 0 15.5 12 3.5 3.5 0 0 0 12 9zm5.5-3a1.5 1.5 0 1 1-1.5 1.5A1.5 1.5 0 0 1 17.5 6z"/></svg>'],
                            ['name' => 'Facebook', 'url' => 'https://facebook.com/#', 'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12.07C22 6.48 17.52 2 12 2S2 6.48 2 12.07c0 5.02 3.66 9.18 8.44 9.93v-7.03H7.9v-2.9h2.54V9.41c0-2.5 1.49-3.89 3.77-3.89 1.09 0 2.24.2 2.24.2v2.47h-1.26c-1.24 0-1.63.77-1.63 1.56v1.87h2.78l-.44 2.9h-2.34V22c4.78-.75 8.44-4.91 8.44-9.93z"/></svg>'],
                            ['name' => 'YouTube', 'url' => 'https://youtube.com/#', 'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24"><path d="M23.5 6.2a2.9 2.9 0 0 0-2.1-2c-1.9-.5-9.4-.5-9.4-.5s-7.5 0-9.4.5a2.9 2.9 0 0 0-2.1 2C0 8.1 0 12 0 12s0 3.9.5 5.8a2.9 2.9 0 0 0 2.1 2c1.9.5 9.4.5 9.4.5s7.5 0 9.4-.5a2.9 2.9 0 0 0 2.1-2c.5-1.9.5-5.8.5-5.8s0-3.9-.5-5.8zM9.6 15.4V8.6L15.8 12l-6.2 3.4z"/></svg>'],
                            ['name' => 'WhatsApp', 'url' => 'https://wa.me/#', 'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24"><path d="M20.5 3.5A11.8 11.8 0 0 0 12 0C5.4 0 0 5.4 0 12a11.8 11.8 0 0 0 1.6 6l-1.6 6 6.2-1.6A12 12 0 0 0 12 24c6.6 0 12-5.4 12-12 0-3.2-1.3-6.2-3.5-8.5zM12 22c-1.8 0-3.5-.5-5-1.3l-.3-.2-3.7 1 1-3.6-.3-.3a10 10 0 1 1 8.3 4.4zm5.2-7.7c-.3-.1-1.8-.9-2.1-1-.3-.1-.5-.1-.7.1-.2.3-.8 1-.9 1.1-.2.2-.3.2-.6.1-.3-.1-1.3-.5-2.5-1.6-.9-.8-1.6-1.8-1.7-2.1-.2-.3 0-.4.1-.6l.4-.5c.1-.2.2-.3.3-.5.1-.2.1-.3 0-.5-.1-.2-.7-1.7-.9-2.3-.3-.6-.5-.5-.7-.5h-.6c-.2 0-.5.1-.8.3s-1 1-1 2.4c0 1.4 1.1 2.7 1.2 2.9.1.2 2.2 3.3 5.3 4.6.7.3 1.3.5 1.7.6.7.2 1.3.2 1.8.1.6-.1 1.8-.7 2-1.4.2-.7.2-1.3.2-1.5-.1-.2-.3-.3-.6-.4z"/></svg>'],
                        ];
                    @endphp

                    @foreach ($socials as $s)
                        <a
                            href="{{ $s['url'] }}"
                            target="_blank"
                            class="social-icon flex items-center justify-center rounded-full p-3 transition-all duration-300 hover:scale-110 hover:shadow-lg sm:p-4"
                            title="{{ $s['name'] }}"
                        >
                            {!! $s['icon'] !!}
                        </a>
                    @endforeach
                </div>

                <!-- Contact Form Glass -->
                <form
                    action="{{ route('contact.send.ajax') }}"
                    method="POST"
                    class="glass mx-auto flex max-w-xl flex-col gap-4 p-6"
                >
                    @csrf
                    <input
                        type="text"
                        name="name"
                        placeholder="Nama"
                        class="rounded bg-white/30 p-3 text-gray-800 placeholder-gray-600 focus:outline-none"
                        required
                    />
                    <input
                        type="email"
                        name="email"
                        placeholder="Email"
                        class="rounded bg-white/30 p-3 text-gray-800 placeholder-gray-600 focus:outline-none"
                        required
                    />
                    <textarea
                        name="message"
                        rows="4"
                        placeholder="Pesan"
                        class="rounded bg-white/30 p-3 text-gray-800 placeholder-gray-600 focus:outline-none"
                        required
                    ></textarea>
                    <button
                        type="submit"
                        class="magnetic rounded-lg bg-[#6C63FF] px-6 py-3 font-semibold text-white shadow-lg transition hover:scale-105 hover:bg-[#5a50e0]"
                    >
                        Kirim Pesan
                    </button>

                    @if (session('success'))
                        <p class="mt-2 text-green-600">{{ session('success') }}</p>
                    @endif
                </form>
            </div>
        </section>

        <!-- Footer -->
        <footer class="section-gradient-4 relative overflow-hidden py-6 text-center text-black">
            <p>© 2025 Firzi.dev | All Rights Reserved</p>
        </footer>

        <!-- Tombol Scroll ke Atas -->
        <button
            id="scrollTopBtn"
            class="fixed bottom-6 right-6 z-50 hidden rounded-full bg-[#6C63FF] p-3 shadow-lg transition hover:scale-110 hover:bg-[#5a50e0]"
        >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6 text-white"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M5 15l7-7 7 7"
                />
            </svg>
        </button>

        @include('partials.scripts-animasi')
    </body>
</html>
