@extends('layouts.app')

@section('title', 'Invoices')

@section('content')
<div class="space-y-6" x-data="{ statusFilter: 'all' }">
 <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-[var(--color-text)]">Invoices</h1>
            <p class="mt-1 text-sm text-[var(--color-text-secondary)]">Manage and track your client invoices</p>
        </div>
 <button class="inline-flex items-center gap-2 px-4 py-2 bg-[#4F7CFF] text-white rounded-lg hover:bg-[#4F7CFF] font-medium text-sm transition-colors">
 <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
 Create Invoice
 </button>
 </div>

 <!-- Summary Cards -->
 <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
 <div class="bg-[var(--color-card)] rounded-xl p-5 border border-[var(--color-border)] shadow-sm transition-colors">
 <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-[var(--color-text-secondary)]">Total Invoiced</p>
                    <p class="text-2xl font-bold text-[var(--color-text)] mt-1">$13,800</p>
                    <p class="text-xs text-[var(--color-text-secondary)] mt-1">42 invoices total</p>
                </div>
 <div class="p-3 bg-[#EEF2FF] dark:bg-[var(--color-active-bg)] rounded-lg transition-colors">
 <svg class="w-6 h-6 text-[#4F7CFF]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
 </div>
 </div>
 </div>
 <div class="bg-[var(--color-card)] rounded-xl p-5 border border-[var(--color-border)] shadow-sm transition-colors">
 <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-[var(--color-text-secondary)]">Paid</p>
                    <p class="text-2xl font-bold text-[#22C55E] mt-1">$5,700</p>
                    <p class="text-xs text-[var(--color-text-secondary)] mt-1">2 invoices paid</p>
                </div>
 <div class="p-3 bg-[#ECFDF5] dark:bg-[rgba(34,197,94,0.1)] rounded-lg transition-colors">
 <svg class="w-6 h-6 text-[#22C55E]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
 </div>
 </div>
 </div>
 <div class="bg-[var(--color-card)] rounded-xl p-5 border border-l-4 border-[var(--color-border)] border-l-[#EF4444] shadow-sm transition-colors">
 <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-[var(--color-text-secondary)]">Overdue</p>
                    <p class="text-2xl font-bold text-[#EF4444] mt-1">$4,200</p>
                    <p class="text-xs text-[#EF4444] mt-1">1 overdue invoice</p>
                </div>
 <div class="p-3 bg-[#FEF2F2] dark:bg-[rgba(239,68,68,0.1)] rounded-lg transition-colors">
 <svg class="w-6 h-6 text-[#EF4444]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
 </div>
 </div>
 </div>
 </div>

 <!-- Status Filter Tabs -->
 <div class="flex flex-wrap gap-2">
 @foreach([
 ['v' => 'all', 'l' => 'All'],
 ['v' => 'paid', 'l' => 'Paid'],
 ['v' => 'unpaid', 'l' => 'Unpaid'],
 ['v' => 'overdue', 'l' => 'Overdue'],
 ] as $tab)
        <button @click="statusFilter = '{{ $tab['v'] }}'"
                :class="statusFilter === '{{ $tab['v'] }}' ? 'bg-[#4F7CFF] text-white' : 'border border-[var(--color-border)] text-[var(--color-text-secondary)] hover:bg-[var(--color-hover)]'"
                class="px-4 py-2 rounded-lg text-sm font-medium transition-colors">{{ $tab['l'] }}</button>
 @endforeach
 </div>

 <div class="bg-[var(--color-card)] rounded-xl border border-[var(--color-border)] shadow-sm overflow-hidden transition-colors">
 <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-[var(--color-bg-secondary)] border-b border-[var(--color-border)] transition-colors">
                    <tr>
 <th class="px-6 py-4 text-left text-xs font-semibold text-[var(--color-text-secondary)] uppercase tracking-wider">Invoice ID</th>
 <th class="px-6 py-4 text-left text-xs font-semibold text-[var(--color-text-secondary)] uppercase tracking-wider">Client</th>
 <th class="px-6 py-4 text-left text-xs font-semibold text-[var(--color-text-secondary)] uppercase tracking-wider">Project</th>
 <th class="px-6 py-4 text-left text-xs font-semibold text-[var(--color-text-secondary)] uppercase tracking-wider">Amount</th>
 <th class="px-6 py-4 text-left text-xs font-semibold text-[var(--color-text-secondary)] uppercase tracking-wider">Issue Date</th>
 <th class="px-6 py-4 text-left text-xs font-semibold text-[var(--color-text-secondary)] uppercase tracking-wider">Due Date</th>
 <th class="px-6 py-4 text-left text-xs font-semibold text-[var(--color-text-secondary)] uppercase tracking-wider">Status</th>
 <th class="px-6 py-4 text-right text-xs font-semibold text-[var(--color-text-secondary)] uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[var(--color-border)]">
 @foreach([
 ['id' => 'INV-0042', 'client' => 'Acme Corp', 'project' => 'Website Redesign', 'amount' => '$2,500', 'issue' => 'Mar 1', 'due' => 'Mar 15', 'status' => 'paid'],
 ['id' => 'INV-0041', 'client' => 'TechStart Inc', 'project' => 'Mobile App', 'amount' => '$1,800', 'issue' => 'Feb 28', 'due' => 'Mar 14', 'status' => 'unpaid'],
 ['id' => 'INV-0040', 'client' => 'Global Solutions', 'project' => 'E-commerce', 'amount' => '$4,200', 'issue' => 'Feb 15', 'due' => 'Mar 1', 'status' => 'overdue'],
 ['id' => 'INV-0039', 'client' => 'Acme Corp', 'project' => 'Brand Identity', 'amount' => '$3,200', 'issue' => 'Feb 10', 'due' => 'Feb 28', 'status' => 'paid'],
 ['id' => 'INV-0038', 'client' => 'Innovate Labs', 'project' => 'Dashboard UI', 'amount' => '$2,100', 'issue' => 'Mar 5', 'due' => 'Mar 20', 'status' => 'unpaid'],
 ] as $inv)
                @php
                    $statusMap = [
                        'paid' => ['class' => 'bg-[#ECFDF5] text-[#22C55E] dark:bg-[rgba(34,197,94,0.1)]', 'label' => 'Paid'],
                        'unpaid' => ['class' => 'bg-[#FEF3C7] text-[#D97706] dark:bg-[rgba(217,119,6,0.1)]', 'label' => 'Unpaid'],
                        'overdue' => ['class' => 'bg-[#FEF2F2] text-[#EF4444] dark:bg-[rgba(239,68,68,0.1)]', 'label' => 'Overdue'],
                    ];
                @endphp
 <tr x-show="statusFilter === 'all' || statusFilter === '{{ $inv['status'] }}'" class="hover:bg-[var(--color-hover)] transition-colors">
                        <td class="px-6 py-4">
                            <a href="{{ route('invoices.show', 1) }}" class="font-semibold text-[#4F7CFF] hover:underline">{{ $inv['id'] }}</a>
                        </td>
                        <td class="px-6 py-4 text-sm font-medium text-[var(--color-text)]">{{ $inv['client'] }}</td>
                        <td class="px-6 py-4 text-sm text-[var(--color-text-secondary)]">{{ $inv['project'] }}</td>
                        <td class="px-6 py-4 text-sm font-semibold text-[var(--color-text)]">{{ $inv['amount'] }}</td>
                        <td class="px-6 py-4 text-sm text-[var(--color-text-secondary)]">{{ $inv['issue'] }}, 2025</td>
                        <td class="px-6 py-4 text-sm {{ $inv['status'] === 'overdue' ? 'text-[#EF4444] font-medium' : 'text-[var(--color-text-secondary)]' }}">{{ $inv['due'] }}, 2025</td>
 <td class="px-6 py-4">
 <span class="inline-flex px-2.5 py-1 rounded-full text-xs font-medium {{ $statusMap[$inv['status']]['class'] }}">{{ $statusMap[$inv['status']]['label'] }}</span>
 </td>
 <td class="px-6 py-4 text-right">
 <div class="flex items-center justify-end gap-1">
 <a href="{{ route('invoices.show', 1) }}" class="p-2 rounded-lg hover:bg-[var(--color-bg)] text-[var(--color-text-secondary)] hover:text-[#4F7CFF] transition-colors" title="View">
 <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
 </a>
 <button onclick="window.toast?.('Invoice downloaded')" class="p-2 rounded-lg hover:bg-[var(--color-bg)] text-[var(--color-text-secondary)] hover:text-[#4F7CFF] transition-colors" title="Download">
 <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
 </button>
 </div>
 </td>
 </tr>
 @endforeach
 </tbody>
 </table>
 </div>
        <div class="px-6 py-4 border-t border-[var(--color-border)] flex items-center justify-between transition-colors">
            <p class="text-sm text-[var(--color-text-secondary)]">Showing 1–5 of 42 invoices</p>
            <div class="flex gap-2">
                <button class="px-3 py-1.5 rounded-lg border border-[var(--color-border)] text-sm font-medium text-[var(--color-text-secondary)] hover:bg-[var(--color-hover)] disabled:opacity-40 transition-colors" disabled>Previous</button>
                <button class="px-3 py-1.5 rounded-lg bg-[#4F7CFF] text-white text-sm font-medium transition-colors">1</button>
                <button class="px-3 py-1.5 rounded-lg border border-[var(--color-border)] text-sm font-medium text-[var(--color-text-secondary)] hover:bg-[var(--color-hover)] transition-colors">Next</button>
            </div>
        </div>
 </div>
</div>
@endsection
