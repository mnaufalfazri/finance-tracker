<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class transactionController extends Controller
{
    use AuthorizesRequests;
    // Menampilkan semua transaksi milik user
    public function index()
    {
        $transactions = Auth::user()->transactions()->latest()->paginate(10);

        return view('transactions.index', compact('transactions'));
    }

    // Form tambah transaksi
    public function create()
    {
        return view('transactions.create');
    }

    // Simpan transaksi baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'type' => 'required|in:income,expense',
            'category' => 'nullable|string|max:100',
            'date' => 'required|date',
            'notes' => 'nullable|string',
        ]);

        Auth::user()->transactions()->create([
            'title' => $request->title,
            'amount' => $request->amount,
            'type' => $request->type,
            'category' => $request->category,
            'date' => $request->date,
            'notes' => $request->notes,
        ]);

        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil ditambahkan.');
    }

    // Form edit transaksi
    public function edit(Transaction $transaction)
    {
        // Pastikan hanya pemilik yang bisa edit
        $this->authorize('update', $transaction);

        return view('transactions.edit', compact('transaction'));
    }

    // Update transaksi yang sudah ada
    public function update(Request $request, Transaction $transaction)
    {
        $this->authorize('update', $transaction);

        $request->validate([
            'title' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'type' => 'required|in:income,expense',
            'category' => 'nullable|string|max:100',
            'date' => 'required|date',
            'notes' => 'nullable|string',
        ]);

        $transaction->update($request->all());

        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil diperbarui.');
    }

    // Hapus transaksi
    public function destroy(Transaction $transaction)
    {
        $this->authorize('delete', $transaction);

        $transaction->delete();

        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil dihapus.');
    }
}
