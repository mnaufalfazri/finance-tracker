@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto mt-10">
    <h1 class="text-xl font-semibold mb-4">Edit Transaksi</h1>

    <form action="{{ route('transactions.update', $transaction) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        @include('transactions.form', ['transaction' => $transaction])

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Update</button>
    </form>
</div>
@endsection
