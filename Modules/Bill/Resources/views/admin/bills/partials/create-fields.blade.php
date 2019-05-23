<div class="box-body">
    <label for="">Chọn sản phẩm</label>
    <select class="form-control" name="product_id" id="product_id">
        @foreach($products as $item)
            <option value="{{$item->id}}">{{$item->name}}</option>
        @endforeach
    </select>
    <div class="row">
        <div class="col-md-4">
            <label for="">Số lượng</label>
            <input class="form-control" type="number" name="quantity" id="quantity">
            <label for="">Đơn giá</label>
            <input class="form-control" type="text" name="" id="">
            <label for="">Thành tiền</label>
            <input class="form-control" type="number" name="totalMoney" id="totalMoney">
            <label for="">Trạng thái</label>
            <select class="form-control" name="status" id="status">
                <option value="order">Đặt hàng</option>
                <option value="shipping">Đang vận chuyển</option>
                <option value="cancel">Hủy đơn</option>
                <option value="return">Đổi trả</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="">Họ tên người nhận</label>
            <input class="form-control" type="text" name="fullName" id="fullName">
            <label for="">Địa chỉ</label>
            <input class="form-control" type="text" name="address" id="address">
            <label for="">Số điện thoại</label>
            <input class="form-control" type="text" name="phoneNumber" id="phoneNumber">
            <label for="">Ghi chú</label>
            <textarea class="form-control" name="description" id="description" cols="30" rows="3"></textarea>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>
