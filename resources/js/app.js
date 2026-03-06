import './bootstrap';
import Alpine from 'alpinejs';
window.Alpine = Alpine;

// Command palette + Quick Create (global state)
document.addEventListener('alpine:init', () => {
    Alpine.data('globalApp', () => ({
        commandOpen: false,
        quickCreateOpen: false,
        quickCreateTab: 'client',
        notifOpen: false,
        mobileSidebarOpen: false,
        theme: 'light',
        searchQuery: '',
        recentItems: [
            { type: 'client', label: 'Acme Corp', url: '/clients/1' },
            { type: 'project', label: 'Website Redesign', url: '/projects/1' },
            { type: 'task', label: 'Design homepage mockup', url: '/tasks' },
        ],
        searchResults: [],
        init() {
            // Initialize theme from localStorage or system preference
            try {
                const saved = localStorage.getItem('theme');
                const prefersDark = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
                this.theme = saved || (prefersDark ? 'dark' : 'light');
            } catch (e) {
                this.theme = 'light';
            }
            document.documentElement.classList.toggle('dark', this.theme === 'dark');
            window.addEventListener('keydown', (e) => {
                if ((e.metaKey || e.ctrlKey) && e.key === 'k') {
                    e.preventDefault();
                    this.searchQuery = '';
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
        },
        toggleTheme() {
            this.theme = this.theme === 'light' ? 'dark' : 'light';
            document.documentElement.classList.toggle('dark', this.theme === 'dark');
            try {
                localStorage.setItem('theme', this.theme);
            } catch (e) {}
        },
        runSearch() {
            const q = (this.searchQuery || '').toLowerCase();
            if (!q) {
                this.searchResults = [...this.recentItems];
                return;
            }
            const all = [
                { type: 'client', label: 'Acme Corp', url: '/clients/1' },
                { type: 'client', label: 'TechStart Inc', url: '/clients/2' },
                { type: 'project', label: 'Website Redesign', url: '/projects/1' },
                { type: 'project', label: 'Mobile App', url: '/projects/2' },
                { type: 'task', label: 'Design homepage mockup', url: '/tasks' },
                { type: 'task', label: 'Implement header', url: '/tasks' },
                { type: 'invoice', label: 'INV-0042', url: '/invoices/1' },
            ];
            this.searchResults = all.filter(x => x.label.toLowerCase().includes(q)).slice(0, 8);
        },
        quickCreateSubmit() {
            window.toast?.('Saved as draft', 'success');
            this.quickCreateOpen = false;
        },
    }));
});

Alpine.start();

// Toast notification utility
window.toast = function(message, type = 'success') {
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
