@extends('layouts.app')


@push('page-styles')
<script type="text/javascript">
    $(document).ready(function(){
        $('#showResponses').click(function() {
            $('.table').toggle();
        });            
    });
</script>
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="alert alert-success" role="alert">
                        Thank you for taking our quiz! :)
                    </div>
                    <p>
                        <button class="btn btn-sm btn-default" name="showResponses" id="showResponses">View Responses</button>
                    </p>

                    <table class="table" style="display: none;">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">treatment</th>
                          <th scope="col">correct</th>
                          <th scope="col">total</th>
                          <th scope="col">started</th>
                          <th scope="col">finished</th>
                          <th scope="col">answers</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($records as $record )
                        <tr>
                          <th scope="row">{{$record->id}}</th>
                          <td>{{$record->variation}}</td>
                          <td>{{$record->correct}}</td>
                          <td>{{$record->total}}</td>
                          <td>{{$record->started_at}}</td>
                          <td>{{$record->finished_at}}</td>
                          <td>{{$record->answers}}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
