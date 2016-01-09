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

                <?php if(isset($tableCustomFieldList)) : ?>
                    <?php foreach ($tableCustomFieldList as $key) : ?>
                        <?php if (!isset($tableIgnoreFields) || !in_array($key, $tableIgnoreFields)) : ?>
                            <th><?= !isset($tableKeyMappings) ? $key : (!Arrays::element($key, $tableKeyMappings) ? $key : $tableKeyMappings[$key]) ?></th>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php else : ?>
                    <?php foreach ($first as $key => $value) : ?>
                        <?php if (!isset($tableIgnoreFields) || !in_array($key, $tableIgnoreFields)) : ?>
                            <th><?= !isset($tableKeyMappings) ? $key : (!Arrays::element($key, $tableKeyMappings) ? $key : $tableKeyMappings[$key]) ?></th>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif ?>


            </tr>
            </thead>

            <tbody>
            <?php foreach ($tableData as $identifier => $row) : ?>
                <tr data-identifier="<?= $identifier ?>">

                    <?php if(isset($tableCustomFieldList)) : ?>

                        <?php foreach ($tableCustomFieldList as $key) : ?>
                            <?php

                            if (is_object($row)) {
                                $value = Objects::property($key,$row);
                            } else {
                                $value = Arrays::element($key,$row);
                            }

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
                                        <a class="<?= Arrays::element_chain($key . '.class', $tableLinks) ?>" href="<?= Arrays::element_chain($key . '.prefix', $tableLinks) ?><?php
                                        if (is_array($row)) {
                                            if (Arrays::element_chain(Arrays::element_chain($key . '.field', $tableLinks), $row)) {
                                                echo Arrays::element(Arrays::element_chain($key . '.field', $tableLinks), $row);
                                            }
                                        } else if (is_object($row)) {
                                            if (Objects::property(Arrays::element_chain($key . '.field', $tableLinks), $row)) {
                                                echo Objects::property(Arrays::element_chain($key . '.field', $tableLinks), $row);
                                            }
                                        }
                                        ?><?= Arrays::element_chain($key . '.suffix', $tableLinks) ?>"><?= Arrays::element_chain($key . '.customTitle', $tableLinks) ? Arrays::element_chain($key . '.customTitle', $tableLinks) : $convertedValue ?></a></td>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>

                    <?php else  :?>

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

                    <?php endif ?>


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
        <?php if(isset($tableCustomFieldList)) : ?>
        <table id="<?= $tableId ?>" class="table table-striped table-bordered table-hover" width="100%">
            <thead>
                <tr>
                    <?php foreach ($tableCustomFieldList as $key) : ?>
                        <?php if (!isset($tableIgnoreFields) || !in_array($key, $tableIgnoreFields)) : ?>
                            <th><?= !isset($tableKeyMappings) ? $key : (!Arrays::element($key, $tableKeyMappings) ? $key : $tableKeyMappings[$key]) ?></th>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tr>
            </thead>
            </table>
            <script type="text/javascript">

                $(document).ready(function() {
                    Steen.tables.create('#<?= $tableId ?>');
                });

            </script>
        <?php else : ?>
            <div class="alert alert-danger">Keine Daten gefunden und keine Feldliste festgelegt</div>
        <?php endif ?>
    <?php endif;

    if (isset($tableDebug) && $tableDebug) {
        var_dump($tableData);
    };
else : ?>
    <div>No Table Data specified</div>
<?php endif; ?>
