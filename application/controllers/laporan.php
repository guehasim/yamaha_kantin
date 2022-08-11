<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('acl');
        $this->load->model('m_laporan');
        $this->load->library('dompdf_gen');
        $this->load->library('excel');
    }

    public function index()
    {
        $data['title']    = 'Laporan Menu Kantin';
        $data['content']  = 'laporan/index';
        $data['script']   = 'laporan/script';
        $data['period_awal']   = $this->input->post('period_awal');
        $data['period_akhir']  = $this->input->post('period_akhir');

        $submit             = $this->input->post('submitdata');
        if ($submit == 'Reset') {
            $data['period_awal']   = '';
            $data['period_akhir']  = '';
            $this->load->view('index', $data);
        }else if ($submit == 'Print PDF') {
            return $this->printpdf();
        }else if ($submit == 'Print Excel') {
            return $this->printexcel();
        }else {
            $this->load->view('index', $data);
        }
    }

    public function printpdf()
    {
        if ($this->input->post()) {
            $data['laporan_makan'] = $this->m_laporan->get_data_makan();
            $data['laporan_minum'] = $this->m_laporan->get_data_minum();
            // ini_set('memory_limit', '-1');
            $this->load->view('laporan/reportpdf', $data);
        } else {
            redirect('admin');
        }
    }

    public function print_detail($id_transaksi)
    {
        if (!empty($id_transaksi)) {
            $data['laporan'] = $this->m_laporan->get_print_detail($id_transaksi);
            ini_set('memory_limit', '-1');
            $this->load->view('laporan/cetakpdf', $data);
        } else {
            redirect('admin');
        }
    }

    public function num2alpha($n) {
        $r = '';
        for ($i = 1; $n >= 0 && $i < 10; $i++) {
            $r = chr(0x41 + ($n % pow(26, $i) / pow(26, $i - 1))) . $r;
            $n -= pow(26, $i);
        }

        return $r;
    }

    public function printexcel()
    {
        if ($this->input->post()) {
            $data['laporan'] = $this->m_laporan->get_data();
            $data['area']    = $this->m_laporan->get_area();
            
            $filename   = 'laporan_survey.xls';
            $this->excel->setActiveSheetIndex(0);
            
            $styleheader = [
                'font' => [
                    'bold' => true,
                ],
                'alignment' => [
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                ],
            ];

            $this->excel->getActiveSheet()->setCellValue('A1', 'Laporan Inspeksi Area');
            $this->excel->getActiveSheet()->setCellValue('A2', 'PT. Yamaha Electronics Manufacturing Indonesia');
            $this->excel->getActiveSheet()->setCellValue('A3', 'CHECK SHEET PROSES LUX METER');
            $this->excel->getActiveSheet()->setCellValue('A4', 'STANDART 800 +/- 200');
            $this->excel->getActiveSheet()->setCellValue('A5', '( CHECK DIJAWALKAN SETIAP AWAL BULAN  MINGGU PERTAMA )');

            $newformatlap = array();

            $index = 2;
            if (!empty($data['area'])) {
                $column_table = array(
                    'MONTH', 'YEAR', 'AREA INSPEKSI'
                );

                $newformatlap[] = $column_table;

                $this->excel->getActiveSheet()->mergeCells('A7:A9');
                $this->excel->getActiveSheet()->mergeCells('B7:B9');

                $column_table = array('', '');

                foreach ($data['area'] as $k => $v) {
                    if ($index != 2) {
                        $index++;
                    }

                    $column_table[] = $v['area'];
                    $column_table[] = '';
                    
                    $this->excel->getActiveSheet()->mergeCells($this->num2alpha($index).'8:'.$this->num2alpha($index+1).'8');
                    $index++;
                }

                $this->excel->getActiveSheet()->setCellValue($this->num2alpha($index-3).'2', 'APPROVED');
                $this->excel->getActiveSheet()->setCellValue($this->num2alpha($index-1).'2', 'CHECKED');

                $this->excel->getActiveSheet()->mergeCells($this->num2alpha($index-3).'2:'.$this->num2alpha($index-2).'2');
                $this->excel->getActiveSheet()->mergeCells($this->num2alpha($index-3).'3:'.$this->num2alpha($index-2).'6');

                $border_style= array(
                    'borders' => array(
                        'allborders' => array(
                            'style' => PHPExcel_Style_Border::BORDER_THIN,
                            'color' => array('rgb' => '0e0e0e')
                        )
                    ),
                    'alignment' => array(
                        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                    ),
                    'font' => array(
                        'size' => 10
                    )
                );

            
                $this->excel->getActiveSheet()->getStyle($this->num2alpha($index-3).'2:'.$this->num2alpha($index-2).'6')->applyFromArray($border_style);
                $this->excel->getActiveSheet()->getStyle($this->num2alpha($index-3).'2:'.$this->num2alpha($index-2).'6')->getFont()->setBold(true);


                $this->excel->getActiveSheet()->mergeCells($this->num2alpha($index-1).'2:'.$this->num2alpha($index).'2');
                $this->excel->getActiveSheet()->mergeCells($this->num2alpha($index-1).'3:'.$this->num2alpha($index).'6');

                $this->excel->getActiveSheet()->getStyle($this->num2alpha($index-1).'2:'.$this->num2alpha($index).'6')->applyFromArray($border_style);

                $this->excel->getActiveSheet()->getStyle($this->num2alpha($index-1).'2:'.$this->num2alpha($index).'6')->getFont()->setBold(true);

                $this->excel->getActiveSheet()->mergeCells('C7:'.$this->num2alpha($index).'7');

                $this->excel->getActiveSheet()->getStyle('A7:'.$this->num2alpha($index).'9')->getFont()->setBold(true);

                $newformatlap[] = $column_table;
                
                $column_table = array('', '');
                $index = 2;

                foreach ($data['area'] as $k => $v) {
                    if ($index != 2) {
                        $index++;
                    }

                    $column_table[] = 'ACTUAL';
                    $column_table[] = 'JUDGE';
                    $index++;
                }

                $newformatlap[] = $column_table;
            }

            if (!empty($data['laporan'])) {
                foreach ($data['laporan'] as $k => $vl) {
                    $data_row           = array(
                        (!empty($vl['tgl_trans']) ? date('F', strtotime($vl['tgl_trans'])) : ''),
                        (!empty($vl['tgl_trans']) ? date('Y', strtotime($vl['tgl_trans'])) : ''),
                    );

                    foreach ($data['area'] as $k => $v) {
                        $data_row[] = (!empty($vl['area'][$v['id_area']]) ? $vl['area'][$v['id_area']]['actual'] : 0);
                        $data_row[] = (!empty($vl['area'][$v['id_area']]) ? $vl['area'][$v['id_area']]['judge'] : 0);
                    }

                    $newformatlap[]     = $data_row;
                }
            }

            // print_r($newformatlap);exit;

            $border_style= array(
                'borders' => array(
                    'allborders' => array(
                        'style' => PHPExcel_Style_Border::BORDER_THIN,
                        'color' => array('rgb' => '0e0e0e')
                    )
                ),
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                ),
                'font' => array(
                    'size' => 10
                )
            );

            
            $this->excel->getActiveSheet()->getStyle('A7:'.$this->num2alpha($index).(count($newformatlap)+6))->applyFromArray($border_style);
            $this->excel->getActiveSheet()->fromArray($newformatlap, null, 'A7');

            header('Content-Type: application/vnd.ms-excel'); //mime type
             
            header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
             
            header('Cache-Control: max-age=0'); //no cache
                                
            //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
            //if you want to save it as .XLSX Excel 2007 format
             
            $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
             
            //force user to download the Excel file without writing it to server's HD
            $objWriter->save('php://output');
        } else {
            redirect('admin');
        }
    }

    public function detail()
    {
        if ($this->input->is_ajax_request()) {
            $result = $this->m_laporan->get_detail();
            echo $result;
        }else {
            redirect('laporan');
        }
    }

    public function ajax_laporan_makan($period_awal, $period_akhir)
    {
        if ($this->input->is_ajax_request()) {
            $laporan_mkn = $this->m_laporan->get_makan($period_awal, $period_akhir);
            echo $laporan_mkn;

        } else {
            redirect('laporan');
        }
    }

    public function ajax_laporan_minum($period_awal, $period_akhir)
    {
        if ($this->input->is_ajax_request()) {
            $laporan_mnm = $this->m_laporan->get_minum($period_awal, $period_akhir);
            echo $laporan_mnm;

        } else {
            redirect('laporan');
        }
    }

    public function download($id)
    {
        ini_set('memory_limit','-1');
        $data   = $this->m_laporan->get_detail($id);

        $this->load->view('laporan/cetakpdf', $data);
        $html   = $this->output->get_output();
        // $this->dompdf->set_paper("A5", "landscape");
        $this->dompdf->set_paper("A4", "potrait");
        
        $this->dompdf->load_html($html);
        $this->dompdf->render();

        $this->dompdf->stream("pernyataan_pkb.pdf",array("Attachment" => true));
        exit();   
    }

    public function delete($id_transaksi)
    {
        if ($this->input->is_ajax_request()) {
            $result = $this->m_laporan->delete($id_transaksi);
            echo $result;
        }else {
            redirect('laporan','refresh');
        }
    }

}


/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */
