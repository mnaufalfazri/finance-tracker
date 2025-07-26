@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto mt-10">
    <h1 class="text-xl font-semibold mb-4">Tambah Transaksi</h1>

    <form action="{{ route('transactions.store') }}" method="POST" class="space-y-4">
        @csrf

        @include('transactions.form')

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
    </form>
</div>
@endsection
