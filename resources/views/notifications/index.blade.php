@extends('layouts.app')

@section('title', 'Notifications')

@section('breadcrumbs')
<nav class="flex items-center gap-2 text-sm text-[#6B7280]">
 <a href="{{ route('dashboard') }}" class="hover:text-[#6366F1]">Dashboard</a>
 <span>/</span>
 <span class="text-[#111827] font-medium">Notifications</span>
</nav>
@endsection

@section('content')
<div class="max-w-2xl mx-auto space-y-6">
 <div class="flex items-center justify-between">
 <h1 class="text-2xl font-bold text-[#111827]">Notifications</h1>
 <button class="text-sm font-medium text-[#6366F1] hover:underline">Mark all as read</button>
 </div>

 <div class="bg-white rounded-xl border border-[#E5E7EB] overflow-hidden">
 @foreach([
 ['type' => 'task', 'title' => 'Task assigned to you', 'body' => 'Design homepage mockup was assigned to you by John Doe.', 'time' => '2 hours ago', 'unread' => true],
 ['type' => 'invoice', 'title' => 'Invoice paid', 'body' => 'INV-0042 for $2,500 was paid by Acme Corp.', 'time' => '1 day ago', 'unread' => true],
 ['type' => 'project', 'title' => 'Project update', 'body' => 'Website Redesign is now 75% complete.', 'time' => '2 days ago', 'unread' => false],
 ['type' => 'task', 'title' => 'Overdue task', 'body' => 'Implement header component is overdue by 2 days.', 'time' => '3 days ago', 'unread' => false],
 ] as $n)
 <a href="#" class="flex gap-4 px-6 py-4 hover:bg-[#F8FAFC] transition-colors {{ $n['unread'] ? 'bg-[#EEF2FF]/50' : '' }} border-b border-[#E5E7EB] last:border-0">
 <div class="w-10 h-10 rounded-full shrink-0 flex items-center justify-center {{ $n['type'] === 'task' ? 'bg-[#EEF2FF] text-[#6366F1]' : ($n['type'] === 'invoice' ? 'bg-[#ECFDF5] text-[#22C55E]' : 'bg-[#FEF3C7] text-[#F59E0B]') }}">
 @if($n['type'] === 'task')<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg>
 @elseif($n['type'] === 'invoice')<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
 @else<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
 @endif
 </div>
 <div class="flex-1 min-w-0">
 <p class="font-medium text-[#111827]">{{ $n['title'] }}</p>
 <p class="text-sm text-[#6B7280] mt-0.5">{{ $n['body'] }}</p>
 <p class="text-xs text-[#6B7280] mt-1">{{ $n['time'] }}</p>
 </div>
 @if($n['unread'])<span class="w-2 h-2 rounded-full bg-[#6366F1] shrink-0 mt-2"></span>@endif
 </a>
 @endforeach
 </div>
</div>
@endsection
