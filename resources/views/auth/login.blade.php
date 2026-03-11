@extends('layouts.guest')

@section('title', 'Login')

@section('content')
<div class="min-h-screen flex">
 <!-- Left - Illustration -->
 <div class="hidden lg:flex lg:w-1/2 bg-[#6366F1] items-center justify-center p-12">
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
 <div class="inline-flex w-12 h-12 rounded-xl bg-[#6366F1] items-center justify-center text-white font-bold text-xl mb-2">C</div>
 <h1 class="text-2xl font-bold text-[#111827]">ClientFlow Pro</h1>
 </div>
 <div class="bg-white rounded-xl p-8 border border-[#E5E7EB] shadow-sm">
 <h2 class="text-2xl font-bold text-[#111827]">Welcome back</h2>
 <p class="mt-2 text-[#6B7280]">Sign in to your account</p>

 <form class="mt-8 space-y-6" action="{{ route('dashboard') }}" method="GET">
 <div>
 <label for="email" class="block text-sm font-medium text-[#111827] mb-2">Email</label>
 <input id="email" name="email" type="email" required
 class="w-full px-4 py-3 border border-[#E5E7EB] rounded-lg text-[#111827] placeholder-[#94A3B8] focus:outline-none focus:ring-2 focus:ring-[#6366F1]/20 focus:border-[#6366F1]"
 placeholder="you@company.com">
 </div>
 <div>
 <label for="password" class="block text-sm font-medium text-[#111827] mb-2">Password</label>
 <input id="password" name="password" type="password" required
 class="w-full px-4 py-3 border border-[#E5E7EB] rounded-lg text-[#111827] placeholder-[#94A3B8] focus:outline-none focus:ring-2 focus:ring-[#6366F1]/20 focus:border-[#6366F1]"
 placeholder="••••••••">
 </div>
 <div class="flex items-center justify-between">
 <label class="flex items-center cursor-pointer">
 <input type="checkbox" class="rounded border-[#E5E7EB] text-[#6366F1] focus:ring-[#6366F1]">
 <span class="ml-2 text-sm text-[#6B7280]">Remember me</span>
 </label>
 <a href="#" class="text-sm font-medium text-[#6366F1] hover:underline">Forgot password?</a>
 </div>
 <button type="submit" class="w-full py-3 px-4 bg-[#6366F1] text-white rounded-lg font-medium hover:bg-[#4F7CFF] transition-colors">
 Sign in
 </button>
 </form>
 </div>
 <p class="mt-6 text-center text-sm text-[#6B7280]">
 Don't have an account? <a href="#" class="font-medium text-[#6366F1] hover:underline">Contact sales</a>
 </p>
 </div>
 </div>
</div>
@endsection
