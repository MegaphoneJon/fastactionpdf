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
    $url = CRM_Utils_System::url('civicrm/file', "reset=1&filename={$fileName}&mime-type={$mimeType}", TRUE);
    //We're about to CiviExit(), so let's grab the FAL settings to put into the JSON response.
    $result = civicrm_api3('FastActionLink', 'getsingle', [
      'return' => ["success_message", "dim_on_use", "confirm"],
      'id' => 1,
    ]);
    CRM_Core_Page_AJAX::returnJsonResponse([
      'url' => $url,
      'success_message' => $result['success_message'],
      'dim_on_use' => $result['dim_on_use'],
      'confirm' => $result['confirm'],
    ]);
  }

}
