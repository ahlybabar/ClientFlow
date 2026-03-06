@extends('layouts.app')

@section('title', 'Team')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-[#0F172A]">Team Management</h1>
            <p class="mt-1 text-sm text-[#64748B]">Manage roles, workloads, and invite members</p>
        </div>
        <button onclick="window.toast?.('Invite sent')" class="inline-flex items-center gap-2 px-4 py-2 bg-[#4F46E5] text-white rounded-lg hover:opacity-90 font-medium text-sm transition-opacity">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Invite Team Member
        </button>
    </div>

    <div class="bg-white rounded-xl border border-[#E2E8F0] shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-[#F8FAFC] border-b border-[#E2E8F0]">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-[#64748B] uppercase">Name</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-[#64748B] uppercase">Role</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-[#64748B] uppercase">Assigned Tasks</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-[#64748B] uppercase">Active Projects</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-[#64748B] uppercase">Productivity Score</th>
                        <th class="px-6 py-4 text-right text-xs font-semibold text-[#64748B] uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#E2E8F0]">
                    @foreach([
                        ['name' => 'John Doe', 'email' => 'john@clientflow.com', 'role' => 'Admin', 'tasks' => 12, 'projects' => 8, 'score' => 92, 'active' => true],
                        ['name' => 'Sarah Kim', 'email' => 'sarah@clientflow.com', 'role' => 'Manager', 'tasks' => 8, 'projects' => 6, 'score' => 88, 'active' => true],
                        ['name' => 'Mike Wilson', 'email' => 'mike@clientflow.com', 'role' => 'Staff', 'tasks' => 15, 'projects' => 5, 'score' => 85, 'active' => true],
                        ['name' => 'Anna Brown', 'email' => 'anna@clientflow.com', 'role' => 'Staff', 'tasks' => 6, 'projects' => 4, 'score' => 78, 'active' => true],
                        ['name' => 'Chris Lee', 'email' => 'chris@clientflow.com', 'role' => 'Manager', 'tasks' => 10, 'projects' => 7, 'score' => 90, 'active' => false],
                    ] as $m)
                    <tr class="hover:bg-[#F8FAFC] transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-[#4F46E5] text-white flex items-center justify-center font-medium text-sm">{{ substr($m['name'], 0, 2) }}</div>
                                <div>
                                    <p class="font-medium text-[#0F172A]">{{ $m['name'] }}</p>
                                    <p class="text-xs text-[#64748B]">{{ $m['email'] }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex px-2.5 py-1 rounded-full text-xs font-medium {{ $m['role'] === 'Admin' ? 'bg-[#FEF2F2] text-[#EF4444]' : ($m['role'] === 'Manager' ? 'bg-[#EEF2FF] text-[#4F46E5]' : 'bg-[#F1F5F9] text-[#64748B]') }}">{{ $m['role'] }}</span>
                        </td>
                        <td class="px-6 py-4 text-sm text-[#0F172A]">{{ $m['tasks'] }}</td>
                        <td class="px-6 py-4 text-sm text-[#0F172A]">{{ $m['projects'] }}</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <div class="w-16 h-2 bg-[#E2E8F0] rounded-full overflow-hidden">
                                    <div class="h-full bg-[#22C55E] rounded-full" style="width: {{ $m['score'] }}%"></div>
                                </div>
                                <span class="text-sm font-medium text-[#0F172A]">{{ $m['score'] }}%</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-1">
                                <button class="p-2 rounded-lg hover:bg-[#F1F5F9] text-[#64748B]" title="Edit role">Edit</button>
                                @if($m['active'])
                                <button onclick="window.toast?.('User deactivated')" class="p-2 rounded-lg hover:bg-[#FEF2F2] text-[#64748B] hover:text-[#EF4444]" title="Deactivate">Deactivate</button>
                                @else
                                <button onclick="window.toast?.('User activated')" class="p-2 rounded-lg hover:bg-[#ECFDF5] text-[#22C55E]" title="Activate">Activate</button>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
