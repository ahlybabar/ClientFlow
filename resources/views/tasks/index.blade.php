@extends('layouts.app')

@section('title', 'Tasks')

@section('content')
<div class="space-y-6" x-data="{ taskModalOpen: false }">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-[#0F172A]">Tasks</h1>
            <p class="mt-1 text-sm text-[#64748B]">Manage and track all your tasks</p>
        </div>
        <button class="inline-flex items-center gap-2 px-4 py-2 bg-[#4F46E5] text-white rounded-lg hover:bg-[#4338CA] font-medium text-sm">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Add Task
        </button>
    </div>

    <!-- Filters -->
    <div class="flex flex-wrap gap-2">
        <button class="px-4 py-2 rounded-lg bg-[#4F46E5] text-white text-sm font-medium">All Tasks</button>
        <button class="px-4 py-2 rounded-lg border border-[#E2E8F0] text-[#64748B] text-sm font-medium hover:bg-[#F8FAFC]">My Tasks</button>
        <button class="px-4 py-2 rounded-lg border border-[#E2E8F0] text-[#64748B] text-sm font-medium hover:bg-[#F8FAFC]">Overdue</button>
        <button class="px-4 py-2 rounded-lg border border-[#E2E8F0] text-[#64748B] text-sm font-medium hover:bg-[#F8FAFC]">Completed</button>
    </div>

    <div class="bg-white rounded-xl border border-[#E2E8F0] shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-[#F8FAFC] border-b border-[#E2E8F0]">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-[#64748B] uppercase">Task Name</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-[#64748B] uppercase">Project</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-[#64748B] uppercase">Assigned To</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-[#64748B] uppercase">Priority</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-[#64748B] uppercase">Status</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-[#64748B] uppercase">Due Date</th>
                        <th class="px-6 py-4 text-right text-xs font-semibold text-[#64748B] uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#E2E8F0]">
                    @foreach([
                        ['task' => 'Design homepage mockup', 'project' => 'Website Redesign', 'assignee' => 'SK', 'priority' => 'High', 'status' => 'In Progress', 'due' => 'Mar 8', 'overdue' => false],
                        ['task' => 'Implement header component', 'project' => 'Website Redesign', 'assignee' => 'JD', 'priority' => 'High', 'status' => 'In Progress', 'due' => 'Mar 5', 'overdue' => true],
                        ['task' => 'API integration', 'project' => 'Mobile App', 'assignee' => 'AB', 'priority' => 'Medium', 'status' => 'To Do', 'due' => 'Mar 10', 'overdue' => false],
                        ['task' => 'Final design review', 'project' => 'Website Redesign', 'assignee' => 'MW', 'priority' => 'High', 'status' => 'Review', 'due' => 'Mar 8', 'overdue' => false],
                        ['task' => 'Client presentation', 'project' => 'Brand Identity', 'assignee' => 'SK', 'priority' => 'Medium', 'status' => 'Completed', 'due' => 'Feb 28', 'overdue' => false],
                    ] as $t)
                    <tr class="hover:bg-[#F8FAFC] transition-colors">
                        <td class="px-6 py-4">
                            <button @click="taskModalOpen = true" class="font-medium text-[#0F172A] hover:text-[#4F46E5] text-left">{{ $t['task'] }}</button>
                        </td>
                        <td class="px-6 py-4 text-sm text-[#64748B]">{{ $t['project'] }}</td>
                        <td class="px-6 py-4">
                            <span class="w-8 h-8 rounded-full bg-[#4F46E5] text-white text-xs flex items-center justify-center font-medium inline-block">{{ $t['assignee'] }}</span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="text-xs px-2.5 py-1 rounded-full font-medium {{ $t['priority'] === 'High' ? 'bg-[#FEF2F2] text-[#EF4444]' : 'bg-[#FEF3C7] text-[#F59E0B]' }}">{{ $t['priority'] }}</span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="text-xs px-2.5 py-1 rounded-full font-medium {{ $t['status'] === 'Completed' ? 'bg-[#ECFDF5] text-[#22C55E]' : ($t['status'] === 'In Progress' ? 'bg-[#EEF2FF] text-[#4F46E5]' : 'bg-[#F1F5F9] text-[#64748B]') }}">{{ $t['status'] }}</span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="text-sm {{ $t['overdue'] ? 'text-[#EF4444] font-medium' : 'text-[#64748B]' }}">{{ $t['due'] }}</span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <button @click="taskModalOpen = true" class="p-2 rounded-lg hover:bg-[#F1F5F9] text-[#64748B]">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="px-6 py-4 border-t border-[#E2E8F0] flex items-center justify-between">
            <p class="text-sm text-[#64748B]">Showing 1-5 of 156 tasks</p>
            <div class="flex gap-2">
                <button class="px-3 py-1.5 rounded-lg border border-[#E2E8F0] text-sm font-medium text-[#64748B] hover:bg-[#F8FAFC]" disabled>Previous</button>
                <button class="px-3 py-1.5 rounded-lg bg-[#4F46E5] text-white text-sm font-medium">1</button>
                <button class="px-3 py-1.5 rounded-lg border border-[#E2E8F0] text-sm font-medium text-[#64748B] hover:bg-[#F8FAFC]">Next</button>
            </div>
        </div>
    </div>
</div>

<!-- Task Detail Modal: assignee, priority, due date, subtasks, comments, attachments, history -->
<div x-show="taskModalOpen" x-cloak class="fixed inset-0 z-50">
    <div class="fixed inset-0 bg-black/50" @click="taskModalOpen = false"></div>
    <div class="fixed right-0 top-0 h-full w-full max-w-lg bg-white shadow-xl overflow-y-auto border-l border-[#E2E8F0]" @click.stop>
        <div class="p-6">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-bold text-[#0F172A]">Task Details</h2>
                <button @click="taskModalOpen = false" class="p-2 rounded-lg hover:bg-[#F1F5F9] text-[#64748B]">✕</button>
            </div>
            <div class="flex items-center gap-3 mb-6 pb-4 border-b border-[#E2E8F0]">
                <div class="w-10 h-10 rounded-full bg-[#4F46E5] text-white flex items-center justify-center font-medium text-sm">JD</div>
                <div>
                    <p class="font-medium text-[#0F172A]">Assigned to John Doe</p>
                    <p class="text-xs text-[#64748B]">Due Mar 8 · High priority</p>
                </div>
                <span class="ml-auto px-2.5 py-1 rounded-full text-xs font-medium bg-[#EEF2FF] text-[#4F46E5]">In Progress</span>
            </div>
            <div class="space-y-6">
                <div>
                    <label class="block text-sm font-medium text-[#64748B] mb-1">Description</label>
                    <p class="text-[#0F172A]">Create high-fidelity mockups for the homepage including hero section, features grid, and CTA.</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-[#64748B] mb-2">Subtasks</label>
                    <div class="space-y-2">
                        <label class="flex items-center gap-2 cursor-pointer"><input type="checkbox" checked class="rounded border-[#E2E8F0] text-[#4F46E5]"><span class="text-sm text-[#64748B] line-through">Hero section mockup</span></label>
                        <label class="flex items-center gap-2 cursor-pointer"><input type="checkbox" checked class="rounded border-[#E2E8F0] text-[#4F46E5]"><span class="text-sm text-[#64748B] line-through">Features grid</span></label>
                        <label class="flex items-center gap-2 cursor-pointer"><input type="checkbox" class="rounded border-[#E2E8F0] text-[#4F46E5]"><span class="text-sm text-[#0F172A]">CTA section</span></label>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-[#64748B] mb-2">Comment thread</label>
                    <div class="space-y-2">
                        <div class="p-3 bg-[#F8FAFC] rounded-lg border border-[#E2E8F0]">
                            <p class="text-sm text-[#0F172A]">Initial design approved. Proceed with development.</p>
                            <p class="text-xs text-[#64748B] mt-1">John Doe · 2 hours ago</p>
                        </div>
                    </div>
                    <input type="text" placeholder="Add a comment..." class="mt-2 w-full px-4 py-2 border border-[#E2E8F0] rounded-lg text-sm focus:ring-2 focus:ring-[#4F46E5] focus:border-transparent">
                </div>
                <div>
                    <label class="block text-sm font-medium text-[#64748B] mb-2">Attachments</label>
                    <div class="flex gap-2 flex-wrap">
                        <div class="px-3 py-2 bg-[#F8FAFC] rounded-lg text-sm text-[#64748B] border border-[#E2E8F0]">mockup-v1.pdf</div>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-[#64748B] mb-2">Task history</label>
                    <div class="space-y-2 text-xs text-[#64748B]">
                        <p>Status changed to In Progress · John Doe · 1 day ago</p>
                        <p>Task created · John Doe · 3 days ago</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
