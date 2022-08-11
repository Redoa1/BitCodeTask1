@extends('dashboard')
@section('content')
 
    <form method="POST" action="{{ route('product.store') }}">
        @csrf
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Generate Report
          </button>
    </form>  

@endsection