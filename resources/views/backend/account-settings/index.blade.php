 @extends('layouts.backend-app')

 @section('content')
     <div class="container my-5">
         <div class="row justify-content-center">
             <div class="col-md-6">


                 <div class="card shadow-sm border-0">
                     <div class="card-header bg-primary text-white text-center">
                         <h5 class="mb-0">Account Settings</h5>
                     </div>
                     <div class="card-body">
                         <form method="POST" action="{{ route('admin.account.update') }}" enctype="multipart/form-data">
                             @csrf
                             @method("PUT")
                             <div class="col-sm-12 mb-3">
                                 <label class="form-label">Profile Image</label>
                                 <div class="mb-2 text-center ">
                                     <img id="imgPreview"
                                         src="{{ old('image', isset($user) && $user->image_url  ? $user->image_url : asset('assets/images/avatar-1.png')) }}"
                                         class="rounded-circle border" width="100" height="100">
                                 </div>


                                 <input type="file" name="image" id="imgSelect" class="form-control">
                                 @error('image')
                                     <div class="text-danger small">{{ $message }}</div>
                                 @enderror
                             </div>

                             <div class="mb-3">
                                 <label class="form-label">Full Name</label>
                                 <input type="text" name="name" class="form-control"
                                     value="{{ old('name', $user->name) }}" required>
                                 @error('name')
                                     <div class="text-danger small">{{ $message }}</div>
                                 @enderror
                             </div>

                             <div class="mb-3">
                                 <label class="form-label">Email</label>
                                 <input type="email" name="email" class="form-control"
                                     value="{{ old('email', $user->email) }}" required>
                                 @error('email')
                                     <div class="text-danger small">{{ $message }}</div>
                                 @enderror
                             </div>

                             <div class="mb-3">
                                 <label class="form-label">Phone</label>
                                 <input type="text" name="phone" class="form-control"
                                     value="{{ old('phone', $user->phone) }}">
                                 @error('phone')
                                     <div class="text-danger small">{{ $message }}</div>
                                 @enderror
                             </div>

                             <div class="d-grid">
                                 <button type="submit" class="btn btn-primary">
                                     <i class="bi bi-save"></i> Update Account
                                 </button>
                             </div>
                         </form>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 @endsection
