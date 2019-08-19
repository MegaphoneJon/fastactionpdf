<?php

class CRM_Fastactionpdf extends CRM_Pdfapi_Pdf {
  protected function processPdf() {
    // Move the file to the custom file upload dir if need be.
    if (!(isset($this->_apiParams['email_activity']) && $this->_apiParams['email_activity'] == TRUE)) {
      $config = CRM_Core_Config::singleton();
      copy($this->_fullPathName, $config->customFileUploadDir . $this->_fileName);
      $this->_fullPathName = $config->customFileUploadDir . $this->_fileName;
    }

    $mimeType = 'application/pdf';
    $fileName = $this->_fileName;
    $fid = parent::createFileForPDF();
    $this->returnUrl = Civi::$statics['fastactionlinks']['url'] = CRM_Utils_System::url('civicrm/file', "reset=1&filename={$fileName}&mime-type={$mimeType}", TRUE);
  }

}
