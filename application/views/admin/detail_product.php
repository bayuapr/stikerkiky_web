<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Product</h1>
        </div>
    </section>
    <?php foreach ($detail as $dt) : ?>
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-md-5">
                        <img width="300px" src="<?php echo base_url() . 'assets/upload/' . $dt->photo ?>" alt="">
                    </div>
                    <div class="col-md-7">
                        <table class="table">
                            <tr>
                                <td>Nama Product</td>
                                <td><?php echo $dt->name_product ?></td>
                            </tr>
                            <tr>
                                <td>Description</td>
                                <td><?php echo $dt->description ?></td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>
                                    <?php
                                    if ($dt->status == "0") {
                                        echo "<span class='badge badge-danger'>not available</span>";
                                    } else {
                                        echo "<span class='badge badge-primary'>available</span>";
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Price</td>
                                <td>Rp. <?php echo number_format($dt->price, 0, ',', '.')  ?></td>
                            </tr>
                        </table>
                        <a class="btn btn-sm btn-danger ml-4" href="<?php echo base_url('admin/data_product') ?>">Back</a>
                        <a class="btn btn-sm btn-primary" href="<?php echo base_url('admin/data_product/update_product/' . $dt->id_product) ?>">Update</a>
                    </div>

                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>