@extends('layouts.admin')
@section('title', 'Profile')
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
                {{ $user->username }}
            </p>

            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-5">
                    <div class="card profile-widget">
                        <div class="profile-widget-header">
                            @if ($user->photo)
                                <img src="{{ asset('photo/'.$user->photo)}}"
                            class="rounded-circle profile-widget-picture">
                            @else
                                <img src="{{ asset('img-more/avatar-1.png')}}"
                            class="rounded-circle profile-widget-picture">
                            @endif
                            
                            <div class="profile-widget-items">
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">Posts</div>
                                    <div class="profile-widget-item-value">187</div>
                                </div>
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">Followers</div>
                                    <div class="profile-widget-item-value">6,8K</div>
                                </div>
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">Following</div>
                                    <div class="profile-widget-item-value">2,1K</div>
                                </div>
                            </div>
                        </div>
                        <div class="profile-widget-description">
                            <div class="profile-widget-name">{{ $user->name }} <div
                                    class="text-muted d-inline font-weight-normal">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <a href="https://api.whatsapp.com/send?phone={{ $user->phone ?? '' }}"
                                class="font-weight-bold mb-2 btn btn-block btn-success"><i class="fab fa-whatsapp"></i>
                                Whatsapp</a>
                            <a href="#" class="btn btn-social-icon btn-facebook mr-1">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="btn btn-social-icon btn-twitter mr-1">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="btn btn-social-icon btn-github mr-1">
                                <i class="fab fa-github"></i>
                            </a>
                            <a href="#" class="btn btn-social-icon btn-instagram">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-7">
                    <div class="card">
                        <form method="POST" action="{{ route('member.update', $user->id) }}" class="needs-validation"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="card-header">
                                <h4>Edit Profile</h4>
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
                                    <label>Password</label>
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
                                @if (Auth::user()->pin == 44156)
                                <div class="form-group">
                                    <label>PIN</label>
                                    <input type="tel" class="form-control" name="pin" value="{{ $user->pin }}">
                                </div>
                                @endif
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
                                <button type="submit" class="btn btn-primary">Simpan perubahan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
