@extends('layouts.app')

@section('title')
    My Todo App
@endsection

@section('content')

    <div class="row mt-3">
        <div class="col-12 align-self-center">
            <ul class="list-group">

              @if(count($todos)==0)
                <p>There aren't any todo</p>
              @else
                @foreach ($todos as $todo)
                  <li class="list-group-item">
                    <a href="/details/{{$todo->id}}" style="color: cornflowerblue">
                      {{$todo->name}}
                    </a>
                  </li>
                @endforeach
              @endif
              
            </ul>
        </div>
    </div>

@endsection