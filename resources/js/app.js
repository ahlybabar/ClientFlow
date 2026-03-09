import './bootstrap';
import Alpine from 'alpinejs';
import Chart from 'chart.js/auto';
window.Chart = Chart; // make globally available to blade scripts

// Semantic Colors for Charts
window.chartColors = {
    primary: '#6366F1',
    success: '#22C55E',
    warning: '#F59E0B',
    danger: '#EF4444',
    neutral: '#94A3B8',
    primaryLight: 'rgba(99, 102, 241, 0.1)',
};

// Global Chart Defaults
Chart.defaults.font.family = "'Inter', sans-serif";
Chart.defaults.color = '#64748B';
Chart.defaults.scale.grid.color = 'rgba(226, 232, 240, 0.5)';
Chart.defaults.scale.ticks.color = '#64748B';
Chart.defaults.plugins.tooltip.backgroundColor = 'rgba(15, 23, 42, 0.9)';
Chart.defaults.plugins.tooltip.titleFont = { size: 13, weight: '600' };
Chart.defaults.plugins.tooltip.bodyFont = { size: 13 };
Chart.defaults.plugins.tooltip.padding = 10;
Chart.defaults.plugins.tooltip.cornerRadius = 8;
Chart.defaults.plugins.tooltip.displayColors = false;

window.Alpine = Alpine;

// Type metadata
const typeConfig = {
    client:  { icon: '👤', color: 'bg-[#EEF2FF] text-[#4F46E5]', category: 'Clients' },
    project: { icon: '📁', color: 'bg-[#ECFDF5] text-[#22C55E]', category: 'Projects' },
    task:    { icon: '✓',  color: 'bg-[#FEF3C7] text-[#F59E0B]', category: 'Tasks' },
    invoice: { icon: '$',  color: 'bg-[#FEF2F2] text-[#EF4444]', category: 'Invoices' },
    team:    { icon: '👥', color: 'bg-[#F0F9FF] text-[#0EA5E9]', category: 'Team Members' },
    file:    { icon: '📄', color: 'bg-[#F5F3FF] text-[#8B5CF6]', category: 'Files' },
    note:    { icon: '📝', color: 'bg-[#FFF7ED] text-[#F97316]', category: 'Notes' },
};

const badgeConfig = {
    active:      { text: 'Active',      color: 'bg-[#ECFDF5] text-[#22C55E]' },
    inactive:    { text: 'Inactive',    color: 'bg-[#F1F5F9] text-[#64748B]' },
    'in-progress': { text: 'In Progress', color: 'bg-[#EEF2FF] text-[#4F46E5]' },
    paid:        { text: 'Paid',        color: 'bg-[#ECFDF5] text-[#22C55E]' },
    unpaid:      { text: 'Unpaid',      color: 'bg-[#FEF3C7] text-[#F59E0B]' },
    overdue:     { text: 'Overdue',     color: 'bg-[#FEF2F2] text-[#EF4444]' },
    todo:        { text: 'To Do',       color: 'bg-[#F1F5F9] text-[#64748B]' },
    healthy:     { text: 'Healthy',     color: 'bg-[#ECFDF5] text-[#22C55E]' },
    'at-risk':   { text: 'At Risk',     color: 'bg-[#FEF3C7] text-[#F59E0B]' },
    critical:    { text: 'Critical',    color: 'bg-[#FEF2F2] text-[#EF4444]' },
    away:        { text: 'Away',        color: 'bg-[#FEF3C7] text-[#F59E0B]' },
};

// AI suggestion triggers
const aiTriggers = {
    idle: [
        { label: 'Inactive Clients', icon: '😴', color: 'bg-[#F1F5F9] text-[#64748B]', filter: 'status:inactive', type: 'client', count: 2 },
    ],
    delayed: [
        { label: 'Projects at Risk', icon: '⏳', color: 'bg-[#FEF3C7] text-[#F59E0B]', filter: 'health:at-risk', type: 'project', count: 1 },
    ],
    overdue: [
        { label: 'Overdue Tasks', icon: '⚡', color: 'bg-[#FEF2F2] text-[#EF4444]', filter: 'status:overdue', type: 'task', count: 3 },
        { label: 'Overdue Invoices', icon: '💰', color: 'bg-[#FEF3C7] text-[#F59E0B]', filter: 'status:overdue', type: 'invoice', count: 2 },
        { label: 'Projects at Risk', icon: '⚠️', color: 'bg-[#FFF7ED] text-[#F97316]', filter: 'health:at-risk', type: 'project', count: 1 },
    ],
    unpaid: [
        { label: 'Unpaid Invoices', icon: '💳', color: 'bg-[#FEF3C7] text-[#F59E0B]', filter: 'invoice:unpaid', type: 'invoice', count: 2 },
        { label: 'Outstanding Balance', icon: '📊', color: 'bg-[#EEF2FF] text-[#4F46E5]', filter: 'invoice:unpaid', type: 'invoice', count: 4 },
    ],
    risk: [
        { label: 'At Risk Projects', icon: '⚠️', color: 'bg-[#FEF3C7] text-[#F59E0B]', filter: 'health:at-risk', type: 'project', count: 1 },
        { label: 'Critical Projects', icon: '🔴', color: 'bg-[#FEF2F2] text-[#EF4444]', filter: 'health:critical', type: 'project', count: 1 },
    ],
    high: [
        { label: 'High Priority Tasks', icon: '🔥', color: 'bg-[#FEF2F2] text-[#EF4444]', filter: 'task:high-priority', type: 'task', count: 3 },
        { label: 'Critical Tasks', icon: '⚡', color: 'bg-[#FEF3C7] text-[#F59E0B]', filter: 'task:critical', type: 'task', count: 1 },
    ],
};

// Command palette + Quick Create (global state)
document.addEventListener('alpine:init', () => {
    Alpine.data('globalApp', () => ({
        commandOpen: false,
        quickCreateOpen: false,
        quickCreateTab: 'client',
        notifOpen: false,
        mobileSidebarOpen: false,
        settingsModalOpen: false,
        settingsCategory: 'Preferences',
        theme: 'light',
        searchQuery: '',

        // ── Sidebar state ──
        sidebarPinned: true,
        sidebarVisible: true,
        sidebarHideTimer: null,
        sidebarShowTimer: null,

        // ── Smart Search state ──
        searchResults: [],
        groupedResults: [],
        aiSuggestions: [],
        filterSuggestions: [],
        activeFilters: [],
        recentSearches: [],
        savedSearches: [],
        searchNavIndex: -1,
        flatResults: [],
        searchTimeout: null,

        init() {
            // Restore sidebar pinned preference
            try {
                const pinned = localStorage.getItem('sidebarPinned');
                if (pinned !== null) {
                    this.sidebarPinned = pinned === 'true';
                    // If sidebar was kept open for this page load (nav click while unpinned)
                    const keepOpen = sessionStorage.getItem('sidebarKeepOpen');
                    if (keepOpen === 'true' && !this.sidebarPinned) {
                        this.sidebarVisible = true;
                        sessionStorage.removeItem('sidebarKeepOpen');
                        // Auto-hide: start a timer that hides the sidebar unless mouse is over it
                        this.$nextTick(() => {
                            const sidebar = document.getElementById('desktop-sidebar');
                            if (sidebar) {
                                let keepOpenTimer = setTimeout(() => {
                                    // Check if mouse is over sidebar using :hover
                                    if (!sidebar.matches(':hover')) {
                                        this.sidebarVisible = false;
                                    }
                                }, 600);
                                // If user's mouse IS on sidebar, cancel the auto-hide
                                const onEnter = () => {
                                    clearTimeout(keepOpenTimer);
                                    sidebar.removeEventListener('mouseenter', onEnter);
                                };
                                sidebar.addEventListener('mouseenter', onEnter);
                            }
                        });
                    } else {
                        this.sidebarVisible = this.sidebarPinned;
                    }
                }
            } catch (e) { }

            // Restore theme
            try {
                const savedTheme = localStorage.getItem('theme');
                if (savedTheme) {
                    this.theme = savedTheme;
                } else if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
                    this.theme = 'dark';
                }
                this.applyTheme();
            } catch (e) { }

            // Restore saved & recent searches
            try {
                this.recentSearches = JSON.parse(localStorage.getItem('cf_recent_searches') || '[]');
                this.savedSearches = JSON.parse(localStorage.getItem('cf_saved_searches') || '["status:overdue", "invoice:unpaid", "client:acme"]');
            } catch (e) { }

            window.addEventListener('keydown', (e) => {
                if ((e.metaKey || e.ctrlKey) && e.key === 'k') {
                    e.preventDefault();
                    this.searchQuery = '';
                    this.activeFilters = [];
                    this.searchNavIndex = -1;
                    this.runSearch();
                    this.commandOpen = true;
                    this.$nextTick(() => this.$refs.commandInput?.focus());
                }
                if (e.key === 'Escape') {
                    this.commandOpen = false;
                    this.quickCreateOpen = false;
                    this.notifOpen = false;
                }
            });
            
            // Listen for system theme changes if using system theme
            window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', e => {
                if (this.theme === 'system') {
                    this.applyTheme();
                }
            });
        },

        // ── Theme methods ──
        setTheme(newTheme) {
            this.theme = newTheme;
            try {
                localStorage.setItem('theme', newTheme);
            } catch (e) {}
            this.applyTheme();
        },
        
        applyTheme() {
            let isDark = false;
            if (this.theme === 'system') {
                isDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            } else {
                isDark = this.theme === 'dark';
            }
            
            if (isDark) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
            // Dispatch event for charts to update
            window.dispatchEvent(new Event('theme-changed'));
        },

        // ── Sidebar methods ──
        scheduleSidebarShow() {
            if (this.sidebarPinned) return;
            // Always cancel any pending hide
            if (this.sidebarHideTimer) {
                clearTimeout(this.sidebarHideTimer);
                this.sidebarHideTimer = null;
            }
            // If already visible, nothing to do
            if (this.sidebarVisible) return;
            // Cancel any previous show timer before scheduling a new one
            if (this.sidebarShowTimer) {
                clearTimeout(this.sidebarShowTimer);
                this.sidebarShowTimer = null;
            }
            this.sidebarShowTimer = setTimeout(() => {
                this.sidebarVisible = true;
                this.sidebarShowTimer = null;
            }, 150);
        },
        showSidebar() {
            if (this.sidebarHideTimer) {
                clearTimeout(this.sidebarHideTimer);
                this.sidebarHideTimer = null;
            }
            this.sidebarVisible = true;
        },
        scheduleSidebarHide() {
            if (this.sidebarPinned) return;
            // Cancel any pending show timer
            if (this.sidebarShowTimer) {
                clearTimeout(this.sidebarShowTimer);
                this.sidebarShowTimer = null;
            }
            // Cancel any existing hide timer before scheduling a new one
            if (this.sidebarHideTimer) {
                clearTimeout(this.sidebarHideTimer);
                this.sidebarHideTimer = null;
            }
            this.sidebarHideTimer = setTimeout(() => {
                this.sidebarVisible = false;
                this.sidebarHideTimer = null;
            }, 300);
        },
        togglePin() {
            this.sidebarPinned = !this.sidebarPinned;
            this.sidebarVisible = true;
            if (this.sidebarShowTimer) {
                clearTimeout(this.sidebarShowTimer);
                this.sidebarShowTimer = null;
            }
            if (this.sidebarHideTimer) {
                clearTimeout(this.sidebarHideTimer);
                this.sidebarHideTimer = null;
            }
            try {
                localStorage.setItem('sidebarPinned', this.sidebarPinned);
            } catch (e) { }
        },

        // ── Smart Search methods ──
        runSearch() {
            const raw = (this.searchQuery || '').trim();
            this.searchNavIndex = -1;
            
            if (this.searchTimeout) clearTimeout(this.searchTimeout);
            
            // Handle Commands First
            const lowerRaw = raw.toLowerCase();
            this.flatResults = [];
            this.groupedResults = [];
            this.aiSuggestions = [];
            this.filterSuggestions = [];

            // Quick Navigation Commands
            if (lowerRaw.startsWith('go ')) {
                const dest = lowerRaw.substring(3).trim();
                const routes = [
                    { label: 'Go to Dashboard', url: '/dashboard', icon: '📍', color: 'bg-[#F1F5F9] text-[#64748B]' },
                    { label: 'Go to Clients', url: '/clients', icon: '📍', color: 'bg-[#F1F5F9] text-[#64748B]' },
                    { label: 'Go to Projects', url: '/projects', icon: '📍', color: 'bg-[#F1F5F9] text-[#64748B]' },
                    { label: 'Go to Tasks', url: '/tasks', icon: '📍', color: 'bg-[#F1F5F9] text-[#64748B]' },
                    { label: 'Go to Invoices', url: '/invoices', icon: '📍', color: 'bg-[#F1F5F9] text-[#64748B]' },
                    { label: 'Go to Analytics', url: '/analytics', icon: '📍', color: 'bg-[#F1F5F9] text-[#64748B]' },
                    { label: 'Go to Team', url: '/team', icon: '📍', color: 'bg-[#F1F5F9] text-[#64748B]' },
                    { label: 'Go to Automation', url: '/automation', icon: '📍', color: 'bg-[#F1F5F9] text-[#64748B]' },
                    { label: 'Go to Portal', url: '/portal', icon: '📍', color: 'bg-[#F1F5F9] text-[#64748B]' },
                ];
                let matches = routes;
                if (dest) {
                    matches = routes.filter(r => r.label.toLowerCase().includes(dest));
                }
                const enriched = matches.map((item, idx) => ({
                    ...item,
                    typeIcon: item.icon,
                    typeColor: item.color,
                    isCommand: true,
                    _globalIndex: idx
                }));
                this.flatResults = enriched;
                this.groupedResults = [{ category: 'Navigation Commands', items: enriched }];
                return;
            }

            // Quick Create Commands
            if (lowerRaw.startsWith('new ') || lowerRaw.startsWith('create ') || lowerRaw.startsWith('add ') || lowerRaw.startsWith('upload ')) {
                const keyword = lowerRaw.replace(/^(new|create|add|upload)\s+/, '');
                const creates = [
                    { label: 'Create New Project', tab: 'project', icon: '📁', color: 'bg-[#ECFDF5] text-[#22C55E]' },
                    { label: 'Create New Client', tab: 'client', icon: '👤', color: 'bg-[#EEF2FF] text-[#4F46E5]' },
                    { label: 'Create Invoice', tab: 'invoice', icon: '$', color: 'bg-[#FEF2F2] text-[#EF4444]' },
                    { label: 'Add Task', tab: 'task', icon: '✓', color: 'bg-[#FEF3C7] text-[#F59E0B]' },
                    { label: 'Upload File', action: 'upload', icon: '📄', color: 'bg-[#F5F3FF] text-[#8B5CF6]' },
                ];
                let matches = creates;
                if (keyword) {
                    matches = creates.filter(c => c.label.toLowerCase().includes(keyword));
                }
                const enriched = matches.map((item, idx) => ({
                    ...item,
                    typeIcon: item.icon,
                    typeColor: item.color,
                    isQuickCreate: true,
                    _globalIndex: idx
                }));
                this.flatResults = enriched;
                this.groupedResults = [{ category: 'Actions', items: enriched }];
                return;
            }
            
            if (!raw) {
                return;
            }

            // Real Search API (Debounced)
            if (this.searchTimeout) clearTimeout(this.searchTimeout);
            this.searchTimeout = setTimeout(() => {
                this.fetchSearchResults(raw);
            }, 300);
        },

        async fetchSearchResults(query) {
            // Parse filter prefixes
            const filterRegex = /(\w+):(\S+)/g;
            const queryFilters = [];
            let match;
            let plainQuery = query;

            while ((match = filterRegex.exec(query)) !== null) {
                queryFilters.push({ key: match[1].toLowerCase(), value: match[2].toLowerCase() });
                plainQuery = plainQuery.replace(match[0], '').trim();
            }

            const q = plainQuery.toLowerCase();

            // Client-side AI Suggestions
            this.aiSuggestions = [];
            if (q && !queryFilters.length) {
                for (const [trigger, suggestions] of Object.entries(aiTriggers)) {
                    if (q.includes(trigger)) {
                        this.aiSuggestions = suggestions;
                        break;
                    }
                }
            }

            this.filterSuggestions = [];
            if (q && !queryFilters.length && this.aiSuggestions.length === 0) {
                this.filterSuggestions = [
                    { label: `client:${q}`, desc: 'Search clients' },
                    { label: `project:${q}`, desc: 'Search projects' },
                    { label: `task:${q}`, desc: 'Search tasks' },
                    { label: `status:${q}`, desc: 'Filter by status' },
                ];
            }

            try {
                // Pass full query to backend
                const res = await fetch('/api/search?q=' + encodeURIComponent(query));
                const data = await res.json();
                
                let globalIdx = 0;
                this.flatResults = [];
                const groups = [];

                for (const [categoryKey, items] of Object.entries(data)) {
                    if (!items.length) continue;
                    
                    const enrichedItems = items.map(item => {
                        const tc = typeConfig[item.type] || typeConfig.note;
                        const bc = item.status ? badgeConfig[item.status] : (item.health ? badgeConfig[item.health] : null);
                        
                        // Define context actions
                        let quickActions = [];
                        if (item.type === 'client') {
                            quickActions = [{ label: 'View', action: 'view' }, { label: 'Invoice', action: 'quick:invoice' }];
                        } else if (item.type === 'project') {
                            quickActions = [{ label: 'View', action: 'view' }, { label: 'Add Task', action: 'quick:task' }];
                        } else {
                            quickActions = [{ label: 'View', action: 'view' }];
                        }

                        const enriched = {
                            ...item,
                            typeIcon: tc.icon,
                            typeColor: tc.color,
                            badge: bc ? bc.text : null,
                            badgeColor: bc ? bc.color : '',
                            quickActions: quickActions,
                            _globalIndex: globalIdx++,
                        };
                        this.flatResults.push(enriched);
                        return enriched;
                    });
                     
                    const catName = typeConfig[categoryKey.replace(/s$/, '')]?.category || (categoryKey.charAt(0).toUpperCase() + categoryKey.slice(1));
                    groups.push({ category: catName, items: enrichedItems });
                }
                
                this.groupedResults = groups;
            } catch (e) {
                console.error('Search API failed', e);
            }
        },

        applySuggestion(sug) {
            this.searchQuery = sug.filter;
            this.runSearch();
        },

        applyFilterSuggestion(fs) {
            this.searchQuery = fs.label;
            this.runSearch();
        },

        removeFilter(index) {
            this.activeFilters.splice(index, 1);
            this.runSearch();
        },

        clearFilters() {
            this.activeFilters = [];
            this.searchQuery = '';
            this.runSearch();
        },

        // ── Recent Searches ──
        addRecentSearch(query) {
            if (!query || query.length < 2) return;
            this.recentSearches = [query, ...this.recentSearches.filter(s => s !== query)].slice(0, 5);
            try { localStorage.setItem('cf_recent_searches', JSON.stringify(this.recentSearches)); } catch (e) { }
        },

        clearRecentSearches() {
            this.recentSearches = [];
            try { localStorage.setItem('cf_recent_searches', '[]'); } catch (e) { }
        },

        // ── Saved Searches ──
        toggleSaveSearch(query) {
            if (!query) return;
            const idx = this.savedSearches.indexOf(query);
            if (idx > -1) {
                this.savedSearches.splice(idx, 1);
            } else {
                this.savedSearches.unshift(query);
            }
            try { localStorage.setItem('cf_saved_searches', JSON.stringify(this.savedSearches)); } catch (e) { }
        },

        removeSavedSearch(index) {
            this.savedSearches.splice(index, 1);
            try { localStorage.setItem('cf_saved_searches', JSON.stringify(this.savedSearches)); } catch (e) { }
        },

        // ── Keyboard Navigation ──
        searchNavDown() {
            if (this.flatResults.length === 0) return;
            this.searchNavIndex = Math.min(this.searchNavIndex + 1, this.flatResults.length - 1);
        },

        searchNavUp() {
            this.searchNavIndex = Math.max(this.searchNavIndex - 1, -1);
        },

        searchNavSelect() {
            if (this.searchNavIndex >= 0 && this.searchNavIndex < this.flatResults.length) {
                const item = this.flatResults[this.searchNavIndex];
                this.addRecentSearch(this.searchQuery);
                this.commandOpen = false;
                
                if (item.isCommand) {
                    window.location.href = item.url;
                } else if (item.isQuickCreate) {
                    if (item.action === 'upload') {
                        window.toast('Upload modal (simulated)', 'info');
                    } else {
                        this.quickCreateTab = item.tab;
                        this.quickCreateOpen = true;
                    }
                } else {
                    window.location.href = item.url;
                }
            }
        },

        triggerQuickAction(item, actionObj) {
            if (actionObj.action === 'view') {
                this.addRecentSearch(this.searchQuery);
                this.commandOpen = false;
                window.location.href = item.url;
            } else if (actionObj.action.startsWith('quick:')) {
                this.commandOpen = false;
                this.quickCreateTab = actionObj.action.split(':')[1];
                this.quickCreateOpen = true;
            }
        },

        quickCreateSubmit() {
            window.toast?.('Saved as draft', 'success');
            this.quickCreateOpen = false;
        },
    }));
});

Alpine.start();

// Toast notification utility
window.toast = function (message, type = 'success') {
    const container = document.getElementById('toast-container');
    if (!container) return;
    const colors = {
        success: 'bg-[#22C55E] text-white',
        error: 'bg-[#EF4444] text-white',
        warning: 'bg-[#F59E0B] text-white',
        info: 'bg-[#4F46E5] text-white'
    };
    const el = document.createElement('div');
    el.className = `px-4 py-3 rounded-lg shadow-lg ${colors[type] || colors.info} toast-enter`;
    el.textContent = message;
    container.appendChild(el);
    setTimeout(() => el.remove(), 3000);
};
