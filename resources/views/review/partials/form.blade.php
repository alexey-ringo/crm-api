<div class="card-header">
    <strong>Гостевой отзыв</strong>
</div>
<div class="card-body card-block">
    <div class="row form-group">
        <div class="col col-md-3">
            <label for="title" class=" form-control-label">Заголовок отзыва</label>
        </div>
        <div class="col-12 col-md-10">
            <input type="text" id="title" name="title" placeholder="Заголовок отзыва" 
            class="form-control" value="{{$review->title ?? ""}}" required
            @if(Auth::check())
                @if(isset($review->id) && ($review->user_id != $user->id))
                    disabled
                @endif
            @else 
                disabled 
            @endif>
                <small class="form-text text-muted">This is a help text</small>
        </div>
    </div>
    
    <div class="row form-group">
        <div class="col col-md-3">
            <label for="text" class=" form-control-label">Полный текст отзыва</label>
        </div>
        <div class="col-12 col-md-10">
            <textarea name="text" id="description" rows="9" placeholder="Полное текст отзыва..." class="form-control" required 
            @if(Auth::check())
                @if(isset($review->id) && ($review->user_id != $user->id))
                    disabled
                @endif
            @else 
                disabled 
            @endif>{{$review->text ?? ""}}</textarea>
        </div>
    </div>
</div>
