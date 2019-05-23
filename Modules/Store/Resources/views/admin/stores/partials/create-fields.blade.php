<div class="box-body">
    <div class="row">
        <div class="col-md-12">
            <label for="">Select product</label>
            <select name="product_id" id="" class="form-control">
                @foreach($products as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
            <label for="">Quantity</label>
            <input type="number" name="quantity" id="" class="form-control">
        </div>
    </div>
</div>
