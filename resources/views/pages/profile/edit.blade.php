@extends('layouts.admin')
@section('title', 'Daftar Penulis')
@section('background')
    <div class="navbar-bg-primary"></div>
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Profile</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('dashboard.index') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Profile</div>
            </div>
        </div>

        @if (session('message'))
            <div class="alert @if (session('status')) {{ session('status') }} @endif alert-dismissible show fade">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                        <span>x</span>
                    </button>
                    <i class="fas fa-check mr-2"></i>
                    {{ session('message') }}
                </div>
            </div>
        @endif

        <div class="section-body">
            <h2 class="section-title">Hi, {{ $user->name }}</h2>
            <p class="section-lead">
                {{ $user->profesi }}
            </p>

            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-5">
                    <div class="card profile-widget">
                        <div class="profile-widget-header">
                            <img src="{{ asset('photo/'.$user->photo) }}"
                                class="rounded-circle profile-widget-picture img-thumbnail">
                            <div class="profile-widget-items">
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">Posts</div>
                                    <div class="profile-widget-item-value">0</div>
                                </div>
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-value mt-1">
                                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#editProfile"><i class="fas fa-edit"></i> Edit Profil</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="profile-widget-description">
                            <div class="profile-widget-name">{{ $user->name }} <div
                                    class="text-muted d-inline font-weight-normal">
                                </div>
                            </div>
                            <p class="text-justify">{{ $user->bio }}</p>
                            <hr>
                            {{ $user->alamat }}
                        </div>
                        <form method="POST" action="{{ route('profile.update', $user->id) }}" class="needs-validation collapse"
                            enctype="multipart/form-data" id="editProfile">
                            @csrf
                            @method('PATCH')
                            <div class="card-header bg-primary">
                                <h4 class="text-white">Edit Profile</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="text" class="form-control" name="name" value="{{ $user->name }}"
                                        required>
                                    <div class="invalid-feedback">
                                        Please fill in the first name
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Photo</label>
                                    <input type="file" class="form-control-file" name="photo" value="{{ $user->photo }}"
                                        accept="image/*">
                                    <div class="invalid-feedback">
                                        Please fill in the first name
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Password : Encrypted</label>
                                    <input type="password" class="form-control" name="password" value="{{ $user->password }}">
                                    <div class="invalid-feedback">
                                        Please fill in the first name
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-5 col-12">
                                        <label>Username</label>
                                        <input type="text" class="form-control" name="username"
                                            value="{{ $user->username }}" required>
                                        <div class="invalid-feedback">
                                            Please fill in the first name
                                        </div>
                                    </div>
                                    <div class="form-group col-md-7 col-12">
                                        <label>Profesi</label>
                                        <input type="text" class="form-control" name="profesi"
                                            value="{{ $user->profesi }}">
                                        <div class="invalid-feedback">
                                            Please fill in the first name
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-7 col-12">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email" value="{{ $user->email }}"
                                            required>
                                        <div class="invalid-feedback">
                                            Please fill in the email
                                        </div>
                                    </div>
                                    <div class="form-group col-md-5 col-12">
                                        <label>Phone</label>
                                        <input type="tel" class="form-control" name="phone" value="{{ $user->phone }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Bio</label>
                                    <textarea class="form-control summernote-simple" name="bio"
                                        value="{{ $user->bio }}">{{ $user->bio }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea class="form-control summernote-simple" name="alamat"
                                        value="{{ $user->alamat }}">{{ $user->alamat }}</textarea>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary btn-block">Simpan perubahan</button>
                            </div>
                        </form>
                        <div class="card-footer text-center">
                            <div class="row justify-content-center">
                                <div class="col-md-4 col-12">
                                    <a href="https://api.whatsapp.com/send?phone={{ $user->phone ?? '' }}"
                                        class="font-weight-bold mb-2 btn btn-block btn-primary"><i class="fab fa-whatsapp"></i>
                                    </a>
                                </div>
                                <div class="col-md-4 col-12">
                                    <a href="https://api.whatsapp.com/send?phone={{ $user->phone ?? '' }}"
                                        class="font-weight-bold mb-2 btn btn-block btn-primary"><i class="fab fa-instagram"></i>
                                    </a>
                                </div>
                                <div class="col-md-4 col-12">
                                    <a href="https://api.whatsapp.com/send?phone={{ $user->phone ?? '' }}"
                                        class="font-weight-bold mb-2 btn btn-block btn-primary"><i class="fab fa-youtube"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-7">
                    <div class="card card-body">
                        <div class="form-group row">
                          <label class="col-form-label col-12 col-md-12 col-lg-3"><i class="fas fa-pen"></i> Status</label>
                          <div class="col-12">
                            <textarea class="form-control" placeholder="Apa yang Anda Pikirkan Sekarang?"></textarea>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-12 text-right">
                            <button class="btn btn-primary"><i class="fas fa-paper-plane"></i> Kirim</button>
                          </div>
                        </div>
                    </div>
                    <div class="card card-body">
                        <div class="row justify-content-start">
                            <div class="col-auto">
                                <img src="{{ asset('photo/'.$user->photo) }}" class="rounded" height="50px">
                            </div>
                            <div class="col-auto mt-1" style="margin-left:-20px;">
                                    <a class="font-weight-bold">{{ $user->name }}</a><br>
                                    <a class="font-weight-light" style="font-size:11px">{{ $user->created_at }}<i class="far fa-clock"></i></a>
                            </div>
                            <p class="col-12 mt-3">
                                Hallo, selamat malam semuanya? apa kabar? jangan lupa like yaa..
                            </p>
                            <div class="col-12">
                                <a class="mr-3"><i class="fas fa-heart"></i></a>
                                <a class="mr-3"><i class="fas fa-comment"></i></a>
                                <a class="mr-3"><i class="fas fa-share-square"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
