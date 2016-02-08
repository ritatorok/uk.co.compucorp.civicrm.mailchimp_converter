<?php

class CRM_Mailchimp_BAO_TokenMapping extends CRM_Mailchimp_DAO_TokenMapping {
  public function findAll($asMap = false) {
    $tokenMappings = array();
    $bao = new static();
    $bao->find(false);
    while($bao->fetch()) {
      if($asMap) {
        $tokenMappings[$bao->mailchimp_token] = $bao->civicrm_token;
      } else {
        $tokenMappings[] = array(
          'id' => $bao->id,
          'civicrm_token' => $bao->civicrm_token,
          'mailchimp_token' => $bao->mailchimp_token
        );
      }
    }

    return $tokenMappings;
  }
}
