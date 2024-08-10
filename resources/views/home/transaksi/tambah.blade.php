@extends('layout.master')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3>Tambah Data Transaksi</h3>
                            </div>
                            <div class="card-body">
                                <form action="/transaksi/simpan" method="post">
                                    @csrf

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="id_user" class="form-label">Kasir</label>
                                                <select name="id_user" id="id_user" class="form-control">
                                                    @foreach ($user as $user)
                                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="id_member" class="form-label">Member</label>
                                                <select name="id_member" id="id_member" class="form-control">
                                                    @foreach ($member as $member)
                                                        <option value="{{ $member->id }}">{{ $member->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="tanggal" class="form-label">Tanggal</label>
                                        <input type="date" name="tanggal" id="tanggal" class="form-control"
                                            placeholder="" aria-describedby="helpId">
                                        @error('tanggal')
                                            <div class="alert alert-danger alert-dismisible fade show" role="alert"
                                                data-dismiss="alert">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <!-- Repeater for Sepatu and Jumlah -->
                                            <div id="sepatu-repeater">
                                                <div class="sepatu-group mb-3" data-index="0">
                                                    <div class="row">
                                                        <!-- Sepatu -->
                                                        <div class="col-md-4">
                                                            <label for="id_sepatu" class="form-label">Sepatu</label>
                                                            <select name="id_sepatu[]" class="form-control sepatu-select"
                                                                data-index="0">
                                                                <option value="">Pilih Sepatu</option>
                                                                @foreach ($sepatu as $item)
                                                                    <option value="{{ $item->id }}">{{ $item->merk }}
                                                                        - {{ $item->nama }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <!-- Harga Satuan -->
                                                        <div class="col-md-2">
                                                            <label for="harga" class="form-label">Harga Satuan</label>
                                                            <input type="text" name="harga_satuan[]"
                                                                class="form-control harga" placeholder=""
                                                                aria-describedby="helpId" readonly>
                                                        </div>

                                                        <!-- Jumlah -->
                                                        <div class="col-md-2">
                                                            <label for="jumlah" class="form-label">Jumlah</label>
                                                            <input type="number" name="jumlah[]"
                                                                class="form-control jumlah" placeholder=""
                                                                aria-describedby="helpId">
                                                        </div>

                                                        <!-- Total -->
                                                        <div class="col-md-2">
                                                            <label for="total" class="form-label">Total</label>
                                                            <input type="number" name="total[]" class="form-control total"
                                                                placeholder="" aria-describedby="helpId" readonly>
                                                        </div>

                                                        <!-- Delete Button -->
                                                        <div class="col-md-2 d-flex align-items-end">
                                                            <button type="button"
                                                                class="btn btn-danger remove-sepatu">Hapus</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Subtotal -->
                                            <div class="row mt-3">
                                                <div class="col-md-4 offset-md-8">
                                                    <label for="subtotal" class="form-label">Subtotal</label>
                                                    <input type="number" name="sub_total" id="subtotal"
                                                        class="form-control subtotal" placeholder=""
                                                        aria-describedby="helpId" readonly>
                                                </div>
                                            </div>

                                            <!-- Add Sepatu Button -->
                                            <button type="button" id="add-sepatu" class="btn btn-success mt-2">Tambah
                                                Sepatu</button>
                                        </div>
                                    </div>

                                    <br>
                                    <br>
                                    <br>

                                    <!-- Submit Button -->
                                    <button type="submit" class="btn btn-info">Simpan</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const repeaterContainer = document.getElementById('sepatu-repeater');
            const addButton = document.getElementById('add-sepatu');
            const subtotalField = document.getElementById('subtotal');
            let index = 1; // Initialize index counter

            // Event listener untuk menambah grup baru
            addButton.addEventListener('click', function() {
                const newGroup = document.querySelector('.sepatu-group').cloneNode(true);
                newGroup.querySelectorAll('input').forEach(input => input.value = '');
                newGroup.querySelectorAll('select').forEach(select => select.selectedIndex = 0);
                newGroup.setAttribute('data-index', index);
                newGroup.querySelector('.sepatu-select').setAttribute('data-index',
                    index); // Update data-index for new select
                repeaterContainer.appendChild(newGroup);
                index++;
            });

            // Event delegation untuk mengisi harga satuan saat sepatu dipilih
            repeaterContainer.addEventListener('change', function(event) {
                if (event.target.classList.contains('sepatu-select')) {
                    const select = event.target;
                    const hargaField = select.closest('.sepatu-group').querySelector('.harga');
                    const sepatuId = select.value;

                    if (sepatuId) {
                        fetch(`/transaksi/get-harga/${sepatuId}`)
                            .then(response => response.json())
                            .then(data => {
                                hargaField.value = data.harga || '0'; // Assign pure numeric value
                                updateSubtotal();
                            })
                            .catch(error => {
                                console.error('Error:', error);
                                hargaField.value = '0';
                                updateSubtotal();
                            });
                    } else {
                        hargaField.value = '0';
                        updateSubtotal();
                    }
                }
            });

            // Event delegation untuk menghitung total per row dan subtotal keseluruhan
            repeaterContainer.addEventListener('input', function(event) {
                const group = event.target.closest('.sepatu-group');
                const harga = parseFloat(group.querySelector('.harga').value) || 0;
                const jumlah = parseFloat(group.querySelector('.jumlah').value) || 0;
                const totalField = group.querySelector('.total');

                // Hitung total untuk row ini
                const total = harga * jumlah;
                totalField.value = total;

                // Hitung subtotal keseluruhan
                updateSubtotal();
            });

            // Event delegation untuk menghapus grup berdasarkan indeks
            repeaterContainer.addEventListener('click', function(event) {
                if (event.target.classList.contains('remove-sepatu')) {
                    const group = event.target.closest('.sepatu-group');
                    if (document.querySelectorAll('.sepatu-group').length > 1) {
                        group.remove();
                        updateSubtotal(); // Update subtotal setelah row dihapus
                    } else {
                        alert('Minimal harus ada satu kolom sepatu dan jumlah');
                    }
                }
            });

            // Fungsi untuk menghitung subtotal keseluruhan
            function updateSubtotal() {
                let subtotal = 0;
                document.querySelectorAll('.total').forEach(function(totalField) {
                    subtotal += parseFloat(totalField.value) || 0;
                });
                subtotalField.value = subtotal;
            }
        });
    </script>
@endsection
