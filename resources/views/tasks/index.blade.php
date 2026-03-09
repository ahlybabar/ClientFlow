@extends('layouts.app')

@section('title', 'Tasks')

@section('content')
<div class="space-y-6" x-data="{
 taskModalOpen: false,
 taskView: 'list',
 activeFilter: 'all',
 filters: ['all','my','overdue','completed'],
}">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-[var(--color-text)]">Tasks</h1>
            <p class="mt-1 text-sm text-[var(--color-text-secondary)]">Manage and track all your tasks</p>
        </div>
        <div class="flex items-center gap-3">
            <!-- View Toggle -->
            <div class="flex items-center bg-[var(--color-bg-secondary)] rounded-lg p-1 gap-1 transition-colors">
                <button @click="taskView = 'list'"
                        :class="taskView === 'list' ? 'bg-[var(--color-card)] shadow-sm text-[#6366F1]' : 'text-[var(--color-text-secondary)] hover:text-[var(--color-text)]'"
                        class="p-2 rounded-md transition-all" title="List view">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/></svg>
                </button>
                <button @click="taskView = 'board'"
                        :class="taskView === 'board' ? 'bg-[var(--color-card)] shadow-sm text-[#6366F1]' : 'text-[var(--color-text-secondary)] hover:text-[var(--color-text)]'"
                        class="p-2 rounded-md transition-all" title="Board view">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2"/></svg>
                </button>
            </div>
 <button @click="taskModalOpen = true" class="inline-flex items-center gap-2 px-4 py-2 bg-[#6366F1] text-white rounded-lg hover:bg-[#4F46E5] font-medium text-sm transition-colors">
 <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
 Add Task
 </button>
 </div>
 </div>

    <!-- Filters -->
    <div class="flex flex-wrap gap-2">
        <button @click="activeFilter = 'all'" :class="activeFilter === 'all' ? 'bg-[#6366F1] text-white border-transparent' : 'border border-[var(--color-border)] text-[var(--color-text-secondary)] hover:bg-[var(--color-hover)]'" class="px-4 py-2 rounded-lg text-sm font-medium transition-colors">All Tasks</button>
        <button @click="activeFilter = 'my'" :class="activeFilter === 'my' ? 'bg-[#6366F1] text-white border-transparent' : 'border border-[var(--color-border)] text-[var(--color-text-secondary)] hover:bg-[var(--color-hover)]'" class="px-4 py-2 rounded-lg text-sm font-medium transition-colors">My Tasks</button>
        <button @click="activeFilter = 'overdue'" :class="activeFilter === 'overdue' ? 'bg-[#EF4444] text-white border-transparent' : 'border border-[var(--color-border)] text-[var(--color-text-secondary)] hover:bg-[var(--color-hover)]'" class="px-4 py-2 rounded-lg text-sm font-medium transition-colors">Overdue</button>
        <button @click="activeFilter = 'completed'" :class="activeFilter === 'completed' ? 'bg-[#22C55E] text-white border-transparent' : 'border border-[var(--color-border)] text-[var(--color-text-secondary)] hover:bg-[var(--color-hover)]'" class="px-4 py-2 rounded-lg text-sm font-medium transition-colors">Completed</button>
    </div>

    <!-- ── List View ── -->
    <div x-show="taskView === 'list'" class="bg-[var(--color-card)] rounded-xl border border-[var(--color-border)] shadow-sm overflow-hidden transition-colors">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-[var(--color-bg-secondary)] border-b border-[var(--color-border)] transition-colors">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-[var(--color-text-secondary)] uppercase tracking-wider">Task Name</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-[var(--color-text-secondary)] uppercase tracking-wider">Project</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-[var(--color-text-secondary)] uppercase tracking-wider">Assigned To</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-[var(--color-text-secondary)] uppercase tracking-wider">Priority</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-[var(--color-text-secondary)] uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-[var(--color-text-secondary)] uppercase tracking-wider">Due Date</th>
                        <th class="px-6 py-4 text-right text-xs font-semibold text-[var(--color-text-secondary)] uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[var(--color-border)]">
 @foreach([
 ['task' => 'Design homepage mockup', 'project' => 'Website Redesign', 'assignee' => 'SK', 'assignee_name' => 'Sarah Kim', 'priority' => 'High', 'status' => 'In Progress', 'due' => 'Mar 8', 'overdue' => false],
 ['task' => 'Implement header component', 'project' => 'Website Redesign', 'assignee' => 'JD', 'assignee_name' => 'John Doe', 'priority' => 'High', 'status' => 'In Progress', 'due' => 'Mar 5', 'overdue' => true],
 ['task' => 'API integration', 'project' => 'Mobile App', 'assignee' => 'AB', 'assignee_name' => 'Anna Brown', 'priority' => 'Medium', 'status' => 'To Do', 'due' => 'Mar 10', 'overdue' => false],
 ['task' => 'Final design review', 'project' => 'Website Redesign', 'assignee' => 'MW', 'assignee_name' => 'Mike Wilson', 'priority' => 'High', 'status' => 'Review', 'due' => 'Mar 8', 'overdue' => false],
 ['task' => 'Client presentation', 'project' => 'Brand Identity', 'assignee' => 'SK', 'assignee_name' => 'Sarah Kim', 'priority' => 'Medium', 'status' => 'Completed', 'due' => 'Feb 28', 'overdue' => false],
 ['task' => 'Database schema design', 'project' => 'E-commerce Platform', 'assignee' => 'JD', 'assignee_name' => 'John Doe', 'priority' => 'High', 'status' => 'To Do', 'due' => 'Mar 12', 'overdue' => false],
 ['task' => 'Write unit tests', 'project' => 'Mobile App', 'assignee' => 'MW', 'assignee_name' => 'Mike Wilson', 'priority' => 'Low', 'status' => 'To Do', 'due' => 'Mar 15', 'overdue' => false],
 ] as $t)
                    <tr class="hover:bg-[var(--color-hover)] transition-colors group">
                        <td class="px-6 py-4">
                            <button @click="taskModalOpen = true" class="font-medium text-[var(--color-text)] hover:text-[#6366F1] text-left group-hover:underline decoration-dashed transition-colors">{{ $t['task'] }}</button>
                        </td>
                        <td class="px-6 py-4 text-sm text-[var(--color-text-secondary)]">{{ $t['project'] }}</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <span class="w-7 h-7 rounded-full bg-[#6366F1] text-white text-xs flex items-center justify-center font-medium shrink-0">{{ $t['assignee'] }}</span>
                                <span class="text-sm text-[var(--color-text-secondary)] hidden sm:inline">{{ $t['assignee_name'] }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="text-xs px-2.5 py-1 rounded-full font-medium transition-colors
                                {{ $t['priority'] === 'High' ? 'bg-[#FEF2F2] text-[#EF4444] dark:bg-[rgba(239,68,68,0.1)]' :
                                ($t['priority'] === 'Medium' ? 'bg-[#FEF3C7] text-[#F59E0B] dark:bg-[rgba(245,158,11,0.1)]' :
                                'bg-[var(--color-hover)] text-[var(--color-text-secondary)]') }}">{{ $t['priority'] }}</span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="text-xs px-2.5 py-1 rounded-full font-medium transition-colors
                                {{ $t['status'] === 'Completed' ? 'bg-[#ECFDF5] text-[#22C55E] dark:bg-[rgba(34,197,94,0.1)]' :
                                ($t['status'] === 'In Progress' ? 'bg-[#EEF2FF] text-[#6366F1] dark:bg-[var(--color-active-bg)]' :
                                ($t['status'] === 'Review' ? 'bg-[#FEF3C7] text-[#D97706] dark:bg-[rgba(217,119,6,0.1)]' :
                                'bg-[var(--color-hover)] text-[var(--color-text-secondary)]')) }}">{{ $t['status'] }}</span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="text-sm transition-colors {{ $t['overdue'] ? 'text-[#EF4444] font-semibold' : 'text-[var(--color-text-secondary)]' }}">
                                @if($t['overdue'])<svg class="w-3.5 h-3.5 inline mr-1 -mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>@endif
                                {{ $t['due'] }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <button @click="taskModalOpen = true" class="p-2 rounded-lg hover:bg-[var(--color-bg)] text-[var(--color-text-secondary)] hover:text-[#6366F1] transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="px-6 py-4 border-t border-[var(--color-border)] flex items-center justify-between transition-colors">
            <p class="text-sm text-[var(--color-text-secondary)]">Showing 1–7 of 156 tasks</p>
            <div class="flex gap-2">
                <button class="px-3 py-1.5 rounded-lg border border-[var(--color-border)] text-sm font-medium text-[var(--color-text-secondary)] hover:bg-[var(--color-hover)] disabled:opacity-40 transition-colors" disabled>Previous</button>
                <button class="px-3 py-1.5 rounded-lg bg-[#6366F1] text-white text-sm font-medium transition-colors">1</button>
                <button class="px-3 py-1.5 rounded-lg border border-[var(--color-border)] text-sm font-medium text-[var(--color-text-secondary)] hover:bg-[var(--color-hover)] transition-colors">Next</button>
            </div>
        </div>
    </div>

    <!-- ── Kanban Board View ── -->
    <div x-show="taskView === 'board'" class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4">
        @php
        $columns = [
            ['label' => 'To Do', 'color' => 'bg-[#F1F5F9] dark:bg-[var(--color-hover)]', 'dot' => 'bg-[var(--color-text-secondary)]', 'border' => 'border-[var(--color-border)]',
             'tasks' => [['t' => 'API integration', 'p' => 'Mobile App', 'a' => 'AB', 'pr' => 'Medium', 'due' => 'Mar 10'],
                         ['t' => 'Database schema design', 'p' => 'E-commerce', 'a' => 'JD', 'pr' => 'High', 'due' => 'Mar 12'],
                         ['t' => 'Write unit tests', 'p' => 'Mobile App', 'a' => 'MW', 'pr' => 'Low', 'due' => 'Mar 15']]],
            ['label' => 'In Progress', 'color' => 'bg-[#EEF2FF] dark:bg-[rgba(99,102,241,0.05)]', 'dot' => 'bg-[#6366F1]', 'border' => 'border-[var(--color-border)]',
             'tasks' => [['t' => 'Design homepage mockup', 'p' => 'Website Redesign', 'a' => 'SK', 'pr' => 'High', 'due' => 'Mar 8'],
                         ['t' => 'Implement header', 'p' => 'Website Redesign', 'a' => 'JD', 'pr' => 'High', 'due' => 'Mar 5']]],
            ['label' => 'Review', 'color' => 'bg-[#FEF3C7] dark:bg-[rgba(245,158,11,0.05)]', 'dot' => 'bg-[#F59E0B]', 'border' => 'border-[var(--color-border)]',
             'tasks' => [['t' => 'Final design review', 'p' => 'Website Redesign', 'a' => 'MW', 'pr' => 'High', 'due' => 'Mar 8'],
                         ['t' => 'Dashboard UI testing', 'p' => 'Dashboard UI', 'a' => 'AB', 'pr' => 'Medium', 'due' => 'Mar 9']]],
            ['label' => 'Completed', 'color' => 'bg-[#ECFDF5] dark:bg-[rgba(34,197,94,0.05)]', 'dot' => 'bg-[#22C55E]', 'border' => 'border-[var(--color-border)]',
             'tasks' => [['t' => 'Client presentation', 'p' => 'Brand Identity', 'a' => 'SK', 'pr' => 'Medium', 'due' => 'Feb 28'],
                         ['t' => 'Hero section mockup', 'p' => 'Website Redesign', 'a' => 'SK', 'pr' => 'Low', 'due' => 'Feb 25']]],
        ];
        @endphp
        @foreach($columns as $col)
        <div class="{{ $col['color'] }} rounded-xl border {{ $col['border'] }} overflow-hidden transition-colors">
            <div class="px-4 py-3 flex items-center justify-between border-b {{ $col['border'] }} transition-colors">
                <div class="flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full {{ $col['dot'] }}"></span>
                    <span class="font-semibold text-sm text-[var(--color-text)]">{{ $col['label'] }}</span>
                </div>
                <span class="text-xs font-medium text-[var(--color-text-secondary)] bg-[var(--color-bg)]/60 px-2 py-0.5 rounded-full">{{ count($col['tasks']) }}</span>
            </div>
            <div class="p-3 space-y-3">
                @foreach($col['tasks'] as $kt)
                <div @click="taskModalOpen = true" class="bg-[var(--color-card)] rounded-lg p-3.5 shadow-sm border border-[var(--color-border)] cursor-pointer hover:shadow-md hover:border-[#6366F1]/40 transition-all group">
                    <p class="text-sm font-medium text-[var(--color-text)] group-hover:text-[#6366F1] transition-colors">{{ $kt['t'] }}</p>
                    <p class="text-xs text-[var(--color-text-secondary)]">{{ $kt['p'] }}</p>
                    <div class="flex items-center justify-between mt-3">
                        <span class="text-xs px-2 py-0.5 rounded-full font-medium {{ $kt['pr'] === 'High' ? 'bg-[#FEF2F2] text-[#EF4444] dark:bg-[rgba(239,68,68,0.1)]' : ($kt['pr'] === 'Medium' ? 'bg-[#FEF3C7] text-[#D97706] dark:bg-[rgba(245,158,11,0.1)]' : 'bg-[var(--color-hover)] text-[var(--color-text-secondary)]') }}">{{ $kt['pr'] }}</span>
                        <div class="flex items-center gap-1.5">
                            <span class="text-xs text-[var(--color-text-secondary)]">{{ $kt['due'] }}</span>
                            <span class="w-6 h-6 rounded-full bg-[#6366F1] text-white text-xs flex items-center justify-center font-medium">{{ $kt['a'] }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
                <button @click="taskModalOpen = true" class="w-full py-2 rounded-lg border-2 border-dashed border-[var(--color-border)] text-[var(--color-text-muted)] hover:border-[#6366F1] hover:text-[#6366F1] text-sm transition-colors flex items-center justify-center gap-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    Add task
                </button>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Task Detail Slide-over Panel -->
<div x-show="taskModalOpen" x-cloak class="fixed inset-0 z-50">
    <div class="fixed inset-0 bg-black/50 backdrop-blur-sm" @click="taskModalOpen = false"></div>
    <div class="fixed right-0 top-0 h-full w-full max-w-lg bg-[var(--color-bg)] shadow-xl overflow-y-auto border-l border-[var(--color-border)] transition-colors" @click.stop
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="translate-x-full"
         x-transition:enter-end="translate-x-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="translate-x-0"
         x-transition:leave-end="translate-x-full">
        <div class="p-6">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-bold text-[var(--color-text)]">Task Details</h2>
                <button @click="taskModalOpen = false" class="p-2 rounded-lg hover:bg-[var(--color-hover)] text-[var(--color-text-secondary)] transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>

            <div class="space-y-5">
                <div>
                    <h3 class="text-lg font-semibold text-[var(--color-text)]">Design homepage mockup</h3>
                    <p class="text-sm text-[var(--color-text-secondary)] mt-1">Website Redesign · Acme Corp</p>
                </div>

                <div class="flex flex-wrap gap-2">
                    <span class="inline-flex px-2.5 py-1 rounded-full text-xs font-medium bg-[#EEF2FF] text-[#6366F1] dark:bg-[var(--color-active-bg)]">In Progress</span>
                    <span class="inline-flex px-2.5 py-1 rounded-full text-xs font-medium bg-[#FEF2F2] text-[#EF4444] dark:bg-[rgba(239,68,68,0.1)]">High Priority</span>
                    <span class="inline-flex px-2.5 py-1 rounded-full text-xs font-medium bg-[var(--color-hover)] text-[var(--color-text-secondary)]">Due Mar 8</span>
                </div>

                <div class="flex items-center gap-3 p-3 bg-[var(--color-card)] rounded-lg border border-[var(--color-border)] transition-colors">
                    <div class="w-10 h-10 rounded-full bg-[#6366F1] text-white flex items-center justify-center font-medium text-sm shrink-0">JD</div>
                    <div>
                        <p class="font-medium text-[var(--color-text)] text-sm">Assigned to John Doe</p>
                        <p class="text-xs text-[var(--color-text-secondary)]">Frontend Developer</p>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-[var(--color-text-secondary)] mb-1">Description</label>
                    <p class="text-sm text-[var(--color-text)] leading-relaxed">Create high-fidelity mockups for the homepage including hero section, features grid, and CTA. Must follow the brand guidelines provided.</p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-[var(--color-text-secondary)] mb-2">Subtasks <span class="text-[#6366F1]">(2/3)</span></label>
                    <div class="space-y-2">
                        <label class="flex items-center gap-2.5 cursor-pointer group">
                            <input type="checkbox" checked class="w-4 h-4 rounded border-[var(--color-border)] text-[#6366F1] accent-[#6366F1]">
                            <span class="text-sm text-[var(--color-text-secondary)] line-through">Hero section mockup</span>
                        </label>
                        <label class="flex items-center gap-2.5 cursor-pointer group">
                            <input type="checkbox" checked class="w-4 h-4 rounded border-[var(--color-border)] text-[#6366F1] accent-[#6366F1]">
                            <span class="text-sm text-[var(--color-text-secondary)] line-through">Features grid</span>
                        </label>
                        <label class="flex items-center gap-2.5 cursor-pointer group">
                            <input type="checkbox" class="w-4 h-4 rounded border-[var(--color-border)] text-[#6366F1] accent-[#6366F1]">
                            <span class="text-sm text-[var(--color-text)]">CTA section</span>
                        </label>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-[var(--color-text-secondary)] mb-2">Comments</label>
                    <div class="space-y-2 mb-2">
                        <div class="p-3 bg-[var(--color-card)] rounded-lg border border-[var(--color-border)] transition-colors">
                            <p class="text-sm text-[var(--color-text)]">Initial design approved. Proceed with development.</p>
                            <p class="text-xs text-[var(--color-text-secondary)] mt-1">John Doe · 2 hours ago</p>
                        </div>
                    </div>
                    <input type="text" placeholder="Add a comment..." class="w-full px-4 py-2.5 border border-[var(--color-border)] bg-[var(--color-card)] text-[var(--color-text)] rounded-lg text-sm focus:ring-2 focus:ring-[#6366F1] focus:border-transparent placeholder:text-[var(--color-text-muted)] transition-colors">
                </div>

                <div>
                    <label class="block text-sm font-medium text-[var(--color-text-secondary)] mb-2">Attachments</label>
                    <div class="flex gap-2 flex-wrap">
                        <div class="px-3 py-2 bg-[var(--color-card)] rounded-lg text-sm text-[var(--color-text-secondary)] border border-[var(--color-border)] flex items-center gap-1.5 transition-colors">
                            <svg class="w-4 h-4 text-[#EF4444]" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd"/></svg>
                            mockup-v1.pdf
                        </div>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-[var(--color-text-secondary)] mb-2">History</label>
                    <div class="space-y-1.5 text-xs text-[var(--color-text-secondary)]">
                        <p>Status changed to <strong class="text-[#6366F1]">In Progress</strong> · John Doe · 1 day ago</p>
                        <p>Task created · John Doe · 3 days ago</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
