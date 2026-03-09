@extends('layouts.app')

@section('title', 'Clients')

@section('content')
<div class="space-y-6" x-data="{
    search: '',
    statusFilter: 'all',
    clients: [
        { company: 'Acme Corp',        contact: 'John Smith',   email: 'john@acme.com',          phone: '+1 555-0100', projects: 3, status: 'active' },
        { company: 'TechStart Inc',    contact: 'Sarah Johnson',email: 'sarah@techstart.io',      phone: '+1 555-0101', projects: 2, status: 'active' },
        { company: 'Global Solutions', contact: 'Mike Chen',    email: 'mike@globalsol.com',      phone: '+1 555-0102', projects: 1, status: 'active' },
        { company: 'Design Studio',    contact: 'Emma Wilson',  email: 'emma@designstudio.co',    phone: '+1 555-0103', projects: 0, status: 'inactive' },
        { company: 'Innovate Labs',    contact: 'David Brown',  email: 'david@innovatelabs.com',  phone: '+1 555-0104', projects: 4, status: 'active' },
        { company: 'CloudBridge',      contact: 'Chris Lee',    email: 'chris@cloudbridge.io',    phone: '+1 555-0105', projects: 2, status: 'active' },
        { company: 'PixelWave',        contact: 'Mia Torres',   email: 'mia@pixelwave.co',        phone: '+1 555-0106', projects: 1, status: 'inactive' },
    ],
    get filtered() {
        return this.clients.filter(c => {
            const matchSearch = !this.search || c.company.toLowerCase().includes(this.search.toLowerCase()) || c.contact.toLowerCase().includes(this.search.toLowerCase()) || c.email.toLowerCase().includes(this.search.toLowerCase());
            const matchStatus = this.statusFilter === 'all' || c.status === this.statusFilter;
            return matchSearch && matchStatus;
        });
    }
}">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-[var(--color-text)]">Clients</h1>
            <p class="mt-1 text-sm text-[var(--color-text-secondary)]">Manage your client relationships and contacts</p>
        </div>
        <button onclick="window.toast?.('Client form coming soon', 'info')" class="inline-flex items-center gap-2 px-4 py-2 bg-[#4F46E5] text-white rounded-lg hover:opacity-90 font-medium text-sm transition-opacity">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Add Client
        </button>
    </div>

    <!-- Search + Filter Bar -->
    <div class="flex flex-col sm:flex-row gap-3">
        <div class="relative flex-1">
            <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-[var(--color-text-muted)]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            <input type="text" x-model="search" placeholder="Search clients, contacts, emails..."
                   class="w-full pl-10 pr-4 py-2.5 border border-[var(--color-border)] bg-[var(--color-card)] text-[var(--color-text)] rounded-lg text-sm focus:ring-2 focus:ring-[#4F46E5] focus:border-transparent placeholder:text-[var(--color-text-muted)] transition-colors">
        </div>
        <select x-model="statusFilter"
                class="px-3 py-2.5 border border-[var(--color-border)] bg-[var(--color-card)] text-[var(--color-text)] rounded-lg text-sm focus:ring-2 focus:ring-[#4F46E5] custom-select transition-colors">
            <option value="all">All Statuses</option>
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
        </select>
    </div>

    <div class="bg-[var(--color-card)] rounded-xl border border-[var(--color-border)] shadow-sm overflow-hidden transition-colors">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-[var(--color-bg-secondary)] border-b border-[var(--color-border)]">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-[var(--color-text-secondary)] uppercase tracking-wider">Company</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-[var(--color-text-secondary)] uppercase tracking-wider">Contact</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-[var(--color-text-secondary)] uppercase tracking-wider">Email</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-[var(--color-text-secondary)] uppercase tracking-wider">Phone</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-[var(--color-text-secondary)] uppercase tracking-wider">Projects</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-[var(--color-text-secondary)] uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-right text-xs font-semibold text-[var(--color-text-secondary)] uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[var(--color-border)]">
                    <template x-for="client in filtered" :key="client.company">
                        <tr class="hover:bg-[var(--color-hover)] transition-colors">
                            <td class="px-6 py-4">
                                <a href="{{ route('clients.show', 1) }}" class="font-semibold text-[#4F46E5] hover:underline" x-text="client.company"></a>
                            </td>
                            <td class="px-6 py-4 text-sm text-[var(--color-text)]" x-text="client.contact"></td>
                            <td class="px-6 py-4 text-sm text-[var(--color-text-secondary)]" x-text="client.email"></td>
                            <td class="px-6 py-4 text-sm text-[var(--color-text-secondary)]" x-text="client.phone"></td>
                            <td class="px-6 py-4 text-sm font-medium text-[var(--color-text)]" x-text="client.projects"></td>
                            <td class="px-6 py-4">
                                <span :class="client.status === 'active' ? 'bg-[#ECFDF5] text-[#22C55E] dark:bg-[rgba(34,197,94,0.1)]' : 'bg-[var(--color-hover)] text-[var(--color-text-secondary)]'"
                                      class="inline-flex px-2.5 py-1 rounded-full text-xs font-medium capitalize transition-colors"
                                      x-text="client.status.charAt(0).toUpperCase() + client.status.slice(1)"></span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-1">
                                    <a href="{{ route('clients.show', 1) }}" class="p-2 rounded-lg hover:bg-[var(--color-bg)] text-[var(--color-text-secondary)] hover:text-[#4F46E5] transition-colors" title="View">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    </a>
                                    <button class="p-2 rounded-lg hover:bg-[var(--color-bg)] text-[var(--color-text-secondary)] hover:text-[#4F46E5] transition-colors" title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                    </button>
                                    <button class="p-2 rounded-lg hover:bg-[rgba(239,68,68,0.1)] text-[var(--color-text-secondary)] hover:text-[#EF4444] transition-colors" title="Archive">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"/></svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </template>
                    <tr x-show="filtered.length === 0">
                        <td colspan="7" class="px-6 py-12 text-center">
                            <p class="text-[var(--color-text-secondary)] text-sm">No clients match your search.</p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="px-6 py-4 border-t border-[var(--color-border)] flex items-center justify-between">
            <p class="text-sm text-[var(--color-text-secondary)]">Showing <span x-text="filtered.length"></span> of 48 clients</p>
            <div class="flex gap-2">
                <button class="px-3 py-1.5 rounded-lg border border-[var(--color-border)] text-sm font-medium text-[var(--color-text-secondary)] hover:bg-[var(--color-hover)] disabled:opacity-40 transition-colors" disabled>Previous</button>
                <button class="px-3 py-1.5 rounded-lg bg-[#4F46E5] text-white text-sm font-medium transition-colors">1</button>
                <button class="px-3 py-1.5 rounded-lg border border-[var(--color-border)] text-sm font-medium text-[var(--color-text-secondary)] hover:bg-[var(--color-hover)] transition-colors">Next</button>
            </div>
        </div>
    </div>
</div>
@endsection
