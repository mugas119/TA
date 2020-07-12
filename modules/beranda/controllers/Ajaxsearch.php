<?php
defined('BASEPATH') OR exit("NO direct script access allowed");

class Ajaxsearch extends CI_Controller {

    function beranda()
    {
        $this->load->view('ajaxsearch');
    }

    function fetch()
    {
        $output = '';
        $query = '';
        $this->load->model('ajaxsearch_model');
        if($this->output->post('query'))
        {
            $query = $this->input->post('query');
        }
        $data = $this->ajaxserach_model-fetch_data($query);
        $output .='
        <div class="table-responsive">
            <table class ="table table-bordered table-striped">
            <tr>
                <th>Nama product</th>
                <th>Harga</th>
                <th>Vendor</th>
            </tr>    
        ';
        if($data->num_rows() > 0)
        {
            foreach($data-result() as $row)
            {
                $output .='
                <tr>
                    <th>Nama product</th>
                    <th>Harga</th>
                    <th>Vendor</th>
                </tr> 
                ';
            }
        }
        else{
            $output .= '<tr>
            <td colspan="5">No Data Found</td>
            </tr>
            ';
        }
        $output .= '</table>';
        echo $output;
    }
}
?>