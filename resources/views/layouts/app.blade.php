@php
    $navGroups = [
        'Overview' => [
            ['route' => 'dashboard', 'icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6', 'label' => 'Dashboard'],
        ],
        'Work' => [
            ['route' => 'clients.index', 'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z', 'label' => 'Clients'],
            ['route' => 'projects.index', 'icon' => 'M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10', 'label' => 'Projects', 'subItems' => [
                ['route' => 'tasks.index', 'label' => 'Tasks']
            ]],
        ],
        'Finance' => [
            ['route' => 'invoices.index', 'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z', 'label' => 'Invoices'],
            ['route' => 'payments.index', 'icon' => 'M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z', 'label' => 'Payments'],
        ],
        'Management' => [
            ['route' => 'team.index', 'icon' => 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z', 'label' => 'Team'],
            ['route' => 'analytics.index', 'icon' => 'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z', 'label' => 'Analytics'],
            ['route' => 'automation.index', 'icon' => 'M13 10V3L4 14h7v7l9-11h-7z', 'label' => 'Automation'],
        ],
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
        // Apply theme immediately to prevent FOUC
        try {
            const savedTheme = localStorage.getItem('theme');
            if (savedTheme === 'dark' || (!savedTheme && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
            } else if (savedTheme === 'light') {
                document.documentElement.classList.remove('dark');
            } else if (savedTheme === 'system') {
                if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
                    document.documentElement.classList.add('dark');
                } else {
                    document.documentElement.classList.remove('dark');
                }
            } else {
                // Default to light if nothing is set
                localStorage.setItem('theme', 'light');
                document.documentElement.classList.remove('dark');
            }
        } catch (e) {}
    </script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-[var(--color-bg)] text-[var(--color-text)] transition-colors" x-data="globalApp()">
    <div class="flex min-h-screen">
        <!-- Edge trigger strip (desktop) – reveals sidebar when cursor touches left edge -->
        <div class="hidden lg:block fixed left-0 top-0 z-50 w-2 h-screen"
             @mouseenter="scheduleSidebarShow()"></div>

        <!-- Sidebar (desktop) -->
        <aside id="desktop-sidebar" class="sidebar-slide fixed left-0 top-0 z-40 w-64 h-screen bg-[var(--color-sidebar-bg)] border-r border-[var(--color-border)] hidden lg:flex flex-col"
               :class="{'sidebar-slide-visible': sidebarVisible, 'sidebar-slide-hidden': !sidebarVisible, 'sidebar-floating-shadow': !sidebarPinned && sidebarVisible}"
               @mouseenter="scheduleSidebarShow()"
               @mouseleave="scheduleSidebarHide()">
        <script>
            if (localStorage.getItem('sidebarPinned') === 'false') {
                if (sessionStorage.getItem('sidebarKeepOpen') === 'true') {
                    document.getElementById('desktop-sidebar').classList.add('sidebar-slide-visible');
                } else {
                    document.getElementById('desktop-sidebar').classList.add('sidebar-slide-hidden');
                }
            } else {
                document.getElementById('desktop-sidebar').classList.add('sidebar-slide-visible');
            }
        </script>

            <!-- Sidebar header -->
            <div class="flex h-16 items-center justify-between px-4 border-b border-[var(--color-border)] shrink-0">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-2">
                    <div class="w-9 h-9 rounded-lg bg-[#4F46E5] flex items-center justify-center shrink-0">
                        <span class="text-white font-bold text-lg">C</span>
                    </div>
                    <span class="font-semibold text-[var(--color-text)] whitespace-nowrap">ClientFlow Pro</span>
                </a>
                <!-- Pin / Collapse toggle -->
                <button @click="togglePin()"
                        class="ml-2 p-1.5 rounded-lg hover:bg-[#F1F5F9] transition-colors shrink-0"
                        :title="sidebarPinned ? 'Auto-hide sidebar' : 'Pin sidebar'">
                    <template x-if="sidebarPinned">
                        <svg class="w-4 h-4 text-[#4F46E5]" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M16 12V4h1V2H7v2h1v8l-2 2v2h5.2v6h1.6v-6H18v-2l-2-2z"/>
                        </svg>
                    </template>
                    <template x-if="!sidebarPinned">
                        <svg class="w-4 h-4 text-[#64748B]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12V4h1V2H8v2h1v8l-2 2v2h5v6h2v-6h5v-2l-4-2z"/>
                        </svg>
                    </template>
                </button>
            </div>

            <!-- Nav items -->
            <nav class="flex-1 overflow-y-auto py-4 space-y-6">
                @foreach($navGroups as $groupLabel => $items)
                <div class="px-3">
                    <h3 class="px-3 mb-2 text-[11px] font-bold tracking-wider text-[#94A3B8] uppercase">{{ $groupLabel }}</h3>
                    <div class="space-y-1">
                        @foreach($items as $item)
                        @if(isset($item['subItems']))
                        @php
                            $isExpanded = request()->routeIs($item['route'].'*') || collect($item['subItems'])->contains(function($sub) { return request()->routeIs($sub['route'].'*'); });
                        @endphp
                        <div x-data="{ expanded: {{ $isExpanded ? 'true' : 'false' }} }" class="space-y-1">
                            <button @click="expanded = !expanded"
                               class="w-full group relative flex items-center justify-between gap-3 px-3 py-2 rounded-lg text-sm font-medium transition-all {{ request()->routeIs($item['route'].'*') && !collect($item['subItems'])->contains(function($sub){return request()->routeIs($sub['route'].'*');}) ? 'bg-[var(--color-active-bg)] text-[#4F46E5]' : 'text-[var(--color-text-secondary)] hover:bg-[var(--color-hover)] hover:text-[var(--color-text)]' }}">
                                <div class="flex items-center gap-3">
                                    @if(request()->routeIs($item['route'].'*') && !collect($item['subItems'])->contains(function($sub){return request()->routeIs($sub['route'].'*');}))
                                        <div class="absolute left-0 top-1/2 -translate-y-1/2 w-1 h-5 bg-[#4F46E5] rounded-r-full"></div>
                                    @endif
                                    <svg class="w-5 h-5 shrink-0 transition-colors {{ request()->routeIs($item['route'].'*') && !collect($item['subItems'])->contains(function($sub){return request()->routeIs($sub['route'].'*');}) ? 'text-[#4F46E5]' : 'text-[var(--color-text-muted)] group-hover:text-[var(--color-text-secondary)]' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item['icon'] }}"/>
                                    </svg>
                                    <span class="whitespace-nowrap">{{ $item['label'] }}</span>
                                </div>
                                <svg class="w-4 h-4 shrink-0 transition-transform duration-200 text-[var(--color-text-muted)]" :class="{'rotate-180': expanded}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                            </button>
                            <div x-show="expanded" x-transition class="pl-11 pr-3 space-y-1 pt-1" @if(!$isExpanded) x-cloak @endif>
                                <a href="{{ route($item['route']) }}" @click="if(!sidebarPinned && sidebarVisible) { sessionStorage.setItem('sidebarKeepOpen', 'true'); }"
                                   class="block px-3 py-2 rounded-lg text-sm font-medium transition-colors {{ request()->routeIs($item['route']) ? 'bg-[var(--color-active-bg)] text-[#4F46E5]' : 'text-[var(--color-text-secondary)] hover:bg-[var(--color-hover)] hover:text-[var(--color-text)]' }}">
                                    Overview
                                </a>
                                @foreach($item['subItems'] as $subItem)
                                <a href="{{ route($subItem['route']) }}" @click="if(!sidebarPinned && sidebarVisible) { sessionStorage.setItem('sidebarKeepOpen', 'true'); }"
                                   class="block px-3 py-2 rounded-lg text-sm font-medium transition-colors {{ request()->routeIs($subItem['route'].'*') ? 'bg-[var(--color-active-bg)] text-[#4F46E5]' : 'text-[var(--color-text-secondary)] hover:bg-[var(--color-hover)] hover:text-[var(--color-text)]' }}">
                                    {{ $subItem['label'] }}
                                </a>
                                @endforeach
                            </div>
                        </div>
                        @else
                        <a href="{{ route($item['route']) }}"
                           @click="if(!sidebarPinned && sidebarVisible) { sessionStorage.setItem('sidebarKeepOpen', 'true'); }"
                           class="group relative flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-medium transition-all {{ request()->routeIs($item['route'].'*') ? 'bg-[var(--color-active-bg)] text-[#4F46E5]' : 'text-[var(--color-text-secondary)] hover:bg-[var(--color-hover)] hover:text-[var(--color-text)]' }}">
                            @if(request()->routeIs($item['route'].'*'))
                                <div class="absolute left-0 top-1/2 -translate-y-1/2 w-1 h-5 bg-[#4F46E5] rounded-r-full"></div>
                            @endif
                            <svg class="w-5 h-5 shrink-0 transition-colors {{ request()->routeIs($item['route'].'*') ? 'text-[#4F46E5]' : 'text-[var(--color-text-muted)] group-hover:text-[var(--color-text-secondary)]' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item['icon'] }}"/>
                            </svg>
                            <span class="whitespace-nowrap">{{ $item['label'] }}</span>
                        </a>
                        @endif
                        @endforeach
                    </div>
                </div>
                @endforeach
            </nav>
        </aside>

        <!-- Mobile sidebar -->
        <aside x-show="mobileSidebarOpen" x-transition x-cloak
             class="fixed left-0 top-0 z-40 h-screen w-64 bg-[var(--color-sidebar-bg)] border-r border-[var(--color-border)] lg:hidden flex flex-col">
            <div class="flex h-16 items-center justify-between px-4 border-b border-[var(--color-border)]">
                <span class="font-semibold text-[var(--color-text)]">ClientFlow Pro</span>
                <button @click="mobileSidebarOpen = false" class="p-2 rounded-lg hover:bg-[var(--color-hover)]">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
            <nav class="flex-1 overflow-y-auto py-4 px-3 space-y-6">
                @foreach($navGroups as $groupLabel => $items)
                <div>
                    <h3 class="px-3 mb-2 text-[11px] font-bold tracking-wider text-[var(--color-text-muted)] uppercase">{{ $groupLabel }}</h3>
                    <div class="space-y-1">
                        @foreach($items as $item)
                        @if(isset($item['subItems']))
                        @php
                            $isExpandedMobile = request()->routeIs($item['route'].'*') || collect($item['subItems'])->contains(function($sub) { return request()->routeIs($sub['route'].'*'); });
                        @endphp
                        <div x-data="{ expanded: {{ $isExpandedMobile ? 'true' : 'false' }} }" class="space-y-1">
                            <button @click="expanded = !expanded"
                               class="w-full relative flex items-center justify-between px-3 py-2 rounded-lg text-sm font-medium transition-all {{ request()->routeIs($item['route'].'*') && !collect($item['subItems'])->contains(function($sub){return request()->routeIs($sub['route'].'*');}) ? 'bg-[var(--color-active-bg)] text-[#4F46E5]' : 'text-[var(--color-text-secondary)] hover:bg-[var(--color-hover)] hover:text-[var(--color-text)]' }}">
                                <div class="flex items-center gap-3">
                                    @if(request()->routeIs($item['route'].'*') && !collect($item['subItems'])->contains(function($sub){return request()->routeIs($sub['route'].'*');}))
                                        <div class="absolute left-0 top-1/2 -translate-y-1/2 w-1 h-5 bg-[#4F46E5] rounded-r-full"></div>
                                    @endif
                                    <svg class="w-5 h-5 shrink-0 transition-colors {{ request()->routeIs($item['route'].'*') && !collect($item['subItems'])->contains(function($sub){return request()->routeIs($sub['route'].'*');}) ? 'text-[#4F46E5]' : 'text-[var(--color-text-muted)]' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item['icon'] }}"/>
                                    </svg>
                                    <span class="whitespace-nowrap">{{ $item['label'] }}</span>
                                </div>
                                <svg class="w-4 h-4 shrink-0 transition-transform duration-200 text-[var(--color-text-muted)]" :class="{'rotate-180': expanded}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                            </button>
                            <div x-show="expanded" x-transition class="pl-11 pr-3 space-y-1 pt-1" @if(!$isExpandedMobile) x-cloak @endif>
                                <a href="{{ route($item['route']) }}" @click="mobileSidebarOpen = false"
                                   class="block px-3 py-2 rounded-lg text-sm font-medium transition-colors {{ request()->routeIs($item['route']) ? 'bg-[var(--color-active-bg)] text-[#4F46E5]' : 'text-[var(--color-text-secondary)] hover:bg-[var(--color-hover)] hover:text-[var(--color-text)]' }}">
                                    Overview
                                </a>
                                @foreach($item['subItems'] as $subItem)
                                <a href="{{ route($subItem['route']) }}" @click="mobileSidebarOpen = false"
                                   class="block px-3 py-2 rounded-lg text-sm font-medium transition-colors {{ request()->routeIs($subItem['route'].'*') ? 'bg-[var(--color-active-bg)] text-[#4F46E5]' : 'text-[var(--color-text-secondary)] hover:bg-[var(--color-hover)] hover:text-[var(--color-text)]' }}">
                                    {{ $subItem['label'] }}
                                </a>
                                @endforeach
                            </div>
                        </div>
                        @else
                        <a href="{{ route($item['route']) }}" @click="mobileSidebarOpen = false"
                           class="relative flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-medium transition-all {{ request()->routeIs($item['route'].'*') ? 'bg-[var(--color-active-bg)] text-[#4F46E5]' : 'text-[var(--color-text-secondary)] hover:bg-[var(--color-hover)] hover:text-[var(--color-text)]' }}">
                            @if(request()->routeIs($item['route'].'*'))
                                <div class="absolute left-0 top-1/2 -translate-y-1/2 w-1 h-5 bg-[#4F46E5] rounded-r-full"></div>
                            @endif
                            <svg class="w-5 h-5 shrink-0 transition-colors {{ request()->routeIs($item['route'].'*') ? 'text-[#4F46E5]' : 'text-[var(--color-text-muted)]' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item['icon'] }}"/></svg>
                            {{ $item['label'] }}
                        </a>
                        @endif
                        @endforeach
                    </div>
                </div>
                @endforeach
            </nav>
        </aside>
        <div x-show="mobileSidebarOpen" x-transition.opacity @click="mobileSidebarOpen = false" x-cloak
             class="fixed inset-0 z-30 bg-black/50 lg:hidden"></div>

        <!-- Main content -->
        <div id="main-content" class="flex-1 flex flex-col min-w-0 main-transition" :class="{'lg:pl-64': sidebarPinned, '!lg:pl-0': !sidebarPinned}">
        <script>
            if (localStorage.getItem('sidebarPinned') !== 'false') {
                document.getElementById('main-content').classList.add('lg:pl-64');
            }
        </script>
            <!-- Top Bar -->
            <header class="sticky top-0 z-20 flex h-16 items-center gap-4 border-b border-[var(--color-border)] bg-[var(--color-card)] px-4 lg:px-8 transition-colors">
                <button @click="mobileSidebarOpen = true" class="lg:hidden p-2 -ml-2 rounded-lg hover:bg-[var(--color-hover)] text-[var(--color-text-secondary)]">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
                <div class="flex-1 flex items-center justify-start max-w-[480px]">
                    <button @click="commandOpen = true" class="w-full flex items-center gap-3 px-4 py-2 bg-[var(--color-bg)] border border-[var(--color-border)] rounded-lg text-left text-sm text-[var(--color-text-secondary)] hover:border-[var(--color-text-muted)] transition-colors">
                        <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        <span class="flex-1 truncate">Search clients, projects, tasks...</span>
                        <kbd class="hidden sm:inline-flex px-1.5 py-0.5 text-[10px] font-mono font-medium rounded border border-[var(--color-border)] text-[var(--color-text-muted)] bg-[var(--color-card)]">⌘K</kbd>
                    </button>
                </div>
                <div class="flex items-center gap-2 sm:gap-4 ml-auto">
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open; notifOpen = false" class="relative p-2 rounded-lg hover:bg-[var(--color-hover)] text-[var(--color-text-secondary)] transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                            </svg>
                            <span class="absolute top-[6px] right-[6px] w-[8px] h-[8px] box-content border-2 border-[var(--color-card)] bg-[#EF4444] rounded-full"></span>
                        </button>
                        <div x-show="open" x-cloak @click.outside="open = false" x-transition
                             class="absolute right-0 mt-2 w-80 max-h-96 overflow-y-auto bg-[var(--color-card)] rounded-xl shadow-lg border border-[var(--color-border)] py-2">
                            <div class="px-4 py-2 flex items-center justify-between border-b border-[var(--color-border)]">
                                <span class="font-semibold text-[var(--color-text)]">Notifications</span>
                                <a href="{{ route('notifications.index') }}" class="text-sm text-[#4F46E5] hover:underline">View all</a>
                            </div>
                            <a href="{{ route('tasks.index') }}" class="flex gap-3 px-4 py-3 hover:bg-[var(--color-hover)]">
                                <div class="w-10 h-10 rounded-full bg-[var(--color-active-bg)] flex items-center justify-center shrink-0 text-[#4F46E5] text-sm font-medium">T</div>
                                <div>
                                    <p class="text-sm font-medium text-[var(--color-text)]">Task assigned: Design homepage mockup</p>
                                    <p class="text-xs text-[var(--color-text-secondary)]">2 hours ago</p>
                                </div>
                            </a>
                            <a href="{{ route('invoices.show', 1) }}" class="flex gap-3 px-4 py-3 hover:bg-[var(--color-hover)]">
                                <div class="w-10 h-10 rounded-full bg-[#ECFDF5] flex items-center justify-center shrink-0 text-[#22C55E] text-sm font-medium">$</div>
                                <div>
                                    <p class="text-sm font-medium text-[var(--color-text)]">Invoice INV-0042 paid</p>
                                    <p class="text-xs text-[var(--color-text-secondary)]">1 day ago</p>
                                </div>
                            </a>
                            <a href="{{ route('projects.show', 1) }}" class="flex gap-3 px-4 py-3 hover:bg-[var(--color-hover)]">
                                <div class="w-10 h-10 rounded-full bg-[#FEF3C7] flex items-center justify-center shrink-0 text-[#F59E0B] text-sm font-medium">P</div>
                                <div>
                                    <p class="text-sm font-medium text-[var(--color-text)]">Project update: Website Redesign 75% complete</p>
                                    <p class="text-xs text-[var(--color-text-secondary)]">2 days ago</p>
                                </div>
                            </a>
                        </div>
                    </div>

                    <button @click="quickCreateOpen = true" class="inline-flex items-center gap-2 px-3 sm:px-4 py-2 bg-[#4F46E5] text-white rounded-lg hover:opacity-90 font-medium text-sm transition-opacity">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        <span class="hidden sm:inline">Quick Create</span>
                    </button>
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center gap-2.5 p-1 pr-2 rounded-lg hover:bg-[var(--color-hover)] transition-colors text-left">
                            <div class="w-8 h-8 rounded-full bg-gradient-to-tr from-[#4F46E5] to-[#818CF8] flex items-center justify-center text-white text-xs font-bold shadow-sm">
                                JD
                            </div>
                            <div class="hidden sm:block">
                                <div class="text-[13px] font-semibold text-[var(--color-text)] leading-none">John Doe</div>
                                <div class="text-[11px] text-[var(--color-text-secondary)] mt-0.5">Administrator</div>
                            </div>
                            <svg class="w-4 h-4 text-[var(--color-text-muted)] ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div x-show="open" x-cloak @click.outside="open = false" x-transition
                             class="absolute right-0 mt-2 w-48 py-1 bg-[var(--color-card)] rounded-lg shadow-lg border border-[var(--color-border)]">
                            <a href="#" @click.prevent="settingsModalOpen = true; open = false" class="block px-4 py-2 text-sm text-[var(--color-text-secondary)] hover:bg-[var(--color-hover)] hover:text-[var(--color-text)]">Profile</a>
                            <a href="#" @click.prevent="settingsModalOpen = true; open = false" class="block px-4 py-2 text-sm text-[var(--color-text-secondary)] hover:bg-[var(--color-hover)] hover:text-[var(--color-text)]">Settings</a>
                            <a href="{{ route('activity.index') }}" class="block px-4 py-2 text-sm text-[var(--color-text-secondary)] hover:bg-[var(--color-hover)] hover:text-[var(--color-text)]">Activity</a>
                            <hr class="my-1 border-[var(--color-border)]">
                            <a href="{{ route('login') }}" class="block px-4 py-2 text-sm text-[#EF4444] hover:bg-[#FEF2F2]">Sign out</a>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Breadcrumbs (optional) -->
            @hasSection('breadcrumbs')
                <div class="px-4 lg:px-8 py-2 border-b border-[#E2E8F0] bg-white">
                    @yield('breadcrumbs')
                </div>
            @endif

            <!-- Page Content -->
            <main class="flex-1 p-4 lg:p-8">
                @yield('content')
            </main>
        @include('components.command-palette')
        @include('components.quick-create-modal')
        @include('components.settings-modal')
    </div>

    <!-- Toast Container -->
    <div id="toast-container" class="fixed bottom-4 right-4 z-[110] space-y-2"></div>

    @stack('scripts')
</body>
</html>
