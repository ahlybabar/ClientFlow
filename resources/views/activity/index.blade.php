@extends('layouts.app')

@section('title', 'Activity')

@section('breadcrumbs')
<nav class="flex items-center gap-2 text-sm text-[#6B7280]">
 <a href="{{ route('dashboard') }}" class="hover:text-[#6366F1]">Dashboard</a>
 <span>/</span>
 <span class="text-[#111827] font-medium">Activity</span>
</nav>
@endsection

@section('content')
<div class="max-w-3xl mx-auto space-y-6">
 <h1 class="text-2xl font-bold text-[#111827]">Activity Timeline</h1>

 <div class="space-y-0 bg-white rounded-xl border border-[#E5E7EB] overflow-hidden">
 @foreach([
 ['event' => 'Client created', 'detail' => 'TechStart Inc', 'user' => 'John Doe', 'time' => '10 min ago'],
 ['event' => 'Project updated', 'detail' => 'Website Redesign · 75% complete', 'user' => 'Mike Wilson', 'time' => '2 hours ago'],
 ['event' => 'Task completed', 'detail' => 'Design homepage mockup', 'user' => 'Sarah Kim', 'time' => '3 hours ago'],
 ['event' => 'Invoice paid', 'detail' => 'INV-0042 · $2,500', 'user' => 'System', 'time' => '1 day ago'],
 ['event' => 'New project started', 'detail' => 'Mobile App - TechStart Inc', 'user' => 'John Doe', 'time' => '2 days ago'],
 ['event' => 'Client created', 'detail' => 'Global Solutions', 'user' => 'Anna Brown', 'time' => '3 days ago'],
 ] as $a)
 <div class="flex gap-4 px-6 py-4 border-b border-[#E5E7EB] last:border-0 hover:bg-[#F8FAFC] transition-colors">
 <div class="w-10 h-10 rounded-full bg-[#EEF2FF] flex items-center justify-center text-[#6366F1] shrink-0">
 <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
 </div>
 <div class="flex-1 min-w-0">
 <p class="font-medium text-[#111827]">{{ $a['event'] }}</p>
 <p class="text-sm text-[#6B7280]">{{ $a['detail'] }}</p>
 <p class="text-xs text-[#6B7280] mt-0.5">{{ $a['user'] }} · {{ $a['time'] }}</p>
 </div>
 </div>
 @endforeach
 </div>
</div>
@endsection
