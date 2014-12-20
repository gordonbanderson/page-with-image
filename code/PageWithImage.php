<?php
/**
* Defines the SupportingProjectPage page type - initial code created by ss generator
*/
class PageWithImage extends Page implements RenderableAsPortlet, RenderableAsTwitterCard {

  // Brief summary to show on facebook and twitter when linking
  private static $db = array(
    'ImageAttribution' => 'Varchar(255)',
    'BriefIntroduction' => 'Text'
  );


  static $has_one = array(
    'MainImage' => 'Image'
  );


  // for rendering thumbnail when linked in facebook
  function getOGImage() {
        return $this->MainImage();
    }
 

  function getCMSFields() {
    $fields = parent::getCMSFields();
    $imagename = _t('PageWithImage.IMAGE', 'Image');
    $fields->addFieldToTab( 'Root.'.$imagename, $uf = new UploadField('MainImage', _t('PageWithImage.MAIN_IMAGE', 'Main Image')));
    $dirname = strtolower($this->ClassName).'s';
    $uf->setFolderName($dirname);
    $fields->addFieldToTab('Root.'.$imagename, new TextField('ImageAttribution', 'Image Credit'));
    $fields->addFieldToTab('Root', new TextAreaField('BriefIntroduction', 'Brief description of the page for Twitter and Facebook purposes'), 'Content');
    return $fields;
  }


  public function getPortletTitle() {
    return $this->Title;
  }  

  public function getPortletImage() {
    return $this->MainImage();
  }  
 
  public function getPortletCaption() {
    return $this->BriefIntroduction;
  }

  public function getTwitterTitle() {
    return $this->Title;
  }

  public function getTwitterImage() {
    return $this->MainImage();
  }

  public function getTwitterDescription() {
    return $this->BriefIntroduction;
  }

}

class PageWithImage_Controller extends Page_Controller {
  
}