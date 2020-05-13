@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Detail Item</div>

                <div class="card-body">
                {{ $inventory_item->item_code }}
                {{ $inventory_item->item_name }}
                {{ $inventory_item->description }}
                {{ $inventory_item->owner }}
                {{ $inventory_item->status }}
                

                </div>
                <div class="card-footer">
                    <button class="btn-info float-right">Borrow this item</button>
                    <button class="btn-secondary float-right" onclick="event.preventDefault();document.getElementById('back').submit();">Back to Inventory List</button>
                </div>
            </div>
        </div>
    </div>
</div>
<form id="back" action="/inventory" method="POST" style="display: none;">
    @csrf
    @method('GET')
</form>
@endsection