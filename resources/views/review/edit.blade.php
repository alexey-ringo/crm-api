@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <form action="{{route('reviews.update', $review)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                    <input type="hidden" name="_method" value="put">
                    {{csrf_field()}}
                    {{--Form include --}}
                    @include('review.partials.form')
                    
                    <div class="card-footer">
                        @if(Auth::check())
                            @if($review->user_id == $user->id)
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-dot-circle-o"></i> Сохранить
                                </button>
                            @else
                                <a class="btn btn-outline-primary float-right" href="{{route('comments.show', $review)}}">
                                    <i class="fa fa-ban"></i> Оставить комментарий
                                </a>
                            @endif
                        @endif
                    </div>
                </form>
            </div>
                
            <div class="card">
                <div class="card-body">
                @if($comments->isEmpty())
                    <p>Для данного отзыва еще нет комментариев</p>
                @else
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Комментарий</th>
                                <th>Автор комментария</th>
                                <th>Дата создания</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($comments as $comment)
                            @php /** @var \App\Models\Comment $comments */ @endphp
                                <tr>
                                    <td>{{ $comment->text }}</td>
                                    <td>{{ $review->user->name }}</td>
                                    <td>{{ $review->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->
@endsection