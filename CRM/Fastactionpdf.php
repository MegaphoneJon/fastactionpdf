<?php

class CRM_Fastactionpdf extends CRM_Pdfapi_Pdf {
  protected function processPdf() {
    $temp = $this->_subject;
    CRM_Utils_System::download('TYL', 'application/pdf', file_get_contents($this->_fullPathName));
  }

  protected function sendPdf($email) {
    return;
  }

}
