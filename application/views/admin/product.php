<div id="page-wrapper">
    <div class="header">
        <h1 class="page-header">
            Data Product
        </h1>
        <ol class="breadcrumb">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Data Product</a></li>
        </ol>
    </div>
    <!-- /. ROW  -->
    <div id="page-inner">
            <div class="col-md-12">
                <!--   Kitchen Sink -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="<?php echo base_url('admin/') ?>" class="btn btn-primary">Add Product</a>
                    </div>
                    <div class="panel-body">
                        <?php echo $this->session->flashdata('pesan') ?>

                        <form class="form-inline float-right">
                            <div class="form-group">
                                <input type="email" class="form-control" id="exampleInputEmail2" placeholder="jane.doe@example.com">
                            </div>
                            <button type="submit" class="btn btn-default">Send invitation</button>
                        </form>

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name Product</th>
                                        <!-- <th>Description</th> -->
                                        <th>Picture</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php $no = 1;
                                        foreach ($product as $pd) : ?>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $pd->name_product ?></td>
                                            <!-- <td><?php echo $pd->description ?></td> -->
                                            <td><img width="60px" src="<?php echo base_url() . 'assets/upload/' . $pd->foto ?>"></td>
                                            <td><?php
                                                if ($pd->status == "0") {
                                                    echo "<span class='badge badge-danger'>Not Available</span>";
                                                } else {
                                                    echo "<span class='badge badge-primary'>Available</span>";
                                                }

                                                ?></td>
                                            <td> <a href="<?php echo base_url('admin/data_product/detail_product/') . $pd->id_product ?>" class="btn btn-sm btn-success"><i class="fas fa-eye"></i> <a>
                                                        <a href="<?php echo base_url('admin/data_product/delete_product/') . $pd->id_product ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> <a>
                                                                <a href="<?php echo base_url('admin/data_product/update_product/') . $pd->id_product ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> <a>

                                            </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- End  Kitchen Sink -->
            </div>
        
    </div>