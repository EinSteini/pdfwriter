<?php
use setasign\Fpdi\Fpdi;
use setasign\Fpdi\PdfReader;
    function write_to_pdf(){
        if(isset($_FILES['signature'])){
            $uploaddir = __DIR__.'/uploads/';
            $file_name = $_FILES['signature']['name'];
            $file_size =$_FILES['signature']['size'];
            $file_tmp =$_FILES['signature']['tmp_name'];
            $file_type=$_FILES['signature']['type'];
            $file_ext=strtolower(end(explode('.',$_FILES['signature']['name'])));

            if($file_size > 2097152){
                $errors[]='File size must be below 2 MB';
            }
            
            if(empty($errors)==true){
                if(move_uploaded_file($file_tmp,$uploaddir.$file_name)){
                    echo "Success";
                }else{
                    echo 'An error occured while uploading the file. Please try again or contact the Admin.';
                }         
            }else{
                print_r($errors);
            }
        }

        require_once('fpdf182/fpdf.php');
        require_once('FPDI-2.3.6/src/autoload.php');

        $pdf = new Fpdi();
        $pdf->AddPage();
        $pdf->setSourceFile('pdf.pdf');
        $pageId = $pdf->importPage(1, PdfReader\PageBoundaries::MEDIA_BOX);
        $pdf->useImportedPage($pageId);
        $pdf->SetFont('Arial', '', '13'); 
        $pdf->SetTextColor(0,0,0);
        $pdf->SetXY(20, 20);
        //$pdf->Write(0, $_POST['csvadress']);
        $pdf->Image($uploaddir.$file_name);
        unlink($uploaddir.$file_name);
        $pdf->Output('I', 'inputs/generated.pdf');

        
    }
?>