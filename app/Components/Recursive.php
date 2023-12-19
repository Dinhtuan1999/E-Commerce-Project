<?php 
namespace App\Components;
 
class Recursive {
    private $data;
    private $htmlOption = '';
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function categoryRecursive($id = 0, $text = ''){
        foreach($this->data as $value){
            if($value['parent_id'] == $id){
                $this->htmlOption .= "<option value='".$value['id']."'>".$text.$value['name']."</option>";
                $this->categoryRecursive($value['id'], $text . '--');
            }
        }

        return $this->htmlOption;
    }
}
