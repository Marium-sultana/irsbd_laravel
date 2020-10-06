@extends('front.layout.master')
@section('content')


@foreach($data as $editorial_data)
     {!! $editorial_data->text !!}
@endforeach

</p>
 </div>
   



@endsection