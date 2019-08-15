<?php
/**
 * Class for CiviRule Action pdf fastactioncreate
 *
 * @author Jon Goldberg <jon@megaphonetech.com>
 * @license http://www.gnu.org/licenses/agpl-3.0.html
 */

class CRM_Fastactionpdf_CivirulesAction extends CRM_Pdfapi_CivirulesAction {

  /**
   * Method to get the api action to process in this CiviRule action
   *
   * @access protected
   * @abstract
   */
  protected function getApiAction() {
    return 'fastactioncreate';
  }

  /**
   * Method to get the title of a template
   *
   * @param $templateId
   * @return string
   */
  protected function getTemplateTitle($templateId) {
    $templateTitle = 'unknown template';
    // Compatibility with CiviCRM > 4.3
    $version = CRM_Core_BAO_Domain::version();
    if($version >= 4.4) {
      $messageTemplates = new CRM_Core_DAO_MessageTemplate();
    } else {
      $messageTemplates = new CRM_Core_DAO_MessageTemplates();
    }
    $messageTemplates->id = $templateId;
    $messageTemplates->is_active = true;
    if ($messageTemplates->find(TRUE)) {
      $templateTitle = $messageTemplates->msg_title;
    }
    return $templateTitle;
  }

  /**
   * Pass in the FAL ID so we can return appropriate parameters via AJAX despite calling CiviExit.
   */
  protected function alterApiParameters($parameters, CRM_Civirules_TriggerData_TriggerData $triggerData) {
    $entity = $triggerData->getEntity();
    $entityData = $triggerData->getEntityData($entity);
    $parameters['fast_action_link_id'] = $entityData['fast_action_link_id'];
    $parameters['contribution_id'] = $entityData['contribution_id'];
    $parameters['contact_id'] = $entityData['contact_id'];
    return $parameters;
  }

}