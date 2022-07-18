<?php

namespace App\Components;

use App\Models\Category;

class Recusive {

    private $data;
    private $htmlSelects = '';

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function categoryRecusive($parentId ,$id = 0){
//        $data = Category::all();
        foreach ($this->data as $values){
            if ($values['parentId'] == $id){
                if (!empty($parentId) && $parentId == $values['parentId']) {
                    $this->htmlSelects .= '<option selected value="'.$values['id'].'" >'.$values['title'].'</option>';
                } else {
                    $this->htmlSelects .= '<option value="'.$values['id'].'" >'.$values['title'].'</option>';
                }

                $this->categoryRecusive($parentId ,$values['id']);
            }

        }
        return $this->htmlSelects;

    }

    public function menuRecusive($parentId, $id = 0) {
        foreach ($this->data as $values){
            if ($values['parentId'] == $id){
                if (!empty($parentId) && $parentId == $values['parentId']) {
                    $this->htmlSelects .= '<option selected value="'.$values['id'].'" >'.$values['title'].'</option>';
                } else {
                    $this->htmlSelects .= '<option value="'.$values['id'].'" >'.$values['title'].'</option>';
                }

                $this->categoryRecusive($parentId ,$values['id']);
            }

        }
        return $this->htmlSelects;
    }

}
