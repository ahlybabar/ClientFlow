@php
    $navItems = [
        ['route' => 'dashboard', 'icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6', 'label' => 'Dashboard'],
        ['route' => 'clients.index', 'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z', 'label' => 'Clients'],
        ['route' => 'projects.index', 'icon' => 'M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10', 'label' => 'Projects'],
        ['route' => 'tasks.index', 'icon' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4', 'label' => 'Tasks'],
        ['route' => 'invoices.index', 'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z', 'label' => 'Invoices'],
        ['route' => 'payments.index', 'icon' => 'M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z', 'label' => 'Payments'],
        ['route' => 'team.index', 'icon' => 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z', 'label' => 'Team'],
        ['route' => 'analytics.index', 'icon' => 'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z', 'label' => 'Analytics'],
        ['route' => 'settings.index', 'icon' => 'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z M15 12a3 3 0 11-6 0 3 3 0 016 0z', 'label' => 'Settings'],
    ];
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ClientFlow Pro') - Client & Project Management</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script>
        // Initialize theme before styles load to avoid flash
        try {
            const savedTheme = localStorage.getItem('theme');
            const prefersDark = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
            if (savedTheme === 'dark' || (!savedTheme && prefersDark)) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        } catch (e) {}
    </script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-[#F8FAFC] text-[#0F172A] dark:bg-[#020617] dark:text-[#E2E8F0] transition-colors">
    <div class="flex min-h-screen" x-data="globalApp()" x-init="init()">
        <!-- Sidebar -->
        <aside class="fixed left-0 top-0 z-40 w-64 h-screen bg-white border-r border-[#E2E8F0] dark:bg-[#1E293B] dark:border-[#1E293B] hidden lg:flex flex-col transition-colors">
            <div class="flex h-16 items-center px-4 border-b border-[#E2E8F0]">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-2">
                    <div class="w-9 h-9 rounded-lg bg-[#4F46E5] flex items-center justify-center shrink-0">
                        <span class="text-white font-bold text-lg">C</span>
                    </div>
                    <span class="font-semibold text-[#0F172A] dark:text-[#E2E8F0]">ClientFlow Pro</span>
                </a>
            </div>
            <nav class="flex-1 overflow-y-auto py-4 px-3">
                @foreach($navItems as $item)
                    <a href="{{ route($item['route']) }}"
                       class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-[#64748B] hover:bg-[#F1F5F9] hover:text-[#4F46E5] dark:text-[#9CA3AF] dark:hover:bg-[#111827] dark:hover:text-[#E5E7EB] transition-colors {{ request()->routeIs($item['route'].'*') ? 'bg-[#EEF2FF] text-[#4F46E5] dark:bg-[#111827] dark:text-[#E5E7EB] font-medium' : '' }}">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item['icon'] }}"/>
                        </svg>
                        <span class="whitespace-nowrap">{{ $item['label'] }}</span>
                    </a>
                @endforeach
            </nav>
        </aside>

        <!-- Mobile sidebar -->
        <aside x-show="mobileSidebarOpen" x-transition
             class="fixed left-0 top-0 z-40 h-screen w-64 bg-white border-r border-[#E2E8F0] dark:bg-[#020617] dark:border-[#020617] lg:hidden flex flex-col">
            <div class="flex h-16 items-center justify-between px-4 border-b border-[#E2E8F0]">
                <span class="font-semibold text-[#0F172A] dark:text-[#E2E8F0]">ClientFlow Pro</span>
                <button @click="mobileSidebarOpen = false" class="p-2 rounded-lg hover:bg-[#F1F5F9] dark:hover:bg-[#111827]">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
            <nav class="flex-1 overflow-y-auto py-4 px-3">
                @foreach($navItems as $item)
                    <a href="{{ route($item['route']) }}" @click="mobileSidebarOpen = false"
                       class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-[#64748B] hover:bg-[#F1F5F9] hover:text-[#4F46E5] dark:text-[#9CA3AF] dark:hover:bg-[#111827] dark:hover:text-[#E5E7EB] {{ request()->routeIs($item['route'].'*') ? 'bg-[#EEF2FF] text-[#4F46E5] dark:bg-[#111827] dark:text-[#E5E7EB] font-medium' : '' }}">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item['icon'] }}"/></svg>
                        {{ $item['label'] }}
                    </a>
                @endforeach
            </nav>
        </aside>
        <div x-show="mobileSidebarOpen" x-transition.opacity @click="mobileSidebarOpen = false"
             class="fixed inset-0 z-30 bg-black/50 lg:hidden"></div>

        <!-- Main content -->
        <div class="flex-1 flex flex-col min-w-0 lg:pl-64">
            <!-- Top Bar -->
            <header class="sticky top-0 z-20 flex h-16 items-center gap-4 border-b border-[#E2E8F0] bg-white dark:bg-[#020617] dark:border-[#020617] px-4 lg:px-8 transition-colors">
                <button @click="mobileSidebarOpen = true" class="lg:hidden p-2 rounded-lg hover:bg-[#F1F5F9] dark:hover:bg-[#111827]">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
                <button @click="commandOpen = true" class="flex-1 max-w-xl flex items-center gap-3 px-4 py-2 bg-[#F8FAFC] dark:bg-[#020617] border border-[#E2E8F0] dark:border-[#111827] rounded-lg text-left text-sm text-[#64748B] dark:text-[#9CA3AF] hover:border-[#4F46E5] dark:hover:border-[#6366F1] transition-colors">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    <span>Search clients, projects, tasks...</span>
                    <kbd class="ml-auto hidden sm:inline-flex px-2 py-0.5 text-xs font-mono bg-white rounded border border-[#E2E8F0]">⌘K</kbd>
                </button>
                <div class="flex items-center gap-1 sm:gap-2">
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open; notifOpen = false" class="p-2 rounded-lg hover:bg-[#F1F5F9] dark:hover:bg-[#111827] relative">
                            <svg class="w-5 h-5 text-[#64748B] dark:text-[#9CA3AF]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                            </svg>
                            <span class="absolute top-1 right-1 w-2 h-2 bg-[#EF4444] rounded-full"></span>
                        </button>
                        <div x-show="open" @click.outside="open = false" x-transition
                             class="absolute right-0 mt-2 w-80 max-h-96 overflow-y-auto bg-white dark:bg-[#020617] rounded-xl shadow-lg border border-[#E2E8F0] dark:border-[#111827] py-2">
                            <div class="px-4 py-2 flex items-center justify-between border-b border-[#E2E8F0] dark:border-[#111827]">
                                <span class="font-semibold text-[#0F172A] dark:text-[#E5E7EB]">Notifications</span>
                                <a href="{{ route('notifications.index') }}" class="text-sm text-[#4F46E5] hover:underline">View all</a>
                            </div>
                            <a href="{{ route('tasks.index') }}" class="flex gap-3 px-4 py-3 hover:bg-[#F8FAFC] dark:hover:bg-[#111827]">
                                <div class="w-10 h-10 rounded-full bg-[#EEF2FF] flex items-center justify-center shrink-0 text-[#4F46E5] text-sm font-medium">T</div>
                                <div>
                                    <p class="text-sm font-medium text-[#0F172A] dark:text-[#E5E7EB]">Task assigned: Design homepage mockup</p>
                                    <p class="text-xs text-[#64748B] dark:text-[#9CA3AF]">2 hours ago</p>
                                </div>
                            </a>
                            <a href="{{ route('invoices.show', 1) }}" class="flex gap-3 px-4 py-3 hover:bg-[#F8FAFC] dark:hover:bg-[#111827]">
                                <div class="w-10 h-10 rounded-full bg-[#ECFDF5] flex items-center justify-center shrink-0 text-[#22C55E] text-sm font-medium">$</div>
                                <div>
                                    <p class="text-sm font-medium text-[#0F172A] dark:text-[#E5E7EB]">Invoice INV-0042 paid</p>
                                    <p class="text-xs text-[#64748B] dark:text-[#9CA3AF]">1 day ago</p>
                                </div>
                            </a>
                            <a href="{{ route('projects.show', 1) }}" class="flex gap-3 px-4 py-3 hover:bg-[#F8FAFC] dark:hover:bg-[#111827]">
                                <div class="w-10 h-10 rounded-full bg-[#FEF3C7] flex items-center justify-center shrink-0 text-[#F59E0B] text-sm font-medium">P</div>
                                <div>
                                    <p class="text-sm font-medium text-[#0F172A] dark:text-[#E5E7EB]">Project update: Website Redesign 75% complete</p>
                                    <p class="text-xs text-[#64748B] dark:text-[#9CA3AF]">2 days ago</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- Theme toggle -->
                    <button @click="toggleTheme()" class="p-2 rounded-lg hover:bg-[#F1F5F9] dark:hover:bg-[#111827]">
                        <template x-if="theme === 'light'">
                            <svg class="w-5 h-5 text-[#64748B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v2m0 14v2m9-9h-2M5 12H3m15.364-6.364l-1.414 1.414M7.05 16.95l-1.414 1.414m0-12.728L7.05 7.05M18.364 18.364L16.95 16.95M12 8a4 4 0 100 8 4 4 0 000-8z"/>
                            </svg>
                        </template>
                        <template x-if="theme === 'dark'">
                            <svg class="w-5 h-5 text-[#E5E7EB]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"/>
                            </svg>
                        </template>
                    </button>
                    <button @click="quickCreateOpen = true" class="inline-flex items-center gap-2 px-3 sm:px-4 py-2 bg-[#4F46E5] text-white rounded-lg hover:opacity-90 font-medium text-sm transition-opacity">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        <span class="hidden sm:inline">Quick Create</span>
                    </button>
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center gap-2 p-1 rounded-lg hover:bg-[#F1F5F9] dark:hover:bg-[#111827]">
                            <div class="w-8 h-8 rounded-full bg-[#4F46E5] flex items-center justify-center text-white text-sm font-medium">JD</div>
                            <svg class="w-4 h-4 text-[#64748B] dark:text-[#9CA3AF]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div x-show="open" @click.outside="open = false" x-transition
                             class="absolute right-0 mt-2 w-48 py-1 bg-white dark:bg-[#020617] rounded-lg shadow-lg border border-[#E2E8F0] dark:border-[#111827]">
                            <a href="{{ route('settings.index') }}" class="block px-4 py-2 text-sm text-[#64748B] dark:text-[#9CA3AF] hover:bg-[#F8FAFC] dark:hover:bg-[#111827]">Profile</a>
                            <a href="{{ route('settings.index') }}" class="block px-4 py-2 text-sm text-[#64748B] dark:text-[#9CA3AF] hover:bg-[#F8FAFC] dark:hover:bg-[#111827]">Settings</a>
                            <a href="{{ route('activity.index') }}" class="block px-4 py-2 text-sm text-[#64748B] dark:text-[#9CA3AF] hover:bg-[#F8FAFC] dark:hover:bg-[#111827]">Activity</a>
                            <hr class="my-1 border-[#E2E8F0] dark:border-[#111827]">
                            <a href="{{ route('login') }}" class="block px-4 py-2 text-sm text-[#EF4444] hover:bg-[#FEF2F2] dark:hover:bg-[#7F1D1D]">Sign out</a>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Breadcrumbs (optional) -->
            @hasSection('breadcrumbs')
                <div class="px-4 lg:px-8 py-2 border-b border-[#E2E8F0] bg-white dark:bg-[#020617] dark:border-[#020617]">
                    @yield('breadcrumbs')
                </div>
            @endif

            <!-- Page Content -->
            <main class="flex-1 p-4 lg:p-8">
                @yield('content')
            </main>
        </div>
        @include('components.command-palette')
        @include('components.quick-create-modal')
    </div>

    <!-- Toast Container -->
    <div id="toast-container" class="fixed bottom-4 right-4 z-50 space-y-2"></div>

    @stack('scripts')
</body>
</html>
