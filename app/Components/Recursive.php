<?php
namespace App\Components;

class Recursive {
    private $data;
    private $htmlOption = '';
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function categoryRecursive($parentId, $id = 0, $text = ''){
        foreach($this->data as $value){
            if($value['parent_id'] == $id){
                if(!empty($parentId) && $parentId == $value['id'] ){
                    $this->htmlOption .= "<option selected value='".$value['id']."'>".$text.$value['name']."</option>";
                }else{
                    $this->htmlOption .= "<option value='".$value['id']."'>".$text.$value['name']."</option>";
                }
                $this->categoryRecursive($parentId, $value['id'], $text . '--');
            }
        }

        return $this->htmlOption;
    }
}
