@extends('layouts.app')

@section('title', 'Workflow Automation')

@section('breadcrumbs')
<nav class="flex items-center gap-2 text-sm text-[#64748B]">
    <a href="{{ route('dashboard') }}" class="hover:text-[#4F46E5]">Dashboard</a>
    <span>/</span>
    <span class="text-[#0F172A] font-medium">Automation</span>
</nav>
@endsection

@section('content')
<div class="space-y-6" x-data="{
    createRuleOpen: false,
    selectedTrigger: '',
    selectedCondition: '',
    selectedAction: '',
    rules: [
        { id: 1, name: 'Notify on overdue tasks', trigger: 'Task overdue > 3 days', condition: 'Priority is High or Critical', action: 'Notify project manager', enabled: true, runs: 24, lastRun: '2 hours ago', icon: '⚡' },
        { id: 2, name: 'Invoice reminder', trigger: 'Invoice unpaid after 7 days', condition: 'Amount > $500', action: 'Send reminder email to client', enabled: true, runs: 12, lastRun: '1 day ago', icon: '💰' },
        { id: 3, name: 'Auto-generate invoice', trigger: 'Project completed', condition: 'Has billable hours', action: 'Generate final invoice', enabled: true, runs: 8, lastRun: '3 days ago', icon: '📄' },
        { id: 4, name: 'Project health alert', trigger: 'Project health = Critical', condition: 'Always', action: 'Notify team lead + Slack alert', enabled: true, runs: 3, lastRun: '5 days ago', icon: '🔴' },
        { id: 5, name: 'Welcome new client', trigger: 'New client created', condition: 'Always', action: 'Send welcome email + create onboarding project', enabled: false, runs: 15, lastRun: '1 week ago', icon: '👋' },
        { id: 6, name: 'Task completion progress', trigger: 'Task status = Completed', condition: 'Part of active project', action: 'Update project progress +10%', enabled: true, runs: 56, lastRun: '4 hours ago', icon: '✅' },
    ]
}">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-[#0F172A]">Workflow Automation</h1>
            <p class="mt-1 text-sm text-[#64748B]">Automate repetitive tasks with trigger-based rules</p>
        </div>
        <button @click="createRuleOpen = true" class="inline-flex items-center gap-2 px-4 py-2 bg-[#4F46E5] text-white rounded-lg hover:bg-[#4338CA] font-medium text-sm transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Create Rule
        </button>
    </div>

    {{-- Quick Stats --}}
    <div class="grid grid-cols-1 sm:grid-cols-4 gap-4">
        <div class="bg-white rounded-xl p-5 border border-[#E2E8F0] shadow-sm">
            <p class="text-sm text-[#64748B]">Total Rules</p>
            <p class="text-2xl font-bold text-[#0F172A] mt-1">6</p>
        </div>
        <div class="bg-white rounded-xl p-5 border border-[#E2E8F0] shadow-sm">
            <p class="text-sm text-[#64748B]">Active Rules</p>
            <p class="text-2xl font-bold text-[#22C55E] mt-1">5</p>
        </div>
        <div class="bg-white rounded-xl p-5 border border-[#E2E8F0] shadow-sm">
            <p class="text-sm text-[#64748B]">Total Runs</p>
            <p class="text-2xl font-bold text-[#4F46E5] mt-1">118</p>
        </div>
        <div class="bg-white rounded-xl p-5 border border-[#E2E8F0] shadow-sm">
            <p class="text-sm text-[#64748B]">Time Saved</p>
            <p class="text-2xl font-bold text-[#F59E0B] mt-1">~32 hrs</p>
        </div>
    </div>

    {{-- Rules List --}}
    <div class="space-y-4">
        <template x-for="rule in rules" :key="rule.id">
            <div class="bg-white rounded-xl p-5 border border-[#E2E8F0] shadow-sm hover:shadow-md transition-all">
                <div class="flex items-start justify-between gap-4">
                    <div class="flex items-start gap-4 flex-1 min-w-0">
                        <div class="w-12 h-12 rounded-xl bg-[#EEF2FF] flex items-center justify-center text-xl shrink-0" x-text="rule.icon"></div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center gap-2 mb-1">
                                <h3 class="font-semibold text-[#0F172A] text-[15px]" x-text="rule.name"></h3>
                                <span class="text-[11px] font-medium px-2 py-0.5 rounded-full"
                                      :class="rule.enabled ? 'bg-[#ECFDF5] text-[#22C55E]' : 'bg-[#F1F5F9] text-[#94A3B8]'"
                                      x-text="rule.enabled ? 'Active' : 'Paused'"></span>
                            </div>
                            {{-- Trigger → Condition → Action flow --}}
                            <div class="flex flex-wrap items-center gap-2 mt-3">
                                <div class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-[#FEF3C7] border border-[#F59E0B]/20 text-xs font-medium text-[#92400E]">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                                    <span x-text="'When: ' + rule.trigger"></span>
                                </div>
                                <svg class="w-4 h-4 text-[#94A3B8] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                                <div class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-[#EEF2FF] border border-[#4F46E5]/20 text-xs font-medium text-[#3730A3]">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/></svg>
                                    <span x-text="'If: ' + rule.condition"></span>
                                </div>
                                <svg class="w-4 h-4 text-[#94A3B8] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                                <div class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-[#ECFDF5] border border-[#22C55E]/20 text-xs font-medium text-[#166534]">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    <span x-text="'Then: ' + rule.action"></span>
                                </div>
                            </div>
                            <div class="flex items-center gap-4 mt-3 text-xs text-[#94A3B8]">
                                <span x-text="rule.runs + ' runs'"></span>
                                <span>·</span>
                                <span x-text="'Last run: ' + rule.lastRun"></span>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center gap-2 shrink-0">
                        {{-- Toggle --}}
                        <button @click="rule.enabled = !rule.enabled"
                                class="relative w-11 h-6 rounded-full transition-colors"
                                :class="rule.enabled ? 'bg-[#4F46E5]' : 'bg-[#E2E8F0]'">
                            <span class="absolute top-0.5 left-0.5 w-5 h-5 bg-white rounded-full shadow-sm transition-transform"
                                  :class="rule.enabled ? 'translate-x-5' : 'translate-x-0'"></span>
                        </button>
                        <button class="p-2 rounded-lg hover:bg-[#F1F5F9] text-[#94A3B8] hover:text-[#64748B] transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/></svg>
                        </button>
                    </div>
                </div>
            </div>
        </template>
    </div>

    {{-- Recent Automation Activity --}}
    <div class="bg-white rounded-xl p-6 border border-[#E2E8F0] shadow-sm">
        <h2 class="text-lg font-semibold text-[#0F172A] mb-4">Recent Activity</h2>
        <div class="space-y-3">
            @foreach([
                ['rule' => 'Task completion progress', 'detail' => 'Project "Website Redesign" progress updated to 75%', 'time' => '4 hours ago', 'status' => 'success'],
                ['rule' => 'Notify on overdue tasks', 'detail' => 'Notification sent to John Doe for "API integration"', 'time' => '2 hours ago', 'status' => 'success'],
                ['rule' => 'Invoice reminder', 'detail' => 'Reminder email sent to Global Solutions for INV-0039', 'time' => '1 day ago', 'status' => 'success'],
                ['rule' => 'Auto-generate invoice', 'detail' => 'Invoice INV-0043 generated for Brand Identity project', 'time' => '3 days ago', 'status' => 'success'],
                ['rule' => 'Project health alert', 'detail' => 'Critical alert for E-commerce Platform sent to Slack', 'time' => '5 days ago', 'status' => 'warning'],
            ] as $log)
            <div class="flex items-start gap-3 py-3 border-b border-[#F1F5F9] last:border-0">
                <div class="w-8 h-8 rounded-full flex items-center justify-center shrink-0 {{ $log['status'] === 'success' ? 'bg-[#ECFDF5] text-[#22C55E]' : 'bg-[#FEF3C7] text-[#F59E0B]' }}">
                    @if($log['status'] === 'success')
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    @else
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01"/></svg>
                    @endif
                </div>
                <div class="min-w-0">
                    <p class="text-sm font-medium text-[#0F172A]">{{ $log['rule'] }}</p>
                    <p class="text-[13px] text-[#64748B]">{{ $log['detail'] }}</p>
                    <p class="text-xs text-[#94A3B8] mt-0.5">{{ $log['time'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    {{-- Create Rule Modal --}}
    <template x-teleport="body">
        <div x-show="createRuleOpen" x-cloak x-transition class="fixed inset-0 z-[100] flex items-center justify-center p-4 bg-black/50 backdrop-blur-sm" @click.self="createRuleOpen = false">
            <div class="w-full max-w-lg bg-white rounded-2xl shadow-2xl border border-[#E2E8F0] overflow-hidden" @click.stop>
                <div class="flex items-center justify-between p-5 border-b border-[#E2E8F0]">
                    <h2 class="text-lg font-semibold text-[#0F172A]">Create Automation Rule</h2>
                    <button @click="createRuleOpen = false" class="p-1.5 rounded-lg hover:bg-[#F1F5F9] text-[#94A3B8]">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>
                <div class="p-5 space-y-5">
                    <div>
                        <label class="block text-sm font-medium text-[#0F172A] mb-1.5">Rule Name</label>
                        <input type="text" placeholder="e.g. Notify on overdue tasks" class="w-full px-4 py-2.5 border border-[#E2E8F0] rounded-lg text-sm focus:ring-2 focus:ring-[#4F46E5] focus:border-transparent placeholder:text-[#94A3B8]">
                    </div>
                    {{-- Trigger --}}
                    <div>
                        <label class="block text-sm font-medium text-[#0F172A] mb-1.5 flex items-center gap-2">
                            <span class="w-6 h-6 rounded-md bg-[#FEF3C7] text-[#F59E0B] flex items-center justify-center text-xs">⚡</span>
                            When (Trigger)
                        </label>
                        <select x-model="selectedTrigger" class="w-full px-4 py-2.5 border border-[#E2E8F0] rounded-lg text-sm focus:ring-2 focus:ring-[#4F46E5] focus:border-transparent text-[#0F172A]">
                            <option value="">Select a trigger...</option>
                            <option value="task_overdue">Task becomes overdue</option>
                            <option value="task_completed">Task status = Completed</option>
                            <option value="invoice_unpaid">Invoice unpaid after X days</option>
                            <option value="project_completed">Project completed</option>
                            <option value="project_critical">Project health = Critical</option>
                            <option value="client_created">New client created</option>
                            <option value="payment_received">Payment received</option>
                        </select>
                    </div>
                    {{-- Condition --}}
                    <div>
                        <label class="block text-sm font-medium text-[#0F172A] mb-1.5 flex items-center gap-2">
                            <span class="w-6 h-6 rounded-md bg-[#EEF2FF] text-[#4F46E5] flex items-center justify-center text-xs">⚙️</span>
                            If (Condition)
                        </label>
                        <select x-model="selectedCondition" class="w-full px-4 py-2.5 border border-[#E2E8F0] rounded-lg text-sm focus:ring-2 focus:ring-[#4F46E5] focus:border-transparent text-[#0F172A]">
                            <option value="">Select a condition...</option>
                            <option value="always">Always (no condition)</option>
                            <option value="priority_high">Priority is High or Critical</option>
                            <option value="amount_500">Amount > $500</option>
                            <option value="billable">Has billable hours</option>
                            <option value="active_project">Part of active project</option>
                        </select>
                    </div>
                    {{-- Action --}}
                    <div>
                        <label class="block text-sm font-medium text-[#0F172A] mb-1.5 flex items-center gap-2">
                            <span class="w-6 h-6 rounded-md bg-[#ECFDF5] text-[#22C55E] flex items-center justify-center text-xs">✓</span>
                            Then (Action)
                        </label>
                        <select x-model="selectedAction" class="w-full px-4 py-2.5 border border-[#E2E8F0] rounded-lg text-sm focus:ring-2 focus:ring-[#4F46E5] focus:border-transparent text-[#0F172A]">
                            <option value="">Select an action...</option>
                            <option value="notify_manager">Notify project manager</option>
                            <option value="send_email">Send email notification</option>
                            <option value="generate_invoice">Generate invoice</option>
                            <option value="slack_alert">Send Slack alert</option>
                            <option value="update_progress">Update project progress</option>
                            <option value="create_task">Create follow-up task</option>
                        </select>
                    </div>
                </div>
                <div class="flex items-center justify-end gap-3 p-5 border-t border-[#E2E8F0] bg-[#F8FAFC]">
                    <button @click="createRuleOpen = false" class="px-4 py-2 border border-[#E2E8F0] rounded-lg text-sm font-medium text-[#64748B] hover:bg-white transition-colors">Cancel</button>
                    <button @click="createRuleOpen = false; window.toast?.('Automation rule created', 'success')" class="px-4 py-2 bg-[#4F46E5] text-white rounded-lg text-sm font-medium hover:bg-[#4338CA] transition-colors">Create Rule</button>
                </div>
            </div>
        </div>
    </template>
</div>
@endsection
