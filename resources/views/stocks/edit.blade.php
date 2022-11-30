@extends('base')

@section('title', 'Update Stock')
@section('content')
<form method="post" action="/stocks/update/{{$stock->id}}">
    @csrf
    <div class="form-group">
        <label for="stock_name">Stock Name:*</label>
        <input type="text" class="form-control" name="stock_name" value="{{ $stock->stock_name }}" />
    </div>
    <div class="form-group">
        <label for="ticket">Stock Ticket:*</label>
        <input type="text" class="form-control" name="ticket" value="{{ $stock->ticket }}" />
    </div>
    <div class="form-group">
        <label for="value">Stock Value:</label>
        <input type="text" class="form-control" name="value" value="{{ $stock->value }}" />
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>

@endsection