@extends('layouts.app')

@section('title', 'Project Detail')

@section('breadcrumbs')
<nav class="flex items-center gap-2 text-sm text-[#64748B] dark:text-[#94A3B8]">
    <a href="{{ route('dashboard') }}" class="hover:text-[#4F46E5] dark:hover:text-[#6366F1]">Dashboard</a>
    <span>/</span>
    <a href="{{ route('projects.index') }}" class="hover:text-[#4F46E5] dark:hover:text-[#6366F1]">Projects</a>
    <span>/</span>
    <a href="{{ route('clients.show', 1) }}" class="hover:text-[#4F46E5] dark:hover:text-[#6366F1]">Acme Corp</a>
    <span>/</span>
    <span class="text-[#0F172A] dark:text-[#E2E8F0] font-medium">Website Redesign</span>
</nav>
@endsection

@section('content')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div class="flex items-center gap-4">
            <a href="{{ route('projects.index') }}" class="p-2 rounded-lg hover:bg-[#F1F5F9] dark:hover:bg-[#334155] text-[#64748B] dark:text-[#94A3B8] transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            </a>
            <div>
                <h1 class="text-2xl font-bold text-[#0F172A] dark:text-[#E2E8F0]">Website Redesign</h1>
                <p class="text-sm text-[#64748B] dark:text-[#94A3B8]">Acme Corp · Due Mar 15, 2025</p>
            </div>
            <span class="px-3 py-1.5 rounded-full text-sm font-medium bg-[#EEF2FF] dark:bg-[#334155] text-[#4F46E5] dark:text-[#6366F1]">In Progress</span>
            {{-- Project Health --}}
            <span class="px-3 py-1.5 rounded-full text-sm font-medium bg-[#ECFDF5] dark:bg-emerald-900/40 text-[#22C55E]" title="On track">Healthy</span>
        </div>
    </div>

    <div x-data="{ tab: 'tasks' }" class="space-y-6">
        <div class="border-b border-[#E2E8F0] dark:border-[#334155] overflow-x-auto">
            <nav class="flex gap-6 min-w-max">
                @foreach(['overview' => 'Overview', 'tasks' => 'Tasks', 'milestones' => 'Milestones', 'invoices' => 'Invoices', 'files' => 'Files', 'team' => 'Team', 'activity' => 'Activity'] as $key => $label)
                <button @click="tab = '{{ $key }}'" :class="tab === '{{ $key }}' ? 'border-[#4F46E5] dark:border-[#6366F1] text-[#4F46E5] dark:text-[#6366F1]' : 'border-transparent text-[#64748B] dark:text-[#94A3B8] hover:text-[#0F172A] dark:hover:text-[#E2E8F0]'"
                        class="py-4 px-1 border-b-2 font-medium text-sm transition-colors whitespace-nowrap">
                    {{ $label }}
                </button>
                @endforeach
            </nav>
        </div>

        {{-- Overview: progress + team workload --}}
        <div x-show="tab === 'overview'" class="space-y-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div class="bg-white dark:bg-[#1E293B] rounded-xl p-6 border border-[#E2E8F0] dark:border-[#334155] shadow-sm">
                    <h2 class="text-lg font-semibold text-[#0F172A] dark:text-[#E2E8F0] mb-4">Project Progress</h2>
                    <div class="flex items-center gap-6">
                        <div class="relative w-32 h-32">
                            <svg class="w-32 h-32 -rotate-90" viewBox="0 0 36 36">
                                <path d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="#E2E8F0" stroke-width="2"/>
                                <path d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="#4F46E5" stroke-width="2" stroke-dasharray="75, 100" stroke-linecap="round" class="transition-all"/>
                            </svg>
                            <span class="absolute inset-0 flex items-center justify-center text-2xl font-bold text-[#0F172A] dark:text-[#E2E8F0]">75%</span>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm text-[#64748B] dark:text-[#94A3B8]">Complete redesign of the Acme Corp website with modern UI/UX.</p>
                            <div class="mt-4 grid grid-cols-2 gap-3 text-sm">
                                <div><span class="text-[#64748B] dark:text-[#94A3B8]">Client</span><p class="font-medium text-[#0F172A] dark:text-[#E2E8F0]">Acme Corp</p></div>
                                <div><span class="text-[#64748B] dark:text-[#94A3B8]">Start</span><p class="font-medium text-[#0F172A] dark:text-[#E2E8F0]">Jan 15, 2025</p></div>
                                <div><span class="text-[#64748B] dark:text-[#94A3B8]">Deadline</span><p class="font-medium text-[#0F172A] dark:text-[#E2E8F0]">Mar 15, 2025</p></div>
                                <div><span class="text-[#64748B] dark:text-[#94A3B8]">Budget</span><p class="font-medium text-[#0F172A] dark:text-[#E2E8F0]">$15,000</p></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-white dark:bg-[#1E293B] rounded-xl p-6 border border-[#E2E8F0] dark:border-[#334155] shadow-sm">
                    <h2 class="text-lg font-semibold text-[#0F172A] dark:text-[#E2E8F0] mb-4">Team Workload</h2>
                    <div class="h-48 flex items-end gap-2">
                        @foreach([['name' => 'JD', 'pct' => 85], ['name' => 'SK', 'pct' => 60], ['name' => 'MW', 'pct' => 90], ['name' => 'AB', 'pct' => 45]] as $m)
                        <div class="flex-1 flex flex-col items-center gap-1">
                            <div class="w-full bg-[#E2E8F0] dark:bg-[#334155] rounded-t overflow-hidden" style="height: 120px;">
                                <div class="h-full bg-[#4F46E5] dark:bg-[#6366F1] rounded-t progress-animated" style="width: 100%; height: {{ $m['pct'] }}%; margin-top: auto;"></div>
                            </div>
                            <span class="text-xs font-medium text-[#64748B] dark:text-[#94A3B8]">{{ $m['name'] }}</span>
                            <span class="text-xs text-[#64748B] dark:text-[#94A3B8]">{{ $m['pct'] }}%</span>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        {{-- Kanban --}}
        <div x-show="tab === 'tasks'" class="space-y-4">
            <h2 class="text-lg font-semibold text-[#0F172A] dark:text-[#E2E8F0]">Task Board</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                @foreach(['To Do' => [['name' => 'Design homepage mockup', 'priority' => 'High'], ['name' => 'Set up dev environment', 'priority' => 'Medium'], ['name' => 'Create content structure', 'priority' => 'Low']], 'In Progress' => [['name' => 'Implement header component', 'priority' => 'High'], ['name' => 'Build contact form', 'priority' => 'Medium']], 'Review' => [['name' => 'Final design review', 'priority' => 'Critical'], ['name' => 'Accessibility audit', 'priority' => 'High']], 'Completed' => [['name' => 'Project kickoff', 'priority' => 'Low'], ['name' => 'Wireframes approved', 'priority' => 'Medium']]] as $column => $tasks)
                <div class="bg-[#F8FAFC] dark:bg-[#0F172A] rounded-xl p-4 border border-[#E2E8F0] dark:border-[#334155] min-h-[200px]">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="font-semibold text-[#0F172A] dark:text-[#E2E8F0]">{{ $column }}</h3>
                        <span class="text-xs font-medium text-[#64748B] dark:text-[#94A3B8] bg-white dark:bg-[#1E293B] px-2 py-1 rounded">{{ count($tasks) }}</span>
                    </div>
                    <div class="space-y-3 sortable-list">
                        @foreach($tasks as $t)
                        <div class="bg-white dark:bg-[#1E293B] rounded-lg p-4 border border-[#E2E8F0] dark:border-[#334155] shadow-sm cursor-move hover:shadow-md transition-all">
                            <p class="font-medium text-[#0F172A] dark:text-[#E2E8F0] text-sm">{{ $t['name'] }}</p>
                            <div class="mt-2 flex items-center gap-2 flex-wrap">
                                <span class="w-6 h-6 rounded-full bg-[#4F46E5] dark:bg-[#6366F1] text-white text-xs flex items-center justify-center">JD</span>
                                <span class="text-xs px-2 py-0.5 rounded font-medium {{ $t['priority'] === 'Critical' ? 'bg-[#FEF2F2] dark:bg-red-900/30 text-[#EF4444]' : ($t['priority'] === 'High' ? 'bg-[#EEF2FF] dark:bg-indigo-900/30 text-[#4F46E5] dark:text-[#6366F1]' : 'bg-[#F1F5F9] dark:bg-[#334155] text-[#64748B] dark:text-[#94A3B8]') }}">{{ $t['priority'] }}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        {{-- Milestones --}}
        <div x-show="tab === 'milestones'" class="space-y-4">
            @foreach([['name' => 'Design Phase', 'date' => 'Feb 1', 'done' => true], ['name' => 'Development', 'date' => 'Mar 1', 'done' => true], ['name' => 'Testing & QA', 'date' => 'Mar 10', 'done' => false], ['name' => 'Launch', 'date' => 'Mar 15', 'done' => false]] as $m)
            <div class="flex items-center gap-4 p-4 bg-white dark:bg-[#1E293B] rounded-xl border border-[#E2E8F0] dark:border-[#334155]">
                <div class="w-10 h-10 rounded-full flex items-center justify-center {{ $m['done'] ? 'bg-[#22C55E] text-white' : 'bg-[#F1F5F9] dark:bg-[#334155] text-[#64748B] dark:text-[#94A3B8]' }}">
                    @if($m['done'])<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    @else<span class="text-sm font-medium">{{ $m['date'] }}</span>@endif
                </div>
                <div>
                    <p class="font-medium text-[#0F172A] dark:text-[#E2E8F0]">{{ $m['name'] }}</p>
                    <p class="text-sm text-[#64748B] dark:text-[#94A3B8]">{{ $m['date'] }}, 2025</p>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Invoices --}}
        <div x-show="tab === 'invoices'" class="bg-white dark:bg-[#1E293B] rounded-xl p-6 border border-[#E2E8F0] dark:border-[#334155]">
            <p class="text-[#64748B] dark:text-[#94A3B8]">2 invoices · $8,500 total</p>
            <a href="{{ route('invoices.index') }}" class="inline-block mt-2 text-sm font-medium text-[#4F46E5] dark:text-[#6366F1] hover:underline">View invoices →</a>
        </div>

        {{-- Files --}}
        <div x-show="tab === 'files'" class="bg-white dark:bg-[#1E293B] rounded-xl p-6 border border-[#E2E8F0] dark:border-[#334155]">
            <h2 class="text-lg font-semibold text-[#0F172A] dark:text-[#E2E8F0] mb-4">File Attachments</h2>
            <div class="space-y-2">
                @foreach([['name' => 'wireframes-v2.pdf', 'size' => '2.4 MB', 'date' => 'Feb 15'], ['name' => 'design-mockups.zip', 'size' => '8.1 MB', 'date' => 'Feb 20'], ['name' => 'content-brief.docx', 'size' => '124 KB', 'date' => 'Mar 1']] as $f)
                <div class="flex items-center gap-3 p-3 rounded-lg border border-[#E2E8F0] dark:border-[#334155] hover:bg-[#F8FAFC] dark:hover:bg-[#0F172A]">
                    <div class="w-10 h-10 rounded-lg bg-[#EEF2FF] dark:bg-[#334155] flex items-center justify-center text-[#4F46E5] dark:text-[#6366F1]">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="font-medium text-[#0F172A] dark:text-[#E2E8F0] truncate">{{ $f['name'] }}</p>
                        <p class="text-xs text-[#64748B] dark:text-[#94A3B8]">{{ $f['size'] }} · {{ $f['date'] }}</p>
                    </div>
                    <button class="p-2 rounded-lg hover:bg-[#F1F5F9] dark:hover:bg-[#334155] text-[#64748B] dark:text-[#94A3B8]">Download</button>
                </div>
                @endforeach
            </div>
            <button class="mt-4 text-sm font-medium text-[#4F46E5] dark:text-[#6366F1] hover:underline">+ Upload file</button>
        </div>

        {{-- Team --}}
        <div x-show="tab === 'team'" class="bg-white dark:bg-[#1E293B] rounded-xl p-6 border border-[#E2E8F0] dark:border-[#334155]">
            <div class="flex flex-wrap gap-4">
                @foreach([['name' => 'John Doe', 'role' => 'Project Lead'], ['name' => 'Sarah Kim', 'role' => 'Designer'], ['name' => 'Mike Wilson', 'role' => 'Developer']] as $member)
                <div class="flex items-center gap-3 p-3 rounded-lg border border-[#E2E8F0] dark:border-[#334155]">
                    <div class="w-10 h-10 rounded-full bg-[#4F46E5] dark:bg-[#6366F1] text-white flex items-center justify-center font-medium text-sm">{{ substr($member['name'], 0, 2) }}</div>
                    <div>
                        <p class="font-medium text-[#0F172A] dark:text-[#E2E8F0]">{{ $member['name'] }}</p>
                        <p class="text-xs text-[#64748B] dark:text-[#94A3B8]">{{ $member['role'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        {{-- Activity --}}
        <div x-show="tab === 'activity'" class="bg-white dark:bg-[#1E293B] rounded-xl p-6 border border-[#E2E8F0] dark:border-[#334155]">
            <h2 class="text-lg font-semibold text-[#0F172A] dark:text-[#E2E8F0] mb-4">Activity History</h2>
            <div class="space-y-4">
                @foreach([['action' => 'Task moved to Review', 'detail' => 'Final design review', 'user' => 'John Doe', 'time' => '2 hours ago'], ['action' => 'File uploaded', 'detail' => 'design-mockups.zip', 'user' => 'Sarah Kim', 'time' => '1 day ago'], ['action' => 'Milestone completed', 'detail' => 'Development phase', 'user' => 'Mike Wilson', 'time' => '3 days ago']] as $a)
                <div class="flex gap-3 py-2 border-b border-[#F1F5F9] dark:border-[#334155] last:border-0">
                    <div class="w-2 h-2 mt-2 rounded-full bg-[#4F46E5] dark:bg-[#6366F1] shrink-0"></div>
                    <div>
                        <p class="text-sm font-medium text-[#0F172A] dark:text-[#E2E8F0]">{{ $a['action'] }}</p>
                        <p class="text-sm text-[#64748B] dark:text-[#94A3B8]">{{ $a['detail'] }}</p>
                        <p class="text-xs text-[#64748B] dark:text-[#94A3B8] mt-0.5">{{ $a['user'] }} · {{ $a['time'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.sortable-list').forEach(el => {
        new Sortable(el, {
            group: 'tasks',
            animation: 150,
            ghostClass: 'opacity-50'
        });
    });
});
</script>
@endpush
@endsection
