<?php
/**
 * 权限html设置
 */

namespace App\FixedWrite\Html;


use App\Presenters\PermissionPresenter;

class PermissionHtml
{
    public static function permissionListTr($val)
    {
        $btns = PermissionPresenter::getTableSetting();
        $html = '';
        $html .= '<tr>';
        $html .= '<td>' . $val["id"] . '</td>';
        $html .= '<td>' . $val["menu"]['name'] . '</td>';
        $html .= '<td>' . $val["name"] . '</td>';
        $html .= '<td><code>' . $val["display_name"] . '</code></td>';
        $html .= '<td>' . $val["created_at"] . '</td>';
        $html .= '<td><a href="#" class="'.$btns['options']['edit']['class'].'">'.$btns['options']['edit']['title'].'</a> <a 
                               data-toggle="modal" class="'.$btns['options']['delete']['class'].'"
                               data-target="#delete-modal"
                               data-url="#">'.$btns['options']['delete']['title'].'</a></td>';
        $html .= '</tr>';
        return $html;
    }

    public static function permissionTableHead()
    {
        return '<tr>
            <td style="width: 160px;">ID</td>
            <td style="width: 160px;">所属菜单</td>
            <td style="width: 160px;">Action</td>
            <td style="width: 160px;">名称</td>
            <td style="width: 260px;">创建时间</td>
            <td style="width: 160px;">操作</td>
        </tr>';
    }
}