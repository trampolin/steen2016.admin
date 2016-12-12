<?php
/**
 * Created by PhpStorm.
 * User: rmahr1
 * Date: 08.05.16
 * Time: 09:50
 */
?>
<td>
    <button class="btn btn-danger btn-xs disconnect-stuff-button"
            data-source="<?= !empty($tableIncludeRowData) ? (is_object($tableIncludeRowData) ? Objects::property('source_type',$tableIncludeRowData) : Arrays::element('source_type',$tableIncludeRowData) ) : 'undefined' ?>"
            data-source-id="<?= !empty($tableIncludeRowData) ? (is_object($tableIncludeRowData) ? Objects::property('source_id',$tableIncludeRowData) : Arrays::element('source_id',$tableIncludeRowData) ) : 'undefined' ?>"
            data-target="<?= !empty($tableIncludeRowData) ? (is_object($tableIncludeRowData) ? Objects::property('target_type',$tableIncludeRowData) : Arrays::element('target_type',$tableIncludeRowData) ) : 'undefined' ?>"
            data-target-id="<?= !empty($tableIncludeRowData) ? (is_object($tableIncludeRowData) ? Objects::property(Objects::property('target_field_name',$tableIncludeRowData),$tableIncludeRowData) : Arrays::element(Arrays::element('target_field_name',$tableIncludeRowData),$tableIncludeRowData)) : 'undefined' ?>">
        <span class="fa fa-times"></span>
    </button>
</td>
