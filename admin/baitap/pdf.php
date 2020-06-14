<?php  
    $path = "../";
    require_once $path.$path.'commons/utils.php';
    $id = $_GET['id'];
    $listRoomQuery = "select * from baikiemtra where id = $id";
    $cates = getSimpleQuery($listRoomQuery);

         require_once('../../tcpdf/tcpdf.php');  
         $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
         $obj_pdf->SetCreator(PDF_CREATOR);  
         $obj_pdf->SetTitle("Trung tâm ngoại ngữ NASAO");  
         $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
         $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
         $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
         $obj_pdf->SetDefaultMonospacedFont('helvetica');  
         $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
         $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
         $obj_pdf->setPrintHeader(false);  
         $obj_pdf->setPrintFooter(false);  
         $obj_pdf->SetAutoPageBreak(TRUE, 10);  

         $obj_pdf->SetFont('dejavusans', '', 14, '', true); 
         $obj_pdf->AddPage();  

         $content = '';  
         $content .= ' 
         <h3 class="mt-0">Đề bài:</h3>
         <p>'.$cates['name'].'</p>
         <h3>Nội dung:</h3>
         <p>'.$cates['chitiet'].'</p>
         ';  
         $obj_pdf->writeHTML($content);  
         $obj_pdf->Output('sample.pdf', 'I');  
?>