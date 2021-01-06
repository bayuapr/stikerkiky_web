<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Form Update Data Product</h1>
        </div>

        <div class="card">
            <div class="card-body">
                <?php foreach ($product as $pd) : ?>
                    <form action="<?php echo base_url('admin/data_product/update_product_action') ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Name Product</label>
                            <input type="hidden" name="id_pelanggan" value="<?php echo $pd->id_product ?>">
                            <input type="text" name="name_product" class="form-control" value="<?php echo $pd->name_product ?>">
                            <?php echo form_error('name_product', '<div class="text-small text-danger">', '</div>') ?>
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" name="description" class="form-control" value="<?php echo $pd->description ?>">
                            <?php echo form_error('description', '<div class="text-small text-danger">', '</div>') ?>
                        </div>

                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option <?php if ($pd->status == "1") {
                                            echo " selected='selected'";
                                        }
                                        echo $pd->status; ?> value="1">available</option>
                                <option <?php if ($pd->status == "0") {
                                            echo " selected='selected'";
                                        }
                                        echo $pd->status; ?> value="0">not available</option>
                            </select>
                            <?php echo form_error('status', '<div class="text-small text-danger">', '</div>') ?>

                            <div class="form-group">
                                <label>Price</label>
                                <input type="text" name="price" class="form-control" value="<?php echo $pd->price ?>">
                                <?php echo form_error('price', '<div class="text-small text-danger">', '</div>') ?>
                            </div>

                            <div class="form-group">
                                <label>Photo</label>
                                <p>the photo before</p>
                                <img src="<?php echo base_url('assets/upload/' . $pd->photo) ?>" width="400px">
                                <hr>
                                <?php echo form_open_multipart('editUpload'); ?>
                                <input type="file" name="photo" class="form-control" value="<?php echo $pd->photo ?>">
                            </div>
                            <button type="submit" class="btn btn-primary mt-4">Save</button>
                            <button type="reset" class="btn btn-danger mt-4">Reset</button>
                            <?php echo form_close(); ?>
                        </div>
                    </form>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</div>