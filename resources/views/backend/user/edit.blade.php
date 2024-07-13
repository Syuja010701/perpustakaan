@extends('backend.app')
@section('title', 'Edit User')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6"><br>
                    <h2>Edit User</h2>
                </div>

            </div>
        </div>
    </section>

    <div class="container-fluid pt-4 px-4">
        <div class="col-sm-12 col-xl-12">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="bg-secondary rounded h-100 p-4">
                <form method="POST" action="{{ route('backend-update-user', $editUser->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" class="form-control mb-3" id="name" value="{{ old('name', $editUser->name ) }}" name="name" placeholder="">
                        @error('name')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="deskripsi">Username</label>
                        <input type="text" class="form-control mb-3" value="{{ old('username', $editUser->username)}}" id="username" name="username" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="deskripsi">Email</label>
                        <input type="text" class="form-control mb-3" value="{{ old('email', $editUser->email) }}" id="email" name="email" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="deskripsi">Password</label>
                        <input type="password" class="form-control mb-3" value="{{ old('password')}}" id="password" name="password" placeholder="">

                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" id="password_confirmation" class="form-control mb-3">
                    </div>

                    <div class="form-group mb-4">
                        <label>Role User <strong style="color: red;">*</strong></label>
                        <select class="form-select form-select-sm mt-2" id="roles" name="roles[]">
                            <option value="{{ old('name') }}" disabled selected>---Pilih Kategori Buku---</option>
                            @foreach($roles as $roleId => $roleName)
                            <option value="{{ $roleId }}" {{ in_array($roleId, $userRole) ? 'selected' : '' }}>
                                {{ $roleName }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    
                    <div class="form-group">
                        <label for="image">Gambar</label>
                        <input type="file" class="form-control form-control-sm bg-dark" id="image" name="image" accept="image/*">
                    </div><br>

                    <div class="form-group">
                        @if(!empty($editUser->image))
                        <img id="image-preview" src="{{ asset('assets/backend/img/' . $editUser->image) }}" alt="{{ $editUser->name }}" class="img-thumbnail" style="width: 150px;">
                        @else
                        <div class="text-center py-4">No Image</div>
                        @endif
                    </div><br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{route('backend-index-user')}}" class="btn btn-info">kembali</a>


                </form>
            </div>
        </div>

    </div>
</div>

<script>
    // Ambil elemen input file
    var inputImage = document.getElementById('image');

    // Ambil elemen img pratinjau
    var imagePreview = document.getElementById('image-preview');

    // Editkan event listener untuk perubahan pada input file
    inputImage.addEventListener('change', function() {
        // Pastikan ada file yang dipilih
        if (inputImage.files && inputImage.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                // Set src gambar pratinjau dengan data URL gambar yang dipilih
                imagePreview.src = e.target.result;
                imagePreview.style.display = 'block'; // Tampilkan gambar pratinjau
            }

            // Baca file gambar sebagai data URL
            reader.readAsDataURL(inputImage.files[0]);
        } else {
            // Kosongkan gambar pratinjau jika tidak ada file yang dipilih
            imagePreview.src = '#';
            imagePreview.style.display = 'none'; // Sembunyikan gambar pratinjau
        }
    });
</script>
@endsection