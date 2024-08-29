@extends('category_product.layout')

@section('content')

<div class="card mt-5">
  <h2 class="card-header">Tambah Kategori Baru</h2>
  <div class="card-body">

    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary btn-sm" href="{{ route('category_product.index') }}"><i class="fa fa-arrow-left"></i> Kembali</a>
    </div>

    <form action="{{ route('category_product.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="inputCode" class="form-label"><strong>Kode:</strong></label>
            <input 
                type="text" 
                name="code" 
                class="form-control @error('code') is-invalid @enderror" 
                id="inputCode" 
                placeholder="Kode">
            @error('code')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="inputName" class="form-label"><strong>Nama:</strong></label>
            <input 
                type="text" 
                name="name" 
                class="form-control @error('name') is-invalid @enderror" 
                id="inputName" 
                placeholder="Nama">
            @error('name')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="inputDetail" class="form-label"><strong>Detail:</strong></label>
            <textarea 
                class="form-control @error('detail') is-invalid @enderror" 
                style="height:150px" 
                name="detail" 
                id="inputDetail" 
                placeholder="Detail"></textarea>
            @error('detail')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="inputQuantity" class="form-label"><strong>Jumlah:</strong></label>
            <input 
                type="number" 
                name="quantity" 
                class="form-control @error('quantity') is-invalid @enderror" 
                id="inputQuantity" 
                placeholder="Jumlah" 
                value="{{ old('quantity', 0) }}">
            @error('quantity')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="inputPrice" class="form-label"><strong>Harga:</strong></label>
            <input 
                type="text" 
                name="price" 
                class="form-control @error('price') is-invalid @enderror" 
                id="inputPrice" 
                placeholder="Harga">
            @error('price')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Kirim</button>
    </form>

  </div>
</div>
@endsection
