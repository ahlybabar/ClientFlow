@extends('layouts.guest')

@section('title', 'Login')

@section('content')
<div class="min-h-screen flex">
    <!-- Left - Illustration -->
    <div class="hidden lg:flex lg:w-1/2 bg-[#4F46E5] items-center justify-center p-12">
        <div class="max-w-md text-white">
            <h1 class="text-3xl font-bold mb-4">ClientFlow Pro</h1>
            <p class="text-indigo-100 text-lg mb-8">The all-in-one platform for agencies, freelancers, and IT service companies to manage clients, projects, tasks, and billing.</p>
            <div class="space-y-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-lg bg-white/20 flex items-center justify-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    </div>
                    <span>Client & Project Management</span>
                </div>
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-lg bg-white/20 flex items-center justify-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    </div>
                    <span>Task Tracking & Kanban</span>
                </div>
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-lg bg-white/20 flex items-center justify-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    </div>
                    <span>Invoicing & Payments</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Right - Login Form -->
    <div class="flex-1 flex items-center justify-center p-8">
        <div class="w-full max-w-md">
            <div class="lg:hidden mb-8 text-center">
                <div class="inline-flex w-12 h-12 rounded-xl bg-[#4F46E5] items-center justify-center text-white font-bold text-xl mb-2">C</div>
                <h1 class="text-2xl font-bold text-[#0F172A]">ClientFlow Pro</h1>
            </div>
            <div class="bg-white rounded-xl p-8 border border-[#E2E8F0] shadow-sm">
                <h2 class="text-2xl font-bold text-[#0F172A]">Welcome back</h2>
                <p class="mt-2 text-[#64748B]">Sign in to your account</p>

                <form class="mt-8 space-y-6" action="{{ route('dashboard') }}" method="GET">
                    <div>
                        <label for="email" class="block text-sm font-medium text-[#0F172A] mb-2">Email</label>
                        <input id="email" name="email" type="email" required
                               class="w-full px-4 py-3 border border-[#E2E8F0] rounded-lg text-[#0F172A] placeholder-[#94A3B8] focus:outline-none focus:ring-2 focus:ring-[#4F46E5]/20 focus:border-[#4F46E5]"
                               placeholder="you@company.com">
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-[#0F172A] mb-2">Password</label>
                        <input id="password" name="password" type="password" required
                               class="w-full px-4 py-3 border border-[#E2E8F0] rounded-lg text-[#0F172A] placeholder-[#94A3B8] focus:outline-none focus:ring-2 focus:ring-[#4F46E5]/20 focus:border-[#4F46E5]"
                               placeholder="••••••••">
                    </div>
                    <div class="flex items-center justify-between">
                        <label class="flex items-center cursor-pointer">
                            <input type="checkbox" class="rounded border-[#E2E8F0] text-[#4F46E5] focus:ring-[#4F46E5]">
                            <span class="ml-2 text-sm text-[#64748B]">Remember me</span>
                        </label>
                        <a href="#" class="text-sm font-medium text-[#4F46E5] hover:underline">Forgot password?</a>
                    </div>
                    <button type="submit" class="w-full py-3 px-4 bg-[#4F46E5] text-white rounded-lg font-medium hover:bg-[#4338CA] transition-colors">
                        Sign in
                    </button>
                </form>
            </div>
            <p class="mt-6 text-center text-sm text-[#64748B]">
                Don't have an account? <a href="#" class="font-medium text-[#4F46E5] hover:underline">Contact sales</a>
            </p>
        </div>
    </div>
</div>
@endsection
