<?php

namespace Model\Entity\OrderForm;


abstract class FormElement
{
   protected $name;
   protected $title;
   protected $data;
    
   public function __construct(string $name, string $title) {
       $this->name = $name;
       $this->title = $title;
   }
    
    public function getName(): string {
        return $this->name;
   }
    
    public function setData($data): void {
        $this->data = $data;
   }
    
    public function getData(): array {
        return $this->data;
   }
   
   abstract function render(): string;
}