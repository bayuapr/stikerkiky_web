<div class="main-content">
    <div class="section">
        <div class="section-header">
            <h1>Form Add Product</h1>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form method="POST" action="<?php echo base_url('admin/data_product/add_product_action') ?>" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Name Product</label>
                    <input type="text" name="name_product" class="form-control">
                    <?php echo form_error('name_product', '<div class="text-small text-danger">', '</div>') ?>
                </div>

                <div class="form-group">
                    <label>Desciption</label>
                    <input type="text" name="description" class="form-control">
                    <?php echo form_error('description', '<div class="text-small text-danger">', '</div>') ?>
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="">--Select Status--</option>
                        <option value="1">available</option>
                        <option value="0">not available</option>
                    </select>
                    <?php echo form_error('status', '<div class="text-small text-danger">', '</div>') ?>
                </div>

                <div class="form-group">
                    <label>Price</label>
                    <input type="text" name="price" class="form-control">
                    <?php echo form_error('price', '<div class="text-small text-danger">', '</div>') ?>
                </div>

                <div class="form-group">
                    <label>Photo</label>
                    <input type="file" name="photo" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
                <button type="reset" class="btn btn-danger">Reset</button>
            </form>
        </div>
    </div>
</div>