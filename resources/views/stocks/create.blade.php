@extends('base')

@section('title', 'New Stock')
@section('content')

<form method="post" action="/stocks/store">
      @csrf
      <div class="form-group">    
          <label for="stock_name">Stock Name:*</label>
          <input type="text" class="form-control" name="stock_name"/>
      </div>

      <div class="form-group">
          <label for="ticket">Stock Ticket:*</label>
          <input type="text" class="form-control" name="ticket"/>
      </div>

      <div class="form-group">
          <label for="value">Stock Value:</label>
          <input type="text" class="form-control" name="value"/>
      </div>
      <button type="submit" class="btn btn-primary">Add Stock</button>
  </form>
  @endsection