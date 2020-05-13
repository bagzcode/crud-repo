@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Item's Data Update</div>

                <div class="card-body">
                    <form action="/inventory/{{$item->id}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="item_code">CODE</label>
                                <input name="item_code" type="text" class="form-control" id="inputItemCode" placeholder="Item Code ~ xxxxxxCS/GDnnn" value="{{$item->item_code}}">
                            </div>
                            <div class="form-group">
                                <label for="item_name">ITEM NAME</label>
                                <input name="item_name" type="text" class="form-control" id="inputItemName" placeholder="Item Name" value="{{$item->item_name}}">
                            </div>
                            <div class="form-group">
                                <label for="description">ITEM DESCRIPTIONS</label>
                                <textarea name="description" class="form-control" id="inputDescription" rows="4">{{$item->description}}</textarea>
                            </div> 
                            <div class="form-group">
                                <label for="owner">PROGRAM OWNER</label>
                                <select name="owner" class="form-control" id="inputOwner">
                                <option value="CS" @if($item->owner == "CS") selected @endif>Computer Science (CS)</option>
                                <option value="GD" @if($item->owner == "GD") selected @endif>Grafic Design (GD)</option>
                                </select>
                            </div>
                            <input name="status" type="hidden" class="form-control" id="inputStatus" value="{{$item->status}}">
                                
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="event.preventDefault();document.getElementById('back').submit();">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>    
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
