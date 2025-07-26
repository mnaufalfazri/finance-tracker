@php
    $isEdit = isset($transaction);
@endphp

<div>
    <label class="block mb-1 font-medium">Judul</label>
    <input type="text" name="title" value="{{ old('title', $transaction->title ?? '') }}"
        class="w-full border border-gray-300 p-2 rounded" required>
</div>

<div>
    <label class="block mb-1 font-medium">Jumlah</label>
    <input type="number" name="amount" value="{{ old('amount', $transaction->amount ?? '') }}"
        class="w-full border border-gray-300 p-2 rounded" required>
</div>

<div>
    <label class="block mb-1 font-medium">Tipe</label>
    <select name="type" class="w-full border border-gray-300 p-2 rounded" required>
        <option value="income" {{ old('type', $transaction->type ?? '') === 'income' ? 'selected' : '' }}>Pemasukan</option>
        <option value="expense" {{ old('type', $transaction->type ?? '') === 'expense' ? 'selected' : '' }}>Pengeluaran</option>
    </select>
</div>

<div>
    <label class="block mb-1 font-medium">Kategori</label>
    <input type="text" name="category" value="{{ old('category', $transaction->category ?? '') }}"
        class="w-full border border-gray-300 p-2 rounded">
</div>

<div>
    <label class="block mb-1 font-medium">Tanggal</label>
    <input type="date" name="date" value="{{ old('date', isset($transaction) ? $transaction->date->format('Y-m-d') : '') }}"
        class="w-full border border-gray-300 p-2 rounded" required>
</div>

<div>
    <label class="block mb-1 font-medium">Catatan</label>
    <textarea name="notes" rows="3"
        class="w-full border border-gray-300 p-2 rounded">{{ old('notes', $transaction->notes ?? '') }}</textarea>
</div>
