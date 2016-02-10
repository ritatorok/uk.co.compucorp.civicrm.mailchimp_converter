<?php

class CRM_MailchimpConverter_TagConverter {
  private $tagMap;

  public function __construct() {
    $bao = new CRM_MailchimpConverter_BAO_TokenMapping();

    $this->tagMap = $bao->findAll(true);
  }

  public function convert($originalTemplate) {
    $tagMap = &$this->tagMap;
    return preg_replace_callback('#\*\|(.+?)\|\*#', function($matches) use($tagMap) {
      $tagName = $matches[1];
      if(!isset($tagMap[$tagName])) {
        return sprintf('{%s}', $matches[1]);
      }

      return sprintf('{%s}', $tagMap[$tagName]);
    }, $originalTemplate);
  }
}
