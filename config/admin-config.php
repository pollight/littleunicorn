<?php

return [
    /*
     * --------------------------------------------------------------------------
     * Define configuration groups
     * --------------------------------------------------------------------------
     * Each configuration group will be rendered as a TAB page
     */
    'admin_config_groups' => [
        'delivery' => 'Доставка',
        'product' => 'Продукты'
//        'sample2' => 'sample-name2',
    ],
    /*
     * --------------------------------------------------------------------------
     * Define configuration permissions
     * --------------------------------------------------------------------------
     * Each configuration group will be visible to all roles if not specified or empty array.
     * Example: ['role1', 'role2']
     */
    'admin_config_permissions' => [
        'sample' => [],
        'sample2' => [],
    ],
    /**
     * --------------------------------------------------------------------------
     * Define configuration items
     * --------------------------------------------------------------------------
     * access：config('sample') config('sample.value')
     */
    'delivery' => [
        'cityFrom'=>['Город доставки', 'placeholder'=>'Название города', 'rules'=>'required'],
    ],

];



//'sample' => [
//    'value',
//    'value1'=>['help'=>'help content', 'default'=>'default value'],
//    'value2'=>['label text', 'placeholder'=>'typing...', 'rules'=>'required'],
//    'value3'=>['type'=>'select', 'select label text', 'options'=>['option1'=>'option1', 'option2'=>'option2']],
//    'value4'=>['type'=>'listbox', 'options'=>['foo'=>'foo', 'bar'=>'bar']],
//    'value5'=>['type'=>'checkbox', 'options'=>['foo'=>'foo', 'bar'=>'bar']],
//    'value6'=>['type'=>'ip'],
//    'value7'=>['type'=>'mobile'],
//    'value8'=>['type'=>'color'],
//    'value9'=>['type'=>'time', 'format'=>'HH:mm'],
//    'value10'=>['type'=>'dateRange', 'dateRange label text'],
//    'value11'=>['type'=>'number', 'min'=>100, 'default'=>100],
//    'value12'=>['type'=>'rate'],
//    'value13'=>['type'=>'image', 'uniqueName'],
//    'value14'=>['type'=>'file', 'uniqueName'],
//    'value15'=>['type'=>'multipleImage', 'removable', 'uniqueName'],
//    'value16'=>['type'=>'multipleFile', 'removable', 'uniqueName'],
//    'value17'=>['type'=>'editor'],
//    'value18'=>['type'=>'switch'],
//    'value19'=>['type'=>'tags'],
//],