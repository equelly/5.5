@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card m-5">
                <div class="card-header" style="font-size: 18px;">{{ __('Панель входа') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>{{ Auth::user() == null ? 'Nemo': Auth::user()->name}}.
                    <?php
                        $t = date("H");

                        if ($t > 4 && $t < 8) {
                            echo "Доброе утро!";
                        } elseif ($t > 8 && $t < 15) {
                            echo "Добрый день!";
                        } elseif ($t > 16 && $t < 2) {
                            echo "Добрый вечер!";
                        }
                        else {
                            echo "Доброй ночи!";
                        }
                        ?>
                    </p><hr>
                    <div class="row justify-content-center">
                    <a class="btn btn-outline-primary w-75 m-5" href="{{route('post.index')}}" style="float: center;">вход на личную страницу</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
