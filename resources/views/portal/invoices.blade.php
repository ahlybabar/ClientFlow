@extends('layouts.portal')

@section('title', 'My Invoices')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
    <div class="md:flex md:items-center md:justify-between">
        <div class="flex-1 min-w-0">
            <h2 class="text-2xl font-bold leading-7 text-[#0F172A] sm:text-3xl sm:truncate">Invoices & Billing</h2>
            <p class="mt-1 text-sm text-[#64748B]">View your billing history and manage payments.</p>
        </div>
        <div class="mt-4 flex md:mt-0 md:ml-4 gap-3">
            <div class="bg-white px-4 py-2 border border-[#E2E8F0] rounded-md shadow-sm text-sm font-medium text-[#0F172A]">
                Total Paid: <span class="text-[#22C55E] font-bold ml-1">$12,450.00</span>
            </div>
            <div class="bg-white px-4 py-2 border border-[#E2E8F0] rounded-md shadow-sm text-sm font-medium text-[#0F172A]">
                Outstanding: <span class="text-[#EF4444] font-bold ml-1">$0.00</span>
            </div>
        </div>
    </div>

    <!-- Outstanding Invoices -->
    <div class="bg-white shadow-sm overflow-hidden sm:rounded-lg border border-[#E2E8F0] border-l-4 border-l-[#F59E0B]">
        <div class="px-4 py-5 border-b border-[#E2E8F0] sm:px-6 flex items-center justify-between bg-[#FEF3C7]/30">
            <h3 class="text-lg leading-6 font-medium text-[#0F172A] flex items-center gap-2">
                <svg class="w-5 h-5 text-[#F59E0B]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                Action Required
            </h3>
        </div>
        <div class="p-6 text-center text-[#64748B] flex flex-col items-center justify-center">
            <div class="w-12 h-12 bg-[#ECFDF5] rounded-full flex items-center justify-center mb-3">
                <svg class="w-6 h-6 text-[#22C55E]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
            </div>
            <p class="font-medium text-[#0F172A]">You're all caught up!</p>
            <p class="mt-1 text-sm">There are no outstanding invoices needing payment.</p>
        </div>
    </div>

    <!-- Payment History -->
    <div class="bg-white shadow-sm overflow-hidden sm:rounded-lg border border-[#E2E8F0]">
        <div class="px-4 py-5 border-b border-[#E2E8F0] sm:px-6 flex items-center justify-between">
            <h3 class="text-lg leading-6 font-medium text-[#0F172A]">Invoice History</h3>
            <button class="text-sm text-[#4F7CFF] font-medium hover:text-[#4338CA] flex items-center gap-1">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                Export PDF summary
            </button>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-[#E2E8F0]">
                <thead class="bg-[#F8FAFC]">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-[#64748B] uppercase tracking-wider">Invoice / Project</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-[#64748B] uppercase tracking-wider">Issue Date</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-[#64748B] uppercase tracking-wider">Amount</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-[#64748B] uppercase tracking-wider">Status</th>
                        <th scope="col" class="relative px-6 py-3"><span class="sr-only">Actions</span></th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-[#E2E8F0]">
                    @foreach([
                        ['id' => 'INV-0042', 'project' => 'Website Redesign', 'date' => 'Feb 15, 2025', 'amount' => '$3,200.00', 'status' => 'Paid'],
                        ['id' => 'INV-0035', 'project' => 'Logo Design', 'date' => 'Jan 05, 2025', 'amount' => '$1,800.00', 'status' => 'Paid'],
                        ['id' => 'INV-0028', 'project' => 'Q4 Marketing Campaign', 'date' => 'Nov 20, 2024', 'amount' => '$4,500.00', 'status' => 'Paid'],
                        ['id' => 'INV-0015', 'project' => 'Initial Consultation', 'date' => 'Oct 01, 2024', 'amount' => '$2,950.00', 'status' => 'Paid'],
                    ] as $invoice)
                    <tr class="hover:bg-[#F8FAFC] transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-[#0F172A]">{{ $invoice['id'] }}</div>
                            <div class="text-sm text-[#64748B]">{{ $invoice['project'] }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-[#64748B]">{{ $invoice['date'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-[#0F172A]">{{ $invoice['amount'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-[#ECFDF5] text-[#22C55E] flex items-center gap-1">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                {{ $invoice['status'] }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="#" class="text-[#4F7CFF] hover:text-[#4338CA] bg-[#EEF2FF] px-3 py-1.5 rounded-md transition-colors flex items-center gap-1.5 inline-flex">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                                Download PDF
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
