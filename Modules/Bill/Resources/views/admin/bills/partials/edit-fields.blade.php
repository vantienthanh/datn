
<div class="box-body">
    <label for="">Chọn sản phẩm</label>
    <select class="form-control" name="product_id" id="product_id" disabled="">
            <option value="{{$bill->product_id}}">{{$bill->product->name}}</option>
    </select>
    <div class="row">
        <div class="col-md-4">
            <label for="">Số lượng</label>
            <input class="form-control" type="number" name="quantity" id="quantity" value="{{$bill->quantity}}">
            <label for="">Đơn giá</label>
            <input class="form-control" type="text" name="" id="" value="{{$bill->product->cost}}">
            <label for="">Thành tiền</label>
            <input class="form-control" type="number" name="totalMoney" id="totalMoney" value="{{$bill->totalMoney}}">
            <label for="">Trạng thái</label>
            <select class="form-control" name="status" id="status">
                <option value="order"
                @if($bill->status === 'order') {{'selected'}} @endif>Đặt hàng</option>
                <option value="shipping"
                @if($bill->status === 'shipping') {{'selected'}} @endif>Đang vận chuyển</option>
                <option value="cancel"
                @if($bill->status === 'cancel') {{'selected'}} @endif>Hủy đơn</option>
                <option value="return"
                @if($bill->status === 'return') {{'selected'}} @endif>Đổi trả</option>
                <option value="finish"
                @if($bill->status === 'finish') {{'selected'}} @endif>Đã giao hàng</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="">Họ tên người nhận</label>
            <input class="form-control" type="text" name="fullName" id="fullName" value="{{$bill->fullName}}">
            <label for="">Địa chỉ</label>
            <input class="form-control" type="text" name="address" id="address" value="{{$bill->address}}">
            <label for="">Số điện thoại</label>
            <input class="form-control" type="text" name="phoneNumber" id="phoneNumber" value="{{$bill->phoneNumber}}">
            <label for="">Ghi chú</label>
            <textarea class="form-control" name="description" id="description" cols="30" rows="3" data-value="{{$bill->description}}"></textarea>
        </div>
        <div class="col-md-4">
            <div style="margin-top: 20px">
                <img src="{{$bill->product->getImage()}}" alt="" style="max-width: 200px">
            </div>
        </div>
    </div>
</div>