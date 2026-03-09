@extends('layouts.app')

@section('title', 'Team')

@section('content')
<div class="space-y-6">
 <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-[var(--color-text)]">Team Management</h1>
            <p class="mt-1 text-sm text-[var(--color-text-secondary)]">Manage roles, workloads, and invite members</p>
        </div>
 <button onclick="window.toast?.('Invite sent!', 'success')" class="inline-flex items-center gap-2 px-4 py-2 bg-[#4F7CFF] text-white rounded-lg hover:opacity-90 font-medium text-sm transition-opacity">
 <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
 Invite Member
 </button>
 </div>

 <!-- Summary Cards -->
 <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <div class="bg-[var(--color-card)] rounded-xl p-5 border border-[var(--color-border)] shadow-sm transition-colors">
            <p class="text-sm text-[var(--color-text-secondary)]">Total Members</p>
            <p class="text-2xl font-bold text-[var(--color-text)] mt-1">5</p>
            <p class="text-xs text-[#22C55E] mt-1">4 currently active</p>
        </div>
        <div class="bg-[var(--color-card)] rounded-xl p-5 border border-[var(--color-border)] shadow-sm transition-colors">
            <p class="text-sm text-[var(--color-text-secondary)]">Total Tasks Assigned</p>
            <p class="text-2xl font-bold text-[var(--color-text)] mt-1">51</p>
            <p class="text-xs text-[var(--color-text-secondary)] mt-1">Across all members</p>
        </div>
        <div class="bg-[var(--color-card)] rounded-xl p-5 border border-[var(--color-border)] shadow-sm transition-colors">
            <p class="text-sm text-[var(--color-text-secondary)]">Avg. Productivity</p>
            <p class="text-2xl font-bold text-[#4F7CFF] mt-1">86.6%</p>
            <p class="text-xs text-[#22C55E] mt-1">↑ +3.2% this week</p>
        </div>
 </div>

 <div class="bg-[var(--color-card)] rounded-xl border border-[var(--color-border)] shadow-sm overflow-hidden transition-colors">
 <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-[var(--color-bg-secondary)] border-b border-[var(--color-border)] transition-colors">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-[var(--color-text-secondary)] uppercase tracking-wider">Member</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-[var(--color-text-secondary)] uppercase tracking-wider">Role</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-[var(--color-text-secondary)] uppercase tracking-wider">Tasks</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-[var(--color-text-secondary)] uppercase tracking-wider">Projects</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-[var(--color-text-secondary)] uppercase tracking-wider">Productivity</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-[var(--color-text-secondary)] uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-right text-xs font-semibold text-[var(--color-text-secondary)] uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
 <tbody class="divide-y divide-[var(--color-border)]">
 @foreach([
 ['name' => 'John Doe', 'email' => 'john@clientflow.com', 'role' => 'Admin', 'tasks' => 12, 'projects' => 8, 'score' => 92, 'online' => true],
 ['name' => 'Sarah Kim', 'email' => 'sarah@clientflow.com', 'role' => 'Manager', 'tasks' => 8, 'projects' => 6, 'score' => 88, 'online' => true],
 ['name' => 'Mike Wilson','email' => 'mike@clientflow.com', 'role' => 'Staff', 'tasks' => 15, 'projects' => 5, 'score' => 85, 'online' => false],
 ['name' => 'Anna Brown', 'email' => 'anna@clientflow.com', 'role' => 'Staff', 'tasks' => 6, 'projects' => 4, 'score' => 78, 'online' => true],
 ['name' => 'Chris Lee', 'email' => 'chris@clientflow.com', 'role' => 'Manager', 'tasks' => 10, 'projects' => 7, 'score' => 90, 'online' => false],
 ] as $m)
                    @php
                    $roleClasses = [
                        'Admin' => 'bg-[#FEF2F2] text-[#EF4444] dark:bg-[rgba(239,68,68,0.1)]',
                        'Manager' => 'bg-[#EEF2FF] text-[#4F7CFF] dark:bg-[var(--color-active-bg)]',
                        'Staff' => 'bg-[var(--color-hover)] text-[var(--color-text-secondary)]',
                    ];
 $scoreColor = $m['score'] >= 90 ? 'bg-[#22C55E]' : ($m['score'] >= 80 ? 'bg-[#4F7CFF]' : 'bg-[#F59E0B]');
 @endphp
 <tr class="hover:bg-[var(--color-hover)] transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="relative shrink-0">
                                    <div class="w-10 h-10 rounded-full bg-[#4F7CFF] text-white flex items-center justify-center font-medium text-sm">{{ substr($m['name'], 0, 2) }}</div>
                                    <span class="absolute -bottom-0.5 -right-0.5 w-3 h-3 rounded-full border-2 border-[var(--color-card)] {{ $m['online'] ? 'bg-[#22C55E]' : 'bg-[var(--color-border)]' }} transition-colors"></span>
                                </div>
                                <div>
                                    <p class="font-medium text-[var(--color-text)]">{{ $m['name'] }}</p>
                                    <p class="text-xs text-[var(--color-text-secondary)]">{{ $m['email'] }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex px-2.5 py-1 rounded-full text-xs font-medium {{ $roleClasses[$m['role']] }}">{{ $m['role'] }}</span>
                        </td>
                        <td class="px-6 py-4 text-sm font-medium text-[var(--color-text)]">{{ $m['tasks'] }}</td>
                        <td class="px-6 py-4 text-sm font-medium text-[var(--color-text)]">{{ $m['projects'] }}</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <div class="w-20 h-2 bg-[var(--color-border)] rounded-full overflow-hidden transition-colors">
                                    <div class="h-full {{ $scoreColor }} rounded-full" style="width: {{ $m['score'] }}%"></div>
                                </div>
                                <span class="text-sm font-semibold text-[var(--color-text)]">{{ $m['score'] }}%</span>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center gap-1.5 text-xs font-medium {{ $m['online'] ? 'text-[#22C55E]' : 'text-[var(--color-text-secondary)]' }}">
                                <span class="w-1.5 h-1.5 rounded-full {{ $m['online'] ? 'bg-[#22C55E]' : 'bg-[var(--color-border)]' }} transition-colors"></span>
                                {{ $m['online'] ? 'Online' : 'Offline' }}
                            </span>
                        </td>
 <td class="px-6 py-4 text-right">
 <div class="flex items-center justify-end gap-1">
 <button class="p-2 rounded-lg hover:bg-[var(--color-bg)] text-[var(--color-text-secondary)] hover:text-[#4F7CFF] transition-colors" title="Edit role">
 <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
 </button>
 @if($m['online'])
 <button onclick="window.toast?.('User deactivated', 'warning')" class="p-2 rounded-lg hover:bg-[rgba(239,68,68,0.1)] text-[var(--color-text-secondary)] hover:text-[#EF4444] transition-colors" title="Deactivate">
 <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"/></svg>
 </button>
 @else
 <button onclick="window.toast?.('User activated', 'success')" class="p-2 rounded-lg hover:bg-[rgba(34,197,94,0.1)] text-[var(--color-text-secondary)] hover:text-[#22C55E] transition-colors" title="Activate">
 <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
 </button>
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
