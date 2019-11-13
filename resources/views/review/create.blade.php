@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">    
                <form action="{{route('reviews.store')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                    {{csrf_field()}}
                    {{--Form include --}}
                    @include('review.partials.form')
                    
                    <div class="card-footer">
                    @if(Auth::check())
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-dot-circle-o"></i> Сохранить
                        </button>
                    @endif
                        <a class="btn btn-outline-primary float-right" href="{{route('dashboard')}}">
                            <i class="fa fa-ban"></i> Назад
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->
@endsection