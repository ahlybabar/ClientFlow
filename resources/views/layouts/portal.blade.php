<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Client Portal') - Acme Corp</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-[#F8FAFC] text-[#0F172A]" x-data="{ mobileNavOpen: false }">
    {{-- Top Navigation --}}
    <nav class="bg-white border-b border-[#E2E8F0] sticky top-0 z-30">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="flex-shrink-0 flex items-center">
                        {{-- Agency Branding (simulated) --}}
                        <div class="w-8 h-8 bg-[#4F46E5] rounded flex items-center justify-center text-white font-bold mr-2">A</div>
                        <span class="font-bold text-[#0F172A] hidden sm:block">Acme Agency Client Portal</span>
                    </div>
                    <div class="hidden sm:-my-px sm:ml-8 sm:flex sm:space-x-8">
                        <a href="{{ route('portal.dashboard') }}" class="{{ request()->routeIs('portal.dashboard') ? 'border-[#4F46E5] text-[#0F172A]' : 'border-transparent text-[#64748B] hover:text-[#0F172A] hover:border-[#CBD5E1]' }} inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">Dashboard</a>
                        <a href="{{ route('portal.projects') }}" class="{{ request()->routeIs('portal.projects') ? 'border-[#4F46E5] text-[#0F172A]' : 'border-transparent text-[#64748B] hover:text-[#0F172A] hover:border-[#CBD5E1]' }} inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">Projects</a>
                        <a href="{{ route('portal.invoices') }}" class="{{ request()->routeIs('portal.invoices') ? 'border-[#4F46E5] text-[#0F172A]' : 'border-transparent text-[#64748B] hover:text-[#0F172A] hover:border-[#CBD5E1]' }} inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">Invoices</a>
                    </div>
                </div>
                <div class="hidden sm:ml-6 sm:flex sm:items-center">
                    {{-- Client profile dropdown --}}
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center gap-2 p-1.5 rounded-lg hover:bg-[#F1F5F9] transition-colors">
                            <div class="w-8 h-8 rounded bg-[#EEF2FF] text-[#4F46E5] flex items-center justify-center font-medium">JS</div>
                            <span class="text-sm font-medium text-[#0F172A]">John Smith</span>
                            <svg class="w-4 h-4 text-[#64748B]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        <div x-show="open" @click.outside="open = false" x-transition class="absolute right-0 mt-2 w-48 py-1 bg-white rounded-lg shadow-lg border border-[#E2E8F0]">
                            <a href="#" class="block px-4 py-2 text-sm text-[#64748B] hover:bg-[#F8FAFC]">Company Profile</a>
                            <a href="#" class="block px-4 py-2 text-sm text-[#64748B] hover:bg-[#F8FAFC]">Settings</a>
                            <hr class="my-1 border-[#E2E8F0]">
                            <a href="{{ route('login') }}" class="block px-4 py-2 text-sm text-[#EF4444] hover:bg-[#FEF2F2]">Log out</a>
                        </div>
                    </div>
                </div>
                <div class="-mr-2 flex items-center sm:hidden">
                    <button @click="mobileNavOpen = !mobileNavOpen" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-[#64748B] hover:text-[#0F172A] hover:bg-[#F1F5F9] focus:outline-none focus:bg-[#F1F5F9] focus:text-[#0F172A] transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': mobileNavOpen, 'inline-flex': !mobileNavOpen }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': !mobileNavOpen, 'inline-flex': mobileNavOpen }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        {{-- Mobile menu --}}
        <div x-show="mobileNavOpen" class="sm:hidden border-t border-[#E2E8F0] bg-white">
            <div class="pt-2 pb-3 space-y-1 block">
                <a href="{{ route('portal.dashboard') }}" class="{{ request()->routeIs('portal.dashboard') ? 'bg-[#EEF2FF] border-[#4F46E5] text-[#4F46E5]' : 'border-transparent text-[#64748B] hover:bg-[#F8FAFC] hover:border-[#CBD5E1] hover:text-[#0F172A]' }} block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Dashboard</a>
                <a href="{{ route('portal.projects') }}" class="{{ request()->routeIs('portal.projects') ? 'bg-[#EEF2FF] border-[#4F46E5] text-[#4F46E5]' : 'border-transparent text-[#64748B] hover:bg-[#F8FAFC] hover:border-[#CBD5E1] hover:text-[#0F172A]' }} block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Projects</a>
                <a href="{{ route('portal.invoices') }}" class="{{ request()->routeIs('portal.invoices') ? 'bg-[#EEF2FF] border-[#4F46E5] text-[#4F46E5]' : 'border-transparent text-[#64748B] hover:bg-[#F8FAFC] hover:border-[#CBD5E1] hover:text-[#0F172A]' }} block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Invoices</a>
            </div>
            <div class="pt-4 pb-3 border-t border-[#E2E8F0]">
                <div class="flex items-center px-4">
                    <div class="w-10 h-10 rounded bg-[#EEF2FF] text-[#4F46E5] flex items-center justify-center font-bold text-lg">JS</div>
                    <div class="ml-3">
                        <div class="text-base font-medium text-[#0F172A]">John Smith</div>
                        <div class="text-sm font-medium text-[#64748B]">john@acmecorp.com</div>
                    </div>
                </div>
                <div class="mt-3 space-y-1 block">
                    <a href="#" class="block px-4 py-2 text-base font-medium text-[#64748B] hover:text-[#0F172A] hover:bg-[#F8FAFC]">Company Profile</a>
                    <a href="{{ route('login') }}" class="block px-4 py-2 text-base font-medium text-[#EF4444] hover:text-[#EF4444] hover:bg-[#FEF2F2]">Log out</a>
                </div>
            </div>
        </div>
    </nav>

    <main class="py-10">
        @yield('content')
    </main>

    <!-- Toast Container -->
    <div id="toast-container" class="fixed bottom-4 right-4 z-50 space-y-2"></div>

    @stack('scripts')
</body>
</html>
