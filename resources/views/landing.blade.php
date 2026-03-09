<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ClientFlow Pro - The Ultimate Project & Client Management Platform</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Outfit:wght@500;700;900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #0B0E14; color: #FFFFFF; overflow-x: hidden; }
        h1, h2, h3, .font-display { font-family: 'Outfit', sans-serif; }
        .hero-glow {
            position: absolute;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(79,70,229,0.15) 0%, rgba(0,0,0,0) 70%);
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 0;
            pointer-events: none;
        }
        .animate-float {
            animation: float 6s ease-in-out infinite;
        }
        .animate-float-delayed {
            animation: float 6s ease-in-out 3s infinite;
        }
        @keyframes float {
            0% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(2deg); }
            100% { transform: translateY(0px) rotate(0deg); }
        }
        .glass-panel {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }
        .gradient-text {
            background: linear-gradient(135deg, #A5B4FC 0%, #6366F1 50%, #C084FC 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
    </style>
</head>
<body class="antialiased selection:bg-[#4F46E5] selection:text-white">

    <!-- Navigation -->
    <nav class="fixed w-full z-50 glass-panel border-b-0 transition-all duration-300" id="navbar">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <div class="flex items-center gap-2">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-[#4F46E5] to-[#7C3AED] flex items-center justify-center shadow-lg shadow-indigo-500/20">
                        <span class="text-white font-bold text-xl font-display">C</span>
                    </div>
                    <span class="font-display font-bold text-xl tracking-tight text-white">ClientFlow</span>
                </div>
                <div class="hidden md:flex items-center gap-8">
                    <a href="#features" class="text-sm font-medium text-gray-300 hover:text-white transition-colors">Features</a>
                    <a href="#testimonials" class="text-sm font-medium text-gray-300 hover:text-white transition-colors">Testimonials</a>
                    <a href="#pricing" class="text-sm font-medium text-gray-300 hover:text-white transition-colors">Pricing</a>
                </div>
                <div class="flex items-center gap-4">
                    <a href="{{ route('login') }}" class="hidden sm:block text-sm font-medium text-gray-300 hover:text-white transition-colors">Log in</a>
                    <a href="{{ route('dashboard') }}" class="px-5 py-2.5 rounded-full text-sm font-semibold text-white bg-gradient-to-r from-[#4F46E5] to-[#7C3AED] hover:from-[#4338CA] hover:to-[#6D28D9] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-[#0B0E14] focus:ring-[#4F46E5] transition-all shadow-lg shadow-indigo-500/25 hover:shadow-indigo-500/40 hover:-translate-y-0.5">
                        Get Started Free
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="relative pt-32 pb-20 sm:pt-40 sm:pb-28 overflow-hidden">
        <div class="hero-glow"></div>
        
        <!-- Decorative background elements -->
        <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-indigo-500/10 rounded-full mix-blend-screen filter blur-3xl opacity-50 animate-pulse"></div>
        <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-purple-500/10 rounded-full mix-blend-screen filter blur-3xl opacity-50 animate-pulse" style="animation-delay: 2s;"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center z-10">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full glass-panel mb-8 border border-indigo-500/30">
                <span class="flex h-2 w-2 relative">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-indigo-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-indigo-500"></span>
                </span>
                <span class="text-xs font-medium text-indigo-300 tracking-wide uppercase">ClientFlow Pro 2.0 is live</span>
            </div>
            
            <h1 class="text-5xl sm:text-7xl font-display font-black tracking-tight mb-6 leading-tight">
                Manage agencies with <br class="hidden sm:block">
                <span class="gradient-text">effortless precision.</span>
            </h1>
            
            <p class="mt-4 max-w-2xl mx-auto text-lg sm:text-xl text-gray-400 font-medium mb-10">
                The all-in-one platform to track projects, collaborate with your team, and invoice clients without the usual friction. Built for modern digital teams.
            </p>
            
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="{{ route('dashboard') }}" class="w-full sm:w-auto px-8 py-4 rounded-full text-base font-semibold text-white bg-gradient-to-r from-[#4F46E5] to-[#7C3AED] hover:from-[#4338CA] hover:to-[#6D28D9] transition-all shadow-xl shadow-indigo-500/20 hover:shadow-indigo-500/40 hover:-translate-y-1 flex items-center justify-center gap-2">
                    Start your free trial
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                </a>
                <a href="#features" class="w-full sm:w-auto px-8 py-4 rounded-full text-base font-semibold text-white glass-panel hover:bg-white/10 transition-colors flex items-center justify-center gap-2">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    See how it works
                </a>
            </div>
        </div>

        <!-- 3D Transparent Illustration / Mockup -->
        <div class="relative max-w-5xl mx-auto mt-20 px-4 sm:px-6 lg:px-8 z-10">
            <div class="relative rounded-2xl p-1 bg-gradient-to-b from-white/10 to-transparent shadow-2xl animate-float">
                <div class="glass-panel rounded-xl overflow-hidden shadow-2xl relative">
                    <!-- Faux browser bar -->
                    <div class="h-10 bg-black/40 border-b border-white/5 flex items-center px-4 gap-2">
                        <div class="w-2.5 h-2.5 rounded-full bg-red-500/80"></div>
                        <div class="w-2.5 h-2.5 rounded-full bg-yellow-500/80"></div>
                        <div class="w-2.5 h-2.5 rounded-full bg-green-500/80"></div>
                        <div class="mx-auto bg-black/50 h-5 w-64 rounded text-[10px] text-gray-400 flex items-center justify-center font-mono">app.clientflow.com</div>
                    </div>
                    <!-- Mockup content -->
                    <div class="relative w-full aspect-[16/9] bg-[#121212] overflow-hidden flex items-center justify-center">
                        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-5"></div>
                        <!-- Online Image with transparency as requested -->
                        <img src="https://illustrations.popsy.co/amber/freelancer.svg" alt="App Dashboard Mockup" class="w-3/4 max-w-lg object-contain drop-shadow-2xl z-10 transform hover:scale-105 transition-transform duration-700">
                        
                        <!-- Floating UI Elements to make it dynamic -->
                        <div class="absolute top-1/4 left-[10%] glass-panel p-4 rounded-xl animate-float-delayed flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-green-500/20 flex items-center justify-center"><svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg></div>
                            <div>
                                <p class="text-sm font-bold text-white">Invoice Paid</p>
                                <p class="text-xs text-gray-400">$4,200.00 from Acme Corp</p>
                            </div>
                        </div>

                        <div class="absolute bottom-1/4 right-[10%] glass-panel p-4 rounded-xl animate-float flex flex-col gap-2">
                            <p class="text-sm font-bold text-white mb-1">Project Progress</p>
                            <div class="h-2 w-32 bg-gray-800 rounded-full overflow-hidden">
                                <div class="h-full bg-indigo-500 w-[75%]"></div>
                            </div>
                            <p class="text-xs text-indigo-300">75% Complete</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div id="features" class="py-24 bg-[#0B0E14] relative border-t border-white/5">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl md:text-5xl font-display font-bold mb-4">Everything you need to run your service business.</h2>
                <p class="text-gray-400 text-lg">Replace your fragmented tool stack with a single, elegant platform designed specifically for client-facing teams.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="glass-panel p-8 rounded-2xl hover:-translate-y-2 transition-transform duration-300 group">
                    <div class="w-14 h-14 rounded-xl bg-indigo-500/10 border border-indigo-500/20 flex items-center justify-center mb-6 group-hover:bg-indigo-500/20 transition-colors">
                        <svg class="w-7 h-7 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.956 11.956 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3 font-display">Project Management</h3>
                    <p class="text-gray-400 leading-relaxed">Organize tasks systematically with Kanban boards, list views, and detailed progress tracking. Never miss a deadline again.</p>
                </div>
                <!-- Feature 2 -->
                <div class="glass-panel p-8 rounded-2xl hover:-translate-y-2 transition-transform duration-300 group relative overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-br from-purple-500/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <div class="w-14 h-14 rounded-xl bg-purple-500/10 border border-purple-500/20 flex items-center justify-center mb-6 group-hover:bg-purple-500/20 transition-colors relative z-10">
                        <svg class="w-7 h-7 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3 font-display relative z-10">Client CRM</h3>
                    <p class="text-gray-400 leading-relaxed relative z-10">Keep a centralized database of all your clients automatically synced with their ongoing projects and overdue invoices.</p>
                </div>
                <!-- Feature 3 -->
                <div class="glass-panel p-8 rounded-2xl hover:-translate-y-2 transition-transform duration-300 group">
                    <div class="w-14 h-14 rounded-xl bg-emerald-500/10 border border-emerald-500/20 flex items-center justify-center mb-6 group-hover:bg-emerald-500/20 transition-colors">
                        <svg class="w-7 h-7 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3 font-display">Invoicing & Payments</h3>
                    <p class="text-gray-400 leading-relaxed">Generate beautiful PDF invoices in a single click based on project milestones and track payment statuses in real-time.</p>
                </div>
            </div>
            
            <div class="mt-20 glass-panel rounded-3xl p-8 sm:p-12 flex flex-col md:flex-row items-center justify-between gap-10 overflow-hidden relative">
                <div class="absolute inset-0 bg-gradient-to-r from-indigo-500/10 to-transparent"></div>
                <div class="relative z-10 md:w-1/2">
                    <h2 class="text-3xl font-display font-bold mb-4">Dark Mode, by default.</h2>
                    <p class="text-gray-400 text-lg mb-6">Experience a meticulously crafted dark theme that reduces eye strain using the perfect balance of contrast and deep warm backgrounds, inspired by the best productivity tools.</p>
                    <ul class="space-y-3">
                        <li class="flex items-center gap-3"><svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> Persistent local storage</li>
                        <li class="flex items-center gap-3"><svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> Respects system preferences</li>
                    </ul>
                </div>
                <div class="relative z-10 md:w-1/2 w-full flex justify-center">
                    <img src="https://illustrations.popsy.co/amber/graphic-design.svg" alt="Launch illustration" class="w-full max-w-md drop-shadow-2xl">
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="py-24 relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-b from-[#0B0E14] to-indigo-950/20"></div>
        <div class="relative max-w-4xl mx-auto px-4 text-center z-10">
            <h2 class="text-4xl md:text-5xl font-display font-bold mb-6">Ready to scale your agency?</h2>
            <p class="text-xl text-gray-400 mb-10">Join thousands of freelancers and agencies who moved to ClientFlow to reclaim their time and sanity.</p>
            <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-2 px-8 py-4 rounded-full text-lg font-bold text-white bg-white/10 hover:bg-white/20 border border-white/20 transition-all shadow-2xl hover:scale-105">
                Go to Dashboard
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </a>
        </div>
    </div>

    <!-- Footer -->
    <footer class="border-t border-white/5 bg-[#0B0E14] py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row justify-between items-center gap-6">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 rounded-lg bg-indigo-500/20 border border-indigo-500/30 flex items-center justify-center">
                    <span class="text-indigo-400 font-bold font-display">C</span>
                </div>
                <span class="font-display font-bold text-gray-300">ClientFlow Pro</span>
            </div>
            <p class="text-sm text-gray-500">© 2026 ClientFlow Inc. All rights reserved.</p>
            <div class="flex gap-6">
                <a href="#" class="text-gray-500 hover:text-white transition-colors">Twitter</a>
                <a href="#" class="text-gray-500 hover:text-white transition-colors">GitHub</a>
                <a href="#" class="text-gray-500 hover:text-white transition-colors">Dribbble</a>
            </div>
        </div>
    </footer>

    <script>
        // Simple navbar background transition on scroll
        window.addEventListener('scroll', () => {
            const nav = document.getElementById('navbar');
            if (window.scrollY > 20) {
                nav.classList.add('bg-[#0B0E14]/80');
                nav.classList.remove('border-transparent');
                nav.classList.add('border-white/5');
            } else {
                nav.classList.remove('bg-[#0B0E14]/80');
                nav.classList.add('border-transparent');
                nav.classList.remove('border-white/5');
            }
        });
    </script>
</body>
</html>
