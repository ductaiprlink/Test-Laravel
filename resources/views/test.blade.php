@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Table</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div>
                            <p class="col-sm-6">
                                state:
                                <a href="{{ route('danhsach', [
                                    'state' => 'LA',
                                    'sort'  => request('sort')
                                ]) }}">LA</a> |
                                <a href="{{ route('danhsach', [
                                    'state' => 'MI',
                                    'sort'  => request('sort')
                                ]) }}">MI</a> |
                                <a href="{{ route('danhsach', [
                                    'state' => 'NJ',
                                    'sort'  => request('sort')
                                ]) }}">NJ</a> |
                                <a href="{{ route('danhsach') }}">Reset</a>
                            </p>
                            <p class="col-sm-6 text-right">
                                Sort:
                                <a href="{{ route('danhsach', [
                                    'state' => request('state'),
                                    'sort' => 'asc'
                                ]) }}">Ascending</a> |
                                <a href="{{ route('danhsach', [
                                    'state' => request('state'),
                                    'sort' => 'desc'
                                ]) }}">Descending</a>
                            </p>
                        </div>

                        <table class="table table-bordered">
                            <tr>
                                <th>ID</th>
                                <th>first name</th>
                                <th>last name</th>
                                <th>state</th>
                            </tr>

                            @foreach($tests as $test)
                                <tr>
                                    <td>{{ $test->id }}</td>
                                    <td>{{ $test->first_name }}</td>
                                    <td>{{ $test->last_name }}</td>
                                    <td>{{ $test->state }}</td>
                                </tr>
                            @endforeach
                        </table>

                        <div class="text-center">
                            {{ $tests->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
