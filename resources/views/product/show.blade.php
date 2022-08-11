@extends('dashboard')
@section('content')
<table class="border-collapse border border-slate-500 m-4 auto">
    <thead>
      <tr>
        <th class="border border-slate-600 ...">Name</th>
        <th class="border border-slate-600 ...">Order No</th>
        <th class="border border-slate-600 ...">User Phone</th>

        <th class="border border-slate-600 ...">Product Code</th>
        <th class="border border-slate-600 ...">Product Name</th>
        
        <th class="border border-slate-600 ...">Purchase Quantity</th>
        <th class="border border-slate-600 ...">Product Price</th>
        <th class="border border-slate-600 ...">Total</th>
        

      </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
      <tr>
        <td class="border border-slate-700 ...">{{ $product->name }}</td>
        <td class="border border-slate-700 ...">{{ $product->order_no }}</td>
        <td class="border border-slate-700 ...">{{ $product->user_phone }}</td>
        <td class="border border-slate-700 ...">{{ $product->product_code }}</td>
        <td class="border border-slate-700 ...">{{ $product->product_name }}</td>
        <td class="border border-slate-700 ...">{{ $product->purchase_quantity }}</td>
        <td class="border border-slate-700 ...">{{ $product->product_price }}</td>
        <td class="border border-slate-700 ...">{{ $product->product_price * $product->purchase_quantity }}</td>
      </tr>
        @endforeach
        <tr>
        <td class="border border-slate-700 text-end"colspan="5">{{'Gross Total:'}}</td>
        <td class="border border-slate-700">{{ $totalQuantity }}</td>
        <td class="border border-slate-700">{{ $totalProductPrice }}</td>
        <td class="border border-slate-700">{{ $totalPrice }}</td>

        </tr>
    </tbody>
  </table>
@endsection
