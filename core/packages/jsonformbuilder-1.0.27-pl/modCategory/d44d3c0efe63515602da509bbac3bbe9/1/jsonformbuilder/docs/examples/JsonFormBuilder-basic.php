<?php
require_once $modx->getOption('core_path',null,MODX_CORE_PATH).'components/jsonformbuilder/model/jsonformbuilder/JsonFormBuilder.class.php';

//CREATE FORM ELEMENTS
$o_fe_name      = new JsonFormBuilder_elementText('name_full','Your Name');
$o_fe_email     = new JsonFormBuilder_elementText('email_address','Email Address');
$o_fe_notes     = new JsonFormBuilder_elementTextArea('comments','Comments',5,30);
$o_fe_buttSubmit    = new JsonFormBuilder_elementButton('submit','Submit Form','submit');
  
//SET VALIDATION RULES
$a_formRules=array();
//Set required fields
$a_formFields_required = array($o_fe_notes, $o_fe_name, $o_fe_email);
foreach($a_formFields_required as $field){
    $a_formRules[] = new FormRule(FormRuleType::required,$field);
}
        
//Make email field require a valid email address
$a_formRules[] = new FormRule(FormRuleType::email, $o_fe_email, NULL, 'Please provide a valid email address');
  
//CREATE FORM AND SETUP
$o_form = new JsonFormBuilder($modx,'contactForm');
$o_form->setRedirectDocument(3);
$o_form->setSpamProtection(true);
$o_form->addRules($a_formRules);

//SETUP EMAIL
//Note, this is not required, you may want to not send an email and record the data to a database.
$o_form->setEmailToAddress($modx->getOption('emailsender'));
$o_form->setEmailFromAddress($o_form->postVal('email_address'));
$o_form->setEmailFromName($o_form->postVal('name_full'));
$o_form->setEmailSubject('JsonFormBuilder Contact Form Submission - From: '.$o_form->postVal('name_full'));
$o_form->setEmailHeadHtml('<p>This is a response sent by '.$o_form->postVal('name_full').' using the contact us form:</p>');

//Set jQuery validation on and to be output
$o_form->setJqueryValidation(true);
//You can specify that the javascript is sent into a placeholder for those that have jquery scripts just before body close. If jquery scripts are in the head, no need for this.
$o_form->setPlaceholderJavascript('JsonFormBuilder_myForm');
  
//ADD ELEMENTS TO THE FORM IN PREFERRED ORDER
$o_form->addElements(
    array(
        $o_fe_name,$o_fe_email,$o_fe_notes,$o_fe_buttSubmit
    )
);

//The form HTML will now be available via
//$o_form->output();
//This can be returned in a snippet or passed to any other script to handle in any way.