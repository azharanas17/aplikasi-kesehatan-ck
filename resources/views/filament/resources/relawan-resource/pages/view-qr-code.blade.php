<x-filament::page>
    {!! QrCode::size(400)->generate( route('filament.dashboard.resources.relawans.kartu-anggota', $record->id) ) !!}
    {{-- {!! QrCode::size(400)->generate("http://127.0.0.1:8001/" . $record->id . "/pdf/download") !!} --}}
    {{-- {!! $record->relawan->name !!} --}}
</x-filament::page>
