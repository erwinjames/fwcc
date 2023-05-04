<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH.'/libraries/fpdf/fpdf.php';

class Forms extends CI_Controller
{

    protected $content = '';

    public function __construct()
    {

        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('Quires');
    }
    // public function index()
    // {
    //     $this->load->view('qc_fwc/');
    // }

    public function cra_legend_show()
    {
        $image = base_url('assets/images/logo.png');
        $data = $this->Quires->show('cra_legend');
        $output = '';
        $output .= ' 

        <table class="table" style="width: 100%;font-size: 12px;">
           <center> <img src="' . $image . '" alt="fwc" width="10%"> </center>
           <br>
           <h5>Hazard Analysis</h5>
           <p style="font-size:12px">Hazard identification (column 2) considers known or reasonably
            foreseeable hazards (i.e., potential hazards) present in the food because 
           the hazard occurs naturally; the hazard may be unintentionally introduced.</p>
        ';
        foreach ($data as $row) {
            $output .= '
          
                <tbody style="background-color: #6c757d54;">
                    <tr>
                        <td style="font-size:10px"><b>' . $row->legend_name . '=</b></td>
                        <td><span style="font-size:10px">' . $row->legend_mean . '</span></td>
                    </tr>
                </tbody>
            ';
        }
        $output .= '</table>';
        echo $output;
    }
    public function print_pdf_with_image()
    {
        $this->load->library('pdf');
        $this->load->helper('file');
        $record_id = 3;
        $data = $this->Quires->cra_show_record($record_id);
        $logo_image = file_get_contents('assets/images/logo.png');
        $logo_data_uri = 'data:image/png;base64,' . base64_encode($logo_image);
        $html_content = '';
        $prev_processing_step = '';
        $html_content .= '
        <style>
        div.layout-978 { width: 978px; margin: 0px auto; }
        
        div.tblcontainer {
            padding: 18px;
            border: 1px solid #c0c0c0;
            margin: 20px auto;
            -moz-border-radius: 4px;
            -webkit-border-radius: 4px;
            border-radius: 4px; /* future proofing */
            -khtml-border-radius: 4px; /* for old Konqueror browsers */
            width: 93%;	
        }
        
        table {
            border-collapse: collapse;
          }
          
          td, th {
            border: 1px solid  #949494;
            padding: 8px;
          }
        
        .datagrid {
            border-collapse: collapse;
        }
        
        .datagrid thead tr th {
            background: #8080801f;
            color: #fffff;
            font-size: 11px;
            font-weight: normal;
            text-align: left;
            padding: 6px 8px;
            border: 1px solid #c9c9c9;
        }
        .datagrid tbody tr {
            background: #fff;
        }
        
        .datagrid tbody tr td {
            font-size: 10px;
            text-align:center;
            padding: 6px 8px;
            border: 1px solid #c9c9c9;
        }
       .signature-container-wrapper {
            width: 100%;
            max-width: 800px; /* set a maximum width for the table */
            margin: 0 auto;
            border-collapse: collapse;
            font-family: Arial, sans-serif;
            font-size: 16px;
            }


        .signature-container {
        padding: 10px;
        text-align: center;
        }

        .signature-container hr {
        border: none;
        border-top: 1px solid #000;
        margin: 10px 0;
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
        .datagrid tbody tr td.cash {
            text-align: right;
        }
        </style>
            <table class="datagrid"> 
            <center><img width="70%" src="'.$logo_data_uri.'"></center>
                <thead>
                    <tr>
                        <th rowspan="2">
                            Processing Step
                        </th>
                        <th colspan="2">
                            <p>Identify potential food safety hazards introduced, controlled, or enhanced at this step</p>
                        </th>
                        <th colspan="2">Do any potential food safety hazards require preventive control?</th>
                        <th rowspan="2">Justify your decision for column 3</th>
                        <th rowspan="2">
                            <p style="text-align:center;">Whatpreventive control measure(s) can be applied to significantly minimize or prevent the food safety hazard?Process including CCPs, Allergen, Sanitation, Supply- chain, other preventive control</p>
                        </th>
                        <th colspan="2">Is the preventive control applied at this step?</th>
                    </tr>
                    <tr>
                        <th></th>
                        <th></th>
                        <th>YES</th>
                        <th>NO</th>
                        <th>YES</th>
                        <th>NO</th>
                    </tr>
                </thead>
                <tbody >';
        foreach ($data as $key => $row) {
            $cra_prvntv_ctrl_true = ($row->cra_prvntv_ctrl_record == 1) ? '<input type="checkbox" value="" checked="checked" />' : '-';
            $cra_prvntv_ctrl_false = ($row->cra_prvntv_ctrl_record == 0) ? '<input type="checkbox" value="" checked="checked" />' : '-';
            $cra_is_applied_true = ($row->cra_is_applied_record == 1) ? '<input type="checkbox" value="" checked="checked" />' : '-';
            $cra_is_applied_false = ($row->cra_is_applied_record == 0) ? '<input type="checkbox" value="" checked="checked" />' : '-';

            if ($prev_processing_step != $row->id_report) {
                $count = count(array_filter($data, function ($d) use ($row) {
                    return $d->id_report == $row->id_report;
                }));
                $html_content .= '
                        <tr>
                            <td rowspan="' . $count . '" >
                            ' . $row->processing_step . '
                                 
                            </td>
                           <td>
                            ' . $row->legend_name . '    
                            </td>
                            <td>
                                 ' . $row->legend_desc . '
                            
                            </td>
                            <td>
                           ' . $cra_prvntv_ctrl_true . '
                            </td>
                            <td>
                               ' . $cra_prvntv_ctrl_false . '
                            </td>
                            <td>
                                  ' . $row->cra_jstify_record . '
                             
                            </td>
                            <td>
                                 ' . $row->cra_food_safety_hazard_record . '
                             
                            </td>
                             <td>
                             ' .  $cra_is_applied_true  . '
                            </td>
                             <td>
                             ' . $cra_is_applied_false . '
                            </td>
                        </tr> ';
            } else {
                $html_content .= '
                        <tr>
                            <td>
                                    ' . $row->legend_name . ' 
                           
                            </td>
                            <td >
                            
                                  ' . $row->legend_desc . '
                                 
                            </td>
                             <td>
                             ' . $cra_prvntv_ctrl_true . '
                            </td>
                            <td>
                            ' . $cra_prvntv_ctrl_false . '
                            </td>
                            <td>
                                  ' . $row->cra_jstify_record . '
                                 
                            </td>
                            <td>
                                  ' . $row->cra_food_safety_hazard_record . '
                                  
                              
                            </td>
                            <td>
                           ' .  $cra_is_applied_true  . '
                            </td>
                            <td>
                          ' . $cra_is_applied_false . '
                         
                            </td>
                        </tr> ';
            }
            $prev_processing_step = $row->id_report;
        }
        $sign1_data_uri = $row->rev_sign;
        // reviewed date
        $rev_date =  $row->rev_date;
        $rev_timestamp = strtotime($rev_date);
        $rev_formattedDate = date('M j, Y', $rev_timestamp);
        // approval date
        $appr_date =  $row->appr_date;
        $appr_timestamp = strtotime($appr_date);
        $appr_formattedDate = date('M j, Y', $appr_timestamp);
        $html_content .= '
        
                </tbody>
                </table>
                <br>
                <table class="signature-container-wrapper">
            <tr>
                <td class="signature-container">
                <image width="50%" src="' . $sign1_data_uri . '">
                <hr>
                <div class="name">' . $row->rev_name . '</div>
                <div class="position">' . $row->rev_position . '</div>
                <div class="date">' . $rev_formattedDate . '</div>
              
                </td>
                <td class="signature-container">
                 <image src="' . $row->appr_sign . '">
                <hr>
                <div class="name">' . $row->appr_name . '</div>
                <div class="position">' . $row->appr_position . '</div>
                <div class="date">' . $appr_formattedDate . '</div>
                </td>
            </tr>
            </table>
            </div>';
        $this->pdf->load_html($html_content);
        $this->pdf->render();

        // Print the PDF
        $this->pdf->stream("pdf_with_image.pdf", array("Attachment" => false));
    }

    public function pdf() {
        $this->load->library('pdf');
        $record_id = $this->input->post('id');
        $data = $this->Quires->cra_show_record($record_id);
        $html_content='';
        $prev_processing_step = '';
        $html_content .='
        <style>
        div.layout-978 { width: 978px; margin: 0px auto; }
        
        div.tblcontainer {
            padding: 18px;
            border: 1px solid #c0c0c0;
            margin: 20px auto;
            -moz-border-radius: 4px;
            -webkit-border-radius: 4px;
            border-radius: 4px; /* future proofing */
            -khtml-border-radius: 4px; /* for old Konqueror browsers */
            width: 93%;	
        }
        
        table {
            border-collapse: collapse;
          }
          
          td, th {
            border: 1px solid  #949494;
            padding: 8px;
          }
        
        .datagrid {
            border-collapse: collapse;
        }
        
        .datagrid thead tr th {
            background: #8080801f;
            color: #fffff;
            font-size: 11px;
            font-weight: normal;
            text-align: left;
            padding: 6px 8px;
            border: 1px solid #c9c9c9;
        }
        .datagrid tbody tr {
            background: #fff;
        }
        
        .datagrid tbody tr td {
            font-size: 10px;
            text-align:center;
            padding: 6px 8px;
            border: 1px solid #c9c9c9;
        }
        
        
        .datagrid tbody tr td.cash {
            text-align: right;
        }
        </style>
            <table class="datagrid"> 
                <thead>
                    <tr>
                        <th rowspan="2">
                            Processing Step
                        </th>
                        <th colspan="2">
                            <p>Identify potential food safety hazards introduced, controlled, or enhanced at this step</p>
                        </th>
                        <th colspan="2">Do any potential food safety hazards require preventive control?</th>
                        <th rowspan="2">Justify your decision for column 3</th>
                        <th rowspan="2">
                            <p style="text-align:center;">Whatpreventive control measure(s) can be applied to significantly minimize or prevent the food safety hazard?Process including CCPs, Allergen, Sanitation, Supply- chain, other preventive control</p>
                        </th>
                        <th colspan="2">Is the preventive control applied at this step?</th>
                    </tr>
                    <tr>
                        <th></th>
                        <th></th>
                        <th>YES</th>
                        <th>NO</th>
                        <th>YES</th>
                        <th>NO</th>
                    </tr>
                </thead>
                <tbody >';
                foreach ($data as $key => $row) {
                    $cra_prvntv_ctrl_true = ($row->cra_prvntv_ctrl_record == 1) ? '<input type="checkbox" value="" checked="checked" />' : '-';
                    $cra_prvntv_ctrl_false = ($row->cra_prvntv_ctrl_record == 0) ? '<input type="checkbox" value="" checked="checked" />' : '-';
                    $cra_is_applied_true = ($row->cra_is_applied_record == 1) ? '<input type="checkbox" value="" checked="checked" />' : '-';
                    $cra_is_applied_false = ($row->cra_is_applied_record == 0) ? '<input type="checkbox" value="" checked="checked" />' : '-';
                    
                    if ($prev_processing_step != $row->id_report) {
                        $count = count(array_filter($data, function ($d) use ($row) {
                            return $d->id_report == $row->id_report;
                        }));
                        $html_content .= '
                        <tr>
                            <td rowspan="' . $count . '" >
                            '.$row->processing_step. '
                                 
                            </td>
                           <td>
                            ' . $row->legend_name . '    
                            </td>
                            <td>
                                 ' . $row->legend_desc . '
                            
                            </td>
                            <td>
                           ' .$cra_prvntv_ctrl_true. '
                            </td>
                            <td>
                               ' . $cra_prvntv_ctrl_false . '
                            </td>
                            <td>
                                  ' . $row->cra_jstify_record . '
                             
                            </td>
                            <td>
                                 ' . $row->cra_food_safety_hazard_record . '
                             
                            </td>
                             <td>
                             ' .  $cra_is_applied_true  . '
                            </td>
                             <td>
                             ' . $cra_is_applied_false.'
                            </td>
                        </tr> ';
                    }else{
                        $html_content .= '
                        <tr>
                            <td>
                                    ' . $row->legend_name . ' 
                           
                            </td>
                            <td >
                            
                                  ' . $row->legend_desc . '
                                 
                            </td>
                             <td>
                             ' .$cra_prvntv_ctrl_true. '
                            </td>
                            <td>
                            ' . $cra_prvntv_ctrl_false . '
                            </td>
                            <td>
                                  ' . $row->cra_jstify_record . '
                                 
                            </td>
                            <td>
                                  ' . $row->cra_food_safety_hazard_record . '
                                  
                              
                            </td>
                            <td>
                           ' .  $cra_is_applied_true  . '
                            </td>
                            <td>
                          ' . $cra_is_applied_false. '
                         
                            </td>
                        </tr> ';
                    }
            $prev_processing_step= $row->id_report;
                } 
                $html_content.='
                </tbody>
                </table>
            </div>';
                $this->pdf->setPaper('A4', 'landscape');
                $this->pdf->loadHtml($html_content);
                $this->pdf->render();
                $this->pdf->stream("sample.pdf", array("Attachment"=>0));
    }
    
    public function cra_show_table_record()
    {
        $image = base_url('assets/images/logo.png');
        $record_id = $this->input->post('id');
        $data = $this->Quires->cra_show_record($record_id);
        $output = '';
        $prev_cra_proccessing_id= '';
        $output .= '
        <div class="modal-body">
        <div class="col-xs-12">
         <div>
            <center>
                <h4>Clothing Risk Analysis</h4>
            </center> 
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="mytable">
             ' . $this->cra_legend_show() . '
                <thead>
                    <tr>
                        <th rowspan="2" class="px-4 py-2 text-center">
                            Processing Step
                        </th>
                        <th colspan="2" class="px-4 py-2 text-center">
                            <p>Identify potential food safety hazards introduced, controlled, or enhanced at this step</p>
                        </th>
                        <th colspan="2" class="px-4 py-2 text-center">Do any potential food safety hazards require preventive control?</th>
                        <th rowspan="2" class="px-4 py-2 text-center">Justify your decision for column 3</th>
                        <th rowspan="2" class="px-4 py-2 text-left">
                            <p style="text-align:center;">Whatpreventive control measure(s) can be applied to significantly minimize or prevent the food safety hazard?Process including CCPs, Allergen, Sanitation, Supply- chain, other preventive control</p>
                        </th>
                        <th colspan="2" class="px-4 py-2" name="ifdiag">Is the preventive control applied at this step?</th>

                    </tr>
                    <tr>
                        <th></th>
                        <th></th>
                        <th class="px-4 py-2 text-center">YES</th>
                        <th class="px-4 py-2 text-center">NO</th>
                        <th class="px-4 py-2 text-center">YES</th>
                        <th class="px-4 py-2 text-center">NO</th>
                    </tr>
                </thead>
                <tbody >';
        foreach ($data as $key => $row) {
            $cra_prvntv_ctrl_true = ($row->cra_prvntv_ctrl_record == 1) ? '<input type="checkbox" value="" checked="checked" disabled/>' : '-';
            $cra_prvntv_ctrl_false = ($row->cra_prvntv_ctrl_record == 0) ? '<input type="checkbox" value="" checked="checked" disabled/>' : '-';
            $cra_is_applied_true = ($row->cra_is_applied_record == 1) ? '<input type="checkbox" value="" checked="checked" disabled/>' : '-';
            $cra_is_applied_false = ($row->cra_is_applied_record == 0) ? '<input type="checkbox" value="" checked="checked" disabled/>' : '-';
                
            if ($prev_cra_proccessing_id!= $row->id_report) {
                $count = count(array_filter($data, function ($d) use ($row) {
                    return $d->id_report == $row->id_report;
                }));
                $output .= '
                <tr>
                    <td rowspan="' . $count . '" >
                        <div style="padding:1em;" name="processing_step">'.$row->processing_step. ' </div>
                         
                    </td>
                   <td>
                
                    <div style="width:-4em; padding: 1em; text-align: center; position: relative;">
                    ' . $row->legend_name . ' 
                    </div>
                               
                    </td>
                    <td>
                        <div style="padding:1em;" contenteditable="true" data-column="cra_prvntv_ctrl"  class="legend_desc">
                         ' . $row->legend_desc . '
                        </div>
                    </td>
                    <td>
                   ' .  $cra_prvntv_ctrl_true . '
                    </td>
                    <td>
                    ' .  $cra_prvntv_ctrl_false . ' 
                    </td>
                    <td>
                        <div style="padding:1em;" contenteditable="true">
                          ' . $row->cra_jstify_record . '
                        </div>
                    </td>
                    <td>
                 
                       <div style="padding:1em;" contenteditable="true"  data-id="cra_food_safety_hazard" class="fwc_cra_edit">
                         ' . $row->cra_food_safety_hazard_record . '
                       </div>
                    </td>
                     <td>
            ' .  $cra_is_applied_true  . '
                    </td>
                     <td>
             ' .  $cra_is_applied_false  . '
                    </td>
                </tr>
            ';
            } else {
            
                $output .= '
                <tr>
                    <td>
                 
                         <div style="width:-4em; padding: 1em; text-align: center; position: relative;">
                            ' . $row->legend_name . ' 
                         </div>
                 
                    </td>
                    <td >
                    
                        <div style="padding:1em;"  class="legend_desc">
                          ' . $row->legend_desc . '
                          </div>
                    </td>
                     <td>
                     ' . $cra_prvntv_ctrl_true . '
                    </td>
                    <td>
                   ' .  $cra_prvntv_ctrl_false  . '
                    </td>
                    <td>
                  
                        <div style="padding:1em;" contenteditable="true"  data-id="cra_jstify" class="fwc_cra_edit">
                          ' . $row->cra_jstify_record . '
                          </div>
                    </td>
                    <td>
                    <input name="processing_cra_food_safety_hazard_record"  hidden>
                       <div style="padding:1em;" contenteditable="true" data-id="cra_food_safety_hazard" class="fwc_cra_edit">
                          ' . $row->cra_food_safety_hazard_record . '
                       </div>
                    </td>
                    <td>
                    ' .  $cra_is_applied_true  . '
                    </td>
                    <td>
                    ' .  $cra_is_applied_false  . '
                    </td>
                </tr>
        

           ';
            }
            $prev_cra_proccessing_id= $row->id_report;
        }
        // reviewed date
        $rev_date =  $row->rev_date;
        $rev_timestamp = strtotime($rev_date);
        $rev_formattedDate = date('M j, Y', $rev_timestamp);
        // approval date
        $appr_date =  $row->appr_date;
        $appr_timestamp = strtotime($appr_date);
        $appr_formattedDate = date('M j, Y', $appr_timestamp);

        $output .= '
        </tbody>
        </table>
        </div>
    </div>
</div>
<hr>
<div class="signature-container-wrapper">
  <div class="signature-container">
  <image src="' . $row->rev_sign . '">
    <hr>
    <div class="name">' . $row->rev_name . '</div>
    <div class="position">' . $row->rev_position . '</div>
    <div class="date">' . $rev_formattedDate. '</div>
  </div>
  <div class="signature-container">
  <image src="' . $row->appr_sign . '">
    <hr>
     <div class="name">' . $row->appr_name . '</div>
    <div class="position">' . $row->appr_position . '</div>
    <div class="date">' . $appr_formattedDate. '</div>
  </div>
</div>
<br>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <a id="'.$row->table_id.'" class="pdfPrint btn btn-primary">Print</a>
    <a id="'.$row->table_id.'" class="pdfDownload btn btn-primary">Download Pdf</a>
</div>';
        echo $output;
        
    }
    public function cra_show_list_data()
    {
        $data = $this->Quires->show('cra_record');
        $output = '';
        $unique_table_ids = array(); // array to store unique table_ids
        foreach ($data as $row) {
            if (!in_array($row->table_id, $unique_table_ids)) {
                // if table_id is not in unique_table_ids, display the row
                $output .= '
              <tr>
                        <th scope="row">' . $row->record_id . '</th>
                        <td>0000 <a class="cra_data_record" data-toggle="modal" data-target="#myModal">' . $row->table_id . '</a></td>
                        <td> <a class="cra_data_record" data-toggle="modal" id="'.$row->table_id.'" data-target="#myModal">' . $row->date_recorded . '</a></td>
                        <td style="text-align:center;"> 
                        <a style="font-size:20px;text-align:center" class="pdfPrint"  id="'.$row->table_id.'"><i class="fa fa-print" aria-hidden="true"></i></a>
                        &nbsp
                        <a style="font-size:20px;text-align:center" class="pdfDownload"  id="'.$row->table_id.'"><i class="fa fa-download" aria-hidden="true"></i></a>
                        </td>
                         </tr>
            ';
                // add table_id to unique_table_ids array
                $unique_table_ids[] = $row->table_id;
            }
        }
        echo $output;
    }

     
    public function remove_parent()
    {
        $id = $this->input->post('id');
        if(!empty($id)){
            // Assuming 'id' is the name of the column you want to update
            $this->Quires->remove_parent('fwc_cra', $id);
            echo "success";
        }else{
            echo "error: ID is empty";
        }
    }
    
    public function cra_delete_child()
    {
        $id = $this->input->post('id');
        if(!empty($id)){
            // Assuming 'id' is the name of the column you want to update
            $this->Quires->fwc_cra_delete_child('fwc_cra', $id);
            echo "success";
        }else{
            echo "error: ID is empty";
        }
    }
    public function cra_add_child() {
        $id = $this->input->post('id');
        $legend_id = $this->input->post('l_id');
        $data = $this->Quires->show_where('cra_legend', array('legend_id' => $legend_id));
        foreach($data as $row) {
            $just = $row->legend_justify;
            $record = $row->legend_applied_record;
        }
        $this->Quires->fwc_cra_add_child($id, $just, $record);
    
    }
      
    public function update_check()
    {
        $id = $this->input->post('id');
        $value = $this->input->post('value');
        $data_column = $this->input->post('data_column');
        // Assuming 'id' is the name of the column you want to update
        $this->Quires->fwc_cra_tbl($data_column, $value, 'fwc_cra', $id);
        // echo $id;
    }

    public function cra_insert_record()
    {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $p_steps = $this->input->post('p_steps');
            $legend_justify = $this->input->post('legend_justify');
            $legend_applied_record = $this->input->post('legend_applied_record');
            $hazard_code = $this->input->post('hazards_code'); // Get hazard_code as an array
            $data_for_insert = array(
                "p_steps" => $p_steps,
                "lgend_justify" => $legend_justify,
                "lgend_applied_record" => $legend_applied_record
            );
            $this->Quires->insert_data($hazard_code, $data_for_insert);
        }
    }
    
    

    public function fwc_cra_tbl_edit()
    {
        $fwc_cra_id = $this->input->post('fwc_cra_id');
        $column_name = $this->input->post('data_id');
        $fwc_new_desc = $this->input->post('fwc_new_desc');
        // Assuming 'id' is the name of the column you want to update
        $this->Quires->fwc_cra_tbl($column_name,$fwc_new_desc, 'fwc_cra', $fwc_cra_id);
    }

    public function cra_processing_step()
    {
        $p_id = $this->input->post('p_id');
        $new_step = $this->input->post('new_step');
        // Assuming 'id' is the name of the column you want to update
        $this->Quires->cra_processing_step_update($new_step, 'cra_proccesing_step', $p_id);
    }

    public function up_legend_desc()
    {
        $data_legend_id = $this->input->post('data_id');
        $new_desc = $this->input->post('new_desc');
        // Assuming 'id' is the name of the column you want to update
        $this->Quires->cra_update_legend_description($new_desc, 'cra_legend', $data_legend_id);
    }


    public function update_legend_desc()
    {
        // Get the id and value from the AJAX request
        $id = $this->input->post('td_id');
        $data_id = $this->input->post('data_id');
        $new_value = $this->input->post('new_value');
        $new_value_uppercase = strtoupper($new_value);

        $cra_editable_data = array(
            'cra_legend' => $new_value_uppercase,
            'legend_id' => $data_id
        );
        $this->Quires->cra_update_legend(array($cra_editable_data), 'fwc_cra', $id);

    }


    public function cra_show()
    {
        $data = $this->Quires->cra_show();
        $output = '';
        $prev_cra_proccessing_id = '';
        $output .='<div class="table-container">
    
        <div class="row">
            <div class="col-xs-12">

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table-responsive table table-bordered table-hover" id="mytable">
                            <thead class="bg-gray-200">
                                <tr>
                                    <th rowspan="2" class="px-4 py-2 text-center">
                                        Processing Step
                                    </th>
                                    <th colspan="2" class="px-4 py-2 text-center">
                                        <p>Identify potential food safety hazards introduced, controlled, or enhanced at this step</p>
                                    </th>
                                    <th colspan="2" class="px-4 py-2 text-center">Do any potential food safety hazards require preventive control?</th>
                                    <th rowspan="2" class="px-4 py-2 text-center">Justify your decision for column 3</th>
                                    <th rowspan="2" class="px-4 py-2 text-left">
                                        <p style="text-align:center;">Whatpreventive control measure(s) can be applied to significantly minimize or prevent the food safety hazard?Process including CCPs, Allergen, Sanitation, Supply- chain, other preventive control</p>
                                    </th>
                                    <th colspan="2" class="px-4 py-2" name="ifdiag">Is the preventive control applied at this step?</th>

                                </tr>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th class="px-4 py-2 text-center">YES</th>
                                    <th class="px-4 py-2 text-center">NO</th>
                                    <th class="px-4 py-2 text-center">YES</th>
                                    <th class="px-4 py-2 text-center">NO</th>
                                </tr>
                            </thead>
                            <tbody >';
        if (count($data) > 0) {
        foreach ($data as $key => $row) {
            if ($prev_cra_proccessing_id != $row->cra_proccessing_id) {
                $count = count(array_filter($data, function ($d) use ($row) {
                    return $d->cra_proccessing_id == $row->cra_proccessing_id;
                }));
                $cra_is_applied_true = ($row->cra_is_applied == 1) ? '<i class="fa fa-check-circle" style="font-size:20px;"></i>' : ' <label class="custom-radio">
                                                                                                                                            <input contenteditable="true" onblur="updateRadioValue(this)" data-column="cra_is_applied" data-id="' . $row->legend_id . '" id="' . $row->id . '" type="radio" value="1" name="cra_is_applied_' . $row->id . $count . '">
                                                                                                                                            <span class="checkmark"></span>
                                                                                                                                        </label>';
                $cra_is_applied_false = ($row->cra_is_applied == 0) ? '<i class="fa fa-check-circle" style="font-size:20px;"></i>' : '<label class="custom-radio">
                                                                                                                                        <input contenteditable="true" onblur="updateRadioValue(this)" data-column="cra_is_applied" data-id="' . $row->legend_id . '" type="radio" id="' . $row->id . '" value="0" name="cra_is_applied_' . $row->id . $count . '">
                                                                                                                                        <span class="checkmark"></span>';
                $cra_prvntv_ctrl_true = ($row->cra_prvntv_ctrl == 1) ? '<i class="fa fa-check-circle" style="font-size:20px;"></i>' : ' <label class="custom-radio">
                                                                                                                                        <input contenteditable="true" onblur="updateRadioValue(this)" data-column="cra_prvntv_ctrl" data-id="' . $row->legend_id . '" id="' . $row->id . '" type="radio" value="1" name="prventveCntrl_' . $row->id . $count . '" >
                                                                                                                                        <span class="checkmark"></span>
                                                                                                                                    </label>';
                $cra_prvntv_ctrl_false = ($row->cra_prvntv_ctrl == 0) ? '<i class="fa fa-check-circle" style="font-size:20px;"></i>' : ' <label class="custom-radio">
                                                                                                                                            <input contenteditable="true" onblur="updateRadioValue(this)" type="radio" data-column="cra_prvntv_ctrl" data-id="' . $row->legend_id . '" id="' . $row->id . '" value="0" name="prventveCntrl_' . $row->id . $count . '" >
                                                                                                                                            <span class="checkmark"></span>
                                                                                                                                        </label>';

                    $remove_button = ($count > 1) ? '<a class="delete_child" id="'.$row->id .'" style="font-size:13px;position: absolute;margin-top: -4.1em;/* margin-right: -69.8em; */"><i class="fa fa-minus-circle"></i></a>' : '';
                   $add_button = ($count > 1) ? '<a class="delete_child" data-id="'.$row->legend_id.'" id="' . $row->id . '" style="position: inherit;margin-left: 28px;"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>' : '';
                $add_button = ($count >=1) ? '<a data-id="'.$row->legend_id.'" class="add_child" id="' . $row->cra_proccessing_id . '" style="position: inherit;margin-left: 28px;"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>' : '';
                    $output .= '
                <tr>
                    <td rowspan="' . $count . '" >
                        <div style="padding:1em;" name="processing_step" contenteditable="true" id="' . $row->p_step_id . '">' . $row->processing_step . '</div>
                         <a id="' . $row->p_step_id . '" class="p_step_remove" style="font-size:15px;position: absolute;margin-top: -3.6000000000000014em;/* margin-right: -69.8em; */">
                         <i class="fa fa-minus-circle" aria-hidden="true"></i>
                         </a>
                         
                    </td>
                   <td>
                 
                    <div style="width:-4em; padding: 1em; text-align: center; position: relative;" contenteditable="true" id="' . $row->id . '" data-id="' . $row->legend_id . '" class="edit">' . $row->legend_name . '
              
                    </div>
                     ' . $add_button . '  ' . $remove_button . '
                                
                </td>
                    <td >
                        <div style="padding:1em;" contenteditable="true" data-column="cra_prvntv_ctrl" id="' . $row->id . '" data-id="' . $row->legend_id . '" class="legend_desc">' . $row->legend_desc . '</div>
                    </td>
                    <td>
          
                  ' .$cra_prvntv_ctrl_true.'
                    </td>
                    <td>
                     ' .$cra_prvntv_ctrl_false.'
                    </td>
                    <td>
                   
                    <div style="padding:1em;" contenteditable="true" id="' . $row->id . '" data-id="cra_jstify" class="fwc_cra_edit">' . $row->cra_jstify . '</div>
                </td>
                <td>
          
                   <div style="padding:1em;" contenteditable="true" id="' . $row->id . '" data-id="cra_food_safety_hazard" class="fwc_cra_edit">' . $row->cra_food_safety_hazard . '</div>
                </td>
                     <td>
                 
                           ' . $cra_is_applied_true  . '
                 
                    </td>
                     <td>
                     ' . $cra_is_applied_false .'   
                    </td>
                </tr>
            ';
            } else {
                $cra_is_applied_true = ($row->cra_is_applied == 1) ? '<i class="fa fa-check-circle" style="font-size:20px;"></i>' : ' <label class="custom-radio">
                                                                                                                                            <input contenteditable="true" onblur="updateRadioValue(this)" data-column="cra_is_applied" data-id="' . $row->legend_id . '" id="' . $row->id . '" type="radio" value="1" name="cra_is_applied_' . $row->id . $count . '">
                                                                                                                                            <span class="checkmark"></span>
                                                                                                                                        </label>';
                $cra_is_applied_false = ($row->cra_is_applied == 0) ? '<i class="fa fa-check-circle" style="font-size:20px;"></i>' : '<label class="custom-radio">
                                                                                                                                        <input contenteditable="true" onblur="updateRadioValue(this)" data-column="cra_is_applied" data-id="' . $row->legend_id . '" type="radio" id="' . $row->id . '" value="0" name="cra_is_applied_' . $row->id . $count . '">
                                                                                                                                        <span class="checkmark"></span>';
                $cra_prvntv_ctrl_true = ($row->cra_prvntv_ctrl == 1) ? '<i class="fa fa-check-circle" style="font-size:20px;"></i>' : ' <label class="custom-radio">
                                                                                                                                        <input contenteditable="true" onblur="updateRadioValue(this)" data-column="cra_prvntv_ctrl" data-id="' . $row->legend_id . '" id="' . $row->id . '" type="radio" value="1" name="prventveCntrl_' . $row->id . $count . '" >
                                                                                                                                        <span class="checkmark"></span>
                                                                                                                                    </label>';
                $cra_prvntv_ctrl_false = ($row->cra_prvntv_ctrl == 0) ? '<i class="fa fa-check-circle" style="font-size:20px;"></i>' : ' <label class="custom-radio">
                                                                                                                                            <input contenteditable="true" onblur="updateRadioValue(this)" type="radio" data-column="cra_prvntv_ctrl" data-id="' . $row->legend_id . '" id="' . $row->id . '" value="0" name="prventveCntrl_' . $row->id . $count . '" >
                                                                                                                                            <span class="checkmark"></span>
                                                                                                                                        </label>';
                $count = 2;
                $add_button = ($count > 1) ? '<a class="add_child" data-id="'.$row->legend_id.'" id="' . $row->cra_proccessing_id . '" style="position: inherit;margin-left: 28px;"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>' : '';
                $remove_button = ($count > 1) ? '<a href="#" class="delete_child" id="' . $row->id . '" style="font-size:13px;position: absolute;margin-top: -4.1em;/* margin-right: -69.8em; */"><i class="fa fa-minus-circle"></i></a>' : '';
                $output .= '
                <tr>
                    <td>
               
                         <div style="width:-4em; padding: 1em; text-align: center; position: relative;" contenteditable="true" id="' . $row->id . '" data-id="' . $row->legend_id . '" class="edit">' . $row->legend_name . '
                       
                    </div>
                           ' . $add_button . '  ' . $remove_button . '
                    </td>
                    <td >
                    
                        <div style="padding:1em;" contenteditable="true" data-id="' . $row->legend_id . '" class="legend_desc">' . $row->legend_desc . '</div>
                    </td>
                     <td>
                  
                       ' . $cra_prvntv_ctrl_true . '
                    </td>
                    <td>
                   ' . $cra_prvntv_ctrl_false . '
                    </td>
                    <td>
                   
                    <div style="padding:1em;" contenteditable="true" id="' . $row->id . '" data-id="cra_jstify" class="fwc_cra_edit">' . $row->cra_jstify . '</div>
                </td>
                <td>
          
                   <div style="padding:1em;" contenteditable="true" id="' . $row->id . '" data-id="cra_food_safety_hazard" class="fwc_cra_edit">' . $row->cra_food_safety_hazard . '</div>
                </td>
                    <td>
                  
                    ' . $cra_is_applied_true  . '
                    </td>
                    <td>
                       ' . $cra_is_applied_false .'
                    </td>
                </tr>
           ';
          
            }
            $prev_cra_proccessing_id= $row->cra_proccessing_id;
           
        }
        foreach ($data as $row1) {
        $output.='
                <input type="hidden" value="' . $row1->id . '" name="processing_id_record[]">
                <input type="hidden" value="' . $row1->cra_proccessing_id . '" name="id_report[]">
                <input type="hidden" value="' . $row1->legend_id . '" name="cra_legend_id[]">
                <input type="hidden" value="' . $row1->cra_prvntv_ctrl . '" name="cra_prvntv_ctrl_record[]">
                <input type="hidden" value="' . $row1->cra_jstify . '" name="cra_jstify_record[]">
                <input type="hidden" value="' . $row1->cra_food_safety_hazard . '" name="cra_food_safety_hazard_record[]">
                <input type="hidden" value="' . $row1->cra_is_applied . '" name="cra_is_applied_record[]"> 
        ';
    }
        $output.=' </tbody>
        </table>
    </div>
</div>
</div>
</div>

</div>
<hr>

</div>';
        }
        echo $output;
        
    }

    public function fwc_cra($form)
    {
        switch (strtolower($form)) {
            case 'cra':
                if(isset($_POST['save_record'])){
                    try {
                        if (isset($_FILES['reviewer_sign_img']['name'])) {
                            $uploaddir = './uploads/fwcc/images/';
                            $sign1   = basename($_FILES['reviewer_sign_img']['name']);
                            $uploadfile = $uploaddir . $sign1;
                            move_uploaded_file($_FILES['reviewer_sign_img']['tmp_name'], $uploadfile);
                        } else {
                            $sign1 = '';
                        }
                        if (isset($_FILES['approver_sign_img']['name'])) {
                            $uploaddir = './uploads/fwcc/images/';
                            $sign2   = basename($_FILES['approver_sign_img']['name']);
                            $uploadfile = $uploaddir . $sign2;
                            move_uploaded_file($_FILES['approver_sign_img']['tmp_name'], $uploadfile);
                        } else {
                            $sign2 = '';
                        }
                        $processing_id_records = $this->input->post('processing_id_record');
                        $id_report = $this->input->post('id_report');
                        $cra_legend_id = $this->input->post('cra_legend_id');
                        $cra_prvntv_ctrl_record = $this->input->post('cra_prvntv_ctrl_record');
                        $cra_jstify_record = $this->input->post('cra_jstify_record');
                        $cra_food_safety_hazard_record = $this->input->post('cra_food_safety_hazard_record');
                        $cra_is_applied_record = $this->input->post('cra_is_applied_record');
                        $insert_record = array(
                            'processing_id_records' => $processing_id_records,
                            'id_report' => $id_report,
                            'cra_legend_id' => $cra_legend_id,
                            'cra_prvntv_ctrl_record' => $cra_prvntv_ctrl_record,
                            'cra_jstify_record' => $cra_jstify_record,
                            'cra_food_safety_hazard_record' => $cra_food_safety_hazard_record,
                            'cra_is_applied_record' => $cra_is_applied_record,
                        );

                        $table_id = 1;
                        $this->db->select('table_id');
                        $this->db->from('cra_record');
                        $query = $this->db->get();
                        $existing_records = $query->result();
                        foreach ($existing_records as $record) {
                            if ($record->table_id == $table_id
                            ) {
                                $table_id++;
                            }
                        }
                            $for_reviewer = array(
                            'table_id' => $table_id,
                            'rev_name' => $this->input->post('reviewer_name'),
                            'rev_sign' => $this->input->post('reviewer_sign'),
                            'rev_sign_image' => $sign1,
                            'rev_position' => $this->input->post('r_position'),
                            'rev_date' => $this->input->post('reviewed_date'),
                            'appr_name' => $this->input->post('approver_name'),
                            'appr_sign' => $this->input->post('approver_sign'),
                            'appr_sign_image' => $sign2,
                            'appr_position' => $this->input->post('a_position'),
                            'appr_date' => $this->input->post('approved_date')
                        );

                        $this->Quires->insert_cra_record($insert_record, $for_reviewer);
                        $this->session->set_flashdata('success_msg', 'Inserted Successfully!');
                        redirect('forms/fwc_cra/list');
                    } catch(\Exception $e) {
                        log_message('error', $e->getMessage());
                        redirect($this->agent->referrer());
                    }
                }
                $this->content = 'qc_fwc_cra/fwc_cra';
                break;
            case 'list':
                $this->content = 'qc_fwc_cra/cra_list';
                break;
            default:
                redirect($this->agent->referrer());
                break;
        }
        $this->load->view($this->content);
    }
    
    public function fwc($form)
    {
        switch (strtolower($form)) {
            case 'hcl':
                $this->content = 'qc_fwc/fwc_forms/fwc_forms.php';
                break;
         

            default:
                redirect($this->agent->referrer());
                break;
        }
        $this->load->view($this->content = 'qc_fwc/fwc_forms');
       
    }

    public function fwc_show()
    {
        $data = $this->Quires->show('hc_log');
        $output = '';
        foreach ($data as $row) {
            $dr_work = ($row->dr_work == "") ? '<form id="drUpdateForm">
                                                <input type="text" name="tbl_id" value="'.$row->id.'" style="display:none">
                                                <input class="form-control" id="datepik" type="date" name="dr_work_input">
                                                <button class="btn" style="background:#0e76a8;margin-left:3px;">
                                                <i class="fa fa-check-square" aria-hidden="true"></i></button>
                                                </form>
                                                ' : $row->dr_work;
            $diag_patogen_true = ($row->diag_patogen == 1) ? '<i class="fa fa-check-circle" style="font-size:20px;"></i>' : '-';
            $diag_patogen_false = ($row->diag_patogen == 0) ? '<i class="fa fa-check-circle" style="font-size:20px;"></i>' : '-';
            $f_diag_true = ($row->f_diag == 1) ? '<i class="fa fa-check-circle" style="font-size:20px;"></i>' : '-';
            $f_diag_false = ($row->f_diag == 0) ? '<i class="fa fa-check-circle" style="font-size:20px;"></i>' : '-';
    
            $output .= '
                <tr class="border-gray-200">
                    <td class="px-4 py-2">' . date('Y-m-d', strtotime($row->rep_date)) . '</td>
                    <td class="px-4 py-2">' . $row->emp_name . '</td>
                    <td class="px-4 py-2">' . $row->observation . '</td>
                    <td class="px-4 py-2">' . $row->commnt . '</td>
                    <td class="px-4 py-2">' . $dr_work . '</td>
                    <td class="px-4 py-2" style="text-align:center">' . $diag_patogen_true . '</td>
                    <td class="px-4 py-2" style="text-align:center">' . $diag_patogen_false . '</td>
                    <td class="px-4 py-2" style="text-align:center">' . $f_diag_true . '</td>
                    <td class="px-4 py-2" style="text-align:center">' . $f_diag_false . '</td>
                </tr>
            ';

        }
        echo $output;
    }


    public function fwc_insert()
    {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {

            $rd = $this->input->post('rd');
            $en = $this->input->post('en');
            $obs = $this->input->post('obs');
            $ca = $this->input->post('ca');
            $dr = $this->input->post('dr');
            $pathogen = $this->input->post('pathogen');
            $contacted = $this->input->post('contacted');
            $rd_formatted = date('Y-m-d', strtotime($rd));
            $dr_formatted = ($dr !== '') ? date('Y-m-d', strtotime($dr)) : null;

            $emts_data = array(
                'rep_date' => $rd_formatted,
                'emp_name' => $en,
                'observation' => $obs,
                'commnt' => $ca,
                'dr_work' => $dr_formatted,
                'diag_patogen' => $pathogen,
                'f_diag' => $contacted
            );
            $this->Quires->insert_batch($emts_data, 'hc_log');
            echo "success";
        }
    }

    
    public function fwc_update()
    {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $PK_id = $this->input->post('tbl_id');
            $dr_work = $this->input->post('dr_work_input');
            $dr_formatted = date('Y-m-d', strtotime($dr_work));
            $data = array(
                'dr_work' => $dr_formatted
            );
            $this->Quires->update_where($data, 'hc_log', 'id = ' . $PK_id);
        }
    }
    
    
 
    
}
