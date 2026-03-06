@extends('layouts.app')

@section('title', 'Invoices')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-[#0F172A]">Invoices</h1>
            <p class="mt-1 text-sm text-[#64748B]">Manage and track your client invoices</p>
        </div>
        <button class="inline-flex items-center gap-2 px-4 py-2 bg-[#4F46E5] text-white rounded-lg hover:bg-[#4338CA] font-medium text-sm">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Create Invoice
        </button>
    </div>

    <div class="bg-white rounded-xl border border-[#E2E8F0] shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-[#F8FAFC] border-b border-[#E2E8F0]">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-[#64748B] uppercase">Invoice ID</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-[#64748B] uppercase">Client</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-[#64748B] uppercase">Project</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-[#64748B] uppercase">Amount</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-[#64748B] uppercase">Issue Date</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-[#64748B] uppercase">Due Date</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-[#64748B] uppercase">Status</th>
                        <th class="px-6 py-4 text-right text-xs font-semibold text-[#64748B] uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#E2E8F0]">
                    @foreach([
                        ['id' => 'INV-0042', 'client' => 'Acme Corp', 'project' => 'Website Redesign', 'amount' => '$2,500', 'issue' => 'Mar 1', 'due' => 'Mar 15', 'status' => 'paid'],
                        ['id' => 'INV-0041', 'client' => 'TechStart Inc', 'project' => 'Mobile App', 'amount' => '$1,800', 'issue' => 'Feb 28', 'due' => 'Mar 14', 'status' => 'unpaid'],
                        ['id' => 'INV-0040', 'client' => 'Global Solutions', 'project' => 'E-commerce', 'amount' => '$4,200', 'issue' => 'Feb 15', 'due' => 'Mar 1', 'status' => 'overdue'],
                        ['id' => 'INV-0039', 'client' => 'Acme Corp', 'project' => 'Brand Identity', 'amount' => '$3,200', 'issue' => 'Feb 10', 'due' => 'Feb 28', 'status' => 'paid'],
                        ['id' => 'INV-0038', 'client' => 'Innovate Labs', 'project' => 'Dashboard UI', 'amount' => '$2,100', 'issue' => 'Mar 5', 'due' => 'Mar 20', 'status' => 'unpaid'],
                    ] as $inv)
                    <tr class="hover:bg-[#F8FAFC] transition-colors">
                        <td class="px-6 py-4">
                            <a href="{{ route('invoices.show', 1) }}" class="font-medium text-[#4F46E5] hover:underline">{{ $inv['id'] }}</a>
                        </td>
                        <td class="px-6 py-4 text-sm text-[#0F172A]">{{ $inv['client'] }}</td>
                        <td class="px-6 py-4 text-sm text-[#64748B]">{{ $inv['project'] }}</td>
                        <td class="px-6 py-4 text-sm font-medium text-[#0F172A]">{{ $inv['amount'] }}</td>
                        <td class="px-6 py-4 text-sm text-[#64748B]">{{ $inv['issue'] }}, 2025</td>
                        <td class="px-6 py-4 text-sm text-[#64748B]">{{ $inv['due'] }}, 2025</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex px-2.5 py-1 rounded-full text-xs font-medium {{ 
                                $inv['status'] === 'paid' ? 'bg-[#ECFDF5] text-[#22C55E]' : 
                                ($inv['status'] === 'unpaid' ? 'bg-[#FEF3C7] text-[#F59E0B]' : 'bg-[#FEF2F2] text-[#EF4444]') 
                            }}">{{ ucfirst($inv['status']) }}</span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="{{ route('invoices.show', 1) }}" class="text-sm font-medium text-[#4F46E5] hover:underline">View</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="px-6 py-4 border-t border-[#E2E8F0] flex items-center justify-between">
            <p class="text-sm text-[#64748B]">Showing 1-5 of 42 invoices</p>
            <div class="flex gap-2">
                <button class="px-3 py-1.5 rounded-lg border border-[#E2E8F0] text-sm font-medium text-[#64748B] hover:bg-[#F8FAFC]" disabled>Previous</button>
                <button class="px-3 py-1.5 rounded-lg bg-[#4F46E5] text-white text-sm font-medium">1</button>
                <button class="px-3 py-1.5 rounded-lg border border-[#E2E8F0] text-sm font-medium text-[#64748B] hover:bg-[#F8FAFC]">Next</button>
            </div>
        </div>
    </div>
</div>
@endsection
