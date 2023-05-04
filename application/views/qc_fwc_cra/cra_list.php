<link rel="stylesheet" href="<?php echo base_url(); ?>font-awesome-4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/plug-ins/f2c75b7247b/integration/bootstrap/3/dataTables.bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/1.0.4/css/dataTables.responsive.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/sumoselect.min.css">
<style>
    .signature-container {
        text-align: center;
        font-family: Arial, sans-serif;
        font-size: 16px;
        flex-basis: 50%;
        /* Set the width of each signature container to 50% */
    }

    .signature-container hr {
        border: none;
        border-top: 1px solid #000;
        width:300px;

    }

    .signature-container .name {
        font-weight: bold;
        margin-bottom: 5px;
    }

    .signature-container .position {
        margin-bottom: 5px;
    }

    .signature-container .date {
        margin-top: 5px;
    }

    /* Flexbox styles */
    .signature-container-wrapper {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .custom-radio {
        position: relative;
        display: inline-block;
        vertical-align: middle;
        margin-right: 10px;
        cursor: pointer;
        font-size: 16px;
    }

    .custom-radio input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
    }

    .checkmark {
        position: absolute;
        top: 0;
        left: 0;
        height: 20px;
        width: 20px;
        background-color: #fff;
        border: 1px solid #ccc;
    }

    .custom-radio:hover input~.checkmark {
        border-color: #666;
    }

    .custom-radio input:checked~.checkmark {
        background-color: #ccc;
        border-color: #666;
    }

    .checkmark:after {
        content: "";
        position: absolute;
        display: none;
    }

    .custom-radio input:checked~.checkmark:after {
        display: block;
    }

    .checkmark:after {
        left: 6px;
        top: 2px;
        width: 5px;
        height: 10px;
        border: solid #666;
        border-width: 0 2px 2px 0;
        transform: rotate(45deg);
    }

    td p {
        word-wrap: break-word;
    }

    .modal-backdrop {
        z-index: -1;
    }
</style>
<!-- Modal -->
<!--  This is the modal content -->
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div style="width: 1090px;" class="modal-content">
            <div id="cra_fwcTableData_record">
            </div>

        </div>
    </div>
</div>
<div class="container my-5">
    <div class="card shadow">
        <center><img src="<?php echo base_url('assets/images/logo.png'); ?>" alt="fwc" width="10%">
            <h4>Clothing Risk Analysis Record</h4>
        </center>
        <div class="table-container">

            <div class="row">

                <div class="container table-responsive py-5">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Record #</th>
                                <th scope="col">Date Recorded</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="cra_show_list_data">

                        </tbody>
                    </table>




                </div>



                <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
                </script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
                </script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
                </script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>

                <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
                <script src="<?php echo base_url(); ?>jquery/jquery.min.js"></script>
                <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

                <!-- Optional JavaScript -->
                <!-- jQuery first, then Popper.js, then Bootstrap JS -->
                <script>
                    $(document).ready(function() {
                        var url = '<?php echo base_url(); ?>';
                        cra_showTable_list();

                        function cra_showTable_list() {
                            var url = '<?php echo base_url(); ?>';
                            $.ajax({
                                type: 'POST',
                                url: url + 'forms/cra_show_list_data',
                                success: function(response) {

                                    $('#cra_show_list_data').html(response);
                                }
                            });
                        }
                        cra_legend();

                        function cra_legend() {
                            var url = '<?php echo base_url(); ?>';
                            $.ajax({
                                type: 'POST',
                                url: url + 'forms/cra_legend_show',
                                success: function(response) {

                                    $('#cra_fwcTablelegend').html(response);
                                }
                            });
                        }

                        $('.modal-content').resizable({
                            //alsoResize: ".modal-dialog",
                            minHeight: 300,
                            minWidth: 300
                        });
                        $('.modal-dialog').draggable();

                        $('#myModal').on('show.bs.modal', function() {
                            $(this).find('.modal-body').css({
                                'max-height': '100%'
                            });
                        });
                    });
                    // Attach a click event listener to the PDF download button
                    $(document).on('click', '.pdfDownload', function(event) {
                        event.preventDefault();
                        var url = '<?php echo base_url(); ?>';
                        var p_id = $(this).attr('id');

                        // Make an AJAX request to the PDF generation endpoint
                        $.ajax({
                            url: url + 'forms/pdf',
                            method: 'POST',
                            data: {
                                id: p_id
                            },
                            xhrFields: {
                                responseType: 'blob' // Set the response type to blob
                            },
                            success: function(response) {
                                // Create a new blob object
                                var blob = new Blob([response], {
                                    type: 'application/pdf'
                                });

                                // Create a URL for the blob object
                                var url = URL.createObjectURL(blob);

                                // Use the URL to download the file
                                var a = document.createElement('a');
                                a.href = url;
                                a.download = 'example.pdf';
                                document.body.appendChild(a);
                                a.click();
                            },
                            error: function(error) {
                                console.log(JSON.stringify(error));
                            }
                        });
                    });
                    $(document).on('click', '.pdfPrint', function(event) {
                        event.preventDefault();
                        var url = '<?php echo base_url(); ?>';
                        var p_id = $(this).attr('id');

                        // Make an AJAX request to the PDF generation endpoint
                        $.ajax({
                            url: url + 'forms/pdf',
                            method: 'POST',
                            data: {
                                id: p_id
                            },
                            xhrFields: {
                                responseType: 'blob' // Set the response type to blob
                            },
                            success: function(response) {
                                console.log(response);
                                // Create a new blob object
                                var blob = new Blob([response], {
                                    type: 'application/pdf'
                                });

                                // Create a URL for the blob object
                                var url = URL.createObjectURL(blob);

                                // Open the PDF in a new window
                                var newWindow = window.open(url, '_blank');

                                // Wait for the PDF to load and trigger the print dialog
                                newWindow.addEventListener('load', function() {
                                    newWindow.print();
                                });
                            },
                            error: function(error) {
                                console.log(JSON.stringify(error));
                            }
                        });
                    });

                    $(document).on('click', '.cra_data_record', function(event) {
                        event.preventDefault();
                        var url = '<?php echo base_url(); ?>';
                        var p_id = $(this).attr('id');
                        // Send an AJAX request to update the data in the database
                        $.ajax({
                            url: url + 'forms/cra_show_table_record',
                            method: 'POST',
                            data: {
                                id: p_id
                            },
                            success: function(response) {
                                $('#cra_fwcTableData_record').html(response);
                                console.log(p_id);
                            },
                            error: (error) => {
                                console.log(JSON.stringify(error));
                            }
                        });
                    });
                </script>
            </div>
        </div>