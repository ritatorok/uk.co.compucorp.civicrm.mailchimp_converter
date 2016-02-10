<?php

class CRM_MailchimpConverter_TagConverter {
  private $tagMap;

  public function __construct() {
    $bao = new CRM_MailchimpConverter_BAO_TokenMapping();

    $this->tagMap = $bao->findAll(true);
  }

  public function convert($originalTemplate) {
    return preg_replace_callback('#\*\|(.+?)\|\*#', function($matches) {
      $tagName = $matches[1];
      if(!isset($this->tagMap[$tagName])) {
        return sprintf('{%s}', $matches[1]);
      }

      return sprintf('{%s}', $this->tagMap[$tagName]);
    }, $originalTemplate);
  }
}
