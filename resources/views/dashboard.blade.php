@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if(Auth::check())
                <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                    <a class="btn btn-primary" href="{{ route('reviews.create') }}">Новый отзыв</a>
                </nav>
                @endif
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Отзыв</th>
                                    <th>Автор отзыва</th>
                                    <th>Дата создания</th>
                                    <th>Комментарии</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($reviews as $review)
                                @php /** @var \App\Models\Review $reviews */ @endphp
                                <tr>
                                    <td>
                                        <a href="{{ route('reviews.show', $review) }}">
                                            {{ $review->title }}
                                        </a>
                                    </td>
                                    <td>{{ $review->user->name }}</td>
                                    <td>{{ $review->created_at }}</td>
                                    <td>{{ $review->comments()->count() }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        @if($reviews->total() > $reviews->count())
        <br>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                       {{ $reviews->links() }} 
                    </div>
                </div>
            </div>
        </div>    
        @endif
        
    </div>
@endsection