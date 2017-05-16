<?php
/**
 * Created by PhpStorm.
 * User: fdwl
 * Date: 16/5/28
 * Time: 下午9:35
 */

namespace Modules\Backend\Widgets;


class Form
{
    public $config      = [];

    public $model       = null;

    public $attribute   = [];

    public function __construct( $config )
    {
        $this->config = $config;

        $this->model = $config['model'] ?? null;

        $this->attribute = $config['attribute'] ?? [];
    }

    public function render()
    {

    }

    protected function createElement($name, $attribute)
    {
        $str_result = "<{$name}";

        foreach($attribute as $key => $val) {
            $str_result .= sprintf(" %s=\"%s\"", $key, $val);
        }

        $str_result .= '>';
        return $str_result;
    }

    protected function createBlockElement($name, $attribute, $content)
    {
        $str = $this->createElement($name, $attribute);

        return $str . $content . '</' . $name .'>';
    }

    public function text($name, $new_attribute = [], $isReadModel = true)
    {
        $attribute = [
            'type'  => $new_attribute['type'] ?? 'text',
            'name'  => $name,
            'id'    => $name,
            'class' => 'form-control'
        ];

        if( $isReadModel && $this->model ) {
            $attribute['value'] = $this->model->$name;
        }

        $attribute = array_merge($attribute, $new_attribute);

        return $this->createElement('input', $attribute);
    }

    public function email($name, $input_attribute = [])
    {
        $input_attribute['type'] = 'email';
        return $this->text($name, $input_attribute);
    }

    public function password($name, $input_attribute = [])
    {
        $input_attribute['type'] = 'password';
        return $this->text($name, $input_attribute, false);
    }

    public function checkbox($name, $input_attribute = [])
    {

        if( !$this->model ) return;

        $optionsName = sprintf("get%sOptions", ucfirst($name));

        if( !method_exists($this->model, $optionsName) ) {
            $class = get_class( $this->model );
            throw new \Exception("使用 @group 类型为 checkbox 需要在 {$class} 实现 {$optionsName} method, result: [name, checkbox, value]");
        }

        $options = $this->model->$optionsName();

        $ret = '';
        foreach( $options as $opt ) {
            $checkboxAttribute = [
                'class'=>'',
                'type'=>'checkbox',
                'value' => array_get($opt, 'value')
            ];

            if(array_get($opt, 'checked', false)) {
                $checkboxAttribute['checked'] = 'checked';
            }

            $html = $this->text($name.'[]', $checkboxAttribute, false);
            $html = $this->createBlockElement('label', [], $html.array_get($opt, 'name'));
            $ret .= $this->createBlockElement('div', ['class'=>'checkbox'], $html);
        }

        return $ret;
    }

    public function group($text, $name, $input_attribute = [], $label_attribute = [])
    {

        $id = $this->model != null ? strtolower(class_basename($this->model) .'_'. $name) : '';

        if(!empty($id)) {
            $label_attribute['for'] = $id;
            $input_attribute['id']  = $id;
        }

        $labelString = $this->createBlockElement('label', $label_attribute, $text);

        $type = $input_attribute['type'] ?? 'text';

        $inputString = $this->$type($name, $input_attribute);

        $groupContent = $labelString. $inputString;

        $groupString = $this->createBlockElement('div', ['class'    => 'form-group'], $groupContent);

        return $groupString;
    }

    public function __toString()
    {
        $attribute = [
            'method'    => 'POST',
        ];

        if( $this->model ) {
            $attribute['id']    =  strtolower(class_basename( $this->model ));
        }

        return $this->createElement('form', $attribute);
    }
}