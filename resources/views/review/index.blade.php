@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                    <a class="btn btn-primary" href="{{ route('reviews.create') }}">Добавить</a>
                </nav>
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Отзыв</th>
                                    <th>Пользователь</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($reviews as $review)
                                @php /** @var \App\Models\Review $reviews */ @endphp
                                <tr>
                                    <td>{{ $review->id }}</td>
                                    <td>
                                        <a href="#">
                                            {{ $review->title }}
                                        </a>
                                    </td>
                                    <td>{{ $review->user->name }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection