@extends('layouts.app')

@section('title', 'Settings')

@section('breadcrumbs')
<nav class="flex items-center gap-2 text-sm text-[#64748B]">
    <a href="{{ route('dashboard') }}" class="hover:text-[#4F46E5]">Dashboard</a>
    <span>/</span>
    <span class="text-[#0F172A] font-medium">Settings</span>
</nav>
@endsection

@section('content')
<div class="space-y-8 max-w-3xl">
    <div>
        <h1 class="text-2xl font-bold text-[#0F172A]">Settings</h1>
        <p class="mt-1 text-sm text-[#64748B]">Manage your account, billing, and security</p>
    </div>

    <div class="space-y-6" x-data="{ settingsTab: 'general' }">
        <div class="flex gap-2 flex-wrap border-b border-[#E2E8F0] pb-4">
            @foreach(['general' => 'General', 'users' => 'User Management', 'billing' => 'Billing', 'notifications' => 'Notifications', 'security' => 'Security'] as $key => $label)
            <button @click="settingsTab = '{{ $key }}'" :class="settingsTab === '{{ $key }}' ? 'bg-[#4F46E5] text-white' : 'bg-[#F1F5F9] text-[#64748B] hover:bg-[#E2E8F0]'"
                    class="px-4 py-2 rounded-lg text-sm font-medium transition-colors">{{ $label }}</button>
            @endforeach
        </div>

        {{-- General --}}
        <div x-show="settingsTab === 'general'" class="space-y-6">
            <div class="bg-white rounded-xl p-6 border border-[#E2E8F0] shadow-sm">
                <h2 class="text-lg font-semibold text-[#0F172A] mb-4">Profile</h2>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-[#64748B] mb-1">Full Name</label>
                        <input type="text" value="John Doe" class="w-full px-4 py-2 border border-[#E2E8F0] rounded-lg focus:ring-2 focus:ring-[#4F46E5] focus:border-transparent">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-[#64748B] mb-1">Email</label>
                        <input type="email" value="john@clientflow.com" class="w-full px-4 py-2 border border-[#E2E8F0] rounded-lg focus:ring-2 focus:ring-[#4F46E5] focus:border-transparent">
                    </div>
                    <button onclick="window.toast?.('Saved')" class="px-4 py-2 bg-[#4F46E5] text-white rounded-lg text-sm font-medium hover:opacity-90">Save Changes</button>
                </div>
            </div>
            <div class="bg-white rounded-xl p-6 border border-[#E2E8F0] shadow-sm">
                <h2 class="text-lg font-semibold text-[#0F172A] mb-4">Company</h2>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-[#64748B] mb-1">Company Name</label>
                        <input type="text" value="ClientFlow Pro" class="w-full px-4 py-2 border border-[#E2E8F0] rounded-lg focus:ring-2 focus:ring-[#4F46E5] focus:border-transparent">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-[#64748B] mb-1">Invoice Prefix</label>
                        <input type="text" value="INV-" class="w-full px-4 py-2 border border-[#E2E8F0] rounded-lg focus:ring-2 focus:ring-[#4F46E5] focus:border-transparent">
                    </div>
                </div>
            </div>
        </div>

        {{-- User Management --}}
        <div x-show="settingsTab === 'users'" class="bg-white rounded-xl p-6 border border-[#E2E8F0]">
            <p class="text-[#64748B]">Manage team members, roles, and permissions. <a href="{{ route('team.index') }}" class="text-[#4F46E5] hover:underline">Go to Team →</a></p>
        </div>

        {{-- Billing --}}
        <div x-show="settingsTab === 'billing'" class="bg-white rounded-xl p-6 border border-[#E2E8F0]">
            <h2 class="text-lg font-semibold text-[#0F172A] mb-4">Billing Settings</h2>
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-[#64748B] mb-1">Default payment terms (days)</label>
                    <input type="number" value="30" class="w-full px-4 py-2 border border-[#E2E8F0] rounded-lg focus:ring-2 focus:ring-[#4F46E5] focus:border-transparent">
                </div>
                <div>
                    <label class="block text-sm font-medium text-[#64748B] mb-1">Tax rate (%)</label>
                    <input type="number" value="0" step="0.01" class="w-full px-4 py-2 border border-[#E2E8F0] rounded-lg focus:ring-2 focus:ring-[#4F46E5] focus:border-transparent">
                </div>
            </div>
        </div>

        {{-- Notifications --}}
        <div x-show="settingsTab === 'notifications'" class="bg-white rounded-xl p-6 border border-[#E2E8F0]">
            <h2 class="text-lg font-semibold text-[#0F172A] mb-4">Notification Preferences</h2>
            <div class="space-y-4">
                <label class="flex items-center justify-between cursor-pointer py-2 border-b border-[#E2E8F0]">
                    <span class="text-[#0F172A]">Email notifications</span>
                    <input type="checkbox" checked class="rounded border-[#E2E8F0] text-[#4F46E5] focus:ring-[#4F46E5]">
                </label>
                <label class="flex items-center justify-between cursor-pointer py-2 border-b border-[#E2E8F0]">
                    <span class="text-[#0F172A]">Task reminders</span>
                    <input type="checkbox" checked class="rounded border-[#E2E8F0] text-[#4F46E5] focus:ring-[#4F46E5]">
                </label>
                <label class="flex items-center justify-between cursor-pointer py-2 border-b border-[#E2E8F0]">
                    <span class="text-[#0F172A]">Invoice due reminders</span>
                    <input type="checkbox" checked class="rounded border-[#E2E8F0] text-[#4F46E5] focus:ring-[#4F46E5]">
                </label>
                <label class="flex items-center justify-between cursor-pointer py-2">
                    <span class="text-[#0F172A]">Project updates</span>
                    <input type="checkbox" checked class="rounded border-[#E2E8F0] text-[#4F46E5] focus:ring-[#4F46E5]">
                </label>
            </div>
        </div>

        {{-- Security --}}
        <div x-show="settingsTab === 'security'" class="space-y-6">
            <div class="bg-white rounded-xl p-6 border border-[#E2E8F0] shadow-sm">
                <h2 class="text-lg font-semibold text-[#0F172A] mb-4">Change Password</h2>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-[#64748B] mb-1">Current password</label>
                        <input type="password" class="w-full px-4 py-2 border border-[#E2E8F0] rounded-lg focus:ring-2 focus:ring-[#4F46E5] focus:border-transparent" placeholder="••••••••">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-[#64748B] mb-1">New password</label>
                        <input type="password" class="w-full px-4 py-2 border border-[#E2E8F0] rounded-lg focus:ring-2 focus:ring-[#4F46E5] focus:border-transparent" placeholder="••••••••">
                    </div>
                    <button onclick="window.toast?.('Password updated')" class="px-4 py-2 bg-[#4F46E5] text-white rounded-lg text-sm font-medium hover:opacity-90">Update Password</button>
                </div>
            </div>
            <div class="bg-white rounded-xl p-6 border border-[#E2E8F0] shadow-sm">
                <h2 class="text-lg font-semibold text-[#0F172A] mb-4">Session Management</h2>
                <p class="text-sm text-[#64748B] mb-4">Active sessions on your account.</p>
                <div class="flex items-center justify-between py-3 border-b border-[#E2E8F0]">
                    <div>
                        <p class="font-medium text-[#0F172A]">Windows · Chrome</p>
                        <p class="text-xs text-[#64748B]">Current session · Last active now</p>
                    </div>
                    <span class="text-xs px-2 py-1 rounded bg-[#ECFDF5] text-[#22C55E]">Current</span>
                </div>
                <button onclick="window.toast?.('Other sessions revoked')" class="mt-4 text-sm font-medium text-[#EF4444] hover:underline">Revoke all other sessions</button>
            </div>
            <div class="bg-white rounded-xl p-6 border border-[#E2E8F0] shadow-sm">
                <h2 class="text-lg font-semibold text-[#0F172A] mb-4">Two-Factor Authentication</h2>
                <p class="text-sm text-[#64748B] mb-4">Add an extra layer of security to your account.</p>
                <label class="flex items-center justify-between cursor-pointer py-2">
                    <span class="text-[#0F172A]">Enable 2FA</span>
                    <input type="checkbox" class="rounded border-[#E2E8F0] text-[#4F46E5] focus:ring-[#4F46E5]">
                </label>
            </div>
        </div>
    </div>
</div>
@endsection
