@if ($message = session('success'))
    <div class="max-w-7xl mx-auto mt-4 px-4">
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative flex justify-between items-center">
            <span>{{ $message }}</span>
            <button type="button" class="text-green-700 hover:text-green-900" onclick="this.parentElement.style.display='none';">✕</button>
        </div>
    </div>
@endif

@if ($message = session('error'))
    <div class="max-w-7xl mx-auto mt-4 px-4">
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative flex justify-between items-center">
            <span>{{ $message }}</span>
            <button type="button" class="text-red-700 hover:text-red-900" onclick="this.parentElement.style.display='none';">✕</button>
        </div>
    </div>
@endif

@if ($message = session('info'))
    <div class="max-w-7xl mx-auto mt-4 px-4">
        <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative flex justify-between items-center">
            <span>{{ $message }}</span>
            <button type="button" class="text-blue-700 hover:text-blue-900" onclick="this.parentElement.style.display='none';">✕</button>
        </div>
    </div>
@endif

@if ($message = session('warning'))
    <div class="max-w-7xl mx-auto mt-4 px-4">
        <div class="bg-yellow-100 border border-yellow-400 text-yellow-800 px-4 py-3 rounded relative flex justify-between items-center">
            <span>{{ $message }}</span>
            <button type="button" class="text-yellow-800 hover:text-yellow-900" onclick="this.parentElement.style.display='none';">✕</button>
        </div>
    </div>
@endif
