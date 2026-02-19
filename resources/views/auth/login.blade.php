@extends('layouts.app')
@section('styles')
    <style>
        .card {
            width: 100%;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        input {
            padding: 10px;
            margin-top: 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            transition: border-color 0.3s ease-in-out;
            outline: none;
            color: #333;
        }

        input:focus {
            border-color: #BC6176 !important;
        }

        .submit-btn {
            background-color: #BC6176 !important;
            color: white !important;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
            margin-top: 15px;
        }

       
    </style>
@endsection
@section('content')
    <div class="main-page-wrapper">
        <!-- MAIN CONTENT AREA -->
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <div class="d-flex align-items-center justify-content-center" style="height: 80vh">
                        <div class="card">
                            <h2>{{ Request::url() == route('admin.login') ? 'Admin ' : '' }} Login</h2>
                            <form action="{{ route('login') }}" method="POST">
                                @csrf
                                <input type="text" id="email" name="email" placeholder="{{ Request::url() == route('admin.login') ? 'Admin ' : '' }} E-mail" >
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <input type="password" id="password" name="password" placeholder=" {{ Request::url() == route('admin.login') ? 'Admin ' : '' }}Password" >
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <button type="submit" class="submit-btn">Login</button>

                                <div class="my-4">
                                    <a href="{{ route('password.request') }}" class="text-primary">Forgot Password</a>
                                    @if (Request::url() != route('admin.login'))
                                        <p class="my-0">Don't have an account <a href="{{ route('register') }}" class="text-primary">Sign Up</a></p>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- .main-page-wrapper -->
        </div> <!-- end row -->
    </div>
@endsection
