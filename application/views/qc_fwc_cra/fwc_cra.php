<link rel="stylesheet" href="<?php echo base_url(); ?>font-awesome-4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/plug-ins/f2c75b7247b/integration/bootstrap/3/dataTables.bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/1.0.4/css/dataTables.responsive.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/sumoselect.min.css">
<style>
    .modal-backdrop.show {
        z-index: -1;
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

    /* The Modal (background) */
    .modal {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 1;
        /* Sit on top */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.4);
        /* Black w/ opacity */
    }

    /* Modal Content/Box */
    .modal-content {
        margin: 5% auto;
        /* 15% from the top and centered */
        padding: 10px;
        border: 1px solid #888;
        width: 80%;
        /* Could be more or less, depending on screen size */
    }

    /* The Close Button */
    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }
    .signature-pad {
        border-radius: 2px;
        border: 1px dashed #ccc;
        cursor: crosshair;
        width:300px;
        height: auto;
    }
</style>
<div class="container my-5">
    <div class="card shadow">
        <div>
            <center>
                <div id="cra_fwcTablelegend"></div>

            </center>
        </div>
        <div>
            <h4>Clothing Risk Analysis</h4>
        </div>
        <button class="btn" type="button" data-toggle="modal" data-target="#form"><i class="fa fa-plus" aria-hidden="true"></i></button>
        <form method="POST" enctype="multipart/form-data">
            <div id="cra_fwcTableData">
            </div>
                <table class="table table-bordered" style=" font-size: 13px!important;">
                    <tr style="background:#E8E8E8">
                        <td class="text-center fw-bold">Reviewed by</td>
                        <td class="text-center fw-bold">Approved by</td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <div class="m-3 mb-5" style="display:flex; justify-content:center;">
                                <div>
                                    <select id="main-sig-selection1" class="mb-1 p-1">
                                        <option value="D1">Select Signature Option</option>
                                        <option value="D1">Draw Signature</option>
                                        <option value="U1">Upload Signature</option>
                                    </select>
                                    <div id="showD1" class="signature1" style="display:flex; justify-content:center">
                                        <div class="signature-pad-container">
                                            <div style="" class="signature-pad"  id="signature-pad-1"></div><br>
                                            <button type="button" class="border-1 bg-success text-light rsig-submitBtn" id="">Confirm Signature</button>
                                            <button type="button" class="clear-btn1 border-1" id="">Clear</button>
                                            <textarea type="text" class="signature-data-text1 d-none" name="reviewer_sign" value="" readonly></textarea>
                                        </div>
                                    </div><br>
                                    <div id="showU1" class="signature1 d-none">
                                        <input type="file"  id="m-actual-image1" name="reviewer_sign_img" onchange="dataURLv(this,1)" style="margin-bottom:7px;"/><br>
                                        <img id="m-actual-image-res1" width="220" height="80" src="#"/><br>
                                        <button class="border-1 mt-1" type="button" id="reset-image-val1">Remove</button>
                                    </div>

                                    <div id="image-sig-r" class="d-none">
                                        <div class="rimg-signature"></div><br>
                                        <button class="border-1 mt-1" type="button" id="rclear-image">Remove</button>
                                    </div><br>

                                    <div class="input-group input-group-sm">
                                        <input type="text" class="form-control mb-1" required name="reviewer_name" placeholder="Name">
                                    </div>
                                        
                                    <div class="input-group input-group-sm">
                                        <input type="text" class="form-control mb-1" required name="r_position" placeholder="Position">
                                    </div>
                                        
                                    <div class="input-group input-group-sm">
                                        <input type="datetime-local" class="form-control" required name="reviewed_date">
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="m-3 mb-5" style="display:flex; justify-content:center;">
                               <div>
                                    <select id="main-sig-selection2" class="mb-1 p-1">
                                        <option value="D2">Select Signature Option</option>
                                        <option value="D2">Draw Signature</option>
                                        <option value="U2">Upload Signature</option>
                                    </select>
                                <div id="showD2" class="signature2" style="display:flex; justify-content:center">
                                    <div class="signature-pad-container">
                                        <div style="" class="signature-pad" id="signature-pad-2"></div><br>
                                        <button type="button" class="border-1 bg-success text-light asig-submitBtn" id="">Confirm Signature</button>
                                        <button type="button" class="clear-btn2 border-1" id="">Clear</button>
                                        <textarea type="text" class="signature-data-text2 d-none" name="approver_sign" value="" readonly></textarea>
                                    </div>
                                </div><br>
                                <div id="showU2" class="signature2 d-none">
                                    <input type="file"  id="m-actual-image2" name="approver_sign_img" onchange="dataURLv(this,2)" style="margin-bottom:7px;"/><br>
                                    <img id="m-actual-image-res2" width="220" height="80" src="#"/><br>
                                    <button class="border-1 mt-1" type="button" id="reset-image-val2">Remove</button>
                                </div>
                                <div id="image-sig-a" class="d-none">
                                    <div class="aimg-signature"></div><br>
                                    <button class="border-1 mt-1" type="button" id="aclear-image">Remove</button>
                                </div><br>

                                    <div class="input-group input-group-sm">
                                        <input type="text" class="form-control mb-1" required name="approver_name" placeholder="Name">
                                    </div>
                                        
                                    <div class="input-group input-group-sm">
                                        <input type="text" class="form-control mb-1" required name="a_position" placeholder="Position">
                                    </div>
                                        
                                    <div class="input-group input-group-sm">
                                        <input type="datetime-local" class="form-control" required name="approved_date">
                                    </div>
                               </div>
                            </div>
                        </td>
                    </tr>
                </table>
<center>
<input type="submit" name="save_record" style="padding:5px;width:100px;" class="btn btn-success" value="Save">
</center>
        </form>

        <!-- 2nd -->
</div>
<!-- modal -->
<div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
  
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#" method="post" id="fwc_cra_insertRecord">
            <div class="modal-body">
                
                    <div class="row">
                        <div class="col-md-12">
                            <label for="#" class="mb-2 mt-3 form-label" style="color:#212529; font-size:17px">Proccessing Steps</label>
                            <textarea type="text" class="form-control" required name="p_steps" placeholder="Steps here.."></textarea>
                            <br>
                            <?php
                        $query = $this->db->query('SELECT * FROM cra_legend LIMIT 1');
                        $rows = $query->result();
                    ?>
                    <?php if (count($rows) > 0) { ?>
                        <?php foreach ($rows as $row) { ?>
                            <input type="hidden" name="hazards_code[]" value="<?php echo $row->legend_id; ?>">
                            <input type="hidden" name="legend_justify[]" value="<?php echo $row->legend_justify; ?>">
                            <input type="hidden" name="legend_applied_record[]" value="<?php echo $row->legend_applied_record; ?>">
                        <?php } ?>
                    <?php } ?>

                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <input type="submit" id="addRecordBtn" class="btn-primary" value="Okay">
           
            </div>
            </form>
        </div>
    </div>
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
<script src="https://cdn.datatables.net/1.10.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/f2c75b7247b/integration/bootstrap/3/dataTables.bootstrap.js"></script>
<script src="https://cdn.datatables.net/responsive/1.0.4/js/dataTables.responsive.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jSignature/2.1.3/jSignature.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.sumoselect.min.js"></script>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->

<script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on an element with class "open-modal", open the modal
    document.addEventListener('click', function(event) {
        if (event.target.classList.contains('open-modal')) {
            modal.style.display = "block";
        }
    });

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>

<script>
    $(document).ready(function() {
        $('.search_test').SumoSelect({
            search: true,
            searchText: 'Enter here.'
        });
        var url = '<?php echo base_url(); ?>';
        cra_showTable();

        function cra_showTable() {
            var url = '<?php echo base_url(); ?>';
            $.ajax({
                type: 'POST',
                url: url + 'forms/cra_show',
                success: function(response) {

                    $('#cra_fwcTableData').html(response);
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

        // add table
        $('#fwcForm').on('submit', function(e) {
            e.preventDefault();
            $('#fwcForm').attr('disabled', true);
            const addRecord = new FormData(this);
            $.ajax({
                url: url + 'forms/cra_insert',
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
                        $('#cra_fwcForm')[0].reset();
                    } else {
                        console.log("Insert failed.");
                    }
                    $('#fwcForm').attr('disabled', false);
                },

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
        // contenteditable
        $(document).on('blur', '.edit', function() {
            var td_id = $(this).attr('id');
            var data_id = $(this).data('id');
            var new_value = $(this).text();
            // Send an AJAX request to update the data in the database
            $.ajax({
                url: url + 'forms/update_legend_desc',
                method: 'POST',
                data: {
                    td_id: td_id,
                    data_id: data_id,
                    new_value: new_value
                },
                success: function(response) {
                    cra_showTable();

                }
            });
        })
        $(document).on('blur', '.legend_desc', function() {
            var data_id = $(this).data('id');
            var new_desc = $(this).text();
            // Send an AJAX request to update the data in the database
            $.ajax({
                url: url + 'forms/up_legend_desc',
                method: 'POST',
                data: {
                    data_id: data_id,
                    new_desc: new_desc
                },
                success: function(response) {
                    cra_showTable();
                }
            });
        })
        $(document).on('blur', '.p_step', function() {
            var p_id = $(this).attr('id');
            var new_step = $(this).text();
            // Send an AJAX request to update the data in the database
            $.ajax({
                url: url + 'forms/cra_processing_step',
                method: 'POST',
                data: {
                    p_id: p_id,
                    new_step: new_step
                },
                success: function(response) {
                    cra_showTable();
                }
            });
        })
        $(document).on('blur', '.fwc_cra_edit', function() {
            var fwc_cra_id = $(this).attr('id');
            var data_id = $(this).data('id');
            var fwc_new_desc = $(this).text();
            // Send an AJAX request to update the data in the database
            $.ajax({
                url: url + 'forms/fwc_cra_tbl_edit',
                method: 'POST',
                data: {
                    fwc_cra_id: fwc_cra_id,
                    fwc_new_desc: fwc_new_desc,
                    data_id: data_id
                },
                success: function(response) {
                    // cra_showTable();
                    console.log(response);
                }
            });
        })
        $('#fwc_cra_insertRecord').on('submit', function(e) {
            e.preventDefault();
            var form_data = $(this).serializeArray();
            var selectedValues = $('.search_test').val();
            form_data.push({
                name: 'hazard_code',
                value: selectedValues
            });
            $.ajax({
                url: url + 'forms/cra_insert_record',
                method: 'POST',
                data: form_data,
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Updated',
                        text: 'Record Updated Successfully!',
                        padding: '4em',
                        showConfirmButton: false,
                        timer: 1000
                    });
                    location.reload();
                    cra_showTable();
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
                // error: (error) => {
                //     console.log(JSON.stringify(error));
                // }

            });
        });

        $(document).on('click', '.delete_child', function(event) {
            event.preventDefault();
            var p_id = $(this).attr('id');
            // Send an AJAX request to update the data in the database
            $.ajax({
                url: url + 'forms/cra_delete_child',
                method: 'POST',
                data: {
                    id: p_id
                },
                success: function(response) {
                    cra_showTable();
                    console.log(response);
                }
            });
        });
        $(document).on('click', '.add_child', function(event) {
            event.preventDefault();
            var p_id = $(this).attr('id');
            var legen_id = $(this).data('id');
            // Send an AJAX request to update the data in the database
            $.ajax({
                url: url + 'forms/cra_add_child',
                method: 'POST',
                data: {
                    id: p_id,
                    l_id: legen_id
                },
                success: function(response) {
                    cra_showTable();
                    console.log(response);
                },
                error: (error) => {
                    console.log(JSON.stringify(error));
                }
            });
        });
        $(document).on('click', '.p_step_remove', function(event) {
            event.preventDefault();
            var p_id_r = $(this).attr('id');
            // Send an AJAX request to update the data in the database
            $.ajax({
                url: url + 'forms/remove_parent',
                method: 'POST',
                data: {
                    id: p_id_r
                },
                success: function(response) {
                    cra_showTable();
                    console.log(response);
                }
            });
        });

        // $('#fwc_form_submit').submit(function(event) {
        //     event.preventDefault(); // Prevent the form from submitting normally
        //     // Get the form data
        //     var formData = $(this).serialize();

        //     // Send the form data using AJAX
        //     $.ajax({
        //         url: url + 'forms/cra_insertRecord',
        //         type: 'GET',
        //         data: formData,
        //         success: function(response) {
        //                 console.log(response);

        //         },
        //         error: (error) => {
        //             console.log(JSON.stringify(error));
        //         }
        //     });
        // });

    });
</script>
<script>
    var url = '<?php echo base_url(); ?>';

    function cra_showTable() {
        var url = '<?php echo base_url(); ?>';
        $.ajax({
            type: 'POST',
            url: url + 'forms/cra_show',
            success: function(response) {

                $('#cra_fwcTableData').html(response);
            }
        });
    }

    function updateRadioValue(element) {
        if (element.checked === true) {

            $.ajax({
                url: url + 'forms/update_check',
                method: 'POST',
                data: {
                    id: element.id,
                    value: element.value,
                    data_column: element.dataset.column
                },
                success: function(response) {
                    cra_showTable();
                }
            });
        } else {
            console.log("not");
        }
    }
</script>
<script>
   
   for(let id = 0; id < 4; id++) {
        $('#main-sig-selection'+id).on('change', function(){
            var demovalue = $(this).val(); 
            $('div.signature'+id).addClass('d-none');
            $('#show'+demovalue).removeClass('d-none');
            $('#sign_type'+id).val(demovalue);
        });  
        
        $('#reset-image-val'+id).on('click', function() {     
            $('#m-actual-image'+id).val('');
            $('#m-actual-image-res'+id).removeAttr('src');
         $('#main-sig-selection'+id).attr('disabled', false)
        });
    }

    $('#signature-pad-1').jSignature();
    $('.clear-btn1').click(function(){
        $(this).siblings('#signature-pad-1').jSignature('clear');
        $(this).siblings('.signature-data-text1').val('');
        $('#main-sig-selection1').attr('disabled', false)
    });
    $('#signature-pad-1').on('change', function(){
        var signatureData = $(this).jSignature('getData', 'default');
        $(this).siblings('.signature-data-text1').val(signatureData);
        $('#main-sig-selection1').attr('disabled', true)
    });

    $('.rsig-submitBtn').on('click', function(){
        $('#image-sig-r').toggleClass('d-none')
        $('#showD1').toggleClass('d-none')
        var data = $('#signature-pad-1').jSignature('getData', 'default');
        var image = new Image();
        image.src = data;
        $('.rimg-signature').append(image);
    })

    $('#rclear-image').on('click', function(){
        $('#showD1').toggleClass('d-none')
        $('#image-sig-r').toggleClass('d-none')
        $('#signature-pad-1').jSignature('clear');
        $('.signature-data-text1').val('');
         $('.rimg-signature').empty();
    })


    // Approver
    $('#signature-pad-2').jSignature();
    $('.clear-btn2').click(function(){
        $(this).siblings('#signature-pad-2').jSignature('clear');
        $(this).siblings('.signature-data-text2').val('');
        $('#main-sig-selection2').attr('disabled', false)
    });
        $('#signature-pad-2').on('change', function(){
        var signatureData = $(this).jSignature('getData', 'default');
        $(this).siblings('.signature-data-text2').val(signatureData);
        $('#main-sig-selection2').attr('disabled', true)
    });

    $('.asig-submitBtn').on('click', function(){
        $('#image-sig-a').toggleClass('d-none')
        $('#showD2').toggleClass('d-none')
        var data = $('#signature-pad-2').jSignature('getData', 'default');
        var image = new Image();
        image.src = data;
        $('.aimg-signature').append(image);
    })

    $('#aclear-image').on('click', function(){
        $('#showD2').toggleClass('d-none')
        $('#image-sig-a').toggleClass('d-none')
        $('#signature-pad-2').jSignature('clear');
        $('.signature-data-text2').val('');
         $('.aimg-signature').empty();
    })

    function dataURLv(input,id) {
        if (input.files && input.files[0]) {
        var reader = new FileReader();
            reader.onload = function(e) {
            $("#m-actual-image-res"+id).attr('src', e.target.result);
               $('#main-sig-selection'+id).attr('disabled', true)
            }               
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
</div>