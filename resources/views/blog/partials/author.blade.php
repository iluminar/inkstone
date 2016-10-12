<div class="card user-card">
    <div class="card-header">
        <img class="propic" src="{{ $post['author']['socials'][0]['avatar'] }}" alt="" />
        <a href="" class="username">{{ $post['author']['name'] }}</a>
    </div>

    <div class="card-content">

    </div>

    <div class="flex-card-action">
        @if (Auth::user()->username == $post['author']['username'])
            <a href="#" data-toggle="tooltip" title="following" class="btn btn-default"><i class="fa fa-sign-out"> Following</i></a>
            <a href="#" data-toggle="tooltip" title="follower" class="btn btn-default"><i class="fa fa-sign-in"> Follower</i></a>
        @else
            <a href="#" data-toggle="tooltip" title="follow" class="btn btn-default"><i class="fa fa-2x fa-user-plus"> Follow</i></a>
        @endif
    </div>
</div>
