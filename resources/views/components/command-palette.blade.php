{{-- Global Command Palette (Ctrl+K / Cmd+K) --}}
<template x-teleport="body">
<div x-show="commandOpen" x-cloak
     x-transition:enter="transition ease-out duration-200"
     x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100"
     class="fixed inset-0 z-[100] flex items-start justify-center pt-[15vh] px-4 bg-black/50"
     @keydown.escape.window="commandOpen = false"
     @click.self="commandOpen = false">
    <div class="w-full max-w-xl bg-white rounded-xl shadow-2xl border border-[#E2E8F0] overflow-hidden"
         @click.stop>
        <div class="flex items-center gap-3 px-4 border-b border-[#E2E8F0]">
            <svg class="w-5 h-5 text-[#64748B] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
            <input type="text" x-ref="commandInput" x-model="searchQuery" @input="runSearch()"
                   placeholder="Search clients, projects, tasks, invoices..."
                   class="flex-1 py-3 bg-transparent text-[#0F172A] placeholder-[#94A3B8] focus:outline-none">
            <kbd class="hidden sm:inline-flex px-2 py-1 text-xs font-mono bg-[#F1F5F9] rounded text-[#64748B]">ESC</kbd>
        </div>
        <div class="max-h-80 overflow-y-auto py-2">
            <template x-for="(item, i) in searchResults" :key="i">
                <a :href="item.url" @click="commandOpen = false"
                   class="flex items-center gap-3 px-4 py-2.5 hover:bg-[#F1F5F9] text-left transition-colors">
                    <span class="w-8 h-8 rounded-lg bg-[#EEF2FF] flex items-center justify-center text-[#4F46E5] text-xs font-medium" x-text="item.type.charAt(0).toUpperCase()"></span>
                    <span class="text-[#0F172A]" x-text="item.label"></span>
                </a>
            </template>
            <p class="px-4 py-3 text-xs text-[#64748B]">Quick: <kbd class="px-1.5 py-0.5 bg-[#F1F5F9] rounded">⌘K</kbd> Command palette · <kbd class="px-1.5 py-0.5 bg-[#F1F5F9] rounded">+</kbd> Quick create</p>
        </div>
    </div>
</div>
</template>
