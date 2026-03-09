{{-- Settings Modal --}}
<template x-teleport="body">
 <div x-show="settingsModalOpen" x-cloak
 x-transition:enter="transition ease-out duration-150"
 x-transition:enter-start="opacity-0"
 x-transition:enter-end="opacity-100"
 x-transition:leave="transition ease-in duration-100"
 x-transition:leave-start="opacity-100"
 x-transition:leave-end="opacity-0"
 class="fixed inset-0 z-[100] flex items-center justify-center p-4 bg-black/60"
 @keydown.escape.window="settingsModalOpen = false"
 @click.self="settingsModalOpen = false">
 
 {{-- Modal Container --}}
 <div class="w-full max-w-[1150px] h-[85vh] overflow-hidden bg-[var(--color-card)] rounded-[16px] shadow-2xl border border-[var(--color-border)] flex"
 @click.stop>
 
 {{-- Sidebar Navigation --}}
 <div class="w-[280px] bg-[var(--color-bg)] border-r border-[var(--color-border)] flex flex-col shrink-0">
 <!-- Profile Header -->
 <div class="p-6 border-b border-[var(--color-border)]">
 <div class="flex items-center gap-4">
 <div class="w-12 h-12 rounded-full bg-gradient-to-tr from-[#4f7cff] to-[#8eb0ff] flex items-center justify-center text-white text-lg font-bold shadow-inner">
 JD
 </div>
 <div>
 <div class="font-semibold text-[var(--color-text)] leading-tight text-lg">John Doe</div>
 <div class="text-sm text-[var(--color-text-secondary)] mt-0.5">Admin Account</div>
 </div>
 </div>
 </div>

 <!-- Nav Groups -->
 <div class="flex-1 overflow-y-auto px-4 py-5 space-y-6">
 
 @foreach([
 ['label' => 'Account', 'items' => [
 ['id' => 'Profile', 'icon' => 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z'],
 ['id' => 'Preferences', 'icon' => 'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z'],
 ['id' => 'Security', 'icon' => 'M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z'],
 ]],
 ['label' => 'Workspace', 'items' => [
 ['id' => 'General', 'icon' => 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4'],
 ['id' => 'Team', 'icon' => 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z'],
 ['id' => 'Billing', 'icon' => 'M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z'],
 ]]
 ] as $group)
 <div class="mb-6 last:mb-0">
 <h3 class="px-3 mb-2 text-xs font-bold tracking-wider text-[var(--color-text-muted)] uppercase">{{ $group['label'] }}</h3>
 <div class="space-y-1">
 @foreach($group['items'] as $item)
 <button @click="settingsCategory = '{{ $item['id'] }}'"
 :class="{'bg-[var(--color-active-bg)] text-[#4f7cff] font-medium shadow-sm': settingsCategory === '{{ $item['id'] }}', 'text-[var(--color-text-secondary)] hover:bg-[var(--color-hover)] hover:text-[var(--color-text)]': settingsCategory !== '{{ $item['id'] }}'}"
 class="w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm transition-all duration-200 text-left relative focus:outline-none focus:ring-2 focus:ring-[#4f7cff] focus:ring-offset-2">
 <div class="absolute left-0 top-1/2 -translate-y-1/2 w-1 h-5 bg-[#4f7cff] rounded-r-full transition-opacity duration-200"
 :class="{'opacity-100': settingsCategory === '{{ $item['id'] }}', 'opacity-0': settingsCategory !== '{{ $item['id'] }}'}"></div>
 <svg class="w-[18px] h-[18px] shrink-0 transition-colors"
 :class="{'text-[#4f7cff]': settingsCategory === '{{ $item['id'] }}', 'text-[var(--color-text-muted)]': settingsCategory !== '{{ $item['id'] }}'}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item['icon'] }}"/>
 </svg>
 {{ $item['id'] }}
 </button>
 @endforeach
 </div>
 </div>
 @endforeach
 </div>
 </div>

 {{-- Right Panel — Settings Content --}}
 <div class="flex-1 flex flex-col min-w-0 bg-[var(--color-card)] relative">
 <!-- Close Button -->
 <button @click="settingsModalOpen = false" class="absolute top-6 right-6 p-2 rounded-full text-[var(--color-text-secondary)] hover:bg-[var(--color-hover)] hover:text-[var(--color-text)] transition-all focus:outline-none">
 <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
 </button>
 
 <!-- Dynamic Content -->
 <div class="flex-1 overflow-y-auto w-full p-10 max-w-[800px] mx-auto hidden-scrollbar">
 
 <!-- Profile Section -->
 <div x-show="settingsCategory === 'Profile'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" class="space-y-8 pb-8">
 <div>
 <h2 class="text-3xl font-bold text-[var(--color-text)] tracking-tight">Profile View</h2>
 <p class="text-[var(--color-text-secondary)] mt-2 text-[15px]">Manage your personal profile and visibility settings.</p>
 </div>
 
 <hr class="border-[var(--color-border)]">
 
 {{-- Setting Row --}}
 <div class="flex items-start justify-between gap-8 group">
 <div class="flex-1">
 <div class="font-medium text-[var(--color-text)] text-[15px]">Full Name</div>
 <div class="text-[13px] text-[var(--color-text-secondary)] mt-0.5">Your name as it appears across the platform.</div>
 </div>
 <div class="w-[300px] shrink-0">
 <input type="text" value="John Doe" class="w-full bg-[var(--color-bg)] border border-[var(--color-border)] text-[var(--color-text)] text-sm rounded-lg focus:ring-1 focus:ring-[#4f7cff] focus:border-[#4f7cff] px-3 py-2 outline-none transition-shadow">
 </div>
 </div>
 
 {{-- Setting Row --}}
 <div class="flex items-start justify-between gap-8 group pt-6 border-t border-[var(--color-border)]">
 <div class="flex-1">
 <div class="font-medium text-[var(--color-text)] text-[15px]">Email Address</div>
 <div class="text-[13px] text-[var(--color-text-secondary)] mt-0.5">The email associated with your account.</div>
 </div>
 <div class="w-[300px] shrink-0">
 <input type="email" value="john@example.com" class="w-full bg-[var(--color-bg)] border border-[var(--color-border)] text-[var(--color-text)] text-sm rounded-lg focus:ring-1 focus:ring-[#4f7cff] focus:border-[#4f7cff] px-3 py-2 outline-none transition-shadow">
 </div>
 </div>
 
 {{-- Setting Row --}}
 <div class="flex items-start justify-between gap-8 group pt-6 border-t border-[var(--color-border)]">
 <div class="flex-1">
 <div class="font-medium text-[var(--color-text)] text-[15px]">Bio</div>
 <div class="text-[13px] text-[var(--color-text-secondary)] mt-0.5">A brief description about yourself.</div>
 </div>
 <div class="w-[300px] shrink-0">
 <textarea rows="3" class="w-full bg-[var(--color-bg)] border border-[var(--color-border)] text-[var(--color-text)] text-sm rounded-lg focus:ring-1 focus:ring-[#4f7cff] focus:border-[#4f7cff] px-3 py-2 outline-none transition-shadow resize-none">Product Manager focused on building great tools.</textarea>
 </div>
 </div>
 
 <div class="pt-6 flex justify-end">
 <button class="px-5 py-2.5 bg-black text-white dark:bg-white dark:text-black text-sm font-semibold rounded-lg hover:opacity-90 transition-opacity whitespace-nowrap shadow-sm">Save Changes</button>
 </div>
 </div>
 
 <!-- Preferences Section -->
 <div x-show="settingsCategory === 'Preferences'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" class="space-y-8 pb-8" style="display: none;">
 <div>
 <h2 class="text-3xl font-bold text-[var(--color-text)] tracking-tight">App Preferences</h2>
 <p class="text-[var(--color-text-secondary)] mt-2 text-[15px]">Customize your UI and system settings.</p>
 </div>
 
 <hr class="border-[var(--color-border)]">
 
 {{-- Section 1: Appearance --}}
 <div class="mb-10">
 <h2 class="text-[17px] font-semibold text-[var(--color-text)] mb-1">Appearance</h2>
 <p class="text-[13px] text-[var(--color-text-secondary)] mb-6">Controls interface visuals and density.</p>
 
 <div class="space-y-0 divide-y divide-[var(--color-border)] border-t border-[var(--color-border)]">
 {{-- Setting Row --}}
 <div class="flex items-start justify-between gap-8 group pt-6 border-t border-[var(--color-border)]">
 <div class="flex-1">
 <div class="font-medium text-[var(--color-text)] text-[15px]">Theme</div>
 <div class="text-[13px] text-[var(--color-text-secondary)] mt-0.5">Select your preferred color theme.</div>
 </div>
 <div class="w-[300px] shrink-0">
        <select x-model="theme" @change="setTheme(theme)" class="w-full bg-[var(--color-bg)] border border-[var(--color-border)] text-[var(--color-text)] text-sm rounded-lg focus:ring-1 focus:ring-[#4f7cff] focus:border-[#4f7cff] px-3 py-2 outline-none transition-shadow appearance-none custom-select">
            <option value="dark">Dark</option>
            <option value="light">Light</option>
            <option value="system">System Default</option>
        </select>
    </div>
 </div>
 
 {{-- Setting Row --}}
 <div class="py-5 flex items-center justify-between gap-8 group">
 <div class="flex-1">
 <div class="text-[14px] font-medium text-[var(--color-text)]">Sidebar Density</div>
 <div class="text-[13px] text-[var(--color-text-secondary)] mt-0.5">Adjust the spacing and padding of navigation items.</div>
 </div>
 <div class="w-[200px] shrink-0">
 <select class="w-full bg-[var(--color-bg)] border border-[var(--color-border)] text-[var(--color-text)] text-sm rounded-lg focus:ring-1 focus:ring-[#4f7cff] focus:border-[#4f7cff] px-3 py-2 outline-none transition-shadow appearance-none custom-select">
 <option value="comfortable" selected>Comfortable</option>
 <option value="compact">Compact</option>
 </select>
 </div>
 </div>

 {{-- Setting Row --}}
 <div class="py-5 flex items-center justify-between gap-8 group">
 <div class="flex-1">
 <div class="text-[14px] font-medium text-[var(--color-text)]">Accent Color</div>
 <div class="text-[13px] text-[var(--color-text-secondary)] mt-0.5">Customize dashboard accent color.</div>
 </div>
 <div class="flex shrink-0 items-center justify-end w-[200px] gap-2">
 <button class="w-6 h-6 rounded-full bg-[#4f7cff] ring-2 ring-offset-2 ring-offset-[var(--color-bg)] ring-[#4f7cff] focus:outline-none"></button>
 <button class="w-6 h-6 rounded-full bg-[#22C55E] hover:scale-110 transition-transform focus:outline-none"></button>
 <button class="w-6 h-6 rounded-full bg-[#F59E0B] hover:scale-110 transition-transform focus:outline-none"></button>
 <button class="w-6 h-6 rounded-full bg-[#EC4899] hover:scale-110 transition-transform focus:outline-none"></button>
 <button class="w-6 h-6 rounded-full bg-[#A855F7] hover:scale-110 transition-transform focus:outline-none"></button>
 </div>
 </div>
 </div>
 </div>

 {{-- Section 2: Language & Time --}}
 <div class="mb-10">
 <h2 class="text-[17px] font-semibold text-[var(--color-text)] mb-1">Language & Time</h2>
 <p class="text-[13px] text-[var(--color-text-secondary)] mb-6">Configure regional formats and timezones.</p>
 
 <div class="space-y-0 divide-y divide-[var(--color-border)] border-t border-[var(--color-border)]">
 <div class="py-5 flex items-center justify-between gap-8 group">
 <div class="flex-1">
 <div class="text-[14px] font-medium text-[var(--color-text)]">Language</div>
 </div>
 <div class="w-[200px] shrink-0">
 <select class="w-full bg-[var(--color-bg)] border border-[var(--color-border)] text-[var(--color-text)] text-sm rounded-lg focus:ring-1 focus:ring-[#4f7cff] focus:border-[#4f7cff] px-3 py-2 outline-none transition-shadow appearance-none custom-select">
 <option value="en-us" selected>English (US)</option>
 <option value="en-uk">English (UK)</option>
 <option value="es">Spanish</option>
 <option value="de">German</option>
 </select>
 </div>
 </div>
 
 <div class="py-5 flex items-center justify-between gap-8 group">
 <div class="flex-1">
 <div class="text-[14px] font-medium text-[var(--color-text)]">Time Zone</div>
 </div>
 <div class="w-[200px] shrink-0">
 <select class="w-full bg-[var(--color-bg)] border border-[var(--color-border)] text-[var(--color-text)] text-sm rounded-lg focus:ring-1 focus:ring-[#4f7cff] focus:border-[#4f7cff] px-3 py-2 outline-none transition-shadow appearance-none custom-select">
 <option value="utc">UTC (Coordinated Universal Time)</option>
 <option value="pst" selected>Pacific Time (US & Canada)</option>
 <option value="est">Eastern Time (US & Canada)</option>
 </select>
 </div>
 </div>

 <div class="flex items-start justify-between gap-8 group pt-6 border-t border-[var(--color-border)]">
 <div class="flex-1">
 <div class="font-medium text-[var(--color-text)] text-[15px]">Date Format</div>
 <div class="text-[13px] text-[var(--color-text-secondary)] mt-0.5">How dates should be displayed.</div>
 </div>
 <div class="w-[300px] shrink-0 relative">
 <select class="w-full bg-[var(--color-bg)] border border-[var(--color-border)] text-[var(--color-text)] text-sm rounded-lg focus:ring-1 focus:ring-[#4f7cff] focus:border-[#4f7cff] px-3 py-2 outline-none transition-shadow appearance-none custom-select">
 <option value="MM/DD/YYYY">MM/DD/YYYY</option>
 <option value="DD/MM/YYYY">DD/MM/YYYY</option>
 <option value="YYYY-MM-DD">YYYY-MM-DD</option>
 </select>
 </div>
 </div>

 <div class="py-5 flex items-center justify-between gap-8 group" x-data="{ on: true }">
 <div class="flex-1">
 <div class="text-[14px] font-medium text-[var(--color-text)]">Start Week On Monday</div>
 </div>
 <div class="shrink-0 flex justify-end w-[200px]">
 <button @click="on = !on" class="relative inline-flex h-5 w-9 shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none ring-offset-[var(--color-bg)]" :class="on ? 'bg-[#4f7cff]' : 'bg-[var(--color-border)]'">
 <span aria-hidden="true" class="pointer-events-none inline-block h-4 w-4 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out" :class="on ? 'translate-x-4' : 'translate-x-0'"></span>
 </button>
 </div>
 </div>
 </div>
 </div>

 {{-- Section 3: Dashboard Behavior --}}
 <div class="mb-10">
 <h2 class="text-[17px] font-semibold text-[var(--color-text)] mb-1">Dashboard Behavior</h2>
 <p class="text-[13px] text-[var(--color-text-secondary)] mb-6">Customize how you interact with the main dashboard.</p>
 
 <div class="space-y-0 divide-y divide-[var(--color-border)] border-t border-[var(--color-border)]">
 <div class="py-5 flex items-center justify-between gap-8 group">
 <div class="flex-1">
 <div class="text-[14px] font-medium text-[var(--color-text)]">Default Dashboard Page</div>
 <div class="text-[13px] text-[var(--color-text-secondary)] mt-0.5">The first page you see after logging in.</div>
 </div>
 <div class="w-[200px] shrink-0">
 <select class="w-full bg-[var(--color-bg)] border border-[var(--color-border)] text-[var(--color-text)] text-sm rounded-lg focus:ring-1 focus:ring-[#4f7cff] focus:border-[#4f7cff] px-3 py-2 outline-none transition-shadow appearance-none custom-select">
 <option value="overview" selected>Overview</option>
 <option value="projects">Projects</option>
 <option value="tasks">Tasks</option>
 <option value="clients">Clients</option>
 </select>
 </div>
 </div>

 <div class="py-5 flex items-center justify-between gap-8 group" x-data="{ on: true }">
 <div class="flex-1">
 <div class="text-[14px] font-medium text-[var(--color-text)]">Auto Save Changes</div>
 <div class="text-[13px] text-[var(--color-text-secondary)] mt-0.5">Automatically save forms across the application.</div>
 </div>
 <div class="shrink-0 flex justify-end w-[200px]">
 <button @click="on = !on" class="relative inline-flex h-5 w-9 shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none ring-offset-[var(--color-bg)]" :class="on ? 'bg-[#4f7cff]' : 'bg-[var(--color-border)]'">
 <span aria-hidden="true" class="pointer-events-none inline-block h-4 w-4 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out" :class="on ? 'translate-x-4' : 'translate-x-0'"></span>
 </button>
 </div>
 </div>

 <div class="py-5 flex items-center justify-between gap-8 group" x-data="{ on: false }">
 <div class="flex-1">
 <div class="text-[14px] font-medium text-[var(--color-text)]">Show Productivity Insights</div>
 <div class="text-[13px] text-[var(--color-text-secondary)] mt-0.5">Display completion stats and trends on dashboard.</div>
 </div>
 <div class="shrink-0 flex justify-end w-[200px]">
 <button @click="on = !on" class="relative inline-flex h-5 w-9 shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none ring-offset-[var(--color-bg)]" :class="on ? 'bg-[#4f7cff]' : 'bg-[var(--color-border)]'">
 <span aria-hidden="true" class="pointer-events-none inline-block h-4 w-4 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out" :class="on ? 'translate-x-4' : 'translate-x-0'"></span>
 </button>
 </div>
 </div>
 </div>
 </div>
 </div>

 {{-- Notifications Section Content --}}
 <div class="px-8 pb-12 -mt-4" x-show="settingsCategory === 'Notifications'" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" style="display: none;">
 {{-- Header --}}
 <div class="mb-10">
 <div class="text-[13px] font-semibold tracking-wide text-[#4f7cff] mb-1 uppercase">Account</div>
 <h1 class="text-[28px] font-bold text-[#111827] mb-2 leading-tight">Notifications</h1>
 <p class="text-[14px] text-[#6B7280]">Manage what you are notified about and how you receive alerts.</p>
 </div>

 {{-- Section: Notification Preferences --}}
 <div class="mb-10">
 <h2 class="text-[17px] font-semibold text-[#111827] mb-1">Alert Settings</h2>
 <p class="text-[13px] text-[#6B7280] mb-6">Choose what events trigger a notification.</p>
 
 <div class="space-y-0 divide-y divide-[#E5E7EB] border-t border-[#E5E7EB]">
 <div class="py-5 flex items-center justify-between gap-8 group" x-data="{ on: true }">
 <div class="flex-1">
 <div class="text-[14px] font-medium text-[#111827]">Email Notifications</div>
 <div class="text-[13px] text-[#6B7280] mt-0.5">Receive digests and important alerts via email.</div>
 </div>
 <div class="shrink-0 flex justify-end w-[200px]">
 <button @click="on = !on" class="relative inline-flex h-5 w-9 shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none ring-offset-[#E5E7EB]" :class="on ? 'bg-[#4f7cff]' : 'bg-[#E5E7EB]'">
 <span aria-hidden="true" class="pointer-events-none inline-block h-4 w-4 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out" :class="on ? 'translate-x-4' : 'translate-x-0'"></span>
 </button>
 </div>
 </div>
 
 <div class="py-5 flex items-center justify-between gap-8 group" x-data="{ on: true }">
 <div class="flex-1">
 <div class="text-[14px] font-medium text-[#111827]">Task Assignment Alerts</div>
 <div class="text-[13px] text-[#6B7280] mt-0.5">Get notified when you are assigned to a new task.</div>
 </div>
 <div class="shrink-0 flex justify-end w-[200px]">
 <button @click="on = !on" class="relative inline-flex h-5 w-9 shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none ring-offset-[#E5E7EB]" :class="on ? 'bg-[#4f7cff]' : 'bg-[#E5E7EB]'">
 <span aria-hidden="true" class="pointer-events-none inline-block h-4 w-4 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out" :class="on ? 'translate-x-4' : 'translate-x-0'"></span>
 </button>
 </div>
 </div>

 <div class="py-5 flex items-center justify-between gap-8 group" x-data="{ on: false }">
 <div class="flex-1">
 <div class="text-[14px] font-medium text-[#111827]">Project Updates</div>
 <div class="text-[13px] text-[#6B7280] mt-0.5">Updates on project milestones and status changes.</div>
 </div>
 <div class="shrink-0 flex justify-end w-[200px]">
 <button @click="on = !on" class="relative inline-flex h-5 w-9 shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none ring-offset-[#E5E7EB]" :class="on ? 'bg-[#4f7cff]' : 'bg-[#E5E7EB]'">
 <span aria-hidden="true" class="pointer-events-none inline-block h-4 w-4 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out" :class="on ? 'translate-x-4' : 'translate-x-0'"></span>
 </button>
 </div>
 </div>

 <div class="py-5 flex items-center justify-between gap-8 group" x-data="{ on: true }">
 <div class="flex-1">
 <div class="text-[14px] font-medium text-[#111827]">Weekly Activity Summary</div>
 <div class="text-[13px] text-[#6B7280] mt-0.5">Receive a wrap-up report every Monday morning.</div>
 </div>
 <div class="shrink-0 flex justify-end w-[200px]">
 <button @click="on = !on" class="relative inline-flex h-5 w-9 shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none ring-offset-[#E5E7EB]" :class="on ? 'bg-[#4f7cff]' : 'bg-[#E5E7EB]'">
 <span aria-hidden="true" class="pointer-events-none inline-block h-4 w-4 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out" :class="on ? 'translate-x-4' : 'translate-x-0'"></span>
 </button>
 </div>
 </div>
 </div>
 </div>
 </div>

 {{-- Placeholder for other sections --}}
 <div class="px-8 pb-12 -mt-4 flex items-center justify-center h-full min-h-[400px]" 
 x-show="settingsCategory !== 'Preferences' && settingsCategory !== 'Notifications'" 
 x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" style="display: none;">
 <div class="text-center">
 <div class="w-16 h-16 bg-white rounded-full mx-auto flex items-center justify-center mb-4 border border-[#E5E7EB]">
 <svg class="w-8 h-8 text-[#4f7cff]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
 </div>
 <h3 class="text-lg font-semibold text-[#111827] mb-1" x-text="settingsCategory + ' Settings'"></h3>
 <p class="text-[14px] text-[#6B7280]">Configuration options for this module aren't available yet.</p>
 </div>
 </div>

 </div>
 </div>
 </div>
</template>

<style>
/* Custom scrollbar for settings modal */
.custom-scrollbar::-webkit-scrollbar {
 width: 6px;
}
.custom-scrollbar::-webkit-scrollbar-track {
 background: transparent;
}
.custom-scrollbar::-webkit-scrollbar-thumb {
 background-color: rgba(38, 43, 51, 0);
 border-radius: 20px;
 transition: background-color 0.2s;
}
.custom-scrollbar:hover::-webkit-scrollbar-thumb {
 background-color: rgba(154, 164, 175, 0.3);
}

/* Custom select styling for standard dark theme */
.custom-select {
 background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%239aa4af' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
 background-position: right 0.5rem center;
 background-repeat: no-repeat;
 background-size: 1.5em 1.5em;
}
</style>
