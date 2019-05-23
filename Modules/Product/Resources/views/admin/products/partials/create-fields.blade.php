<div class="box-body">
    <div class="row">
        <div class="col-md-9">
            <label for="name">Product name</label>
            <input class="form-control" type="text" name="name" id="name">
            <div class="row">
                <div class="col-md-6">
                    <label for="">Cost</label>
                    <input class="form-control" type="number" name="cost" id="cost">
                </div>
                <div class="col-md-6">
                    <label for="">Status</label>
                    <select class="form-control" name="status" id="">
                        <option value="sell">Selling</option>
                        <option value="not sold">Not sold</option>
                    </select>
                </div>
            </div>
            <label for="description">Description</label>
            <input class="form-control" type="text" name="description" id="description">
        </div>
        <div class="col-md-3">
            @mediaSingle('avatar')
        </div>
    </div>
</div>
