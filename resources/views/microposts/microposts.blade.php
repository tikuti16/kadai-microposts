<ul class="media-list">
  @foreach ($microposts as $micropost)
    <?php $user = $micropost->user; ?>
    <li class="media mb-3">
      <img class="media-object rouded" src="{{ Gravatar::src($user->email, 50) }}" alt="">
      <div class="media-body ml-3">
        <div>
          {!! link_to_route('users.show', $user->name, ['id' => $user->id]) !!} <span class="text-muted">posted at {{ $micropost->created_at }}</span>
        </div>
        <div>
          <p>{!! nl2br(e($micropost->content)) !!}</p>
        </div>
        <div>
          @include('favorites.favorites_button', ['micropost'=>$micropost])
        </div>
        <div>
          @if (Auth::id() == $micropost->user_id)
            {!! Form::open(['route' => ['microposts.destroy', $micropost->id], 'method'=>'delete']) !!}
              {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
            {!! Form::close() !!}
          @endif
        </div>
      </div>
    </li>
  @endforeach
</ul>
{{ $microposts ->render('pagination::bootstrap-4') }}