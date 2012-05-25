<?php
class ModuleHolder extends page {

	static $db = array(
		
	);
	
	static $has_many = array(
		'Modules' => 'Module'
	);	
}

class ModuleHolder_Controller extends Page_Controller {

	static $allowed_actions = array(
        'ModuleUrlForm'
    );

	function ModuleUrlForm() {

		define('SPAN', '<span class="required">*</span>');

		$fields = new FieldList(
			new TextField ('Url', 'Please Submit Read-Only Url of your GitHub Repository'. SPAN) 
		);

		$actions = new FieldList(
			new FormAction('submitUrl', 'Submit')
		);

		$validator = new RequiredFields('URL');

		return new Form($this, 'ModuleUrlForm', $fields, $actions, $validator);

	}

	
	public function submitUrl($data, $form) {
		$url = $data['Url'];
		
		if(empty($url) || substr($url,0, 16) != "git://github.com") {
			$form->sessionMessage(_t('ModuleHolder.BADURL','Please enter a valid URL valid github read only url'), 'Error');
			return $this->redirectBack();
		}
		

		$jsonFile = new GithubReader();
		$jsonPath = $jsonFile->cloneModule($url);
		
		if(!file_exists($jsonPath)) {
			$form->sessionMessage(_t('ModuleHolder.NOJSON','Unable to read json file '));
			return $this->redirectBack();
		}	
				
		$saveJson = $jsonFile->saveJson($url,$jsonPath);

		if($saveJson) {
			$form->sessionMessage(_t('ModuleManager.THANKSFORSUBMITTING','Thank you for your submission'),'good');
		}
		$this->redirectBack();
	}

}			