<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tests extends Model
{
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'tests';


    /**
     * 模型日期列的存储格式
     *
     * @var string
     */
//    protected $dateFormat = 'U';


    /**
     * The connection name for the model.
     *
     * @var string
     */
//    protected $connection = 'connection-name';

    /**
     * 可以被批量赋值的属性.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

}
