{{-- Universal Smart Search (Ctrl+K / Cmd+K) --}}
<div x-show="commandOpen" x-cloak
     x-transition:enter="transition ease-out duration-200"
     x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100"
     class="fixed inset-0 z-[100] flex items-start justify-center pt-24 px-4 sm:px-6 bg-[#0F172A]/50 backdrop-blur-sm"
     @keydown.escape.window="commandOpen = false"
     @click.self="commandOpen = false">
    <div class="w-full max-w-3xl bg-white rounded-2xl shadow-2xl ring-1 ring-black/5 overflow-hidden"
         @click.stop
         @keydown.arrow-down.prevent="searchNavDown()"
         @keydown.arrow-up.prevent="searchNavUp()"
         @keydown.enter.prevent="searchNavSelect()">

        {{-- Search Input --}}
        <div class="flex items-center gap-3 px-5 border-b border-[#E2E8F0]">
            <svg class="w-5 h-5 text-[#94A3B8] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
            <input type="text" x-ref="commandInput" x-model="searchQuery" @input="runSearch()"
                   placeholder="Search everything... try 'client:acme' or 'status:overdue'"
                   class="flex-1 py-4 bg-transparent text-[#0F172A] placeholder-[#94A3B8] focus:outline-none text-[15px]">
            <div class="flex items-center gap-1.5">
                <kbd class="hidden sm:inline-flex px-2 py-1 text-[10px] font-mono bg-[#F1F5F9] rounded text-[#94A3B8] border border-[#E2E8F0]">ESC</kbd>
            </div>
        </div>

        {{-- Active Filters --}}
        <div x-show="activeFilters.length > 0" class="flex items-center gap-2 px-5 py-2.5 border-b border-[#F1F5F9] bg-[#F8FAFC]">
            <span class="text-xs text-[#94A3B8] font-medium">Filters:</span>
            <template x-for="(filter, fi) in activeFilters" :key="fi">
                <span class="inline-flex items-center gap-1 px-2.5 py-1 bg-[#EEF2FF] text-[#4F7CFF] rounded-lg text-xs font-medium">
                    <span x-text="filter"></span>
                    <button @click="removeFilter(fi)" class="hover:text-[#EF4444] transition-colors">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </span>
            </template>
            <button @click="clearFilters()" class="text-xs text-[#94A3B8] hover:text-[#EF4444] transition-colors ml-auto">Clear all</button>
        </div>

        {{-- Results Area --}}
        <div class="max-h-[420px] overflow-y-auto">

            {{-- AI Suggestions --}}
            <template x-if="aiSuggestions.length > 0 && searchQuery.length > 0">
                <div class="px-3 pt-3 pb-1">
                    <p class="px-2 mb-2 text-[11px] font-bold tracking-wider text-[#94A3B8] uppercase">✨ Smart Suggestions</p>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-2">
                        <template x-for="(sug, si) in aiSuggestions" :key="si">
                            <button @click="applySuggestion(sug)"
                                    class="flex items-center gap-2.5 p-3 rounded-xl border border-[#E2E8F0] hover:border-[#4F7CFF] hover:bg-[#EEF2FF] transition-all text-left group">
                                <span class="w-8 h-8 rounded-lg flex items-center justify-center text-sm shrink-0"
                                      :class="sug.color">
                                    <span x-text="sug.icon"></span>
                                </span>
                                <div class="min-w-0">
                                    <p class="text-sm font-medium text-[#0F172A] truncate" x-text="sug.label"></p>
                                    <p class="text-[11px] text-[#94A3B8]" x-text="sug.count + ' items'"></p>
                                </div>
                            </button>
                        </template>
                    </div>
                </div>
            </template>

            {{-- Filter Suggestions --}}
            <template x-if="filterSuggestions.length > 0 && searchQuery.length > 0">
                <div class="px-3 pt-3 pb-1">
                    <p class="px-2 mb-2 text-[11px] font-bold tracking-wider text-[#94A3B8] uppercase">Filter by</p>
                    <div class="flex flex-wrap gap-1.5 px-2">
                        <template x-for="(fs, fsi) in filterSuggestions" :key="fsi">
                            <button @click="applyFilterSuggestion(fs)"
                                    class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg border border-[#E2E8F0] hover:border-[#4F7CFF] hover:bg-[#EEF2FF] transition-all text-xs font-medium text-[#64748B] hover:text-[#4F7CFF]">
                                <span x-text="fs.label"></span>
                            </button>
                        </template>
                    </div>
                </div>
            </template>

            {{-- Saved Searches --}}
            <template x-if="!searchQuery && savedSearches.length > 0">
                <div class="px-3 pt-3 pb-1">
                    <p class="px-2 mb-2 text-[11px] font-bold tracking-wider text-[#94A3B8] uppercase">⭐ Saved Searches</p>
                    <template x-for="(ss, ssi) in savedSearches" :key="ssi">
                        <button @click="searchQuery = ss; runSearch()"
                                class="flex items-center gap-3 w-full px-3 py-2 rounded-lg hover:bg-[#F8FAFC] text-left transition-colors group">
                            <svg class="w-4 h-4 text-[#F59E0B] shrink-0" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                            <span class="text-sm text-[#0F172A]" x-text="ss"></span>
                            <button @click.stop="removeSavedSearch(ssi)" class="ml-auto p-1 rounded opacity-0 group-hover:opacity-100 hover:bg-[#FEF2F2] text-[#94A3B8] hover:text-[#EF4444] transition-all">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                            </button>
                        </button>
                    </template>
                </div>
            </template>

            {{-- Recent Searches --}}
            <template x-if="!searchQuery && recentSearches.length > 0">
                <div class="px-3 pt-3 pb-1">
                    <div class="flex items-center justify-between px-2 mb-2">
                        <p class="text-[11px] font-bold tracking-wider text-[#94A3B8] uppercase">Recent Searches</p>
                        <button @click="clearRecentSearches()" class="text-[11px] text-[#94A3B8] hover:text-[#EF4444] transition-colors">Clear</button>
                    </div>
                    <template x-for="(rs, rsi) in recentSearches" :key="rsi">
                        <button @click="searchQuery = rs; runSearch()"
                                class="flex items-center gap-3 w-full px-3 py-2 rounded-lg hover:bg-[#F8FAFC] text-left transition-colors">
                            <svg class="w-4 h-4 text-[#94A3B8] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span class="text-sm text-[#64748B]" x-text="rs"></span>
                        </button>
                    </template>
                </div>
            </template>

            {{-- Categorized Search Results --}}
            <template x-for="(group, gi) in groupedResults" :key="gi">
                <div class="px-3 pt-3 pb-1">
                    <p class="px-2 mb-1.5 text-[11px] font-bold tracking-wider text-[#94A3B8] uppercase" x-text="group.category"></p>
                    <template x-for="(item, ii) in group.items" :key="ii">
                        <a :href="item.url || '#'" @click.prevent="searchNavIndex = item._globalIndex; searchNavSelect()"
                           class="flex items-center gap-3 px-3 py-2.5 rounded-lg hover:bg-[#F8FAFC] text-left transition-all group/item"
                           :class="searchNavIndex === item._globalIndex ? 'bg-[#EEF2FF] ring-1 ring-[#4F7CFF]/20' : ''">
                            <span class="w-9 h-9 rounded-lg flex items-center justify-center text-xs font-semibold shrink-0"
                                  :class="item.typeColor">
                                <span x-text="item.typeIcon"></span>
                            </span>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-[#0F172A] truncate" x-text="item.label"></p>
                                <p class="text-[11px] text-[#94A3B8] truncate" x-text="item.subtitle" x-show="item.subtitle"></p>
                            </div>
                            <template x-if="item.badge">
                                <span class="text-[11px] font-medium px-2 py-0.5 rounded-full shrink-0" :class="item.badgeColor" x-text="item.badge"></span>
                            </template>
                            <div class="flex items-center gap-1.5 ml-2">
                                <template x-for="(action, ai) in (item.quickActions || [])" :key="ai">
                                    <button @click.prevent.stop="triggerQuickAction(item, action)"
                                            class="px-2.5 py-1 bg-white border border-[#E2E8F0] hover:border-[#4F7CFF] hover:text-[#4F7CFF] text-[#64748B] text-[10px] font-medium rounded-md transition-colors shadow-sm opacity-0 group-hover/item:opacity-100"
                                            x-text="action.label"></button>
                                </template>
                            </div>
                        </a>
                    </template>
                </div>
            </template>

            {{-- No Results --}}
            <template x-if="searchQuery && groupedResults.length === 0 && aiSuggestions.length === 0">
                <div class="px-5 py-12 text-center">
                    <div class="w-16 h-16 rounded-full bg-[#F1F5F9] flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-[#94A3B8]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    </div>
                    <p class="text-sm font-medium text-[#0F172A]">No results found</p>
                    <p class="text-xs text-[#94A3B8] mt-1">Try different keywords or filters like <kbd class="px-1.5 py-0.5 bg-[#F1F5F9] rounded text-[11px]">client:</kbd> <kbd class="px-1.5 py-0.5 bg-[#F1F5F9] rounded text-[11px]">status:</kbd></p>
                </div>
            </template>
        </div>

        {{-- Footer --}}
        <div class="px-5 py-3 border-t border-[#E2E8F0] bg-[#F8FAFC] flex items-center justify-between">
            <div class="flex items-center gap-3 text-[11px] text-[#94A3B8]">
                <span class="flex items-center gap-1"><kbd class="px-1.5 py-0.5 bg-white rounded border border-[#E2E8F0] font-mono">↑↓</kbd> Navigate</span>
                <span class="flex items-center gap-1"><kbd class="px-1.5 py-0.5 bg-white rounded border border-[#E2E8F0] font-mono">↵</kbd> Open</span>
                <span class="flex items-center gap-1"><kbd class="px-1.5 py-0.5 bg-white rounded border border-[#E2E8F0] font-mono">esc</kbd> Close</span>
            </div>
            <div class="flex items-center gap-2 text-[11px] text-[#94A3B8]">
                <span class="flex items-center gap-1">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    Powered by Smart Search
                </span>
            </div>
        </div>
    </div>
</div>
