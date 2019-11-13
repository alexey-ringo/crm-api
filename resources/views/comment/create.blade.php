@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                
                <form action="{{route('comments.store')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                    <input type="hidden" name="review_id" value="{{ $review->id }}">
                    {{csrf_field()}}
                    {{--Form include --}}
                    @include('comment.partials.form')
                    
                    <div class="card-footer">
                    @if(Auth::check())
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-dot-circle-o"></i> Сохранить
                        </button>
                        <a class="btn-outline-primary float-right" href="{{route('reviews.show', $review)}}">
                            <i class="fa fa-ban"></i> Отмена
                        </a>
                    @endif
                    </div>
                </form>
                
                
            </div>    
        </div>
    </div><!-- .animated -->
</div><!-- .content -->
@endsection