<?php

require_once 'CRM/Core/Page.php';

class CRM_Mailchimp_Page_TokenMappings extends CRM_Core_Page {
  function run() {
    $bao = new CRM_Mailchimp_BAO_TokenMapping();
    $this->assign('tokenMappings', $bao->findAll());
    parent::run();
  }
}
