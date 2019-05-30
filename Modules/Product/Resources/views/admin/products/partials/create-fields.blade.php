<div class="box-body">
    <div class="row">
        <div class="col-md-9">
            <label for="name">Tên sản phẩm</label>
            <input class="form-control" type="text" name="name" id="name">
            <div class="row">
                <div class="col-md-6">
                    <label for="">Đơn giá</label>
                    <input class="form-control" type="number" name="cost" id="cost">
                </div>
                <div class="col-md-6">
                    <label for="">trạng thái</label>
                    <select class="form-control" name="status" id="">
                        <option value="sell">Đang bán</option>
                        <option value="not sold">Ngừng bán</option>
                    </select>
                </div>
            </div>
            <label for="description">Mô tả sản phẩm</label>
            <input class="form-control" type="text" name="description" id="description">
        </div>
        <div class="col-md-3">
            @mediaSingle('avatar')
        </div>
    </div>
</div>
