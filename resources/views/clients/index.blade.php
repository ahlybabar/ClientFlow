@extends('layouts.app')

@section('title', 'Clients')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-[#0F172A] dark:text-[#E5E7EB]">Clients</h1>
            <p class="mt-1 text-sm text-[#64748B] dark:text-[#9CA3AF]">Manage your client relationships and contacts</p>
        </div>
        <button class="inline-flex items-center gap-2 px-4 py-2 bg-[#4F46E5] text-white rounded-lg hover:opacity-90 font-medium text-sm transition-opacity">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Add Client
        </button>
    </div>

    <div class="bg-white dark:bg-[#0B1220] rounded-xl border border-[#E2E8F0] dark:border-[#1F2937] shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-[#F8FAFC] dark:bg-[#020617] border-b border-[#E2E8F0] dark:border-[#111827]">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-[#64748B] dark:text-[#9CA3AF] uppercase tracking-wider">Company Name</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-[#64748B] dark:text-[#9CA3AF] uppercase tracking-wider">Contact Person</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-[#64748B] dark:text-[#9CA3AF] uppercase tracking-wider">Email</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-[#64748B] dark:text-[#9CA3AF] uppercase tracking-wider">Phone</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-[#64748B] dark:text-[#9CA3AF] uppercase tracking-wider">Active Projects</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-[#64748B] dark:text-[#9CA3AF] uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-right text-xs font-semibold text-[#64748B] dark:text-[#9CA3AF] uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#E2E8F0] dark:divide-[#111827]">
                    @foreach([
                        ['company' => 'Acme Corp', 'contact' => 'John Smith', 'email' => 'john@acme.com', 'phone' => '+1 555-0100', 'projects' => 3, 'status' => 'active'],
                        ['company' => 'TechStart Inc', 'contact' => 'Sarah Johnson', 'email' => 'sarah@techstart.io', 'phone' => '+1 555-0101', 'projects' => 2, 'status' => 'active'],
                        ['company' => 'Global Solutions', 'contact' => 'Mike Chen', 'email' => 'mike@globalsol.com', 'phone' => '+1 555-0102', 'projects' => 1, 'status' => 'active'],
                        ['company' => 'Design Studio', 'contact' => 'Emma Wilson', 'email' => 'emma@designstudio.co', 'phone' => '+1 555-0103', 'projects' => 0, 'status' => 'inactive'],
                        ['company' => 'Innovate Labs', 'contact' => 'David Brown', 'email' => 'david@innovatelabs.com', 'phone' => '+1 555-0104', 'projects' => 4, 'status' => 'active'],
                    ] as $client)
                    <tr class="hover:bg-[#F8FAFC] dark:hover:bg-[#020617] transition-colors">
                        <td class="px-6 py-4">
                            <a href="{{ route('clients.show', 1) }}" class="font-medium text-[#4F46E5] hover:underline">{{ $client['company'] }}</a>
                        </td>
                        <td class="px-6 py-4 text-sm text-[#0F172A] dark:text-[#E5E7EB]">{{ $client['contact'] }}</td>
                        <td class="px-6 py-4 text-sm text-[#64748B] dark:text-[#9CA3AF]">{{ $client['email'] }}</td>
                        <td class="px-6 py-4 text-sm text-[#64748B] dark:text-[#9CA3AF]">{{ $client['phone'] }}</td>
                        <td class="px-6 py-4 text-sm text-[#0F172A] dark:text-[#E5E7EB]">{{ $client['projects'] }}</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex px-2.5 py-1 rounded-full text-xs font-medium {{ $client['status'] === 'active' ? 'bg-[#ECFDF5] text-[#22C55E]' : 'bg-[#F1F5F9] text-[#64748B]' }}">
                                {{ ucfirst($client['status']) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <button class="p-2 rounded-lg hover:bg-[#F1F5F9] dark:hover:bg-[#020617] text-[#64748B] dark:text-[#9CA3AF] hover:text-[#4F46E5]" title="Edit">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                </button>
                                <button class="p-2 rounded-lg hover:bg-[#F1F5F9] dark:hover:bg-[#020617] text-[#64748B] dark:text-[#9CA3AF] hover:text-[#EF4444]" title="Archive">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"/></svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="px-6 py-4 border-t border-[#E2E8F0] dark:border-[#111827] flex items-center justify-between">
            <p class="text-sm text-[#64748B] dark:text-[#9CA3AF]">Showing 1-5 of 48 clients</p>
            <div class="flex gap-2">
                <button class="px-3 py-1.5 rounded-lg border border-[#E2E8F0] dark:border-[#111827] text-sm font-medium text-[#64748B] dark:text-[#9CA3AF] hover:bg-[#F8FAFC] dark:hover:bg-[#020617] disabled:opacity-50" disabled>Previous</button>
                <button class="px-3 py-1.5 rounded-lg bg-[#4F46E5] text-white text-sm font-medium">1</button>
                <button class="px-3 py-1.5 rounded-lg border border-[#E2E8F0] dark:border-[#111827] text-sm font-medium text-[#64748B] dark:text-[#9CA3AF] hover:bg-[#F8FAFC] dark:hover:bg-[#020617]">2</button>
                <button class="px-3 py-1.5 rounded-lg border border-[#E2E8F0] dark:border-[#111827] text-sm font-medium text-[#64748B] dark:text-[#9CA3AF] hover:bg-[#F8FAFC] dark:hover:bg-[#020617]">Next</button>
            </div>
        </div>
    </div>
</div>
@endsection
