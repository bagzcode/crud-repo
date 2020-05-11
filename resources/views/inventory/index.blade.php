@extends('layouts.app')
@section('content')
<div class="container">
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{session('success')}}
        </div>
    @endif
    <div class="row">
        <div class="col-6">
            <h1>Inventory List</h1>
        </div>
        <div class="col-6">
            <button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#exampleModal">
                Add New Item
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
                <table class="table table-hover">
                    <tr>
                        <th>CODE</th>
                        <th>ITEM'S NAME</th>
                        <th>OWNER</th>
                        <th>STATUS</th>
                        <th>ACTIONS</th>
                    </tr>
                    @foreach($list_inventories as $item)
                    <tr>
                        <td>{{ $item->item_code }}</td>
                        <td>{{ $item->item_name }}</td>
                        <td>{{ $item->owner }}</td>
                        <td>{{ $item->status }}</td>
                        <td>
                            <a href="/inventories/{{$item->id}}/detail" class="btn-info btn-sm">Detail</a>
                            <a href="/inventories/{{$item->id}}/edit" class="btn-warning btn-sm">Edit</a>
                            <a href="/inventories/{{$item->id}}/delete" class="btn-danger btn-sm" onclick="return confirm('Are you sure you want to delet this item??')">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">New Item</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <form action="/inventories/create" method="POST">
        @csrf
        <div class="modal-body">
            <div class="form-group">
                <label for="item_code">CODE</label>
                <input name="item_code" type="text" class="form-control" id="inputItemCode" placeholder="Item Code ~ xxxxxxCS/GDnnn">
            </div>
            <div class="form-group">
                <label for="item_name">ITEM NAME</label>
                <input name="item_name" type="text" class="form-control" id="inputItemName" placeholder="Item Name">
            </div>
            <div class="form-group">
                <label for="description">ITEM DESCRIPTIONS</label>
                <textarea name="description" class="form-control" id="inputDescription" rows="4"></textarea>
            </div> 
            <div class="form-group">
                <label for="owner">PROGRAM OWNER</label>
                <select name="owner" class="form-control" id="inputOwner">
                <option value="CS">Computer Science (CS)</option>
                <option value="GD">Grafic Design (GD)</option>
                </select>
            </div>
            <input name="status" type="hidden" class="form-control" id="inputStatus" value="Available">
                 
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        </form>
    </div>
</div>

@endsection