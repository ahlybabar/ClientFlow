@extends('layouts.app')

@section('title', 'Settings')

@section('breadcrumbs')
<nav class="flex items-center gap-2 text-sm text-[#6B7280]">
 <a href="{{ route('dashboard') }}" class="hover:text-[#6366F1] ">Dashboard</a>
 <span>/</span>
 <span class="text-[#111827] font-medium">Settings</span>
</nav>
@endsection

@section('content')
<div x-init="$nextTick(() => { settingsModalOpen = true })" class="flex flex-col items-center justify-center min-h-[60vh]">
 <div class="w-16 h-16 bg-[#EEF2FF] rounded-full flex items-center justify-center mb-6">
 <svg class="w-8 h-8 text-[#6366F1] " fill="none" stroke="currentColor" viewBox="0 0 24 24">
 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
 </svg>
 </div>
 <h1 class="text-2xl font-bold text-[#111827] mb-2">Settings</h1>
 <p class="text-[#6B7280] mb-8 text-center max-w-md">Settings have been moved to the new unified configuration modal. You can access it from anywhere by clicking the settings icon or the button below.</p>
 <button @click.prevent="settingsModalOpen = true" class="px-6 py-2.5 bg-[#6366F1] text-white rounded-lg font-medium hover:bg-[#4F7CFF] transition-colors shadow-sm">
 Open Settings Modal
 </button>
</div>
@endsection
