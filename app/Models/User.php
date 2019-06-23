<?php
/**
 * Created by PhpStorm.
 * User: 12463
 * Date: 2019/6/22
 * Time: 20:02
 */
namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
class User extends Base{
    use SoftDeletes;
    protected $datas = ['deleted_at'];

}