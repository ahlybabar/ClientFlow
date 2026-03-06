@extends('layouts.app')

@section('title', 'Client Profile')

@section('breadcrumbs')
<nav class="flex items-center gap-2 text-sm text-[#64748B] dark:text-[#94A3B8]">
    <a href="{{ route('dashboard') }}" class="hover:text-[#4F46E5] dark:hover:text-[#6366F1]">Dashboard</a>
    <span>/</span>
    <a href="{{ route('clients.index') }}" class="hover:text-[#4F46E5] dark:hover:text-[#6366F1]">Clients</a>
    <span>/</span>
    <span class="text-[#0F172A] dark:text-[#E2E8F0] font-medium">Acme Corp</span>
</nav>
@endsection

@section('content')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div class="flex items-center gap-4">
            <a href="{{ route('clients.index') }}" class="p-2 rounded-lg hover:bg-[#F1F5F9] dark:hover:bg-[#334155] text-[#64748B] dark:text-[#94A3B8] transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            </a>
            <div>
                <h1 class="text-2xl font-bold text-[#0F172A] dark:text-[#E2E8F0]">Acme Corp</h1>
                <p class="text-sm text-[#64748B] dark:text-[#94A3B8]">Client since March 2024</p>
            </div>
        </div>
        <div class="flex gap-2">
            <button class="px-4 py-2 border border-[#E2E8F0] dark:border-[#334155] rounded-lg text-sm font-medium text-[#64748B] dark:text-[#94A3B8] hover:bg-[#F8FAFC] dark:hover:bg-[#334155] transition-colors">Edit</button>
            <a href="{{ route('projects.index') }}" class="px-4 py-2 bg-[#4F46E5] dark:bg-[#6366F1] text-white rounded-lg text-sm font-medium hover:opacity-90 transition-opacity inline-flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                Add Project
            </a>
        </div>
    </div>

    {{-- Client Overview + Status --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white dark:bg-[#1E293B] rounded-xl p-6 border border-[#E2E8F0] dark:border-[#334155] shadow-sm transition-colors">
                <h2 class="text-lg font-semibold text-[#0F172A] dark:text-[#E2E8F0] mb-4">Client Overview</h2>
                <dl class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div><dt class="text-sm text-[#64748B] dark:text-[#94A3B8]">Company Name</dt><dd class="font-medium text-[#0F172A] dark:text-[#E2E8F0]">Acme Corp</dd></div>
                    <div><dt class="text-sm text-[#64748B] dark:text-[#94A3B8]">Contact Person</dt><dd class="font-medium text-[#0F172A] dark:text-[#E2E8F0]">John Smith</dd></div>
                    <div><dt class="text-sm text-[#64748B] dark:text-[#94A3B8]">Email</dt><dd class="font-medium text-[#0F172A] dark:text-[#E2E8F0]">john@acme.com</dd></div>
                    <div><dt class="text-sm text-[#64748B] dark:text-[#94A3B8]">Phone</dt><dd class="font-medium text-[#0F172A] dark:text-[#E2E8F0]">+1 555-0100</dd></div>
                    <div><dt class="text-sm text-[#64748B] dark:text-[#94A3B8]">Address</dt><dd class="font-medium text-[#0F172A] dark:text-[#E2E8F0]">123 Business Ave, Suite 100</dd></div>
                    <div><dt class="text-sm text-[#64748B] dark:text-[#94A3B8]">Status</dt><dd><span class="inline-flex px-2.5 py-1 rounded-full text-xs font-medium bg-[#ECFDF5] dark:bg-emerald-900/40 text-[#22C55E]">Active</span></dd></div>
                </dl>
            </div>

            {{-- Financial Summary --}}
            <div class="bg-white dark:bg-[#1E293B] rounded-xl p-6 border border-[#E2E8F0] dark:border-[#334155] shadow-sm transition-colors">
                <h2 class="text-lg font-semibold text-[#0F172A] dark:text-[#E2E8F0] mb-4">Financial Summary</h2>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div class="p-4 rounded-lg bg-[#F8FAFC] dark:bg-[#0F172A] border border-[#E2E8F0] dark:border-[#334155]">
                        <p class="text-sm text-[#64748B] dark:text-[#94A3B8]">Total Invoices Issued</p>
                        <p class="text-xl font-bold text-[#0F172A] dark:text-[#E2E8F0] mt-1">$24,200</p>
                        <p class="text-xs text-[#64748B] dark:text-[#94A3B8] mt-1">12 invoices</p>
                    </div>
                    <div class="p-4 rounded-lg bg-[#F8FAFC] dark:bg-[#0F172A] border border-[#E2E8F0] dark:border-[#334155]">
                        <p class="text-sm text-[#64748B] dark:text-[#94A3B8]">Total Payments Received</p>
                        <p class="text-xl font-bold text-[#22C55E] dark:text-emerald-400 mt-1">$19,700</p>
                        <p class="text-xs text-[#64748B] dark:text-[#94A3B8] mt-1">Last: Mar 10, 2025</p>
                    </div>
                    <div class="p-4 rounded-lg bg-[#FEF3C7] dark:bg-amber-900/30 border border-[#F59E0B]/30">
                        <p class="text-sm text-[#64748B] dark:text-[#94A3B8]">Outstanding Balance</p>
                        <p class="text-xl font-bold text-[#F59E0B] dark:text-amber-400 mt-1">$4,500</p>
                        <p class="text-xs text-[#64748B] dark:text-[#94A3B8] mt-1">2 unpaid invoices</p>
                    </div>
                </div>
            </div>

            {{-- Project Timeline (visual) --}}
            <div class="bg-white dark:bg-[#1E293B] rounded-xl p-6 border border-[#E2E8F0] dark:border-[#334155] shadow-sm transition-colors">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-lg font-semibold text-[#0F172A] dark:text-[#E2E8F0]">Project Timeline</h2>
                    <a href="{{ route('projects.index') }}" class="text-sm font-medium text-[#4F46E5] dark:text-[#6366F1] hover:underline">View all</a>
                </div>
                <div class="relative pl-6 border-l-2 border-[#E2E8F0] dark:border-[#334155] space-y-6">
                    @foreach([['name' => 'Website Redesign', 'date' => 'Jan 2025', 'status' => 'In Progress', 'progress' => 75], ['name' => 'Brand Identity', 'date' => 'Nov 2024', 'status' => 'Completed', 'progress' => 100], ['name' => 'Marketing Site', 'date' => 'Aug 2024', 'status' => 'Completed', 'progress' => 100]] as $p)
                    <div class="relative flex items-start gap-4">
                        <span class="absolute -left-6 w-3 h-3 rounded-full {{ $p['status'] === 'Completed' ? 'bg-[#22C55E]' : 'bg-[#4F46E5] dark:bg-[#6366F1]' }} -translate-x-1/2 top-1.5"></span>
                        <div class="flex-1 min-w-0">
                            <p class="font-medium text-[#0F172A] dark:text-[#E2E8F0]">{{ $p['name'] }}</p>
                            <p class="text-sm text-[#64748B] dark:text-[#94A3B8]">{{ $p['date'] }} · {{ $p['status'] }}</p>
                            <div class="mt-2 h-1.5 bg-[#E2E8F0] dark:bg-[#334155] rounded-full overflow-hidden">
                                <div class="h-full bg-[#4F46E5] dark:bg-[#6366F1] rounded-full progress-animated" style="width: {{ $p['progress'] }}%"></div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Activity Feed --}}
            <div class="bg-white dark:bg-[#1E293B] rounded-xl p-6 border border-[#E2E8F0] dark:border-[#334155] shadow-sm transition-colors">
                <h2 class="text-lg font-semibold text-[#0F172A] dark:text-[#E2E8F0] mb-4">Activity Feed</h2>
                <div class="space-y-4">
                    @foreach([['icon' => 'payment', 'action' => 'Invoice paid', 'detail' => 'INV-0042 · $2,500', 'user' => 'System', 'time' => '2 days ago'], ['icon' => 'task', 'action' => 'Task completed', 'detail' => 'Design homepage mockup', 'user' => 'Sarah Kim', 'time' => '3 days ago'], ['icon' => 'comment', 'action' => 'Comment added', 'detail' => 'Website Redesign: "Approved for dev"', 'user' => 'John Doe', 'time' => '1 week ago'], ['icon' => 'project', 'action' => 'Project updated', 'detail' => 'Website Redesign · 75% complete', 'user' => 'Mike Wilson', 'time' => '1 week ago']] as $a)
                    <div class="flex gap-3 py-3 border-b border-[#F1F5F9] dark:border-[#334155] last:border-0">
                        <div class="w-9 h-9 rounded-lg bg-[#EEF2FF] dark:bg-[#334155] flex items-center justify-center text-[#4F46E5] dark:text-[#6366F1] shrink-0">
                            @if($a['icon'] === 'payment')<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                            @elseif($a['icon'] === 'task')<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg>
                            @else<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/></svg>
                            @endif
                        </div>
                        <div class="min-w-0">
                            <p class="text-sm font-medium text-[#0F172A] dark:text-[#E2E8F0]">{{ $a['action'] }}</p>
                            <p class="text-sm text-[#64748B] dark:text-[#94A3B8]">{{ $a['detail'] }}</p>
                            <p class="text-xs text-[#64748B] dark:text-[#94A3B8] mt-0.5">{{ $a['user'] }} · {{ $a['time'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="space-y-6">
            <div class="bg-white dark:bg-[#1E293B] rounded-xl p-6 border border-[#E2E8F0] dark:border-[#334155] shadow-sm transition-colors">
                <h2 class="text-lg font-semibold text-[#0F172A] dark:text-[#E2E8F0] mb-4">Recent Invoices</h2>
                <div class="space-y-3">
                    @foreach([['id' => 'INV-0042', 'amount' => '$2,500', 'status' => 'Paid'], ['id' => 'INV-0041', 'amount' => '$1,800', 'status' => 'Unpaid'], ['id' => 'INV-0040', 'amount' => '$3,200', 'status' => 'Paid']] as $inv)
                    <a href="{{ route('invoices.show', 1) }}" class="flex items-center justify-between py-2 border-b border-[#F1F5F9] dark:border-[#334155] last:border-0 hover:opacity-80">
                        <span class="text-sm font-medium text-[#0F172A] dark:text-[#E2E8F0]">{{ $inv['id'] }}</span>
                        <span class="text-sm text-[#64748B] dark:text-[#94A3B8]">{{ $inv['amount'] }}</span>
                        <span class="text-xs px-2 py-0.5 rounded {{ $inv['status'] === 'Paid' ? 'bg-[#ECFDF5] dark:bg-emerald-900/40 text-[#22C55E]' : 'bg-[#FEF3C7] dark:bg-amber-900/30 text-[#F59E0B]' }}">{{ $inv['status'] }}</span>
                    </a>
                    @endforeach
                </div>
            </div>
            <div class="bg-white dark:bg-[#1E293B] rounded-xl p-6 border border-[#E2E8F0] dark:border-[#334155] shadow-sm transition-colors">
                <h2 class="text-lg font-semibold text-[#0F172A] dark:text-[#E2E8F0] mb-4">Notes</h2>
                <p class="text-sm text-[#64748B] dark:text-[#94A3B8] mb-4">Key client - prefers weekly check-ins. Decision maker for all design approvals.</p>
                <button class="text-sm font-medium text-[#4F46E5] dark:text-[#6366F1] hover:underline">Add note</button>
            </div>
        </div>
    </div>
</div>
@endsection
