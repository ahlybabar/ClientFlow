@extends('layouts.app')

@section('title', 'Project Detail')

@section('breadcrumbs')
<nav class="flex items-center gap-2 text-sm text-[#64748B]">
    <a href="{{ route('dashboard') }}" class="hover:text-[#4F7CFF]">Dashboard</a>
    <span>/</span>
    <a href="{{ route('projects.index') }}" class="hover:text-[#4F7CFF]">Projects</a>
    <span>/</span>
    <a href="{{ route('clients.show', 1) }}" class="hover:text-[#4F7CFF]">Acme Corp</a>
    <span>/</span>
    <span class="text-[#0F172A] font-medium">Website Redesign</span>
</nav>
@endsection

@section('content')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div class="flex items-center gap-4">
            <a href="{{ route('projects.index') }}" class="p-2 rounded-lg hover:bg-[#F1F5F9] text-[#64748B] transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            </a>
            <div>
                <h1 class="text-2xl font-bold text-[#0F172A]">Website Redesign</h1>
                <p class="text-sm text-[#64748B]">Acme Corp · Due Mar 15, 2025</p>
            </div>
            <span class="px-3 py-1.5 rounded-full text-sm font-medium bg-[#EEF2FF] text-[#4F7CFF]">In Progress</span>
            {{-- Project Health --}}
            <span class="px-3 py-1.5 rounded-full text-sm font-medium bg-[#ECFDF5] text-[#22C55E]" title="On track">Healthy</span>
        </div>
    </div>

    <div x-data="{ tab: 'tasks' }" class="space-y-6">
        <div class="border-b border-[#E2E8F0] overflow-x-auto">
            <nav class="flex gap-6 min-w-max">
                @foreach(['overview' => 'Overview', 'tasks' => 'Tasks', 'milestones' => 'Milestones', 'invoices' => 'Invoices', 'files' => 'Files', 'team' => 'Team', 'activity' => 'Activity'] as $key => $label)
                <button @click="tab = '{{ $key }}'" :class="tab === '{{ $key }}' ? 'border-[#4F7CFF] text-[#4F7CFF]' : 'border-transparent text-[#64748B] hover:text-[#0F172A]'"
                        class="py-4 px-1 border-b-2 font-medium text-sm transition-colors whitespace-nowrap">
                    {{ $label }}
                </button>
                @endforeach
            </nav>
        </div>

        {{-- Overview: progress + health + team workload --}}
        <div x-show="tab === 'overview'" class="space-y-6">
            {{-- Project Health Panel --}}
            <div class="bg-white rounded-xl p-6 border border-[#E2E8F0] shadow-sm">
                <div class="flex items-center justify-between mb-5">
                    <h2 class="text-lg font-semibold text-[#0F172A]">Project Health</h2>
                    <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full text-sm font-semibold bg-[#ECFDF5] text-[#22C55E]">
                        <span class="w-2 h-2 rounded-full bg-[#22C55E] animate-pulse"></span>
                        Healthy
                    </span>
                </div>
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mb-5">
                    <div class="p-3 rounded-lg bg-[#F8FAFC] border border-[#E2E8F0] text-center">
                        <p class="text-2xl font-bold text-[#22C55E]">82%</p>
                        <p class="text-[11px] text-[#64748B] mt-1">Health Score</p>
                    </div>
                    <div class="p-3 rounded-lg bg-[#F8FAFC] border border-[#E2E8F0] text-center">
                        <p class="text-2xl font-bold text-[#0F172A]">75%</p>
                        <p class="text-[11px] text-[#64748B] mt-1">Completion</p>
                    </div>
                    <div class="p-3 rounded-lg bg-[#F8FAFC] border border-[#E2E8F0] text-center">
                        <p class="text-2xl font-bold text-[#22C55E]">$12.5K</p>
                        <p class="text-[11px] text-[#64748B] mt-1">Budget Used</p>
                    </div>
                    <div class="p-3 rounded-lg bg-[#F8FAFC] border border-[#E2E8F0] text-center">
                        <p class="text-2xl font-bold text-[#4F7CFF]">6 days</p>
                        <p class="text-[11px] text-[#64748B] mt-1">Until Deadline</p>
                    </div>
                </div>
                <div class="space-y-3">
                    <div>
                        <div class="flex items-center justify-between text-sm mb-1.5">
                            <span class="text-[#64748B]">Schedule</span>
                            <span class="font-medium text-[#22C55E]">On Track</span>
                        </div>
                        <div class="h-2 bg-[#E2E8F0] rounded-full overflow-hidden">
                            <div class="h-full bg-[#22C55E] rounded-full progress-animated" style="width: 85%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="flex items-center justify-between text-sm mb-1.5">
                            <span class="text-[#64748B]">Budget</span>
                            <span class="font-medium text-[#22C55E]">Within Budget</span>
                        </div>
                        <div class="h-2 bg-[#E2E8F0] rounded-full overflow-hidden">
                            <div class="h-full bg-[#4F7CFF] rounded-full progress-animated" style="width: 72%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="flex items-center justify-between text-sm mb-1.5">
                            <span class="text-[#64748B]">Task Completion</span>
                            <span class="font-medium text-[#22C55E]">Good</span>
                        </div>
                        <div class="h-2 bg-[#E2E8F0] rounded-full overflow-hidden">
                            <div class="h-full bg-[#22C55E] rounded-full progress-animated" style="width: 75%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="flex items-center justify-between text-sm mb-1.5">
                            <span class="text-[#64748B]">Client Satisfaction</span>
                            <span class="font-medium text-[#22C55E]">Excellent</span>
                        </div>
                        <div class="h-2 bg-[#E2E8F0] rounded-full overflow-hidden">
                            <div class="h-full bg-[#22C55E] rounded-full progress-animated" style="width: 92%"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div class="bg-white rounded-xl p-6 border border-[#E2E8F0] shadow-sm">
                    <h2 class="text-lg font-semibold text-[#0F172A] mb-4">Project Progress</h2>
                    <div class="flex items-center gap-6">
                        <div class="relative w-32 h-32">
                            <svg class="w-32 h-32 -rotate-90" viewBox="0 0 36 36">
                                <path d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="#E2E8F0" stroke-width="2"/>
                                <path d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="#4F7CFF" stroke-width="2" stroke-dasharray="75, 100" stroke-linecap="round" class="transition-all"/>
                            </svg>
                            <span class="absolute inset-0 flex items-center justify-center text-2xl font-bold text-[#0F172A]">75%</span>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm text-[#64748B]">Complete redesign of the Acme Corp website with modern UI/UX.</p>
                            <div class="mt-4 grid grid-cols-2 gap-3 text-sm">
                                <div><span class="text-[#64748B]">Client</span><p class="font-medium text-[#0F172A]">Acme Corp</p></div>
                                <div><span class="text-[#64748B]">Start</span><p class="font-medium text-[#0F172A]">Jan 15, 2025</p></div>
                                <div><span class="text-[#64748B]">Deadline</span><p class="font-medium text-[#0F172A]">Mar 15, 2025</p></div>
                                <div><span class="text-[#64748B]">Budget</span><p class="font-medium text-[#0F172A]">$15,000</p></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-xl p-6 border border-[#E2E8F0] shadow-sm">
                    <h2 class="text-lg font-semibold text-[#0F172A] mb-4">Team Workload</h2>
                    <div class="h-48 flex items-end gap-2">
                        @foreach([['name' => 'JD', 'pct' => 85], ['name' => 'SK', 'pct' => 60], ['name' => 'MW', 'pct' => 90], ['name' => 'AB', 'pct' => 45]] as $m)
                        <div class="flex-1 flex flex-col items-center gap-1">
                            <div class="w-full bg-[#E2E8F0] rounded-t overflow-hidden" style="height: 120px;">
                                <div class="h-full bg-[#4F7CFF] rounded-t progress-animated" style="width: 100%; height: {{ $m['pct'] }}%; margin-top: auto;"></div>
                            </div>
                            <span class="text-xs font-medium text-[#64748B]">{{ $m['name'] }}</span>
                            <span class="text-xs text-[#64748B]">{{ $m['pct'] }}%</span>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        {{-- Kanban --}}
        <div x-show="tab === 'tasks'" class="space-y-4">
            <h2 class="text-lg font-semibold text-[#0F172A]">Task Board</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                @foreach(['To Do' => [['name' => 'Design homepage mockup', 'priority' => 'High'], ['name' => 'Set up dev environment', 'priority' => 'Medium'], ['name' => 'Create content structure', 'priority' => 'Low']], 'In Progress' => [['name' => 'Implement header component', 'priority' => 'High'], ['name' => 'Build contact form', 'priority' => 'Medium']], 'Review' => [['name' => 'Final design review', 'priority' => 'Critical'], ['name' => 'Accessibility audit', 'priority' => 'High']], 'Completed' => [['name' => 'Project kickoff', 'priority' => 'Low'], ['name' => 'Wireframes approved', 'priority' => 'Medium']]] as $column => $tasks)
                <div class="bg-[#F8FAFC] rounded-xl p-4 border border-[#E2E8F0] min-h-[200px]">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="font-semibold text-[#0F172A]">{{ $column }}</h3>
                        <span class="text-xs font-medium text-[#64748B] bg-white px-2 py-1 rounded">{{ count($tasks) }}</span>
                    </div>
                    <div class="space-y-3 sortable-list">
                        @foreach($tasks as $t)
                        <div class="bg-white rounded-lg p-4 border border-[#E2E8F0] shadow-sm cursor-move hover:shadow-md transition-all">
                            <p class="font-medium text-[#0F172A] text-sm">{{ $t['name'] }}</p>
                            <div class="mt-2 flex items-center gap-2 flex-wrap">
                                <span class="w-6 h-6 rounded-full bg-[#4F7CFF] text-white text-xs flex items-center justify-center">JD</span>
                                <span class="text-xs px-2 py-0.5 rounded font-medium {{ $t['priority'] === 'Critical' ? 'bg-[#FEF2F2] text-[#EF4444]' : ($t['priority'] === 'High' ? 'bg-[#EEF2FF] text-[#4F7CFF]' : 'bg-[#F1F5F9] text-[#64748B]') }}">{{ $t['priority'] }}</span>
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
            <div class="flex items-center gap-4 p-4 bg-white rounded-xl border border-[#E2E8F0]">
                <div class="w-10 h-10 rounded-full flex items-center justify-center {{ $m['done'] ? 'bg-[#22C55E] text-white' : 'bg-[#F1F5F9] text-[#64748B]' }}">
                    @if($m['done'])<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    @else<span class="text-sm font-medium">{{ $m['date'] }}</span>@endif
                </div>
                <div>
                    <p class="font-medium text-[#0F172A]">{{ $m['name'] }}</p>
                    <p class="text-sm text-[#64748B]">{{ $m['date'] }}, 2025</p>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Invoices --}}
        <div x-show="tab === 'invoices'" class="bg-white rounded-xl p-6 border border-[#E2E8F0]">
            <p class="text-[#64748B]">2 invoices · $8,500 total</p>
            <a href="{{ route('invoices.index') }}" class="inline-block mt-2 text-sm font-medium text-[#4F7CFF] hover:underline">View invoices →</a>
        </div>

        {{-- Files --}}
        <div x-show="tab === 'files'" class="bg-white rounded-xl p-6 border border-[#E2E8F0]">
            <h2 class="text-lg font-semibold text-[#0F172A] mb-4">File Attachments</h2>
            <div class="space-y-2">
                @foreach([['name' => 'wireframes-v2.pdf', 'size' => '2.4 MB', 'date' => 'Feb 15'], ['name' => 'design-mockups.zip', 'size' => '8.1 MB', 'date' => 'Feb 20'], ['name' => 'content-brief.docx', 'size' => '124 KB', 'date' => 'Mar 1']] as $f)
                <div class="flex items-center gap-3 p-3 rounded-lg border border-[#E2E8F0] hover:bg-[#F8FAFC]">
                    <div class="w-10 h-10 rounded-lg bg-[#EEF2FF] flex items-center justify-center text-[#4F7CFF]">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="font-medium text-[#0F172A] truncate">{{ $f['name'] }}</p>
                        <p class="text-xs text-[#64748B]">{{ $f['size'] }} · {{ $f['date'] }}</p>
                    </div>
                    <button class="p-2 rounded-lg hover:bg-[#F1F5F9] text-[#64748B]">Download</button>
                </div>
                @endforeach
            </div>
            <button class="mt-4 text-sm font-medium text-[#4F7CFF] hover:underline">+ Upload file</button>
        </div>

        {{-- Team --}}
        <div x-show="tab === 'team'" class="bg-[var(--color-card)] rounded-xl p-6 border border-[var(--color-border)] shadow-sm transition-colors">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h2 class="text-lg font-semibold text-[var(--color-text)]">Project Team</h2>
                    <p class="text-sm text-[var(--color-text-secondary)] mt-1">Manage members assigned to this project</p>
                </div>
                <button onclick="window.toast?.('Manage Team modal opened', 'info')" class="inline-flex items-center gap-2 px-4 py-2 bg-[#4F7CFF] text-white rounded-lg hover:bg-[#4338CA] transition-colors text-sm font-medium">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    Manage Team
                </button>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach([['name' => 'John Doe', 'role' => 'Project Lead'], ['name' => 'Sarah Kim', 'role' => 'Designer'], ['name' => 'Mike Wilson', 'role' => 'Developer']] as $member)
                <div class="flex items-center justify-between p-4 rounded-xl border border-[var(--color-border)] bg-[var(--color-bg-secondary)] hover:border-[var(--color-text-muted)] transition-colors group">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-[#4F7CFF] text-white flex items-center justify-center font-medium text-sm">{{ substr($member['name'], 0, 2) }}</div>
                        <div>
                            <p class="font-medium text-[var(--color-text)]">{{ $member['name'] }}</p>
                            <p class="text-xs text-[var(--color-text-secondary)]">{{ $member['role'] }}</p>
                        </div>
                    </div>
                    <button class="p-2 text-[var(--color-text-muted)] hover:text-[#EF4444] hover:bg-[#FEF2F2] dark:hover:bg-[rgba(239,68,68,0.1)] rounded-lg transition-colors opacity-0 group-hover:opacity-100 focus:opacity-100" title="Remove Member">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                    </button>
                </div>
                @endforeach
            </div>
        </div>

        {{-- Activity --}}
        <div x-show="tab === 'activity'" class="bg-white rounded-xl p-6 border border-[#E2E8F0]">
            <h2 class="text-lg font-semibold text-[#0F172A] mb-4">Activity History</h2>
            <div class="space-y-4">
                @foreach([['action' => 'Task moved to Review', 'detail' => 'Final design review', 'user' => 'John Doe', 'time' => '2 hours ago'], ['action' => 'File uploaded', 'detail' => 'design-mockups.zip', 'user' => 'Sarah Kim', 'time' => '1 day ago'], ['action' => 'Milestone completed', 'detail' => 'Development phase', 'user' => 'Mike Wilson', 'time' => '3 days ago']] as $a)
                <div class="flex gap-3 py-2 border-b border-[#F1F5F9] last:border-0">
                    <div class="w-2 h-2 mt-2 rounded-full bg-[#4F7CFF] shrink-0"></div>
                    <div>
                        <p class="text-sm font-medium text-[#0F172A]">{{ $a['action'] }}</p>
                        <p class="text-sm text-[#64748B]">{{ $a['detail'] }}</p>
                        <p class="text-xs text-[#64748B] mt-0.5">{{ $a['user'] }} · {{ $a['time'] }}</p>
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
