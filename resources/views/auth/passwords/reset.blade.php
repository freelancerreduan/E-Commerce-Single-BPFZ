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
            border-color: #ff4500;
        }

        .submit-btn {
            background-color: #ff4500;
            color: #fff;
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
                            <h2>Reset Password</h2>
                            <form action="{{ route('password.update') }}" method="POST">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">

                                <input type="hidden" id="email" name="email" placeholder="email">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror


                                <input type="password" id="password" name="password" placeholder="password">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="password confirmation">
                                @error('password_confirmation')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                                <button type="submit" class="submit-btn" style="text-color: white !important;">Forget Password</button>

                                <div class="my-4">
                                    <a href="{{ route('login') }}" class="text-primary">Back to Login</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- .main-page-wrapper -->
        </div> <!-- end row -->
    </div>
@endsection

