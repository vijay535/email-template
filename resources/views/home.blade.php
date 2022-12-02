@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="{{ route('home') }}"> {{ __('Dashboard') }} </a> <a href="{{ route('form')}}" class="btn btn-primary">Add Template</a></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>Sr</th>
                            <th>Template ID</th>
                            <th>Template Message</th>
                          </tr>
                        </thead>
                        <tbody>
                            @php $sr=1; @endphp
                            @foreach($temp as $templates)
                              <tr>
                                <td>{{ $sr }}</td>
                                <td>{{ $templates->id }}</td>
                                <td>{{ $templates->message }}</td>
                              </tr>
                            @php $sr++; @endphp
                            @endforeach
                          
                        </tbody>
                    </table>
                    {!! $temp->render() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
