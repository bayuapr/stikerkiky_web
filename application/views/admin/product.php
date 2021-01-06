<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Product</h1>
        </div>
        <div class="card">
            <div class="card-body">
                <a href="<?php echo base_url('admin/data_product/add_product') ?>" class="btn btn-primary mb-3">Add Data</a>

                <?php echo $this->session->flashdata('pesan') ?>
                <div class="form-inline float-right mb-3">
                    <?php echo form_open('admin/data_product/cari') ?>
                    <input type="text" name="keyword" class="form-control" placeholder="Cari">
                    <button type="submit" class="btn btn-success">Cari</button>
                    <?php echo form_close() ?>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover table-striped tab-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Photo</th>
                                <th>Name Product</th>
                                <th>Status</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                $no = 1;
                                foreach ($product as $pd) : ?>
                                    <td><?php echo $no++ ?></td>
                                    <td><img width="60px" src="<?php echo base_url() . 'assets/upload/' . $pd->photo ?>"></td>
                                    <td><?php echo $pd->name_product ?></td>
                                    <td><?php
                                        if ($pd->status == "0") {
                                            echo "<span class='badge badge-danger'>not available</span>";
                                        } else {
                                            echo "<span class='badge badge-primary'>available</span>";
                                        }

                                        ?></td>
                                    <td><?php echo $pd->price ?></td>
                                    <td>
                                        <a href="<?php echo base_url('admin/data_product/detail_product/') . $pd->id_product ?>" class="btn btn-sm btn-success"><i class="fas fa-eye"></i> <a>
                                                <a href="<?php echo base_url('admin/data_product/delete_product/') . $pd->id_product ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> <a>
                                                        <a href="<?php echo base_url('admin/data_product/update_product/') . $pd->id_product ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> <a>
                                    </td>
                            </tr>
                        <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>

            </div>
    </section>
</div>