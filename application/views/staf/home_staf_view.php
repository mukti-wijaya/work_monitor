<!DOCTYPE html>
<!--[if IE 9]>         <html class="no-js lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    <head>
        <?php $this->load->view('./include/include_style.php'); ?>
    </head>
    <body>
        <div id="page-wrapper">
            <div id="page-container" class="sidebar-partial sidebar-visible-lg sidebar-no-animations">

                <?php $this->load->view('./include/side_bar_staf.php'); ?>

                <!-- Main Container -->
                <div id="main-container">

                    <!-- Page content -->
                    <div id="page-content">
                        <!-- Datatables Header -->
                        <div class="content-header">
                            <div class="header-section">
                                <h1>
                                    <i class="fa fa-tachometer"></i>My Project<br><small></small>
                                </h1>
                            </div>
                        </div>
                        <ul class="breadcrumb breadcrumb-top">
                            <li><a href="">List Project</a></li>
                        </ul>
                        <!-- END Datatables Header -->

                        <!-- Datatables List Transfer -->
                        <div class="block full">
                            <div class="block-title">
                                <h2><strong>List Transfer Project</strong></h2>
                            </div>
                            <div class="table-responsive">
                                <table id="example-datatable" class="table table-vcenter table-condensed table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center">ID</th>
                                            <th class="text-center"><i class="gi gi-user"></i> Task Request</th>
                                             <th class="text-center">Name Transfer Task</th>
                                            <th class="text-center">Judul Task</th>
                                            <th class="text-center">Tanggal Task</th>
                                            <th class="text-center">Status Task</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; foreach ($data_task_transfer as $row): ?>
                                        <tr>
                                            <td class="text-center"><?php echo $no++; ?></td>
                                            <td class="text-center"><?php echo $row->task_request; ?></td>
                                            <td class="text-center">
                                                <?php
                                                    $query = $this->db->query("SELECT * FROM data_staf WHERE id_staf = '$row->kode_staf_transfer'");
                                                    $data_staf = $query->row();
                                                    echo $data_staf->nama_staf;
                                                ?>
                                            </td>
                                            <td class="text-center"><?php echo $row->judul_task; ?></td>
                                            <td class="text-center"><?php echo $row->tanggal_transfer; ?></td>
                                            <td class="text-center"><?php echo '<span class="label label-info"><i class="hi hi-transfer"></i> TRANSFER</span>'; ?></td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <a href="<?php echo base_url('staf/dashboard/confirm_transfer/'.$row->kode_transfer.'/'.$row->kode_project.'/'.$this->session->userdata('kode_staf').'/'.$row->kode_task.'/yes/'.$row->kode_staf_transfer); ?>" data-toggle="tooltip" title="Edit" class="btn btn-sm btn-success"><i class="fa fa-check"></i> Accept Task</a>
                                                    <a href="<?php echo base_url('staf/dashboard/detail_project_transfer/'.$row->kode_project.'/'.$this->session->userdata('kode_staf').'/'.$row->kode_task.'/'.$row->kode_staf_transfer); ?>" data-toggle="tooltip" title="Delete" class="btn btn-sm btn-default"><i class="fa fa-file-text-o"></i> Detail Job</a>
                                                    <a href="<?php echo base_url('staf/dashboard/confirm_transfer/'.$row->kode_transfer.'/'.$row->kode_project.'/'.$this->session->userdata('kode_staf').'/'.$row->kode_task.'/no/'.$row->kode_staf_transfer); ?>" data-toggle="tooltip" title="Delete" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>


                        <!-- Datatables List Project -->
                        <div class="block full">
                            <div class="block-title">
                                <h2><strong>List Project</strong></h2>
                            </div>
                            <div class="table-responsive">
                                <table id="example-datatable" class="table table-vcenter table-condensed table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center">ID</th>
                                            <th class="text-center"><i class="gi gi-user"></i> TaksTask Request</th>
                                            <th class="text-center">Judul Task</th>
                                            <th class="text-center">Tanggal Task</th>
                                            <th class="text-center">Status Task</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 1; foreach ($data_task as $row): ?>
                                        <tr>
                                            <td class="text-center"><?php echo $no++; ?></td>
                                            <td class="text-center"><?php echo $row->task_request; ?></td>
                                            <td class="text-center"><?php echo $row->judul_task; ?></td>
                                            <td class="text-center"><?php echo $row->tanggal_task; ?></td>
                                            <td class="text-center">
                                              <?php
                                                if ($row->status_task == 'Start'){
                                                    echo '<span class="label label-success"><i class="gi gi-lightbulb"></i> WAITING</span>';
                                                } else if ($row->status_task == 'Proses'){
                                                    echo '<span class="label label-danger"><i class="hi hi-fire"></i> PROCESS</span>';
                                                } else if ($row->status_task == 'Pending'){
                                                    echo '<span class="label label-warning"><i class="hi hi-time"></i> PENDING</span>';
                                                } else if ($row->status_task == 'Waiting Request') {
                                                    echo '<span class="label label-warning"><i class="gi gi-roundabout fa-spin"></i> WAITING TRANSFER</span>';
                                                }
                                              ?>

                                              </td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <a href="<?php echo base_url('staf/dashboard/pilih_transfer/'.$row->kode_project.'/'.$this->session->userdata('kode_staf').'/'.$row->kode_task); ?>" data-toggle="tooltip" title="Edit" class="btn btn-sm btn-info"><i class="hi hi-transfer"></i> Transfer Task</a>

                                                    <a href="<?php echo base_url('staf/dashboard/detail_project/'.$row->kode_project.'/'.$this->session->userdata('kode_staf').'/'.$row->kode_task); ?>" data-toggle="tooltip" title="Delete" class="btn btn-sm btn-default"><i class="fa fa-file-text-o"></i> Detail Job</a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- END Datatables Content -->
                    </div>
                    <!-- END Page Content -->
                </div>
                <!-- END Main Container -->
            </div>
            <!-- END Page Container -->
        </div>
        <!-- END Page Wrapper -->



        <?php $this->load->view('./include/include_script.php'); ?>
    </body>
</html>
