<?php

/**
 * Pdf.Fastactioncreate API specification (optional)
 * This is used for documentation and validation.
 *
 * @param array $spec description of fields supported by this API call
 * @return void
 * @see http://wiki.civicrm.org/confluence/display/CRM/API+Architecture+Standards
 */
function _civicrm_api3_pdf_fastactioncreate_spec(&$spec) {
  $spec['contact_id'] = [
    'name' => 'contact_id',
    'title' => 'contact ID',
    'description' => 'ID of the CiviCRM contact',
    'api.required' => 1,
    'type' => CRM_Utils_Type::T_INT,
  ];
  $spec['template_id'] = [
    'name' => 'template_id',
    'title' => 'template ID to be used for the PDF',
    'description' => 'ID of the template that will be used for the PDF',
    'api.required' => 1,
    'type' => CRM_Utils_Type::T_INT,
  ];
  $spec['to_email'] = [
    'name' => 'to_email',
    'title' => 'to email address',
    'description' => 'the e-mail address the PDF will be sent to',
    'api.required' => 0,
    'type' => CRM_Utils_Type::T_STRING,
  ];
  $spec['body_template_id'] = [
    'name' => 'body_template_id',
    'title' => 'template ID email body',
    'description' => 'ID of the template that will be used for the email body',
    'api.required' => 0,
    'type' => CRM_Utils_Type::T_INT,
  ];
  $spec['email_subject'] = [
    'name' => 'email_subject',
    'title' => 'Email subject',
    'description' => 'Subject of the email that sends the PDF',
    'api.required' => 0,
    'type' => CRM_Utils_Type::T_STRING,
  ];
  $spec['pdf_activity'] = [
    'name' => 'pdf_activity',
    'title' => 'Print PDF activity?',
    'description' => 'Log Print PDF activity for contact?',
    'api.required' => 0,
    'type' => CRM_Utils_Type::T_BOOLEAN,
  ];
  $spec['email_activity'] = [
    'name' => 'email_activity',
    'title' => 'Email activity?',
    'description' => 'Log Email activity for contact?',
    'api.required' => 0,
    'type' => CRM_Utils_Type::T_BOOLEAN,
  ];
  $spec['case_id'] = [
    'name' => 'case_id',
    'title' => 'Case ID',
    'description' => 'Case where the activity should be stored',
    'api.required' => 0,
    'type' => CRM_Utils_Type::T_INT,
  ];
}

/**
 * Pdf.Fastactioncreate API
 *
 * @param array $params
 * @return array API result descriptor
 * @see civicrm_api3_create_success
 * @see civicrm_api3_create_error
 */
function civicrm_api3_pdf_fastactioncreate($params) {
  $pdf = new CRM_Fastactionpdf($params);
  $pdf->create();
  $pdf->processPdf();
  $returnValues = [];
  return civicrm_api3_create_success($returnValues, $params, 'Pdf', 'Fastactioncreate');
}

