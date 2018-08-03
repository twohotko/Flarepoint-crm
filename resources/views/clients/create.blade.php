@extends('layouts.master')
@section('heading')
    <h1>Create Client</h1>
@stop

@section('content')
    @push('scripts')
        <script>
            $(document).ready(function () {
                $('[data-toggle="tooltip"]').tooltip(); //Tooltip on icons top

                $('.popoverOption').each(function () {
                    var $this = $(this);
                    $this.popover({
                        trigger: 'hover',
                        placement: 'left',
                        container: $this,
                        html: true
                    });
                });
            });
        </script>
    @endpush

    <?php
    $data = Session::get('data');
    ?>

    {!! Form::open([
            'route' => 'clients.store',
            'class' => 'ui-form'
            ]) !!}
    @include('clients.form', ['submitButtonText' => __('Create New Client')])

    {!! Form::close() !!}


@stop
