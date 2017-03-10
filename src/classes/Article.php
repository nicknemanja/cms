<?php

class Article{
    
    public $id;
    public $title;
    public $content;
    
    public function __construct($data = []) {
        $this->id=(isset($data['id_article']))? $data['id_article']: 'defaultId';
        $this->title = (isset($data['title']))? $data['title']: 'defaultTitle';
        $this->content = (isset($data['content']))? $data['content']: 'defaultContent';
    }
    
}