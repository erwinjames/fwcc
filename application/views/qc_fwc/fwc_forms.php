<link rel="stylesheet" href="<?php echo base_url(); ?>font-awesome-4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/plug-ins/f2c75b7247b/integration/bootstrap/3/dataTables.bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/1.0.4/css/dataTables.responsive.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
<div class="container my-5">
    <div class="card shadow">
        <center><img src="<?php echo base_url('assets/images/logo.png'); ?>" alt="fwc" width="10%">
            <h4>HEALTH CONTAMINATION LOG</h4>
        </center>
        <div class="table-container">
            <div class="row">
                <div class="col-xs-12">

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="bg-gray-200">
                                    <tr>
                                        <th rowspan="2" class="px-4 py-2 text-left">Report Date</th>
                                        <th rowspan="2" class="px-4 py-2 text-left">Employee Name</th>
                                        <th rowspan="2" class="px-4 py-2 text-left">Observation</th>
                                        <th rowspan="2" class="px-4 py-2 text-left">Comments/ Additional Symptoms</th>
                                        <th rowspan="2" class="px-4 py-2 text-left">Date Returned to Work</th>
                                        <th colspan="2" class="px-4 py-2 text-center">Diagnosed with a Pathogen?</th>
                                        <th colspan="2" class="px-4 py-2 text-center" name="ifdiag">If diagnosed, is a local health agency contacted?</th>
                                        <td>Add</th>
                                    </tr>
                                    <tr>
                                        <th class="px-4 py-2 text-center">YES</th>
                                        <th class="px-4 py-2 text-center">NO</th>
                                        <th class="px-4 py-2 text-center">YES</th>
                                        <th class="px-4 py-2 text-center">NO</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <form id="fwcForm">
                                        <tr>
                                            <td class="px-4 py-2"><input class="form-control" id="datepicker" name="rd"></td>
                                            <td class="px-4 py-2"><input class="form-control" name="en" type="text"></td>
                                            <td class="px-4 py-2"><textarea class="form-control" name="obs" type="text"></textarea></td>
                                            <td class="px-4 py-2"><textarea class="form-control" name="ca" type="text"></textarea></td>
                                            <td class="px-4 py-2"><input class="form-control" id="datepicker1" name="dr"></td>
                                            <td class="px-4 py-2 text-center"><input class="form-check-input" name="pathogen" id="pathogen" value="1" type="radio"></td>
                                            <td class="px-4 py-2 text-center"><input class="form-check-input" type="radio" name="pathogen" value="0" id="pathogen"></td>
                                            <td class="px-4 py-2 text-center"><input class="form-check-input" type="radio" name="contacted" value="1" id="contacted"></td>
                                            <td class="px-4 py-2 text-center"><input class="form-check-input" type="radio" name="contacted" value="0" id="contacted"></td>
                                            <td class="px-4 py-2 text-center"> <button class="btn b-level-1 b-type-6" type="submit" id="button_1"><i class="fa fa-plus-square" aria-hidden="true"></i></button></td>
                                        </tr>
                                    </form>
                                </tbody>
                                <tbody id="fwcTableData">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="<?php echo base_url(); ?>jquery/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdn.datatables.net/1.10.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/f2c75b7247b/integration/bootstrap/3/dataTables.bootstrap.js"></script>
    <script src="https://cdn.datatables.net/responsive/1.0.4/js/dataTables.responsive.js"></script>
    <script>
        $(document).ready(function() {
            var url = '<?php echo base_url(); ?>';
            showTable();

            function showTable() {
                var url = '<?php echo base_url(); ?>';
                $.ajax({
                    type: 'POST',
                    url: url + 'forms/fwc_show',
                    success: function(response) {

                        $('#fwcTableData').html(response);
                    }
                });
            }
            // add table
            $('#fwcForm').on('submit', function(e) {
                e.preventDefault();
                $('#fwcForm').attr('disabled', true);
                const addRecord = new FormData(this);
                $.ajax({
                    url: url + 'forms/fwc_insert',
                    method: 'POST',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: addRecord,
                    success: function(response) {

                        if (response == "success") {
                            Swal.fire({
                                icon: 'success',
                                title: 'Added',
                                text: 'Record Successfully Added!',
                                padding: '4em',
                                showConfirmButton: false,
                                timer: 1000
                            });
                            showTable();
                            $('#fwcForm')[0].reset();
                        } else {
                            console.log("Insert failed.");
                        }
                        $('#fwcForm').attr('disabled', false);
                    },
                    error: (error) => {
                        console.log(JSON.stringify(error));
                    }

                });
            });
            // update
            $(document).on('submit', '#drUpdateForm', function(e) {
                e.preventDefault()
                const updateDataRecord = new FormData(this)
                $.ajax({
                    url: url + 'forms/fwc_update',
                    method: 'POST',
                    data: updateDataRecord,
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function(res) {

                        Swal.fire({
                            icon: 'success',
                            title: 'Updated',
                            text: 'Record Updated Successfully!',
                            padding: '4em',
                            showConfirmButton: false,
                            timer: 1000
                        });
                        showTable();
                        $('#fwcForm')[0].reset();
                    },
                    error: function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong! Please try again later.',
                            padding: '4em',
                            showConfirmButton: true
                        });
                    }
                });
            })

        });
    </script>
    <script>
        $(document).ready(function() {
            $("#datepicker").datepicker();
            $("#datepicker1").datepicker();
            $("#datepik").datepicker();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('table').DataTable();
        });
    </script>
</div>