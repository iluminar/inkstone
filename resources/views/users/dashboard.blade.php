@extends('layouts.app')

@section('title') Dashboard @endsection

@section('content')

<div class="columns is-multiline dashboard">

    @include('users.dashboard.post')

    <div class="column is-3">
        <div class="card">
          <header class="card-header">
            <p class="card-header-title">
              Pages
            </p>
          </header>
          <div class="card-content">
            <div class="content">
            Coming Soon....
            </div>
          </div>
          <footer class="card-footer">
          </footer>
        </div>
    </div>

    <div class="column is-3">
        <div class="card">
          <header class="card-header">
            <p class="card-header-title">
              Comments
            </p>
          </header>
          <div class="card-content">
            <div class="content">
            Coming Soon...
            </div>
          </div>
          <footer class="card-footer">
          </footer>
        </div>
    </div>

    <div class="column is-3">
        <div class="card">
          <header class="card-header">
            <p class="card-header-title">
              Integrations
            </p>
          </header>
          <div class="card-content">
            <div class="content">
            </div>
          </div>
          <footer class="card-footer">
            <a class="card-footer-item" href="{{ route('user.github', ['user' => Auth::user()->username]) }}">Github</a>
            <a class="card-footer-item">Edit</a>
            <a class="card-footer-item">Delete</a>
          </footer>
        </div>
    </div>

    <div class="column is-3">
        <div class="card">
          <header class="card-header">
            <p class="card-header-title">
              Settings
            </p>
          </header>
          <div class="card-content">
            <div class="content">
            Coming Soon...
            </div>
          </div>
          <footer class="card-footer">
          </footer>
        </div>
    </div>

</div>

@endsection
