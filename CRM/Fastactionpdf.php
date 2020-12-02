<?php

class CRM_Fastactionpdf extends CRM_Pdfapi_Pdf {

  public function processPdf() {
    $pdfToBeGenerated = $this->_pdfsToBeGenerated[0];
    $hash = md5(uniqid($pdfToBeGenerated['title'], TRUE));
    $_fileName = CRM_Utils_String::munge($pdfToBeGenerated['title']) . '_' . $hash . '.pdf';

    $config = CRM_Core_Config::singleton();
    $_fullPathName = $config->customFileUploadDir . $_fileName;
    $this->_createdFileIds[] = $this->createFileForPDF($_fileName);
    $pdf = CRM_Utils_PDF_Utils::html2pdf($pdfToBeGenerated['html'], $_fileName, TRUE, $pdfToBeGenerated['pdf_format_id']);
    file_put_contents($_fullPathName, $pdf);
    $mimeType = 'application/pdf';
    $this->returnUrl = Civi::$statics['fastactionlinks']['url'] = CRM_Utils_System::url('civicrm/file', "reset=1&filename={$_fileName}&mime-type={$mimeType}", TRUE);
  }

}
