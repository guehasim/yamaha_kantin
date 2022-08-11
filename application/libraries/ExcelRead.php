<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
 
require_once APPPATH."/third_party/PHPExcel/IOFactory.php";
require_once APPPATH."/third_party/PHPExcel/Shared/Date.php";
class ExcelRead extends PHPExcel
{
    public function __construct()
    {
        parent::__construct();
    }

    public function read($inputFileName='')
    {
        //  Read your Excel workbook
        try {
            $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFileName);
        } catch (Exception $e) {
            die('Error loading file "'.pathinfo($inputFileName, PATHINFO_BASENAME).'": '.$e->getMessage());
        }

        //  Get worksheet dimensions
        $sheet = $objPHPExcel->getSheet(0);
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();

        //  Loop through each row of the worksheet in turn
        $rowData 		= array();
        $rowJurnal 		= array();

        $namaColumn = $sheet->rangeToArray(
            'A1:' . $highestColumn . '1',
            null,
            true,
            false
        );

        for ($row = 2; $row <= $highestRow; $row++) {
            $dataRow = $sheet->rangeToArray(
                'A' . $row . ':' . $highestColumn . $row,
                null,
                true,
                false
            );

            $result_data = [];
            if (!empty($namaColumn[0])) {
                foreach ($namaColumn[0] as $k => $v) {
                    $column_name = strtolower(str_replace(' ', '_', $v));
                    if (!empty($dataRow[0][$k])) {
                        if ($column_name == 'tgl_lahir' || $column_name == 'tgl_periksa') {
                            $dataRow[0][$k] = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($dataRow[0][$k]));
                        }

                        $result_data[$column_name] = $dataRow[0][$k];
                    }
                }

                $rowData[] = $result_data;
            }
        }

        return $rowData;
    }
}
