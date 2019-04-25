<?php

use Model\Entity\OrderForm\FormElement;
use Model\Entity\OrderForm\Form;
use Model\Entity\OrderForm\Input;
use Model\Entity\OrderForm\Fieldset;

function getProductForm(): FormElement
{
    $form = new Form('order', "New order", "/product/add");
    $form->add(new Input('name', "Name", 'text'));
    
    $inputs= new Fieldset('firstFieldset', "firstFieldset title");
    $inputs->add(new Input('caption', "Caption", 'text'));
    $inputs->add(new Input('image', "Image", 'file'));
    $form->add($inputs);
    
    $checkboxes = new Fieldset('secondFieldset', "Select checkbox");
    $checkboxes->add(new Input('test', 'firstCheckbox', 'checkbox'));
    $checkboxes->add(new Input('test1', 'secondCheckBox', 'checkbox'));
    $form->add($checkboxes);
    
    $submit = new Input('test2', 'Send', 'submit');
    $form->add($submit);
    
    return $form;
}


function loadProductData(FormElement $form)
{
    $data = [
        'name' => 'Name',
        'test2' => 'Send',
        'firstFieldset' => [
            'caption' => 'firstInput',
            'image' => 'photo1.png',
        ],
        'secondFieldset' => [
            'test' => 'firstCheckbox',
            'test1' =>'secondCheckBox',
        ]
    ];
    
    $form->setData($data);
}

function renderProduct(FormElement $form)
{
    echo $form->render();
}

$form = getProductForm();
loadProductData($form);
renderProduct($form);