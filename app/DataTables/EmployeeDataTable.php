<?php

namespace App\DataTables;
use DataTables;

class EmployeeDataTable {

    static public function getDataColumns()
    {
        $btn = '<a href="#add-permission" class="item padding-left-custom" title="Add Permission">
                <i class="fas fa-plus" style="padding: 0 4px;"></i>
        </a>
        <a href="#edit-employee" class="item padding-left-custom" title="Edit User">
            <i class="fas fa-user-edit" style="padding: 0 4px;"></i>
        </a>
        <a href="#more-details-employee" class="item padding-left-custom delete-student" title="Delete User" onclick="return confirm(\'Are you sure to remove this employee ?\')">
            <i class="fas fa-eye" style="padding: 0 4px;"></i>
        </a>
        <a href="#delete-employee" class="item padding-left-custom delete-student" title="Delete User" onclick="return confirm(\'Are you sure to remove this employee ?\')">
            <i class="fas fa-trash-alt" style="color: red;"></i>
        </a>';
        return $btn;
    }
}
