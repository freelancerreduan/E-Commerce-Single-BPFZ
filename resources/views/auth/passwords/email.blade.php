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
            background-color: #BC6176;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
            margin-top: 15px;
        }

        .submit-btn:hover {
            background-color: #BC6176;
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


                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <form action="{{ route('password.email') }}" method="POST">
                                @csrf
                                <input type="text" id="email" name="email" placeholder="email">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                                <button type="submit" class="submit-btn">Login</button>

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
