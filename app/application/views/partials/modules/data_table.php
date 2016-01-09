<?php
/**
 * Created by PhpStorm.
 * User: rmahr1
 * Date: 09.01.16
 * Time: 00:59
 */

?>


<?php if (isset($tableData)) : ?>

    <?php
    $first = reset($tableData);

    if ($first !== false) : ?>
        <table id="<?= $tableId ?>" class="table table-striped table-bordered table-hover" width="100%">
            <thead>
            <tr>
                <?php foreach ($first as $key => $value) : ?>
                    <?php if (!isset($tableIgnoreFields) || !in_array($key, $tableIgnoreFields)) : ?>
                        <th><?= !isset($tableKeyMappings) ? $key : (!Arrays::element($key, $tableKeyMappings) ? $key : $tableKeyMappings[$key]) ?></th>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tr>
            </thead>

            <tbody>
            <?php foreach ($tableData as $identifier => $row) : ?>
                <tr data-identifier="<?= $identifier ?>">
                    <?php foreach ($row as $key => $value) : ?>
                        <?php

                        if (isset($tableValueConversions)) {
                            $convertedValue = TableHelper::convertField($value, Arrays::element($key, $tableValueConversions));
                        } else {
                            $convertedValue = $value;
                        }

                        ?>

                        <?php if (!isset($tableIgnoreFields) || !in_array($key, $tableIgnoreFields)) : ?>
                            <?php if (!isset($tableLinks)) : ?>
                                <td><?= $convertedValue ?></td>
                            <?php elseif (!Arrays::element($key, $tableLinks)) : ?>
                                <td><?= $convertedValue ?></td>
                            <?php else : ?>
                                <td>
                                    <a href="<?= Arrays::element_chain($key . '.prefix', $tableLinks) ?><?php
                                    if (is_array($row)) {
                                        if (Arrays::element_chain(Arrays::element_chain($key . '.field', $tableLinks), $row)) {
                                            echo Arrays::element(Arrays::element_chain($key . '.field', $tableLinks), $row);
                                        }
                                    } else if (is_object($row)) {
                                        if (Objects::property(Arrays::element_chain($key . '.field', $tableLinks), $row)) {
                                            echo Objects::property(Arrays::element_chain($key . '.field', $tableLinks), $row);
                                        }
                                    }
                                    ?><?= Arrays::element_chain($key . '.suffix', $tableLinks) ?>"><?= $convertedValue ?></a></td>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <script type="text/javascript">

            $(document).ready(function() {
                Steen.tables.create('#<?= $tableId ?>');
            });

        </script>
    <?php else : ?>
        <div>No Data found</div>
    <?php endif;

    if (isset($tableDebug) && $tableDebug) {
        var_dump($tableData);
    };
else : ?>
    <div>No Table Data specified</div>
<?php endif; ?>
