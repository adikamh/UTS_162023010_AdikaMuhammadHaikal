<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container">
      <a class="navbar-brand" href="#">PRODUK</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        @if(session('user'))
          <span class="text-white me-3">
            {{ session('user')}}
          </span>
          <a href="{{ route('logout') }}" class="btn btn-danger btn-sm">Logout</a>
        @else
          <a href="{{ route('login') }}" class="btn btn-warning btn-sm">Login</a>
        @endif

      </div>
    </div>
  </nav>
  <div>
    <h1 >Produk</h1>
    <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>user id</th>
                            <th>nama produk</th>
                            <th>kode produk</th>
                            <th>harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(\App\Models\products::all() as $user)
                        <tr>
                            <td>{{ $user->product_id }}</td>
                            <td>{{ $user->users_id }}</td>
                            <td>{{ $user->name_produk }}</td>
                            <td>{{ $user->kode_produk }}</td>
                            <td>{{ $user->harga }}</td>
                            <td> <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editProdukModal">editProduk</button></td>
                            <td>
                                <form action="{{ route('products.destroy', $user->product_id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
  </div>
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahProdukModal">Tambah
      Produk</button>
<div class="modal fade" id="tambahProdukModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="tambahProdukModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="tambahProdukModalLabel">Tambah Produk</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form action="{{ route('products.store') }}" method="POST">
          @csrf
          <div class="modal-body">
            <div class="mb-3">
              <label for="product_name" class="form-label">name_produk</label>
              <input type="text" class="form-control" id="name_produk" name="name_produk" required>
            </div>

            <div class="mb-3">
              <label for="category_id" class="form-label">kode_produk</label>
                <input type="text" class="form-control" id="kode_produk" name="kode_produk" required>
            </div>
                <div class="mb-3">
                <label for="stock" class="form-label">stock</label>
                <input type="number" class="form-control" id="stock" name="stock" required>
            </div>
            <div class="mb-3">
              <label for="product_price" class="form-label">harga</label>
              <input type="number" class="form-control" id="harga" name="harga" required>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                Kembali
              </button>
              <button type="submit" class="btn btn-primary">
                <i class="bi bi-check-circle me-1"></i>Simpan Produk
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="editProdukModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="editProdukModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="editProdukModalLabel">Edit Produk</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form action="{{ route('products.update', $user->product_id) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="modal-body">
            <div class="mb-3">
              <label for="product_name" class="form-label">name_produk</label>
              <input type="text" class="form-control" id="name_produk" name="name_produk" value="{{ $user->name_produk }}" required>
            </div>
            <div class="mb-3">
              <label for="category_id" class="form-label">kode_produk</label>
                <input type="text" class="form-control" id="kode_produk" name="kode_produk" value="{{ $user->kode_produk }}" required>
            </div>
            <div class="mb-3"></div>
              <label for="product_price" class="form-label">harga</label>
              <input type="number" class="form-control" id="harga" name="harga" value="{{ $user->harga }}" required>
            </div>
            <div class="modal-footer"></div>
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                Kembali
              </button>
              <button type="submit" class="btn btn-primary">
                <i class="bi bi-check-circle me-1"></i>Simpan Perubahan
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>