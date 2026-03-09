@extends('layouts.app')

@section('title', 'Invoice Detail')

@section('breadcrumbs')
<nav class="flex items-center gap-2 text-sm text-[#6B7280]">
 <a href="{{ route('dashboard') }}" class="hover:text-[#6366F1]">Dashboard</a>
 <span>/</span>
 <a href="{{ route('invoices.index') }}" class="hover:text-[#6366F1]">Invoices</a>
 <span>/</span>
 <span class="text-[#111827] font-medium">INV-0042</span>
</nav>
@endsection

@section('content')
<div class="space-y-6 max-w-4xl">
 <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
 <div class="flex items-center gap-4">
 <a href="{{ route('invoices.index') }}" class="p-2 rounded-lg hover:bg-[#F1F5F9] text-[#6B7280] transition-colors">
 <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
 </a>
 <div>
 <h1 class="text-2xl font-bold text-[#111827]">INV-0042</h1>
 <p class="text-sm text-[#6B7280]">Acme Corp · Website Redesign · Auto-generated</p>
 </div>
 </div>
 <div class="flex flex-wrap gap-2">
 <button onclick="window.toast?.('Invoice sent')" class="px-4 py-2 border border-[#E5E7EB] rounded-lg text-sm font-medium text-[#6B7280] hover:bg-[#F8FAFC] transition-colors">Send</button>
 <button onclick="window.toast?.('Duplicate created')" class="px-4 py-2 border border-[#E5E7EB] rounded-lg text-sm font-medium text-[#6B7280] hover:bg-[#F8FAFC] transition-colors">Duplicate Invoice</button>
 <button onclick="window.toast?.('Marked as paid')" class="px-4 py-2 border border-[#22C55E] rounded-lg text-sm font-medium text-[#22C55E] hover:bg-[#ECFDF5] transition-colors">Mark as Paid</button>
 <button onclick="window.toast?.('Downloading PDF...')" class="px-4 py-2 bg-[#6366F1] text-white rounded-lg text-sm font-medium hover:opacity-90 transition-opacity inline-flex items-center gap-2">
 <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
 Download PDF
 </button>
 </div>
 </div>

 <div class="bg-white rounded-xl border border-[#E5E7EB] shadow-sm overflow-hidden">
 <div class="p-8">
 <div class="flex justify-between items-start mb-8">
 <div>
 <h2 class="text-lg font-bold text-[#111827]">ClientFlow Pro</h2>
 <p class="text-sm text-[#6B7280]">Invoice</p>
 </div>
 <span class="px-3 py-1.5 rounded-full text-sm font-medium bg-[#ECFDF5] text-[#22C55E]">Paid</span>
 </div>

 <div class="grid grid-cols-2 gap-8 mb-8">
 <div>
 <p class="text-sm font-medium text-[#6B7280] mb-1">Bill To</p>
 <p class="font-medium text-[#111827]">Acme Corp</p>
 <p class="text-sm text-[#6B7280]">John Smith</p>
 <p class="text-sm text-[#6B7280]">john@acme.com</p>
 </div>
 <div class="text-right">
 <p class="text-sm text-[#6B7280]">Invoice #</p>
 <p class="font-medium text-[#111827]">INV-0042</p>
 <p class="text-sm text-[#6B7280] mt-2">Issue Date</p>
 <p class="font-medium text-[#111827]">March 1, 2025</p>
 <p class="text-sm text-[#6B7280] mt-2">Due Date</p>
 <p class="font-medium text-[#111827]">March 15, 2025</p>
 </div>
 </div>

 <table class="w-full">
 <thead>
 <tr class="border-b border-[#E5E7EB]">
 <th class="py-3 text-left text-sm font-semibold text-[#6B7280]">Description</th>
 <th class="py-3 text-right text-sm font-semibold text-[#6B7280]">Amount</th>
 </tr>
 </thead>
 <tbody>
 <tr class="border-b border-[#E5E7EB]">
 <td class="py-4 text-[#111827]">Website Redesign - Phase 1</td>
 <td class="py-4 text-right font-medium text-[#111827]">$2,500.00</td>
 </tr>
 </tbody>
 </table>

 <div class="mt-6 flex justify-end">
 <div class="w-48 text-right">
 <div class="flex justify-between py-2 text-sm">
 <span class="text-[#6B7280]">Subtotal</span>
 <span class="font-medium text-[#111827]">$2,500.00</span>
 </div>
 <div class="flex justify-between py-2 border-t border-[#E5E7EB] text-sm">
 <span class="text-[#6B7280]">Tax (0%)</span>
 <span class="font-medium text-[#111827]">$0.00</span>
 </div>
 <div class="flex justify-between py-2 border-t border-[#E5E7EB] ">
 <span class="font-semibold text-[#111827]">Total</span>
 <span class="font-bold text-lg text-[#111827]">$2,500.00</span>
 </div>
 </div>
 </div>
 </div>

 <div class="border-t border-[#E5E7EB] p-6 bg-[#F8FAFC]">
 <h3 class="font-semibold text-[#111827] mb-4">Payment History</h3>
 <div class="space-y-3">
 <div class="flex items-center justify-between p-4 bg-white rounded-lg border border-[#E5E7EB]">
 <div>
 <p class="font-medium text-[#111827]">Payment received</p>
 <p class="text-sm text-[#6B7280]">Mar 10, 2025 · Bank Transfer</p>
 </div>
 <span class="font-medium text-[#22C55E]">$2,500.00</span>
 </div>
 </div>
 </div>
 </div>
</div>
@endsection
