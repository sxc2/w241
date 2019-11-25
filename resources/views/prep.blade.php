@extends('layouts.app')


@push('page-styles')
<script type="text/javascript">

</script>

@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  Read the following Text and look at the following image
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    @if ($variation == 1)
                      treatment 2
                    @else
                    To avoid criticism, do nothing, say nothing, be nothing - <em>Unknown</em>
                    <br><br>
                    Certainty is a cruel mindset. It hardens our minds against possibility. - <em> Ellen Langer</em>
                    <br><br>
                    It’s not that I’m so smart, it’s just that I stay with problems longer.  - <em>Albert Einstein</em>
                    <br><br>
                    @endif


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
