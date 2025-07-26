@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-8">
    <h1 class="text-2xl font-bold mb-6">Daftar Transaksi</h1>

    <a href="{{ route('transactions.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">
        + Tambah Transaksi
    </a>

    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow rounded">
        <table class="min-w-full text-sm">
            <thead class="bg-gray-100 text-left">
                <tr>
                    <th class="p-3">Tanggal</th>
                    <th class="p-3">Judul</th>
                    <th class="p-3">Tipe</th>
                    <th class="p-3">Jumlah</th>
                    <th class="p-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $tx)
                    <tr class="border-b">
                        <td class="p-3">{{ \Carbon\Carbon::parse($tx->date)->format('d M Y') }}</td>
                        <td class="p-3">{{ $tx->title }}</td>
                        <td class="p-3">
                            <span class="{{ $tx->type === 'income' ? 'text-green-600' : 'text-red-600' }}">
                                {{ ucfirst($tx->type) }}
                            </span>
                        </td>
                        <td class="p-3">Rp {{ number_format($tx->amount, 0, ',', '.') }}</td>
                        <td class="p-3 flex space-x-2">
                            <a href="{{ route('transactions.edit', $tx) }}" class="text-blue-500">Edit</a>
                            <form action="{{ route('transactions.destroy', $tx) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="p-4">
            {{ $transactions->links() }}
        </div>
    </div>
</div>
@endsection
